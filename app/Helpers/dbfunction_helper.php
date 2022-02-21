<?php 
if(!function_exists('getFooters')){
    function getCompanyDetails($user_id){

        $db = \Config\Database::connect();

        $builder = $db->table('company_details');
        $builder->where(array('user_id'=> $user_id));
        $queryData = $builder->get()->getResult();

        if(!empty($queryData)) {
            return $queryData[0];
        } else {
            return  (object) array();
        }
    }
}


?>