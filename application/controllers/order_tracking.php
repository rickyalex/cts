<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Order_tracking extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->helper('url', 'language');
        $this->load->library(array('ion_auth', 'form_validation', 'Commons'));

        // check if user logged in 
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        
        //=========temporary only=========
        $users = array('user'=>68,'user'=>71);
        if(isset($users['user'])<>USER_ID){
            die('You are not authorized to view this module');
	}
        //=================================

        $this->load->model('cts_model');

        $this->DB = $this->ion_auth_model->getDB();
        $this->APP = $this->commons->getAPP();

        $this->table = 't_voyage';
    }

    public function index() {

        $all_customer = $this->cts_model->getAllCustomer();
        $data['all_customer'] = json_encode($all_customer);
        $all_container = $this->cts_model->getAllContainer();
        
        foreach($all_container as $ar => $item){
            $all_container[$ar]['value'] = $all_container[$ar]['id'];
        }
            
        $data['all_container'] = json_encode($all_container);
        $all_unit = $this->cts_model->getAllUnit();
        $data['all_unit'] = json_encode($all_unit);
        
        
        
        if(GROUPNAME=="Marketing"){
            
            if ($this->form_validation->run() == true) {
                $data = array(
                    'customer_id' => $this->input->post('customer_id'),
                    'order_no' => $this->input->post('order_no'),
                    'order_date' => $this->input->post('order_date'),
                    'origin_wh' => $this->input->post('origin_wh'),
                    'destination_wh' => $this->input->post('destination_wh'),
                    'remarks' => $this->input->post('remarks'),
                    'service_type' => $this->input->post('service_type'),
                    'feeder_type' => $this->input->post('feeder_type')
                );

                if (isset($_POST['submit'])) {
                    // echo($tgl_mulai);
                    // echo('<br>');
                    $containers = $this->input->post('containers');
                    for($x=0;$x<$containers;$x++){
                        $this->cts_model->submitTableData('t_order',$data);
                    }
                }
            }
            
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('order_tracking',$data);
            $this->load->view('template/footer');
            
        }
        else{
            $data['customer_order_no'] = $this->getCustomerOrderNo(USER_ID);
            $this->form_validation->set_rules('order_no', 'Order No', 'required');
            if ($this->form_validation->run() == true) {
                $data = array(
                    'order_no' => $this->input->post('order_no')
                );

                if (isset($_POST['submit'])) {
                    // echo($tgl_mulai);
                    // echo('<br>');
                    $data['arr'] = $this->cts_model->getOrderDetail($data['order_no']);
                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view('order_tracking_result',$data);
                    $this->load->view('template/footer');
                }
            }
            else{
                $this->load->view('template/header');
                $this->load->view('template/sidebar');
                $this->load->view('order_tracking',$data);
                $this->load->view('template/footer');
            }
        }
        
    }
    
    function form(){
        if ($this->uri->segment(3) !== FALSE)
        {
            $data['mode'] = "update";
        }
        else{
            $customer = $this->cts_model->getAllCustomer();
            foreach($customer as $key => $item){
		$customer[$key]["id"] = $customer[$key]["value"];
		$customer[$key]["text"] = $customer[$key]["text"];
            }
            
            $data['customer'] = $customer;
            $data['order_no'] = "01".Date('Ymd').sprintf('%05d', $this->cts_model->getRunningNumber("t_order"));
            $data['mode'] = "insert";
        }
        $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('order_tracking_form',$data);
            $this->load->view('template/footer');
    }
    
    function getOrderTracking($order_no) {
        if ($this->uri->segment(3) !== FALSE)
        {
            $order_no = $this->uri->segment(4);
            $arr = $this->cts_model->getOrderDetail($order_no);
        
            if(empty($arr)) $arr = array();
            
            foreach($arr as $ar => $item){
                $arr[$ar]['customer'] = $this->cts_model->getCustomerNameByLogin($arr[$ar]['customer_id']);
            }
        }
        echo json_encode($arr);
    }

    function getOrderData() {
        $arr = $this->cts_model->getOrderData();
        
        //die(print_r($arr));
        foreach($arr as $ar => $item){
                $arr[$ar]['customer'] = $this->cts_model->getCustomerName($arr[$ar]['customer_id']);
                
                if(GROUPNAME=="Marketing") {
                    $arr[$ar]['unit_id'] = isset($arr[$ar]['unit_id']) ? $this->cts_model->getNomorUnit($arr[$ar]['unit_id']) : '-';
                    $arr[$ar]['container_no'] = isset($arr[$ar]['container_no']) ? $this->cts_model->getContainerNo($arr[$ar]['container_no']) : '-';
                }
                elseif(GROUPNAME=="TR" || GROUPNAME=="OCS"){
                    $arr[$ar]['container_no'] = isset($arr[$ar]['container_no']) ? $this->cts_model->getContainerNo($arr[$ar]['container_no']) : '-';
                }
                elseif(GROUPNAME=="RW"){
                    $arr[$ar]['unit_id'] = isset($arr[$ar]['unit_id']) ? $this->cts_model->getNomorUnit($arr[$ar]['unit_id']) : '-';
                }
                
                if($arr[$ar]['order_status']=="ON PROGRESS") $arr[$ar]['order_status'] = "<span class='text-info'><b>".$arr[$ar]['order_status']."</b></span>";
                elseif($arr[$ar]['order_status']=="WAITING FOR OPERATION") $arr[$ar]['order_status'] = "<span class='text-warning'><b>".$arr[$ar]['order_status']."</b></span>";
                elseif($arr[$ar]['order_status']=="COMPLETED") $arr[$ar]['order_status'] = "<span class='text-success'><b>".$arr[$ar]['order_status']."</b></span>";
                $arr[$ar]['action'] = "<a href='#' class='xcrud-action btn btn-success btn-sm' onClick='viewOrderHistory(".'"'.$arr[$ar]['id'].'"'.");'><i class='fa fa-search'></i></a><a href='#' class='xcrud-action btn btn-danger btn-sm' onClick='removeOrder(".'"'.$arr[$ar]['id'].'"'.");'><i class='fa fa-remove'></i></a>";
            }
        echo json_encode($arr);
    }
    
    function getCustomerOrderNo($userid) {
        $arr = $this->cts_model->getCustomerOrderNo($userid);
        
        if(empty($arr)) $arr = array();
            $orderno = array();
		
            //die(print_r($arr));
            foreach($arr as $key => $item){
		$orderno[$key]["id"] = $arr[$key]["order_no"];
		$orderno[$key]["text"] = $arr[$key]["order_no"];
            }
		
        return $orderno;
    }
    
    function getOrderHistory($id) {
        if ($this->uri->segment(3) !== FALSE)
        {
            $order_no = $this->uri->segment(4);
            $arr = $this->cts_model->getOrderHistory($id);
        
            if(empty($arr)) $arr = array();
            
//            foreach($arr as $ar => $item){
//                $arr[$ar]['customer'] = $this->cts_model->getCustomerNameByLogin($arr[$ar]['customer_id']);
//            }
        }
        echo json_encode($arr);
    }
    
    function updateStatus(){
        if ($this->uri->segment(3) !== FALSE)
        {
            $data['id'] = $this->uri->segment(4);
            //$data['container_no'] = $this->cts_model->getContainerNo($data['id']);
            $cls = $this->uri->segment(6);
            
            if($cls=="container_no") {
                $data['container_no'] = $this->uri->segment(8);
            }
            elseif($cls=="unit"){
                $data['unit_id'] = $this->uri->segment(8);
            }
            elseif($cls=="last_position"){
                $data['last_position'] = $this->uri->segment(8);
            }
            elseif($cls=="status"){
                $data['status'] = $this->uri->segment(8);
            }
            else die('parameter error');
            
            $data['updated_by'] = USER_ID;
            $data['order_status'] = "<span class='text-info'><b>ON PROGRESS</b></span>";
            $data['last_updated'] = Date('Y-m-d H:i:s');
            //die(print_r($data));
            //$this->cts_model->updateLastRecord('t_tracking',$data['container_no']);
            $this->db->where('id',$data['id']);
            $this->db->update('t_order', $data);
            //$query = $this->db->submitContainerTracking($table,$data);
            
//            $this->db->where('payroll_id', $data['payroll_id']);
//            $query = $this->db->update('t_history' ,$data);
        }
        else die('parameter not found');
    }
    
    function saveData(){
        foreach($_POST as $key => $value){
            $data[$key] = $this->input->post($key);
	}
        $data['customer_id'] = $data['customer'];
        
        
        //die(print_r($data));
        $containers = $data['containers'];
        
        unset($data['customer']);
        unset($data['containers']);
        for($x=0;$x<$containers;$x++){
            $this->cts_model->submitTableData('t_order',$data);
        }
        //$this->cts_model->submitComplaint('customer_complaint', $data);
    }
    
    function removeOrder(){
		if ($this->uri->segment(3) !== FALSE) $id = $this->uri->segment(4);
		else die('Parameter not found');
		
		$this->db->where('id', $id);
		if($this->db->delete('t_order')) echo "Delete Success";
		else echo "Delete Error";
		
		return false;
	}

    
}
