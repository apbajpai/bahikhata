<?php include "includes/header.php";?>
 <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <?=link_tag('assets/assets/plugins/morris-chart/css/morris.css');?>
        <?=link_tag('assets/assets/css/style.css');?>
        <?=link_tag('assets/assets/css/responsive.css');?>
        
        <!-- CORE CSS TEMPLATE - END -->
            </head>
    <!-- END HEAD -->
<body class=" ">
<?php include "includes/nav.php";  ?> 


      <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

          <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                <div class="page-title">

                    <div class="float-left">
                        <h1 class="title">Add User</h1>
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                  <?php echo form_open_multipart('Settings/add_subuser','name="add_subuser"');?>

                 <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">Add Employee</h2>
                            <div class="actions panel_actions float-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <!-- <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i> -->
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                               
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">


                                  <div class="alert alert-success" 
                                  <? if($this->session->userdata('sess_mess')){ echo "style='display:block;'";}else{echo "style='display:none;'";}?>>
                                    <strong>Success!</strong> <?=$this->session->userdata('sess_mess');$this->session->unset_userdata('sess_mess');?>
                                  </div>

                                 <!--  <div class="alert alert-info">
                                    <strong>Info!</strong> Indicates a neutral informative change or action.
                                  </div> -->
                                     
                                    <div class="form-group">
                                        <label class="form-label" for="first_name">Full Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" name="fname" id="first_name" class="form-control" value="" placeholder="Enter Fisrt Name" required />
                                        </div>
                                        <div class="controls">
                                            <input type="text" name="lname" id="last_name" class="form-control" value="" placeholder="Enter Last Name" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="user_email">Email</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="email" name="user_email" id="user_email" class="form-control" value="" placeholder="Enter User email" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="user_type">User Type</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" name="user_type" id="user_type" class="form-control" value="emp" readonly/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="user_name">Username <small>(donot use any special characters or space)</small></label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" name="user_name" id="user_name" class="form-control" value="" placeholder="Enter User password"  />
                                          <input type="hidden" name="comp_id" id="comp_id" class="form-control" value="<?=$sess_id;?>"  readonly />
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="user_pass">Password</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" name="user_pass" id="user_pass" class="form-control" value=""  placeholder="Enter User password" required/></div>
                                    </div>
                                   

                         </div>
                             <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                      <button type="submit" id="wp-submit" class="btn btn-orange btn-block">Add Employee </button></div>
                                </div>

                            </div>
                        </section></div>

                </form>
            </section>
        </section>


           

<?php include "includes/footer.php";?>		
		


 <!-- CORE TEMPLATE JS - START --> 
        <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
        <script src="<?=base_url('assets/');?>assets/js/custom.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 

    </body>
</html>