<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Report_semen_pecah extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'bd','direksi','packaging','warehouse1','warehouse2','warehouse3','warehouseclg','warehousebsicbt','transport cilegon','transport dump truck','transport narogong','transport warehouse','freight forwarding','hrd');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a User to view this page');
			redirect('dashboard');
	  	}
	}
    public function transport_narogong()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('TRANSPORT NAROGONG');
		$xcrud->columns('periode,project_name,bulk,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('bulk','Qty Bulk Claim (TON)');
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->where('project_name =', 'TRANSPORT NAROGONG');
		$xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg,bulk');
		$data['content'] = $xcrud->render();
		$this->template->display('report/narogong',$data);
    }
    public function transport_warehouse()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('TRANSPORT WAREHOUSE');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
		$xcrud->where('', 'project_name LIKE "TRANSPORT WAREHOUSE%"');
		$xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/transport',$data);
    }
    public function warehouse_holcim_tangerang()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Tangerang');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM TANGERANG');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_tangerang',$data);
    }
    public function warehouse_holcim_serpong()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Serpong');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SERPONG');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_serpong',$data);
    }
    public function warehouse_holcim_joglo()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Joglo');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM JOGLO');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_joglo',$data);
    }
    public function warehouse_holcim_rawalumbu()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Rawalumbu');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM RAWALUMBU');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_rawalumbu',$data);
    }
    public function warehouse_holcim_karawang()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Karawang');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM KARAWANG');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_karawang',$data);
    }
    public function warehouse_holcim_sepale()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Sepale');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SEPALE');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_sepale',$data);
    }
    public function warehouse_holcim_poncol()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Poncol');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM PONCOL');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_poncol',$data);
    }
    public function warehouse_holcim_brumbung()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Brumbung');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BRUMBUNG');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_brumbung',$data);
    }
    public function warehouse_holcim_lempuyangan()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Lempuyangan');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM LEMPUYANGAN');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_lempuyangan',$data);
    }
    public function warehouse_holcim_balapan()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Balapan');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BALAPAN');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_balapan',$data);
    }
    public function warehouse_holcim_purwosari()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Purwosari');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM PURWOSARI');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_purwosari',$data);
    }
    public function warehouse_holcim_klaten()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Klaten');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM KLATEN');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_klaten',$data);
    }
    public function warehouse_holcim_sragen()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Sragen');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SRAGEN');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_sragen',$data);
    }
    public function warehouse_holcim_wonosari()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Holcim Wonosari');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM WONOSARI');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_wonosari',$data);
    }
    public function warehouse_holcim_romokalisari()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Romokalisari');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM ROMOKALISARI');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_romokalisari',$data);
    }
    public function warehouse_holcim_banyuwangi()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Banyuwangi');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BANYUWANGI');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_banyuwangi',$data);
    }
    public function warehouse_holcim_celukan_bawang()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('tbl_project');
		$xcrud->table_name('Report Warehouse Celukan Bawang');
		$xcrud->columns('periode,project_name,40kg,50kg,claim_semen,penjualan_semen');
		$xcrud->change_type('claim_semen,penjualan_semen','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->label('claim_semen','Claim Semen (Rp)');
		$xcrud->label('penjualan_semen','Penjualan Semen (Rp)');
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM CELUKAN BAWANG');
        $xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
		$xcrud->sum('claim_semen,penjualan_semen,40kg,50kg');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_celukan_bawang',$data);
    }
}
