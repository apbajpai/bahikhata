<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public  function __construct(){
		parent::__construct();
		$this->load->model('logoutmodel');
		$this->load->model('loginmodels');
		$this->load->model("settingsmodel");
	}	
	public function index()
	{        
		$this->load->view(THEME_NAME.'login');
	}
	public function sign_up()
	{
		$this->load->view(THEME_NAME.'signup');
	}
	public function do_register()
	{
		$bankd_data=$this->settingsmodel->do_register('tbl_user','company_details');
		$this->load->view(THEME_NAME.'signup');
	}
	public  function logout(){ 
		$sess_id = $this->session->userdata('user_id');
		if(empty($sess_id) || !$sess_id){ 
			redirect(site_url().'/login');
		}else{
		    $this->logoutmodel->logout();
		    $this->session->sess_destroy();
		    $this->session->set_userdata(['sess_mess' => "logged out.. "]);
		    redirect(base_url('login'), 'refresh');	
		}				
	}
}
