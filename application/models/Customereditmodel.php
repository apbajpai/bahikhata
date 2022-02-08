<?php 
class CustomerEditModel extends CI_Model {
	
	public function __construct(){

		
	}
	
	public function do_update()
        {
              @extract($_POST); 
              if ($_FILES["image_path"]['name']) {
                	
					
					$config['upload_path']          = './assets/uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 20000;
	                $config['max_width']            = 1724;
	                $config['max_height']           = 968;
	                $config['encrypt_name']         = TRUE;	       
					// $new_name                       = time().$_FILES["image_path"]['name'];
	    //             $config['file_name']            = $new_name;

	                $this->load->library('upload', $config);

	                if ( ! $this->upload->do_upload('image_path'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->load->view('customeredit', $error);	                    
	                }
	                else
	                {		
	                        $datas = array('upload_data' => $this->upload->data());  
	                }
	                $new_name  = $datas['upload_data']['file_name'];
                } else {
                	$new_name = $hidden_image_path;
                }
                 
                $inser_data= array('image_path' => $new_name,'email' => $email,  'gender' => $gender, 'partyadd' => $partyadd, 'phone' => $phone, 'mobile' => $mobile, 'sup_tin' => $sup_tin, 'sup_pan' => $sup_pan, 'sup_no' => $sup_no, 'brief_desc' => $brief_desc,  'dob' => $dob );
													
				//$this->db->set($inser_data);
				$this->db->where('id', $cust_id);
				$data = $this->db->update('tbl_customerdetails',$inser_data);
                $this->load->view('customeradd', $data);
        }
}
?>