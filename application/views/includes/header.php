<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$user_session_id=$this->session->userdata; 
$sess_id = $this->session->userdata('user_id');
$username = $this->session->userdata('username');
if(empty($sess_id)){    redirect(base_url('login'));}
?>
<?php 
if ($this->session->userdata('user_type')=='Admin') {
	$this->db->select('*');
	$this->db->from('tbl_user');
	$this->db->join('company_details', 'company_details.user_id = tbl_user.user_id');
	$this->db->where('tbl_user.user_id',$sess_id);
	$query = $this->db->get();
	$rows = $query->result();$company_result = $rows[0];
} else {
	$this->db->select('*');
	$this->db->from('tbl_sub_user');
	$this->db->join('company_details', 'company_details.id = tbl_sub_user.comp_id');
	$this->db->where('tbl_sub_user.comp_id',$sess_id);
	$query = $this->db->get();
	$rows = $query->result();
	//echo $this->db->last_query();
	//print_r($rows); die();
	$company_result = $rows[0];
	$this->session->set_userdata(['comp_user_id' => $this->db->get_where("company_details",array('ID' => $company_result->ID))->row()->user_id]);
	$sess_id = $this->session->userdata('comp_user_id');
	$username = $this->session->userdata('username');
}?>
<!DOCTYPE html>
<html class=" ">
<head>
<!-- <base href="<?=base_url();?>" target="_blank"> -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<title><?=ucfirst($this->router->class);?></title>
<?=link_tag('assets/assets/images/fab.png', 'shortcut icon', 'image/png');?> 
<!-- Favicon -->
<link rel="apple-touch-icon-precomposed" href="<?=base_url('assets/');?>assets/images/apple-touch-icon-57-precomposed.png">  <!-- For iPhone -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url('assets/');?>assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url('assets/');?>assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url('assets/');?>assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
<!-- CORE CSS FRAMEWORK - START -->
<?=link_tag('assets/assets/plugins/pace/pace-theme-flash.css');?>
<?=link_tag('assets/assets/plugins/bootstrap/css/bootstrap.min.css');?>
<?=link_tag('assets/assets/fonts/font-awesome/css/font-awesome.css');?>
<?=link_tag('assets/assets/css/animate.min.css');?>
<?=link_tag('assets/assets/plugins/perfect-scrollbar/perfect-scrollbar.css');?>
<!-- CORE CSS FRAMEWORK - END -->
<!-- CORE CSS TEMPLATE - START -->
<?=link_tag('assets/assets/css/style.css');?>
<?=link_tag('assets/assets/css/responsive.css');?>
<!-- CORE CSS TEMPLATE - END -->