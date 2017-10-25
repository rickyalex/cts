<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Unit_planning extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation','Commons'));
		$this->load->model('cts_model');
		$this->DB = $this->ion_auth_model->getDB(); 
	}

	public function index()
	{
		ob_start();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('unit_planning');
		$this->load->view('template/footer');
	}
	
	public function addPlanning(){
		
		$data['all_planning_id'] = json_encode($this->cts_model->getAllPlanning());
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('add_planning',$data);
		$this->load->view('template/footer');
	}
	
	public function saveData(){
		foreach($_POST as $key => $value){
			$data[$key] = $this->input->post($key);
		}
	}
}
