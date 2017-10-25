<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Report_narogong extends CI_Controller{
    
    function __construct(){
		parent::__construct();
		$this->load->model('m_report_narogong','',TRUE);
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		$group = array('admin', 'bd','direksi','packaging','warehouse1','warehouse2','warehouse3','warehouseclg','warehousebsicbt','transport cilegon','transport dump truck','transport narogong','transport warehouse','freight forwarding','hrd');
		if(!$this->ion_auth->in_group($group)){
			redirect('auth/login');
	  	}
	}
    
    function index(){
        foreach($this->m_report_narogong->revenue()->result_array() as $row){
		$data['grafik'][]=(float)$row['Revenue Januari'];
		$data['grafik'][]=(float)$row['Revenue Februari'];
		$data['grafik'][]=(float)$row['Revenue Maret'];
		$data['grafik'][]=(float)$row['Revenue April'];
		$data['grafik'][]=(float)$row['Revenue Mei'];
		$data['grafik'][]=(float)$row['Revenue Juni'];
		$data['grafik'][]=(float)$row['Revenue Juli'];
		$data['grafik'][]=(float)$row['Revenue Agustus'];
		$data['grafik'][]=(float)$row['Revenue September'];
		$data['grafik'][]=(float)$row['Revenue Oktober'];
		$data['grafik'][]=(float)$row['Revenue November'];
		$data['grafik'][]=(float)$row['Revenue Desember'];
		}
		foreach($this->m_report_narogong->target()->result_array() as $row){
		$data['grafik1'][]=(float)$row['Target Januari'];
		$data['grafik1'][]=(float)$row['Target Februari'];
		$data['grafik1'][]=(float)$row['Target Maret'];
		$data['grafik1'][]=(float)$row['Target April'];
		$data['grafik1'][]=(float)$row['Target Mei'];
		$data['grafik1'][]=(float)$row['Target Juni'];
		$data['grafik1'][]=(float)$row['Target Juli'];
		$data['grafik1'][]=(float)$row['Target Agustus'];
		$data['grafik1'][]=(float)$row['Target September'];
		$data['grafik1'][]=(float)$row['Target Oktober'];
		$data['grafik1'][]=(float)$row['Target November'];
		$data['grafik1'][]=(float)$row['Target Desember'];
		}
		foreach($this->m_report_narogong->ebitda()->result_array() as $row){
		$data['grafik2'][]=(float)$row['Ebitda Januari'];
		$data['grafik2'][]=(float)$row['Ebitda Februari'];
		$data['grafik2'][]=(float)$row['Ebitda Maret'];
		$data['grafik2'][]=(float)$row['Ebitda April'];
		$data['grafik2'][]=(float)$row['Ebitda Mei'];
		$data['grafik2'][]=(float)$row['Ebitda Juni'];
		$data['grafik2'][]=(float)$row['Ebitda Juli'];
		$data['grafik2'][]=(float)$row['Ebitda Agustus'];
		$data['grafik2'][]=(float)$row['Ebitda September'];
		$data['grafik2'][]=(float)$row['Ebitda Oktober'];
		$data['grafik2'][]=(float)$row['Ebitda November'];
		$data['grafik2'][]=(float)$row['Ebitda Desember'];
		}
		foreach($this->m_report_narogong->target_ebitda()->result_array() as $row){
		$data['grafik3'][]=(float)$row['Target Ebitda Januari'];
		$data['grafik3'][]=(float)$row['Target Ebitda Februari'];
		$data['grafik3'][]=(float)$row['Target Ebitda Maret'];
		$data['grafik3'][]=(float)$row['Target Ebitda April'];
		$data['grafik3'][]=(float)$row['Target Ebitda Mei'];
		$data['grafik3'][]=(float)$row['Target Ebitda Juni'];
		$data['grafik3'][]=(float)$row['Target Ebitda Juli'];
		$data['grafik3'][]=(float)$row['Target Ebitda Agustus'];
		$data['grafik3'][]=(float)$row['Target Ebitda September'];
		$data['grafik3'][]=(float)$row['Target Ebitda Oktober'];
		$data['grafik3'][]=(float)$row['Target Ebitda November'];
		$data['grafik3'][]=(float)$row['Target Ebitda Desember'];
		}
		foreach($this->m_report_narogong->cost()->result_array() as $row){
		$data['grafik4'][]=(float)$row['Cost Januari'];
		$data['grafik4'][]=(float)$row['Cost Februari'];
		$data['grafik4'][]=(float)$row['Cost Maret'];
		$data['grafik4'][]=(float)$row['Cost April'];
		$data['grafik4'][]=(float)$row['Cost Mei'];
		$data['grafik4'][]=(float)$row['Cost Juni'];
		$data['grafik4'][]=(float)$row['Cost Juli'];
		$data['grafik4'][]=(float)$row['Cost Agustus'];
		$data['grafik4'][]=(float)$row['Cost September'];
		$data['grafik4'][]=(float)$row['Cost Oktober'];
		$data['grafik4'][]=(float)$row['Cost November'];
		$data['grafik4'][]=(float)$row['Cost Desember'];
		}
		foreach($this->m_report_narogong->target_cost()->result_array() as $row){
		$data['grafik5'][]=(float)$row['Target Cost Januari'];
		$data['grafik5'][]=(float)$row['Target Cost Februari'];
		$data['grafik5'][]=(float)$row['Target Cost Maret'];
		$data['grafik5'][]=(float)$row['Target Cost April'];
		$data['grafik5'][]=(float)$row['Target Cost Mei'];
		$data['grafik5'][]=(float)$row['Target Cost Juni'];
		$data['grafik5'][]=(float)$row['Target Cost Juli'];
		$data['grafik5'][]=(float)$row['Target Cost Agustus'];
		$data['grafik5'][]=(float)$row['Target Cost September'];
		$data['grafik5'][]=(float)$row['Target Cost Oktober'];
		$data['grafik5'][]=(float)$row['Target Cost November'];
		$data['grafik5'][]=(float)$row['Target Cost Desember'];
		}
		foreach($this->m_report_narogong->cost_revenue()->result_array() as $row){
		$data['grafik6'][]=(float)$row['Cost/Revenue Januari'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Februari'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Maret'];
		$data['grafik6'][]=(float)$row['Cost/Revenue April'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Mei'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Juni'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Juli'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Agustus'];
		$data['grafik6'][]=(float)$row['Cost/Revenue September'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Oktober'];
		$data['grafik6'][]=(float)$row['Cost/Revenue November'];
		$data['grafik6'][]=(float)$row['Cost/Revenue Desember'];
		}
		foreach($this->m_report_narogong->target_cost_revenue()->result_array() as $row){
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Januari'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Februari'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Maret'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue April'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Mei'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Juni'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Juli'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Agustus'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue September'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Oktober'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue November'];
		$data['grafik7'][]=(float)$row['Target Cost/Revenue Desember'];
		}
        $this->template->display('graphic/report_narogong',$data);
	}
}
