<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Server extends CI_Controller {


public  function __construct()
	{		
	       parent::__construct();	
	}
public function query()
    {
         $keyword = strval($this->uri->segment('3'));
          $search_param = "{$keyword}%";
          $conn =new mysqli('localhost', 'root', '' , 'sscrmadmin_sscrm_db');

          $sql = $conn->prepare("SELECT * FROM tbl_customerdetails WHERE party_name LIKE ?");
          $sql->bind_param("s",$search_param);      
          $sql->execute();
          $result = $sql->get_result();
          if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $countryResult[] = $row["party_name"];
            }
            echo json_encode($countryResult);
          }
  //print_r($_REQUEST);die();
                     
    }

   
}