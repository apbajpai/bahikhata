<?php 
class Settingsmodel extends CI_Model {
	
	public function __construct(){

		 parent::__construct();
         $this->table = 'tbl_user'; 
	}
 
public function do_upload($tableName, $posts_val)
        {
           $id = "";
            @extract($posts_val);          
            
            $fieldsData = $this->db->field_data($tableName);
            $datacc = array(); 
            foreach ($fieldsData as $key => $field)
            {
                if ($key !='id') {
                    $datacc[ $field->name ] = $this->input->post($field->name);
                }
            }
            if(!isset($id) || $id=='' || empty($id)){
                $datacc['active_status'] = 'Inctive';
                $this->db->insert($tableName, $datacc);
            }else{
                $this->db->update($tableName, $datacc,' id ='.$id);
            }
                  
           return TRUE;
        }
public function do_updates($tableName, $posts_val)
        {

            @extract($posts_val);
            //print_r($posts_val); die();
            $password = sha1($new_password); 
            $old_pass = sha1($old_password); 
            $update_data= array('user_pass' => $password);
            $this->db->where(array('user_id' => $user_id,'user_pass'=> $old_pass));
            // $this->db->update($tableName,$update_data);            
            return $this->db->update($tableName,$update_data);
        }

public function do_register($tableName,$tableName1)
        {

            @extract($_POST);
            if (isset($agree)) {
                if ($password === $confirmpassword) {
                   $new_password = sha1($password);

                    $update_data= array('user_pass' => $new_password, 'user_name' => $user_name, 'fname' => $fname, 'lname' => $lname, 'user_email' => $user_email, 'user_type' => 'Admin');
                    $this->db->insert($tableName,$update_data);
                    $last_inserted_user_id = $this->db->insert_id();

                    $update_data1 = array( 'user' => $user_name, 'user_id' => $last_inserted_user_id,  'email' => $user_email, 'logo' => 'default-logo.png', 'auth_sign' => 'default-sign.JPG', 'comany_name' => 'Company Name', 'location' => 'Location Completed Address');                    

                    $update_data1 = $this->db->insert($tableName1,$update_data1);

                    $update_footer_text = $this->db->insert('tbl_footer_text',array('user_id'=> $last_inserted_user_id));

                    $this->session->set_userdata(['sess_mess' => "Registered successfully.   !!!!!!"]); 
                    redirect(base_url());  
                } else {
                    $this->session->set_userdata(['sess_mess' => "ERORRRRRR !!!!! Password Confirm Password Mismatched.     !!!!!!"]); 
                }
            } else {
                   $this->session->set_userdata(['sess_mess' => "ERORRRRRR !!!!! Please Select Agree Option.     !!!!!!"]);
                   redirect('Settings/do_register/');  
            }
            

            
            
        
        }
public function footer_text($tableName)
        {

            @extract($_POST);

            $update_data= array('sales' => $sales_footer,'sales_return' => $sales_return_footer,'purchase' => $purchase_footer,'purchase_return' => $purchase_return_footer,'reciept' => $receipt_footer,'payment' => $payment_footer,'contra' => $contra_footer,'user_id' => $user_id);

            $this->db->where(array('user_id' => $user_id));$num = $this->db->count_all_results($tableName);
                if ($num>0) {
                    $this->db->where(array('user_id' => $user_id));
                    $this->db->update($tableName,$update_data);
                } else {                                                                        
                    $this->db->insert($tableName,$update_data);
                      
                }
        }

public function get_username($q)
{
    $this->db->select('user_name');
    $this->db->like('user_name', $q);
    $query = $this->db->get('tbl_user');
    if($query->num_rows() > 0){
       $row_set['error'] = "<span class='alert alert-danger' id='feedback'>user name aready exists......</span>"; 
      echo json_encode($row_set); 
    }
}

public function accounthead_add($tableName, $posts_val)
    {

        $id = "";
            @extract($posts_val);          
            
            $fieldsData = $this->db->field_data($tableName);
            $datacc = array(); 
            foreach ($fieldsData as $key => $field)
            {
                if ($key !='id') {
                    $datacc[ $field->name ] = $this->input->post($field->name);
                }
            }
            if(!isset($id) || $id=='' || empty($id)){
                $datacc['active_status'] = 'Inctive';
                $this->db->insert($tableName, $datacc);
            }else{
                $this->db->update($tableName, $datacc,' id ='.$id);
            }
                  
           return TRUE;
    }
public function gethead_status($id, $tableName = 'tbl_account_of') { 
     $cur_status =$this->db->get_where($tableName, array( 'id'=> $id,'user_id'=>$this->session->userdata('user_id')))->row()->active_status;
      if ($cur_status=='Inactive') {
          $data1=array('active_status'=>'Active' );
      } else {
          $data1=array('active_status'=>'Inactive' );
      }
    $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'id'=> $id));
    $row_set = $this->db->update($tableName, $data1);
    echo json_encode($row_set); 
}  
/* 
     * Insert user data into the database 
     * @param $data data to be inserted 
     */ 
    public function do_insert($data = array(), $tableName ='tbl_user') { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
            // print_r($data); echo $tableName; die();
            // Insert member data 
            if(array_key_exists("adduser-submit", $data)){ 
                unset($data['adduser-submit']);
            }
            if(array_key_exists("user_pass", $data)){ 
                $data['pass_help'] = 'sha1-'.$data['user_pass']; 
                $data['user_pass'] = sha1($data['user_pass']); 
            }
                //print_r($data); echo $tableName; die();
                $insert = $this->db->insert($tableName, $data); 
            
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 
    /* 
     * Insert user data into the database 
     * @param $data data to be inserted 
     */ 
    public function do_update($data = array(), $tableName ='tbl_user', $id) { 
        if(!empty($data)){ 
            // Add created and modified date if not included 
            if(!array_key_exists("created", $data)){ 
                $data['created'] = date("Y-m-d H:i:s"); 
            } 
            if(!array_key_exists("modified", $data)){ 
                $data['modified'] = date("Y-m-d H:i:s"); 
            } 
            // print_r($data); echo $tableName; die();
            // Insert member data 
            if(array_key_exists("adduser-submit", $data)){ 
                unset($data['adduser-submit']);
            }
            if(array_key_exists("user_pass", $data)){ 
                $data['pass_help'] = 'sha1-'.$data['user_pass']; 
                $data['user_pass'] = sha1($data['user_pass']); 
            }
                //print_r($data); echo $tableName; die();
                $this->db->where(array('user_id' => $this->session->userdata('user_id'), 'id'=> $id));
                $insert = $this->db->update($tableName, $data); 
            
             
            // Return the status 
            return $insert?$this->db->insert_id():false; 
        } 
        return false; 
    } 
    /* 
     * Get All row from the $tableName 
     */
   public function do_getAllRows($tableName=NULL, $condition = array(), $returnType = 'all'){
        $tableName = ($tableName!==NULL)? $tableName : $this->table;
        if(count($condition)>0){
            $response = $this->db->get_where($tableName, $condition);//->result_array(); 
        }else{
            $response = $this->db->get($tableName);//->result();
        } 
        if ($returnType=='all') {
            $response = $response->result();
        }else{
             $response = $response->row();
        }
        return (empty($response))?array():$response;
    }
}
?>