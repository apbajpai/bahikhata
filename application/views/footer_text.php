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
                        <h1 class="title">Footer Text For All Pages </h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open('Settings/footer_text/', 'name="form1" onSubmit="return ValidateData(this);"');?>
                   <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            
                            <div class="content-body">
                                <div class="row">      
                                <div class="col-12"> 

                                <? if ($this->session->userdata('sess_mess')) {?>                                  
                              
                                <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Session Message </label>
                                    <div class="controls">
                                        <span style="color:red;"><?=$this->session->userdata('sess_mess');$this->session->unset_userdata('sess_mess');?></span>
                                    </div>
                                   </div>
                                </div>
                                  <? }?>  
                               <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Sales Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="sales_footer" name="sales_footer" onKeyDown="textCounter(sales_footer,document.form1.remLen1,250)" onKeyUp="textCounter(sales_footer,document.form1.remLen1,250)" onFocus="textCounter(sales_footer,document.form1.remLen1,250)" onkeypress="return tabE(this,event)"><?=$foot_text->sales;?></textarea>
                                        <input readonly type="text" name="remLen1" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Purchase Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="purchase_footer" name="purchase_footer" onKeyDown="textCounter(purchase_footer,document.form1.remLen2,250)" onKeyUp="textCounter(purchase_footer,document.form1.remLen2,250)" onkeypress="return tabE(this,event)"><?=$foot_text->purchase;?></textarea>
                                        <input readonly type="text" name="remLen2" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Payment Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="payment_footer" name="payment_footer" onKeyDown="textCounter(payment_footer,document.form1.remLen3,250)" onKeyUp="textCounter(payment_footer,document.form1.remLen3,250)" onkeypress="return tabE(this,event)"><?=$foot_text->payment;?></textarea>
                                        <input readonly type="text" name="remLen3" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Receipt Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="receipt_footer" name="receipt_footer" onKeyDown="textCounter(receipt_footer,document.form1.remLen4,250)" onKeyUp="textCounter(receipt_footer,document.form1.remLen4,250)" onkeypress="return tabE(this,event)"><?=$foot_text->reciept;?></textarea>
                                        <input readonly type="text" name="remLen4" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Sales Return Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="sales_return_footer" name="sales_return_footer" onKeyDown="textCounter(sales_return_footer,document.form1.remLen5,250)" onKeyUp="textCounter(sales_return_footer,document.form1.remLen5,250)" onkeypress="return tabE(this,event)"><?=$foot_text->sales_return;?></textarea>
                                        <input readonly type="text" name="remLen5" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>
                               
                                
                                <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Purchase Return Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="purchase_return_footer" name="purchase_return_footer" onKeyDown="textCounter(purchase_return_footer,document.form1.remLen6,250)" onKeyUp="textCounter(purchase_return_footer,document.form1.remLen6,250)" onkeypress="return tabE(this,event)"><?=$foot_text->purchase_return;?></textarea>
                                        <input readonly type="text" name="remLen6" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>


                                <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Contra Page Footer Text: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="contra_footer" name="contra_footer" onKeyDown="textCounter(contra_footer,document.form1.remLencontra,250)" onKeyUp="textCounter(contra_footer,document.form1.remLencontra,250)" onkeypress="return tabE(this,event)"><?=$foot_text->contra;?></textarea>
                                        <input readonly type="text" name="remLencontra" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="text-left">
                                        <input type="hidden" value="<?=$this->session->userdata('user_id');?>" id="user_id" name="user_id">
                                        <input type="hidden" value="<?=BAD__TIME;?>" id="field-51" name="curdate">
                                       <center> <button type="submit" class="btn btn-primary" name="save">Update</button></center>
                                        
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

      <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 


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

    $dom("#bill_no").blur(function(){
       $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/addedit_notes",
            data: { 
                keyword: $dom("#bill_no").val(),
                type: $dom("#type").val()
            },
            dataType: "json",
            success: function (data) { //
               
                $dom.each(data, function (key,value) {
                   
                     $dom('#note').val(value);
                });
            }
     });
            });


  });
   


</script>

</body>
</html>