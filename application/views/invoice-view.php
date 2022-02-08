<?php  include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url('assets/');?>assets/bower_components/font-awesome/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="<?=base_url('assets/');?>assets/bower_components/Ionicons/css/ionicons.min.css">
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
      <? if ($type=='receipt') {?>
      <div class="row invoice-info">


        <? $receipt_deatils = $this->db->get_where($table_name,array('user_id' => $sess_id, 'party_code' =>$last_bill_no))->row();
        @extract($receipt_deatils);?>
        <div class="col-sm-4 invoice-col">
          RECEIVED with thanks from:
          <address>
            <strong><?=$receipt_deatils->party_name;?></strong><br>
            <?=$receipt_deatils->party_add;?><br>
            Phone: <?=$receipt_deatils->party_phone;?> <br>
            Mobile: <?=$receipt_deatils->party_mobile;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Receipt Invoice # <?=$receipt_deatils->party_code;?></b><br>

          <b>Payment Due:</b> <?=$receipt_deatils->bill_date;?><br>
          <b>On Account of:</b> <?=$receipt_deatils->under_account;?>
        </div>
        <!-- /.col -->
      </div>

      <? } elseif($type=='payment' || $type=='payments'){ ?>
      <div class="row invoice-info">


        <? $receipt_deatils = $this->db->get_where($table_name,array('user_id' => $sess_id, 'party_code' =>$last_bill_no))->row();
        @extract($receipt_deatils);?>
        <div class="col-sm-4 invoice-col">

          <address>
            Party Name: <strong><?=$receipt_deatils->party_name;?></strong><br>
            Address: <strong><?=$receipt_deatils->party_add;?></strong><br>
            Phone: <?=$receipt_deatils->party_phone;?> <br>
            Mobile: <?=$receipt_deatils->party_mobile;?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b> Payment Invoice # <?=$receipt_deatils->party_code;?></b><br>

          <b>Invoice Date:</b> <?=$receipt_deatils->bill_date;?><br>
          <b>On Account of:</b> <?=$receipt_deatils->under_account;?>
        </div>
        <!-- /.col -->
      </div>
      <? }?>
      <!-- /.row -->


      <div class="row">
        <div class="col-12 ">

          <?php if(isset($receipt_deatils->payment_option) && $receipt_deatils->payment_option=='Cash') {?>
          <p>Please Credit our account by sum of <strong><?php echo $receipt_deatils->payment_option;?></strong>&nbsp;&nbsp;Date:&nbsp;&nbsp;<strong><?php echo $receipt_deatils->dates;?></strong>&nbsp;&nbsp;of&nbsp;&nbsp;&nbsp;&nbsp; &#x20B9;.&nbsp;&nbsp; <strong><?php echo $receipt_deatils->amount;?>/-</strong>&nbsp;&nbsp; (&nbsp;&nbsp;&#x20B9; <strong><?php echo $receipt_deatils->payment_word;?></strong>&nbsp;&nbsp;)&nbsp;&nbsp;</p>

          <?php }else{ ?>
          <p><strong>Vide <?php echo $receipt_deatils->payment_option;?> </strong>No<strong>:&nbsp;<?php echo $receipt_deatils->cheque_dd?> <?php echo $receipt_deatils->cc_dc?> <?php echo $receipt_deatils->reff_netbanking?> </strong>&nbsp;&nbsp;Date:&nbsp;&nbsp;<strong><?php echo $receipt_deatils->dates;?></strong>&nbsp;&nbsp;of&nbsp;&nbsp;<strong><?php echo $receipt_deatils->bank;?></strong> ,&nbsp;<strong><?php echo $receipt_deatils->branch;?></strong>&nbsp;&nbsp; &#x20B9;.&nbsp;&nbsp;<strong><?php echo $receipt_deatils->amount;?>/-</strong>&nbsp;&nbsp; (&#x20B9;<strong><?php echo $receipt_deatils->payment_word;?></strong> )&nbsp;&nbsp;</p>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row">
        <div class="col-12 ">
          <?php }?>

          NOTES :&nbsp; <span style="color:red;"><strong><?php echo nl2br($receipt_deatils->particulars);?></strong></span>
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
