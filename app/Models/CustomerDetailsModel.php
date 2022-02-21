<?php namespace App\Models;

use CodeIgniter\Model;

class CustomerDetailsModel extends Model{
    
    protected $table = 'tbl_customerdetails';
    protected $primaryKey = 'id';
    protected $allowedFields = ['party_name', 'gender', 'partyadd', 'phone', 'mobile', 'date_of_reg', 'dob', 'active_status', 'user_id', 'brief_desc', 'sup_tin', 'sup_no', 'sup_pan', 'image_path', 'email'];
    protected $useTimestamps = false;


    public function getPartyName($q , $user_id){
        $db      = \Config\Database::connect();

        $builder = $db->table($this->table);
        $builder->where('user_id',$user_id);
        $builder->like('party_name', $q);
        $builder->select('party_name');
        $queryRes = $builder->get()->getResult();

        return $queryRes;
    }
    
}