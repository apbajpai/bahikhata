<?php  include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 

  <link rel="stylesheet" href="<?=base_url('assets/');?>assets/dist/css/AdminLTE.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <?=link_tag('assets/assets/plugins/datatables/css/dataTables.min.css');?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

 <style type="text/css">
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
.pagenum:before { content: counter(page); }
</style>
   </head>
    <!-- END HEAD -->

<body onload="window.print();" ><!---->

<div class="wrapper" style="width:100% !important;">
  <!-- Main content -->
  <!-- Main content -->
    <section class="invoice">
       <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h6 class="page-header"> 
          
          <small class="pull-left small"> TIN/PAN/GST No. :- <?=strtoupper($company_result->tin_no);?></small>
          <small class="pull-right">  Print Date: <?=date('d/m/Y');?></small>
          </h6>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row --> 
       <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <center><img src="<?=base_url("assets/uploads/");?><?=($company_result->logo);?>" class="rounded-circle img-inline" width="80px">
              <?=ucwords($company_result->comany_name);?></center>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
    
   <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
             &nbsp;
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      
      <div class="row invoice-info">


        <? 
            $this->db->select('*');
            $this->db->from($table_name);
            $this->db->join('tbl_vehicledetails', 'tbl_vehicledetails.bill_no = '.$table_name.'.bill_no');
            $this->db->where(array($table_name.'.user_id' => $sess_id, 'party_code' =>$last_bill_no));
            
            $purchases_deatils = $this->db->get()->row();
            //echo $this->db->last_query();

        @extract($purchases_deatils);?>
        <div class="col-sm-4 invoice-col">
          <address>
            
            <strong><?=$purchases_deatils->party_name;?></strong><br>
            <b>Address:</b>  <?=$purchases_deatils->party_add;?><br>
            <b>Phone:</b>    <?=$purchases_deatils->party_phone;?> <br>
            <b>Mobile:</b>   <?=$purchases_deatils->party_mobile;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Purchase Invoice # <?=$purchases_deatils->party_code;?></b><br>
          <b>Purchase Date:</b> <?=$purchases_deatils->bil_date;?><br>
          <b>Truevalue Man Name:</b>     <?=$purchases_deatils->truevalue_man_name ;?><br/> 
          <b>Truevalue Man Email:</b>    <?=$purchases_deatils->truevalue_man_email;?> <br/>
          <b>Truevalue Man Mobile:</b>   <?=$purchases_deatils->truevalue_man_mobile;?><br/>  
        </div>
        <!-- /.col -->

         <!-- /.col -->
        <div class="col-sm-4 invoice-col">

           <b>Owner Name:</b>    <?=$purchases_deatils->owner_name;?> <br/> 
           <b>Owner Address:</b>    <?=$purchases_deatils->owner_address;?><br/> 
           <b>Owner Email:</b>    <?=$purchases_deatils->owner_email;?><br/> 
           <b>Owner Mobile:</b>    <?=$purchases_deatils->owner_mobile;?><br/> 
           <b>Owner Pan / Aadhar:</b>    <?=$purchases_deatils->sup_no;?> 
           
        </div>
        <!-- /.col -->
      </div>

      
      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->
      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->
      <!-- /.row --><div class="row"><div class="col-12">&nbsp;</div></div><!-- info row -->

      <div class="row">
        <div class="col-12 ">

         <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
          <thead>
            <tr>
             <th><strong>Reg. Details</strong></th>
             <th><strong>Item Details</strong></th>
             <th><strong>Make-Model</strong></th>
             <th><strong>Insu. Details</strong></th>
             <th><strong>Mode of payment</strong></th>
           </tr>
         </thead/>


         <?php

         $purchases_deatils_temp = $this->db->get_where('tbl_temp_purchase_master',array('user_id' => $sess_id, 'bill_no' =>$last_bill_no))->result();
         foreach ($purchases_deatils_temp as $key => $value) {
    # code...

          ?>
          <tr>
            <td align="left">
              <b>Reg. No. : </b><?=$value->item_name;?><br/>   
              <b>Reg. Date : </b><?=$purchases_deatils->purchase_date;?>
            </td>
            <td align="left">
              <b>Engine No. : </b><?=$purchases_deatils->engine_no;?><br/> 
              <b>Chesis No. : </b><?=$purchases_deatils->chasis_no;?> 
            </td>
            <td align="left">
              <b>Make : </b><? if($purchases_deatils->make>=1)echo $this->db->get_where('make', array('id' => $purchases_deatils->make, ))->row()->title;?><br/>
              <b>Model : </b><? if($purchases_deatils->model>=1)echo $this->db->get_where('model', array('id' => $purchases_deatils->model, 'make_id' => $purchases_deatils->make ))->row()->title;?>
            </td>
            <td align="left">
              <b>Date. : </b><?=$purchases_deatils->insuarance_date;?> <br/> 
              <b>Exp. Date. : </b><? $exp_date = new DateTime($purchases_deatils->insuarance_date);$exp_date->modify('+1 year');echo $exp_date->format('d-m-Y');?> 
            </td>
            <td align="right">
             <?=$purchases_deatils->mode_of_payment;?>&nbsp;&nbsp;&nbsp;
             <? if($purchases_deatils->cheque_no>0) echo "(".$purchases_deatils->cheque_no.")";?>
           </td>
           
         
        </tr>
        <!-- <tr><td colspan="5">&nbsp;</td></tr> -->
        <? }?>
        <tr style="border-bottom:none;">
          <td colspan="2">&nbsp;</td>
          <td colspan="2" align="right">        
              Final Amount:<br/>
              Advance Amount:<br/>
              GST Amount:<br/>
              Commission to Seller:<br/>
              Total Amount:   
          </td>
          <td align="right"> 
              <?=$purchases_deatils->final_amount;?><br/>
              <?=$purchases_deatils->advance_amount;?><br/>
              <?=$value->vat;?><br/>
              <?=$purchases_deatils->commission_amount;?><br/>
              <?=$purchases_deatils->total_amount;?>
          </td>
         </tr>
      </table> 

    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
          Total Amount (In Words) :&nbsp; <span style="color:red;"><strong><?php echo nl2br($purchases_deatils->payment_word);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

       <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
          NOTES :&nbsp; <span style="color:red;"><strong><?php echo nl2br($purchases_deatils->note);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
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
          </div>        </div>
      <!-- /.col -->
    </div>
     <!-- info row -->
    <div class="footer">Page: <span class="pagenum"></span></div>
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



<? if (isset($url) && $url!=NULL) { 
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

