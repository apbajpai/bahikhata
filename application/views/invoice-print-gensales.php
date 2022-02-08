<?php  include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

  <link rel="stylesheet" href="<?=base_url('assets/');?>assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <?=link_tag('assets/assets/plugins/datatables/css/dataTables.min.css');?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

 <style type="text/css" media="print">
  @page{ size: landscape; }
.signature{
    border-bottom-style:solid;
    font-size:11px;
    page-break-after:always;

    text-align: center;
    height: 25px;
    width: 100%;
    margin:0px auto;
    position:fixed;
    bottom:45px;
}
.footer { position: fixed; bottom: 0px; }
.top-left { position: fixed; top: 0px; left:0px; }
.top-right { position: fixed; top: 0px; right:0px; }
.pagenum:before { content: counter(page); }
</style>
   </head>
    <!-- END HEAD -->

<body onload="" ><!---->

<div class="wrapper" style="width:100% !important;">
  <!-- Main content -->
  <!-- Main content -->
    <section class="invoice">
       <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h6 class="page-header"> 
          
          <small class="pull-left small top-left"> TIN/PAN/GST No. :- <?=strtoupper($company_result->tin_no);?></small>
          <small class="pull-right top-right">  Print Date: <?=date('d/m/Y');?></small>
          </h6>
       
          <h2 class="page-header">
            <center><img src="<?=base_url("assets/uploads/");?><?=($company_result->logo);?>" class="rounded-circle img-inline" width="80px">
              <?=ucwords($company_result->comany_name);?></center>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
    
  
      <div class="row invoice-info">       
       <?php $table_bill_no = 'tbl_bill_no_'.strtolower($type);
           
           $salesDetails = $this->db->select($table_name.'.*', "$table_bill_no.billing_type", "$table_bill_no.gst_amount")
                                    ->select("$table_bill_no.billing_type")
                                    ->select("$table_bill_no.gst_amount")
                                    ->join($table_bill_no, "$table_bill_no.bill_no = $table_name.bill_no AND $table_bill_no.user_id = $table_name.user_id")
                                    ->get_where($table_name,array($table_name.'.user_id' => $sess_id, $table_name.'.bill_no' =>$last_bill_no))->row();
            //echo $this->db->last_query(); echo "<pre>"; print_r($salesDetails); echo "</pre>"; die();

        @extract($salesDetails);?>
        <div class="col-sm-12">
          <address>
            
            <span class="pull-left"><b><?=$type;?> Invoice #:</b> <strong><?=$salesDetails->bill_no;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
            <span class="pull-right"><b>Billing Date :</b> <?=$salesDetails->bil_date;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
            <span class="pull-left"><b>Name:</b>    <strong><?=$salesDetails->party_name;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span class="pull-right"><b>Address:</b>  <?=$salesDetails->party_add;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
            <span class="pull-left"><b>Phone:</b>    <?=$salesDetails->party_phone;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Mobile:</b>   <?=$salesDetails->party_mobile;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <? if(strcasecmp($type,'sales' )==0){?><b>PAN/TIN/VAT/GST:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?=$salesDetails->pan_no;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? }?>
          </span>

            <br/>

            <? if(strcasecmp($type,'purchase' )==0){?>
            <span class="pull-left"><b>Supplier Invoice No.:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <?=($salesDetails->sup_no);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>Supplier Invoice Date:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <?=$salesDetails->sup_dt;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>Supplier PAN:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?=$salesDetails->sup_pan;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <b>Supplier TIN/VAT/GST:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   <?=$salesDetails->sup_tin;?></span>
            <? }?>
        </div>
       
      </div>

      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->

      <div class="row">
        <div class="col-12 ">

         <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
          <thead>
            <tr>
            <th><strong>Item Name</strong></th>
             <th><strong>Unit</strong></th>
             <th style='text-align:right'><strong>Quantity.</strong></th>
             <th style='text-align:right'><strong>Rate</strong></th>
             <th style='text-align:right'><strong>Discount.</strong></th>
             <th style='text-align:right'><strong>Amount</strong></th>
             <th style='text-align:right'><strong>GST %</strong></th>
             <th style='text-align:right'><strong>GST Amount</strong></th>
             <th style='text-align:right'><strong>Final Amount</strong></th>
           </tr>
         </thead/>


         <?php

          $this->db->select('*');
          $this->db->from($table_name_temp);
          $this->db->where(array('user_id' => $sess_id, 'bill_no' =>$last_bill_no));
          $salesDetails_temp = $this->db->get()->result();$fAmount =0;
         foreach ($salesDetails_temp as $key => $value) {  $fAmount += $value->final_amount;
          ?>
          <tr>
            <td align="left"><?=$value->item_name;?></td>
            <td align="left"><?=$value->unit;?></td>
            <td align="right"><?=$value->quantity;?></td>
            <td align="right"><?=$value->rate;?></td>
            <td align="right"><?=$value->discount;?> - <?=$value->dis_type;?></td>
            <td align="right"><?=$value->amount;?></td>
            <td align="right"><?=$value->vat;?></td>
            <td align="right"><?=$value->vatt;?></td>
            <td align="right"><?=$value->final_amount;?></td>
          
        </tr>
        <? }?>
        
      </table> 

    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
         <span class="pull-right"> Discount In &#x20B9; :&nbsp; <strong style="color:red;"><?php echo ($salesDetails->final_discount);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <?php if($salesDetails->billing_type=='igst'){?>
        <!-- igst row -->
      <div class="row">
        <div class="col-12 ">
          
         <span class="pull-right"> IGST (<b><?=strtoupper($salesDetails->billing_type)?></b>)&#x20B9; :&nbsp; <strong style="color:red;"><?php echo ($salesDetails->gst_amount);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- igst row -->
    <?php }else{?>
       <!-- sgst row -->
      <div class="row">
        <div class="col-12 ">
          
         <span class="pull-right"> SGST (<b><?=strtoupper($salesDetails->billing_type)?></b>)&#x20B9; :&nbsp; <strong style="color:red;"><?php echo ($salesDetails->gst_amount)/2;?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-12 ">
          
         <span class="pull-right"> CGST (<b><?=strtoupper($salesDetails->billing_type)?></b>)&#x20B9; :&nbsp; <strong style="color:red;"><?php echo ($salesDetails->gst_amount)/2;?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- sgst row -->
    <?php }?>
       <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
         <span class="pull-right"> Grand Total <?=($fAmount!=$salesDetails->grand_total)?"(round off &#x20B9;".number_format($salesDetails->grand_total-$fAmount,2).")":"";?> &#x20B9; :&nbsp; <strong style="color:red;"><?php echo ($salesDetails->grand_total);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
  <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
          Total Amount (In Words) :&nbsp; <span style="color:red;"><strong><?php echo nl2br($salesDetails->payment_word);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
       <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
          NOTES :&nbsp; <span style="color:red;"><strong><?php echo nl2br($salesDetails->note);?></strong></span>
          <hr/>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
<? if(strcasecmp($type,'purchase' )==0){?>
 <div class="row">
      <div class="col-12 ">
        <div class="pull-right">
        For
            <address>
              <strong><?=$salesDetails->party_name;?></strong><br><br>
              
              <br>

              <strong>Authorised Signatory</strong>
              
            </address>
          </div>  
       
      <div class="pull-left">
        Received By
            <address>
              <strong><?=$company_result->comany_name;?></strong><br><br>
              <img src="<?=base_url("assets/uploads/");?><?=($company_result->auth_sign);?>" class="rounded-circle img-inline" width="80px">
              <br>

              <strong>Authorised Signatory</strong>
              
            </address>
          </div>  
                </div>
      <!-- /.col -->
    </div>
    <? }else{ ?>
     <div class="row">
      <div class="col-12 ">
        <div class="pull-right">
        For
            <address>
              <strong><?=$company_result->comany_name;?></strong><br><br>
              <img src="<?=base_url("assets/uploads/");?><?=($company_result->auth_sign);?>" class="rounded-circle img-inline" width="80px">
              <br>

              <strong>Authorised Signatory</strong>
              
            </address>
          </div>  
                </div>
      <!-- /.col -->
    </div>
    <? }$lowertype=strtolower($type); $footerText = $this->db->get_where('tbl_footer_text',array('user_id' => $salesDetails->user_id))->row()->$lowertype;
      if($footerText){?>
     <!-- info row -->

      <div class="row">
       <div class="col-12 ">
         <hr/>
           <?=($footerText)?nl2br($footerText):'';?>
          <hr/>
        </div>  
      </div>
    <?php }?>
    <div class="footer col-12 ">&nbsp;|&nbsp;<?=$type;?> &nbsp;|&nbsp;
      <span class="pagenum pull-left"><?=$salesDetails->bill_no;?></span> <span class="pull-right"><?=$salesDetails->bil_date;?></span></div>
    <div class="row signature">
     
      <div class="col-12 ">
        <center>
          <address>
            <strong><?=$company_result->comany_name;?></strong> <br>&nbsp;&nbsp;|&nbsp;&nbsp;
            <?=$company_result->location;?> &nbsp;&nbsp;|&nbsp;&nbsp;
            Phone: <?=$company_result->phone;?>&nbsp;&nbsp;|&nbsp;&nbsp;
            Email: <?=$company_result->email;?>&nbsp;&nbsp;|&nbsp;&nbsp; 
          </address>           
        </center>      
      <!-- /.col -->
    </div>
    <!-- info row -->

</div>

          <!-- /.row -->
        </section>






<?php include "includes/footer.php";?>    



<? $type="gensales"; if (isset($url) && $url!=NULL) { 
  header( "refresh:1;url=".base_url('index.php/Accounts/'.$url.'/'.$type.'/'));?>

<script  type='text/javascript'> 
                setTimeout(function () { 
                  window.location.href = '<?=base_url("index.php/Accounts/$url/$type/");?>'}, 1000); </script>
<? } else { ?>
<script  type='text/javascript'> 
                setTimeout(function () { 
                  window.location.href = '<?=base_url("index.php/Accounts/$type/");?>'}, 1000); </script>
<? }?>
    </body>
</html>
<script type="text/javascript">
  window.print();
</script>

