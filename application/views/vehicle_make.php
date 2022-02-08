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

                         <div class="float-right ">
                            <ol class="breadcrumb">
                                
                                <li>
                                    <a href="<?=base_url();?>index.php/Vehicle_Make">Vehicle (Make)</a>
                                </li>
                                
                            </ol>
                        </div><div class="float-right d-none">
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
               
                                <?php echo form_open_multipart('vehicle_make/do_update_data');?>
                                 <?php                                          
                                         if (isset($val)) {
                                              $cust_get_val = $this->db->where('id', $val);
                                              $cust_get_val = $this->db->get("make");                                              
                                               $cust_res = $cust_get_val->result();
                                              $cust_val = $cust_res[0];
                                              //print_r($cust_val);die();
                                          } else {
                                              $cust_val = new stdClass();  
                                              //$cust_val = array('id' =>'', 'cust_id' => 0, 'title' => '', 'code' => '');
                                              $cust_val->id='';
                                              $cust_val->cust_id=0;
                                              $cust_val->title='';
                                              $cust_val->code='';
                                              //$cust_res = arrayToObject($cust_val);
                                              //print_r($cust_val);die();
                                          }
                                          
                                         
                                          ?>
                                <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                                    <section class="box ">
                                        <header class="panel_header">
                                            <h2 class="title float-left">Basic Info</h2>
                                            <div class="actions panel_actions float-right">
                                                <i class="box_toggle fa fa-chevron-down"></i>
                               
                            </div>
                        </header>
                        <div class="content-body">
                            <div class="row">

                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Make Code</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$cust_val->code;?>" class="form-control" id="field-1" name="code"  placeholder="Make Code" required autofocus>
                                        </div>
                                    </div>

                                        


                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Make Title</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <input type="text" value="<?=$cust_val->title;?>" class="form-control" id="field-2"  placeholder="Make Title" name="title" required>
                                            </div>
                                        </div>




                                    </div>
                                    <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                        <div class="text-left">
                                            <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                            <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="date_of_reg">
                                            <input type="hidden" class="form-control"  value="<?=$cust_val->id;?>" id="field-51" name="cust_id">
                                            <button type="submit" class="btn btn-primary" name="save"><? if ($cust_val->id>0) {echo "Update";} else {echo "Save";}
                                            ?></button>

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
    $(document).ready(function() { 
var modelID = $("#modelID").val();var selects="";
        $('select[name="make"]').on('load change', function() {
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