<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report1 extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation'));
		$group = array('admin');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Packaging Manager to view this page');
			redirect('dashboard');
	  	}
	}
    public function index()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_monitoring');
		$xcrud->table_name('Monitoring Order');
		$xcrud->columns('customer_id,unit_type_id,nopol_id,driver_id,city_id,departure,plant_id,position,status_id,tonnage');
		$xcrud->fields('customer_id,unit_type_id,nopol_id,driver_id,city_id,departure,plant_id,position,status_id,tonnage');
		$xcrud->label(array('customer_id' => 'Customer','unit_type_id' => 'Unit Type','nopol_id' => 'Nopol','driver_id' => 'Driver','city_id' => 'City Destination','departure' => 'Departure','plant_id' => 'Plant','position' => 'Position'));
		$xcrud->label(array('status_id' => 'Status','tonnage' => 'Tonnage'));
		$xcrud->change_type('departure', 'datetime');
		$xcrud->relation('customer_id','tbl_customer','customer_id','customer');
		$xcrud->relation('unit_type_id','tbl_unit_type','unit_type_id','unit_type');
		$xcrud->relation('nopol_id','tbl_nopol','nopol_id','nopol','','','','','','unit_type_id','unit_type_id');
		$xcrud->relation('driver_id','tbl_driver','driver_id','name');
		$xcrud->relation('city_id','tbl_city','city_id','city');
		$xcrud->relation('plant_id','tbl_plant','plant_id','plant');
		$xcrud->relation('status_id','tbl_status','status_id','status');
		//$xcrud->pass_var('user_id', $user_id);
		$xcrud->pass_var('create_date', date('Y-m-d H:i:s'), 'create');
		$xcrud->pass_var('update_date', date('Y-m-d H:i:s'), 'edit');
		$xcrud->where('status_id !=', '1');
        $data['content'] = $xcrud->render();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/realization', $data);
        //$this->template->display('packaging/bsi',$data);
		$this->load->view('template/footer');
    }
}
