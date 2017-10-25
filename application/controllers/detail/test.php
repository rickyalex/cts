<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Trucking extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('is_login'))redirect('login');
		if(!$this->general->privilege_check(TRUCKING,'view'))
		    $this->general->no_access();
		$this->session->set_userdata('menu','contract');	
		$this->session->set_userdata('tab','trucking');	
		$this->load->model('trucking_model');
	}
	public function index(){
	    $data = array('title'=>'BCS | Trucking Contract');
	    $this->_render('trucking/trucking',$data);
	}
	private function _render($view,$data = array()){
	    $this->load->view('template/header',$data);
	    $this->load->view('template/sidebar');
	    $this->load->view($view,$data);
	    $this->load->view('template/footer');
	}
	private function _select_customer(){
	    return $this->db->get('tbl_customer')->result();
	}
	public function add(){
	    if(!$this->general->privilege_check(TRUCKING,'add'))
		    $this->general->no_access();
	    $data = array(
	            'title'=>'Add Contract - BCS',
	            'select_customer' => $this->_select_customer()
	         );
	    $this->_render('trucking/add_contract',$data);
	}
	public function save(){
	    $data = $this->input->post(null,true);
	    if($this->trucking_model->save($data)){
	        redirect('contract/trucking');
	    }else{
	        show_error("Error occured, please try again");
	    }
	}
	public function detail(){
	    if(!$this->general->privilege_check(TRUCKING,'view'))
		    $this->general->no_access();
	    $id_contract = $this->uri->segment(4);
	    $contract = $this->trucking_model->get_contract($id_contract);
	    $contract_detail    = array();
	    if(!$contract){
	        show_404();
	    }else{
	        $contract_detail = $this->trucking_model->get_contract_detail($id_contract);
	    }    
	    $data = array(
	        'title'=>'Detail Contract - BCS',
	        'contract_detail'=>$contract_detail,'contract'=>$contract);
	    $this->_render('trucking/detail_contract',$data);
	}
	public function edit(){
	    if(!$this->general->privilege_check(TRUCKING,'edit'))
		    $this->general->no_access();
	    $id_contract = $this->uri->segment(4);
	    $contract = $this->trucking_model->get_contract($id_contract);
	    $contract_detail    = array();
	    if(!$contract){
	        show_404();
	    }else{
	        $contract_detail = $this->trucking_model->get_contract_detail($id_contract);
	    }    
	    $data = array(
	        'title'=>'Detail Contract - BCS','id_contract'=>$id_contract,
			'contract'=>$contract,
			'contract_detail'=>$contract_detail,
	        'select_customer' => $this->_select_customer()
	        );
	    $this->_render('trucking/edit_contract',$data);
	}
	public function update(){
	    $data = $this->input->post(null,true);
	    if($this->trucking_model->update($data)){
	        redirect('contract/trucking');
	    }else{
	        show_error("Error occured, please try again");
	    }
	}
	public function delete(){
	    if(!$this->general->privilege_check(TRUCKING,'remove'))
		    $this->general->no_access();
		$id_contract = $this->uri->segment(4);
		$this->trucking_model->delete($id_contract);
		redirect('contract/trucking');
	}
	//fill the table
	public function get_data(){
	    $limit = $this->config->item('limit');
	    $offset= $this->uri->segment(4,0);
	    $q     = isset($_POST['q']) ? $_POST['q'] : '';	    
	    $data  = $this->trucking_model->get_data($offset,$limit,$q);
	    $rows  = $paging = '';
	    $total = $data['total'];
	    if($data['data']){
	        $i= $offset+1;
	        $j= 1;
	        foreach($data['data'] as $r){
	            $rows .='<tr>';
	                $rows .='<td>'.$i.'</td>';
	                $rows .='<td width="10%">'.$r->customer_name.'</td>';
	                $rows .='<td width="10%">'.$r->contract_number.'</td>';
	                $rows .='<td width="25%">'.$r->contract_title.'</td>';
	                $rows .='<td width="10%">'.$r->commodity.'</td>';
	                $rows .='<td width="10%">'.$r->sign_date.'</td>';
	                $rows .='<td width="10%">'.$r->effective_date.'</td>';
	                $rows .='<td width="10%">'.$r->expired_date.'</td>';
	                $rows .='<td width="10%" align="center">';
	                $rows .='<a title="Detail" class="a-success" href="'.base_url().'contract/trucking/detail/'.$r->id_contract.'">
	                            <i class="fa fa-lightbulb-o"></i>  
	                        </a> ';
	                $rows .='<a title="Edit" class="a-warning" href="'.base_url().'contract/trucking/edit/'.$r->id_contract.'">
	                            <i class="fa fa-pencil"></i>  
	                        </a> ';
	                $rows .='<a title="Delete" class="a-danger" href="'.base_url().'contract/trucking/delete/'.$r->id_contract.'">
	                                <i class="fa fa-times"></i>  
	                        </a> ';
					$rows .='</td>';
	            $rows .='</tr>';
	            ++$i;
	            ++$j;
	        }
	        $paging .= '<li><span class="page-info">Displaying '.($j-1).' Of '.$total.' items</span></i></li>';
            $paging .= $this->_paging($total,$limit);
	    }else{
	        $rows .='<tr>';
	            $rows .='<td colspan="9">No Data to Display</td>';
	        $rows .='</tr>';
	    }
	    echo json_encode(array('rows'=>$rows,'total'=>$total,'paging'=>$paging));
	}
	private function _paging($total,$limit){
	    $config = array(
            'base_url'  => base_url().'contract/trucking/get_data/',
            'total_rows'=> $total, 
            'per_page'  => $limit,
			'uri_segment'=> 4
        );
        $this->pagination->initialize($config);
        return $this->pagination->create_links();
	}
}