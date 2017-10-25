<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Pica extends CI_Controller
{
    function __construct(){
		parent::__construct();
		$this->load->helper('url','language');
		$this->load->library(array('template','ion_auth','form_validation'));
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login');
	  	}
	}
    public function index()
    {
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('tbl_pica');
		$xcrud->table_name('PICA');
		$xcrud->columns('project_name,periode,item,target,actual,action_log,due_date,remark');
		$xcrud->fields('project_name,periode,item,target,actual,action_log,due_date,remark');
		$xcrud->relation('project_name','tbl_group_project','project_name','project_name');
		$xcrud->change_type('target,actual','price','',array('decimals'=>'0','prefix'=>'Rp'));
		$xcrud->column_width('action_log','80%');
		$xcrud->column_cut(100,'action_log');
		$xcrud->change_type('action_log', 'textarea');
		$xcrud->pass_var('year', date('Y'), 'create');
		$xcrud->pass_var('user', USER_ID, 'create');
		$xcrud->where('user =', USER_ID);
		$xcrud->set_attr('project_name',array('id'=>'project_name','onclick'=>'ajax_revenue();'));
		$xcrud->set_attr('periode',array('id'=>'periode','onclick'=>'ajax_revenue();'));
		$xcrud->set_attr('item',array('id'=>'item','onclick'=>'ajax_revenue();'));
		$xcrud->set_attr('actual',array('id'=>'actual'));
		$xcrud->set_attr('target',array('id'=>'target'));
        $data['content'] = $xcrud->render();
        $this->template->display('pica',$data);
    }
	/*public function get_revenue($project_name,$periode,$item) 
	{
		$project_name = urldecode($project_name);
		$periode = urldecode($periode);
		$item = urldecode($item);
		if ($item == 'REVENUE'){
			$this->db->select('revenue');
			$q = $this->db->get_where('v_project_sum_cost', array('v_project_sum_cost.project_name' => $project_name,
															'v_project_sum_cost.periode' => $periode,
															'v_project_sum_cost.year' => date("Y")
														 ), 1); 
				if( $q->num_rows() > 0 )
				{
					echo $q->row()->revenue;
				} 				
		}
		elseif ($item == 'COST'){
			$this->db->select('cost');
			$q = $this->db->get_where('v_project_sum_cost', array('v_project_sum_cost.project_name' => $project_name,
															'v_project_sum_cost.periode' => $periode,
															'v_project_sum_cost.year' => date("Y")
														 ), 1); 
				if( $q->num_rows() > 0 )
				{
					echo $q->row()->cost;
				} 				
		}
		elseif ($item == 'EBITDA'){
			$this->db->select_sum('ebitda');
			$q = $this->db->get_where('v_project_sum_cost', array('v_project_sum_cost.project_name' => $project_name,
															'v_project_sum_cost.periode' => $periode,
															'v_project_sum_cost.year' => date("Y")
														 ), 1); 
				if( $q->num_rows() > 0 )
				{
					echo $q->row()->ebitda;
				} 				
		}
	}
	public function get_target_revenue($project_name,$periode,$item)
	{
		$project_name = urldecode($project_name);
		$periode = urldecode($periode);
		$item = urldecode($item);
		if ($item == 'REVENUE'){
			$this->db->select('target_revenue');
			$q = $this->db->get_where('v_project_sum_cost', array('v_project_sum_cost.project_name' => $project_name,
															'v_project_sum_cost.periode' => $periode,
															'v_project_sum_cost.year' => date("Y")
														 ), 1); 
				if( $q->num_rows() > 0 )
				{
					echo $q->row()->target_revenue;
				} 				
		}
		elseif ($item == 'COST'){
			$this->db->select('target_cost');
			$q = $this->db->get_where('v_project_sum_cost', array('v_project_sum_cost.project_name' => $project_name,
															'v_project_sum_cost.periode' => $periode,
															'v_project_sum_cost.year' => date("Y")
														 ), 1); 
				if( $q->num_rows() > 0 )
				{
					echo $q->row()->target_cost;
				} 				
		}
		elseif ($item == 'EBITDA'){
			$this->db->select('target_ebitda');
			$q = $this->db->get_where('v_project_sum_cost', array('v_project_sum_cost.project_name' => $project_name,
															'v_project_sum_cost.periode' => $periode,
															'v_project_sum_cost.year' => date("Y")
														 ), 1); 
				if( $q->num_rows() > 0 )
				{
					echo $q->row()->target_ebitda;
				} 				
		}
	}*/
}
