<?php 
class Vehicle_Model_Model extends CI_Model {
	
	public function __construct(){

		$this->load->view('vehicle_model_view');
	}
	public function index(){

			
	}
	
	public function do_update($cust_id=0)
        {
              @extract($_POST);               
                 
                $inser_data= array('make_id' => $make,'code' => $code, 'title' => $title);
													
				//$this->db->set($inser_data);
				if (isset($cust_id) && $cust_id>0) {
					$this->db->where('id', $cust_id);
					$this->db->update('model',$inser_data);
				} else {
					$this->db->insert('model', $inser_data);
					$this->load->view('vehicle_model', $inser_data);
				}
				

                
        }
}
?>