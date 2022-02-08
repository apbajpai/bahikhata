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
                        <h1 class="title">Add / Edit (NOTES/BRIEF/PARTICULARS) </h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open('Accounts/add_edit_notes/', 'name="form1" onSubmit="return ValidateData(this);"' );?>
                                <!-- <form action ="customeradd" method="post" > -->
                

              

                  
                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            
                            <div class="content-body">
                                <div class="row">      
                                <div class="col-12"> 

                                <? if ($this->session->userdata('sess_mess')) {?>                                  
                              
                                <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Bill No. / Invoice No. </label>
                                    <div class="controls">
                                        <span style="color:red;"><?=$this->session->userdata('sess_mess');$this->session->unset_userdata('sess_mess');?></span>
                                    </div>
                                   </div>
                                </div>
                                  <? }?>  
                               <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Type Of Accounts</label>
                                    <span class="desc"></span>
                                    <div class="controls">
                                         <select name="type" id="type" required class="form-control">

                                             <option value="receipt" selected >Receipt</option>
                                             <option value="payment">Payment</option>
                                             <option value="purchase">Purchase</option>
                                             <option value="sales">Sales</option>
                                               
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Bill No. / Invoice No. </label>
                                    <div class="controls">
                                        <input  type="text" name="bill_no" id="bill_no" class="form-control " required value="1">
                                    </div>
                                </div>
                            </div>
                               
                                
                                <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Note: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="note" name="note" onKeyDown="textCounter(note,document.form1.remLen2,250)" onKeyUp="textCounter(note,document.form1.remLen2,250)" onkeypress="return tabE(this,event)"></textarea>
                                        <input readonly type="text" name="remLen2" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)">
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