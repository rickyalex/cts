<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class cts_model extends Ci_Model {

    function getDashboard() {
        $query = $this->db->query("SELECT voyage_no, customer_name, origin, date FROM t_voyage");
        if ($query->num_rows() > 0) {
            $res = $query->result_array();
        } else
            $res = array();

        foreach ($res as $key => $item) {
            $query2 = $this->db->query("SELECT status, last_position, depart_time, remarks FROM t_voyage_status WHERE voyage_no = '" . $res[$key]['voyage_no'] . "' ORDER BY id DESC limit 1");
            if ($query2->num_rows() > 0) {
                $res2 = $query2->row_array();

                $res3[$key]['status'] = $res2['status'];
                $res3[$key]['last_position'] = $res2['last_position'];
                $res3[$key]['depart_time'] = $res2['depart_time'];
                $res3[$key]['remarks'] = $res2['remarks'];
            } else {
                $res3[$key]['status'] = null;
                $res3[$key]['last_position'] = null;
                $res3[$key]['depart_time'] = null;
                $res3[$key]['remarks'] = null;
            }

            $res3[$key]['voyage_no'] = $res[$key]['voyage_no'];
            $res3[$key]['customer_name'] = $res[$key]['customer_name'];
            $res3[$key]['origin'] = $res[$key]['origin'];
            $res3[$key]['date'] = $res[$key]['date'];
        }

        return $res3;
    }

    function isCustomer($userid) {
        //USER DIANGGAP CUSTOMER APABILA USERID NYA ADA DI TABLE CUSTOMER LOGIN
        $query = $this->DB->query("SELECT if(exists(select a.id FROM users a, customer_login b where a.id=b.userid and a.id='$userid'),'1','0') as res");

        $res = $query->row()->res;
        $iscustomer = ($res == "1") ? "Y" : "N";
        return $iscustomer;
    }

    function getCustomerID($userid) {
        //USER DIANGGAP CUSTOMER APABILA USERID NYA ADA DI TABLE CUSTOMER LOGIN
        $query = $this->DB->query("SELECT customer_id from customer_login where userid = '$userid'");

        $res = $query->row()->customer_id;
        return $res;
    }

    function getCustomerNameByLogin($customerid) {
        //USER DIANGGAP CUSTOMER APABILA USERID NYA ADA DI TABLE CUSTOMER LOGIN
        $query = $this->DB->query("SELECT b.customer_name from customer_login a, m_customer_tracking b where a.customer_id = b.id and a.customer_id = '$customerid'");
        if ($query->num_rows() > 0) {
            $res = $query->row()->customer_name;
        } else
            $res = "";
        return $res;
    }

    function getCustomerName($customerid) {
        $query = $this->DB->query("SELECT b.customer_name from m_customer_tracking b where b.id = '$customerid'");
        if ($query->num_rows() > 0) {
            $res = $query->row()->customer_name;
        } else
            $res = "";
        return $res;
    }

    function getStatus() {

        $arr = $this->getDashboard();

        $ontrain = 0;
        $ondepo = 0;
        $load = 0;
        $unload = 0;

        foreach ($arr as $key => $item) {
            if ($arr[$key]['status'] == "on train")
                $ontrain++;
            elseif ($arr[$key]['status'] == "on depo")
                $ondepo++;
            elseif ($arr[$key]['status'] == "load")
                $load++;
            elseif ($arr[$key]['status'] == "unload")
                $unload++;
        }

        $res['ontrain'] = $ontrain;
        $res['ondepo'] = $ondepo;
        $res['load'] = $load;
        $res['unload'] = $unload;

        return $res;
    }

    function getLastPosition() {

        $arr = $this->getDashboard();

        $cdp = 0;
        $sby = 0;
        $clg = 0;

        foreach ($arr as $key => $item) {
            if ($arr[$key]['last_position'] == "CDP")
                if ($arr[$key]['status'] == "ON DEPO" || $arr[$key]['status'] == "CLOSED")
                    $cdp++;
                elseif ($arr[$key]['last_position'] == "SBY")
                    $sby++;
                elseif ($arr[$key]['last_position'] == "CLG")
                    $clg++;
        }

        $res['cdp'] = $cdp;
        $res['sby'] = $sby;
        $res['clg'] = $clg;

        return $res;
    }

    function getAllPlanning() {

        $query = $this->db->query("SELECT * FROM t_unit_planning ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getAllContainer() {

        $query = $this->DB->query("SELECT id, container_no as text FROM m_container ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getCustomerOrderNo($userid) {
        $query = $this->DB->query("SELECT distinct a.customer_id, b.order_no FROM customer_login a, cts.t_order b where a.customer_id = b.customer_id and a.userid = '$userid' ORDER by b.id DESC");
        $res = $query->result_array();
        return $res;
    }

    function countCustomerOrderNo($userid) {
        $query = $this->DB->query("SELECT COUNT(a.customer_id) as orders FROM customer_login a, cts.t_order b where a.customer_id = b.customer_id and a.userid = '$userid' ORDER by b.id DESC");
        $res = $query->row()->orders;
        return $res;
    }

    function getAllCustomerComplaints() {
        $query = $this->DB->query("SELECT * FROM customer_complaint ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getCustomerComplaints($userid) {
        $query = $this->DB->query("SELECT b.* FROM customer_login a, customer_complaint b where a.customer_id = b.customer_id and a.userid = '$userid' ORDER by b.id DESC");
        $res = $query->result_array();
        return $res;
    }

    function countCustomerComplaints($userid) {
        $query = $this->DB->query("SELECT COUNT(a.customer_id) as complaint FROM customer_login a, customer_complaint b where a.customer_id = b.customer_id and a.userid = '$userid' ORDER by b.id DESC");
        $res = $query->row()->complaint;
        return $res;
    }

    function countWaitingForOperation() {
        $query = $this->db->query("SELECT COUNT(id) as waiting FROM t_order where order_status='WAITING FOR OPERATION'");
        $res = $query->row()->waiting;
        return $res;
    }

    function countOnProgress() {
        $query = $this->db->query("SELECT COUNT(id) as on_progress FROM t_order where order_status='ON PROGRESS'");
        $res = $query->row()->on_progress;
        return $res;
    }

    function getNextDelivery() {
        $query = $this->db->query("SELECT if(exists(select schedule_date from t_delivery_schedule where schedule_date > date(now()) order by id limit 1),(select schedule_date from t_delivery_schedule where schedule_date > date(now()) order by id limit 1),'-') as schedule_date");
        $res = $query->row()->schedule_date;
        return $res;
    }

    function getNextDeliverOrder() {
        $query = $this->db->query("SELECT a.*, d.*
                                    FROM cts.t_order a,
                                    cts.t_delivery_order b,
                                    cts.t_delivery_schedule c,
                                    (select id, origin, destination, schedule_date, schedule_time from t_delivery_schedule where schedule_date > date(now()) order by id limit 1) d
                                    WHERE a.id = b.order_id and b.delivery_id = c.id and c.id = d.id ORDER by a.id DESC");
        $res = $query->result_array();
        return $res;
    }

    function viewBookedOrder($schedule) {
        $query = $this->db->query("SELECT a.* FROM cts.t_order a, cts.t_delivery_order b, cts.t_delivery_schedule c WHERE a.id = b.order_id AND b.delivery_id = c.id AND c.schedule_date = '$schedule'");
        $res = $query->result_array();
        return $res;
    }

    function getTotalMonthlyOrder($month) {
        $query = $this->db->query("SELECT count(id) as total FROM cts.t_order where month(date_created) = $month");
        $res = $query->row()->total;
        return $res;
    }

    function getOrderData() {
        $query = $this->db->query("SELECT *, DATEDIFF(request_date,now()) as days_remaining FROM t_order ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getOrderDetail($orderno) {
        $query = $this->db->query("SELECT * FROM t_order where order_no = '$orderno' ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getOrderHistory($id) {
        $query = $this->db->query("SELECT * FROM t_order_history where order_id = '$id' ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getAllCustomer() {

        $query = $this->DB->query("SELECT id as value, customer_name as text FROM m_customer_tracking ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getAllPIC() {

        $query = $this->DB->query("SELECT id as value, nama_karyawan as text FROM hris.m_karyawan a, hris.m_title b WHERE a.aktif='Y' and a.title = b.title_code and b.title like '%marketing%'");
        $res = $query->result_array();
        return $res;
    }

    function getAllUnit() {

        $query = $this->DB2->query("SELECT id as value, nomor_unit as text FROM ims.trans_mstr_unit where aktif = '1' ORDER by nomor_unit");
        $res = $query->result_array();
        return $res;
    }

    function getNomorUnit($id) {

        $query = $this->DB2->query("SELECT nomor_unit FROM ims.trans_mstr_unit where id = '" . $id . "'");
        $res = $query->row()->nomor_unit;
        return $res;
    }

    function getContainerNo($id) {

        $query = $this->DB->query("SELECT container_no FROM m_container where id = '" . $id . "'");
        $res = $query->row()->container_no;
        return $res;
    }

    function getContainerList() {

        $query = $this->DB->query("select a.id as container_id, a.container_no, a.size, a.owner, b.customer, b.last_position, b.status, b.last_updated
from master.m_container a
join cts.t_tracking b on (a.id = b.container_no)
where a.active = 'Y' order by b.last_updated desc, a.owner");
        $res = $query->result_array();
        return $res;
    }

    function getVoyage($voyage_no) {

        $query = $this->db->query("SELECT * FROM t_voyage WHERE voyage_no ='$voyage_no' ORDER by id DESC");
        $res = $query->row_array();
        return $res;
    }

    function getHistory($voyage_no) {

        $query = $this->db->query("SELECT * FROM t_voyage_status WHERE voyage_no ='$voyage_no' ORDER by id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getIdleCDP() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_tracking WHERE last_position like '%ON DEPO CDP%' and status ='EMPTY'");
        $res = $query->row()->total;
        return $res;
    }

    function getParkingEmptyCDP() {

        $query = $this->db->query("SELECT container_no, DATEDIFF(now(),last_updated) as parking FROM t_tracking WHERE last_position like '%ON DEPO CDP%' and status ='EMPTY'");
        $res = $query->row()->total;
        return $res;
    }

    function getParkingEmptySBY() {

        $query = $this->db->query("SELECT container_no, DATEDIFF(now(),last_updated) as parking FROM t_tracking WHERE last_position like '%ON DEPO SBY%' and status ='EMPTY'");
        $res = $query->row()->total;
        return $res;
    }

    function getIdleSBY() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_tracking WHERE last_position like '%ON DEPO SBY%' and status ='EMPTY'");
        $res = $query->row()->total;
        return $res;
    }

    function getTruckingCDP() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_tracking WHERE last_position like '%TRUCK CDP%'");
        $res = $query->row()->total;
        return $res;
    }

    function getTruckingSBY() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_tracking WHERE last_position like '%TRUCK SBY%'");
        $res = $query->row()->total;
        return $res;
    }

    function getTraintoCDP() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_tracking WHERE last_position like '%TRAIN TO CDP%'");
        $res = $query->row()->total;
        return $res;
    }

    function getTraintoSBY() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_tracking WHERE last_position like '%TRAIN TO SBY%'");
        $res = $query->row()->total;
        return $res;
    }

    function getSBYContainers() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_voyage_status WHERE last_position = 'SBY' and status not in ('ON TRAIN','LOAD','UNLOADING')");
        $res = $query->row()->total;
        return $res;
    }

    function getChartStatus() {

        $query = $this->db->query("SELECT CONCAT(REPLACE(last_position,'_',' '),' ',status) as status, COUNT(id) as total FROM t_tracking group by last_position, status");
        $res = $query->result_array();
        return $res;
    }

    function getChartCustomer() {

        $query = $this->db->query("SELECT b.customer_name as customer, COUNT(a.id) as total FROM t_tracking a left join master.m_customer_tracking b on a.customer = b.id group by customer");
        $res = $query->result_array();
        return $res;
    }

    function getChartContainerOwner() {

        $query = $this->DB->query("SELECT owner, COUNT(id) as total FROM m_container group by owner");
        $res = $query->result_array();
        return $res;
    }

    function getOriginCDP() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_voyage WHERE origin = 'CDP'");
        $res = $query->row()->total;
        return $res;
    }

    function getOriginSBY() {

        $query = $this->db->query("SELECT COUNT(id) as total FROM t_voyage WHERE origin = 'SBY'");
        $res = $query->row()->total;
        return $res;
    }

    function traceContainer($container_no) {

        $query = $this->db->query("SELECT * FROM t_voyage a, master.m_container b WHERE a.container_no = b.id AND (a.container_no = '$container_no' OR b.equipment_no = '$container_no' OR b.id = '$container_no') ORDER by a.id DESC");
        $res = $query->result_array();
        return $res;
    }

    function getRunningNumber($table) {

        $query = $this->db->query("SELECT MAX(id) as running_no FROM " . $table . "");
        $res = $query->row()->running_no;
        return $res + 1;
    }

    function submitTableData($table, $data) {
        $data['date_created'] = Date('Y-m-d G:i:s');
        $data['created_by'] = USER_ID;
        $this->db->insert($table, $data);
    }

    function submitComplaint($table, $data) {
        $data['date_created'] = Date('Y-m-d G:i:s');
        $data['created_by'] = USER_ID;
        $this->DB->insert($table, $data);
    }

    function submitContainerTracking($table, $data) {
        $this->db->insert($table, $data);
    }

    function updateLastRecord($table, $container_no) {
        $query = $this->db->query("SELECT MAX(id) as last_id FROM $table WHERE container_no = '" . $container_no . "'");
        $last_id = $query->row()->last_id;
        $data['is_current'] = 'N';
        $this->db->where('id', $last_id);
        $query = $this->db->update($table, $data);
    }

//Nur Haryadi ...
    function getContainerListPerID($container_no) {

        $query = $this->DB->query("SELECT
		(SELECT master.m_container.container_no FROM master.m_container WHERE master.m_container.id = b.container_no) AS container_no,
		b.status AS status,
		b.is_current AS is_current,
		b.last_updated AS last_updated
		FROM master.m_container a
		LEFT JOIN cts.t_history_status b ON (a.id = b.container_no)
		WHERE a.active = 'Y' AND a.id = '" . $container_no . "' ");
        $result = $query->result_array();
        return $result;
    }

    public function getOrderHistoryList($id) {
        $query = $this->DB->query("SELECT
                cts.t_order_history.id as id,
                cts.t_order_history.id_t_order as id_t_order,
                cts.t_order_history.order_no as order_no,
                cts.t_order_history.unit_id as unit_id,
                cts.t_order_history.container_no as container_no,
                cts.t_order_history.dn_no as dn_no,
                cts.t_order_history.last_position as last_position,
                cts.t_order_history.status as status,
                cts.t_order_history.jam_perubahan as jam_perubahan
                FROM cts.t_order_history WHERE cts.t_order_history.id_t_order = '" . $id . "' ORDER BY cts.t_order_history.jam_perubahan DESC");
        $result = $query->result_array();
        return $result;
    }

    function getContainerListCustomer($container_no) {
        $query = $this->db->query("SELECT #(cts.t_history_customer.id) AS id ,
		#(cts.t_history_customer.container_no) AS container_no ,
		(SELECT master.m_customer_tracking.customer_name from master.m_customer_tracking where master.m_customer_tracking.id = cts.t_history_customer.customer) AS customer ,
		(cts.t_history_customer.is_current) AS is_current ,
		(cts.t_history_customer.last_updated) AS last_updated
		FROM cts.t_history_customer WHERE cts.t_history_customer.container_no ='$container_no' order by cts.t_history_customer.last_updated");
        $result = $query->result_array();
        return $result;
    }

    function getContainerListLastPosition($container_no) {
        $query = $this->db->query("SELECT #(cts.t_history_last_position.id) AS id ,
		#(cts.t_history_last_position.container_no) AS container_no ,
		(cts.t_history_last_position.last_position) AS last_position ,
		(cts.t_history_last_position.is_current) AS is_current ,
		(cts.t_history_last_position.last_updated) AS last_updated
		FROM cts.t_history_last_position WHERE cts.t_history_last_position.container_no ='$container_no'
		ORDER BY cts.t_history_last_position.last_updated");
        $result = $query->result_array();
        return $result;
    }

    function getContainerListStatus($container_no) {
        $query = $this->db->query("SELECT #(cts.t_history_status.id) AS id ,
		#(cts.t_history_status.container_no) AS container_no ,
		(cts.t_history_status.status) AS status ,
		(cts.t_history_status.is_current) AS is_current ,
		(cts.t_history_status.last_updated) AS last_updated
		FROM cts.t_history_status WHERE cts.t_history_status.container_no ='$container_no'
		ORDER BY cts.t_history_status.last_updated");
        $result = $query->result_array();
        return $result;
    }

    function getDataMasterContainer($container_no) {
        $query = $this->db->query("SELECT (master.m_container.id) AS id ,
		(master.m_container.container_no) AS container_no,
		(master.m_container.equipment_no) AS equipment_no,
		(master.m_container.owner) AS owner,
		(master.m_container.size) AS size,
		(master.m_container.type) AS type,
		(master.m_container.active) AS active
		FROM master.m_container WHERE master.m_container.id ='$container_no'");
        $result = $query->row_array();
        return $result;
    }

}
