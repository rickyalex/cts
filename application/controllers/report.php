<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation'));
		$group = array('admin','holcim');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Packaging Manager to view this page');
			redirect('dashboard');
	  	}
	}
    public function realization()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('v_sum_tonnage_per_day');
        $data['content'] = $xcrud->render();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/realization', $data);
        //$this->template->display('packaging/bsi',$data);
		$this->load->view('template/footer');
    }

	public function mon_by_date()
	{
		ob_start();
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		if ($this->form_validation->run() == true)
		{			
			$data = array(
							'tgl_mulai'		=> $this->input->post('tgl_mulai'),
							'tgl_akhir'		=> $this->input->post('tgl_akhir')
						);
			// $tgl_mulai = substr($data['tgl_mulai'],6,4)."-".substr($data['tgl_mulai'],0,2)."-".substr($data['tgl_mulai'],3,2);
			// $tgl_akhir = substr($data['tgl_akhir'],6,4)."-".substr($data['tgl_akhir'],0,2)."-".substr($data['tgl_akhir'],3,2);
			$tgl_mulai = $data['tgl_mulai'];
			$tgl_akhir = $data['tgl_akhir'];
			if (isset($_POST['submit'])) {
						// echo($tgl_mulai);
						// echo('<br>');
						// die($tgl_akhir);
						$this->montest_par($tgl_mulai,$tgl_akhir);
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
			$this->load->view('mon_by_date', $data);
			$this->load->view('template/footer');

		}
	}
	
	public function report_admin()
	{
		ob_start();
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'required');
		$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'required');
		if ($this->form_validation->run() == true)
		{			
			$data = array(
							'tgl_mulai'		=> $this->input->post('tgl_mulai'),
							'tgl_akhir'		=> $this->input->post('tgl_akhir')
						);
			// $tgl_mulai = substr($data['tgl_mulai'],6,4)."-".substr($data['tgl_mulai'],0,2)."-".substr($data['tgl_mulai'],3,2);
			// $tgl_akhir = substr($data['tgl_akhir'],6,4)."-".substr($data['tgl_akhir'],0,2)."-".substr($data['tgl_akhir'],3,2);
			$tgl_mulai = $data['tgl_mulai'];
			$tgl_akhir = $data['tgl_akhir'];
			if (isset($_POST['submit'])) {
						// echo($tgl_mulai);
						// echo('<br>');
						// die($tgl_akhir);
						$this->report_admin_par($tgl_mulai,$tgl_akhir);
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
			$this->load->view('report_admin', $data);
			$this->load->view('template/footer');

		}
	}

		public function montest_par($tgl_mulai,$tgl_akhir)
    {
		
		// $data['pembuka'] = $this->db->get('tbl_part_request');
		$data['url'] = base_url()."report/montest";
		$data['title']="Monitoring Order";

		$this->load->library('table');

		$tmpl = array (
		'table_open'          => '<table class="xcrud-list table table-striped table-hover table-bordered">',

		'heading_row_start'   => '<tr class="text-center">',
		'heading_row_end'     => '</tr>',
		'heading_cell_start'  => '<th class="text-center">',
		'heading_cell_end'    => '</th>',

		'row_start'           => '<tr class="text-center">',
		'row_end'             => '</tr>',
		'cell_start'          => '<td class="text-center">',
		'cell_end'            => '</td>',

		'row_alt_start'       => '<tr class="text-center">',
		'row_alt_end'         => '</tr>',
		'cell_alt_start'      => '<td class="text-center">',
		'cell_alt_end'        => '</td>',

		'table_close'         => '</table>'
		);

		$this->table->set_template($tmpl); 
		
		// $query = $this->db->query("SELECT request_id, nopol, driver, jml, created_date FROM v_part_request");
		$query = $this->db->query('call pReportCust("'.$tgl_mulai.'","'.$tgl_akhir.'","'.CUSTOMER_ID.'")');
		// $this->table->set_heading('No.', 'Antrian', 'No.Pol', 'Driver', 'Ukuran', 'Kategori', 'Posisi');
		$data['table'] = $this->table->generate($query);
		
		$meta = array(
						'activeMenu' => 'report', // master
						'activeTab' => 'montest' //maintenance
				);					
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/montest', $data);
		$this->load->view('template/footer');
				
    }
	
	public function report_admin_par($tgl_mulai,$tgl_akhir)
    {
		
		$data['url'] = base_url()."report/montest";
		$data['title']="Monitoring Order";

		$this->load->library('table');

		$tmpl = array (
		'table_open'          => '<table class="xcrud-list table table-striped table-hover table-bordered">',

		'heading_row_start'   => '<tr class="text-center">',
		'heading_row_end'     => '</tr>',
		'heading_cell_start'  => '<th class="text-center">',
		'heading_cell_end'    => '</th>',

		'row_start'           => '<tr class="text-center">',
		'row_end'             => '</tr>',
		'cell_start'          => '<td class="text-center">',
		'cell_end'            => '</td>',

		'row_alt_start'       => '<tr class="text-center">',
		'row_alt_end'         => '</tr>',
		'cell_alt_start'      => '<td class="text-center">',
		'cell_alt_end'        => '</td>',

		'table_close'         => '</table>'
		);

		$this->table->set_template($tmpl); 
		//die($tgl_mulai);
		//$query = $this->db->query('call monitoring.trans_rpt_monitoring_slag("'.$tgl_mulai.'","'.$tgl_akhir.'")');
		$DB1 = $this->load->database('default', TRUE);
		$DB2 = $this->load->database('default', TRUE); 
		
		if(CUSTOMER_ID!='') $cust_id = CUSTOMER_ID;
		else $cust_id = '433';
		
		if($cust_id != '0') $query = $DB1->query('call pReportCustTonage("'.$tgl_mulai.'","'.$tgl_akhir.'","'.$cust_id.'")');
		else $query = $DB1->query('call pReportCustTonageAll("'.$tgl_mulai.'","'.$tgl_akhir.'")');
		
		$res = $query->result_array();
		$query->free_result();
		
		if($cust_id != '0') $query2 = $DB2->query('call pReportCustRitage("'.$tgl_mulai.'","'.$tgl_akhir.'","'.$cust_id.'")');
		else $query2 = $DB2->query('call pReportCustRitageAll("'.$tgl_mulai.'","'.$tgl_akhir.'")');
		
		$res2 = $query2->result_array();
		$query2->free_result();
		
		$table = "<table class='xcrud-list table table-striped table-hover table-bordered'><thead class='portlet box green-haze'><tr class='text-center'><td><b>Tipe</b></td>";
		//die(print_r($res));
		
		foreach($res as $re){
			foreach($re as $key => $item){
				$table .= "<td><b>".$key."</b></td>";
			}
		}
		
		$table .= "</tr></thead>";
		
		foreach($res as $re){
			$table .= "<tbody><tr class='text-center'><td>Tonase</td>";
			foreach($re as $r){
				$table .= "<td>".$r."</td>";
			}
		}
		
		$table .= "</tr><tr class='text-center'><td>Ritase</td>";
		
		foreach($res2 as $re2){
			foreach($re2 as $r2){
				$table .= "<td>".$r2."</td>";
			}
		}
		
		$table .= "</tr>";
		
		$table .= "</tbody></table>";
		$data['table'] = $table;
		
		//$data['table'] = $this->table->generate($query);
		
		//die($data['table']);
		
		$meta = array(
						'activeMenu' => 'report', // master
						'activeTab' => 'montest' //maintenance
				);					
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/montest', $data);
		$this->load->view('template/footer');
				
    }
	
		public function montest()
    {
		
		// $data['pembuka'] = $this->db->get('tbl_part_request');
		$data['url'] = base_url()."report/montest";
		$data['title']="Monitoring Order";

		$this->load->library('table');

		$tmpl = array (
		'table_open'          => '<table class="xcrud-list table table-striped table-hover table-bordered">',

		'heading_row_start'   => '<tr class="text-center">',
		'heading_row_end'     => '</tr>',
		'heading_cell_start'  => '<th class="text-center">',
		'heading_cell_end'    => '</th>',

		'row_start'           => '<tr class="text-center">',
		'row_end'             => '</tr>',
		'cell_start'          => '<td class="text-center">',
		'cell_end'            => '</td>',

		'row_alt_start'       => '<tr class="text-center">',
		'row_alt_end'         => '</tr>',
		'cell_alt_start'      => '<td class="text-center">',
		'cell_alt_end'        => '</td>',

		'table_close'         => '</table>'
		);

		$this->table->set_template($tmpl); 
		
		// $query = $this->db->query("SELECT request_id, nopol, driver, jml, created_date FROM v_part_request");
		$query = $this->db->query('call pReport("2016-02-01","2016-02-29")');
		// $this->table->set_heading('No.', 'Antrian', 'No.Pol', 'Driver', 'Ukuran', 'Kategori', 'Posisi');
		$data['table'] = $this->table->generate($query);
		
		$meta = array(
						'activeMenu' => 'report', // master
						'activeTab' => 'montest' //maintenance
				);					
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('report/montest', $data);
		$this->load->view('template/footer');
				
    }
		
}
