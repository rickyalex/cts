<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trace extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation'));
		$group = array('admin','holcim');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Holcim Manager to view this page');
			redirect('auth/login');
	  	}
	}
    public function trace_par($do_no)
	{
        $this->load->helper('xcrud');
		//$this->data['title'] = "Trace";
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_monitoring');
		$xcrud->default_tab('Monitoring');
		$xcrud->table_name('Monitoring Order');
		$xcrud->columns('do_no,commodity_id,unit_type_id,nopol_id,driver_id,city_id,departure,plant_id,Last Position,Status,tonnage,uom_id');
		$xcrud->subselect('Last Position','select position from tbl_update where monitoring_id = {monitoring_id} order by update_id desc limit 1');
		$xcrud->subselect('Status','select status from tbl_update where monitoring_id = {monitoring_id} order by update_id desc limit 1');
		$xcrud->fields('commodity_id,unit_type_id,nopol_id,driver_id,city_id,departure,plant_id,tonnage,uom_id');
		$xcrud->label(array('unit_type_id' => 'Unit Type','nopol_id' => 'Truck ID','driver_id' => 'Driver','city_id' => 'Destination','departure' => 'Departure','plant_id' => 'Plant','position' => 'Position'));
		$xcrud->label(array('tonnage' => 'Qty','commodity_id' => 'Commodity','uom_id' => 'UoM','do_no' => 'No DO'));
		$xcrud->change_type('departure', 'datetime');
		$xcrud->relation('customer_id','tbl_customer','customer_id','customer');
		$xcrud->relation('commodity_id','tbl_commodity','commodity_id','commodity');
		$xcrud->relation('unit_type_id','tbl_unit_type','unit_type_id','unit_type');
		$xcrud->relation('nopol_id','tbl_nopol','nopol_id','nopol');
		$xcrud->relation('driver_id','tbl_driver','driver_id','name');
		$xcrud->relation('city_id','tbl_city','city_id','city');
		$xcrud->relation('plant_id','tbl_plant','plant_id','plant');
		$xcrud->relation('uom_id','tbl_uom','uom_id','uom');
		$xcrud->unset_view();
		$xcrud->unset_remove();
		$xcrud->unset_edit();
		$xcrud->unset_print();
		$xcrud->unset_csv();
		$xcrud->unset_add();
		$xcrud->unset_search();
		$xcrud->unset_numbers();
		$xcrud->unset_limitlist();
		//$xcrud->pass_var('user_id', $user_id);
		$xcrud->pass_var('create_date', date('Y-m-d H:i:s'), 'create');
		$xcrud->where('do_no =', $do_no)->where('customer_id =', CUSTOMER_ID);
		//$xcrud->where('', 'do_no LIKE "%'.$do_no.'%"');
        $data['content'] = $xcrud->render();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('monitoring_order', $data);
        //$this->template->display('monitoring_order', $data);
		$this->load->view('template/footer');
    }

	public function index()
	{
		ob_start();
		$this->form_validation->set_rules('do_no', 'No DO', 'required');
		if ($this->form_validation->run() == true)
		{			
			$data = array(
							'do_no'		=> $this->input->post('do_no')
						);
						
			if (isset($_POST['submit'])) {
						// echo($tgl_mulai);
						// echo('<br>');
						// die($data['do_no']);
						$this->trace_par($data['do_no']);
			}		
		} 
		else
		{
			$meta = array(
							'activeMenu' => 'report', // master
							'activeTab' => 'shift_new' //ujo_shift
					);					
			$data['title']="Report Per-Shift";
			// $data['mst_users'] = $this->db->get('users');
			// $data['kode_user'] = USER_ID;

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('trace', $data);
			$this->load->view('template/footer');

		}
	}
	
}