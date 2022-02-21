<?php

namespace App\Controllers;

use App\Models\BillPurchaseModel;
use App\Models\VehicleDetailsModel;
use CodeIgniter\I18n\Time;
use App\Models\TempPurchaseMasterModel;
use App\Models\ItemLedgerModel;
use App\Models\CustomerDetailsModel;
use App\Models\BalancesheetMasterPurchaseModel;

class Accounts extends BaseController
{
    public function __construct() {
        helper('cookie');
        $this->validation = \Config\Services::validation();
        $this->bill_purchase = new BillPurchaseModel();
        $this->vehicle_details = new VehicleDetailsModel();
        $this->seesion = session();
        $this->user_id = $this->seesion->get('user_id');
        $this->user_name = ucwords($this->seesion->get('user_fullname'));
        $this->purchase_master_model = new  TempPurchaseMasterModel();
        $this->db      = \Config\Database::connect();
        $this->item_ledger_model = new  ItemLedgerModel();
        $this->customer_details   = new CustomerDetailsModel();
        $this->uri = service('uri');
        $this->balance_purchase_model = new BalancesheetMasterPurchaseModel();
    }

    public function index(){
        return  redirect()->to('login');
    }

    public function general_purchase(){

        $this->header_data['page_name'] = 'General Purchase';

        // get vechical details 
        // $this->vehicle_details->where('user_id', 1)->findAll();

        // get last bill details 
        $last_bill_details = $this->bill_purchase->getMaxBillDetails($this->user_id);

        if ($last_bill_details->bill_date) {
            $time = Time::parse($last_bill_details->bill_date, 'Asia/Calcutta');
            $last_bill_details->bill_date = $time->toLocalizedString('M/d/Y'); // March 9, 2016 
            $last_bill_details->entry_bill_date_limit = $last_bill_details->bill_date;
        } else {
            $last_bill_details->entry_bill_date_limit = "-3w";
        }
        $this->data['last_bill_details'] = $last_bill_details;

        echo view(THEME_NAME . '/include/header', $this->header_data);
        echo view(THEME_NAME . '/include/sidebar');
        echo view(THEME_NAME . '/accounts/general-purchase', $this->data);
        echo view(THEME_NAME . '/include/footer');
    }

    public function general_purchase_add(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();

            // get customer details 
            $result = $this->customer_details->where('party_name', $postData['party_name'])->where('user_id', $this->user_id)->findAll();
            $customer_data = array();
            $customer_data['user_id'] = $this->user_id;
            $customer_data['party_name'] = $postData['party_name'];
            $customer_data['partyadd'] = $postData['party_add'];
            $customer_data['phone'] = $postData['party_phone'];
            $customer_data['mobile'] = $postData['party_mobile'];
            $customer_data['sup_pan'] = $postData['sup_pan'];
            $customer_data['sup_tin'] = $postData['tin_no'];
            $customer_data['email'] = $postData['email'];

            if(count($result)>0) {
                $customer_data['id'] = $result[0]['id'];
            } 
            // insert update customer details 
            $this->customer_details->save($customer_data);

            $this->balance_purchase_model->saveData($postData);
            
        } else {
            $this->session->setFlashdata('error', 'Method Not Allowed');
            return redirect()->to('accounts/general-purchase');
        }

        /*echo view(THEME_NAME.'/include/header', $this->header_data);
        echo view(THEME_NAME.'/include/sidebar');
        echo view(THEME_NAME.'/accounts/general-purchase', $this->data);
        echo view(THEME_NAME.'/include/footer');*/
    }

    public function add_item(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            if ($postData['add_type'] == 'Purchase') {
                $bill_no = $postData['bill_no'];

                $pname = $postData['pname'];
                $postData['user'] = $this->user_name;
                $postData['user_id'] = $this->user_id;
                $postData['final_discount'] = $postData['grand_total'] = $postData['weight'] = $postData['done'] = $postData['ch_bill_date'] = '';
                $postData['entry_date'] = date('Y-m-d');
                unset($postData['pname']);

                $time = Time::parse($postData['bill_date'], 'Asia/Calcutta');
                $bill_date = $time->toLocalizedString('Y-m-d'); // March 9, 2016
                $postData['bill_date'] = $bill_date;

                $countResult = $this->purchase_master_model->select('party_id')->where('is_deleted', 0)->where('user_id', $this->user_id)->where('bill_no', "{$bill_no}")->findAll();
                $count = count($countResult);

                $message = '';
                if($postData['mode']=="add" && $postData['item_name']!="" && $postData['unit']!="" && $postData['quantity']!="" && $postData['rate']!=""){
                    if($count>=7) {
                        $message = 'Maximum limit is of 7 items per invoice... ';
                    } else {
                        if ($this->purchase_master_model->save($postData)) {
                            $ledgerData = array();
                            $ledgerData['panme'] = $pname;
                            $ledgerData['item'] = $postData['item_name'];
                            $ledgerData['dat'] = $bill_date;
                            $ledgerData['item'] = $postData['add_type'];
                            $ledgerData['output'] = '';
                            $ledgerData['input'] = intval($postData['quantity']);
                            $ledgerData['ref'] = $postData['bill_no'];
                            $ledgerData['user_id'] = $this->user_id;
                            $ledgerData['done'] = '';

                            $this->item_ledger_model->save($ledgerData);
                        }
                    }
                }
                
                echo $returnData = $this->getItemsHtml($postData['bill_no'], $message);
            }
        }
    }

    public function cal_grand_total(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();

            $final_discount=intval($postData['final_discount']);
            $user_id=$this->user_id;
            $bill_no=$postData['bill_no'];
            $gd_total =$grand_total = 0;
            $str ="";

            $result = $this->purchase_master_model->where('is_deleted', 0)->where('user_id', $this->user_id)->where('bill_no', "{$bill_no}")->orderBy('party_id', 'asc')->findAll();
    
            foreach ($result as $key => $rows) { 
                $row = (object) $rows;
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
    }

    public function getItemsHtml($bill_no, $message){
        $str = $str1 = $str2 = '';
        $result = $this->purchase_master_model->where('user_id', $this->user_id)->where('is_deleted', 0)->where('bill_no', "{$bill_no}")->orderBy('party_id', 'asc')->findAll();

        $str2 = '<div class="form-row">
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
                    <tbody> ';

        foreach ($result as $key => $rows) { $row = (object) $rows;
            $str = '<tr><td >' . $row->item_name . '</td>';
            $str .= '<td style="text-align:right;">' . $row->quantity . '</td>';
            $str .= '<td>&nbsp;&nbsp;' . $row->unit . '</td>';
            $str .= '<td style="text-align:right;">' . $row->rate . '</td>';
            $str .= '<td style="text-align:right;">' . $row->amount . '</td>';
            $str .= '<td style="text-align:right;">' . $row->discount . '</td>';
            $str .= '<td>&nbsp;' . $row->dis_type . '</td>';
            $str .= '<td style="text-align:right;">' . $row->total_amount . '</td>';
            $str .= '<td style="text-align:right;">' . $row->vat . '</td>';
            $str .= '<td style="text-align:right;">' . $row->vatt . '</td>';
            $str .= '<td style="text-align:right;">' . $row->final_amount . '</td>';
            $str .= '<td><input class=delbtn type="button" name="del" id="del" onClick="javascript: delete_item(';
            $str .= $row->party_id;
            $str .= ');" value="Delete" /></td></tr>';
            $str1 .= $str;
        }
        
        return $data = $str2 . $str1 . '<tr><td colspan="12" align="center" style="color:red;">'.$message.'</td></tr><tbody></table>';
    }

    public function delete_item(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();

            $mode = $postData['mode'];
            $party_id = $postData['item_id'];
            $data['party_id']= $party_id;
            $data['is_deleted']= 1;

            $this->purchase_master_model->save($data);
            echo "del";
        }
    }

    public function check_date(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();

            $mode = $postData['mode'];
            $bill_date = $postData['bill_date'];

            if($mode == 'Purchase') {
                $last_bill_details = $this->bill_purchase->getMaxBillDetails($this->user_id);

                if ($last_bill_details->bill_date) {
                    $time = Time::parse($last_bill_details->bill_date, 'Asia/Calcutta');
                    $last_bill_details->bill_date = $time->toLocalizedString('M/d/Y'); 
                } 
                if(strtotime($last_bill_details->bill_date) > strtotime($bill_date)){
                    $str="###"."no";
                  }
                  else
                  {
                    $str="###"."yes";
                  }
                  
                 echo $str;
            }
        }
    }

    public function check_party_exist(){
        $q = $this->uri->getSegment(3);
        $resultData = $this->customer_details->getPartyName($q, $this->user_id);
        echo json_encode($resultData); 
    }

    public function get_items(){
        $q = $this->uri->getSegment(3);
        $resultData = $this->item_ledger_model->getItems($q, $this->user_id);
        echo json_encode($resultData); 
    }

    public function get_units(){
        $q = $this->uri->getSegment(3);
        $resultData = $this->item_ledger_model->getItems($q, $this->user_id);
        echo json_encode($resultData); 
    }

    public function get_customer_details(){
        if ($this->request->getMethod() == 'post') {
            $postData = $this->request->getVar();
            $keyword = $postData['keyword'];

            $result = $this->customer_details->where('party_name', $keyword)->orderBy('id', 'desc')->findAll();
            echo json_encode($result);
        }
    }
}

