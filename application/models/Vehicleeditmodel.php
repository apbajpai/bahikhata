<?php 
class VehicleEditModel extends CI_Model {
	
	public function __construct(){

		
	}
	public function index(){
			//die();
		$makes = $this->db->get("make")->result();
        $this->load->view('vehicleedit', array('makes' => $makes )); 
	}
	
	public function do_update()
        {
              @extract($_POST); //print_r($_POST);die();
				$new_name = $hidden_image_path;
				$data = array('new_name' => $hidden_image_path);       
              if ($_FILES["image_path"]['name']) {
                	 
					
					$config['upload_path']          = './assets/uploads/';
	                $config['allowed_types']        = 'gif|jpg|png';
	                $config['max_size']             = 2000;
	                $config['max_width']            = 1724;
	                $config['max_height']           = 968;
	                //$config['max_filename']         = 5;
	                $config['encrypt_name']         = TRUE;	                
					// $new_name                       = time().$_FILES["image_path"]['name'];
	    //             $config['file_name']            = $new_name;

	                $this->load->library('upload', $config);

	                if (!$this->upload->do_upload('image_path'))
	                {
	                        $error = array('error' => $this->upload->display_errors());
	                        $this->load->view('vehicleedit', $error);
	                     
	                }
	                else
	                {		
	                        $data = array('upload_data' => $this->upload->data());                                             
	                        $new_name  = $data['upload_data']['file_name'];
	                }
	                
	               //print_r($data['upload_data']);die();

                } else {
                	$new_name = $hidden_image_path;
                }
                 
                $inser_data= array('image_path' => $new_name, 'veh_type' => $veh_type,'insuarance_date' => $insuarance_date, 'purchase_date' => $purchase_date, 'model' => $model, 'owner_name' => $owner_name, 'make' => $make, 'engine_no' => $engine_no, 'brief_desc' => $brief_desc, 'chasis_no' => $chasis_no, 'owner_address' => $owner_address, 'owner_mobile' => $owner_mobile, 'owner_email' => $owner_email, 'sup_no' => $sup_no, 'model_year' => $model_year  );
                // 'truevalue_man_mobile' => $truevalue_man_mobile,  'seller_comp_name' => $seller_comp_name, 'seller_comp_address' => $seller_comp_address, 'truevalue_man_name' => $truevalue_man_name , 'truevalue_man_email' => $truevalue_man_email
													
				//$this->db->set($inser_data);
				$this->db->where('id', $cust_id);
				$this->db->update('tbl_vehicledetails',$inser_data);

                //$this->load->view('vehicleview', $data);
        }
}
?>