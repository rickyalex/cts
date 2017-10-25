<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Report extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'bd','direksi','packaging','warehouse1','warehouse2','warehouse3','warehouseclg','warehousebsicbt','transport cilegon','transport dump truck','transport narogong','transport mu','transport warehouse','freight forwarding','hrd');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a User to view this page');
			redirect('dashboard');
	  	}
	}
	public function transport_all()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_project_transport_summary');
        $xcrud->table_name('TRANSPORT ALL');
        $xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_transport">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
        $data['content'] = $xcrud->render();
        $this->template->display('report/transport',$data);
    }
    public function transport_cilegon()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_project_transport');
        $xcrud->table_name('TRANSPORT CILEGON');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'TRANSPORT CILEGON');
        $xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_cilegon">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
        $data['content'] = $xcrud->render();
        $this->template->display('report/cilegon',$data);
    }
    public function transport_cilacap()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_project_transport');
        $xcrud->table_name('TRANSPORT CILACAP');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'TRANSPORT CILACAP');
        $xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_transport_cilacap">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
        $data['content'] = $xcrud->render();
        $this->template->display('report/cilacap',$data);
    }
    public function transport_dump_truck()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_project_transport');
        $xcrud->table_name('TRANSPORT DUMP TRUCK');
        $xcrud->columns('periode,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'TRANSPORT DUMP TRUCK');
        $xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_dump_truck">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
        $data['content'] = $xcrud->render();
        $this->template->display('report/dump_truck',$data);
    }
    public function transport_narogong()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_transport');
		$xcrud->table_name('TRANSPORT NAROGONG');
		$xcrud->columns('periode,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->where('project_name =', 'TRANSPORT NAROGONG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_narogong">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/narogong',$data);
    }
    public function transport_warehouse()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_transport');
		$xcrud->table_name('TRANSPORT WAREHOUSE');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->where('', 'project_name LIKE "TRANSPORT WAREHOUSE%"');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_transport_warehouse">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/transport',$data);
    }
	public function transport_mu()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_transport');
		$xcrud->table_name('TRANSPORT MU');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->where('project_name =', 'TRANSPORT MU');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_transport_mu">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/mu',$data);
    }
    public function warehouse_all()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse_summary');
		$xcrud->table_name('Report All Warehouse');
		$xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_all',$data);
    }
    public function warehouse_holcim()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse_holcim');
		$xcrud->table_name('Report Warehouse Holcim');
		$xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim',$data);
    }
    public function warehouse_holcim_reg1()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Region I');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('region_id =', '1');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_reg1">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_reg2',$data);
    }
    public function warehouse_holcim_tangerang()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Tangerang');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM TANGERANG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_tangerang">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_tangerang',$data);
    }
    public function warehouse_holcim_serpong()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Serpong');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SERPONG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_serpong">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_serpong',$data);
    }
    public function warehouse_holcim_joglo()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Joglo');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM JOGLO');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_joglo">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_joglo',$data);
    }
    public function warehouse_holcim_rawalumbu()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Rawalumbu');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM RAWALUMBU');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_rawalumbu">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_rawalumbu',$data);
    }
    public function warehouse_holcim_karawang()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Karawang');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM KARAWANG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_karawang">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_karawang',$data);
    }
    public function warehouse_holcim_sepale()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Sepale');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SEPALE');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_sepale">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_sepale',$data);
    }
    public function warehouse_holcim_reg2()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Region II');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('region_id =', '2');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_reg2">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_reg3',$data);
    }
    public function warehouse_holcim_poncol()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Poncol');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM PONCOL');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_poncol">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_poncol',$data);
    }
    public function warehouse_holcim_brumbung()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Brumbung');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BRUMBUNG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_brumbung">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_brumbung',$data);
    }
    public function warehouse_holcim_lempuyangan()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Lempuyangan');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM LEMPUYANGAN');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_lempuyangan">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_lempuyangan',$data);
    }
    public function warehouse_holcim_balapan()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Balapan');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BALAPAN');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_balapan">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_balapan',$data);
    }
    public function warehouse_holcim_purwosari()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Purwosari');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM PURWOSARI');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_purwosari">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_purwosari',$data);
    }
    public function warehouse_holcim_klaten()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Klaten');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM KLATEN');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_klaten">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_klaten',$data);
    }
    public function warehouse_holcim_sragen()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Sragen');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM SRAGEN');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_sragen">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_sragen',$data);
    }
    public function warehouse_holcim_wonosari()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Holcim Wonosari');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM WONOSARI');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_wonosari">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_wonosari',$data);
    }
    public function warehouse_holcim_reg3()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Region III');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('region_id =', '3');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_reg3">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_reg3',$data);
    }
    public function warehouse_holcim_romokalisari()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Romokalisari');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM ROMOKALISARI');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_romokalisari">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_romokalisari',$data);
    }
    public function warehouse_holcim_banyuwangi()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Banyuwangi');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM BANYUWANGI');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_banyuwangi">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_banyuwangi',$data);
    }
    public function warehouse_holcim_celukan_bawang()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse Celukan Bawang');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE HOLCIM CELUKAN BAWANG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_holcim_celukan_bawang">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_holcim_celukan_bawang',$data);
    }
    public function warehouse_bsi()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse_bsi');
		$xcrud->table_name('Report Warehouse BSI');
		$xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_bsi">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_bsi',$data);
    }
    public function warehouse_bsi_kretek()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse BSI Kretek');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE BSI KRETEK');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_bsi_kretek">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_bsi_kretek',$data);
    }
    public function warehouse_bsi_cibitung()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse');
		$xcrud->table_name('Report Warehouse BSI Cibitung');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('project_name =', 'WAREHOUSE BSI CIBITUNG');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_bsi_cibitung">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_bsi_cibitung',$data);
    }
    public function warehouse_cilegon()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse_cilegon');
		$xcrud->table_name('Report Warehouse Cilegon');
		$xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_cilegon">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_cilegon',$data);
    }
    public function warehouse_mu()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_warehouse_mu');
		$xcrud->table_name('Report Warehouse MU');
		$xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp '));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_warehouse_mu">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/warehouse_mu',$data);
    }
    public function packaging_all()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_packaging_summary');
		$xcrud->table_name('Report All Packaging');
		$xcrud->columns('periode,year,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_packaging">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/packaging_all',$data);
    }
    public function packaging_crm()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_packaging');
		$xcrud->table_name('Report Packaging CRM');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('', 'project_name LIKE "PACKAGING CRM"');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_packaging_crm">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/packaging_crm',$data);
    }
    public function packaging_bsi()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_packaging');
		$xcrud->table_name('Report Packaging BSI');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('', 'project_name LIKE "PACKAGING BSI"');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_packaging_bsi">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/packaging_bsi',$data);
    }
    public function packaging_latinusa()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_packaging');
		$xcrud->table_name('Report Packaging Latinusa');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('', 'project_name LIKE "PACKAGING LATINUSA"');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_packaging_latinusa">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/packaging_latinusa',$data);
    }
    public function packaging_posco()
    {
		$this->load->helper('xcrud');
		$xcrud = xcrud_get_instance();
		$xcrud->table('v_project_packaging');
		$xcrud->table_name('Report Packaging Posco');
		$xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('', 'project_name LIKE "PACKAGING POSCO"');
		$xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_packaging_posco">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
		$data['content'] = $xcrud->render();
		$this->template->display('report/packaging_posco',$data);
    }
    public function freight_forwarding()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_project_freight_forwarding');
        $xcrud->table_name('Report Freight Forwarding');
        $xcrud->columns('periode,project_name,target_revenue,revenue,target_cost,cost,ebitda,percent_ebitda');
        $xcrud->change_type('target_revenue,revenue,target_cost,cost,ebitda','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $xcrud->change_type('percent_ebitda','price','',array('suffix'=>'%'));
        $xcrud->where('', 'project_name LIKE "FREIGHT FORWARDING"');
        $xcrud->label('percent_ebitda','% Ebitda/Rev');
		$xcrud->column_pattern('periode', '<a href="../graphic/report_freight_forwarding">{value}</a>');
		$xcrud->sum('revenue,cost,ebitda,target_revenue,target_cost');
		$xcrud->highlight('percent_ebitda', '<', 5, 'red');
		$xcrud->highlight('percent_ebitda', '>=', 5, 'yellow');
		$xcrud->highlight('percent_ebitda', '>=', 10, 'green');
		$xcrud->highlight('percent_ebitda', '=', 0, 'white');
        $data['content'] = $xcrud->render();
        $this->template->display('report/freight_forwarding',$data);
    }
	public function pica()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_pica');
		$xcrud->column_width('action_log','80%');
		$xcrud->column_cut(100,'action_log');
		$xcrud->change_type('action_log', 'textarea');
		$xcrud->unset_add();
		$xcrud->unset_edit();
		$xcrud->unset_remove();
        $data['content'] = $xcrud->render();
        $this->template->display('report/pica',$data);
    }
	public function man_power()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_man_power_cost');
		$xcrud->table_name('Report Man Power Cost');
		$xcrud->columns('periode,year,project_name,revenue,man_power_cost');
		$xcrud->change_type('man_power_cost,revenue','price','',array('decimals'=>'0','prefix'=>'Rp'));
        $data['content'] = $xcrud->render();
        $this->template->display('report/man_power',$data);
    }
}
