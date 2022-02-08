<?php include "includes/header.php"; //print_r($banks); die();?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<?=link_tag('assets/assets/plugins/datepicker/css/datepicker.css');?>     
<link href="<?=base_url('assets/');?>assets/plugins/typeahead/css/typeahead.css" rel="stylesheet" type="text/css" media="screen"/>    
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

<style> input[type='text'],textarea{    text-transform:capitalize; } </style>
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
                 <?php echo form_open_multipart('Accounts/payments_add', 'name="form1" onSubmit="return ValidateData(this);"' );?>
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

                                <div class="col-12">

                                 <div class="form-row">

                                    <div class="form-group col-md-6">

                                        <label class="form-label" for="fi(+99) 99999-99999eld-2">Bill no. <b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>

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
                            <div class="form-row"><?php //$customerdetails=array();
                            if (isset($_REQUEST['pbn']) || !empty($_REQUEST['pbn'])) {
                                $customerdetails=$this->db->get_where('tbl_bill_no_purchase',array('user_id' => $this->session->userdata('user_id'), 'bill_no' =>$_REQUEST['pbn']))->row()->partyname;
                                $customerdetails_reg_no=$this->db->get_where('tbl_temp_purchase_master',array('user_id' => $this->session->userdata('user_id'), 'bill_no' =>$_REQUEST['pbn']))->row()->item_name;
                                $customerdetails_on_account_of=$this->db->get_where('tbl_bill_no_purchase',array('user_id' => $this->session->userdata('user_id'), 'bill_no' =>$_REQUEST['pbn']))->row()->under_account;
                                $customerdetails_bill_date=$this->db->get_where('tbl_bill_no_purchase',array('user_id' => $this->session->userdata('user_id'), 'bill_no' =>$_REQUEST['pbn']))->row()->bill_date;
                                $customerdetails_bill_date=date_create(strtotime($customerdetails_bill_date));
                                $customerdetails_brief = "This Payment is Made Against purchase Incoice no ".$_REQUEST['pbn']." of purchase of Vehicle (Registration No. $customerdetails_reg_no) on the date of ". date_format($customerdetails_bill_date,"m/d/Y");
                            } else {
                                $customerdetails               = '';
                                $customerdetails_reg_no        = '';
                                $customerdetails_on_account_of = '';
                                $customerdetails_bill_date     = '';
                                $customerdetails_brief         = '';
                            }
                             ?>

                                <div class="form-group col-md-6">
                                        <label class="form-label" for="field-1">Name<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" id="party_name" class="typeahead form-control" name="party_name" required autocomplete="off" value="<?=$customerdetails;?>">
                                           
                                        </div>
                                   </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="field-6">Address<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="party_add" name="party_add"></textarea>
                                        </div>
                                        
                                   </div>
                               </div>
                           <div class="form-row">

                             <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Mobile</label>
                                        <span class="desc">e.g. "(+99) 99999-99999"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="party_mobile" data-mask="(+99) 99999-99999"  placeholder="(+99) 99999-99999" name="party_mobile" >
                                        </div>
                                    </div>

                               <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Phone</label>
                                        <span class="desc">e.g. "(+99) 99999-99999"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="party_phone" data-mask="(+99) 99999-99999"  placeholder="(+99) 99999-99999" name="party_phone">
                                        </div>
                                    </div>

                            <div class="form-group col-md-4">
                                <label class="form-label" for="field-2">Email</label>
                                <span class="desc">e.g. "aaaaaaaaaaa@aaaaaa.aaaaaaa"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control daterange" id="party_email" data-mask="email"  placeholder="aaaaaaaaaaa@aaaaaa.aaaaaaa" name="party_email" >
                                </div>
                            </div>
                            </div>
                            <div class="form-row">
                            <div class="form-group col-md-4">
                                <label class="form-label" for="field-2">PAN</label>
                                <span class="desc">e.g. "XXXXX1234X"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control" id="pan_no" data-mask="AAAAA9999A"  placeholder="PAN" name="pan_no" >
                                </div>
                            </div>

                             <div class="form-group col-md-4">
                                <label class="form-label" for="field-2">GST</label>
                                <span class="desc">e.g. "GST"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control" id="tin_no" data-mask=""  placeholder="GST" name="tin_no" >
                                </div>
                            </div>

                       

                               <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">On Account of<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc">eg.Salary, Purchase, Rent, Interest etc.</span>
                                        <div class="controls">
                                            <input type="text" value="<?=$customerdetails_on_account_of;?>" class="form-control" id="accounthead"   placeholder="" name="under_account" >
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
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-2 pt-0">Mode Of Payment<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></legend>
                                                    <div class="form-row col-sm-10">
                                                        <div class="form-group col-md-2">
                                                            <input class="form-check-input"  type="radio" name="payment_option" value="Cash" onClick="chMd()"  onkeypress="return tabE(this,event)" id="payment_option"/>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Cash
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <input class="form-check-input"  type="radio" name="payment_option" value="Cheque" onClick="chMd()"  onkeypress="return tabE(this,event)" id="payment_option"/> 
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Cheque
                                                            </label>
                                                        </div>
                                                        <!-- <div class="form-group col-md-2">
                                                            <input class="form-check-input"  type="radio" name="payment_option" value="CreditCard" onClick="chMd()" onkeypress="return tabE(this,event)" id="payment_option"/>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Credit Card
                                                            </label>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <input class="form-check-input"  type="radio" name="payment_option" value="DebitCard" onClick="chMd()" onkeypress="return tabE(this,event)" id="payment_option"/>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Debit Card
                                                            </label>
                                                        </div> -->
                                                        <div class="form-group col-md-8">
                                                            <input class="form-check-input"  type="radio" name="payment_option" value="NetBanking" onClick="chMd()" onkeypress="return tabE(this,event)" id="payment_option"/>
                                                            <label class="form-check-label" for="gridRadios1">
                                                                Net Banking / Debit / Credit Card / NEFT /RTGS
                                                            </label>
                                                        </div>    
                                                    </div>
                                                </div>
                                            </fieldset>
                           <div class="form-row">

                             <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Cheque No/DD No</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input  class="form-control" type="text" name="cheque_dd" value="" id="itemdiv" onBlur="checkday();" maxlength="6" onkeypress="return tabE(this,event)" >
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Credit Card/Debit Card</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input  class="form-control" type="text" name="cc_dc" value="" maxlength="16" onkeypress="return tabE(this,event)">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Date</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input  class="form-control datepicker" type="text" name="dates" id="dates"  maxlength="11" onkeypress="return tabE(this,event)">
                                        </div>
                                    </div>
                            </div>
                           <div class="form-row">
                                <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Bank</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <select name="bank" id="bank"   class="form-control">
                                                 <option value=""> --- Select Bank --- </option>
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
                                    <div class="form-group col-md-3">
                                                <label class="form-label" for="field-1">Branch</label>
                                                <span class="desc"></span>
                                                
                                                <div class="controls">
                                                     <select name="branch" id="branch" class="form-control">
                                                    <option value="">--- Select Branch ---</option></select>
                                                </div>
                                            </div>
                             <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Transfer Ref. No.</label>
                                        <span class="desc">(Net Banking / Debit / Credit Card)</span>
                                        <div class="controls">
                                            <input  class="form-control" type="text" name="reff_net" value="" id="unitdiv" maxlength="30" onkeypress="return tabE(this,event)">
                                        </div>
                                    </div>
                                   
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input  class="form-control" type="text" name="amount" id="amount" value="" maxlength="11" onBlur="validate_item(),test_skill(),checkday1();" onkeypress="return tabE(this,event) test_skill();" onKeyUp="test_skill();">
                                        </div>
                                    </div>
                                    
                                  </div> 
                            <div class="form-row">
                                    
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1"></label>
                                        <span class="desc">Kindly save your bank details from </span>
                                        <div class="controls"><span class="desc"><strong>setting&gt;bank details </strong></span></div>
                                     </div>
                                    
                                    <div class="form-group col-md-9">
                                        <label class="form-label" for="field-1">Amount In Word</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <div id="container" class="form-control" >Payment amount in words</div>
                                            <input type="hidden" name="payment_word" id="payment_word" value="" onkeypress="return tabE(this,event)"  class="form-control" > 
                                            <input type="hidden" name="mybank" id="mybank" value="" onkeypress="return tabE(this,event)"  class="form-control" > 
                                        </div>
                                    </div>
                                </div> 
                            <div class="form-row">
                                    <div class="form-group col-md-12">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                <textarea class="form-control autogrow" cols="5" id="field-6" name="particulars" onKeyDown="textCounter(particulars,document.form1.remLen2,250)" onKeyUp="textCounter(Particulars,document.form1.remLen2,250)" onBlur="textCounter(Particulars,document.form1.remLen2,250)" onFocus="textCounter(Particulars,document.form1.remLen2,250)"  onkeypress="return tabE(this,event)"><?=$customerdetails_brief;?></textarea>
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

<script src="<?=base_url('assets/');?>assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
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
    $dom("#party_name").select();
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
                     $dom('#pan_no').val(value['sup_pan']);
                     $dom('#tin_no').val(value['sup_tin']);
                     $dom('#party_email').val(value['email']);
                });
            }
     });

     

   var substringMatcher = function(strs) {
                return function findMatches(q, cb) {
                    var matches, substrRegex;

                    // an array that will be populated with substring matches
                    matches = [];

                    // regex used to determine if a string contains the substring `q`
                    substrRegex = new RegExp(q, 'i');

                    // iterate through the pool of strings and for any string that
                    // contains the substring `q`, add it to the `matches` array
                    $dom.each(strs, function(i, str) {
                        if (substrRegex.test(str)) {
                            // the typeahead jQuery plugin expects suggestions to a
                            // JavaScript object, refer to typeahead docs for more info
                            matches.push({
                                value: str
                            });
                        }
                    });

                    cb(matches);
                };
            };

         // remote data


            var name_randomizer = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('party_name'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // You can also prefetch suggestions
                // prefetch: 'data/typeahead-generate.php',
                remote: '<?=base_url();?>index.php/Accounts/get_birds/%QUERY'
            });

            name_randomizer.initialize();

            $dom('#party_name').typeahead({
                hint: true,
                highlight: true
            }, {
                name: 'string-randomizer',
                displayKey: 'party_name',
                source: name_randomizer.ttAdapter()
            });



            // remote data


            var GetAccounthead = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // You can also prefetch suggestions
                // prefetch: 'data/typeahead-generate.php',
                remote: '<?=base_url();?>index.php/Accounts/GetAccounthead/%QUERY'
            });

            GetAccounthead.initialize();

            $dom('#accounthead').typeahead({
                hint: true,
                highlight: true
            }, {
                name: 'string-randomizer',
                displayKey: 'value',
                source: GetAccounthead.ttAdapter()
            });
      $dom('select[name="bank"]').on('change', function() {
            var makeID = $dom(this).val();
            makeID =makeID.replace(/\s+/g, '-');
            
            if(makeID) {
                $dom.ajax({
                    url: '<?=base_url();?>index.php/Accounts/get_branch/'+makeID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        $dom('select[name="branch"]').empty();
                        $dom.each(data, function(key, value) { 
                            
                            $dom('select[name="branch"]').append('<option value="'+ value.branch +'" >'+ value.branch +'</option>');
                        });
                    }
               });
            }else{
                $dom('select[name="model"]').empty();
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
                     $dom('#pan_no').val(value['sup_pan']);
                     $dom('#tin_no').val(value['sup_tin']);
                     $dom('#party_email').val(value['email']);
                });
            }
     });
     });
   $dom("#party_name").on('change', function() {
    //alert("This input field has lost its focus.");
//});
   //$dom("#party_name").select();
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

function validate_date()
{  //alert(item_id);
   
         $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/check_date",
            data: { 
                mode: "payment",
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

</script>
<script type="text/javascript">



    
</script>
</body>
</html>