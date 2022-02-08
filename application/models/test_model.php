<?php
//birds_model.php (Array of Objects)
class Test_model extends CI_Model{
  function get_bird($q){
    $this->db->select('*');
    $this->db->like('party_name', $q);
    $query = $this->db->get('tbl_customerdetails');
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        //$new_row['label']=htmlentities(stripslashes($row['party_name']));
        //$new_row['value']=htmlentities(stripslashes($row['party_name']));
        //$row_set[] = $new_row; //build an array
        $row_set[] = $row['party_name']; //build an array
      }
      echo json_encode($row_set); //format the array into json data
    }
  }
}
?>