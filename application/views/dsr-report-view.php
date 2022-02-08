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
                        <h1 class="title">Daily / monthly /Yearly Report</h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open_multipart('accounts/dsr_report/', 'name="form1"');?>
                                <!-- <form action ="customeradd" method="post" > -->
                <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">Search by name</h2>
                            <div class="actions panel_actions float-right">
                                <i class="box_toggle fa fa-chevron-down"></i>
                                <!-- <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                <i class="box_close fa fa-times"></i> -->
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">
                               
                               <div class="col-12">

                                   <div class="form-row">
                                    <!-- <div class="form-group">
                                        <label class="form-label" for="field-1">Type</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                           
                                            <select name="dsr_type" required class="form-control">

                                             <option value="d">Today</option>
                                             <option value="m">This Month</option>
                                             <option value="y" selected >This Year</option>
                                               
                                                </select>
                                            
                                           
                                        </div>
                                    </div> -->

                                    <div class="form-group  col-md-4">
                                        <label class="form-label" for="field-1">Report Of</label>
                                        <span class="desc"></span>
                                        <div class="controls">

                                            <select name="dsr_report" required class="form-control">

                                               <option value="receipt"  >Receipt</option>
                                               <option value="payment">Payment</option>
                                               <option value="purchase">Purchase</option>
                                               <option value="sales" selected>Sales</option>
                                               
                                           </select>

                                           
                                       </div>
                                   </div>

                                <div class="form-group col-md-4">
                                    <label class="form-label" for="field-2">Date (From)<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                    <span class="desc">mm/dd/yyyy</span>
                                    <div class="controls">
                                        <input type="text" value="<?=date("m/d/Y")?>" class="form-control datepicker" id="date_from" name="date_from" required/>
                                        
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="form-label" for="field-2">Date (To)<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                    <span class="desc">mm/dd/yyyy</span>
                                    <div class="controls">
                                        <input type="text" value="<?=date("m/d/Y")?>" class="form-control datepicker" id="date_to" name="date_to" required/>
                                        
                                    </div>
                                </div>                           



                            </div>
                        </div>


                                <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                        <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                        
                                        <button type="submit" class="btn btn-submit" name="save">View</button>
                                        
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