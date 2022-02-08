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
                        <h1 class="title">Sales </h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open('Accounts/do_update_sales', 'name="form1" onSubmit="return ValidateData(this);"' );?>
                                <!-- <form action ="customeradd" method="post" > -->
                <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">Party Details</h2>
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
                                        <label class="form-label" for="field-2">Bill no.<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>

                                            <div class="controls">
                                             <?=(int)($last_bill_no[0]->bill_no+1);?>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="form-label" for="field-2">Date Today (Invoice date)<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc">mm/dd/yyyy</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control datepicker" id="bill_date"   placeholder="" name="bill_date" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Name<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" id="party_name" class="typeahead form-control"  name="party_name" required onblur="showdata(this.value);" autocomplete="off" >
                                            <ul class="dropdown-menu txtcountry" style="possition:absolute;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
                                        </div>
                                    </div>


                              

                                   <div class="form-group">
                                        <label class="form-label" for="field-2">Phone</label>
                                        <span class="desc">e.g. "(534) 253-5353"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="party_phone" data-mask="phone"  placeholder="(999) 999-9999" name="party_phone">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-2">Mobile</label>
                                        <span class="desc">e.g. "(534) 253-5353"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="party_mobile" data-mask="phone"  placeholder="(999) 999-9999" name="party_mobile" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Address<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="party_add" name="party_add"></textarea>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-6" name="particulars" onKeyDown="textCounter(Particulars,document.form1.remLen2,250)" onKeyUp="textCounter(Particulars,document.form1.remLen2,250)" onkeypress="return tabE(this,event)"></textarea>
                                                <input readonly type="text" name="remLen2" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
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
                                        <label class="form-label" for="field-2">Vehicle Reg no.<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc">Registration number of purchased vehicle</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control typeahead" id="item_name"   placeholder="Registration number of purchased vehicle" name="item_name" autocomplete="off" >

                                            <!-- <select name="item_name" onchange="" onBlur=""  onkeypress=""  class="form-control">
                                                 <option value="">--Select--</option>
                                                <?php                                       
                                                 
                                               foreach ($vehicles as $key => $vehicle_details) 
                                                    { if(!empty($vehicle_details->reg_no)){?>
                                                   <option  value="<?=$vehicle_details->reg_no;?>">

                                                    <?=$vehicle_details->reg_no;?> --- <?=$vehicle_details->seller_comp_name;?>

                                                </option>
                                                   <?php
                                                    } }?>
                                            </select> -->
                                        </div>
                                    </div>

                                    
                                </div> 
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">

                                     <div class="form-group">
                                        <label class="form-label" for="field-1">Final Cost</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="final_amount"  placeholder="Final Cost" name="final_amount" onkeyup="search_func();">
                                        </div>
                                    </div>                                    

                                    <div class="form-group">
                                        <label class="form-label" for="field-6">Advance</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-1"  placeholder="Advance" name="advance_amount">
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label class="form-label" for="field-1">First Installment</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-2"  placeholder="First Installment" name="first_amount">
                                            
                                        </div>
                                    </div> -->
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
                                            <input type="text" value="000000" class="form-control" id="field-2" data-mask=""  placeholder="(12 34 56)" name="cheque_no" >
                                        </div>
                                    </div>

                                    <!--  <div class="form-group">
                                        <label class="form-label" for="field-1">Second Installment</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="field-2"  placeholder="Second Installment" name="second_amount">
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Commission (if Any)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="number" class="form-control"  value="0" id="commission_amount" name="commission_amount" placeholder="Commission to seller" onkeyup="search_func(), test_skill();">
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
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="number" class="form-control" min="0"  value="0" id="total_amount" name="total_amount" placeholder="Total Amount" readonly onkeyup="search_func(), test_skill();">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="field-1">Amount In Word</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <div id="container" class="form-control" >payment amount in words</div>
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
                            
                            <div class="content-body">
                                <div class="row">
                                     
                                       
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                        <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="field-51" name="user_id">
                                        <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="curdate">
                                        <input type="hidden" class="form-control"  value="<?=(int)($last_bill_no[0]->bill_no);?>" id="field-51" name="last_billno">
                                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                                        
                                    </div>
                                </div>


                            
                        </div>


                         </div>
                     </section>
                    </div>
                <? echo form_close();?>
            </section>
        </section>


<?php include "includes/footer.php";?>		


<script src="<?=base_url('assets/');?>assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
<script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<!--<script src="<?=base_url('assets/');?>assets/js/jquery.autocomplete.pack.js" type="text/javascript"></script>-->
<script src="<?=base_url('assets/');?>assets/js/custom.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/js/typeahead.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<!-- CORE TEMPLATE JS - START --> 
<script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- Sidebar Graph - START --> 
<script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 

<script type="text/javascript">
var $dom = jQuery.noConflict();
$dom(document).ready(function () {
      $dom('#party_name').typeahead({
            source: function (query1, result1) {
                $dom.ajax({
                   // url: "<?=base_url();?>accounts/get_birds/"+ query,
                    url: "./get_birds/"+ query1,
                    //data: '/' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) { 
                        result1($dom.map(data, function (item) {//alert(item);
                            return item;
                        }));
                    }
                });
            }
        });
      $dom('#item_name').typeahead({
            source: function (query, result) {
                $dom.ajax({
                   // url: "<?=base_url();?>accounts/get_birds/"+ query,
                    url: "./get_vehicle/"+ query,
                    //data: '/' + query,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) { 
                        result($dom.map(data, function (item) {//alert(item);
                            return item;
                        }));
                    }
                });
            }
        });

    $dom("#party_name").blur(function(){
    //alert("This input field has lost its focus.");
//});
         $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/GetCustomerDetails",
            data: { 
                keyword: $dom("#party_name").val()
            },
            dataType: "json",
            success: function (data) { //alert(data);
                if (data.length == 0) {
                    $dom('#party_phone').val();
                }
                $dom.each(data, function (key,value) {
                    if (data.length >= 0)
                        //$('#DropdownCountry').append('<li role="displayCountries" ><a role="menuitem dropdownCountryli" class="dropdownlivalue">' + value['party_name'] + '</a></li>');
                     $dom('#party_phone').val(value['phone']);
                     $dom('#party_mobile').val(value['mobile']);
                     $dom('#party_add').val(value['partyadd']);
                });
            }
     });
            });
  });
   
 function search_func()
{
    var val2=$dom("#commission_amount").val();
    var val3=$dom("#exp_amount").val();
    var gst_amt=$dom("#gst_amt").val();
    var value=$dom("#final_amount").val();
    $dom.ajax({
       type: "GET",
       url: './myvalAdd/'+value+'/'+val2+'/'+val3+'/'+gst_amt,
       data: {'search_keyword' : value},
       dataType: "json",
       success: function(msg){ 
             $dom("#total_amount").val(msg);
             $dom("#amount").val(msg);
       }
    });
}
</script>
<script type="text/javascript">



    
</script>
</body>
</html>