<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>-------------- Login ------------</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="<?=base_url('assets/');?>images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/util.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/main.css">
<!--===============================================================================================-->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?=base_url('assets/');?>images/img-01.jpg');">
      <div class="wrap-login100 p-t-190 p-b-30" id="login">
        <!-- <form class="login100-form validate-form" method="post"> -->
          <div class="login100-form-avatar">
            <img src="images/avatar-01.jpg" alt="AVATAR">
          </div>
          <span class="login100-form-title p-t-20 p-b-45">
            John Doe
          </span>
          <div class="alert alert-danger text-center" v-if="errorMessage">
            <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
            <span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
          </div>
     
          <div class="alert alert-success text-center" v-if="successMessage">
            <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
            <span class="glyphicon glyphicon-check"></span> {{ successMessage }}
          </div>
          <div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
            <input class="input100" type="text" v-model="logDetails.user_name" name="user_name" placeholder="Username">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
            <input class="input100" type="password" v-model="logDetails.password" name="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input m-b-10" data-validate = "User type is required">
             <select name="user_type" class="input100 select100" v-model="logDetails.user_type" id="mySelect2" placeholder="User Type">
              <option v-for="utype in user_types">{{ utype }}</option>
              <!-- <option value="Admin" selected="selected">Admin</option>
              <option value="emp">Employee</option>
              <option value="super">Administrator</option> -->
            </select>
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock"></i>
            </span>
          </div>
          <div class="container-login100-form-btn p-t-10">
            <input type="hidden" v-model="logDetails.action" name="action" value="fetchLogin">
            <input type="hidden" v-model="logDetails.tableName" name="tableName" value="tbl_users">
            <button class="login100-form-btn" @click="checkLogin();">
              Login
            </button>
          </div>
          
          <div class="text-center w-full p-t-25 p-b-230">
            <a href="#" class="txt1">
              Forgot Username / Password?
            </a>
          </div>
          <div class="text-center w-full">
            <a class="txt1" href="#">
              Create new account
              <i class="fa fa-long-arrow-right"></i>            
            </a>
          </div>
        <!-- </form> -->
      </div>
    </div>
  </div>
<!--===============================================================================================-->  
  <script src="<?=base_url('assets/');?>vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/');?>vendor/bootstrap/js/popper.js"></script>
  <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/');?>vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="<?=base_url('assets/');?>js/main.js"></script>
<script type="text/javascript">
  /*$(document).ready(function() {
    $('.select100').select2({
       placeholder: 'This is my placeholder',
       allowClear: true
    });
    $('#mySelect2').val(null).trigger('change');
});*/
</script>
</body>
</html>
<script>
var app = new Vue({
  el: '#login',
  data:{
    successMessage: "",
    errorMessage: "",
    logDetails: {user_name: '', password: '', user_type:'Admin'},
    user_types: ['Admin', 'emp', 'super']
  },
 
  methods:{
    keymonitor: function(event) {
          if(event.key == "Enter"){
            app.checkLogin();
          }
        },
 
    checkLogin: function(){
      var logForm = app.toFormData(app.logDetails);
      axios.post('<?=base_url('index.php/dashboard/');?>', logForm)
        .then(function(response){
          //console.log(logForm);
          console.log(response.data);
          if(response.data.error){
            app.errorMessage = response.data.msg;
          }
          else{
            app.successMessage = response.data.msg;
            app.logDetails = {user_name: '', password:'', user_type: []};
            if(response.data.user_type!='super')
              {
                setTimeout(function(){
                  window.location.href="<?=base_url('index.php');?>";
                },2000);
              }else{
                setTimeout(function(){
                  window.location.href="<?=base_url('index.php/admin');?>";
                },2000);
              }
              
          }
        });
    },
 
    toFormData: function(obj){
      var form_data = new FormData();
      for(var key in obj){
        form_data.append(key, obj[key]);
      }
      return form_data;
    },
 
    clearMessage: function(){
      app.errorMessage = '';
      app.successMessage = '';
    }
 
  }
});
</script>