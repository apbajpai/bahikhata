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
                                <h1 class="title">Edit Customer</h1>                            </div>

                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-customers.html">Customers</a>
                                    </li>
                                    <li class="active">
                                        <strong>Edit Customer</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Basic Info</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <?php if(isset($error)){echo $error;}else {}?><?php echo form_open_multipart('customeredit/do_update');?>
                                    <!-- <form action ="customeradd" method="post" > -->
                                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                        <!-- <div class="col-6"> -->
                                         <?php //print_r($val);die(); 
                                         
                                          $cust_get_val = $this->db->where('id', $val);
                                          $cust_get_val = $this->db->get("tbl_customerdetails",10);
                                          
                                           $cust_res = $cust_get_val->result();
                                          $cust_val = $cust_res[0];
                                         
                                          ?>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" value="<?=$cust_val->party_name;?>" class="form-control" id="field-1" name="name" required disabled>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Date of Birth</label>
                                                <span class="desc">e.g. "04/03/2015"</span>
                                                <div class="controls">
                                                    <input type="text" value="<?=$cust_val->dob;?>" class="form-control datepicker" data-format="mm/dd/yyyy" value="" name="dob">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-5">Gender</label>
                                                <span class="desc"></span>
                                                <select class="form-control" name="gender">
                                                    <option></option>
                                                    <option <? if($cust_val->gender=='Male'){echo "selected";}?>>Male</option>
                                                    <option <? if($cust_val->gender=='Female'){echo "selected";}?>>Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Profile Image</label>
                                                <span class="desc"></span>
                                                <img class="img-fluid" src="<?=base_url()."assets/uploads/".$cust_val->image_path;?>" alt="" style="max-width:120px;">
                                                <div class="controls">
                                                    <input type="file" class="form-control" id="field-5" name="image_path">
                                                    <input type="hidden" class="form-control" id="field-5" name="hidden_image_path" value="<?=$cust_val->image_path;?>">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                    <textarea class="form-control autogrow" cols="5" id="field-6" name="brief_desc"><?=$cust_val->brief_desc;?></textarea>
                                                </div>
                                            </div>
                                      
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="email" value="<?=$cust_val->email;?>" class="form-control" id="field-3" name="email" required validate>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Phone</label>
                                                <span class="desc">e.g. "(+99) 99999-99999"</span>
                                                <div class="controls">
                                                    <input type="text" value="<?=$cust_val->phone;?>" class="form-control" id="field-2" data-mask="(+99) 99999-99999"  placeholder="(999) 999-9999" name="phone">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Mobile</label>
                                                <span class="desc">e.g. "(+99) 99999-99999"</span>
                                                <div class="controls">
                                                    <input type="text" value="<?=$cust_val->mobile;?>" class="form-control" id="field-2" data-mask="(+99) 99999-99999"  placeholder="(999) 999-9999" name="mobile" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Address</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <textarea class="form-control autogrow" cols="5" id="field-6" name="partyadd"><?=$cust_val->partyadd;?></textarea>
                                                </div>
                                            </div>
                                        
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Customer Aadhar</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?=$cust_val->sup_no;?>" id="field-31" name="sup_no">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Customer TIN / GST (SUPPLIER) </label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?=$cust_val->sup_tin;?>" id="field-41" name="sup_tin">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Customer Pan (SUPPLIER)</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?=$cust_val->sup_pan;?>" id="field-51" name="sup_pan">
                                                </div>
                                            </div>
                                            

                                        </div>
                                         <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                            <div class="text-left">
                                            	<input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                            	<input type="hidden" class="form-control"  value="<?=$cust_val->id;?>" id="field-51" name="cust_id">
                                            	<button type="submit" class="btn btn-primary" name="save">Save</button>
                                                <button type="button" class="btn">Cancel</button>
                                            </div>
                                        </div>
                                    

                                    </form>
                                </div>


                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->
       
<?php include "includes/footer.php";?>		
 

 <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="<?=base_url('assets/');?>assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> <script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script><script src="<?=base_url('assets/');?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script><!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

         <!-- CORE TEMPLATE JS - START --> 
        <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 



    </body>
</html>