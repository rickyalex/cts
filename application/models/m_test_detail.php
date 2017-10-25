<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_test_detail extends CI_Model{
    private $_table = 'tbl_contract';
	
	public function save($data){
        $arr = array(
            'customer_id' 		=>$data['customer_id'],
            'contract_number'	=>$data['contract_number'],
            'contract_title'	=>$data['contract_title'],
            'scope_of_work'		=>'TRUCKING',
            'commodity'			=>$data['commodity'],
            'sign_date'			=>$data['sign_date'],
            'effective_date'	=>$data['effective_date'],
            'expired_date'		=>$data['expired_date'],
            'last_update'		=>date('Y-m-d H:i:s'),
            'updated_by'		=>$this->session->userdata('user_id')
        );
        $this->db->trans_begin(); //transaction initialize
        $this->db->insert($this->_table,$arr);
        $id_contract =  $this->db->insert_id(); //get last insert ID
        //populate Contract Detail
        $contract_detail = array();
        foreach($data['data2'] as $cd){
            $tmp = array(
                'description' 		=> $cd['description'],
                'unit_of_measure' 	=> $cd['unit_of_measure'],
                'tariff' 			=> $cd['tariff'],
                'id_contract'  		=> $id_contract
            );
            $contract_detail[] = $tmp;
        }
        $this->db->insert_batch('tbl_contract_detail',$contract_detail); //insert batch
        if($this->db->trans_status()===false){
            $this->db->trans_rollback();
            return false;   
        }else{
            $this->db->trans_complete();
            return true;
        }
    }
    public function update($data){
		$id_contract =  $data['id_contract'];
        $arr = array(
            'customer_id' 		=>$data['customer_id'],
            'contract_number'	=>$data['contract_number'],
            'contract_title'	=>$data['contract_title'],
            'scope_of_work'		=>'TRUCKING',
            'commodity'			=>$data['commodity'],
            'sign_date'			=>$data['sign_date'],
            'effective_date'	=>$data['effective_date'],
            'expired_date'		=>$data['expired_date'],
            'last_update'		=>date('Y-m-d H:i:s'),
            'updated_by'		=>$this->session->userdata('user_id')
        );
        $this->db->trans_begin(); //transaction initialize
		$this->db->delete('tbl_contract_detail',array('id_contract'=>$id_contract));
        $this->db->update($this->_table,$arr,array('id_contract'=>$id_contract));
        //populate Contract Detail
		if(isset($data['data2'])) {
        $contract_detail = array();
        foreach($data['data2'] as $cd){
            $tmp = array(
                'description'		=> $cd['description'],
                'unit_of_measure'	=> $cd['unit_of_measure'],
                'tariff'			=> $cd['tariff'],
                'id_contract'		=> $id_contract
            );
            $contract_detail[] = $tmp;
        }
        $this->db->insert_batch('tbl_contract_detail',$contract_detail); //insert batch
		}
        if($this->db->trans_status()===false){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_complete();
            return true;
        }
    }
    public function delete($id_contract){
        $this->db->trans_begin(); //transaction initialize
            $this->db->delete($this->_table,array('id_contract'=>$id_contract));
            $this->db->delete('tbl_contract_detail',array('id_contract'=>$id_contract));
        if($this->db->trans_status()===false){
            $this->db->trans_rollback();
            return false;
        }else{
            $this->db->trans_complete();
            return true;
        }
    }
    public function get_data($offset,$limit,$q=''){
        $sql = "SELECT a.*,b.* FROM {$this->_table} a 
                LEFT JOIN tbl_customer b ON b.customer_id = a.customer_id
                WHERE a.scope_of_work='TRUCKING' 
                ";
        if($q){
            $sql .=" AND b.customer_name LIKE '%{$q}%' 
                     OR a.contract_number LIKE '%{$q}%'
                     OR a.contract_title LIKE '%{$q}%
                     OR a.commodity LIKE '%{$q}%'
                    ";
        }
        $sql .=" ORDER BY a.id_contract DESC ";
        $ret['total'] = $this->db->query($sql)->num_rows();
            $sql .=" LIMIT {$offset},{$limit} ";
        $ret['data']  = $this->db->query($sql)->result();
        return $ret;
    }
    public function get_contract($id_contract){
        $sql ="SELECT a.*,b.customer_name ,c.name FROM tbl_contract a
              LEFT JOIN tbl_customer b ON b.customer_id = a.customer_id
			  LEFT JOIN tbl_user c ON c.user_id = a.updated_by
              WHERE id_contract = ?
              ";
        return $this->db->query($sql,array($id_contract))->row_array();    
    }
	public function get_contract_detail($id_contract){
        $sql ="SELECT a.*,b.* FROM tbl_contract a
              LEFT JOIN tbl_contract_detail b ON b.id_contract = a.id_contract
              WHERE a.id_contract = ?
              ";
        return $this->db->query($sql,array($id_contract))->result_array();    
    }
}