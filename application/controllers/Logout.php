<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller {
	public  function __construct(){
		parent::__construct();
		$this->load->model('logoutmodel');
	}

	public  function index(){ 
		$sess_id = $this->session->userdata('user_id');
		if(empty($sess_id) || !$sess_id){ 
			redirect(site_url().'/login');
		}else{
			/*$this->session->unset_userdata('session_id');
		    $this->session->unset_userdata('user_name');
		  	$this->session->unset_userdata('user_session_id');*/
		  	$this->logoutmodel->logout();
		    $this->session->sess_destroy();
			$this->session->set_userdata(['sess_mess' => "logged out.. "]);
			redirect(base_url('login'), 'refresh');	
		}				
	} 	
}