<?php 
class VehicleAddModel extends CI_Model {
	
	public function __construct(){

		//print_r($_POST);
		//die();
	}
	public function do_upload()
        {
                 @extract($_POST);  $purchase_date=date_create($purchase_date);
                 $bill_no = (int)($last_billno+1);$username = $this->session->userdata('username');
                 $this->db->where("party_name='$seller_comp_name' and user_id='$user_id'");$num = $this->db->count_all_results('tbl_customerdetails');
                if ($num<=0) {                      
                        
                        $inser_data= array('user_id' => $user_id,  'party_name' => $seller_comp_name, 'partyadd' => $seller_comp_address, 'phone' => $truevalue_man_mobile );
                                                                                                
                        $this->db->insert('tbl_customerdetails', $inser_data);
                       //echo "no data found".$this->db->last_query();
                }
               
             if ($_FILES["image_path"]['name']) {
                    
                   $config['encrypt_name']         = TRUE;        
                        // $new_name                       = time().$_FILES["image_path"]['name'];
            //             $config['file_name']            = $new_name;
            		$config['upload_path']          = './assets/uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 20000;
                    $config['max_width']            = 1724;
                    $config['max_height']           = 968;

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload('image_path'))
                    {
                            $error = array('error' => $this->upload->display_errors());
                            $new_name  = "";
                            
                            print_r($error);die();
                            return $error;


                        
                    }
                    else
                    {    
                        $data = array('upload_data' => $this->upload->data());                            
                        $new_name  = $data['upload_data']['file_name'];
                        //    return $data;                            
                    }
                 } else {
                    $new_name = "";
                }
               
                       //print_r($_POST);die();//, 'first_amount' => $first_amount, 'second_amount' => $second_amount
                $inser_data= array('user_id' => $user_id, 'reg_no' => $reg_no, 'image_path' => $new_name, 'veh_type' => $veh_type,'insuarance_date' => $insuarance_date, 'purchase_date' => date_format($purchase_date,'Y-m-d'), 'model' => $model, 'owner_name' => $owner_name, 'make' => $make, 'engine_no' => $engine_no, 'brief_desc' => $brief_desc, 'chasis_no' => $chasis_no, 'owner_address' => $owner_address, 'owner_mobile' => $owner_mobile, 'owner_email' => $owner_email, 'sup_no' => $sup_no, 'final_amount' => $final_amount, 'total_amount' => $total_amount, 'truevalue_man_mobile' => $truevalue_man_mobile, 'advance_amount' => $advance_amount, 'commission_amount' => $commission_amount, 'seller_comp_name' => $seller_comp_name, 'seller_comp_address' => $seller_comp_address, 'truevalue_man_name' => $truevalue_man_name , 'truevalue_man_email' => $truevalue_man_email,'cheque_no'=> $cheque_no, 'mode_of_payment' =>$mode_of_payment, 'bill_no' => $bill_no, 'model_year' => $model_year);
                                                
                if($this->db->insert('tbl_vehicledetails', $inser_data)){
                        $inser_data_ledger_party= array('user_id' => $user_id, 'type' => 'Purchase', 'party_name' => $seller_comp_name, 'dat' => date_format($purchase_date,'Y-m-d'), 'dr' => $advance_amount,'cr' => $total_amount ,'ref'=>$bill_no );
                      $this->db->insert('tbl_ledger', $inser_data_ledger_party);  



                      $inser_data_bill_no= array('user_id' => $user_id, 'bill_no' => $bill_no, 'partyname' => $seller_comp_name, 'bill_date' => $curdate, 'under_account' => "Purchase",'finaltotal' => $total_amount,'type'=> $mode_of_payment);
                      
                      $this->db->insert('tbl_bill_no_purchase', $inser_data_bill_no);


                     $inser_data_master_purchase= array('party_code' => $bill_no, 'party_name' => $seller_comp_name, 'party_add' => $seller_comp_address, 'party_mobile' => $truevalue_man_mobile, 'final_amount' => $final_amount, 'pay_amount' => $advance_amount, 'rest_amount' => ($total_amount-$advance_amount), 'blance_type' => '', 'user_id' => $username, 'entry_date' => date_format($purchase_date,'Y-m-d'),  'bil_date' => date_format($purchase_date,'Y-m-d'), 'bill_no' => $bill_no, 'note' => $brief_desc, 'type' => $mode_of_payment, 'ch_bill_date' => date_format($purchase_date,'Y-m-d'), 'payment_word' => $payment_word, 'user_id' => $user_id,  'grand_total' => $total_amount,   'sup_no' => $sup_no);

                    $this->db->insert('tbl_balancesheet_master_purchase', $inser_data_master_purchase);

                    $inser_data_tbl_item_ledger= array('pname' => $seller_comp_name, 'item' => $reg_no, 'dat' => date_format($purchase_date,'Y-m-d'), 'type' => 'Purchase', 'input' => 1, 'ref' => $bill_no,  'user_id' => $user_id);

                    $this->db->insert('tbl_item_ledger', $inser_data_tbl_item_ledger);

                     $inser_data_temp_purchase= array('item_name' => $reg_no, 'unit' => 'pcs', 'quantity' => '1', 'rate' => $final_amount, 'dis_type' => '%', 'discount' => 0, 'amount' => $final_amount, 'vat' => $gst_amt, 'total_amount' => $total_amount, 'final_amount' => $final_amount, 'user' => $username, 'entry_date' => date_format($purchase_date,'Y-m-d'), 'modify_date' => date_format($purchase_date,'Y-m-d'), 'bil_date' => date_format($purchase_date,'Y-m-d'), 'bill_no' => $bill_no, 'ch_bill_date' => date_format($purchase_date,'Y-m-d'), 'user_id' => $user_id, 'final_discount' => 0, 'grand_total' => $total_amount);
                
                     $this->db->insert('tbl_temp_purchase_master', $inser_data_temp_purchase);
                 
                        $inser_data_ledger_me= array('user_id' => $user_id, 'type' => 'Purchase', 'pname' => $seller_comp_name, 'dat' =>date_format($purchase_date,'Y-m-d'), 'cr' => $advance_amount,'dr' => $total_amount,'ref'=>$bill_no, 'ptype'=>'Purchase' );
                         if ($mode_of_payment=='cash') {                     
                                $this->db->insert('tbl_cashledger', $inser_data_ledger_me);
                            } else {
                               $this->db->insert('tbl_bankledger', $inser_data_ledger_me);
                            }
                        
                        
                        return TRUE; //$this->load->view('vehicleadd', $data);
                }else{
                        return FALSE;//  $this->load->view('vehicleadd', $error);    
                }
        }

}
?>