<?php namespace App\Models;

use CodeIgniter\Model;

class BalancesheetMasterPurchaseModel extends Model{
    
    protected $table = 'tbl_balancesheet_master_purchase';
    protected $primaryKey = 'party_id';
    protected $allowedFields = ['party_code', 'party_name', 'party_add', 'party_phone', 'party_mobile', 'party_email', 
    'final_amount', 'pay_amount', 'rest_amount', 'blance_type', 'user', 'entry_date', 'modify_date', 'bil_date', 'bill_no', 
    'note', 'discount_inrs', 'type', 'tpt_name', 'ch_bill_date', 'payment_word', 'user_id', 'final_discount', 'grand_total', 
    'discount_type', 'sup_dt', 'sup_no', 'sup_tin', 'sup_pan', 'pan_no'];
    protected $useTimestamps = false;
    
    public function saveData($postdata){
        $db      = \Config\Database::connect();
        $fields = $db->getFieldNames($this->table);
        $data = array();
        foreach($fields as $field){
            $data[$field] = $postdata[$field];
        }
    }
}