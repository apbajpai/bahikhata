<?php 
class VehicleViewModel extends CI_Model {
	
	public function __construct(){
		$sess_id = $this->session->userdata('user_id');
		 $cust_data = $this->db->order_by('id', 'DESC');
         $cust_data = $this->db->get_where("tbl_vehicledetails",  array('user_id' => $sess_id));
		$this->load->view('vehicleview',$cust_data);
		
	}
	
	
}
?>