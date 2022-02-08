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
            
            <b>Seller Name:</b>    <strong><?=$purchases_deatils->party_name;?></strong><br>
            <b>Seller Address:</b>  <?=$purchases_deatils->party_add;?><br>
            <b>Seller Phone:</b>    <?=$purchases_deatils->party_phone;?> <br>
            <b>Seller Mobile:</b>   <?=$purchases_deatils->party_mobile;?>
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
             <th><strong>Registration Details</strong></th>
             <th><strong>Item Details</strong></th>
             <th><strong>Make Model</strong></th>
             <th><strong>Insuarence Details</strong></th>
             <th><strong>Mode Of Payment</strong></th>
             <th><strong>Final Amount</strong></th>
             <th><strong>First Amount</strong></th>
             <th><strong>Advance Amount</strong></th>
             <th><strong>GST Amount</strong></th>
             <th><strong>Commission Amount</strong></th>
             <th><strong>Total Amount</strong></th>
           </tr>
         </thead/>


         <?php

         $purchases_deatils_temp = $this->db->get_where('tbl_temp_purchase_master',array('user_id' => $sess_id, 'bill_no' =>$last_bill_no))->result();
         foreach ($purchases_deatils_temp as $key => $value) {
    # code...

          ?>
          <tr>
            <td align="left">
              Reg. Number : <?=$value->item_name;?><br/>   
              Reg. Date : <?=$purchases_deatils->purchase_date;?>
            </td>
            <td align="left">
              Engine No. : <?=$purchases_deatils->engine_no;?><br/> 
              Chasis No. : <?=$purchases_deatils->chasis_no;?> 
            </td>
            <td align="left">
              Make : <? if($purchases_deatils->make>=1)echo $this->db->get_where('make', array('id' => $purchases_deatils->make, ))->row()->title;?><br/>
              Model : <? if($purchases_deatils->model>=1)echo $this->db->get_where('model', array('id' => $purchases_deatils->model, 'make_id' => $purchases_deatils->make ))->row()->title;?>
            </td>
            <td align="left">
              Insu. Date. : <?=$purchases_deatils->insuarance_date;?> <br/> 
              Insu. Exp. Date. : <? $exp_date = new DateTime($purchases_deatils->insuarance_date);$exp_date->modify('+1 year');echo $exp_date->format('d-m-Y');?> 
            </td>
            <td align="right">
             <?=$purchases_deatils->mode_of_payment;?><br/>
             <? if($purchases_deatils->cheque_no>0) echo $purchases_deatils->cheque_no;?>
           </td>
            <td align="right">
             <?=$purchases_deatils->final_amount;?>
           </td>
           <td align="right"> 
            <?=$purchases_deatils->first_amount;?>
          </td>
          <td align="right"> 
            <?=$purchases_deatils->advance_amount;?>
          </td>
          <td align="center"> 
            <?=$value->vat;?>
          </td>
          <td align="right"> 
            <?=$purchases_deatils->commission_amount;?>
          </td>
          <td align="right"> 
            <?=$purchases_deatils->total_amount;?>
          </td>
        </tr>
        <? }?>
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
