<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Complaints extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url', 'language');
        $this->load->library(array('ion_auth', 'form_validation', 'Commons'));

        // check if user logged in 
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        //=========temporary only=========
        $users = array('user' => 68, 'user' => 71);
        if (isset($users['user']) <> USER_ID) {
            die('You are not authorized to view this module');
        }
        //=================================

        $this->load->model('cts_model');

        $this->DB = $this->ion_auth_model->getDB();
        $this->APP = $this->commons->getAPP();

        $this->table = 't_voyage';
    }

    public function index() {

        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == true) {
            $data = array(
                'customer_id' => $this->cts_model->getCustomerID(USER_ID),
                'complaint_type' => $this->input->post('complaint_type'),
                'description' => $this->input->post('description'),
                'business_unit' => 'RAILWAY'
            );

            if (isset($_POST['submit'])) {
                // echo($tgl_mulai);
                //die(print_r($data));
                $this->cts_model->submitComplaint('customer_complaint', $data);
                $data['msg'] = "Thank you, your complaint has been submitted. We will process this request immediately";

            }
        }
        
        $data = array();

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('complaints',$data);
        $this->load->view('template/footer');
    }
    
    function saveData(){
        foreach($_POST as $key => $value){
            $data[$key] = $this->input->post($key);
	}
        
        die(print_r($data));
        $this->cts_model->submitComplaint('customer_complaint', $data);
    }

    function complaintsForm() {

        $data['customer_order_no'] = $this->getCustomerOrderNo(USER_ID);

            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('complaints_form', $data);
            $this->load->view('template/footer');
    }
    
    function getAllCustomerComplaints() {
        $arr = $this->cts_model->getAllCustomerComplaints();
            
        foreach ($arr as $ar => $item) {
            $arr[$ar]['customer'] = $this->cts_model->getCustomerName($arr[$ar]['customer_id']);
        }
        
        echo json_encode($arr);
    }
    
    function getCustomerComplaints() {
        if ($this->uri->segment(3) !== FALSE) {
            $user_id = $this->uri->segment(4);
            $arr = $this->cts_model->getCustomerComplaints($user_id);
            if (empty($arr))
                $arr = array();

            foreach ($arr as $ar => $item) {
                $arr[$ar]['customer'] = $this->cts_model->getCustomerName($arr[$ar]['customer_id']);
                $arr[$ar]['action'] = "<a href='#' class='xcrud-action btn btn-danger btn-sm' onClick='removeComplaint(".'"'.$arr[$ar]['id'].'"'.");'><i class='fa fa-remove'></i></a>";
            }
        }
        echo json_encode($arr);
    }

    function getOrderData() {
        $arr = $this->cts_model->getContainerList();

        echo json_encode($arr);
    }

    function getCustomerOrderNo($userid) {
        $arr = $this->cts_model->getCustomerOrderNo($userid);

        if (empty($arr))
            $arr = array();
        $orderno = array();

        //die(print_r($arr));
        foreach ($arr as $key => $item) {
            $orderno[$key]["id"] = $arr[$key]["order_no"];
            $orderno[$key]["text"] = $arr[$key]["order_no"];
        }

        return $orderno;
    }

    function updateStatus() {
        if ($this->uri->segment(3) !== FALSE) {
            $data['container_no'] = $this->uri->segment(4);
            //$data['container_no'] = $this->cts_model->getContainerNo($data['id']);
            $cls = $this->uri->segment(6);

            if ($cls == "customer") {
                $data['customer'] = $this->uri->segment(8);
            } elseif ($cls == "last_position") {
                $data['last_position'] = $this->uri->segment(8);
            } elseif ($cls == "status") {
                $data['status'] = $this->uri->segment(8);
            } else
                die('parameter error');

            $data['updated_by'] = USER_ID;
            $data['last_updated'] = Date('Y-m-d H:i:s');
            //die(print_r($data));
            //$this->cts_model->updateLastRecord('t_tracking',$data['container_no']);
            $this->db->where('container_no', $data['container_no']);
            $this->db->update('t_tracking', $data);
            //$query = $this->db->submitContainerTracking($table,$data);
//            $this->db->where('payroll_id', $data['payroll_id']);
//            $query = $this->db->update('t_history' ,$data);
        } else
            die('parameter not found');
    }
    
    function removeComplaint(){
		if ($this->uri->segment(3) !== FALSE) $id = $this->uri->segment(4);
		else die('Parameter not found');
		
		$this->DB->where('id', $id);
		if($this->DB->delete('customer_complaint')) echo "Delete Success";
		else echo "Delete Error";
		
		return false;
	}

}
