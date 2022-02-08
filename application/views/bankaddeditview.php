<?php include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<?=link_tag('assets/assets/plugins/datepicker/css/datepicker.css');?>       
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
</head>
<!-- END HEAD -->
<body class=" ">
    <?php include "includes/nav.php";?> 
    <!-- START CONTENT -->
    <section id="main-content" class=" ">
        <section class="wrapper main-wrapper" style=''>

            <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
                <div class="page-title">

                    <div class="float-left">
                        <h1 class="title">Add a Bank Name </h1> 
                    </div>
                     <div class="float-right ">
                            <ol class="breadcrumb">
                                
                                <li>
                                    <a href="<?=base_url();?>index.php/Settings/bankdetails">Bank View</a>
                                </li>
                                
                            </ol>
                        </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open_multipart('Settings/do_update');?>
                                <!-- <form action ="customeradd" method="post" > -->
                <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">Basic Info</h2>
                            <div class="actions panel_actions float-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <!-- <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i> -->
                            </div>
                        </header>
                        <? if(isset($banks)){
                            foreach ($banks as $key => $banks) {
                          ?>
                        <div class="content-body">
                            <div class="row">
                               
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Bank Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$banks->bank_name?>" class="form-control" id="field-1" name="bank_name" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Branch</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$banks->branch?>" class="form-control" id="field-3" name="branch" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-2">Account Number</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$banks->account_no?>" class="form-control" id="field-2"  name="account_no">
                                        </div>
                                    </div>

                                  

                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                        <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                        <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="date_of_reg">
                                        <input type="hidden" class="form-control"  value="<?=$this->uri->segment('3');?>" id="field-51" name="id">
                                        <input type="hidden" class="form-control"  value="<?=$banks->active_status;?>" id="field-51" name="active_status">
                                        <button type="submit" class="btn btn-primary" name="save">Update</button>
                                        
                                    </div>
                                </div>


                            
                        </div>


                         </div>
                         <?   }}else{?>
                          <div class="content-body">
                            <div class="row">
                               
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Bank Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-1" name="bank_name" required autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Branch</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-3" name="branch" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-2">Account Number</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-2"  name="account_no">
                                        </div>
                                    </div>

                                  

                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                        <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                        <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="date_of_reg">
                                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                                        
                                    </div>
                                </div>


                            
                        </div>


                         </div>
                         <? }?>
                     </section>
                    </div>
                </form>
            </section>
        </section>


<?php include "includes/footer.php";?>		


<script src="<?=base_url('assets/');?>assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
<script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
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