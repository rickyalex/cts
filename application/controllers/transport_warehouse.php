<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Transport_warehouse extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'transport warehouse');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Transport Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	}
    public function index()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Transport Warehouse Tangerang');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,ujo_cost,maintenance_cost,admin_cost,man_power_cost,outsource_cost,beban_aset_cost,beban_leasing_cost,other_cost,bulk,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,ujo_cost,maintenance_cost,admin_cost,man_power_cost,outsource_cost,beban_aset_cost,beban_leasing_cost,other_cost,bulk,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,ujo_cost,maintenance_cost,admin_cost,man_power_cost,outsource_cost,beban_aset_cost,beban_leasing_cost,other_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','TRANSPORT WAREHOUSE', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'TRANSPORT WAREHOUSE');
        $data['content'] = $xcrud->render();
        $this->template->display('transport/warehouse',$data);
    }
}
