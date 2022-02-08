<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerEdit extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
			$this->load->model('customereditmodel');			
		    

		}

	
        public function index()
        {
                
        }

        public function custedit($val)
        {
        	//echo $val; die();
        	$value = array('val' => $val );
        	$this->load->view('customeredit',$value);
        }

        public function do_update()
        {
        	$this->load->model('customereditmodel');	
        	$this->customereditmodel->do_update();
        	//redirect('customeredit/custedit/'.$_POST['cust_id']);
                redirect('CustomerView','location');
        }
	
}