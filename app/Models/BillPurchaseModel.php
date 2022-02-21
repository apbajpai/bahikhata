<?php namespace App\Models;

use CodeIgniter\Model;

class BillPurchaseModel extends Model{
    
    protected $table = 'tbl_bill_no_purchase';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bill_no','partyname', 'finaltotal','blance_type', 'under_account', 
    'type', 'bill_date', 'user_id'];
    protected $useTimestamps = false;


    public function getMaxBillDetails($user_id){
        $db      = \Config\Database::connect();

        $builder = $db->table($this->table);
        $builder->where('user_id',$user_id);
        $builder->select('max(bill_no) as bill_no, max(bill_date) as bill_date');
        $queryRes = $builder->get()->getRow();

        return $queryRes;
    }
    
}