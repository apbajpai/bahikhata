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
           
           $sales_deatils = $this->db->get_where($table_name,array($table_name.'.user_id' => $sess_id, 'bill_no' =>$last_bill_no))->row();
            //echo $this->db->last_query();

        @extract($sales_deatils);?>
        <div class="col-sm-12">
          <address>
            
            <strong><?=$sales_deatils->party_name;?></strong>&nbsp;&nbsp;<br/>
            <b>Address:</b>  <?=($sales_deatils->party_add);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
            <b>Phone:</b>    <?=$sales_deatils->party_phone;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <b>Mobile:</b>   <?=$sales_deatils->party_mobile;?>
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
             <th><strong>Reg. Details</strong></th>
             <th><strong>Item Details</strong></th>
             <th><strong>Make-Model</strong></th>
             <th><strong>Insu. Details</strong></th>
             <th><strong>Mode of payment</strong></th>
           </tr>
         </thead/>


         <?php

         $this->db->select('*');
            $this->db->from('tbl_temp_sales_master');
            $this->db->join('tbl_vehiclesalesdetails', 'tbl_vehiclesalesdetails.reg_no = tbl_temp_sales_master.item_name');
            $this->db->where(array('tbl_temp_sales_master.user_id' => $sess_id, 'tbl_temp_sales_master.bill_no' =>$last_bill_no));

         //$sales_deatils_temp = $this->db->get_where('tbl_temp_sales_master',array('user_id' => $sess_id, 'bill_no' =>$last_bill_no))->result();
         $sales_deatils_temp = $this->db->get()->result();
         foreach ($sales_deatils_temp as $key => $value) {

          $make_id =$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->make;
          $model_id =$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->model;

        // $sales_details =    $this->db->select('*');
        //  $sales_details =    $this->db->from('tbl_temp_sales_master');
        //  $sales_details =    $this->db->join('tbl_vehiclesalesdetails', 'tbl_vehiclesalesdetails.reg_no = tbl_temp_sales_master.item_name');
        //  $sales_details =    $this->db->where(array('tbl_temp_sales_master.user_id' => $sess_id, 'tbl_temp_sales_master.bill_no' =>$last_bill_no));
           
        //  $sales_details = $this->db->get()->row(); 
    # code...

          ?>
          <tr>
            <td align="left">
              <b>Reg. No. : </b><?=$value->item_name;?><br/>   
              <b>Reg. Date :</b><?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->purchase_date;?>
            </td>
            <td align="left">
              <b>Engine No. : </b><?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->engine_no;?><br/> 
              <b>Chesis No. : </b><?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->chasis_no;?> 
            </td>
            <td align="left">
              <b>Make : </b><? if($make_id>=1)echo $this->db->get_where('make', array('id' => $make_id, ))->row()->title;?><br/>
              <b>Model : </b><? if($model_id>=1)echo $this->db->get_where('model', array('id' => $model_id, 'make_id' => $make_id ))->row()->title;?>
            </td>
            <td align="left">
              <b>Date. : </b><?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->insuarance_date;?> <br/> 
              <b>Exp. Date. : </b><? $exp_date = new DateTime($this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->insuarance_date);$exp_date->modify('+1 year');echo $exp_date->format('d-m-Y');?> 
            </td>
            <td align="right">
             <?=$value->mode_of_payment;?>&nbsp;&nbsp;&nbsp;
             <? if($value->cheque_no>0) echo "(".$value->cheque_no.")";?>
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
              <?=$value->final_amount;?><br/>
              <?=$value->advance_amount;?><br/>
              <?=$value->vat;?><br/>
              <?=$value->commission_amount;?><br/>
              <?=$value->total_amount;?>
          </td>
         </tr>
      </table> 

    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
          Total Amount (In Words) :&nbsp; <span style="color:red;"><strong><?php echo nl2br($sales_deatils->payment_word);?></strong></span>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->

       <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          
          NOTES :&nbsp; <span style="color:red;"><strong><?php echo nl2br($sales_deatils->note);?></strong></span>
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

