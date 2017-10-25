<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voyage extends CI_Controller
{
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation','Commons','fb'));
		
		// check if user logged in 
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        
		$this->load->model('cts_model');
		$this->DB = $this->ion_auth_model->getDB(); 
		$this->table = "t_voyage";
		$this->table_status = "t_voyage_status";
	}

	public function index()
	{
		ob_start();
		die('Parameter not found');
	}
	
	public function addVoyage(){
		
		$data['mode'] = "new";
		$data['all_planning_id'] = json_encode($this->cts_model->getAllPlanning());
		$data['all_container_id'] = json_encode($this->cts_model->getAllContainer());
		$data['voyage_no'] = $this->createVoyageNo();
		
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('form',$data);
		$this->load->view('template/footer');
	}
	
	public function viewVoyage(){
		
		if ($this->uri->segment(3) !== FALSE)
        {
			$voyage_no = $this->uri->segment(4);
			$result = $this->cts_model->getVoyage($voyage_no);
			$container = $this->cts_model->getAllContainer();
			
			$selected_container = "";
			$selected_container .= "<option></option>";
			
			foreach($container as $key => $item){
				//die("res".$result[0]['title']);
				if(isset($result['container_no'])){
					if($container[$key]['id']==$result['container_no']) $selected_container .= '<option value="'.$container[$key]['id'].'" selected>'.$container[$key]['text'].'</option>';
				}
				$selected_container .= '<option value="'.$container[$key]['id'].'" >'.$container[$key]['text'].'</option>';
			}
			
			//die(print_r($result));
			
			$data['mode'] = "view";
			$data['voyage_no'] = $voyage_no;
			$data['result'] = $result;
			$data['selected_container'] = $selected_container;
			
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('form',$data);
			$this->load->view('template/footer');
		
		}
		else die('Parameter not found');
	}
	
	public function editVoyage(){
		
		if ($this->uri->segment(3) !== FALSE)
        {
			$voyage_no = $this->uri->segment(4);
			$result = $this->cts_model->getVoyage($voyage_no);
			$container = $this->cts_model->getAllContainer();
			
			$selected_container = "";
			$selected_container .= "<option></option>";
			
			foreach($container as $key => $item){
				//die("res".$result[0]['title']);
				if(isset($result['container_no'])){
					if($container[$key]['id']==$result['container_no']) $selected_container .= '<option value="'.$container[$key]['id'].'" selected>'.$container[$key]['text'].'</option>';
				}
				$selected_container .= '<option value="'.$container[$key]['id'].'" >'.$container[$key]['text'].'</option>';
			}
			
			$data['mode'] = "update";
			$data['voyage_no'] = $voyage_no;
			$data['result'] = $result;
			$data['selected_container'] = $selected_container;
			
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('form',$data);
			$this->load->view('template/footer');
		
		}
		else die('Parameter not found');
	}
	
	public function entryTracking(){
		if ($this->uri->segment(3) !== FALSE)
        {
			
			$data['voyage_no'] = $this->uri->segment(4);
			$result = $this->cts_model->getVoyage($data['voyage_no']);
			$data['result'] = $result;
			//die(print_r($data));
			
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('entry_tracking',$data);
			$this->load->view('template/footer');
		}
		else die('Parameter not found');
	}
	
	public function addVoyageStatus(){
		
	}
	
	public function createVoyageNo(){
		return strval(Date('YmdGis'));
	}
	
	function getHistory() {
		if ($this->uri->segment(3) !== FALSE) $voyage_no = $this->uri->segment(4);
		else $voyage_no = "";
		
        $arr = $this->cts_model->getHistory($voyage_no);
        
        if(USER_ID==2){
			foreach ($arr as $key => $field) {
				$arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-danger btn-sm' onClick='removeTracking(".'"'.$arr[$key]['id'].'"'.");'><i class='fa fa-remove'></i></a>";
			}
		}
		
        echo json_encode($arr);
    }
	
	public function saveData(){
		foreach($_POST as $key => $value){
			$data[$key] = $this->input->post($key);
			if(empty($data[$key])) $data[$key] = null;
		}
		
		if(isset($data['container_no_bcs'])) {
			$data['container_no'] = $data['container_no_bcs'];
			unset($data['container_type']);
			unset($data['container_size']);
		}
		else {
			$data['container_no'] = $data['container_no_vendor'];
		}
		
		unset($data['container_owner']);
		unset($data['trucking_west']);
		unset($data['trucking_east']);
		unset($data['container_no_bcs']);
		unset($data['container_no_vendor']);
		
		$this->cts_model->submitTableData($this->table,$data);
		echo "Submit Success";
		
		//die(print_r($data));
		
		return false;
	}
	
	public function updateData(){
		foreach($_POST as $key => $value){
			$data[$key] = $this->input->post($key);
			if(empty($data[$key])) $data[$key] = null;
		}
		
		if(isset($data['container_no_bcs'])) {
			$data['container_no'] = $data['container_no_bcs'];
			unset($data['container_type']);
			unset($data['container_size']);
		}
		else {
			$data['container_no'] = $data['container_no_vendor'];
		}
		
		unset($data['container_owner']);
		unset($data['trucking_west']);
		unset($data['trucking_east']);
		unset($data['container_no_bcs']);
		unset($data['container_no_vendor']);
		
		$data['updated_by'] = USER_ID;
		$data['last_updated'] = Date('Y-m-d G:i:s');
		
		$this->db->where('voyage_no', $data['voyage_no']);
		$query = $this->db->update($this->table ,$data);
		echo "Update Success";
		
		//die(print_r($data));
		
		return false;
	}
	
	public function saveTracking(){
		foreach($_POST as $key => $value){
			$data[$key] = $this->input->post($key);
			if(empty($data[$key])) $data[$key] = null;
		}
		
		unset($data['origin']);
		
		$this->cts_model->submitTableData($this->table_status,$data);
		echo "Tracking Success";
		
		//die(print_r($data));
		
		return false;
	}
	
	public function removeTracking(){
		if ($this->uri->segment(3) !== FALSE) $id = $this->uri->segment(4);
		else die('Parameter not found');
		
		$this->db->where('id', $id);
		$this->db->delete($this->table_status); 
		
		return false;
	}
	
	function print_sjab(){
		if ($this->uri->segment(3) !== FALSE) $voyage_no = $this->uri->segment(4);
		else die('Parameter not found');
		
		//$path = $this->config->base_url('assets/rpt/print_sjab.jrxml');
		//$this->load->library('PHPJasperXML');
		//$PHPJasperXML = new PHPJasperXML();
		//$PHPJasperXML->arrayParameter=array("kode"=>"'".$voyage_no."'"
														  //);
		//$PHPJasperXML->load_xml_file($path);
		//$PHPJasperXML->transferDBtoArray($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
		//$PHPJasperXML->outpage("I");	
		//$this->session->set_flashdata('success_message', "Report Show");
		
		$data['flag_print_sjab'] = 'Y';
		
		$this->db->where('voyage_no', $voyage_no);
		$query = $this->db->update($this->table ,$data);
	}
	
	function print_sjr(){
		if ($this->uri->segment(3) !== FALSE) $voyage_no = $this->uri->segment(4);
		else die('Parameter not found');
		
		/* $path = $this->config->base_url('assets/rpt/print_sjr.jrxml');
		$this->load->library('PHPJasperXML');
		$PHPJasperXML = new PHPJasperXML();
		$PHPJasperXML->arrayParameter=array("kode"=>"'".$voyage_no."'"
														  );
		$PHPJasperXML->load_xml_file($path);
		$PHPJasperXML->transferDBtoArray($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
		$PHPJasperXML->outpage("I","Report");			
		$this->session->set_flashdata('success_message', "Report Show"); */
		
		$data['flag_print_sjr'] = 'Y';
		
		$this->db->where('voyage_no', $data['voyage_no']);
		$query = $this->db->update($this->table ,$data);
	}
	
	function print_eir(){
		if ($this->uri->segment(3) !== FALSE) $voyage_no = $this->uri->segment(4);
		else die('Parameter not found');
		
		/* $path = $this->config->base_url('assets/rpt/print_eir.jrxml');
		$this->load->library('PHPJasperXML');
		$PHPJasperXML = new PHPJasperXML();
		$PHPJasperXML->arrayParameter=array("kode"=>"'".$voyage_no."'"
														  );
		$PHPJasperXML->load_xml_file($path);
		$PHPJasperXML->transferDBtoArray($this->db->hostname,$this->db->username,$this->db->password,$this->db->database);
		$PHPJasperXML->outpage("I","Report");			
		$this->session->set_flashdata('success_message', "Report Show"); */
		
		$data['flag_print_eir'] = 'Y';
		
		$this->db->where('voyage_no', $data['voyage_no']);
		$query = $this->db->update($this->table ,$data);
	}
}
