<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerAdd extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
			$this->load->model('customeraddmodel');			
		   // $this->load->view('customeradd');

		}

	
        public function index()
        {
                $this->load->view('customeradd', array('error' => ' ' ));
        }

        public function do_upload()
        {
        	$this->load->model('customeraddmodel');	
        	$this->customeraddmodel->do_upload();
        	redirect('CustomerView','location');
        }
	
}