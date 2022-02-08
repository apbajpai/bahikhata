<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile extends CI_Controller {


	 public  function __construct()

		{
			
			parent::__construct();
			
			//$this->load->model('dashboardmodel');
			
		    $this->load->view('userprofile');


		}

	public  function index(){
		
			
			
	} 
	 public function do_update()
        {
        	 @extract($_POST); 
        	 if ($_FILES["logo"]['name']) {
                	
					
					$config['upload_path']          = './assets/uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 2000;
	                $config['max_width']            = 1724;
	                $config['max_height']           = 768;
					$logo                       = time().$_FILES["logo"]['name'];
	                $config['file_name']            = $logo;

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('logo'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                        $this->load->view('userprofile', $error);
	                    
	                }
	                else
	                {		
	                        $data = array('upload_data' => $this->upload->data());                                             
	                        
	                }
                } else {
                	$logo = $hidden_logo;
                }
                if ($_FILES["auth_sign"]['name']) {
                	
					
					$config['upload_path']          = './assets/uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 2000;
	                $config['max_width']            = 1724;
	                $config['max_height']           = 768;
					$auth_sign                       = time().$_FILES["auth_sign"]['name'];
	                $config['file_name']            = $auth_sign;

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('auth_sign'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                       // $this->load->view('userprofile', $error);
	                    
	                }
	                else
	                {		
	                        $data = array('upload_data' => $this->upload->data());                                             
	                        
	                }
                } else {
                	$auth_sign = $hidden_auth_sign;
                }
                 


                $inser_data= array('comany_name' => $comany_name,'location' => $location,'specification' => $specification,'phone' => $phone,'tin_no' => $tin_no,'email' => $user_email,'website' => $website,'logo' => $logo,'auth_sign' => $auth_sign);
               // $inser_data= array('logo' => $logo,'auth_sign' => $auth_sign);
													
				//$this->db->set($inser_data);
				$this->db->where('user_id', $user_id);
				$this->db->update('company_details',$inser_data);

				 $inser_data_main_user= array('fname' => $fname,'lname' => $lname);
               // $inser_data= array('logo' => $logo,'auth_sign' => $auth_sign);
													
				//$this->db->set($inser_data);
				$this->db->where('user_id', $user_id);
				$this->db->update('tbl_user',$inser_data_main_user);

                redirect('userprofile','location');
        }
	
}