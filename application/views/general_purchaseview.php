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
                        <h1 class="title">Purchase </h1> 
                    </div>
                </div>
            </div>
                <div class="clearfix"></div>
                 <?php echo form_open('Accounts/do_update_master/Purchases', 'name="form1" onSubmit="javascript: return ValidateData(this);"' );?>
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

                                    <div class="form-group col-md-4">

                                        <label class="form-label" for="field-2">Bill no.<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>

                                        <div class="controls">

                                         <input type="text" value="<?=(int)($last_bill_no[0]->bill_no+1);?>" class="form-control" id="bill_no"   readonly name="bill_no" >
                                     </div>
                                 </div>
                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="field-2">Date <b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                    <span class="desc">mm/dd/yyyy</span>
                                    <div class="controls">
                                        <?php 
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

                                 <div class="form-group col-md-4">
                                    <label class="form-label" for="field-2">Billing Type</label>
                                    <span class="desc">IGST/CGST</span>
                                    <div class="controls">
                                        <select class="form-control" id="billing_type" name="billing_type">
                                            <option value="igst">IGST</option>
                                            <option value="sgst">SGST</option>
                                        </select>
                                        
                                    </div>
                                </div>
                            </div> 
                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label class="form-label" for="field-1">Name<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                    <span class="desc"></span>
                                    <div class="controls">
                                        <input type="text" id="party_name" class="typeahead form-control"  name="party_name" required onblur="showdata(this.value);" autocomplete="off" >
                                        <ul class="dropdown-menu txtcountry" style="possition:absolute;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCountry"></ul>
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
                                <label class="form-label" for="field-2">Phone</label>
                                <span class="desc">e.g. "+91 99999-99999" "(+91) 62522-34318"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control" id="party_phone" data-mask="(+99) 99999-99999"  placeholder="(+91) 99999-99999 / (+91) 62522-34318" name="party_phone">
                                </div>
                            </div>

                            <div class="form-group col-md-4">
                                <label class="form-label" for="field-2">Mobile</label>
                                <span class="desc">e.g. "+99 99999-99999"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control daterange" id="party_mobile" data-mask="(+99) 99999-99999"  placeholder="(+91) 99999-99999" name="party_mobile" >
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

                             <div class="form-group col-md-3">
                                <label class="form-label" for="field-2">Supplier Invoice No. :</label>
                                <span class="desc">e.g. "Supplier Invoice No."</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control" id="sup_no" placeholder="Supplier Invoice No" name="sup_no" required>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="form-label" for="field-2">Supplier Invoice Date:</label>
                                <span class="desc">e.g. "mm/dd/yyyy"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control datepicker" id="sup_dt" placeholder="sup date" name="sup_dt" required>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label class="form-label" for="field-2">PAN</label>
                                <span class="desc">e.g. "XXXXX1234X"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control" id="sup_pan" data-mask="AAAAA9999A"  placeholder="PAN" name="sup_pan" >
                                </div>
                            </div>

                             <div class="form-group col-md-3">
                                <label class="form-label" for="field-2">GST</label>
                                <span class="desc">e.g. "GST"</span>
                                <div class="controls">
                                    <input type="text" value="" class="form-control" id="tin_no"  placeholder="GST" name="tin_no" >
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
                                <h2 class="title float-left">Deal Info</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                   <div class="col-12">
                                    <div class="form-row">
                                     <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Item Name<b><img src="<?=base_url();?>assets/assets/images/st.gif" alt=""></b></label>
                                        <span class="desc">Purchased Item Name</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control typeahead" id="items"   placeholder="Item Name" name="items" autocomplete="off" >                                          
                                        </div>
                                    </div>

                                    
                                

                                     <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Unit</label>
                                        <span class="desc">eg. KG/Metre/PCS/month/Year/Litre etc</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control typeahead" id="units"  placeholder="Unit Eg PCS MONTHS YEARS KG METRE" name="units" autocomplete="off" >
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Quantity</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="quantity"  placeholder="QUANTITY Eg 1 2 99 in Possitive" name="quantity" onBlur="validate_item('3'),cal_amount(),cal_total_amount();">
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-row">
                                     <div class="form-group col-md-3">
                                        <label class="form-label" for="field-6">Rate</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text"  class="form-control" id="rate"  placeholder="Rate of the item ie Cost" name="rate"onKeyUp="cal_amount();" onKeyPress="cal_amount();" value="0" onBlur="cal_amount(),validate_item('4');" onFocus="validate_item('2'),validate_item('3');">
                                        </div>
                                    </div>
                                   
                                   
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="0" class="form-control" id="amount" data-mask=""  placeholder="Amount In &#x20B9;" name="amount" onBlur="validate_item('5');"  readonly="readonly">
                                        </div>
                                    </div>
                                     <div class="col-lg-3">
                                          <label class="form-label" for="field-1">Discount  Type</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <input name="radio" type="radio" id="INR" onSelect="cal_final_amount(this.value);" onBlur="cal_final_amount(this.value);" onClick="cal_final_amount(this.value);" onFocus="cal_total_amount1(),cal_final_amount(this.value);" class="skin-square-red" checked>
                                                    <label class="icheck-label form-label" for="square-checkbox-1"> &nbsp;&nbsp;&nbsp; &#x20B9; (in Rupee(s)) &nbsp;&nbsp;&nbsp;</label>
                                                
                                                    <input name="radio" type="radio" id="percent" onSelect="cal_final_amount(this.value);" onBlur="cal_final_amount(this.value);" onClick="cal_final_amount(this.value);" onFocus="cal_total_amount1(),cal_final_amount(this.value);" class="skin-square-green" >
                                                    <label class="icheck-label form-label" for="square-checkbox-1">&nbsp;&nbsp;&nbsp;%&nbsp;&nbsp;&nbsp;</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>

                                   
                                    <div class="form-group col-md-3">
                                        
                                        <label class="form-label" for="field-1">Discount </label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            
                                            <input type="text" class="form-control"  name="discount"  id="discount" onBlur="cal_final_amount('percent'),cal_total_amount1();" onFocus="cal_total_amount1();" onKeyUp="cal_final_amount('percent');" value="0" placeholder="Possitive Numbers only" >
                                        </div>
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Total Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" disabled="disabled" name="total_amount" id="total_amount" onBlur="cal_total_amount1();"  value="0"  readonly="readonly">
                                        </div>
                                    </div>
                                     <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">GST (%)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="vat" id="vat" onKeyPress="cal_total_amount(),show_vat_amount(),validate_item('6');" onKeyUp="cal_total_amount(),show_vat_amount();" onBlur="cal_total_amount(),show_vat_amount(),validate_item('6');" value="0" placeholder="Possitive Numbers only" >
                                           
                                        </div>
                                    </div>
                                     <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">GST Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            
                                            <input type="text" class="form-control"  name="vat_amount" id="vat_amount"  value="0"  readonly="readonly" placeholder="Possitive Numbers only" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Final Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="final_total" id="final_total" value="0" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        
                                        <button type="button" class="btn btn-purple pull-right" name="add" id="add_item" onClick="javascript: add_items('add')">Add</button>
                                        
                                    </div>
                                </div> 
                         </div>

                        </div>


                         </div>
                     </section>
                    </div>

                    <div class=" col-12">
                        <section class="box ">
                            
                            <div class="content-body">
                                <div class="row">
                                    

                                 <div id="item_display"  class="col-md-12 col-sm-12 col-xs-12"> 
                                    <div class="form-row">
                                     <div class="form-group col-md-12">
                                   
                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th><th>Qunatity</th>
                                                        <th>&nbsp;&nbsp;Unit</th>
                                                        <th style="text-align:right;">Rate</th>
                                                        <th style="text-align:right;">Amount</th>
                                                        <th style="text-align:right;">Discount</th>
                                                        <th>&nbsp;</th>
                                                        <th style="text-align:right;">Total Amount</th>
                                                        <th style="text-align:right;">GST(%)</th>
                                                        <th style="text-align:right;">GST Amount</th>
                                                        <th style="text-align:right;">Final Total</th>
                                                        <th>Action</th>
                                                        </tr>
                                            </thead>
                                             <tbody>
                                                <tr><td></td></tr>
                                             </tbody>
                                         
                                       
                                    </table>
                                    </div>  </div>  </div>    
                                 
                        </div>


                         </div>
                     </section>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                        <section class="box ">
                            
                            <div class="content-body">
                                <div class="row">      
                                <div class="col-12"> 

                                   
                               
                                <div class="form-row">
                                   
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="field-1">Discount In &#x20B9;</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input name="final_discount" type="text" id="final_discount" onBlur="cal_grand_total();" onKeyPress="cal_grand_total();" class="form-control" > 
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="field-1">Grand Total Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" min="0"  value="0" name="grand_total" readonly id="grand_total" onChange="test_skill();" onFocus="test_skill();" style="text-align:right; margin-right:2px;">
                                        </div>
                                    </div>

                                    
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="field-1">Amount In Word</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <div id="container" class="form-control">payment amount in words</div>
                                            <input type="hidden" name="payment_word" id="payment_word" value="" onkeypress="return tabE(this,event)"  class="form-control" > 
                                            
                                        </div>
                                    </div> 
                                </div>
                                <div class="form-row"> 
                                    <div class="form-group col-md-12">
                                    <label class="form-label" for="field-6">Note: </label>
                                    <span class="desc">e.g. "Enter any size of text description here: "</span>
                                    <div class="controls">
                                        <textarea class="form-control autogrow" cols="5" id="note" name="note" onKeyDown="textCounter(note,document.form1.remLen2,250)" onKeyUp="textCounter(note,document.form1.remLen2,250)" onkeypress="return tabE(this,event)"></textarea>
                                        <center><input readonly type="text" name="remLen2" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)"></center>
                                    </div>
                                </div>
                            </div>
                                    
                            <div class="text-left">
                                        <input type="hidden" value="<?=$this->session->userdata('user_id');?>" id="user_id" name="user_id">
                                        <input type="hidden" value="<?=BAD__TIME;?>" id="field-51" name="curdate">
                                        <input type="hidden" value="<?=(int)($last_bill_no[0]->bill_no);?>" id="bill_no" name="last_billno">
                                        <input type="hidden" value="<?=BAD__TIME;?>" id="entry_date"  name="entry_date" />
                                        <input type="hidden" value="<?=BAD__TIME;?>" id="ch_bill_date"  name="ch_bill_date" />
                                        <input type="hidden" value="<?=(int)($last_bill_no[0]->bill_no+1);?>" id="party_code"  name="party_code" />
                                        <input type="hidden" value="dr" id="blance_type"  name="blance_type" />
                                        <input type="hidden" value="&#x20B9;" id="discount_type"  name="discount_type" />
                                        <input type="hidden" value="" id="tpt_name"  name="tpt_name" />
                                        <input type="hidden" value="Purchase" id="type"  name="type" />
                                       <center> <button type="submit" class="btn btn-primary" name="save">Save</button></center>
                                        
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

<script src="<?=base_url('assets/');?>assets/plugins/typeahead/typeahead.bundle.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

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

         // remote data party_name


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

  // remote data items


            var name_randomizer = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('item_names'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // You can also prefetch suggestions
                // prefetch: 'data/typeahead-generate.php',
                remote: '<?=base_url();?>index.php/Accounts/get_items/%QUERY'
            });

            name_randomizer.initialize();

            $dom('#items').typeahead({
                hint: true,
                highlight: true
            }, {
                name: 'string-randomizer',
                displayKey: 'item_names',
                source: name_randomizer.ttAdapter()
            });



  // remote data units


            var name_randomizer = new Bloodhound({
                datumTokenizer: Bloodhound.tokenizers.obj.whitespace('units'),
                queryTokenizer: Bloodhound.tokenizers.whitespace,
                // You can also prefetch suggestions
                // prefetch: 'data/typeahead-generate.php',
                remote: '<?=base_url();?>index.php/Accounts/get_units/%QUERY'
            });

            name_randomizer.initialize();

            $dom('#units').typeahead({
                hint: true,
                highlight: true
            }, {
                name: 'string-randomizer',
                displayKey: 'units',
                source: name_randomizer.ttAdapter()
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
                     $dom('#sup_pan').val(value['sup_pan']);
                     $dom('#tin_no').val(value['sup_tin']);
                     $dom('#party_email').val(value['email']);
                });
            }
     });
            });

 // $dom("#add_item").click(function(){

 //        if($dom("#percent").is(':checked')){
 //               var dis_type="%";
 //            }else{
 //               var dis_type="&#x20B9;";
 //            }
 //         $dom.ajax({
 //            type: "POST",
 //            url: "<?=base_url();?>index.php/Testpages/add_item",
 //            data: { 
 //                mode: "add",
 //                pname: $dom("#party_name").val(),
 //                bill_date: $dom("#bill_date").val(),
 //                bill_no: $dom("#bill_no").val(),
 //                items: $dom("#items").val(),   
 //                units: $dom("#units").val(),
 //                quantity: $dom("#quantity").val(),
 //                rate: $dom("#rate").val(),
 //                amount: $dom("#amount").val(),
 //                vat: $dom("#vat").val(),
 //                vat_amount: $dom("#vat_amount").val(),
 //                total_amount: $dom("#total_amount").val(),
 //                final_total: $dom("#final_total").val(),
 //                discount: $dom("#discount").val(),
 //                billno: $dom("#bill_no").val(),
 //                billing_date: $dom("#billing_date").val(),
 //                discount_type:dis_type
                
 //            },
 //            //dataType: "json",
 //            success: function (data) { //alert(data);
 //                // if (data.length == 0) {
 //                //     $dom('#party_phone').val();
 //                // } alert(data);
 //                // $dom.each(data, function () {
 //                //     if (data.length >= 0)
                       
 //                     $dom("#item_display").html(data) ;
 //                     cal_grand_total();
 //                     $dom("#items").val("") ;
 //                     $dom("#units").val("") ;
 //                     $dom("#quantity").val("0") ;
 //                     $dom("#amount").val("0")  ;
 //                     $dom("#vat").val("0") ;
 //                     $dom("#vat_amount").val("0") ;
 //                     $dom("#total_amount").val("0") ;
 //                     $dom("#final_total").val("0") ;
 //                     $dom("#discount").val("0");    
 //                     $dom("#rate").val("0") ;
 //                     document.form1.items.focus();
 //                // });
 //            }
 //     });
 //            });
  });
   

   function cal_grand_total()
   {
    $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/cal_grand_total",
            data: { 
                mode: "add",
                final_discount: $dom("#final_discount").val(),
                bill_date: $dom("#bill_date").val(),
                bill_no: $dom("#bill_no").val(),
                add_type: $dom("#type").val()
                
            },
            success: function (data) { 
                response = data;
                 res=response.split("###");
                    document.getElementById('grand_total').value = res[1];
                    test_skill();
            }
     });

   }

function cal_amount(){
   var quantity=document.getElementById('quantity').value;
   var rate=document.getElementById('rate').value;
   //alert(quantity);
    if(quantity<=0 || rate<=0)
    {
        if(quantity<=0)
            {           alert("Quantity Or Rate Cannot Be Less Than Zero.");
        document.form1.quantity.focus();
        }
        else
        {
            document.form1.rate.select();
        }
    }
    else
    {
        if(quantity!="" && rate!=""){
            var amount=quantity*rate;
            document.getElementById('amount').value=amount;
            document.getElementById('final_total').value=amount;
        }else{
            document.getElementById('amount').value="";     
        }
    }
}
function show_vat_amount(){
    var quantity = document.getElementById('quantity').value;
    var rate = document.getElementById('rate').value;
    var vat = document.getElementById('vat').value;
    var total_amount = document.getElementById('total_amount').value;
    if(quantity!="" && rate!="" && vat!=""){
        var vat_amounts=(total_amount*vat)/100;
        document.getElementById('vat_amount').value=vat_amounts;
    }else if(vat=="" || vat=="0"){
        document.getElementById('vat').value="0";
        document.getElementById('vat_amount').value="0";
    }else{
        document.getElementById('vat_amount').value="0";        
    }
}

function cal_final_amount(str){
    var total_amount=document.getElementById('amount').value;
    var discount=document.getElementById('discount').value;
    var chk=document.getElementById('INR').checked;
    if(chk==false)
    {
    
        if (discount>100)
        {
            alert("Please Enter less than 100");
            document.getElementById('discount').value=0;
            return false;
            document.form1.discount.focus()
        }
        else
            var discount_val=((total_amount*discount)/100);
    }else{
        var discount_val=discount;
    }
    if(discount!=""){
        var amount_final=total_amount-discount_val;
    }else{
        var amount_final=total_amount;
    }
    document.getElementById('total_amount').value=amount_final;
    document.getElementById('final_total').value=amount_final;      
    
}
function cal_total_amount1()
{
    var total_amount=document.getElementById('total_amount').value;
    document.getElementById('final_total').value=total_amount;
}
function cal_total_amount()
{
    var total_amount=$dom("#total_amount").val();
    var vat_amount=$dom("#vat_amount").val();
    var final_total = parseFloat(total_amount,10) + parseFloat(vat_amount,10);
    //document.getElementById('final_total').value=  
    $dom("#final_total").val(final_total);
}

function ValidateData()
{
    item_num='<?php $row_bd_num?>';
    if(item_num=='0' || item_num<0)
    {
        alert("Please add atleast one item.");
        return false;
        document.form1.items.focus()
    }
    party_name=document.getElementById('party_name').value;
    if(party_name==""){
        alert("Please Enter Party name");
        return false;
        document.form1.party_name.focus()
    }
    address=document.getElementById('address').value;
    if(address==""){
        alert("Please Enter Address ");
        return false;
        document.form1.address.focus()
    }

    billing_date=document.getElementById('billing_date').value;
    if(billing_date==""){
        alert("Please Enter Billing Date");
        return false;
        document.form1.billing_date.focus()
    }

}

function test_skill() {
    var junkVal=document.getElementById('grand_total').value;
    junkVal=Math.floor(junkVal);
    var obStr=new String(junkVal);
    numReversed=obStr.split("");
    actnumber=numReversed.reverse();

    if(Number(junkVal) >=0){
        //do nothing
    }
    else{
        alert('wrong Number cannot be converted');
        return false;
    }
    if(Number(junkVal)==0){
        document.getElementById('container').innerHTML=obStr+''+'&#x20B9; Zero Only';
        return false;
    }
    if(actnumber.length>9){
        alert('Oops!!!! the Number is too big to covertes');
        return false;
    }

    var iWords=["Zero", " One", " Two", " Three", " Four", " Five", " Six", " Seven", " Eight", " Nine"];
    var ePlace=['Ten', ' Eleven', ' Twelve', ' Thirteen', ' Fourteen', ' Fifteen', ' Sixteen', ' Seventeen', ' Eighteen', ' Nineteen'];
    var tensPlace=['dummy', ' Ten', ' Twenty', ' Thirty', ' Forty', ' Fifty', ' Sixty', ' Seventy', ' Eighty', ' Ninety' ];

    var iWordsLength=numReversed.length;
    var totalWords="";
    var inWords=new Array();
    var finalWord="";
    j=0;
    for(i=0; i<iWordsLength; i++){
        switch(i)
        {
        case 0:
            if(actnumber[i]==0 || actnumber[i+1]==1 ) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            inWords[j]=inWords[j]+' Only';
            break;
        case 1:
            tens_complication();
            break;
        case 2:
            if(actnumber[i]==0) {
                inWords[j]='';
            }
            else if(actnumber[i-1]!=0 && actnumber[i-2]!=0) {
                inWords[j]=iWords[actnumber[i]]+' Hundred and';
            }
            else {
                inWords[j]=iWords[actnumber[i]]+' Hundred';
            }
            break;
        case 3:
            if(actnumber[i]==0 || actnumber[i+1]==1) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                inWords[j]=inWords[j]+" Thousand";
            }
            break;
        case 4:
            tens_complication();
            break;
        case 5:
            if(actnumber[i]==0 || actnumber[i+1]==1) {
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            if(actnumber[i+1] != 0 || actnumber[i] > 0){
                inWords[j]=inWords[j]+" Lakh";
            }
            break;
        case 6:
            tens_complication();
            break;
        case 7:
            if(actnumber[i]==0 || actnumber[i+1]==1 ){
                inWords[j]='';
            }
            else {
                inWords[j]=iWords[actnumber[i]];
            }
            inWords[j]=inWords[j]+" Crore";
            break;
        case 8:
            tens_complication();
            break;
        default:
            break;
        }
        j++;
    }

    function tens_complication() {
        if(actnumber[i]==0) {
            inWords[j]='';
        }
        else if(actnumber[i]==1) {
            inWords[j]=ePlace[actnumber[i-1]];
        }
        else {
            inWords[j]=tensPlace[actnumber[i]];
        }
    }
    inWords.reverse();
    for(i=0; i<inWords.length; i++) {
        finalWord+=inWords[i];
    }
    document.getElementById('container').innerHTML=finalWord;
    document.form1.payment_word.value=finalWord;
}

function add_items(mode)
{  //alert(mode);
    //if (mode=='add') {
        if($dom("#percent").is(':checked')){
                   var dis_type="%";
                }else{
                   var dis_type="&#x20B9;";
                }
             $dom.ajax({
                type: "POST",
                url: "<?=base_url();?>index.php/Accounts/add_item",
                data: { 
                    mode: mode,
                    pname: $dom("#party_name").val(),
                    bill_date: $dom("#bill_date").val(),
                    bill_no: $dom("#bill_no").val(),
                    items: $dom("#items").val(),   
                    units: $dom("#units").val(),
                    quantity: $dom("#quantity").val(),
                    rate: $dom("#rate").val(),
                    amount: $dom("#amount").val(),
                    vat: $dom("#vat").val(),
                    vat_amount: $dom("#vat_amount").val(),
                    total_amount: $dom("#total_amount").val(),
                    final_total: $dom("#final_total").val(),
                    discount: $dom("#discount").val(),
                    billno: $dom("#bill_no").val(),
                    billing_date: $dom("#billing_date").val(),
                    add_type: $dom("#type").val(),
                    discount_type:dis_type
                    
                },
                success: function (data) {                        
                         $dom("#item_display").html(data) ;
                         cal_grand_total();
                         $dom("#items").val("") ;
                         $dom("#units").val("") ;
                         $dom("#quantity").val("0") ;
                         $dom("#amount").val("0")  ;
                         $dom("#vat").val("0") ;
                         $dom("#vat_amount").val("0") ;
                         $dom("#total_amount").val("0") ;
                         $dom("#final_total").val("0") ;
                         $dom("#discount").val("0");    
                         $dom("#rate").val("0") ;
                         document.form1.items.focus();
                }
         });
   // }

}
function delete_item(item_id)
{  //alert(item_id);
   
         $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/delete_item",
            data: { 
                mode: "purchase",
                item_id: item_id,
                user_id: $dom("#user_id").val(),
                add_type: $dom("#type").val(),
                
            },
            success: function (data) { //alert(data);
                     //document.form1.items.focus();
                     add_items(data);
                
            }
     });
}

function validate_date()
{  //alert(item_id);
   
         $dom.ajax({
            type: "POST",
            url: "<?=base_url();?>index.php/Accounts/check_date",
            data: { 
                mode: "purchase",
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
    var grand_total=$dom("#grand_total").val();
     if(grand_total<=0)
    {
        alert("Please add atleast one item!!!!!!!!!!!!!!!.");
        //document.form1.payment_option.focus();
        return false;
    }
    
}

</script>

</body>
</html>