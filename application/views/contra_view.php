<?php include "includes/header.php"; //print_r($banks); die();?>
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
                        <h1 class="title">Payments </h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open_multipart('Accounts/contra_add', 'name="form1" onSubmit="return ValidateData(this);"' );?>
                                <!-- <form action ="customeradd" method="post" > -->
                 <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">Basic Details</h2>
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

                                    <div class="form-group col-md-6">

                                        <label class="form-label" for="field-2">Bill no. <b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>

                                            <div class="controls">

                                         <input type="text" value="<?=(int)($last_bill_no[0]->bill_no+1);?>" class="form-control" id="bill_no" readonly name="bill_no" >
                                     </div>
                                 </div>
                                 <div class="form-group col-md-6">
                                        <label class="form-label" for="field-2">Date Today (Invoice date)<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc">mm-dd-yyyy</span>
                                        <div class="controls"><?php 
                                        if($last_bill_no[0]->bill_date){ 
                                            $bill_date=date_create($last_bill_no[0]->bill_date); 
                                            $entry_bill_date=date_format($bill_date,'m/d/Y');
                                            $entry_bill_date_limit=$entry_bill_date;
                                        }else{
                                            $bill_date=date_create(BAD__TIME); 
                                            $entry_bill_date=date_format($bill_date,'m/d/Y');
                                            $entry_bill_date_limit="-3w";
                                        }?>
                                        <input type="text" value="<?=$entry_bill_date;?>" class="form-control  datepicker" data-start-date="<?=$entry_bill_date_limit;?>" data-end-date="+1y"  id="bill_date" placeholder="" name="bill_date" onBlur="javascript: validate_date();" />
                                        </div>
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
                                <h2 class="title float-left">Payment Option:</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                        <div class="col-12">                                    
                                            
                            <div class="form-row">

                           
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1"> From Bank</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <select name="frombank" id="frombank" class="form-control" onBlur="javascript: chkcash(this.value);">
                                                 <option value=""> --- Select Bank --- </option>
                                                  <option value="cash" >Cash</option>
                                                 <?php
                                                 
                                               foreach ($banks as $key => $bank) 
                                                    { if(!empty($bank->bank_name)){?>
                                                   <option  value="<?=$bank->id;?>"><?=$bank->bank_name;?></option>
                                                   <?php
                                                    } }?>
                                                 </select>
                                                 <b><img src="st.gif" alt=""></b>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                                <label class="form-label" for="field-1">Branch</label>
                                                <span class="desc"></span>
                                                
                                                <div class="controls">
                                                     <select name="frombranch" id="frombranch" class="form-control">
                                                    <option value="">--- Select Branch ---</option></select>
                                                </div>
                                            </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Cheque No/DD No</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" name="fromchno" value="" id="fromchno" onBlur="chkcash2(this.frombank.value);" maxlength="6"  class="form-control">
                                        </div>
                                    </div>
                                  </div> 
                           <div class="form-row">

                           
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1"> To Bank</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <select name="tobank" id="tobank" class="form-control">
                                                 <option value=""> --- Select Bank --- </option>                                                 
                                                 <option value="cash" >Cash</option>
                                                 <?php
                                                 
                                               foreach ($banks as $key => $bank) 
                                                    { if(!empty($bank->bank_name)){?>
                                                   <option  value="<?=$bank->id;?>"><?=$bank->bank_name;?></option>
                                                   <?php
                                                    } }?>
                                                 </select>
                                                 <b><img src="st.gif" alt=""></b>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                                <label class="form-label" for="field-1">Branch</label>
                                                <span class="desc"></span>
                                                
                                                <div class="controls">
                                                     <select name="tobranch" id="tobranch" class="form-control">
                                                    <option value="">--- Select Branch ---</option></select>
                                                </div>
                                            </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Cheque No/DD No</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" name="tochno" value="" id="tochno" onBlur="chkcash2(form1.frombank.value);" maxlength="6"  class="form-control">
                                        </div>
                                    </div>
                                  </div> 
                            <div class="form-row">
                                    
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="field-1"></label>
                                        <span class="desc">Kindly save your bank details from <strong>setting&gt;bank details </strong></span>
                                        <div class="controls"></div>
                                     </div></div> 
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Date</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input  class="form-control datepicker" type="text" name="dates" id="dates"  maxlength="11" onkeypress="return tabE(this,event)">
                                        </div>
                                    </div>

                                <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input  class="form-control" type="text" name="amount" id="amount" value="" maxlength="11" onBlur="test_skill(),checkday1();" onKeyUp="test_skill();">
                                        </div>
                                    </div>
                                    
                                   

                               <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2"><b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc">eg. "Deposit / Withdrawl / Transfer"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="cash"   placeholder="" name="cash" >
                                        </div>
                                    </div>
                                </div> 

                                 <div class="form-row">
                                    <div class="form-group col-md-12">
                                         <label class="form-label" for="field-1">Amount In Word</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <div id="container" class="form-control" >Payment amount in words</div>
                                            <input type="hidden" name="payment_word" id="payment_word" value="" onkeypress="return tabE(this,event)"  class="form-control" > 
                                        </div>
                                    </div>
                                </div>
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-6" name="particulars" onKeyDown="textCounter(particulars,document.form1.remLen2,250)" onKeyUp="textCounter(particulars,document.form1.remLen2,250)" onBlur="textCounter(particulars,document.form1.remLen2,250)" onFocus="textCounter(particulars,document.form1.remLen2,250)"  onkeypress="return tabE(this,event)"></textarea>
                                                <center><input readonly type="text" name="remLen2" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)"></center>
                                                </div>
                                            </div>
                              </div>                           
                                    

                                
                                    <div class="text-left">
                                       <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" id="user_id" name="user_id">
                                        <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" id="field-51" name="curdate">
                                        <input type="hidden" class="form-control"  value="<?=(int)($last_bill_no[0]->bill_no);?>" id="last_billno" name="last_billno">
                                        <center> <button type="submit" class="btn btn-primary" name="save">Save</button></center>
                                        
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
<script src="<?=base_url('assets/');?>assets/js/jquery.autocomplete.pack.js" type="text/javascript"></script>
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
            source: function (query, result) {
                $dom.ajax({
                   // url: "<?=base_url();?>accounts/get_birds/"+ query,
                    url: "<?=base_url();?>index.php/Accounts/get_birds/"+ query,
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
 
      $dom('select[name="tobank"]').on('change', function() {
            var makeID = $dom(this).val();
            makeID =makeID.replace(/\s+/g, '-');
            
            if(makeID) {
                $dom.ajax({
                    url: '<?=base_url();?>index.php/Accounts/get_branch/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $dom('select[name="tobranch"]').empty();
                        $dom.each(data, function(key, value) { 
                            
                            $dom('select[name="tobranch"]').append('<option value="'+ value.branch +'" >'+ value.branch +'</option>');
                        });
                    }
               });
            }else{
                $dom('select[name="tobranch"]').empty();
            }
        });

       $dom('select[name="frombank"]').on('change', function() {
            var makeID = $dom(this).val();
            makeID =makeID.replace(/\s+/g, '-');
            
            if(makeID) {
                $dom.ajax({
                    url: '<?=base_url();?>index.php/Accounts/get_branch/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $dom('select[name="frombranch"]').empty();
                        $dom.each(data, function(key, value) { 
                            
                            $dom('select[name="frombranch"]').append('<option value="'+ value.branch +'" >'+ value.branch +'</option>');
                        });
                    }
               });
            }else{
                $dom('select[name="frombranch"]').empty();
            }
        });

      
    
});
function chkcash(val)
{ //alert(val);
    var val1=val;
    var fr_val=$dom("#frombank").val();//document.frm_reg.frombank.value;
    var to_val=$dom("#tobank").val();//document.frm_reg.tobank.value;   
    if(fr_val=='cash')
    {
        $dom("#cash").val("Deposit");//document.frm_reg.cash.val$dom("#tobank").val();//ue='deposit';
    }
    else if(fr_val!='cash' && to_val!='cash')
    {
         $dom("#cash").val("Transfer");//document.frm_reg.cash.value='tranfer';
    }
    else if(to_val=='cash')
    {
         $dom("#cash").val("Withdrawl");//document.frm_reg.cash.value='withdrawl';
    }
    
    
}
function chkcash2(val)
{ 
    var val1=val;
    if(val1!='cash')
        {     
            $dom("#tochno").val($dom("#fromchno").val());
        }
}
function validate_date()
{  //alert(item_id);
   
         $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/check_date",
            data: { 
                mode: "contra",
                user_id: $dom("#user_id").val(),
                bill_date: $dom("#bill_date").val(),
                
            },
            success: function (data) { //alert(data);
                      res=data.split("###");
                 //alert(res[1]);
                        if(res[1]=="no"){
                        alert("Billing Date Should be greater than previous billing date");
                        //document.getElementById('bill_msg').innerHTML = 'Billing Date Shold be greater than previous billing date';
                        document.form1.bill_date.focus()
                        return false;
                        
                    }
                
            }
     });
}
function ValidateData(form)
{
        var x;
        x=(
            ForceSelect(form.elements["frombank"],"Please Select From Bank") &&
            ForceSelect(form.elements["tobank"],"Please Select To Bank") &&
            ForceEntry(form.elements["bill_date"],"Please Enter Date") && 
            ForceEntry(form.elements["amount"],"Please Enter amount")    

          )
            if (x==true)
            form.elements["ids"].value='';
            return x;
}

</script>
<script type="text/javascript">



    
</script>
</body>
</html>