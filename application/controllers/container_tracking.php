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

        $all_customer = $this->cts_model->getAllCustomer();
        $data['all_customer'] = json_encode($all_customer);
        
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('container_tracking',$data);
        $this->load->view('template/footer');
    }

    function getData() {
        $arr = $this->cts_model->getContainerList();


//        if (USER_ID == 2) {
//            foreach ($arr as $key => $field) {
//                $arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-success btn-sm' onClick='entryTracking(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-check'></i></a><a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-search'></i></a><a href='#' class='xcrud-action btn btn-warning btn-sm' onClick='editVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-pencil'></i></a><a href='#' class='xcrud-action btn btn-danger btn-sm' onClick='remove(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-remove'></i></a>";
//            }
//        } else {
//            foreach ($arr as $key => $field) {
//                if ($arr[$key]['status'] == 'closed')
//                    $arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-search'></i></a>";
//                else
//                    $arr[$key]['action'] = "<a href='#' class='xcrud-action btn btn-success btn-sm' onClick='entryTracking(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-check'></i></a><a href='#' class='xcrud-action btn btn-info btn-sm' onClick='viewVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-search'></i></a><a href='#' class='xcrud-action btn btn-warning btn-sm' onClick='editVoyage(" . '"' . $arr[$key]['voyage_no'] . '"' . ");'><i class='fa fa-pencil'></i></a>";
//            }
//        }

        echo json_encode($arr);
    }
    
    function updateStatus(){
        if ($this->uri->segment(3) !== FALSE)
        {
            $data['container_no'] = $this->uri->segment(4);
            //$data['container_no'] = $this->cts_model->getContainerNo($data['id']);
            $cls = $this->uri->segment(6);
            
            if($cls=="customer") {
                $data['customer'] = $this->uri->segment(8);
            }
            elseif($cls=="last_position"){
                $data['last_position'] = $this->uri->segment(8);
            }
            elseif($cls=="status"){
                $data['status'] = $this->uri->segment(8);
            }
            else die('parameter error');
            
            $data['updated_by'] = USER_ID;
            $data['last_updated'] = Date('Y-m-d H:i:s');
            //die(print_r($data));
            //$this->cts_model->updateLastRecord('t_tracking',$data['container_no']);
            $this->db->where('container_no',$data['container_no']);
            $this->db->update('t_tracking', $data);
            //$query = $this->db->submitContainerTracking($table,$data);
            
//            $this->db->where('payroll_id', $data['payroll_id']);
//            $query = $this->db->update('t_history' ,$data);
        }
        else die('parameter not found');
    }

    
}
