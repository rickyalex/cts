<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation','Commons'));
		
		// check if user logged in 
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        
		$this->load->model('cts_model');
		
	  	$this->DB = $this->ion_auth_model->getDB(); 
	  	$this->APP = $this->commons->getAPP(); 
	  	
	  	$this->table = 't_voyage';
	}
	
    public function index()
	{
		//if($this->ion_auth_model->is_authorized(USER_ID,strtolower(get_class($this)))==FALSE) $data['error'] = 'You are not authorized to view this menu';
		//else {
			//$this->load->helper('xcrud');
                
                $data['iscustomer'] = $this->cts_model->isCustomer(USER_ID);
                $data['orders'] = $this->cts_model->countCustomerOrderNo(USER_ID);
                $data['complaints'] = $this->cts_model->countCustomerComplaints(USER_ID);
                $data['waiting'] = $this->cts_model->countWaitingForOperation();
                $data['on_progress'] = $this->cts_model->countOnProgress();
                
                $capacity = 60;
                $order = 0;
                $nextDelivery = (null !== $this->cts_model->getNextDeliverOrder()) ? $this->cts_model->getNextDeliverOrder() : null;
                //die(print_r($nextDelivery));
                foreach($nextDelivery as $row => $item){
                    if($nextDelivery[$row]['container_size']==20) $order = $order + 1;
                    elseif($nextDelivery[$row]['container_size']==40) $order = $order + 2;
                }
                $data['available_capacity'] = $capacity - $order;
                $data['booked_order'] = $order;
                $data['next_delivery_schedule'] = $this->cts_model->getNextDelivery();
                $data['total_order'] = $this->cts_model->getTotalMonthlyOrder(Date('m'));
			
		//}
//		$status = $this->cts_model->getStatus();
//		$last_position = $this->cts_model->getLastPosition();
//		
//		$data['cdp_voyage'] = $this->cts_model->getOriginCDP();
//		$data['sby_voyage'] = $this->cts_model->getOriginSBY();
//		$data['ontrain_container'] = $status['ontrain'];
//		$data['cdp_container'] = $last_position['cdp'];
//		$data['sby_container'] = $last_position['sby'];
        
                $chart_status = $this->cts_model->getChartStatus();
                $data['chart_status'] = $chart_status;
                
                $chart_customer = $this->cts_model->getChartCustomer();
                $data['chart_customer'] = $chart_customer;
                
                $chart_owner = $this->cts_model->getChartContainerOwner();
                $data['chart_owner'] = $chart_owner;
		
		$data['app'] = $this->APP;
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
    }
    
    function getData() {
        $arr = $this->cts_model->getDashboard();
        
        
        if(USER_ID==2){
			foreach ($arr as $key => $field) {
				$arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-success btn-sm' onClick='entryTracking(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-check'></i></a><a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-search'></i></a><a href='#' class='xcrud-action btn btn-warning btn-sm' onClick='editVoyage(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-pencil'></i></a><a href='#' class='xcrud-action btn btn-danger btn-sm' onClick='remove(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-remove'></i></a>";
			}
		}
		else{
			foreach ($arr as $key => $field) {
				if($arr[$key]['status'] == 'closed') $arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-search'></i></a>";
				else $arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-success btn-sm' onClick='entryTracking(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-check'></i></a><a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-search'></i></a><a href='#' class='xcrud-action btn btn-warning btn-sm' onClick='editVoyage(".'"'.$arr[$key]['voyage_no'].'"'.");'><i class='fa fa-pencil'></i></a>";
			}
		}
		
        echo json_encode($arr);
    }
    
    function removeVoyage(){
		if ($this->uri->segment(3) !== FALSE) $voyage_no = $this->uri->segment(4);
		else die('Parameter not found');
		
		$this->db->where('voyage_no', $voyage_no);
		if($this->db->delete($this->table)) echo "Delete Success";
		else echo "Delete Error";
		
		return false;
	}
    
    //function getTonage() {
		////$customer = "all";
		//if(isset(CUSTOMER_ID) && CUSTOMER_ID ==0) $customer = "all";
		//else $customer = CUSTOMER_ID;
		
		//$from = Date('Y-m-d');
		//$to = Date('Y-m-d');
        //$arr = $this->monitoring_model->getTotalTonageByDate($customer,$from,$to);
        ////die(print_r($arr));
        //return $arr[0]['total'];
    //}
    
    //function getRitage() {
		////$customer = "all";
		//if(isset(CUSTOMER_ID) && CUSTOMER_ID ==0) $customer = "all";
		//else $customer = CUSTOMER_ID;
		
		//$from = Date('Y-m-d');
		//$to = Date('Y-m-d');
        //$arr = $this->monitoring_model->getTotalRitageByDate($customer,$from,$to);
        ////die(print_r($arr));
        //return $arr[0]['total'];
    //}
}
