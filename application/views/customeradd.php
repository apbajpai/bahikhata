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
                        <h1 class="title">Add a Customer </h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open_multipart('CustomerAdd/do_upload');?>
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
                        <div class="content-body">
                            <div class="row">
                               
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-1" name="name" required autofocus>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Date of Birth</label>
                                        <span class="desc">e.g. "04/03/2015"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control datepicker" data-format="mm/dd/yyyy" value="" name="dob">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Gender</label>
                                        <span class="desc"></span>
                                        <select class="form-control" name="gender">
                                            <option></option>
                                            <option >Male</option>
                                            <option >Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Profile Image</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="field-5" name="image_path">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Brief</label>
                                        <span class="desc">e.g. "Enter any size of text description here"</span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="field-6" name="brief_desc"></textarea>
                                        </div>
                                    </div>


                                    </div>


                            </div>
                        </section></div>


                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Customer Contact Info</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    
                                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">



                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Email</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-3" name="email" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-2">Phone</label>
                                        <span class="desc">e.g. "(534) 253-5353"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-2" data-mask="phone"  placeholder="(999) 999-9999" name="phone">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-2">Mobile</label>
                                        <span class="desc">e.g. "(534) 253-5353"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-2" data-mask="phone"  placeholder="(999) 999-9999" name="mobile" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Address</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="field-6" name="partyadd"></textarea>
                                        </div>
                                    </div>

                         </div>


                            </div>
                        </section></div>


                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Customer Other Info</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">


                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Customer Aadhar</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-31" name="sup_no">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Customer TIN / GST </label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-41" name="sup_tin">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Customer Pan</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-51" name="sup_pan">
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