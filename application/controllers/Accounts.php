<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Controller {


public  function __construct()
	{		
	       parent::__construct();
            $this->load->model('Accounts_Model');		
	}
public function index()
    {
         $this->load->view('ledgerallview');    
                     
    }

public function sales()
    {
         $vehicles = $this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id')))->result();

         $this->db->select_max('bill_no');
         $last_bill_no = $this->db->get_where("tbl_bill_no_sales",array('user_id' => $this->session->userdata('user_id')))->result();
          $this->load->view('sales_add',array('vehicles' => $vehicles, 'last_bill_no' =>  $last_bill_no ));
    }
public function addeditnotes()
    {
          $this->load->view('addedit_notes');
    }
public function salesview()
    {
         $sess_id = $this->session->userdata('user_id');
         $cust_data = $this->db->order_by('id', 'DESC');
         $cust_data = $this->db->get_where("tbl_vehiclesalesdetails",  array('user_id' => $sess_id));
         $this->load->view('salesview',$cust_data);
    }
public function receipt()
    {
        $banks = $this->db->get_where("tbl_bankdetails",array('user_id' => $this->session->userdata('user_id')))->result();

        $this->db->select_max('bill_no');
        $this->db->select('bill_date');
        $last_bill_no = $this->db->get_where("tbl_bill_no_receipt",array('user_id' => $this->session->userdata('user_id')))->result();
        $this->load->view('receipt_view',array('banks' => $banks, 'last_bill_no' =>  $last_bill_no ));
    }
public function payments()
    {
           $banks = $this->db->get_where("tbl_bankdetails",array('user_id' => $this->session->userdata('user_id')))->result();
           $this->db->select_max('bill_no');
           $this->db->select('bill_date');
           $last_bill_no = $this->db->get_where("tbl_bill_no_payment",array('user_id' => $this->session->userdata('user_id')))->result();
           $this->load->view('payments_view',array('banks' => $banks, 'last_bill_no' =>  $last_bill_no ));
    }
 public function get_data($id)
    {
           $this->db->distinct('party_name');
            $this->db->where('user_id', $sess_id);
            $this->db->like('party_name', $this->input->post('queryString'));
            return $this->db->get('tbl_customerdetails', 10);      
    }

    public function GetCountryName(){
        $keyword=$this->input->post('keyword');
        $data=$this->Accounts_Model->GetRow($keyword);        
        echo json_encode($data);
        
    }
   public function GetCustomerDetails(){
        $keyword=$this->input->post('keyword');
        $data=$this->Accounts_Model->GetFullRow($keyword);
        //echo "kk".$keyword;        
        echo json_encode($data);
        
    }
public function addedit_notes(){
        $keyword=$this->input->post('keyword');
        $type=$this->input->post('type');
        $data=$this->Accounts_Model->addedit_notes($keyword,$type);
        echo json_encode($data);
        
}
    public function GetPartyAddress(){
        $party_name=$this->input->get('party_name');
        $sess_id = $this->session->userdata('user_id');

        $this->db->select('partyadd');
        $this->db->distinct();
        $this->db->where('user_id', $sess_id);      
        $this->db->order_by('party_name', 'DESC');
        $this->db->like("party_name", $party_name);
        
        $result_query=$this->db->get('tbl_customerdetails')->result_array();
       // print_r($result_query);
        return $result_query;

    }
    public function receipt_add(){
       

        $party_name = $this->Accounts_Model->do_upload('tbl_receipt_master', 'Receipt');
        //$partyname  = str_replace(" ", "-", $party_name);
        // echo "<pre>";
        // print_r($party_name);
        $partyname['last_bill_no'] =$party_name->party_code;
        // echo "<pre>";
        // print_r($party_name);die();
        //$this->load->view('invoice-print',$partyname);

        // $party_name  = str_replace(" ", "-", $party_name);

         //redirect('Accounts/ledger_all/'.$party_name);

       $this->invoice_print('receipt',$party_name->party_code);
    }
     public function payments_add(){
       
       $party_name = $this->Accounts_Model->do_upload('tbl_payment_master', 'Payment');
       $this->invoice_print('payments',$party_name->party_code);
    }

public function contra_add(){

       $party_name = $this->Accounts_Model->do_update_contra('tbl_bill_no_contra', 'Contra');
       $this->invoice_print('contra',$party_name->bill_no);
}
	 public function ledger_all()
        {
            
             $this->load->view('ledgerallview');                 
        }
   
public function ledger_one()
        {
             $party_name = $this->input->post('party_name');
             $party_name  = str_replace(" ", "-", $party_name);
             //$this->load->view('ledgerallview', $uname);
             redirect('Accounts/ledger_all/'.$party_name);                 
        }
    public function ledgerone()
        {
              $this->db->select("party_name");
              $this->db->distinct();
              $customer = $this->db->get_where("tbl_customerdetails",array('user_id' => $this->session->userdata('user_id')))->result();
              $this->load->view('ledgeroneview',array('customerdetails' => $customer ));                 
        }
    public function ledgercash()
        {
             $ptype= array('table_name' => 'tbl_cashledger', 'pptype' => 'cash');;
             $this->load->view('ledgercashbankview',$ptype);                 
        }
    public function ledgerbank()
        {
             
             $ptype= array('table_name' => 'tbl_bankledger', 'pptype' => 'bank');;
             $this->load->view('ledgercashbankview',$ptype);                  
        }
    public function bankone()
        {
             
             $this->db->select("bank_name");
              $this->db->distinct();
              $bank = $this->db->get_where("tbl_bankdetails",array('user_id' => $this->session->userdata('user_id')))->result();
              $this->load->view('bankoneview',array('bankdetails' => $bank ));                  
        }
    public function bank_one()
        {
             $bank_name = $this->input->post('bank_name');
             $bank_name  = str_replace(" ", "-", $bank_name);
             //$this->load->view('ledgerallview', $uname);
             redirect('Accounts/ledgerbank/'.$bank_name);                 
        }

    public function view_report($table)
        {
            if ($table=='receipt') {
                $table_name = 'tbl_receipt_master';
                $table_view_data = $this->db->get_where($table_name,array('user_id' => $this->session->userdata('user_id')))->result();
                $this->load->view('report_view',array('report_view_details' => $table_view_data ));   
            } elseif ($table=='payment' || $table == 'payments') {
                $table_name = 'tbl_payment_master';
                $table_view_data = $this->db->get_where($table_name,array('user_id' => $this->session->userdata('user_id')))->result();
                $this->load->view('report_view',array('report_view_details' => $table_view_data ));   
            } elseif ($table=='purchase' || $table == 'purchases') {
                $table_name = 'tbl_balancesheet_master_purchase';
                
                $table_view_data = $this->db->select('*');
                $table_view_data = $this->db->from($table_name);
                $table_view_data = $this->db->join('tbl_vehicledetails', 'tbl_vehicledetails.bill_no = '.$table_name.'.bill_no');
                $table_view_data = $this->db->where(array($table_name.'.user_id' => $this->session->userdata('user_id')));
                
                $table_view_data = $this->db->get()->result();

               // $table_view_data = $this->db->get_where($table_name,array('user_id' => $this->session->userdata('user_id')))->result();
                $this->load->view('report_view_purchase',array('report_view_details' => $table_view_data ));   
            } elseif ($table=='gensales' || $table == 'gensales') {

                $table_name = 'tbl_balancesheet_master_sales';
                $table_view_data = $this->db->get_where($table_name,array('user_id' => $this->session->userdata('user_id')))->result();
                $table = 'sales';
                $this->load->view('report_view_sales',array('report_view_details' => $table_view_data ));   
            } elseif ($table=='genpurchases' || $table == 'genpurchases') {

                $table_name = 'tbl_balancesheet_master_purchase';
                $table_view_data = $this->db->get_where($table_name,array('user_id' => $this->session->userdata('user_id')))->result();
                $table = 'purchases';
                $this->load->view('report_view_sales',array('report_view_details' => $table_view_data ));   
            } else {
                $table_name = 'tbl_balancesheet_master_sales';
                $table_view_data = $this->db->select('*');
                $table_view_data = $this->db->from($table_name);
                $table_view_data = $this->db->join('tbl_vehiclesalesdetails', 'tbl_vehiclesalesdetails.bill_no = '.$table_name.'.bill_no');
                $table_view_data = $this->db->where(array($table_name.'.user_id' => $this->session->userdata('user_id')));
                
                $table_view_data = $this->db->get()->result();

                //$table_view_data = $this->db->get_where($table_name,array('user_id' => $this->session->userdata('user_id')))->result();
                $this->load->view('report_view_purchase',array('report_view_details' => $table_view_data ));   
            }
            
             
                            
        }
    public function report_del($table,$bill_no)
        {

            $table_name1 = '';
                $table_name2 = '';
                $type = '';

            if ($table=='receipt') {
                $table_name1 = 'tbl_receipt_master';
                $table_name2 = 'tbl_bill_no_receipt';
                $type = ucfirst($table);
            } elseif ($table=='payment') {
                $table_name1 = 'tbl_payment_master';
                $table_name2 = 'tbl_bill_no_payment';
                $type = ucfirst($table);
            }elseif ($table=='genpurchases') {
                $table_name1 = 'tbl_balancesheet_master_purchase';
                $table_name2 = 'tbl_bill_no_purchase';
                $type = ucfirst($table);
            }elseif ($table=='gensales') {
                $table_name1 = 'tbl_balancesheet_master_sales';
                $table_name2 = 'tbl_bill_no_sales';
                $type = ucfirst($table);
            }
        $this->Accounts_Model->DeleteReport($table_name1,$bill_no,$table_name2,$type);  
          //$this->load->view('report_view',array('report_view_details' => $table_view_data ));  

          redirect('Accounts/view_report/'.$table);                              
        }
    public function invoice_print($type,$party_code){
        
        $partyname['last_bill_no'] =$party_code;       
        $partyname['type'] =$type; 
        $partyname['url'] =NULL; 

        if ($type=='receipt') {
            $partyname['table_name'] ='tbl_receipt_master';
        } elseif ($type=='payments') {
            $partyname['table_name'] = 'tbl_payment_master';
        }elseif ($type=='contra') {
            $partyname['table_name'] = 'tbl_bill_no_contra';
        }
        $this->load->view('invoice-print',$partyname);

    }
    public function invoice_view($type,$party_code){
        
        $partyname['last_bill_no'] =$party_code;       
        $partyname['type'] =$type; 

        if ($type=='receipt') {
            $partyname['table_name'] ='tbl_receipt_master';
            $view_page_name ='invoice-view';
        } elseif ($type=='payments' || $type=='payment') {
            $partyname['table_name'] = 'tbl_payment_master';
            $view_page_name ='invoice-view';
        }elseif ($type=='purchase' || $type == 'purchases') {
            $partyname['table_name'] = 'tbl_balancesheet_master_purchase';
            $view_page_name ='invoice-view-purchase';
        } else {
            $partyname['table_name'] = 'tbl_balancesheet_master_sales';
            $view_page_name ='invoice-view-sales';
        }
        $this->load->view($view_page_name,$partyname);

    }
    public function invoice_print_dup($type,$party_code){
        
        $partyname_dup['last_bill_no'] =$party_code;       
        $partyname_dup['type'] =$type; 
        $partyname_dup['url'] ='view_report'; 

        if ($type=='receipt') {
            $partyname_dup['table_name'] ='tbl_receipt_master';
            $print_page_name ='invoice-print';
        } elseif ($type=='payments' || $type=='payment') {
            $partyname_dup['table_name'] = 'tbl_payment_master';
            $print_page_name ='invoice-print';
        }elseif ($type=='purchase' || $type == 'purchases') {
            $partyname_dup['table_name'] = 'tbl_balancesheet_master_purchase';
            $print_page_name ='invoice-print-purchase';
        } else {
            $partyname_dup['table_name'] = 'tbl_balancesheet_master_sales';
            $print_page_name ='invoice-print-sales';
        }
        $this->load->view($print_page_name,$partyname_dup);

    }

public function invoice_print_sales($type,$party_code){
    
    $partyname['last_bill_no'] =$party_code;       
    $partyname['type'] =$type; 
    $partyname['url'] =NULL; 

    if ($type=='receipt') {
        $partyname['table_name'] ='tbl_receipt_master';
    } elseif ($type=='payments') {
        $partyname['table_name'] = 'tbl_payment_master';
    }
    $this->load->view('invoice-print',$partyname);

}
public function invoice_view_sales($type,$party_code){
    
    $partyname['last_bill_no'] =$party_code;  
    if ($type=='genpurchases') {
           $partyname['type'] ="Purchase"; 
           $partyname['table_name'] = 'tbl_balancesheet_master_purchase';
           $partyname['table_name_temp'] = 'tbl_temp_purchase_master';

         } else {
          $partyname['type'] ="Sales"; 
          $partyname['table_name'] = 'tbl_balancesheet_master_sales';
           $partyname['table_name_temp'] = 'tbl_temp_sales_master';
         }
              
    

    
    $view_page_name ='invoice-view-gensales';
   
    $this->load->view($view_page_name,$partyname);

}
public function invoice_print_sales_dup($type,$party_code){
    
    $partyname_dup['last_bill_no'] =$party_code; 
    $partyname_dup['url'] ='view_report'; 
    

    if ($type=='genpurchases') {
           $partyname_dup['type'] ="Purchase"; 
           $partyname_dup['table_name'] = 'tbl_balancesheet_master_purchase';
           $partyname_dup['table_name_temp'] = 'tbl_temp_purchase_master';
         } else {
          $partyname_dup['type'] ="Sales"; 
          $partyname_dup['table_name'] = 'tbl_balancesheet_master_sales';          
           $partyname_dup['table_name_temp'] = 'tbl_temp_sales_master';
         }
    $print_page_name ='invoice-print-gensales';

    $this->load->view($print_page_name,$partyname_dup);

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
public function get_branch(){
  $id=$this->uri->segment('3');
   $id  = str_replace("-", " ", $id);
    $results = $this->db->select('branch');
    $results = $this->db->where("id",$id)->get("tbl_bankdetails")->result();
    //echo $this->db->last_query();
       echo json_encode($results);
  
  }
  function get_vehicle(){
    $this->load->model('Accounts_Model');
   // echo $this->uri->segment('3');
   // print_r($this->uri->segment);
    if (($this->uri->segment('3'))){
      $q = strtolower($this->uri->segment('3'));
      $this->Accounts_Model->get_vehicles($q);
    }
  }

public function get_items(){
    $this->load->model('Accounts_Model');
    if (($this->uri->segment('3'))){
      $q = strtolower($this->uri->segment('3'));
      $this->Accounts_Model->get_items_sp($q);
    }
  }

public function get_units(){
  $this->load->model('Accounts_Model');
  if (($this->uri->segment('3'))){
    $q = strtolower($this->uri->segment('3'));
    $this->Accounts_Model->get_units_sp($q);
  }
}
  public function dsrreport()
  {

    $this->load->view('dsr-report-view');
  }
  public function dsr_report()
  {
     //echo"<pre>";print_r($this->input->post());die();

    @extract($_POST);
     $table_dsr = $this->input->post('dsr_report');
     $type_dsr  = $this->input->post('dsr_type');
    
     $report_view_detail=array();
     $report_view_detail['dsr_type_of'] = $type_dsr;
     $report_view_detail['dsr_report_of'] = $table_dsr;
     
     if ($table_dsr=='receipt') {
          $table_name_dsr = 'tbl_receipt_master';
          $where_find  = 'bill_date';
      } elseif ($table_dsr=='payment' || $table_dsr == 'payments') {
          $table_name_dsr = 'tbl_payment_master';
          $where_find  = 'bill_date';
      } elseif ($table_dsr=='purchase' || $table_dsr == 'purchases') {
          $table_name_dsr = 'tbl_balancesheet_master_purchase';
          $where_find  = 'bil_date';
      } else {
          $table_name_dsr = 'tbl_balancesheet_master_sales';
          $where_find  = 'bil_date';
      }
    if ($type_dsr=='d') {
       $table_view_data_dsr = $this->db->get_where($table_name_dsr,array('user_id' => $this->session->userdata('user_id'),'day('.$where_find.')'=>date("d") ))->result();
       $report_view_detail['date_for'] = 'Today';
    } elseif ($type_dsr=='m') {
       $table_view_data_dsr = $this->db->get_where($table_name_dsr,array('user_id' => $this->session->userdata('user_id'),'month('.$where_find.')'=>date("m") ))->result();
       $report_view_detail['date_for'] = 'Today';
    } else {
      $date_from=date_create($date_from);$date_from=date_format($date_from,'Y-m-d');
      $date_to=date_create($date_to); $date_to=date_format($date_to,'Y-m-d');
       $table_view_data_dsr = $this->db->get_where($table_name_dsr,array('user_id' => $this->session->userdata('user_id'),$where_find.'>='=>$date_from,$where_find.'<='=>$date_to ))->result();
       $report_view_detail['date_for'] = $date_from.' - '.$date_to;//.'  '. $this->db->last_query();;
     }
    $report_view_detail['report_view_details'] = $table_view_data_dsr ;
    $report_view_detail['where_find'] = $where_find ;
   // echo"<pre>";print_r($report_view_detail);die();
     $this->load->view('report_dsr',$report_view_detail);    //array('report_view_details'=>$report_view_details)
     
  }
   public function myvalAdd($val1, $val2, $val3, $gst_amt) { 

       //$result = $this->db->where("make_id",$id)->get("model")->result();
        $val =$val2+$val1+$val3+$gst_amt;
        //$result = array('val' => $val, );
       echo ($val);
       // return $val1+$val2;
   }

      public function do_update_sales()
        {
          $this->load->model('Accounts_Model'); 
          //echo "<pre>";print_r($this->vehicleaddmodel->do_upload());

            $results = $this->Accounts_Model->do_update_sales();
          //echo $results['error'];die();
          if (!isset($results['error'])) {
                        redirect('accounts/salesview','location');
                } else {
                        redirect('accounts/sales', $results);
                }
                
          // echo $this->db->last_query();die();
        }
   
   public function ledger_allitem()
        {
            
             $this->load->view('ledgeritemview');                 
        }
    public function ledgeroneitem()
        {
              $this->db->select("item");
              $this->db->distinct();
              $customer = $this->db->get_where("tbl_item_ledger",array('user_id' => $this->session->userdata('user_id')))->result();
              $this->load->view('ledgeroneitemview',array('itemdetails' => $customer ));                 
        }
    public function ledger_oneitem()
        {
             $item_name = $this->input->post('item_name');
             $item_name  = str_replace(" ", "-", $item_name);
             redirect('Accounts/ledger_allitem/'.$item_name);                 
        } 

/*##   Sales General    */
 public function gensales()
    {
        $vehicles = $this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id')))->result();

         $this->db->select_max('bill_no');
         $this->db->select_max('ch_bill_date','bill_date');
         $last_bill_no = $this->db->get_where("tbl_bill_no_sales",array('user_id' => $this->session->userdata('user_id')))->result();
          $this->load->view('general_salesview',array('vehicles' => $vehicles, 'last_bill_no' =>  $last_bill_no));
          //$this->db->last_query();
                          
    }

/*##   Sales General    */
 public function genpurchases()
    {
        $vehicles = $this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id')))->result();

         $this->db->select_max('bill_no');
         $this->db->select_max('bill_date');
         $last_bill_no = $this->db->get_where("tbl_bill_no_purchase",array('user_id' => $this->session->userdata('user_id')))->result();
          $this->load->view('general_purchaseview',array('vehicles' => $vehicles, 'last_bill_no' =>  $last_bill_no, 'last_query' =>  $this->db->last_query()  ));
                          
    }
/*##   Contra     */
 public function contra()
    {
       $banks = $this->db->get_where("tbl_bankdetails",array('user_id' => $this->session->userdata('user_id')))->result();
           
         $this->db->select_max('bill_no');
         $this->db->select_max('bill_date');
         $last_bill_no = $this->db->get_where("tbl_bill_no_contra",array('user_id' => $this->session->userdata('user_id')))->result();
          $this->load->view('contra_view',array( 'banks' => $banks, 'last_bill_no' =>  $last_bill_no));
          //$this->db->last_query();
                          
    }
public function add_item()
{
  $this->load->model('Accounts_Model');
  $this->Accounts_Model->add_item_sales();
}
public function delete_item()
{
  @extract($_POST);$this->load->model('Accounts_Model');
  $this->Accounts_Model->delete_item_sales($item_id,$user_id,$mode);
}

public function cal_grand_total()
{
    $final_discount=$_REQUEST['final_discount'];
    $user_id=$this->session->userdata('user_id');
    $bill_no=$_REQUEST['bill_no'];
    $gd_total =$grand_total =$str ="";


        $add_type=$_REQUEST['add_type'];
                 if ($add_type=='Sales') {
                $tableName='tbl_temp_sales_master';
              } else {
                 $tableName='tbl_temp_purchase_master';
              }

    $query = $this->db->select('*');
   $query = $this->db->where("user_id='$user_id' and bill_no='$bill_no'");
   $query = $this->db->get($tableName)->result();
      
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
  } else {   $led_type='Purchase'; 
    $tableName ='tbl_balancesheet_master_purchase';
  }
  
  $this->load->model("Accounts_Model");
  $return_data = $this->Accounts_Model->do_update_sales_purchase_master($tableName, $led_type);
   if ($led_type=='Sales') { redirect('Accounts/gensales','location');} else {  redirect('Accounts/genpurchases','location');}   
}

public function add_edit_notes()
  {
     $this->load->model('Accounts_Model');  
    
      $this->Accounts_Model->add_edit_notes();
    
  }

public function check_date()
{
   $this->load->model('Accounts_Model');  
  @extract($_POST);
  if ($mode=='purchase') {
    $search_what='bill_date';
    $tableName='tbl_bill_no_purchase';
  } elseif ($mode=='sales') {
    $search_what='ch_bill_date';
    $tableName='tbl_bill_no_sales';
  } elseif ($mode=='receipt') {
    $search_what='bill_date';
    $tableName='tbl_bill_no_receipt';
  } elseif ($mode=='payment') {
    $search_what='bill_date';
    $tableName='tbl_bill_no_payment';
  }
  
    $this->Accounts_Model->check_date($search_what,$tableName);
  
}
public function GetAccounthead(){
    //$keyword=$this->input->post('keyword');
    $keyword=$this->uri->segment('3');
    $data=$this->Accounts_Model->gethead($keyword);        
    echo json_encode($data);
    
}
public function fulldsrreport()
  {
    
      $this->load->view('dsr-report-fullview');    
}

}