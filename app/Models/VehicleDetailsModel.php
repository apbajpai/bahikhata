<?php namespace App\Models;

use CodeIgniter\Model;

class VehicleDetailsModel extends Model{
    
    protected $table = 'tbl_vehicledetails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['reg_no', 'veh_type', 'insuarance_date', 
    'purchase_date', 'model', 'model_year', 'owner_name', 'make', 'engine_no', 'user_id', 'brief_desc', 'chasis_no', 'owner_address', 'owner_mobile', 
    'owner_email', 'sup_no', 'image_path', 'final_amount', 'truevalue_man_mobile', 'first_amount', 'status', 'advance_amount', 'second_amount', 
    'commission_amount', 'seller_comp_name', 'seller_comp_address', 'truevalue_man_name', 'truevalue_man_email', 'total_amount', 
    'mode_of_payment', 'cheque_no', 'bill_no'];
    protected $useTimestamps = false;
    
}