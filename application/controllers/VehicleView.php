<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VehicleView extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();		
			$this->load->model('vehicleviewmodel');			
		    

		}

	
        public function index()
        {
                
        }

        
	
}