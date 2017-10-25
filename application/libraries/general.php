<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class General {
	private $obj = NULL;
    function General(){
		$this->obj= & get_instance();
	}
	function privilege_check($page_id, $do = null){
		$sql = "SELECT * FROM tbl_user a, tbl_access b 
				WHERE 
					a.position_id = b.position_id
					AND b.modul = '%s' 
					AND b.%s = '1' 
					AND a.position_id = '%d'";
		$sqlf 	= sprintf($sql,	$page_id, $do,$this->obj->session->userdata('position_id')); 		
		$q 		= $this->obj->db->query($sqlf);
		if ($q->num_rows() > 0)
			return true;
		else 
			return false; 
	}
	public function no_access(){
	    redirect('no_access');
	}
}
