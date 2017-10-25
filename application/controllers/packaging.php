<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Packaging extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'packaging');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Packaging Manager to view this page');
			redirect('dashboard');
	  	}
	}
    public function bsi()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('PACKAGING BSI');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->fields('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->change_type('target_revenue,revenue,operational_cost,target_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','PACKAGING BSI', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'PACKAGING BSI');
        $data['content'] = $xcrud->render();
        $this->template->display('packaging/bsi',$data);
    }
    public function crm()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('PACKAGING CRM');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->fields('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->change_type('target_revenue,revenue,operational_cost,target_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','PACKAGING CRM', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'PACKAGING CRM');
        $data['content'] = $xcrud->render();
        $this->template->display('packaging/crm',$data);
    }
    public function latinusa()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('PACKAGING LATINUSA');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->fields('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->change_type('target_revenue,revenue,operational_cost,target_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','PACKAGING LATINUSA', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'PACKAGING LATINUSA');
        $data['content'] = $xcrud->render();
        $this->template->display('packaging/latinusa',$data);
    }
    public function posco()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('PACKAGING POSCO');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->fields('periode,target_revenue,revenue,target_cost,operational_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost');
        $xcrud->change_type('target_revenue,revenue,operational_cost,target_cost,material_cost,workshop_cost,man_power_cost,admin_cost,other_cost,beban_aset_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','PACKAGING POSCO', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'PACKAGING POSCO');
        $data['content'] = $xcrud->render();
        $this->template->display('packaging/posco',$data);
    }
}
