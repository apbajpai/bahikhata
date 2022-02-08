<?php 
class CustomerAddModel extends CI_Model {
	
	public function __construct(){

		//print_r($_POST);
		//die();
	}
	public function do_upload()
        {
                
                $new_name                       = time().$_FILES["image_path"]['name'];
		$config['file_name']            = $new_name;
		$config['upload_path']          = './assets/uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 20000;
                $config['max_width']            = 1724;
                $config['max_height']           = 968;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('image_path'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('customeradd', $error);
                    
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                       
                        
                } 
                @extract($_POST);
                $inser_data= array('user_id' => $user_id, 'email' => $email, 'image_path' => $new_name, 'party_name' => $name,'gender' => $gender, 'partyadd' => $partyadd, 'phone' => $phone, 'mobile' => $mobile, 'sup_tin' => $sup_tin, 'sup_pan' => $sup_pan, 'sup_no' => $sup_no, 'brief_desc' => $brief_desc, 'date_of_reg' => $date_of_reg, 'dob' => $dob );
                                                                                                
                $this->db->insert('tbl_customerdetails', $inser_data);
                $this->load->view('customeradd', $data);
        }

}
?>