<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_page extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation'));
		$group = array('admin');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Packaging Manager to view this page');
			redirect('auth/login');
	  	}
	}
    public function index()
	{
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_monitoring');
		$xcrud->default_tab('Monitoring');
		$xcrud->table_name('Monitoring Order');
		$xcrud->columns('customer_id,do_no,commodity_id,unit_type_id,nopol_id,driver_id,city_id,departure,plant_id,Last Position,Status,tonnage,uom_id');
		$xcrud->subselect('Last Position','select position from tbl_update where monitoring_id = {monitoring_id} order by update_id desc limit 1');
		$xcrud->subselect('Status','select status from tbl_update where monitoring_id = {monitoring_id} order by update_id desc limit 1');
		$xcrud->highlight('Status', '=', '', 'red');
		$xcrud->highlight('Status', '=', 'DEPART', '#8DED79');
		$xcrud->highlight('Status', '=', 'UNLOAD', 'yellow');
		$xcrud->highlight('Status', '=', 'RETURN', '#9ADAFF');
		$xcrud->fields('customer_id,commodity_id,unit_type_id,nopol_id,driver_id,city_id,departure,plant_id,tonnage,uom_id');
		$xcrud->label(array('customer_id' => 'Customer','unit_type_id' => 'Unit Type','nopol_id' => 'Nopol','driver_id' => 'Driver','city_id' => 'City Destination','departure' => 'Departure','plant_id' => 'Plant','position' => 'Position'));
		$xcrud->label(array('tonnage' => 'Qty','commodity_id' => 'Commodity','uom_id' => 'UoM'));
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
		//nested
		$monitoring_order = $xcrud->nested_table('Detail Position','monitoring_id','tbl_update','monitoring_id');
		$monitoring_order->relation('status','tbl_status','status','status');
		$monitoring_order->table_name('List Position');
		$monitoring_order->pass_var('update_date', date('Y-m-d H:i:s'), 'create');
		$monitoring_order->columns('update_date,position,status');
		$monitoring_order->fields('position,status');
		$monitoring_order->unset_remove();
		$monitoring_order->unset_edit();
		$monitoring_order->unset_view();
		$monitoring_order->unset_print();
		$monitoring_order->unset_csv();
		$xcrud->pass_var('create_date', date('Y-m-d H:i:s'), 'create');
		$xcrud->where('monitoring_id NOT IN (select monitoring_id from tbl_update where status  = "CLOSE")');
        $data['content'] = $xcrud->render();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('admin_page', $data);
		$this->load->view('template/footer');
    }
}