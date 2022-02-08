<?php 
class DashboardModel extends CI_Model {
	
	public function __construct(){
		
		
			if ($this->session->userdata('user_name') && empty($_POST)) 
			{
          
				 $user_session_id=$this->session->userdata; 
				$results_logs = $this->db->query("select * from tbl_login_details where user_id='".$user_session_id['user_id']."'  AND user_session_id = '".$user_session_id['session_id']."'");
				$res_logs=$results_logs->result();

				
				if ($res_logs) {
					//redirect('dashboard','location');
					//$this->session->set_userdata(['sess_mess' => $this->db->last_query()]);

				} 
				else {
						$this->session->set_userdata(['sess_mess' => "wrong session or session expires kindly relogin..... "]); //.$this->db->last_query()
					}
			}
			elseif ($_POST && $this->session->userdata) 
			{
					
					@extract($_POST);
					if(isset($remember)){$remember=$remember;}else{$remember=0;}
					$sessionid = session_id();
					$this->session->set_userdata(['session_id' => $sessionid]);
					$data = array('user_name' => $user_name, 'remember' => $remember, 'session_id' => $sessionid);
					$password = sha1($password);
					if ($user_type==='Admin') {
						$results = $this->db->query("select * from tbl_user where user_pass = '".$password."' AND  user_name='".$user_name."'  ");
					} else {
						$results = $this->db->query("select * from tbl_sub_user where user_name='".$user_name."'  AND user_pass = '".$password."'");
					}
					
					//$results = $this->db->query("select * from tbl_user where user_name='".$user_name."' OR user_email='".$user_name."'  AND user_pass = '".$password."'");
					//echo $results->num_rows().
					$this->db->last_query();$res=$results->result();
					//die();
					if ($results->num_rows() > 0) {
						
							$user_id=$res[0];
							if ($this->agent->is_browser())
							{
							        $agent = $this->agent->browser().' '.$this->agent->version();
							}
							elseif ($this->agent->is_robot())
							{
							        $agent = $this->agent->robot();
							}
							elseif ($this->agent->is_mobile())
							{
							        $agent = $this->agent->mobile();
							}
							else
							{
							        $agent = 'Unidentified User Agent';
							}

							$bad_time = BAD__TIME;
										

							$insert_login_data =  array(
								'user_id' => $user_id->user_id, 
								'login_time' => nice_date($bad_time,"H:i:s"), 
								'login_date' =>  nice_date($bad_time, 'd-m-Y'), 
								'logout_time' => 0, 
								'logout_date' => 0, 
								'user_ip_address' => $this->input->ip_address(), 
								'user_browser' =>  $agent, 
								'user_os' => $this->agent->platform(), 
								'user_timestamp' => $bad_time,
								'user_type' => $user_type,
								'user_session_id' => $sessionid
								);

							 $this->db->insert('tbl_login_details',$insert_login_data);
							// $res_insert=$results_insert->result();

							 if ($user_type==='Admin') {
								$this->session->set_userdata(['user_id' => $user_id->user_id]);
							 	$this->session->set_userdata(['user_name' => $user_name]);
								$this->session->set_userdata(['username' => $user_id->fname ." ". $user_id->lname]);
							 	$this->session->set_userdata(['user_type' => $user_type]);
							 
							 	$this->session->set_userdata(['sess_mess' => "User successfuly logged in. "]);//.$this->db->last_query()
							} else {
								$this->session->set_userdata(['user_id' =>   $this->db->get_where("company_details",array('ID' => $user_id->comp_id))->row()->user_id]);
							 	$this->session->set_userdata(['user_name' => $user_name]);
								$this->session->set_userdata(['username' =>  $user_id->fname ." ". $user_id->lname]);
							 	$this->session->set_userdata(['user_type' => $user_type]);
							 
							 	$this->session->set_userdata(['sess_mess' => "Sub User successfuly logged in. "]);//.$this->db->last_query()
							}
							 
							 redirect('dashboard','location');
					} 
				

				else {
						$this->session->unset_userdata('user_id');
					  	$this->session->unset_userdata('session_id()');
					    $this->session->unset_userdata('user_name');
					  	$this->session->unset_userdata('user_session_id');
					  	$this->session->unset_userdata('sess_mess');
					  	$this->session->unset_userdata('user_type');
					  	$this->session->set_userdata(['sess_mess' => "User not exist or wrong credential... "]);
						redirect('login', 'refresh');
						

					}
				
				} 

		
	
			else {
				 
				$this->session->set_userdata(['sess_mess' => "No POST NO Session "]);

			}
				
	
}
}
?>