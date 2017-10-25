<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Transport_mu extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'transport mu');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Transport MU Manager to view this page');
			redirect('dashboard');
	  	}
	}
    public function index()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('TRANSPORT MU');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,ujo_cost,maintenance_cost,admin_cost,man_power_cost,outsource_cost,beban_aset_cost,other_cost');
        $xcrud->fields('periode,target_revenue,revenue,target_cost,ujo_cost,maintenance_cost,admin_cost,man_power_cost,outsource_cost,beban_aset_cost,other_cost');
        $xcrud->change_type('target_revenue,revenue,target_cost,ujo_cost,maintenance_cost,admin_cost,man_power_cost,outsource_cost,beban_aset_cost,other_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','TRANSPORT MU', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'TRANSPORT MU');
        $data['content'] = $xcrud->render();
        $this->template->display('transport/mu',$data);
    }
}
