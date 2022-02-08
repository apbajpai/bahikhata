<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerView extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
			$this->load->model('customerviewmodel');			
		    

		}

	
        public function index()
        {
                
        }

        
	
}