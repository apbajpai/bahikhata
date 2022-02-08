<?php include "includes/header.php";?>
    </head>
    <!-- END HEAD -->
<body class=" ">
<?php include "includes/nav.php";$user_session_ids=$this->session->userdata; ?> 

          <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                        <div class="page-title">

                            <div class="float-left">
                                <h1 class="title">User Profile</h1>                            </div>

                            

                        </div>
                    </div>
                    <div class="clearfix"></div>

								
                    <div class="col-xl-12">
                        <section class="box nobox">
                            <div class="content-body">    
                            	 <?php echo form_open_multipart('userprofile/do_update');?>
                                 <div class="row">
                                    <div class="col-lg-3 col-md-4 col-12">
                                       
                                        <div class="uprofile-image">
                                                   <label class="form-label" for="field-1">LOGO <br/>(Company logo or user)<br/> Max Resolution 1724 X 768</label>
                                                    <img src="<?=base_url("assets/uploads/");?><?=($company_result->logo);?>" class="img-fluid">
                                                    <input type="file" class="form-control" id="field-1" name="logo" placeholder="logos">
                                                    <input type="hidden" class="form-control" id="field-5" name="hidden_logo" value="<?=$company_result->logo;?>">                                          
                                        </div>
                                        <div class="uprofile-image">
                                                   <label class="form-label" for="field-1">Sign <br/>(authorised scan copy)<br/> Max Resolution 1724 X 768</label>
                                                   <img src="<?=base_url("assets/uploads/");?><?=($company_result->auth_sign);?>" class="img-fluid">
                                                   <input type="file" class="form-control" id="field-5" name="auth_sign">
                                                    <input type="hidden" class="form-control" id="field-5" name="hidden_auth_sign" value="<?=$company_result->auth_sign;?>">
                                                    <input type="hidden" class="form-control" id="field-5" name="user_id" value="<?=$company_result->user_id;?>">
                                               
                                        </div>
                                          <div class="uprofile-buttons">
                                            <button class="btn btn-md btn-primary" type="submit">Update</button>
                                        </div>
                                    
                                        <div class="uprofile-name">
                                            <h3>
                                                <a href="#"><?=strtoupper($company_result->fname." ".$company_result->lname);?>&nbsp;&nbsp;(<?=$company_result->comany_name;?>)&nbsp;&nbsp;</a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title"><?=ucwords($company_result->specification);?>&nbsp;&nbsp;&nbsp; <?=ucwords($company_result->tin_no);?>
                                            </p>
                                        </div>
                                        <div class="uprofile-info">
                                            <ul class="list-unstyled">
                                                <li><i class='fa fa-home'></i><?=ucwords(nl2br($company_result->location));?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$company_result->phone;?></li>
                                                <li><b> <i class='fa fa-envelope'></i> Login Email:- </b>&nbsp;<?=ucwords($company_result->user_email);?>
                                                    <br/><b> <i class='fa fa-envelope'></i>Company Email:- </b>&nbsp; <?=ucwords($company_result->email);?></li>
                                                <li><i class='fa fa-suitcase'></i><?=ucwords($company_result->website);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
                                            </ul>
                                        </div>
                                      
                                        <div class=" uprofile-social">

                                            <!-- <a href="#" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a> -->

                                        </div> 

                                    </div>

                                     <div class="col-lg-9 col-md-8 col-12">

                                        <div class="uprofile-content">
                                             
                                             <div class="form-row"> 
                                                 <div class="col-md-6 mb-4">
                                                    <label class="sr-only" for="validationServer03">First Name</label>
                                                    <span class="desc">eg. First Middle Name </span>
                                                    <input type="text" id="validationServer03" name="fname" value="<?=($company_result->fname);?>" required class="form-control <? if(empty($company_result->fname)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. TheSteCook Enterprises"/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <label class="sr-only" for="validationServer04">Last Name</label>
                                                    <span class="desc">eg. Last Name </span>
                                                    <input type="text" id="validationServer04" name="lname" value="<?=($company_result->lname);?>" required class="form-control <? if(empty($company_result->lname)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. Website Solution(SEO,WEB DEVELOPMENT ETC.)"/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                 <div class="col-md-4 mb-4">
                                                    <label class="sr-only" for="validationServer03">Company Name</label>
                                                    <span class="desc">eg. TheSteCook Enterprises </span>
                                                    <input type="text" id="validationServer03" name="comany_name" value="<?=($company_result->comany_name);?>" required class="form-control <? if(empty($company_result->comany_name)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. TheSteCook Enterprises"/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>

                                                <div class="col-md-4 mb-4">
                                                    <label class="sr-only" for="validationServer04">Specification</label>
                                                    <span class="desc">eg. Website Solution(SEO,WEB DEVELOPMENT ETC.) </span>
                                                    <input type="text" id="validationServer04" name="specification" value="<?=($company_result->specification);?>" required class="form-control <? if(empty($company_result->specification)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. Website Solution(SEO,WEB DEVELOPMENT ETC.)"/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>

                                                <div class="col-md-4 mb-4">
                                                    <label class="sr-only" for="validationServer05">Comapny / Personal PAN/GST/TIN Number</label>
                                                    <span class="desc">eg. XXXXX1234X </span>
                                                    <input type="text" id="validationServer05" name="tin_no" value="<?=($company_result->tin_no);?>" required class="form-control <? if(empty($company_result->tin_no)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. Website Solution(SEO,WEB DEVELOPMENT ETC.)"/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>
                                                 <div class="col-md-4 mb-4">
                                                    <label class="sr-only sr-only-focusable" for="validationServer07">Comapny Email</label>
                                                    <span class="desc">eg. info@company.com </span>
                                                    <input type="text" id="validationServer07" name="user_email" value="<?=($company_result->user_email);?>" required class="form-control <? if(empty($company_result->user_email)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. info@company.com"/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div> 
                                                <div class="col-md-4 mb-4">
                                                    <label class="sr-only  sr-only-focusable" for="validationServer08">Comapny Contact Number</label>
                                                    <span class="desc">eg. 99XXXXXXX0 </span>
                                                    <input type="text" id="validationServer08" name="phone" value="<?=($company_result->phone);?>" required class="form-control <? if(empty($company_result->phone)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. 99XXXXXXX0" pattern="[6-9]{1}[0-9]{9}" title="10 digit Mobile number only."/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>
                                                <div class="col-md-4 mb-4">
                                                    <label class="sr-only" for="validationServer08">Comapny Website</label>
                                                    <span class="desc">eg. http://www.company.com </span>
                                                    <input type="text" id="validationServer08" name="website" value="<?=($company_result->website);?>" required class="form-control <? if(empty($company_result->website)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. http://www.company.com "/>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-12 mb-4">
                                                    <label class="sr-only" for="validationServer06">Comapny Address</label>
                                                    <span class="desc">XXXXXX XXXXXXX </span>
                                                    <textarea id="validationServer06" name="location" required class="form-control autogrow <? if(empty($company_result->location)){echo " is-invalid";}else {echo"is valid";}?>" placeholder="eg. Complete Address with postal code."><?=($company_result->location);?></textarea>
                                                    <div class="invalid-feedback"> Field can not be empty.... </div>
                                                    
                                                </div> 
                                            </div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                  </div> 
                                </div>
                                <?=form_close();?>
                            </div>
                        </section></div>



                </section>
            </section>
            <!-- END CONTENT -->
           

<?php include "includes/footer.php";?>		
		<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 



 <!-- CORE TEMPLATE JS - START --> 
        <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 




    </body>
</html>

