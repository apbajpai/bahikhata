<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VehicleAdd extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
			$this->load->model('vehicleaddmodel');			
		   // $this->load->view('vehicleadd');

		}

	
        public function index()
        {
                 $makes = $this->db->get("make")->result();
                 $this->db->select_max('bill_no');
                $last_bill_no = $this->db->get_where("tbl_bill_no_purchase",array('user_id' => $this->session->userdata('user_id')))->row();
                $this->load->view('vehicleadd', array('error' => ' ','makes' => $makes , 'last_bill_no' =>  $last_bill_no  ));
        }

        public function do_upload()
        {
        	$this->load->model('vehicleaddmodel'); 
          //echo "<pre>";print_r($this->vehicleaddmodel->do_upload());

            $results = $this->vehicleaddmodel->do_upload();
          //echo $results['error'];die();
        	if (!isset($results['error'])) {
                        redirect('vehicleview','location');
                } else {
                        redirect('VehicleAdd', $results);
                }
                
        	// echo $this->db->last_query();die();
        }
	 public function myformAjax($id) { 

       $result = $this->db->where("make_id",$id)->get("model")->result();

       echo json_encode($result);

   }
   public function myvalAdd($val1, $val2, $val3, $gst_amt) { 

       //$result = $this->db->where("make_id",$id)->get("model")->result();
        $val =$val2+$val1+$val3+$gst_amt;
        //$result = array('val' => $val, );
       echo ($val);
       // return $val1+$val2;
   }
   
}