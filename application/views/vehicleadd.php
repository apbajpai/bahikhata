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
                        <h1 class="title">Add a vehicle  <? //if ($results){echo $results['error'];}?></h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open_multipart('VehicleAdd/do_upload','name="form1"');?>
                                <!-- <form action ="vehicleadd" method="post" > -->
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
                                        <label class="form-label" for="field-2">No.<img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></label>
                                            <div class="controls"><? $current_date=date_create(BAD__TIME);?>
                                             <?=(int)($last_bill_no->bill_no+1);?>  Bill Date:- <?=date_format($current_date,"m/d/Y");?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Date of entry (Today)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="<?=date_format($current_date,"m/d/Y");?>" id="field-51" name="curdate" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Vehicle Reg No.</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-1" name="reg_no" required autofocus>
                                        </div>
                                    </div>
                                                                          
                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Insuarance Date</label>
                                        <span class="desc">e.g. "04/03/2015"  *** Please donot change if insuarance expired.</span>
                                        <div class="controls"><? $date_of_insuarance=date_create(BAD__TIME);date_sub($date_of_insuarance,date_interval_create_from_date_string("400 days"));?>
                                            <input type="text" class="form-control datepicker" data-format="mm/dd/yyyy" value="<?=date_format($date_of_insuarance,"m/d/Y");?>" name="insuarance_date" max="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Registration Date</label>
                                        <span class="desc">e.g. "04/03/2015" Registration date of vehicle (Refer RC)</span>
                                        <div class="controls">
                                            <input type="text" class="form-control datepicker" data-format="mm/dd/yyyy" value="<?=date_format($current_date,"m/d/Y");?>" name="date_of_reg">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Purchase Date</label>
                                        <span class="desc">e.g. "04/03/2015" Purchase date of vehicle </span>
                                        <div class="controls">
                                            <input type="text"  class="form-control datepicker" data-format="mm/dd/yyyy" value="<?=date_format($current_date,"m/d/Y");?>" name="purchase_date">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-5">Vehicle Type</label>
                                        <span class="desc"></span>
                                        <select class="form-control" name="veh_type">                                            
                                            <option selected>Old</option>
                                            <option >New</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Vehicle Image</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="file" class="form-control" id="field-5" name="image_path">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Brief about vehicle</label>
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
                                <h2 class="title float-left">vehicle Other Info</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                           <div class="form-group">
                                            <label class="form-label" for="field-1">Make</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                <!-- <input type="text" value="<?=$cust_val->model;?>" class="form-control" id="field-3" name="model" required> -->                                                
                                                <select name="make" class="form-control" >
                                                    <option value="">--- Select Make ---</option>
                                                    <?php  
                                                    foreach ($makes as $key => $value) {
                                                        echo "<option value='".$value->id."'>".$value->title."</option>";
                                                    }                                          ?>
                                                </select>
                                            </div>
                                        </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Model</label>
                                                <span class="desc"></span>
                                                
                                                <div class="controls">
                                                     <select name="model" class="form-control">
                                                    <option value="">--- Select Model ---</option></select>
                                                </div>
                                            </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Model Year</label>
                                        <span class="desc">e.g. 2017</span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-31" name="model_year">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Engine No</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-31" name="engine_no">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Vehicle Chasis No </label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-41" name="chasis_no">
                                        </div>
                                    </div>

                                    

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
                                            <input type="text" value="" class="form-control" id="field-1"  placeholder="Owner Name" name="owner_name">
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Owner Address</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="field-6" name="owner_address"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Owner Mobile</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="phone"  placeholder="(+91) 12345-67890" name="owner_mobile" data-country="IN">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="form-label" for="field-1">Owner Email</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="email" value="" class="form-control" id="field-2"  data-mask="email"  placeholder="Owner Email" name="owner_email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Owner Pan / Aadhar</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-51" name="sup_no">
                                        </div>
                                    </div>


                                   

                         </div>

                        </div>


                         </div>
                     </section>
                    </div>

                     <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Deal Info</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">

                                     <div class="form-group">
                                        <label class="form-label" for="field-1">Final Cost</label>
                                        <span class="desc">The exact final deal amount except commission(total payable minus commission)</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="final_amount"  placeholder="Final Cost" name="final_amount" onkeyup="search_func();">
                                        </div>
                                    </div>                                    

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Advance</label>
                                        <span class="desc">It is just the first payment which is made for booking or give as Advance.</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-1"  placeholder="Advance" name="advance_amount">
                                        </div>
                                    </div>
                                   
                                    <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-2 pt-0">Mode Of Payment</legend>
                                                    <div class="col-sm-10">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="mode_of_payment" id="gridRadios1" value="cash" checked>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Cash
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="mode_of_payment" id="gridRadios2" value="cheque">
                                                            <label class="form-check-label" for="gridRadios2">
                                                                Cheque
                                                            </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </fieldset>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Cheque no.(if check selected)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="0" class="form-control" id="field-2" data-mask=""  placeholder="(12 34 56)" name="cheque_no" >
                                        </div>
                                    </div>
                                    <!--  <div class="form-group">
                                        <label class="form-label" for="field-1">First Installment</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="0" class="form-control" id="field-2"  placeholder="First Installment" name="first_amount">
                                            
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="form-label" for="field-1">Second Installment</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="0" class="form-control" id="field-2"  placeholder="Second Installment" name="second_amount">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Commission to Seller</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="number" class="form-control"  value="0" id="commission_amount" name="commission_amount" placeholder="Commission to seller" onkeyup="search_func(), test_skill();">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Expances on this vehicle(if any)</label>
                                        <span class="desc">This is the amount other than the final amount</span>
                                        <div class="controls">
                                            <input type="number" class="form-control" min="0"  value="0" id="exp_amount" name="exp_amount" placeholder="Commission to seller" onkeyup="search_func(), test_skill();">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="form-label" for="field-1">GST</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="number" class="form-control" min="0"  value="0" id="gst_amt" name="gst_amt" placeholder="GST" onkeyup="search_func(), test_skill();">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Total Amount</label>
                                        <span class="desc">(Total Payable plus Expances plus Commission)</span>
                                        <div class="controls">
                                            <input type="number" class="form-control" min="0"  value="0" id="total_amount" name="total_amount" placeholder="Total Amount" readonly onkeyup="search_func(), test_skill();">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Amount In Word</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <div id="container" class="form-control" >Payment amount in words</div>
                                            <input type="hidden" name="payment_word" id="payment_word" value="" onkeypress="return tabE(this,event)"  class="form-control" > 
                                            <input type="hidden" name="amount" id="amount" value=""  class="form-control" > 
                                        </div>
                                    </div>

                                   

                         </div>

                        </div>


                         </div>
                     </section>
                    </div>

                     
                         <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Purchased From</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">

                                     <div class="form-group">
                                        <label class="form-label" for="field-1">Seller Company Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-1"  placeholder="Seller Company Name" name="seller_comp_name" required>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Seller Company Address</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="field-6" name="seller_comp_address" placeholder="Seller Company Address" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Truevalue Manager Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-2"  placeholder="Truevalue Manager Name" name="truevalue_man_name">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        <label class="form-label" for="field-1">Truevalue Manager Email</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="email" value="" class="form-control" id="field-2"  placeholder="Truevalue Manager Email" name="truevalue_man_email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Truevalue Manager Contact</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control"  value="" id="field-51" data-mask="phone"  placeholder="Truevalue Manager Contact / Mobile" name="truevalue_man_mobile">
                                        </div>
                                    </div>


                                   

                         </div>
                             <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                <div class="text-left">
                                    <input type="hidden" class="form-control"  value="<?=(int)($last_bill_no->bill_no);?>" id="field-51" name="last_billno">
                                       
                                    <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                    <!-- <input type="hidden" class="form-control"  value="<?=date_format($current_date,"m/d/Y");?>" id="field-51" name="date_of_reg"> -->
                                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                                        
                                 </div>
                                </div>

                            </div>
                        </section></div>

                </form>
            </section>
        </section>


<?php include "includes/footer.php";?>		


<script src="<?=base_url('assets/');?>assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
<script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/js/custom.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- CORE TEMPLATE JS - START --> 
<script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- Sidebar Graph - START --> 
<script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 

<script type="text/javascript">
    $(document).ready(function() { 
        $("#phone").inputmask({"mask": "(+99) 99999-99999"});

        $('select[name="make"]').on('load change', function() {
            var makeID = $(this).val();
            
            if(makeID) {
                $.ajax({
                    url: 'VehicleAdd/myformAjax/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $('select[name="model"]').empty();
                        $.each(data, function(key, value) { 
                            
                            $('select[name="model"]').append('<option value="'+ value.id +'" >'+ value.title +'</option>');
                        });
                    }
               });
            }else{
                $('select[name="model"]').empty();
            }
        });

         
    });

    function search_func()
{
    var val2=$("#commission_amount").val();
    var val3=$("#exp_amount").val();
    var gst_amt=$("#gst_amt").val();
    var value=$("#final_amount").val();
    $.ajax({
       type: "GET",
       url: 'VehicleAdd/myvalAdd/'+value+'/'+val2+'/'+val3+'/'+gst_amt,
       data: {'search_keyword' : value},
       dataType: "json",
       success: function(msg){ 
             $("#total_amount").val(msg);
             $("#amount").val(msg);
       }
    });
}
</script>
</body>
</html>