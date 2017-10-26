<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Container_tracking extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->helper('url', 'language');
        $this->load->library(array('ion_auth', 'form_validation', 'Commons'));

        // check if user logged in
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }

        $this->load->model('cts_model');

        $this->DB = $this->ion_auth_model->getDB();
        $this->APP = $this->commons->getAPP();

        $this->table = 't_voyage';
    }

    public function index() {
        //die(Date('Y-m-d H:i:s'));
        $all_customer = $this->cts_model->getAllCustomer();
        $data['all_customer'] = json_encode($all_customer);

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('container_tracking', $data);
        $this->load->view('template/footer');
    }

    function getData() {
        $arr = $this->cts_model->getContainerList();
        /* punya mas Riki
          foreach ($arr as $key => $field) {
          $query = $this->DB->query("SELECT IF(EXISTS(select last_updated from cts.t_history_last_position where container_no ='" . $arr[$key]['container_id'] . "' and substring(last_position,-8) <> '" . substr($arr[$key]['last_position'], -8) . "'),(select last_updated from cts.t_history_last_position where container_no ='" . $arr[$key]['container_id'] . "' and substring(last_position,-8) <> '" . substr($arr[$key]['last_position'], -8) . "' limit 1),0) as aging");
          $a = $query->row_array();
          //die($query);
          $arr[$key]['aging'] = $a['aging'];
          }
         */

        foreach ($arr as $key => $field) {
            $val = array(); //test
            $val = $arr[$key]['last_position'];
            if ($val == 'ON_DEPO_CLG' || $val == 'ON_DEPO_CDP' || $val == 'ON_DEPO_SBY') {//(strpos($val,'ON_DEPO'))
                //$arr[$key]['aaaa'] = $val;
                $query = $this->DB->query("SELECT (
				SELECT (cts.v_t_history_last_position_aging_on_depo.aging) AS aging
				FROM cts.v_t_history_last_position_aging_on_depo WHERE container_no = '" . $arr[$key]['container_id'] . "'

				ORDER BY cts.v_t_history_last_position_aging_on_depo.last_updated DESC LIMIT 1) AS aging"); //140 - container_no di  v_t_history ---- id_tracking
                $a = $query->row_array();
                //die($query);
                $arr[$key]['aging'] = $a['aging'];
            }
        }

        foreach ($arr as $key => $field) {
            $arr[$key]['container_no'] = "<a href='#' onClick='viewTracking(" . '"' . $arr[$key]['container_id'] . '"' . ");'>" . $arr[$key]['container_no'] . "</a>";
            //$arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-success btn-sm' onClick='entryTracking(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-check'></i></a><a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-search'></i></a><a href='#' class='xcrud-action btn btn-warning btn-sm' onClick='editVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-pencil'></i></a><a href='#' class='xcrud-action btn btn-danger btn-sm' onClick='remove(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-remove'></i></a>";
        }

        echo json_encode($arr);
    }

    /* function viewTracking(){
      $container_id = $this->uri->segment(4);
      die($container_id);
      } */

    function getDataPerID() {
        $container_no = $this->uri->segment(4);
        $DataMasterContainer = $this->cts_model->getDataMasterContainer($container_no); //

        $Customer = $this->cts_model->getContainerListCustomer($container_no);
        $LastPosition = $this->cts_model->getContainerListLastPosition($container_no);
        $Status = $this->cts_model->getContainerListStatus($container_no);
        //die($DataMasterContainer['id']);
        $data['DataMasterContainer'] = $DataMasterContainer;
        $data['Customer'] = $Customer;
        $data['LastPosition'] = $LastPosition;
        $data['Status'] = $Status;

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('container_tracking_history_per_id_toggle', $data);
        $this->load->view('template/footer');

        //echo json_encode($arr);
    }

    function updateStatus() {
        if ($this->uri->segment(3) !== FALSE) {
            $data['container_no'] = $this->uri->segment(4);
            //$data['container_no'] = $this->cts_model->getContainerNo($data['id']);
            $cls = $this->uri->segment(6);

            if ($cls == "customer") {
                $data['customer'] = $this->uri->segment(8);
            } elseif ($cls == "last_position") {
                $data['last_position'] = $this->uri->segment(8);
            } elseif ($cls == "status") {
                $data['status'] = $this->uri->segment(8);
            } else
                die('parameter error');

            $data['updated_by'] = USER_ID;
            $data['last_updated'] = Date('Y-m-d H:i:s');
            //die(print_r($data));
            //$this->cts_model->updateLastRecord('t_tracking',$data['container_no']);
            $this->db->where('container_no', $data['container_no']);
            $this->db->update('t_tracking', $data);
            //$query = $this->db->submitContainerTracking($table,$data);
//            $this->db->where('payroll_id', $data['payroll_id']);
//            $query = $this->db->update('t_history' ,$data);
        } else
            die('parameter not found');
    }

}
