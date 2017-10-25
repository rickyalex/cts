<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Test extends CI_Controller {
 
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_test','test');
    }
 
    public function index()
    {
		$data = array('title'=>'BCS | Trucking Contract');
        $this->load->helper('url');
		$this->load->view('template/header',$data);
	    $this->load->view('template/sidebar');
		$this->load->view('test');
	    $this->load->view('template/footer');
    }
 
    public function ajax_list()
    {
        $list = $this->test->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $test) {
            $no++;
            $row = array();
            $row[] = $test->customer;
            $row[] = $test->pic;
            $row[] = $test->address;
            //add html for action
            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Detail" onclick="detail_customer('."'".$test->customer_id."'".')"><i class="glyphicon glyphicon-search"></i></a>
					<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_customer('."'".$test->customer_id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>
					<a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_customer('."'".$test->customer_id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->test->count_all(),
                        "recordsFiltered" => $this->test->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($customer_id)
    {
        $data = $this->test->get_by_id($customer_id);
        echo json_encode($data);
    }
	
	public function detail($customer_id)
	{
	    $data = $this->test->get_by_id($customer_id);
        echo json_encode($data);
	}
 
    public function ajax_add()
    {
        $data = array(
                'customer' => $this->input->post('customer'),
                'pic' => $this->input->post('pic'),
                'address' => $this->input->post('address')
            );
        $insert = $this->test->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $data = array(
                'customer' => $this->input->post('customer'),
                'pic' => $this->input->post('pic'),
                'address' => $this->input->post('address'),
            );
        $this->test->update(array('customer_id' => $this->input->post('customer_id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($customer_id)
    {
        $this->test->delete_by_id($customer_id);
        echo json_encode(array("status" => TRUE));
    }
}