<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testpages extends CI_Controller {


public  function __construct()
	{		
	       parent::__construct();
         $this->load->model('get_data');		
	}
public function index()
    {
        $vehicles = $this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id')))->result();

         $this->db->select_max('bill_no');
         $last_bill_no = $this->db->get_where("tbl_bill_no_sales",array('user_id' => $this->session->userdata('user_id')))->result();
          $this->load->view('test_view_auto',array('vehicles' => $vehicles, 'last_bill_no' =>  $last_bill_no ));
                          
    }

public function GetCountryName(){
        //$keyword=$this->input->post('keyword');
        $keyword=$this->uri->segment('3');
        $data=$this->get_data->GetRow($keyword);        
        echo json_encode($data);
        
    }
public function GetAccounthead(){
    //$keyword=$this->input->post('keyword');
    $keyword=$this->uri->segment('3');
    $data=$this->get_data->gethead($keyword);        
    echo json_encode($data);
    
}

public  function get_birds(){
    $this->load->model('Accounts_Model');
   // echo $this->uri->segment('3');
   // print_r($this->uri->segment);
    if (($this->uri->segment('3'))){
      $q = strtolower($this->uri->segment('3'));
      $this->Accounts_Model->get_bird($q);
    }
}
public function add_item()
{
  $this->load->model('Accounts_Model');
  $this->Accounts_Model->add_item_sales();
}
public function delete_item()
{
  @extract($_POST);$this->load->model('Accounts_Model');
  $this->Accounts_Model->delete_item_sales($item_id,$user_id);
}

public function cal_grand_total()
{
    $final_discount=$_REQUEST['final_discount'];
    $user_id=$this->session->userdata('user_id');
    $bill_no=$_REQUEST['bill_no'];
    $gd_total =$grand_total =$str ="";

    $query = $this->db->select('*');
   $query = $this->db->where("user_id='$user_id' and bill_no='$bill_no'");
   $query = $this->db->get('tbl_temp_sales_master')->result();
      
      foreach ($query as $key => $row) {
        $grand_total+=$row->final_amount;
      }
      
        
        if($grand_total>$final_discount){
            $gd_total=$grand_total-$final_discount;
        }else{
          $gd_total=$grand_total;
        }
        $gd_total=round($gd_total);
        $str="###".$gd_total;
       echo $str;
        
}
public function do_update_master($led_type)
{
  if ($led_type=='Sales') {
    $tableName ='tbl_balancesheet_master_sales';
  } else {    
    $tableName ='tbl_balancesheet_master_purchase';
  }
  
  $this->load->model("Accounts_Model");
  $return_data = $this->Accounts_Model->do_update_sales_purchase_master($tableName, $led_type);
   redirect('Testpages/','location');  
}

}