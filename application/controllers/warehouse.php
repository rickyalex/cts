<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Warehouse extends CI_Controller
{
    
    public function holcim_tangerang()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Tangerang');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM TANGERANG', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM TANGERANG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_tangerang',$data);
    }
    public function holcim_serpong()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Serpong');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM SERPONG', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SERPONG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_serpong',$data);
    }
    public function holcim_rawalumbu()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Rawalumbu');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM RAWALUMBU', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM RAWALUMBU');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_rawalumbu',$data);
    }
    public function holcim_joglo()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Joglo');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM JOGLO', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM JOGLO');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_joglo',$data);
    }
    public function holcim_karawang()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Karawang');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM KARAWANG', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM KARAWANG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_karawang',$data);
    }
    public function holcim_sepale()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Sepale');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM SEPALE', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SEPALE');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_sepale',$data);
    }
    public function holcim_wonosari()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Wonosari');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM WONOSARI', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM WONOSARI');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_wonosari',$data);
    }
    public function holcim_klaten()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Klaten');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM KLATEN', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM KLATEN');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_klaten',$data);
    }
    public function holcim_sragen()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Sragen');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM SRAGEN', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SRAGEN');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_sragen',$data);
    }
    public function holcim_purwosari()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Purwosari');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM PURWOSARI', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM PURWOSARI');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_purwosari',$data);
    }
    public function holcim_balapan()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Balapan');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM BALAPAN', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BALAPAN');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_balapan',$data);
    }
    public function holcim_lempuyangan()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Lempuyangan');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM LEMPUYANGAN', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM LEMPUYANGAN');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_lempuyangan',$data);
    }
    public function holcim_brumbung()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse2');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Brumbung');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM BRUMBUNG', 'create');
        $xcrud->pass_var('region_id','2', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BRUMBUNG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_brumbung',$data);
    }
    public function holcim_romokalisari()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse3');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Romokalisari');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM ROMOKALISARI', 'create');
        $xcrud->pass_var('region_id','3', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM ROMOKALISARI');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_romokalisari',$data);
    }
    public function holcim_banyuwangi()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse3');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Banyuwangi');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM BANYUWANGI', 'create');
        $xcrud->pass_var('region_id','3', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BANYUWANGI');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_banyuwangi',$data);
    }
    public function holcim_celukan_bawang()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse3');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Holcim Celukan Bawang');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,40kg,50kg,claim_semen,penjualan_semen');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost,claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->label('40kg','40kg (Sak)');
		$xcrud->label('50kg','50kg (Sak)');
        $xcrud->pass_var('project_name','WAREHOUSE HOLCIM CELUKAN BAWANG', 'create');
        $xcrud->pass_var('region_id','3', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM CELUKAN BAWANG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/holcim_celukan_bawang',$data);
    }
    public function bsi_cibitung()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehousebsicbt');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse BSI Cibitung');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','WAREHOUSE BSI CIBITUNG', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE BSI CIBITUNG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/bsi_cibitung',$data);
    }
    public function bsi_kretek()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse3');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse BSI Kretek');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','WAREHOUSE BSI KRETEK', 'create');
        $xcrud->pass_var('region_id','3', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE BSI KRETEK');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/bsi_kretek',$data);
    }
    public function mu()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouse1');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse MU Serpong');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','WAREHOUSE MU SERPONG', 'create');
        $xcrud->pass_var('region_id','1', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE MU SERPONG');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/mu',$data);
    }
    public function cilegon()
    {
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'warehouseclg');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Warehouse Manager to view this page');
			redirect('dashboard');
	  	}
	  	
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_project');
        $xcrud->table_name('Warehouse Cilegon');
        $xcrud->columns('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->fields('periode,target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost');
        $xcrud->change_type('target_revenue,target_cost,revenue,operational_cost,man_power_cost,admin_cost,handling_cost,space_cost','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->pass_var('project_name','WAREHOUSE CILEGON', 'create');
        $xcrud->pass_var('create_date', date('Y-m-d'), 'create');
        $xcrud->pass_var('update_date', date('Y-m-d'), 'edit');
        $xcrud->pass_var('year', date('Y'), 'create');
        $xcrud->where('project_name =', 'WAREHOUSE CILEGON');
        $data['content'] = $xcrud->render();
        $this->template->display('warehouse/cilegon',$data);
    }
}
