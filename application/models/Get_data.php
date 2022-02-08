<?php 
class Get_data extends CI_Model {
	
	public function __construct(){

		//print_r($_POST);
		//die();
	}
    public function index()
    {
       
    }
	public function GetRow($keyword) {        
        $this->db->select('party_name');
        $this->db->order_by('id', 'DESC');
        $this->db->like("party_name", $keyword);
        return $this->db->get('tbl_customerdetails')->result_array();
    }     

}
?>