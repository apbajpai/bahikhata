<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model{
    
    protected $table = 'tbl_user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = ['user_name','user_pass', 'fname','lname', 'user_email', 
    'user_mobile', 'user_type', 'status' , 'is_deleted','created_at', 'created_by', 'updated_at', 'updated_by'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    
    protected $beforeInsert = ['hash_password'];


    protected function hash_password(array $data)
    {
        if (isset($data['data']['user_pass'])) {
            $data['data']['user_pass'] = password_hash($data['data']['user_pass'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}