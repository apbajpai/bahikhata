<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class=" ">
<head>
    <link rel="icon" href="<?=base_url('assets/extras/fab.gif');?>">
    <title>Register Yourself Here | Bahikhata</title>
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
          <?php
          if ($this->session->userdata('sess_mess')) {
              echo $this->session->userdata('sess_mess');$this->session->unset_userdata('sess_mess');
          } else {
              echo "Please Fill All Details...........";
          }
          ?>
          <form name="loginform" id="loginform" action="<?=base_url('do_register');?>" method="post">
              <p>
                <label for="user_login">First Name<br />
                    <input type="text" name="fname" id="user_login" class="input" value="" size="20" required/></label>
                </p>
                <p>
                    <label for="user_login">Last Name<br />
                        <input type="text" name="lname" id="user_login" class="input" value="" size="20" required/></label>
                    </p>
                    <p>
                        <label for="user_login">Email<br />
                            <input type="email" name="user_email" id="user_login" class="input" value="" size="20" required/></label>
                        </p>
                        <p>
                            <label for="user_login">Username<br />
                                <input type="text" name="user_name" id="user_name" class="input typeahead" value="" size="20"  autocomplete="off" required/>
                                <span class="glyphicon glyphicon-log-in form-control-feedback" id="feedback"></span>
                            </label>
                        </p>
                        <p>
                            <label for="user_pass">Password<br />
                                <input type="password" name="password" id="user_pass" class="input" value="" size="20" required/></label>
                            </p>
                            <p>
                                <label for="user_pass">Confirm Password<br />
                                    <input type="password" name="confirmpassword" id="user_pass1" class="input" value="" size="20" required/></label>
                                </p>
                                <p class="forgetmenot">
                                    <label class="icheck-label form-label" for="rememberme"><input name="agree" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" > I agree to terms to conditions</label>
                                </p>
                                <p class="submit">
                                    <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign Up" required/>
                                </p>
                            </form>
                            <p id="nav">
                              <a class="float-left" href="#" title="Password Lost and Found">Forgot password?</a>
                              <a class="float-right" href="<?=base_url('login');?>" title="Sign In">Sign In</a>
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
                  <script src="<?=base_url('assets/');?>assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
                  <script src="<?=base_url('assets/');?>assets/js/typeahead.js" type="text/javascript"></script>
                  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
                  <!-- CORE TEMPLATE JS - START --> 
                  <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
                  <!-- END CORE TEMPLATE JS - END --> 
                  <!-- Sidebar Graph - START --> 
                  <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
                  <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
                  <!-- Sidebar Graph - END --> 
                  <script type="text/javascript">
                    var $dom = jQuery.noConflict();
                    $dom(document).ready(function () { 
                       $dom("#user_name").blur(function(){
                           $dom.ajax({
                            type: "POST",
                            url: "<?=base_url();?>get_username/",
                            data: { 
                                keyword: $dom("#user_name").val()
                            },
                            dataType: "json",
                            success: function (data) {              
                                $dom.each(data, function (key,value) {                     
                                   $dom("#user_name").val();
                                   $dom('#feedback').html(value);
                                   $dom('#user_name').val("");
                               });
                            }
                        });
                       });
                   });
               </script>
           </body>
           </html>