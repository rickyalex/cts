<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trace_container extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation','Commons'));
		$this->load->model('cts_model');
		$this->DB = $this->ion_auth_model->getDB(); 
	}
	
    public function trace_container($container_no)
	{
		//die('container no'.$container_no);
        $data['container_no'] = $container_no;
        
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('container_tracking', $data);
        //$this->template->display('monitoring_order', $data);
		$this->load->view('template/footer');
    }

	public function index()
	{
		ob_start();
		$this->form_validation->set_rules('container_no', 'No SJAB', 'required');
		if ($this->form_validation->run() == true)
		{			
			$data = array(
							'container_no'		=> $this->input->post('container_no')
						);
						
			if (isset($_POST['submit'])) {
						// echo($tgl_mulai);
						// echo('<br>');
						// die($data['do_no']);
						$this->trace_container($data['container_no']);
			}		
		} 
		else
		{
			$meta = array(
							'activeMenu' => 'report', // master
							'activeTab' => 'shift_new' //ujo_shift
					);					
			//$data['title']="Report Per-Shift";
			// $data['mst_users'] = $this->db->get('users');
			// $data['kode_user'] = USER_ID;

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('trace_container');
			$this->load->view('template/footer');

		}
	}
	
	public function getData(){
		if ($this->uri->segment(3) !== FALSE)
        {
			$container_no = $this->uri->segment(4);
			$arr = $this->cts_model->traceContainer($container_no);
		}
		else $arr = array();
		
		
        echo json_encode($arr);
	}
	
}
