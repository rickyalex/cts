<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DatatableControl extends CI_Controller {
		
	public function index() {
		$this -> load -> view('datatable');
		//$data = array('title'=>'BCS | Trucking Contract');
	    //$this->_render('trucking/trucking',$data);
	}
	public function dataTable() {
		$this -> load -> library('Datatable', array('model' => 'order_dt', 'rowIdCol' => 'monitoring_id'));
		
		$jsonArray = $this -> datatable -> datatableJson(array(
                'daperture' => 'date'
            ));
		$this -> output -> set_header("Pragma: no-cache");
        $this -> output -> set_header("Cache-Control: no-store, no-cache");
        $this -> output -> set_content_type('application/json') -> set_output(json_encode($jsonArray));
		
		//$this->load->view('template/header',$data);
	    //$this->load->view('template/sidebar');
	    //$this->load->view($view,$data);
	    //$this->load->view('template/footer');
		
	}
}
?>