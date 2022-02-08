<?php  include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<!-- Theme style -->
<link rel="stylesheet" href="<?=base_url('assets/');?>assets/dist/css/AdminLTE.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<?=link_tag('assets/assets/plugins/datatables/css/dataTables.min.css');?>
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
            <h1 class="title">Invoice View</h1>    </div>

            <div class="float-right">
              <ol class="breadcrumb">
                <li>
                  <button class="print-link no-print" onclick="javascript:window.history.back();"><< Back</button>
                </li>
              </ol>
            </div>


            <div class="float-right d-none">
              <ol class="breadcrumb">
                <li>
                  <a href="index.html"><i class="fa fa-home"></i>Home</a>
                </li>
                <li>
                  <a href="crm-customers.html">Customers</a>
                </li>
                <li class="active">
                  <strong>Invoice View</strong>
                </li>
              </ol>
            </div>

          </div>
        </div>
        <div class="clearfix"></div>


        

        <div class="col-lg-12">
          <section class="box ">
            <header class="panel_header">
              <h2 class="title float-left"><?=$type;?> invoice <?=$last_bill_no;?></h2>
<!-- <div class="actions panel_actions float-right">
<i class="box_toggle fa fa-chevron-down"></i>
<i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
<i class="box_close fa fa-times"></i>
</div> -->
</header>
<div class="content-body">    <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">

    <!-- Main content -->
    <section class="invoice">
       <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h6 class="page-header"> 
          
          <small class="pull-left small"> TIN/PAN/GST No. :- <?=strtoupper($company_result->tin_no);?></small>
          <center> <small>  <?=$type;?> </small> </center>
          <small class="pull-right">  <?=$company_result->comany_name;?></small>
          </h6>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row --> 
      
      <!-- title row -->
      <div class="row"> <!-- .col --><div class="col-12"><h2 class="page-header">&nbsp;</h2></div> <!-- /.col --></div>
      <!-- info row -->

      
      <div class="row invoice-info">


        <?php $table_bill_no = 'tbl_bill_no_'.strtolower($type);
           
           $salesDetails = $this->db->select($table_name.'.*', "$table_bill_no.billing_type", "$table_bill_no.gst_amount")
                                    ->select("$table_bill_no.billing_type")
                                    ->select("$table_bill_no.gst_amount")
                                    ->join($table_bill_no, "$table_bill_no.bill_no = $table_name.bill_no AND $table_bill_no.user_id = $table_name.user_id")
                                    ->get_where($table_name,array($table_name.'.user_id' => $sess_id, $table_name.'.bill_no' =>$last_bill_no))->row();
          //  echo $this->db->last_query(); echo "<pre>"; print_r($salesDetails); echo "</pre>"; die();

        @extract($salesDetails);?>
        <div class="col-sm-12 invoice-col">
          <address  class="pull-left">
            
            <span class="pull-left"><b>Bill #: </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong><?=$salesDetails->bill_no;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
            <span class="pull-left"><b>Billing Date :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?=$salesDetails->bil_date;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
            <span class="pull-left"><b>Name:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong><?=$salesDetails->party_name;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
            <span class="pull-left"><b>Address:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->party_add;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/>
            <span class="pull-left"><b>Phone:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->party_phone;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Mobile:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->party_mobile;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <? if($salesDetails->party_email!=""){?><b>Email:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->party_email;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<? }?>
            
          </span>
           </address>
            <address class="pull-right">
            <? if(strcasecmp($type,'sales' )==0){?>
            <?php if($salesDetails->pan_no!='' && $salesDetails->pan_no !=NULL){?><span class="pull-right"><b>Customer PAN:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->pan_no;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><?php }?>
            <?php if($salesDetails->pan_no!='' && $salesDetails->tin_no !=NULL){?><span class="pull-right"><b>Customer GST:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->tin_no;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br/><?php }?>
            <?php } if(strcasecmp($type,'purchase' )==0){?>
            <span class="pull-right"><b>Supplier Invoice No.:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=($salesDetails->sup_no);?></span><br/>
            <span class="pull-right"><b>Supplier PAN:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->sup_pan;?></span><br/>
            <span class="pull-right"><b>Supplier Invoice Date:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->sup_dt;?> </span><br/>
            <span class="pull-right"><b>Supplier TIN/VAT/GST:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$salesDetails->sup_tin;?></span>
            <? }?>
          </address>
        </div>
       
      </div>

      
      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->
      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->

      <div class="row">
        <div class="col-12 ">

         <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
          <thead>
            <tr>
             <th><strong>Item Name</strong></th>
             <th><strong>Unit</strong></th>
             <th style='text-align:right'><strong>Quantity</strong></th>
             <th style='text-align:right'><strong>Rate</strong></th>
             <th style='text-align:right'><strong>Discount</strong></th>
             <th style='text-align:right'><strong>Amount</strong></th>
             <th style='text-align:right'><strong>GST %</strong></th>
             <th style='text-align:right'><strong>GST Amount</strong></th>
             <th style='text-align:right'><strong>Final Amount</strong></th>
           </tr>
         </thead/>

         <tbody>
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
            <td align="right"><?=$value->discount;?>  - (<?=$value->dis_type;?>)</td>
            <td align="right"><?=$value->amount;?></td>
           <td align="right"><?=$value->vat;?></td>
          <td align="right"><?=$value->vatt;?></td>
          <td align="right"><?=$value->final_amount;?></td>
          
        </tr>
        <? }?>
      </tbody>
      <tfoot>
        <tr>
             <th><strong>Item Name</strong></th>
             <th><strong>Unit</strong></th>
             <th style='text-align:right'><strong>Quantity</strong></th>
             <th style='text-align:right'><strong>Rate</strong></th>
             <th style='text-align:right'><strong>Discount</strong></th>
             <th style='text-align:right'><strong>Amount</strong></th>
             <th style='text-align:right'><strong>GST %</strong></th>
             <th style='text-align:right'><strong>GST Amount</strong></th>
             <th style='text-align:right'><strong>Final Amount</strong></th>
           </tr>
      </tfoot>
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
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->

        <div class="row signature">
          <div class="col-12 ">
            <center>



              <address>
                <strong><?=$company_result->comany_name;?></strong> <br>&nbsp;&nbsp;|&nbsp;&nbsp;
                <?=$company_result->location;?> &nbsp;&nbsp;|&nbsp;&nbsp;
                Phone: <?=$company_result->phone;?>&nbsp;&nbsp;|&nbsp;&nbsp;
                Email: <?=$company_result->email;?>&nbsp;&nbsp;|&nbsp;&nbsp;
              </address>
            </center>       </div>
            <!-- /.col -->
          </div>
          <!-- info row -->



          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- ./wrapper -->


    </div>
  </div>
</div>
</section></div>






</section>
</section>
<!-- END CONTENT -->
<?php include "includes/footer.php";?>    



<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<script type="text/javascript" language="javascript" src="<?=base_url('assets/');?>assets/plugins/datatables/js/datatables.min.js">
</script> 
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js">
</script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js">
</script>
<script type="text/javascript" language="javascript" src="<?=base_url('assets/');?>assets/js/jQuery.print.js">
</script> <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 



<!-- CORE TEMPLATE JS - START --> 
<script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 

<!-- Sidebar Graph - START --> 
<script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 

</body>
</html>
