<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehicle_Model extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
					
		    
//echo "<pre>";print_r($this->router);die();
		}

	
        public function index($val=0)
        {
            //    echo "<pre>";print_r($this->router);die();
                if ($val>0) {
                    $this->load->view('vehicle_model');
                } else {
                    $this->load->view('vehicle_model_view'); 
                }
                //print_r($_SESSION);die();  //$this->myformAjax($val); 
        }

        public function add_new()
        {
               $makes = $this->db->get("make")->result();
        $this->load->view('vehicle_model', array('makes' => $makes )); 
        //$this->load->view('vehicle_model');
              //echo "<pre>"; print_r($this->router);die();
                 
        }

        public function edit_val($val)
        {
        	$makes = $this->db->get("make")->result();
                
        	$value = array('val' => $val,'makes' => $makes );
        	$this->load->view('vehicle_model',$value);
        }

        public function do_update_data()
        {
               
        	$this->load->model('vehicle_model_model');	
        	$this->vehicle_model_model->do_update();
        	//redirect('vehicleedit/custedit/'.$_POST['cust_id']);
            redirect('Vehicle_model','location');
        }

    public function myformAjax($id) { 

       $result = $this->db->where("make_id",$id)->get("model")->result();

       echo json_encode($result);

   }

	
}