<!DOCTYPE html>
<html class=" ">
<head>
<!-- <base href="<?=base_url();?>" target="_blank"> -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />
<title><?php  ucfirst($this->router->class); ?> Welcome User</title>

<link rel="shortcut icon" href="<?= base_url('public/assets/'); ?>/assets/images/fab.png" type="image/x-icon" /> <!-- Favicon -->
	
<link rel="apple-touch-icon-precomposed" href="<?= base_url('public/assets/'); ?>/assets/images/apple-touch-icon-57-precomposed.png"> <!-- For iPhone -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('public/assets/'); ?>/assets/images/apple-touch-icon-114-precomposed.png"> <!-- For iPhone 4 Retina display -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('public/assets/'); ?>/assets/images/apple-touch-icon-72-precomposed.png"> <!-- For iPad -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('public/assets/'); ?>/assets/images/apple-touch-icon-144-precomposed.png"> <!-- For iPad Retina display -->

<!-- start css  -->
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/pace/pace-theme-flash.css">

<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/fonts/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/css/animate.min.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/icheck/skins/square/orange.css">

<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/css/style.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/css/responsive.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/css/notify.css">

<?php 
if($page_name == 'Dashboard') {
    ?>
    <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
    <link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/morris-chart/css/morris.css">
    <!-- CORE CSS TEMPLATE - END -->
    <?php
}
?>
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/datepicker/css/datepicker.css">
<link rel="stylesheet" href="<?= base_url('public/assets/'); ?>/assets/plugins/typeahead/css/typeahead.css">

<!-- end css  -->

</head>
<body id="top">
 <div class="overlay"></div>
