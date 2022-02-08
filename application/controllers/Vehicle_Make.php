<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_Make extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
					
		    

		}

	
        public function index($val=0)
        {
                if ($val>0) {
                    $this->load->view('vehicle_make');
                } else {
                    $this->load->view('vehicle_make_view'); 
                }
                //print_r($_SESSION);die();  //$this->myformAjax($val); 
        }

        public function add_new()
        {
               $this->load->view('vehicle_make');
              //echo "<pre>"; print_r($this->router);die();
                 
        }

        public function edit_val($val)
        {
        	//echo $val; die();
                //$makes = $this->db->get("make")->result();
                //$this->load->view('vehicleedit', array('makes' => $makes )); 
        	$value = array('val' => $val );
        	$this->load->view('vehicle_make',$value);
        }

        public function do_update_data()
        {
               
        	$this->load->model('vehicle_make_model');	
        	$this->vehicle_make_model->do_update();
        	//redirect('vehicleedit/custedit/'.$_POST['cust_id']);
            redirect('Vehicle_make','location');
        }

    public function myformAjax($id) { 

       $result = $this->db->where("make_id",$id)->get("model")->result();

       echo json_encode($result);

   }

	
}