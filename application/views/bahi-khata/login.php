<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html class=" ">
<head>
  <link rel="icon" href="<?=base_url('assets/extras/fab.gif');?>">
  <title> Login to access | Bahikhata </title>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="Online ledger book | bahikhata" name="description" />
  <meta content="Amulya" name="author" />
  <?=link_tag('assets/assets/plugins/bootstrap/css/bootstrap.min.css');?>
  <?=link_tag('assets/assets/css/style.css');?>
  <?=link_tag('assets/assets/css/responsive.css');?>
</head>
<body class=" login_page">
  <div class="login-wrapper">
    <div id="login" class="login loginpage col-sm-8">
      <h1><a href="#" title="Login Page" tabindex="-1"></a></h1>
      <?php
      if ($this->session->userdata('sess_mess')) {
        echo $this->session->userdata('sess_mess');$this->session->unset_userdata('sess_mess');
      } else {
        echo "Please sign in";
      }
      ?>
      <form name="loginform" id="loginform" action="<?=base_url('dashboard/');?>" method="post">
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
                <input name="remember" type="checkbox" id="rememberme" value="forever" class="skin-square-orange" checked> Remember me
              </label>
            </p>
            <p class="submit">
              <button class="g-recaptcha btn btn-orange btn-block" data-sitekey="6Lf9UJMdAAAAAEYN9nX6niPFR6Ze8vDMm2yhhFYK" data-callback='onSubmit' data-action='submit' id="wp-submit" type="submit" name="wp-submit">Sign In</button>
              <!-- <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-orange btn-block" value="Sign In" /> -->
            </p>
          </form>
          <p id="nav">
            <a class="float-left" href="#" title="Password Lost and Found">Forgot password?</a>
            <a class="float-right" href="<?=base_url('sign_up/')?>" title="Sign Up">Sign Up</a>
          </p>
        </div>
      </div>
      <script src="<?=base_url('assets/');?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script> 
      <script src="<?=base_url('assets/');?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
       <script src="https://www.google.com/recaptcha/api.js"></script>
       <script>
         function onSubmit(token) {
           document.getElementById("loginform").submit();
         }
       </script>
    </body>
    </html>