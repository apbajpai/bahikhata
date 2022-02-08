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
                        <h1 class="title">Edit vehicle</h1>                            </div>

                        <div class="float-right d-none">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="crm-vehicles.html">vehicles</a>
                                </li>
                                <li class="active">
                                    <strong>Edit vehicle</strong>
                                </li>
                            </ol>
                        </div>

                    </div>
                </div>
                <div class="clearfix"></div>
               
                                <?php echo form_open_multipart('VehicleEdit/do_update_data');?>
                                 <?php                                          
                                          $cust_get_val = $this->db->where('id', $val);
                                          $cust_get_val = $this->db->get("tbl_vehicledetails");
                                          
                                           $cust_res = $cust_get_val->result();
                                          $cust_val = $cust_res[0];
                                         
                                          ?>
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
                                        <label class="form-label" for="field-2">Bill No.<img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></label>
                                            <div class="controls"><? $current_date=date_create(BAD__TIME);?>
                                             <?=$cust_val->bill_no;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Date of entry </label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="<?=$this->db->get_where('tbl_bill_no_purchase',array('user_id' => $cust_val->user_id, 'bill_no' =>$cust_val->bill_no))->row()->bill_date;?>" id="field-51" name="curdate" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Vehicle Reg No.</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$cust_val->reg_no;?>" class="form-control" id="field-1" name="reg_no" required readonly>
                                        </div>
                                    </div>
                                                                          
                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Insuarance Date</label>
                                        <span class="desc">e.g. "04/03/2015"  *** Please donot change if insuarance expired.</span>
                                        <div class="controls"><? $date_of_insuarance=date_create(BAD__TIME);date_sub($date_of_insuarance,date_interval_create_from_date_string("400 days"));?>
                                            <input type="text" class="form-control datepicker" data-format="mm/dd/yyyy" value="<?=$cust_val->insuarance_date;?>" name="insuarance_date" max="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Registration Date</label>
                                        <span class="desc">e.g. "04/03/2015" Registration date of vehicle (Refer RC)</span>
                                        <div class="controls">
                                            <input type="text" class="form-control datepicker" data-format="mm/dd/yyyy" value="<?=$cust_val->date_of_reg;?>" name="date_of_reg">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Purchase Date</label>
                                        <span class="desc">e.g. "04/03/2015" Purchase date of vehicle </span>
                                        <div class="controls">
                                            <input type="text"  class="form-control datepicker" data-format="mm/dd/yyyy" value="<?=$cust_val->purchase_date;?>" name="purchase_date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Vehicle Type</label>
                                        <span class="desc"></span>
                                        <select class="form-control" name="veh_type">
                                            <option></option>
                                            <option <? if($cust_val->veh_type=='Old'){echo "selected";}?>>Old</option>
                                            <option <? if($cust_val->veh_type=='New'){echo "selected";}?>>New</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Vehicle Image</label>
                                         <span class="desc"></span>
                                                <img class="img-fluid" src="<?=base_url()."assets/uploads/".$cust_val->image_path;?>" alt="" style="max-width:120px;">                                               
                                        <div class="controls">
                                            <input type="file" class="form-control" id="field-5" name="image_path">
                                            <input type="hidden" class="form-control" id="field-5" name="hidden_image_path" value="<?=$cust_val->image_path;?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Brief about vehicle</label>
                                        <span class="desc">e.g. "Enter any size of text description here"</span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="field-6" name="brief_desc"><?=$cust_val->brief_desc;?></textarea>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </section></div>





                        <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                            <section class="box ">
                                <header class="panel_header">
                                    <h2 class="title float-left">vehicle Other Info</h2>
                                    <div class="actions panel_actions float-right">
                                        <i class="box_toggle fa fa-chevron-down"></i>

                                    </div>
                                </header>
                                <div class="content-body">
                                    <div class="row">
                                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">


                                            <div class="form-group">
                                                <label class="form-label" for="modelID">Make</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <!-- <input type="text" value="<?=$cust_val->model;?>" class="form-control" id="field-3" name="model" required> -->
                                                    <input type="hidden" class="modelID"  value="<?=$cust_val->model;?>" id="modelID">
                                                   <select name="make" class="form-control" >
                                                    <option value="">--- Select Make ---</option>

                                                        <?php

                                                            foreach ($makes as $key => $value) {
                                                                if ($value->id == $cust_val->make) {
                                                                    $selected="selected";
                                                                } else {
                                                                    $selected="";
                                                                }
                                                                

                                                                echo "<option value='".$value->id."' ".$selected.">".$value->title."</option>";

                                                            }

                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-31">Model</label>
                                                <span class="desc"></span>
                                                
                                                <div class="controls">
                                                     <select name="model" class="form-control"></select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-31">Engine No</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?=$cust_val->engine_no;?>" id="field-31" name="engine_no">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-41">Vehicle Chasis No </label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?=$cust_val->chasis_no;?>" id="field-41" name="chasis_no">
                                                </div>
                                            </div>
<!-- 
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">vehicle Pan</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control"  value="<?=$cust_val->insuarance_date;?>" id="field-51" name="sup_pan">
                                                </div>
                                            </div> -->

                                        </div>




                                    </div>


                                </div>
                            </section>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                            <section class="box ">
                                <header class="panel_header">
                                    <h2 class="title float-left">Owner Contact Info</h2>
                                    <div class="actions panel_actions float-right">
                                        <i class="box_toggle fa fa-chevron-down"></i>

                                    </div>
                                </header>
                                <div class="content-body">
                                    <div class="row">

                                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">

                                           <div class="form-group">
                                            <label class="form-label" for="field-1">Owner Name</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" value="<?=$cust_val->owner_name;?>" class="form-control" id="field-1"  placeholder="Owner Name" name="owner_name">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="form-label" for="field-6">Owner Address</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-6" name="owner_address"><?=$cust_val->owner_address;?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Owner Mobile</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" value="<?=$cust_val->owner_mobile;?>" class="form-control" id="field-2"  placeholder="Owner Name" name="owner_mobile">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Owner Email</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="email" value="<?=$cust_val->owner_email;?>" class="form-control" id="field-2"  placeholder="Owner Email" name="owner_email">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="form-label" for="field-1">Owner Pan / Aadhar</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="<?=$cust_val->sup_no;?>" id="field-51" name="sup_no">
                                        </div>
                                    </div>




                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                        <div class="text-left">
                                            <!-- <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="curdate"> -->
                                            <input type="hidden" class="form-control"  value="<?=$cust_val->id;?>" id="field-51" name="cust_id">
                                            <input type="hidden" class="form-control"  value="<?=(int)($last_bill_no->bill_no);?>" id="field-51" name="last_billno">
                                            <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                            <!-- <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="date_of_reg"> -->
                                            <button type="submit" class="btn btn-primary" name="save">Save</button>

                                        </div>
                                    </div>

                                </div></div>
                            </section></div>


                        </form>
                    

               

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


<script type="text/javascript">
    $(document).ready(function() { //alert("hello");
        var modelID = $("#modelID").val();var selects="";

        var makeID = $('select[name="make"]').val();
            
            if(makeID) { //alert(makeID);alert(modelID);
                $.ajax({
                    url: 'myformAjax/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="model"]').empty();
                        $.each(data, function(key, value) { 
                            if (value.id==modelID) {selects="selected";}else{selects="";}  
                            $('select[name="model"]').append('<option value="'+ value.id +'" '+ selects +'>'+ value.title +'</option>');
                        });
                    }
               });
            }else{
                $('select[name="model"]').empty();
            }

        $('select[name="make"]').on('change', function() {
            var makeID = $(this).val();
            
            if(makeID) { //alert(makeID);alert(modelID);
                $.ajax({
                    url: 'myformAjax/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="model"]').empty();
                        $.each(data, function(key, value) { 
                            if (value.id==modelID) {selects="selected";}else{selects="";}  
                            $('select[name="model"]').append('<option value="'+ value.id +'" '+ selects +'>'+ value.title +'</option>');
                        });
                    }
               });
            }else{
                $('select[name="model"]').empty();
            }
            
        });
    });
</script>
</body>
</html>