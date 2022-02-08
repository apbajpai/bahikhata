<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VehicleEdit extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
			$this->load->model('vehicleeditmodel');			
		    

		}

	
        public function index()
        {
                  //$this->myformAjax($val); 
        }

        public function custedit($val)
        {
        	//echo $val; die();
                $makes = $this->db->get("make")->result();
                //$this->load->view('vehicleedit', array('makes' => $makes )); 
                $this->db->select_max('bill_no');
                $last_bill_no = $this->db->get_where("tbl_bill_no_purchase",array('user_id' => $this->session->userdata('user_id')))->row();
        	$value = array('val' => $val,'makes' => $makes, 'last_bill_no' =>  $last_bill_no  );
        	$this->load->view('vehicleedit',$value);
        }

        public function do_update_data()
        {
               
        	$this->load->model('vehicleeditmodel');	
        	$this->vehicleeditmodel->do_update();
        	//redirect('vehicleedit/custedit/'.$_POST['cust_id']);
            redirect('VehicleView','location');
        }

    public function myformAjax($id) { 

       $result = $this->db->where("make_id",$id)->get("model")->result();

       echo json_encode($result);

   }

	
}