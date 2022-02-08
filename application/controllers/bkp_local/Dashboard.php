<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	 public  function __construct()
		{			
			parent::__construct();
			$this->load->model('dashboardmodel');			
		   
		}
	public  function mainDashboard(){
		 $this->load->view('dashboard');
	} 
	public function index()
	{
		
	}
}