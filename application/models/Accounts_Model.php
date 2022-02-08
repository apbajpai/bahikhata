<?php 
class Accounts_Model extends CI_Model {
	
	public function __construct(){

		//print_r($_POST);
		//die();
	}
    public function index()
    {
       
    }
	public function do_upload($tableName, $led_type)
        {
                
               $reff_net=0;
                @extract($_POST);

                //echo "<pre>";print_r($_POST);die();

               $bill_date= nice_date($_POST['bill_date'], 'Y-m-d');
               $bill_date=date_create($bill_date);
               /// checking if party anme is present in the databse or not and if not add it to the tbl_customerdetails table

                $this->db->where("party_name='$party_name' and user_id='$user_id'");$num = $this->db->count_all_results('tbl_customerdetails');
                if ($num>0) {
                        // 
                        // print_r($_POST); 
                } else {
                        
                        $inser_data= array('user_id' => $user_id,  'party_name' => $party_name, 'partyadd' => $party_add, 'phone' => $party_phone, 'mobile' => $party_mobile );
                                                                                                
                        $this->db->insert('tbl_customerdetails', $inser_data);
                       //echo "no data found".$this->db->last_query();
                }

                 $account_of = $this->db->where("tittle='$under_account' and user_id='$user_id'");$account_of_num = $this->db->count_all_results('tbl_account_of');
                if ($account_of_num>0) { } else {   
                 if ($led_type=='Payment') {$account_of_type=2;} else{$account_of_type=1;}                  
                        $inser_data= array('user_id' => $user_id,  'tittle' => $under_account,  'type' => $account_of_type);                                                                                                
                        $this->db->insert('tbl_account_of', $inser_data);
                }
               
               if (!empty($bank)) {
                 $mybank =$this->db->get_where('tbl_bankdetails',array( 'id'=> $bank,'user_id'=>$this->session->userdata('user_id')))->row()->bank_name;
               }
                
                /// add data to receipt master 
                //$tableName = 'tbl_receipt_master';
                $bill_no = (int)($last_billno+1);



                $fieldsData = $this->db->field_data($tableName);
                $datacc = array(); // you were setting this to a string to start with, which is bad
                foreach ($fieldsData as $key => $field)
                {
                    if ($key !='party_id') {
                        $datacc[ $field->name ] = $this->input->post($field->name);
                    }if ($key !='bill_date') {
                       $datacc[ 'bill_date' ] = date_format($bill_date,'Y-m-d');
                    }if ($key !='party_code') {
                       $datacc[ 'party_code' ] = $bill_no;
                    }
                    if ($key !='reff_netbanking') {
                       $datacc[ 'reff_netbanking' ] = $reff_net;
                    }
                   // if ($key =='bank') {
                       $datacc['bank'] =  $mybank ;

                      // echo "<pre>";
                    //}
                }
                //print_r($datacc);die();
               $inserted_data = $this->db->insert($tableName, $datacc);
                
                
                /// now add the payment details to the ledger

                if ($led_type=='Payment') {
                    $inser_data_ledger_party= array('user_id' => $user_id, 'type' => $led_type, 'party_name' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'cr' => 0,'dr' => $amount,'ref' => $bill_no );
                    $this->db->insert('tbl_ledger', $inser_data_ledger_party);

                    
                     $inser_data_bill_no= array('user_id' => $user_id, 'bill_no' => $bill_no, 'partyname' => $party_name, 'bill_date' => date_format($bill_date,'Y-m-d'), 'under_account' => $under_account,'finaltotal' => $amount,'type'=> $led_type);
                     $this->db->insert('tbl_bill_no_payment', $inser_data_bill_no);



                    $inser_data_ledger_me= array('user_id' => $user_id, 'type' => $mybank, 'pname' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'dr' => 0,'cr' => $amount,'ptype'=> $led_type,'ref' => $bill_no);
                } else {
                    $inser_data_ledger_party= array('user_id' => $user_id, 'type' => $led_type, 'party_name' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'dr' => 0,'cr' => $amount ,'ref' => $bill_no);
                    $this->db->insert('tbl_ledger', $inser_data_ledger_party);

                      $inser_data_bill_no= array('user_id' => $user_id, 'bill_no' => $bill_no, 'partyname' => $party_name, 'bill_date' => date_format($bill_date,'Y-m-d'), 'under_account' => $under_account,'finaltotal' => $amount,'type'=> $led_type);
                     $this->db->insert('tbl_bill_no_receipt', $inser_data_bill_no);

                     $inser_data_ledger_me= array('user_id' => $user_id, 'type' => $mybank, 'pname' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'cr' => 0,'dr' => $amount,'ptype'=> $led_type,'ref' => $bill_no);
                    
                }
               
                if ($mybank=='cash') {                     
                    $this->db->insert('tbl_cashledger', $inser_data_ledger_me);
                } else {
                   $this->db->insert('tbl_bankledger', $inser_data_ledger_me);
                }
           
               return $this->db->get_where($tableName, array('user_id' => $user_id,'party_code' => $bill_no ),1)->row();
              
             //die();   
        }
  public function GetRow($keyword) {        
        $this->db->select('party_name');
        $this->db->order_by('id', 'DESC');
        $this->db->like("party_name", $keyword);
        return $this->db->get_where('tbl_customerdetails')->result_array();
    }   

public function GetFullRow($keyword) {        
        $this->db->select('*');
        $this->db->order_by('id', 'DESC');
        $this->db->where("party_name", $keyword);
        return $this->db->get_where('tbl_customerdetails')->result_array();
    }     
  

public function addedit_notes($keyword,$type) {
        
        if ($type=='receipt') {
            $table_name ='tbl_receipt_master';
            $select_what ='particulars as note';
            $get_where_bill_no ="party_code";
        } elseif ($type=='payments' || $type=='payment') {
            $table_name = 'tbl_payment_master';
            $select_what ='particulars as note';
            $get_where_bill_no ="party_code";
        }elseif ($type=='purchase' || $type == 'purchases') {
            $table_name = 'tbl_balancesheet_master_purchase';
            $select_what ='note';
            $get_where_bill_no ="bill_no";
        } else {
            $table_name = 'tbl_balancesheet_master_sales';
            $select_what ='note';
            $get_where_bill_no ="bill_no";
        }        
        $this->db->select($select_what);
        $this->db->where($get_where_bill_no, $keyword);
        return $this->db->get_where($table_name)->row();
    } 
public function DeleteReport($tableName1,$id,$tableName2,$type) {        
        
       if ($type=='Gensales' || $type=='Genpurchases' ) {


            if ($type=='gensales') {$tableName3 = "tbl_temp_sales_master"; } else {$tableName3 = "tbl_temp_purchase_master";  }
            
           
             $data3=array('total_amount'=>'0','amount'=>'0','final_amount'=>'0','item_name'=>'Cancel' );
         // $this->db->set('last_login','current_login',false);
          $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'bill_no'=> $id));
          $this->db->update($tableName3,$data3);


           $data1=array('grand_total'=>'0','party_name'=>'Cancel','note'=>'Cancel','payment_word'=>'Cancel','tpt_name'=>'Cancel' );
         // $this->db->set('last_login','current_login',false);
          $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'party_code'=> $id));
          $this->db->update($tableName1,$data1);

          $data2=array('finaltotal'=>'0','partyname'=>'Cancel' );
         // $this->db->set('last_login','current_login',false);
          $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'bill_no'=> $id));
          $this->db->update($tableName2,$data2);

       } else {

           $data1=array('amount'=>'0','party_name'=>'Cancel','particulars'=>'Cancel','payment_word'=>'Cancel' );
         // $this->db->set('last_login','current_login',false);
          $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'party_code'=> $id));
          $this->db->update($tableName1,$data1);

          $data2=array('finaltotal'=>'0','partyname'=>'Cancel' );
         // $this->db->set('last_login','current_login',false);
          $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'bill_no'=> $id));
          $this->db->update($tableName2,$data2);
       }
       

        $data3=array('dr'=>'0','party_name'=>'Cancel','cr'=>'0' );
       // $this->db->set('last_login','current_login',false);
        $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'ref'=> $id, 'type'=> $type));
        $this->db->update('tbl_ledger',$data3);
       

    }  
   
 function get_bank($q){
    $this->db->select('*');
    $this->db->like('bank', $q);
    $query = $this->db->get_where('tbl_receipt_master',array( 'user_id'=>$this->session->userdata('user_id')));
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = $row['bank']; 
      }
      echo json_encode($row_set); 
    }
  }     
 function get_branch($q){
    $this->db->select('*');
    $this->db->like('branch', $q);
    $query = $this->db->get_where('tbl_receipt_master',array( 'user_id'=>$this->session->userdata('user_id')));
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = $row['branch']; 
      }
      echo json_encode($row_set); 
    }
  } 

  function get_vehicles($q){
    $this->db->select('*');
    $this->db->like('reg_no', $q);
    $query = $this->db->get_where('tbl_vehicledetails',array('status <>' => 'sell', 'user_id'=>$this->session->userdata('user_id')));
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = $row['reg_no']; 
      }
      echo json_encode($row_set); 
    }
  }
public function get_items_sp($q){
    // $this->db->select('*');
    // $this->db->distinct();
    // $this->db->like('item_name', $q);
    // $this->db->get_where('tbl_temp_sales_master',array('user_id'=>$this->session->userdata('user_id')));
    // $query1 = $this->db->last_query();
    // $this->db->select('*');
    // $this->db->distinct();
    // $this->db->like('item_name', $q);
    // $this->db->get_where('tbl_temp_purchase_master',array('user_id'=>$this->session->userdata('user_id')));
    // $query2 = $this->db->last_query();


    //  $query = $this->db->select('tbl_temp_sales_master.item_name as item_names');
    // $query = $this->db->distinct();
    // $query = $this->db->like('tbl_temp_sales_master.item_name', $q);
    // $query = $this->db->join('tbl_temp_sales_master', 'tbl_temp_sales_master.user_id = tbl_temp_purchase_master.user_id');
    // $query = $this->db->get_where('tbl_temp_purchase_master',array('tbl_temp_sales_master.user_id'=>$this->session->userdata('user_id')));

    $query = $this->db->select('tbl_item_ledger.item as item_names');
    $query = $this->db->distinct();
    $query = $this->db->like('item', $q);
    $query = $this->db->get_where('tbl_item_ledger',array('tbl_item_ledger.user_id'=>$this->session->userdata('user_id')));

    //$query =  $this->db->query($query1." UNION ".$query2);
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = $row['item_names']; 
      }
     
    } echo json_encode($query->result_array()); 
}
public function get_units_sp($q){
    // $query1 = $this->db->select('*');
    // $query1 = $this->db->distinct();
    // $query1 = $this->db->like('unit', $q);
    // $query1 = $this->db->get_where('tbl_temp_sales_master',array('user_id'=>$this->session->userdata('user_id')));
    // $query1 = $this->db->last_query();
    // $query2 = $this->db->select('*');
    // $query2 = $this->db->distinct();
    // $query2 = $this->db->like('unit', $q);
    // $query2 = $this->db->get_where('tbl_temp_purchase_master',array('user_id'=>$this->session->userdata('user_id')));
    // $query2 = $this->db->last_query();

    $query = $this->db->select('tbl_temp_sales_master.unit as units');
    $query = $this->db->distinct();
    $query = $this->db->like('tbl_temp_sales_master.unit', $q);
    $query = $this->db->join('tbl_temp_sales_master', 'tbl_temp_sales_master.user_id = tbl_temp_purchase_master.user_id');
    $query = $this->db->get_where('tbl_temp_purchase_master',array('tbl_temp_sales_master.user_id'=>$this->session->userdata('user_id')));
  // echo $this->db->last_query();

    //$query =  $this->db->query($query1." UNION ".$query2);
    if($query->num_rows() > 0){
      foreach ($query->result_array() as $row){
        $row_set[] = $row['units']; 
      }
      //echo json_encode($row_set); 
    }echo json_encode($query->result_array()); 
}
  public function do_update_sales() // this function is use to add details of vehicle details sales
        {
                 @extract($_POST); $bill_date=date_create($bill_date);
                 $bill_no = (int)($last_billno+1);$username = $this->session->userdata('username');
                 $this->db->where("party_name='$party_name' and user_id='$user_id'");$num = $this->db->count_all_results('tbl_customerdetails');
                if ($num<=0) {                      
                        
                      $inser_data= array('user_id' => $user_id,  'party_name' => $party_name, 'partyadd' => $party_add, 'phone' => $party_phone );
                      $this->db->insert('tbl_customerdetails', $inser_data);
                }
                $inser_data= array('user_id' => $user_id, 'reg_no' => $item_name,  'brief_desc' => $particulars,  'final_amount' => $final_amount, 'total_amount' => $total_amount, 'advance_amount' => $advance_amount, 'commission_amount' => $commission_amount, 'party_name' => $party_name, 'party_add' => $party_add, 'cheque_no'=> $cheque_no, 'mode_of_payment' =>$mode_of_payment, 'bill_no' => $bill_no, 'sales_date'=> date_format($bill_date,'Y-m-d'),'status'=>'sell');
                                                
                if($this->db->insert('tbl_vehiclesalesdetails', $inser_data)){
                        $inser_data_ledger_party= array('user_id' => $user_id, 'type' => 'Sales', 'party_name' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'cr' => $advance_amount,'dr' => $total_amount,'ref'=>$bill_no );
                      $this->db->insert('tbl_ledger', $inser_data_ledger_party);  



                      $inser_data_bill_no= array('user_id' => $user_id, 'bill_no' => $bill_no, 'partyname' => $party_name, 'ch_bill_date' => date_format($bill_date,'Y-m-d'), 'under_account' => "Sales",'finaltotal' => $total_amount,'type'=> $mode_of_payment);
                      
                      $this->db->insert('tbl_bill_no_sales', $inser_data_bill_no);


                     $inser_data_master_sales= array('party_code' => $bill_no, 'party_name' => $party_name, 'party_add' => $party_add, 'party_mobile' => $party_mobile, 'final_amount' => $final_amount, 'pay_amount' => $advance_amount, 'rest_amount' => ($total_amount-$advance_amount), 'blance_type' => '', 'user_id' => $username, 'entry_date' => date_format($bill_date,'Y-m-d'),  'bil_date' => date_format($bill_date,'Y-m-d'), 'bill_no' => $bill_no, 'note' => $particulars, 'type' => $mode_of_payment, 'ch_bill_date' => date_format($bill_date,'Y-m-d'), 'payment_word' => $payment_word, 'user_id' => $user_id,  'grand_total' => $total_amount);

                    $this->db->insert('tbl_balancesheet_master_sales', $inser_data_master_sales);

                    $inser_data_tbl_item_ledger= array('pname' => $party_name, 'item' => $item_name, 'dat' => date_format($bill_date,'Y-m-d'), 'type' => 'Sales', 'output' => 1, 'ref' => $bill_no,  'user_id' => $user_id);

                    $this->db->insert('tbl_item_ledger', $inser_data_tbl_item_ledger);

                     $inser_data_temp_sales= array('item_name' => $item_name, 'unit' => 'pcs', 'quantity' => '1', 'rate' => $final_amount, 'dis_type' => '%', 'discount' => 0, 'amount' => $final_amount, 'vat' => $gst_amt, 'total_amount' => $total_amount, 'final_amount' => $final_amount, 'user' => $username, 'entry_date' => date_format($bill_date,'Y-m-d'), 'modify_date' => date_format($bill_date,'Y-m-d'), 'bil_date' => date_format($bill_date,'Y-m-d'), 'bill_no' => $bill_no, 'ch_bill_date' => date_format($bill_date,'Y-m-d'), 'user_id' => $user_id, 'final_discount' => 0, 'grand_total' => $total_amount);
                
                     $this->db->insert('tbl_temp_sales_master', $inser_data_temp_sales);
                 
                        $inser_data_ledger_me= array('user_id' => $user_id, 'type' => 'Sales', 'pname' => $party_name, 'dat' =>date_format($bill_date,'Y-m-d'), 'dr' => $advance_amount,'cr' => $total_amount,'ref'=>$bill_no, 'ptype'=>'Sales'  );
                         if ($mode_of_payment=='cash') {                     
                                $this->db->insert('tbl_cashledger', $inser_data_ledger_me);
                            } else {
                               $this->db->insert('tbl_bankledger', $inser_data_ledger_me);
                            }
                        $inser_data_update =array('status'=>'sell');
                    


                     //$update_purchase = $this->db->where(array('user_id'=>$sess_id, 'reg_no' => $item_name)); 
                     $update_purchase = $this->db->update('tbl_vehicledetails', $inser_data_update, array('user_id'=>$user_id, 'reg_no' => $item_name)); 

                    // echo $this->db->last_query();die();

                        return TRUE; //$this->load->view('vehicleadd', $data);
                }else{
                        return FALSE;//  $this->load->view('vehicleadd', $error);    
                }
        }

        public function add_item_sales()
        {
             
              $party_name=ucwords($_REQUEST['pname']);
              $item=ucwords($_REQUEST['items']);
              $username=ucwords($this->session->userdata('username'));
              $units=ucwords($_REQUEST['units']);
              $quantity=$_REQUEST['quantity'];
              $rate=$_REQUEST['rate'];
              $amount=$_REQUEST['amount'];
              $vat=$_REQUEST['vat'];
              $total_amount=$_REQUEST['total_amount'];
              $final_total=$_REQUEST['final_total'];
              $discount=$_REQUEST['discount'];
              $user_id=$this->session->userdata('user_id');   
              $mode=$_REQUEST['mode'];
              $vat_amount=$_REQUEST['vat_amount'];
              $discount_type=$_REQUEST['discount_type'];
              $today_date=date("Y-m-d");
              $bill_date=$_REQUEST['bill_date'];
              $bill_no=$_REQUEST['billno'];
              $str=$str1=$str2=$final_discount= $grand_total="";
              $bill_date=date_create($bill_date);
              $bill_date=date_format($bill_date,'Y-m-d');


              $add_type=$_REQUEST['add_type'];
              if ($add_type=='Sales') {
                $tableName='tbl_temp_sales_master';
              } else {
                 $tableName='tbl_temp_purchase_master';
              }
              

              if($mode=="add" && $item!="" && $units!="" && $quantity!="" && $rate!=""){

                  $row_num = $this->db->select('*');
                  $row_num = $this->db->where("user_id='$user_id' and bill_no='$bill_no'");
                  $row_num = $this->db->count_all_results($tableName);

                if($row_num>=7) {
                  $this->session->set_userdata(['sess_mess' => "Maximum limit is of 7 items per invoice... "]); 
                }
                else{
                   
                   $this->session->set_userdata(['sess_mess' => " "]);                    
                   

                  $inser_data_add_item_sales= array('bil_date' => $bill_date, 'item_name' => $item, 'unit' => $units, 'quantity' => $quantity, 'rate' => $rate, 'discount' => $discount, 'dis_type' => $discount_type, 'amount' => $amount, 'vat' => $vat, 'vatt' => $vat_amount, 'user' => $username, 'entry_date' => $today_date, 'bill_no' => $bill_no, 'total_amount' => $total_amount, 'final_amount' => $final_total, 'final_discount' => $final_discount, 'grand_total' => $grand_total, 'user_id' => $user_id);

                  $inser_dataitem_sales = $this->db->insert($tableName, $inser_data_add_item_sales);
             
                  $result_s = $this->db->select('quantity');
                   $result_s = $this->db->where("item_name='$item' and user_id='$user_id' and bill_no='$bill_no'");
                   $result_s = $this->db->get($tableName)->row();
                   $output = intval($result_s->quantity);

                   if ($add_type=='Sales') {
                      $inser_data_tbl_item_ledger= array('pname' => $party_name, 'item' => $item, 'dat' => $bill_date, 'type' => 'Sales', 'output' => $output , 'ref' => $bill_no,  'user_id' => $user_id);
                    } else {
                      $inser_data_tbl_item_ledger= array('pname' => $party_name, 'item' => $item, 'dat' => $bill_date, 'type' => 'Purchase', 'input' => $output , 'ref' => $bill_no,  'user_id' => $user_id);
                    }
              
                 

                  $this->db->insert('tbl_item_ledger', $inser_data_tbl_item_ledger);
                         
                  
                }
                  
                       
              }

              $row_result = $this->db->select('*');
                 $row_result = $this->db->where("user_id='$user_id' and bill_no='$bill_no' order by party_id ASC");
                 $row_result = $this->db->get($tableName)->result();

            
                $str2='<div class="form-row">
                                     <div class="form-group col-md-12">
                                   
                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th><th style="text-align:right;">Qunatity</th>
                                                        <th>&nbsp;&nbsp;Unit</th>
                                                        <th style="text-align:right;">Rate</th>
                                                        <th style="text-align:right;">Amount</th>
                                                        <th style="text-align:right;">Discount</th>
                                                        <th>&nbsp;</th>
                                                        <th style="text-align:right;">Total Amount</th>
                                                        <th style="text-align:right;">Vat(%)</th>
                                                        <th style="text-align:right;">Vat Amount</th>
                                                        <th style="text-align:right;">Final Total</th>
                                                        <th>Action</th>
                                                        </tr>
                                            </thead>
                                             <tbody>
                         ';
                         foreach ($row_result as $key => $row) {
                            $str='<tr><td >'.$row->item_name.'</td>';
                            $str.='<td style="text-align:right;">'.$row->quantity.'</td>'; 
                            $str.='<td>&nbsp;&nbsp;'.$row->unit.'</td>';
                            $str.='<td style="text-align:right;">'.$row->rate.'</td>';
                            $str.='<td style="text-align:right;">'.$row->amount.'</td>';
                            $str.='<td style="text-align:right;">'.$row->discount.'</td>';
                            $str.='<td>&nbsp;'.$row->dis_type.'</td>';
                            $str.='<td style="text-align:right;">'.$row->total_amount.'</td>';
                            $str.='<td style="text-align:right;">'.$row->vat.'</td>';
                            $str.='<td style="text-align:right;">'.$row->vatt.'</td>';
                            $str.='<td style="text-align:right;">'.$row->final_amount.'</td>';
                            $str.='<td><input class=delbtn type="button" name="del" id="del" onClick="javascript: delete_item(';
                            $str.=$row->party_id; $str.=');" value="Delete" /></td></tr>';
                            $str1.=$str;
                         }
                  // while($row=mysql_fetch_array($result)){
                          
                  // } 
                  echo $str2.$str1.'<tr><td colspan="12" align="center" style="color:red;">'.$this->session->userdata('sess_mess').'</td></tr><tbody></table>'; 

        }
public function do_update_sales_purchase_master($tableName, $led_type)
        {
                
               
                @extract($_POST);

               if (empty($grand_total)) {
                return FALSE;
               } else {
                 

               $bill_date= nice_date($_POST['bill_date'], 'Y-m-d');
               $bill_date=date_create($bill_date);
                $this->db->where("party_name='$party_name' and user_id='$user_id'");
                $num = $this->db->count_all_results('tbl_customerdetails');
                if ($led_type=='Sales') { 
                  $inser_data= array('user_id' => $user_id,  'party_name' => $party_name, 'partyadd' => $party_add, 'phone' => $party_phone, 'mobile' => $party_mobile, 'sup_pan' => $pan_no );
                }else{
                  $inser_data= array('user_id' => $user_id,  'party_name' => $party_name, 'partyadd' => $party_add, 'phone' => $party_phone, 'mobile' => $party_mobile , 'sup_pan' => $sup_pan , 'sup_tin' => $tin_no );
                }
                if ($num<=0) {
                    $this->db->insert('tbl_customerdetails', $inser_data);
                }else{
                    $cust_data_where =array('party_name'=> $party_name, 'user_id'=>$user_id);
                    $this->db->update('tbl_customerdetails',  $inser_data, $cust_data_where);
                }
               
                //$bill_no = (int)($last_billno+1);
                $fieldsData = $this->db->field_data($tableName);
                $datacc = array(); // you were setting this to a string to start with, which is bad
                foreach ($fieldsData as $key => $field)
                {
                    //if ($key !='party_id') {
                        $datacc[ $field->name ] = $this->input->post($field->name);
                    /// }
                    if ($key !='bil_date') {
                       $datacc[ 'bil_date' ] =  date_format($bill_date,'Y-m-d');
                    }
                    if ($led_type!='Sales' &&  $key !='sup_tin') {
                       $datacc[ 'sup_tin' ] =  $this->input->post('tin_no');
                    }
                                                           
                    
                    if ($key !='discount_inrs') {
                      $datacc['discount_inrs']= $final_discount;
                    }
                   
                }
               $inserted_data = $this->db->insert($tableName, $datacc);
                
                
                $temp_data_update =array('done'=>1);
                $temp_data_where =array('user_id'=>$user_id, 'bill_no' => $bill_no, 'done' => '');

                if ($led_type=='Sales') {
                    $inser_data_ledger_party= array('user_id' => $user_id, 'type' => $led_type, 'party_name' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'cr' => 0,'dr' => $grand_total,'ref' => $bill_no );
                    $this->db->insert('tbl_ledger', $inser_data_ledger_party);

                    $gstTotal = $this->db->select_sum('vatt')->get_where('tbl_temp_sales_master',array('bill_no'=>$bill_no))->row();
                    $gst_total = $gstTotal->vatt;
                     $inser_data_bill_no= array('user_id' => $user_id, 'bill_no' => $bill_no, 'partyname' => $party_name, 'ch_bill_date' => date_format($bill_date,'Y-m-d'), 'under_account' => $led_type,'finaltotal' => $grand_total,'type'=> $led_type,'billing_type' => $billing_type, 'gst_amount' => $gst_total);
                     $this->db->insert('tbl_bill_no_sales', $inser_data_bill_no);



                   $update_purchase = $this->db->update('tbl_temp_sales_master', $temp_data_update, $temp_data_where);
                } else {
                    $inser_data_ledger_party= array('user_id' => $user_id, 'type' => $led_type, 'party_name' => $party_name, 'dat' => date_format($bill_date,'Y-m-d'), 'dr' => 0,'cr' => $grand_total ,'ref' => $bill_no);
                    $this->db->insert('tbl_ledger', $inser_data_ledger_party);

                    $gstTotal = $this->db->select_sum('vatt')->get_where('tbl_temp_purchase_master',array('bill_no'=>$bill_no))->row();
                    $gst_total = $gstTotal->vatt;
                      $inser_data_bill_no= array('user_id' => $user_id, 'bill_no' => $bill_no, 'partyname' => $party_name, 'bill_date' => date_format($bill_date,'Y-m-d'), 'under_account' => $led_type,'finaltotal' => $grand_total,'type'=> $led_type,'billing_type' => $billing_type, 'gst_amount' => $gst_total);
                     $this->db->insert('tbl_bill_no_purchase', $inser_data_bill_no);

                     $update_purchase = $this->db->update('tbl_temp_purchase_master', $temp_data_update, $temp_data_where);
                    
                }
               return $this->db->get_where($tableName, array('user_id' => $user_id,'party_code' => $bill_no ),1)->row();
              //echo "<pre>";print_r($_POST);die();
             //die(); 
             } 
        }
public function delete_item_sales($party_id,$user_id)
{
   if ($add_type=='Sales') {
                $tableName='tbl_temp_sales_master';
              } else {
                 $tableName='tbl_temp_purchase_master';
              }

   $temp_data_where =array('user_id'=>$user_id, 'party_id' => $party_id);
  $update_purchase = $this->db->delete($tableName, $temp_data_where);
  echo $ret="del";
}
public function add_edit_notes()
  {
    @extract($_POST);
     if ($type=='receipt') {
            $table_name ='tbl_receipt_master';
            $select_what ='particulars';
            $get_where_bill_no ="party_code";
        } elseif ($type=='payments' || $type=='payment') {
            $table_name = 'tbl_payment_master';
            $select_what ='particulars';
            $get_where_bill_no ="party_code";
        }elseif ($type=='purchase' || $type == 'purchases') {
            $table_name = 'tbl_balancesheet_master_purchase';
            $select_what ='note';
            $get_where_bill_no ="bill_no";
        } else {
            $table_name = 'tbl_balancesheet_master_sales';
            $select_what ='note';
            $get_where_bill_no ="bill_no";
        }        
        $inser_data_update = array($select_what => $note);

         
        if ($update_purchase = $this->db->update($table_name, $inser_data_update, array('user_id'=> $user_id, $get_where_bill_no => $bill_no))) {
           $this->session->set_userdata(['sess_mess' => "Updated Successfully ...."]); 
        } else {
           $this->session->set_userdata(['sess_mess' => "error !!!!!!!!!!!!!!"]); 
        }
        
        redirect('accounts/addeditnotes/','location');
  }

public function check_date($search_what,$tableName)
{
  @extract($_POST);print_r($_POST);
  $row_result = $this->db->select_max($search_what, 'bill_dates');
  $row_result = $this->db->where("user_id='$user_id'");
  $row_result = $this->db->get($tableName)->row();

  if(strtotime($row_result->bill_dates) > strtotime($bill_date)){
      $str="###"."no";
    }
    else
    {
      $str="###"."yes";
    }
    
   echo $str;

}

public function do_update_contra($tableName, $led_type)
        {        
            $frombranch="0";$tobranch="0";$balance=0;$tochno=0;$fromchno=0;
            @extract($_POST); 
            if ($frombank!='cash') {
              $frombank =$this->db->get_where('tbl_bankdetails',array( 'id'=> $this->input->post('frombank'),'user_id'=>$this->session->userdata('user_id')))->row()->bank_name;
             
            }
            if ($tobank!='cash') {
              $tobank =$this->db->get_where('tbl_bankdetails',array( 'id'=> $this->input->post('tobank'),'user_id'=>$this->session->userdata('user_id')))->row()->bank_name;
             
            }
             
           $bill_date=date_create($bill_date);$bill_date= date_format($bill_date, 'Y-m-d');          

       $bill_no_contra_bill_no= array('bill_no' => $bill_no, 'bill_date' => $bill_date, 'tobank' => $tobank, 'tobranch' => $tobranch, 'tochno' => $tochno, 'frombank' => $frombank, 'frombranch' => $frombranch, 'fromchno' => $fromchno, 'amount' => $amount, 'words' => $payment_word, 'notes' => $particulars, 'user_id' => $user_id, 'con_type' => $cash);
       $this->db->insert($tableName, $bill_no_contra_bill_no);
             
    if($cash=='Deposit')
    {

      $bankledger_contra= array('pname' => 'Cash', 'dat' => $bill_date, 'type' => $tobank, 'dr' => $amount, 'cr' => 0, 'bal' => $balance, 'ref' => $bill_no, 'ptype' => $led_type,'user_id'=>$user_id);
          $this->db->insert('tbl_bankledger', $bankledger_contra);

     $cashledger_contra= array('pname' => $tobank, 'dat' => $bill_date, 'type' => $led_type, 'dr' => 0, 'cr' => $amount, 'bal' => $balance, 'ref' => $bill_no,'user_id'=>$user_id);
          $this->db->insert('tbl_cashledger', $cashledger_contra);

    }
    else
    {
      

            if( $tobank!='Cash' and $frombank!='Cash'){


              $tobnkledger_contra= array('pname' => $frombank, 'dat' => $bill_date, 'type' => $tobank, 'dr' => $amount, 'cr' => 0, 'bal' => $balance, 'ref' => $bill_no, 'ptype' => $led_type,'user_id'=>$user_id);

             $bankledger_contra= array('pname' => $tobank, 'dat' => $bill_date, 'type' => $frombank, 'dr' => 0, 'cr' => $amount, 'bal' => $balance, 'ref' => $bill_no, 'ptype' => $led_type,'user_id'=>$user_id);
                 

                  $this->db->insert('tbl_bankledger', $tobnkledger_contra);
                  $this->db->insert('tbl_bankledger', $bankledger_contra);


            }
            elseif( $tobank=='Cash' and $frombank!='Cash')
            {
             
              $cashledger_contra= array('pname' => $frombank, 'dat' => $bill_date, 'type' => $led_type, 'dr' => $amount, 'cr' => 0, 'bal' => $balance, 'ref' => $bill_no,'user_id'=>$user_id);
             $bankledger_contra= array('pname' => "Cash", 'dat' => $bill_date, 'type' => $frombank, 'dr' => 0, 'cr' => $amount, 'bal' => $balance, 'ref' => $bill_no,'ptype'=> $led_type,'user_id'=>$user_id);
                  $this->db->insert('tbl_cashledger', $cashledger_contra);
                  $this->db->insert('tbl_bankledger', $bankledger_contra);

            }


    }//echo $this->db->last_query();     die();   
    return $this->db->get_where($tableName, array('user_id' => $user_id,'bill_no' => $bill_no ),1)->row();
}

    public function gethead($keyword) {        
        $this->db->select('tittle as value');
        $this->db->order_by('id', 'DESC');
        $this->db->like("tittle", $keyword);
        return $this->db->get_where('tbl_account_of',array( 'user_id'=>$this->session->userdata('user_id'), 'active_status' => 'Active'))->result_array();
    } 
   public function get_bird($q){
    $this->db->select('party_name');
    $this->db->like('party_name', $q);
    $query = $this->db->get_where('tbl_customerdetails',array( 'user_id'=>$this->session->userdata('user_id')))->result_array();
    // if($query->num_rows() > 0){
    //   foreach ($query->result_array() as $row){
    //     $row_set = $row['party_name']; 
    //   }
      echo json_encode($query); 
    //}
  } 

}
?>