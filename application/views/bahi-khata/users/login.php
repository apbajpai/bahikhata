<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html class=" ">
    <head>
        <link rel="icon" href="<?=base_url('assets/extras/fab.gif');?>">

      <title>......Login to access!.............</title>

        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link rel="shortcut icon" href="<?=base_url('assets/');?>assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
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
        <?=link_tag('assets/assets/plugins/icheck/skins/square/orange.css');?>
        <?=link_tag('assets/assets/css/style.css');?>
        <?=link_tag('assets/assets/css/responsive.css');?>

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
      <body class=" login_page">


          <div class="login-wrapper">
              <div id="login" class="login loginpage offset-xl-4 col-xl-4 offset-lg-3 col-lg-6 offset-md-3 col-md-6 col-offset-0 col-12">
                  <h1><a href="#" title="Login Page" tabindex="-1"></a></h1>
                  <?
                 if ($this->session->userdata('sess_mess')) {
                                echo $this->session->userdata('sess_mess');$this->session->unset_userdata('sess_mess');
                              } else {
                    echo "Please sign in";
                  }
                 ?>

                  <form name="loginform" id="loginform" action="<?=base_url('index.php/dashboard/');?>" method="post">
                      <p>
                          <label for="user_login">Username<br />
                              <input type="text" name="user_name"  id="user_login" class="input" placeholder="demo" size="20" /></label>
                      </p>
                      <p>
                          <label for="user_pass">Password<br />
                              <input type="password" name="password" id="user_pass" class="input" placeholder="demo" size="20" /></label>
                      </p>
                      <p>
                          <label for="user_pass">User Type<br />
                              <select name="user_type" class="input" >
                                <option selected>Admin</option>
                                <option value="emp">Employee</option>
                              </select>
                            </label>
                      </p>
                      <p class="forgetmenot">
                          <label class="icheck-label form-label" for="rememberme">
                            <input name="remember" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me</label>
                      </p>



                      <p class="submit">
                          <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" />
                      </p>
                  </form>

                  <p id="nav">
                      <a class="float-left" href="#" title="Password Lost and Found">Forgot password?</a>
                      <a class="float-right" href="settings/sign_up/" title="Sign Up">Sign Up</a>
                  </p>


              </div>
          </div>


         <!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->


          <!-- CORE JS FRAMEWORK - START --> 
          <script src="<?=base_url('assets/');?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
          <script src="<?=base_url('assets/');?>assets/js/popper.min.js" type="text/javascript"></script> 
          <!-- <script src="assets/js/jquery.easing.min.js" type="text/javascript"></script>  -->
          <script src="<?=base_url('assets/');?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
          <script src="<?=base_url('assets/');?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>  

          <script src="<?=base_url('assets/');?>assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
          <script src="<?=base_url('assets/');?>assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
          <!-- CORE JS FRAMEWORK - END --> 


          <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
          <script src="<?=base_url('assets/');?>assets/plugins/icheck/icheck.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


          <!-- CORE TEMPLATE JS - START --> 
          <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
          <!-- END CORE TEMPLATE JS - END --> 

          <!-- Sidebar Graph - START --> 
          <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
          <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
          <!-- Sidebar Graph - END --> 

        <!-- General section box modal start -->
          <div class="modal" id="section-settings" tabindex="-1" role="dialog" aria-labelledby="ultraModal-Label" aria-hidden="true">
              <div class="modal-dialog animated bounceInDown">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Section Settings</h4>
                      </div>
                      <div class="modal-body">

                          Body goes here...

                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                          <button class="btn btn-success" type="button">Save changes</button>
                      </div>
                  </div>
              </div>
          </div>
          <!-- modal end -->
      </body>
</html>



