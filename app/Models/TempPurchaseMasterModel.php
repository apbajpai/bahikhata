<?php namespace App\Models;

use CodeIgniter\Model;

class TempPurchaseMasterModel extends Model{
    
    protected $table = 'tbl_temp_purchase_master';
    protected $primaryKey = 'party_id';
    protected $allowedFields = ['item_name','unit' ,'quantity','rate', 'dis_type', 'discount', 'amount',
    'vat' , 'total_amount','final_amount' , 'user','entry_date','modify_date', 'bil_date',
    'bill_no' ,'weight','done' ,'vatt' , 'ch_bill_date','user_id' ,'final_discount' ,'grand_total', 'is_deleted' ];
    protected $useTimestamps = false;

}