<?php namespace App\Models;

use CodeIgniter\Model;

class ItemLedgerModel extends Model{
    
    protected $table = 'tbl_item_ledger';
    protected $primaryKey = 'id';
    protected $allowedFields = [ 'pname', 'item', 'dat', 'type', 'input', 'output', 'bal', 'ref', 'user_id', 'done', 'is_deleted'];
    protected $useTimestamps = false;
    protected $createdField  = '';
    protected $updatedField  = '';
    

    public function getItems($q , $user_id){
        $db      = \Config\Database::connect();

        $builder = $db->table($this->table);
        $builder->where('user_id',$user_id);
        $builder->like('item', $q);
        $builder->select('DISTINCT(item) as item_names');
        $queryRes = $builder->get()->getResult();

        return $queryRes;
    }
    
}