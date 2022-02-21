<section id="main-content" class="">
    <section class="wrapper main-wrapper" style="">

        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div class="page-title">

                <div class="float-left">
                    <h1 class="title">Purchase </h1>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <form action="<?= base_url('accounts/general_purchase_add') ?>" name="form1" onsubmit="javascript: return ValidateData(this);" method="post" accept-charset="utf-8">
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

                                        <label class="form-label" for="field-2">Bill no.<b>
                                            <img src="<?= base_url('public/assets') ?>/assets/images/st.gif" alt=""></b>
                                        </label>

                                        <div class="controls">
                                            <input type="text" value="<?=(int)($last_bill_details->bill_no+1);?>" 
                                            class="form-control" id="bill_no" readonly="" name="bill_no">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Date <b>
                                            <img src="<?= base_url('public/assets') ?>//assets/images/st.gif" alt=""></b>
                                        </label>
                                        <span class="desc">mm/dd/yyyy</span>
                                        <div class="controls">
                                            <input type="text" value="<?= $last_bill_details->bill_date; ?>" class="form-control  datepicker" 
                                            data-start-date="<?=$last_bill_details->entry_bill_date_limit;?>" data-end-date="+1y" id="bill_date" placeholder="" 
                                            name="bill_date" onblur="javascript: validate_date();">
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
                                        <label class="form-label" for="field-1">Name<b>
                                            <img src="<?= base_url('public/assets') ?>/assets/images/st.gif" alt=""></b>
                                        </label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                            <input type="text" class="typeahead form-control tt-hint" onblur="showdata(this.value);" autocomplete="off" readonly="" spellcheck="false" tabindex="-1" style="position: absolute; top: 0px; left: 0px; border-color: transparent; box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);">
                                            <input type="text" id="party_name" class="typeahead form-control tt-input" 
                                            name="party_name" required="" onblur="showdata(this.value);" autocomplete="off" 
                                            spellcheck="false" dir="auto" style="position: relative; vertical-align: top; background-color: transparent;">
                                                <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: capitalize;"></pre><span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
                                                    <div class="tt-dataset-string-randomizer"></div>
                                                </span>
                                            </span>
                                            <ul class="dropdown-menu txtcountry" style="position:absolute;" role="menu" aria-labelledby="dropdownMenu" id="DropdownCountry"></ul>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="field-6">Address<b><img src="<?= base_url('public/assets') ?>/assets/images/st.gif" alt=""></b>
                                        </label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="party_add" 
                                            name="party_add" style="overflow: hidden; overflow-wrap: break-word; 
                                            resize: none; height: 62px;"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Phone</label>
                                        <span class="desc">e.g. "+91 99999-99999" "(+91) 62522-34318"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="party_phone" 
                                            data-mask="(+99) 99999-99999" placeholder="(+91) 99999-99999 / (+91) 62522-34318" 
                                            name="party_phone">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Mobile</label>
                                        <span class="desc">e.g. "+99 99999-99999"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control daterange" id="party_mobile" 
                                            data-mask="(+99) 99999-99999" placeholder="(+91) 99999-99999" name="party_mobile">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-2">Email</label>
                                        <span class="desc">e.g. "aaaaaaaaaaa@aaaaaa.aaaaaaa"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control daterange" id="party_email" 
                                            data-mask="email" placeholder="aaaaaaaaaaa@aaaaaa.aaaaaaa" name="party_email">
                                        </div>
                                    </div>



                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-2">Supplier Invoice No. :</label>
                                        <span class="desc">e.g. "Supplier Invoice No."</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="sup_no" 
                                            placeholder="Supplier Invoice No" name="sup_no" required="">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-2">Supplier Invoice Date:</label>
                                        <span class="desc">e.g. "mm/dd/yyyy"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control datepicker" id="sup_dt" 
                                            placeholder="sup date" name="sup_dt" required="">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-2">PAN</label>
                                        <span class="desc">e.g. "XXXXX1234X"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="sup_pan" 
                                            data-mask="AAAAA9999A" placeholder="PAN" name="sup_pan">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-2" id="gst_label">GST</label>
                                        <span class="desc">e.g. "GST"</span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="tin_no" placeholder="GST" 
                                            name="tin_no">
                                        </div>
                                    </div>




                                </div>

                            </div>


                        </div>
                    </div>
                </section>
            </div>
            <input type="hidden" id="add_item_page" value="<?php echo base_url('accounts/add_item'); ?>">
            <input type="hidden" id="grand_total_page" value="<?php echo base_url('accounts/cal_grand_total'); ?>">
            <input type="hidden" id="delete_item_page" value="<?php echo base_url('accounts/delete_item'); ?>">
            <input type="hidden" id="check_date_page" value="<?php echo base_url('accounts/check_date'); ?>">
            <input type="hidden" id="party_call_url" value="<?php echo base_url('accounts/check_party_exist'); ?>">
            <input type="hidden" id="get_item_url" value="<?php echo base_url('accounts/get_items'); ?>">
            <input type="hidden" id="get_unit_url" value="<?php echo base_url('accounts/get_units'); ?>">
            <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

            <input type="hidden" id="get_customer_details" value="<?php echo base_url('accounts/get_customer_details'); ?>">

            <input type="hidden" id="mode" value="Purchase">
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
                                        <label class="form-label" for="field-2">Item Name<b>
                                            <img src="<?= base_url('public/assets') ?>/assets/images/st.gif" alt=""></b>
                                        </label>
                                        <span class="desc">Purchased Item Name</span>
                                        <div class="controls">
                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                            <input type="text" value="" class="form-control typeahead tt-hint" autocomplete="off" readonly="" 
                                            spellcheck="false" tabindex="-1" style="position: absolute; top: 0px; left: 0px; border-color: transparent; 
                                            box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);">
                                            <input type="text" value="" class="form-control typeahead tt-input" id="items" placeholder="Item Name" 
                                            name="items" autocomplete="off" spellcheck="false" dir="auto" 
                                            style="position: relative; vertical-align: top; background-color: transparent;">
                                                <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: 
                                                &quot;Open Sans&quot;, Arial, Helvetica, sans-serif; font-size: 16px; font-style: normal; 
                                                font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; 
                                                text-rendering: auto; text-transform: capitalize;"></pre><span class="tt-dropdown-menu" 
                                                style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
                                                    <div class="tt-dataset-string-randomizer"></div>
                                                </span>
                                            </span>
                                        </div>
                                    </div>




                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Unit</label>
                                        <span class="desc">eg. KG/Metre/PCS/month/Year/Litre etc</span>
                                        <div class="controls">
                                            <span class="twitter-typeahead" style="position: relative; display: inline-block; direction: ltr;">
                                            <input type="text" value="" class="form-control typeahead tt-hint" autocomplete="off" readonly=""
                                             spellcheck="false" tabindex="-1" style="position: absolute; top: 0px; left: 0px; border-color: transparent; 
                                             box-shadow: none; opacity: 1; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);">
                                             <input type="text" value="" class="form-control typeahead tt-input" id="units" placeholder="Unit Eg PCS MONTHS YEARS KG METRE" 
                                             name="units" autocomplete="off" spellcheck="false" dir="auto" 
                                             style="position: relative; vertical-align: top; background-color: transparent;">
                                                <pre aria-hidden="true" style="position: absolute; visibility: hidden; 
                                                white-space: pre; font-family: &quot;Open Sans&quot;, 
                                                Arial, Helvetica, sans-serif; font-size: 16px; font-style: normal; 
                                                font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; 
                                                text-indent: 0px; text-rendering: auto; text-transform: capitalize;"></pre>
                                                <span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; 
                                                z-index: 100; display: none; right: auto;">
                                                    <div class="tt-dataset-string-randomizer"></div>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-label" for="field-1">Quantity</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="quantity" 
                                            placeholder="QUANTITY Eg 1 2 99 in Possitive" name="quantity" 
                                            onblur="cal_amount(),cal_total_amount();">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-6">Rate</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" id="rate" 
                                            placeholder="Rate of the item ie Cost" name="rate" onkeyup="cal_amount();" 
                                            onkeypress="cal_amount();" value="0" onblur="cal_amount();" >
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="0" class="form-control" id="amount" data-mask="" 
                                            placeholder="Amount In ₹" name="amount"  
                                            readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label" for="field-1">Discount Type</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <input name="radio" type="radio" id="INR" onselect="cal_final_amount(this.value);" onblur="cal_final_amount(this.value);" onclick="cal_final_amount(this.value);" onfocus="cal_total_amount1(),cal_final_amount(this.value);" class="skin-square-red" checked="">
                                                    <label class="icheck-label form-label" for="square-checkbox-1"> &nbsp;&nbsp;&nbsp; ₹ (in Rupee(s)) &nbsp;&nbsp;&nbsp;</label>

                                                    <input name="radio" type="radio" id="percent" onselect="cal_final_amount(this.value);" onblur="cal_final_amount(this.value);" onclick="cal_final_amount(this.value);" onfocus="cal_total_amount1(),cal_final_amount(this.value);" class="skin-square-green">
                                                    <label class="icheck-label form-label" for="square-checkbox-1">&nbsp;&nbsp;&nbsp;%&nbsp;&nbsp;&nbsp;</label>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>


                                    <div class="form-group col-md-3">

                                        <label class="form-label" for="field-1">Discount </label>
                                        <span class="desc"></span>
                                        <div class="controls">

                                            <input type="text" class="form-control" name="discount" id="discount" onblur="cal_final_amount('percent'),cal_total_amount1();" onfocus="cal_total_amount1();" onkeyup="cal_final_amount('percent');" value="0" placeholder="Possitive Numbers only">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Total Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" disabled="disabled" name="total_amount" id="total_amount" onblur="cal_total_amount1();" value="0" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1" id="gst_percent">GST (%)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="vat" id="vat" onkeypress="cal_total_amount(),show_vat_amount();" onkeyup="cal_total_amount(),show_vat_amount();" onblur="cal_total_amount(),show_vat_amount();" value="0" placeholder="Possitive Numbers only">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1" id="gst_amount_label">GST Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">

                                            <input type="text" class="form-control" name="vat_amount" id="vat_amount" value="0" readonly="readonly" placeholder="Possitive Numbers only">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="form-label" for="field-1">Final Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" name="final_total" id="final_total" value="0" readonly="">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">

                                        <button type="button" class="btn btn-purple pull-right" name="add" id="add_item" onclick="validate_item(),add_items('add')">Add</button>

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


                            <div id="item_display" class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-row">
                                    <div class="form-group col-md-12">

                                        <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Item Name</th>
                                                    <th>Qunatity</th>
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
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>


                                        </table>
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
                            <div class="col-12">



                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="field-1">Discount In ₹</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input name="final_discount" type="text" id="final_discount" onblur="cal_grand_total();" onkeypress="cal_grand_total();" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="field-1">Grand Total Amount</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" class="form-control" min="0" value="0" name="grand_total" readonly="" id="grand_total" onchange="test_skill();" onfocus="test_skill();" style="text-align:right; margin-right:2px;">
                                        </div>
                                    </div>


                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="field-1">Amount In Word</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <div id="container" class="form-control">payment amount in words</div>
                                            <input type="hidden" name="payment_word" id="payment_word" value="" onkeypress="return tabE(this,event)" class="form-control">

                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="field-6">Note: </label>
                                        <span class="desc">e.g. "Enter any size of text description here: "</span>
                                        <div class="controls">
                                            <textarea class="form-control autogrow" cols="5" id="note" name="note" onkeydown="textCounter(note,document.form1.remLen2,250)" onkeyup="textCounter(note,document.form1.remLen2,250)" onkeypress="return tabE(this,event)" style="overflow: hidden; overflow-wrap: break-word; resize: none; height: 62px;"></textarea>
                                            <center><input readonly="" type="text" name="remLen2" size="3" tabindex="100" maxlength="3" value="250" onkeypress="return tabE(this,event)"></center>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-left">
                                    <input type="hidden" value="10" id="user_id" name="user_id">
                                    <input type="hidden" value="2022/02/17 23:48:56" id="field-51" name="curdate">
                                    <input type="hidden" value="1" id="bill_no" name="last_billno">
                                    <input type="hidden" value="2022/02/17 23:48:56" id="entry_date" name="entry_date">
                                    <input type="hidden" value="2022/02/17 23:48:56" id="ch_bill_date" name="ch_bill_date">
                                    <input type="hidden" value="2" id="party_code" name="party_code">
                                    <input type="hidden" value="dr" id="blance_type" name="blance_type">
                                    <input type="hidden" value="₹" id="discount_type" name="discount_type">
                                    <input type="hidden" value="" id="tpt_name" name="tpt_name">
                                    <input type="hidden" value="Purchase" id="type" name="type">
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

