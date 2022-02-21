<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login to access!</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

	<link rel="shortcut icon" href="<?= base_url('public/assets/'); ?>/assets/images/favicon.png" type="image/x-icon" /> <!-- Favicon -->
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

	<!-- end css  -->

</head>
<?php $validation = \Config\Services::validation(); ?>
<body class=" login_page">
	<div class="login-wrapper">
		<div id="login_new" style="margin-bottom: 40px !important;" 
		class="login loginpage offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-offset-0 col-12">
			<h1><a href="#" title="Login Page" tabindex="-1"></a></h1>
			<?php if(session()->getFlashdata('error')):?>
				<span style="color:red"><?= session()->getFlashdata('error') ?></span>
            <?php endif;?>
			<?php $errors = $validation->getErrors(); 
			 if(!empty($errors)) { ?>
				<?php $i=1; foreach($errors as $error){ 
					echo '<span style="color:red">'.$i.') '.$error.'</br></span>';
				$i++; } ?>
			<?php } ?>

			<form name="signup_form" id="signup_form" action="<?= base_url('signup'); ?>" method="post">
				<input type="hidden" name="error_count" id="error_count" valie="0" >
				<p>
					<label for="user_login">First Name<br />
						<input type="text" name="fname" autofocus="autofocus"  id="user_fname" class="input" 
						value="<?= (isset($postData['fname'])) ? $postData['fname'] : '' ?>" size="20" required /></label>
				</p>
				<p>
					<label for="user_login">Last Name<br />
						<input type="text" name="lname" id="user_lname" class="input"
						 value="<?= (isset($postData['lname'])) ? $postData['lname'] : '' ?>" size="20" required /></label>
				</p>
				<p>
					<label for="user_login">Email<br />
						<input type="email" name="user_email" id="user_email" class="input" 
						value="<?= (isset($postData['user_email'])) ? $postData['user_email'] : '' ?>" size="20" required /></label>
				</p>
				<p>
					<label for="user_login">Mobile(+91)<br />
					<input type="number" name="user_mobile" id="user_mobile" class="input" 
					value="<?= (isset($postData['user_mobile'])) ? $postData['user_mobile'] : '' ?>" size="20" required /></label>
				</p>
				<!--<p>
					<label for="user_login">Username<br />
						<input type="text" name="user_name" id="user_name" class="input typeahead" value="" size="20" autocomplete="off" required />
					</label>
				</p>-->
				<p>
					<label for="user_pass">Password<br />
						<input type="password" name="user_pass" id="user_pass" class="input" 
						value="<?= (isset($postData['user_pass'])) ? $postData['user_pass'] : '' ?>" size="20" required />
					</label>
				</p>
				<p>
					<label for="user_pass">Confirm Password<br />
						<input type="password" name="user_confirm_pass" id="user_confirm_pass" class="input" 
						value="<?= (isset($postData['user_confirm_pass'])) ? $postData['user_confirm_pass'] : '' ?>" size="20" required /></label>
				</p>
				<p class="forgetmenot">
					<label class="icheck-label form-label" for="terms">
						<input name="terms" type="checkbox" id="terms" value="terms" class="skin-square-orange"> 
						I agree to terms to conditions</label>
				</p>
				<p class="submit">
					<input type="submit" name="submit" id="submit" class="btn btn-orange btn-block" value="Sign Up" 
					onclick="return validate(this.form)"  required />
				</p>
				<input type="hidden" name="base_url" id="base_url" value="<?=base_url();?>">
			</form>
			<p id="nav">
				<!--<a class="float-left" href="#" title="Password Lost and Found">Forgot password?</a>-->
				<a class="float-right" href="<?= base_url('login'); ?>" title="Sign In">Sign In</a>
			</p>
		</div>
	</div>
	</form>
	</div>
	</div>
</body>
<footer>
	<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


	<!-- CORE JS FRAMEWORK - START -->
	<script src="<?= base_url('public/assets/'); ?>/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="<?= base_url('public/assets/'); ?>/js/notify.js" type="text/javascript"></script>
	<script src="<?= base_url('public/assets/'); ?>/js/notify.min.js" type="text/javascript"></script>
	<script src="<?= base_url('public/assets/'); ?>/assets/js/validation-script.js" type="text/javascript"></script>

</footer>

</html>