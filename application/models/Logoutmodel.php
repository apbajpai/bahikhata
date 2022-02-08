<?php
class LogoutModel extends CI_Model {
	public  function __construct(){

	}	
	public function logout(){
		$insert_login_data =  array(
			'logout_time' => nice_date(BAD__TIME,"H:i:s"), 
			'logout_date' => nice_date(BAD__TIME, 'd-m-Y')
		);
		$this->db->set('logout_time',nice_date(BAD__TIME,"H:i:s") );
		$this->db->set('logout_date',nice_date(BAD__TIME, 'd-m-Y') );
		$this->db->where('user_id',$this->session->userdata['user_id']);
		$this->db->where('user_session_id',$this->session->userdata['session_id']);
		$this->db->update('tbl_login_details');		
	} 
}
?>