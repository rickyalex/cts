<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class View_detail extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('ion_auth','form_validation','table'));
		$this->load->model('monitoring_model');
		$group = array('admin','transport');
		if(!$this->ion_auth->in_group($group)){
			$this->session->set_flashdata('message', 'You must be a Transport Manager to view this page');
			redirect('auth/login');
	  	}
	}
    public function getData()
	{
		if ($this->uri->segment(4) !== FALSE)
		{			
			$no_do = $this->uri->segment(4);
			
			$header = $this->monitoring_model->view_header($no_do);
			$detail = $this->monitoring_model->view_detail($no_do);
			
			if(GROUPID==2){
				foreach($detail as $key => $item){
					$detail[$key]['action'] = "<a class='remove' href='#'><i class='glyphicon glyphicon-remove'></a>";
				}
			}
			
			
			//die(print_r($detail));
        
			//$table = "<table class='table table-bordered table-hover table-responsive'>".
				//"<thead><tr><td>No DO</td><td>Nama Kustomer</td><td>No Unit</td><td>Tipe</td><td>Driver</td><td>Produk</td><td>Tgl Transaksi</td><td>Total</td><td>Satuan</td></tr></thead>".
				//"<tbody><tr>";
			
			////$this->fb->log($arr);
			
			//foreach($arr as $ar){
				//foreach($ar as $a){
					//$table .= "<td>$a</td>";
				//}
			//}
			//$table .= "</tr></tbody></table>";
			
			//$this->fb->log($table);
			
			$data['no_do'] = $no_do;
			$data['header'] = $header;
			$data['detail'] = $detail;
			
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('view_detail2', $data);
			//$this->template->display('monitoring_order', $data);
			$this->load->view('template/footer');	
						
		}
		else
		{				
			$data['message']=$this->uri->segment(4);

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('view_detail2', $data);
			$this->load->view('template/footer');

		} 
        
    }
	
	
	public function updateDetail(){
		if ($this->uri->segment(4) !== FALSE)
		{
			$id = $this->uri->segment(4);
			$tonage = $this->uri->segment(6);
			//die("id ".$id." data ".$data);
			$data = array(
               'tonage' => $tonage
            );

			$this->db->where('id', $id);
			$this->db->update('monitoring_detail', $data); 
		}
		else
		{	
			echo "Update Failed";
		}
		
		echo "Update Success";
	}
	
	public function removeDetail(){
		if ($this->uri->segment(3) !== FALSE)
		{
			$id = $this->uri->segment(4);

			$this->db->where('id', $id);
			$this->db->delete('monitoring_detail'); 
		}
		else
		{	
			echo "Delete Failed";
		}
		
		echo "Delete Success";
	}
	
	public function getDetail()
	{
		if ($this->uri->segment(4) !== FALSE)
		{
			$no_do = $this->uri->segment(4);
			//$this->fb->log($no_do);
			//die($no_do);
			$detail = $this->monitoring_model->view_detail($no_do);
			
			
			echo json_encode($detail);
		}
		else
		{				
			$data['message']=$this->uri->segment(4);

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('view_detail2', $data);
			$this->load->view('template/footer');

		} 
		
	}
    
	public function viewTonage()
	{			
		
		if(CUSTOMER_ID!='0') $cust_id = CUSTOMER_ID;
		else $cust_id = 'all';
		$this->fb->log($cust_id);
		
		if($this->uri->segment(3) !== FALSE){
			$from = $this->uri->segment(4);
			$bits_from = explode('-',$from);
			$from_year = $bits_from[0];
			$from_mon = $bits_from[1];
			$from_day = $bits_from[2];
			
			$to = $this->uri->segment(6);
			$bits_to = explode('-',$to);
			$to_year = $bits_to[0];
			$to_mon = $bits_to[1];
			$to_day = $bits_to[2];
			//die($day);
			//if parameter is given, get tonage on that date
			$result = $this->getTonage($cust_id,$from,$to);
			$total = $this->monitoring_model->getTotalTonageByDate($cust_id,$from,$to);
			$data['detail'] = $result;
			$data['total'] = $total[0]['total'];
			$data['from'] = $bits_from;
			$data['to'] = $bits_to;
		}
		else{
			//else, select tonage today
			$result = $this->monitoring_model->getTonageToday($cust_id);
			$from = Date('y-m-d');
			$to = Date('y-m-d');

			$from = Date('y-m-d');
			$to = Date('y-m-d');
			$result = $this->getTonage($cust_id,$from,$to);
			
			$total = $this->monitoring_model->getTotalTonageByDate($cust_id,$from,$to);
			$data['total'] = $total[0]['total'];
			$data['detail'] = $result;
		}
			
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('view_detail_tonage', $data);
			$this->load->view('template/footer'); 
		
        
    }
	
    public function getTonage($cust_id,$from,$to)
	{			
		$result = $this->monitoring_model->getTonageByDate($cust_id,$from,$to);
		return $result;
    }
    
    public function viewRitage()
	{			
		
		if(CUSTOMER_ID!='0') $cust_id = CUSTOMER_ID;
		else $cust_id = 'all';
		$this->fb->log($cust_id);
		
		if($this->uri->segment(3) !== FALSE){
			$from = $this->uri->segment(4);
			$bits_from = explode('-',$from);
			$from_year = $bits_from[0];
			$from_mon = $bits_from[1];
			$from_day = $bits_from[2];
			
			$to = $this->uri->segment(6);
			$bits_to = explode('-',$to);
			$to_year = $bits_to[0];
			$to_mon = $bits_to[1];
			$to_day = $bits_to[2];
			//die($day);
			//if parameter is given, get tonage on that date
			$result = $this->getRitage($cust_id,$from,$to);
			$total = $this->monitoring_model->getTotalRitageByDate($cust_id,$from,$to);
			$data['detail'] = $result;
			$data['total'] = $total[0]['total'];
			$data['from'] = $bits_from;
			$data['to'] = $bits_to;
		}
		else{
			//else, select tonage today
			$from = Date('y-m-d');
			$to = Date('y-m-d');
			$result = $this->getRitage($cust_id,$from,$to);
			$total = $this->monitoring_model->getTotalRitageByDate($cust_id,$from,$to);
			//print_r($total);
			//die();
			$data['total'] = $total[0]['total'];
			$data['detail'] = $result;
		}

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('view_detail_ritage', $data);
		$this->load->view('template/footer'); 
        
    }
	
	public function getRitage($cust_id,$from,$to)
	{			
		$result = $this->monitoring_model->getRitageByDate($cust_id,$from,$to);
		return $result;
    }

	public function index()
	{
		ob_start();
	}
	
}
