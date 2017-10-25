<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Entry_tracking extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->model('monitoring_model');
	}
	
	public function index()
	{
		ob_start();
	}
	
	public function viewData(){

		$no_do = $this->uri->segment(4);
		$result = $this->monitoring_model->getDODetails($no_do);
		$data['no_do'] = $no_do;
		$tonage = isset($result[0]['tonage']) ? $result[0]['tonage'] : 0;
		$nomor_unit = isset($result[0]['nomor_unit']) ? $result[0]['nomor_unit'] : 0;
				
		//$this->form_validation->set_rules('no_unit', 'No Unit', 'required');
		//$this->form_validation->set_rules('last_position', 'Last Position', 'required');
		//$this->form_validation->set_rules('status', 'Status', 'required');
		//$this->form_validation->set_rules('depart_time', 'Depart Time', 'required');
		//if ($this->form_validation->run() == true)
		//{			
			////$data = array(
							////'no_unit'		=> $this->input->post('no_unit'),
							////'last_position'		=> $this->input->post('last_position'),
							////'status'		=> $this->input->post('status'),
							////'depart_time'		=> $this->input->post('depart_time')
						////);
			////$no_unit = $data['no_unit'];
			////$last_position = $data['last_position'];
			////$status = $data['status'];
			////$depart_time = $data['depart_time'];
			
			//if (isset($_POST['submit'])) {
				//$this->submitTracking();
			//}		
		//} 
		//else
		//{
			
			$data['tonage'] = $tonage;
			$data['nomor_unit'] = $nomor_unit;
						
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('entry_tracking',$data);
			$this->load->view('template/footer');
	}

	public function getData()
    {
		$arr = $this->monitoring_model->getDO();
		//die(print_r($arr));
		$select = "";
		
		foreach($arr as $ar){
			$select .= "<option value='".$ar['no_do']."'>".$ar['no_do']."</option>";
		}
		
		return $select;
    }
    
    public function getUnitByDO()
    {
		$no_do = $this->input->post('no_do');
		//die('no do '.$no_do);
		$arr = $this->monitoring_model->getUnitByDO($no_do);
		$res = $arr[0]['nomor_unit'];
		//die('no unit '.$res);
		echo $res;
    }
    
    public function submitTracking()
    {
		$no_do = $this->input->post('no_do');
		//$no_unit = $this->input->post('no_unit');
		$tonage = $this->input->post('tonage');
		$last_position = $this->input->post('last_position');
		$status = $this->input->post('status');
		$depart_time = $this->input->post('depart_time');
		$created_by = $this->input->post('created_by');
		
		//die($created_by);
		
		$res = $this->monitoring_model->submitTracking($no_do,$last_position,$tonage,$depart_time,$status,$created_by);

		echo $res;
    }
		
}
