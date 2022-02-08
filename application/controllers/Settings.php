<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
  public  function __construct()
  {		
    parent::__construct();
    $this->load->model('settingsmodel');		
  }
  public function index()
  {
    $this->load->view('includes/404');
  }
  public function bankdetails()
  {         
    $this->load->view('bankview');
  }
  public function footertext()
  {         
    $foot_text = $this->db->get_where("tbl_footer_text",array('user_id' => $this->session->userdata('user_id')))->row();
    $this->load->view('footer_text',array('foot_text' => $foot_text ));
  }
  public function edit_banks($ids)
  {         
    $banks = $this->db->get_where("tbl_bankdetails",array('id' => $ids))->result();
    $this->load->view('bankaddeditview',array('banks' => $banks ));
  }
  public function add_banks()
  {         
    $this->load->view('bankaddeditview');
  }
  public function do_update()
  {
    $bankd_data=$this->settingsmodel->do_upload('tbl_bankdetails',$this->input->post());
    redirect('Settings/bankdetails/');                
  }
  public function change_password()
  {         
    $this->load->view('change_password');
  }
  public function changepassword()
  {
    $update_status=$this->settingsmodel->do_updates('tbl_user',$this->input->post());
    $arrayName = array('updatestatus' => $update_status  );
    if ($update_status>0) {
      $this->session->set_userdata(['sess_mess' => "Password changed successfully.."]);
    } else {
      $this->session->set_userdata(['sess_mess' => "Error !!!!!!!!! Try after sometime.."]);
    }
    redirect('Settings/change_password/');    
//$this->load->view('change_password', $update_status);
  }
  public function not_found()
  {
    $this->load->view('includes/404');
  }
  public function not_500()
  {
    $this->load->view('includes/404');
  }
  public function not_403()
  {
    $this->load->view('includes/404');
  }
  public function not_400()
  {
    $this->load->view('includes/404');
  }
  public function not_401()
  {
    $this->load->view('includes/404');
  }
  public function loginhistory()
  {
    $this->load->view('loginhistoryview');
  }
  public function sign_up()
  {
    $this->load->view('signup');
  }
  public function do_register()
  {
//$this->load->model("settingsmodel");
    $bankd_data=$this->settingsmodel->do_register('tbl_user','company_details');
    $this->load->view('signup');
  }
  public function footer_text()
  {
//print_r($_POST);
    $bankd_data=$this->settingsmodel->footer_text('tbl_footer_text');
    redirect('Settings/footertext/');  
  }
  public  function get_username(){
    $this->load->model('settingsmodel');
    if (($this->input->post('keyword'))){
      $q = strtolower($this->input->post('keyword'));
      $this->settingsmodel->get_username($q);
    }
  }
  public function accounthead(){
    $this->load->view('accounthead_view');
  }
  public function accounthead_add($ids=0)
  {  
    if ($ids===0) {
      $this->load->view('accounthead_addedit');
    } else{
      $accounthead_details = $this->db->get_where("tbl_account_of",array('id' => $ids))->row();
      $this->load->view('accounthead_addedit',array('accounthead_details' => $accounthead_details ));
    }      
  }
  public function accounthead_update()
  {
    $bankd_data=$this->settingsmodel->accounthead_add('tbl_account_of',$this->input->post());
    redirect('Settings/accounthead/');                
  }
  public function gethead_status(){
//print_r($this->input->post('keyword'));
    $keyword=$this->input->post('keyword');
    $results=$this->settingsmodel->gethead_status($keyword); 
  }
  public function add_subuser()
  {
    if (count($this->input->post())>0 && $this->input->post('comp_id')) {
      //echo "<pre>"; print_r($this->input->post()); echo "</pre>";
      $bankd_data=$this->settingsmodel->do_insert($this->input->post(),'tbl_sub_user');
      redirect('settings/add_subuser');
    }
    
    $this->load->view('add_user');
  }
  public function list_subuser()
  {
    $data['subusers'] = $this->settingsmodel->do_getAllRows('tbl_sub_user');
    $this->load->view('list_user', $data);
  }
  /* Add/Edit/Delete Unit Type */
  public function unitType(){
    $data['unitTypes'] = $this->settingsmodel->do_getAllRows('tbl_unit_type', array('user_id'=>$this->session->userdata('user_id')));
   // print_r($data); die(); 
    $this->load->view('unitType_view', $data);
  }
  public function unitType_add($ids=0)
  {  
    if ($ids===0) {
      $this->load->view('unitType_add');
    } else{
      $accounthead_details = $this->db->get_where("tbl_unit_type",array('id' => $ids))->row();
      $this->load->view('unitType_add',array('unitType_details' => $accounthead_details ));
    } 
  }
  public function unitType_update()
  {
    $bankd_data=$this->settingsmodel->accounthead_add('tbl_unit_type',$this->input->post());
    redirect('Settings/unitType/');                
  }
  public function unitType_status(){
    //print_r($this->input->post('keyword'));
    $keyword=$this->input->post('keyword');
    $results=$this->settingsmodel->gethead_status($keyword, 'tbl_unit_type'); 
  }
   /* Add/Edit/Delete Products */
  public function products(){
    $data['productS'] = $this->settingsmodel->do_getAllRows('tbl_products', array('user_id'=>$this->session->userdata('user_id')));
    $this->load->view('products_view', $data);
  }
  public function product_add($ids=0)
  {  
    if ($ids===0) {
      $this->load->view('products_add');
    } else{
      $products_detail =$this->settingsmodel->do_getAllRows('tbl_products', array('id' => $ids),'single');
     // print_r($products_detail); die(); 
      // $this->db->get_where("tbl_products",array('id' => $ids))->row();
      $this->load->view('products_add',array('product_details' => $products_detail ));
    } 
  }
  public function product_update($ids=0)
  {  
    $ids = $this->input->post('id');
    if ($ids===0) {
      $productData=$this->settingsmodel->do_insert($this->input->post(), 'tbl_products');
    }else{
      $productData=$this->settingsmodel->do_update($this->input->post(), 'tbl_products', $ids);
    }
    
    redirect('Settings/products/');                
  }
}?>