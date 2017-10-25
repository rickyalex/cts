<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Report_admin_ori extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation'));
		$group = array('admin','transport');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Transport Manager to view this page');
			redirect('dashboard');
	  	}
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
			$tgl_mulai = $data['tgl_mulai'];
			$tgl_akhir = $data['tgl_akhir'];
			if (isset($_POST['submit'])) {
						$this->montest_par($tgl_mulai,$tgl_akhir);
			}		
		} 
		else
		{
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('mon_by_date', $data);
			$this->load->view('template/footer');
		}
	}

		public function montest_par($tgl_mulai,$tgl_akhir)
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
		
		$query = $this->db->query('call pReportCust("'.$tgl_mulai.'","'.$tgl_akhir.'")');
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
