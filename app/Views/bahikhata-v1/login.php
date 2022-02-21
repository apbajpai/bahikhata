<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Login to access!</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<link rel="shortcut icon" href="<?=base_url('public/assets/');?>/assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
		<link rel="apple-touch-icon-precomposed" href="<?=base_url('public/assets/');?>/assets/images/apple-touch-icon-57-precomposed.png">  <!-- For iPhone -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url('public/assets/');?>/assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url('public/assets/');?>/assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url('public/assets/');?>/assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->

		<!-- start css  -->
		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/plugins/pace/pace-theme-flash.css">

		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/plugins/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/fonts/font-awesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/css/animate.min.css">
		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.css">
		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/plugins/icheck/skins/square/orange.css">

		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/css/style.css">
		<link rel="stylesheet" href="<?=base_url('public/assets/');?>/assets/css/responsive.css">

		<!-- end css  -->

	</head>
	<?php $validation = \Config\Services::validation(); ?>
	<body class=" login_page">
		<div class="login-wrapper">
			<div id="login" class="login loginpage offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-offset-0 col-12">
				<h1><a href="#" title="Login Page" tabindex="-1"></a></h1>
				<?php if(session()->getFlashdata('error')):?>
					<span style="color:red"><?= session()->getFlashdata('error') ?></span>
				<?php endif;?>
				<?php if(session()->getFlashdata('message')):?>
					<span style="color:green"><?= session()->getFlashdata('message') ?></span>
				<?php endif;?>
				<?php $errors = $validation->getErrors(); 
				if(!empty($errors)) { ?>
					<?php $i=1; foreach($errors as $error){ 
						echo '<span style="color:red">'.$i.') '.$error.'</br></span>';
					$i++; } ?>
				<?php } ?>
				<form name="loginform" id="loginform" action="<?=base_url('login');?>" method="post">
					<p>
						<label for="user_login">Username<br />
							<input type="number" name="user_mobile"  id="user_mobile" class="input" 
							placeholder="Enter Mobile No. as Username" size="20" required
							value="<?php if(isset($_COOKIE["user_name"])) { echo $_COOKIE["user_name"]; } ?>" /></label>
					</p>
					<p>
						<label for="user_pass">Password<br />
							<input type="password" name="user_pass" id="user_pass" class="input"
							 placeholder="Enter Password" size="20" 
							value="<?php if(isset($_COOKIE["pwd"])) { echo $_COOKIE["pwd"]; } ?>" required /></label>
					</p>
					<p>
						<label for="user_type" required >User Type<br />
							<select name="user_type" class="input" >
							<option value="">Select User Type</option>
							<option value="admin" selected>Admin</option>
							<option value="emp">Employee</option>
							</select>
						</label>
					</p>
					<p class="">
						<label class="icheck-label form-label" for="rememberme">
							<?php 
							$checked = '';
							if($_COOKIE['rember_me'] == 1) {
								$checked = 'checked= "true"';
							}
							?>
						<input type="checkbox" name="remember" id="remember" value="1" <?= $checked; ?>> Remember Me
						</label>
					</p>

					<p class="submit">
						<input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
					</p>
				</form>

				<p id="nav">
					<!--<a class="float-left" href="#" title="Password Lost and Found">Forgot password?</a>-->
					<a class="float-right" href="<?= base_url('signup') ?>" title="Sign Up">Sign Up</a>
				</p>


			</div>
		</div>
	</body>
	<footer>
		  <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


          <!-- CORE JS FRAMEWORK - START --> 
          <script src="<?=base_url('public/assets/');?>/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
          <script src="<?=base_url('public/assets/');?>/assets/js/popper.min.js" type="text/javascript"></script> 
          <!-- <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>  -->
          <script src="<?=base_url('public/assets/');?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
          <script src="<?=base_url('public/assets/');?>/assets/plugins/pace/pace.min.js" type="text/javascript"></script>  

          <script src="<?=base_url('public/assets/');?>/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
          <script src="<?=base_url('public/assets/');?>/assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
          <!-- CORE JS FRAMEWORK - END --> 


          <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
          <script src="<?=base_url('public/assets/');?>/assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


          <!-- CORE TEMPLATE JS - START --> 
          <script src="<?=base_url('public/assets/');?>/assets/js/scripts.js" type="text/javascript"></script> 
          <!-- END CORE TEMPLATE JS - END --> 

          <!-- Sidebar Graph - START --> 
          <script src="<?=base_url('public/assets/');?>/assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
          <script src="<?=base_url('public/assets/');?>/assets/js/chart-sparkline.js" type="text/javascript"></script>
          <!-- Sidebar Graph - END --> 
	</footer>			
</html>