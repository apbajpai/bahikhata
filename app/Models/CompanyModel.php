<?php namespace App\Models;

use CodeIgniter\Model;

class CompanyModel extends Model{
    
    protected $table = 'company_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['company_name', 'location','user','specification', 'phone','tin_no', 'user_id', 
    'email', 'website', 'logo', 'auth_sign' ,'created_at', 'updated_at'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
}