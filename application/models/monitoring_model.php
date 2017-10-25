<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class monitoring_model extends Ci_Model{

 function view_header($no_do)
 {

	//$query = $this->db->query("SELECT * FROM monitoring.view_monitoring_slag WHERE no_do='$no_do'");
	$query = $this->db->query("SELECT * FROM monitoring.view_monitoring_slag WHERE no_do='$no_do'");
	$res = $query->result_array();
	return $res;

 }
 
 function view_detail($no_do)
 {
	$query = $this->db->query("SELECT id, date_created,tonage,last_position,status,depart_time,created_by FROM monitoring.monitoring_detail WHERE no_do='$no_do'");
	$res = $query->result_array();
	return $res;

 }
 
 function getUnit()
 {
	$query = $this->db->query("SELECT nomor_unit FROM ims.trans_mstr_unit WHERE aktif='Y'");
	$res = $query->result_array();
	return $res;

 }
 
 function getUnitByDO($no_do)
 {
	$query = $this->db->query("SELECT b.nomor_unit as nomor_unit
								FROM ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b 
								WHERE a.no_unit=b.id AND a.no_nota='$no_do'");
	$res = $query->result_array();
	return $res;

 }
 
 function getDODetails($no_do)
 {
	$query = $this->db->query("SELECT IF(EXISTS(select no_do from monitoring.monitoring_detail where no_do='$no_do'),1,0) as result");
	$res = $query->row_array();
    $result = $res['result'];
	if($result==0){
		//new
		$query = $this->db->query("SELECT a.no_nota as no_do, b.nomor_unit as nomor_unit
								FROM ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b
								WHERE a.no_unit=b.id AND a.no_nota='$no_do'");
	}
	else{
		//update
		$query = $this->db->query("SELECT a.no_nota as no_do, b.nomor_unit as nomor_unit, c.tonage
								FROM ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b, monitoring.monitoring_detail c 
								WHERE a.no_unit=b.id AND a.no_nota=c.no_do and c.no_do='$no_do'");
	}
								
	
	$res = $query->result_array();
	return $res;

 }
 
 function getDO()
 {
	//ONLY FOR PRODUCT SLAG, CUSTOMER INDOCEMENT AND GROUP 4
	$query = $this->db->query("SELECT a.no_nota as no_do
								FROM ims.trans_transaksi_ujo_keluar a, ims.trans_transaksi_ujo_keluar_header b 
								WHERE a.idh=b.id AND a.`group_id` = '4'
								AND a.`kode_produk` = '38'
								AND b.`kode_kustomer` = '433'
								ORDER BY a.tgl_transaksi DESC");
	$res = $query->result_array();
	return $res;

 }
 
 function submitTracking($no_do,$last_position,$tonage,$depart_time,$status,$created_by)
 {
	$id = strval(Date('Ymdhis'));
	$date_created = Date('Y-m-d h:i:s');
	
	//$arr = array(
		//'no_do' => $no_do,
		//'last_position' => $last_position,
		//'tonage' => $tonage,
		//'depart_time' => $depart_time,
		//'status' => $status,
		//'created_by' => $created_by
	//);
	
	//die(print_r($arr));
	
	$arr = $this->getUnitByDO($no_do);
	$nomor_unit = $arr[0]['nomor_unit'];
	
	$query = "INSERT INTO monitoring.monitoring_detail (id,no_do,nomor_unit,last_position,tonage,depart_time,status,created_by,date_created)
				VALUES('$id','$no_do','$nomor_unit','$last_position','$tonage','$depart_time','$status','$created_by','$date_created')";
	//die($query);
	$res = $this->db->query($query);
	echo "update success";
 }
 
 function getDashboard() {
    $query = $this->db->query("select no_do,nama_kustomer,status,last_position,nomor_unit,tgl_transaksi,tonage from monitoring.view_monitoring_slag");
    if ($query->num_rows() > 0) {
       $res = $query->result_array();
    }
    else $res = array();
    //$this->fb->log($res);
    return json_encode($res);
	//return $res;
 }
 
 function getTotalTonageByDate($customer,$from,$to) {
	if($customer!="all"){
		$query = $this->db->query("SELECT IF(EXISTS(SELECT SUM(a.tonage) AS total FROM monitoring.monitoring_detail a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c WHERE a.no_do=b.no_nota AND b.idh=c.id AND c.kode_kustomer='$customer' AND DATE(date_created) BETWEEN DATE('$from') AND DATE('$to') GROUP BY c.kode_kustomer),(SELECT SUM(a.tonage) AS total FROM monitoring.monitoring_detail a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c WHERE a.no_do=b.no_nota AND b.idh=c.id AND c.kode_kustomer='$customer' AND DATE(date_created) BETWEEN DATE('$from') AND DATE('$to') GROUP BY c.kode_kustomer),0) AS total");
	}
	else
	{
		$query = $this->db->query("SELECT IF(EXISTS(SELECT SUM(tonage) AS total FROM monitoring.monitoring_detail WHERE DATE(date_created) BETWEEN DATE('$from') AND DATE('$to')),(SELECT SUM(tonage) AS total FROM monitoring.monitoring_detail WHERE DATE(date_created) BETWEEN DATE('$from') AND DATE('$to')),0) AS total");
	}
    $res = $query->result_array();
	return $res;
 }
 
 function getTonageByDate($customer,$from,$to) {
	if($customer!="all"){
		$query = $this->db->query("SELECT a.no_do, a.nomor_unit, a.date_created, a.tonage from monitoring.monitoring_detail a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c where a.no_do=b.no_nota and b.idh=c.id and c.kode_kustomer='$customer' and date(date_created) between date('$from') and date('$to') order by date_created desc");
	}
	else
	{
		$query = $this->db->query("SELECT no_do, nomor_unit, date_created, tonage from monitoring.monitoring_detail where date(date_created) between date('$from') and date('$to') order by date_created desc");
	}
    $res = $query->result_array();
	return $res;
 }

  function getTotalRitageByDate($customer,$from,$to) {
	if($customer!="all"){
		$query = $this->db->query("SELECT IF(EXISTS(SELECT SUM(b.jumlah_ritase) FROM ims.trans_mstr_unit a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c, ims.trans_mstr_route d WHERE a.id=b.no_unit AND b.idh=c.id AND b.kode_route=d.id AND c.kode_kustomer='$customer' AND b.group_id = '4' AND b.kode_produk = '38' AND (d.id = '549' or d.id = '644') AND DATE(tgl_transaksi) BETWEEN DATE('$from') AND DATE('$to') GROUP BY b.group_id, b.kode_produk, c.kode_kustomer),(SELECT SUM(b.jumlah_ritase) FROM ims.trans_mstr_unit a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c, ims.trans_mstr_route d WHERE a.id=b.no_unit AND b.idh=c.id AND b.kode_route=d.id AND c.kode_kustomer='$customer' AND b.group_id = '4' AND b.kode_produk = '38' AND (d.id = '549' or d.id = '644') AND DATE(tgl_transaksi) BETWEEN DATE('$from') AND DATE('$to') GROUP BY b.group_id, b.kode_produk, c.kode_kustomer),0) AS total");
	}
	else
	{
		//get ritage dumptruck (slag) today
		$query = $this->db->query("SELECT IF(EXISTS(SELECT SUM(a.jumlah_ritase) FROM ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b, ims.trans_mstr_route c WHERE a.no_unit=b.id AND a.kode_route=c.id AND a.group_id = '4' AND a.kode_produk = '38' AND (c.id = '549' or c.id = '644') AND DATE(tgl_transaksi) BETWEEN DATE('$from') AND DATE('$to') AND jumlah_ritase > 0 GROUP BY a.group_id, a.kode_produk),(SELECT SUM(a.jumlah_ritase) FROM ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b, ims.trans_mstr_route c WHERE a.no_unit=b.id AND a.kode_route=c.id AND a.group_id = '4' AND a.kode_produk = '38' AND (c.id = '549' or c.id = '644') AND DATE(tgl_transaksi) BETWEEN DATE('$from') AND DATE('$to') AND jumlah_ritase > 0 GROUP BY a.group_id, a.kode_produk),0) AS total");
	}
    $res = $query->result_array();
	return $res;
 }
 
 function getRitageByDate($customer,$from,$to) {
	if($customer!="all"){
		$query = $this->db->query("SELECT b.no_nota, a.nomor_unit, b.tgl_transaksi, b.jumlah_ritase from ims.trans_mstr_unit a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c, ims.trans_mstr_route d where a.id=b.no_unit and b.idh=c.id and c.kode_kustomer='$customer' and b.kode_route=d.id and b.group_id = '4' and b.kode_produk = '38' and (d.id = '549' or d.id = '644') and date(tgl_transaksi) between date('$from') and date('$to')");
	}
	else
	{
		//get ritage dumptruck (slag) today
		$query = $this->db->query("SELECT a.no_nota, b.nomor_unit, a.tgl_transaksi, a.jumlah_ritase from ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b, ims.trans_mstr_route c where a.no_unit=b.id and a.kode_route=c.id and a.group_id = '4' and a.kode_produk = '38' and (c.id = '549' or c.id = '644') and date(tgl_transaksi) between date('$from') and date('$to') and jumlah_ritase > 0");
	}
    $res = $query->result_array();
	return $res;
 }
 
 function getTonageToday($customer) {
	if($customer!="all"){
		$query = $this->db->query("SELECT a.no_do, a.nomor_unit, a.tonage from monitoring.monitoring_detail a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c where a.no_do=b.no_nota and b.idh=c.id and c.kode_kustomer='$customer' and date(date_created) = date(now())");
	}
	else
	{
		$query = $this->db->query("SELECT no_do, nomor_unit, tonage from monitoring.monitoring_detail where date(date_created) = date(now())");
	}
    $res = $query->result_array();
	return $res;
 }
 
 function getRitageToday($customer) {
	if($customer!="all"){
		$query = $this->db->query("SELECT b.no_nota, a.nomor_unit, b.jumlah_ritase from ims.trans_mstr_unit a, ims.trans_transaksi_ujo_keluar b, ims.trans_transaksi_ujo_keluar_header c where a.id=b.no_unit and b.idh=c.id and c.kode_kustomer='$customer' and b.group_id = '4' and b.kode_produk = '38' and date(tgl_transaksi) = date(now())");
	}
	else
	{
		//get ritage dumptruck (slag) today
		$query = $this->db->query("SELECT a.no_nota, b.nomor_unit, a.jumlah_ritase from ims.trans_transaksi_ujo_keluar a, ims.trans_mstr_unit b where a.no_unit=b.id and a.group_id = '4' and a.kode_produk = '38' and date(tgl_transaksi) = date(now()) and jumlah_ritase > 0");
	}
    $res = $query->result_array();
	return $res;
 }
}
