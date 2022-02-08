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
           
           $sales_deatils = $this->db->get_where($table_name,array($table_name.'.user_id' => $sess_id, 'bill_no' =>$last_bill_no))->row();
            //echo $this->db->last_query();

        @extract($sales_deatils);?>
        <div class="col-sm-12 invoice-col">
          <address>
            
            <b>Name:</b>    <strong><?=$sales_deatils->party_name;?></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
            <b>Address:</b>  <?=$sales_deatils->party_add;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

         $this->db->select('*');
            $this->db->from('tbl_temp_sales_master');
            $this->db->join('tbl_vehiclesalesdetails', 'tbl_vehiclesalesdetails.reg_no = tbl_temp_sales_master.item_name');
            $this->db->where(array('tbl_temp_sales_master.user_id' => $sess_id, 'tbl_temp_sales_master.bill_no' =>$last_bill_no));
           
         $sales_deatils_temp = $this->db->get()->result(); //echo $this->db->last_query();
         foreach ($sales_deatils_temp as $key => $value) {    
          $make_id =$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->make;
          $model_id =$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->model;

          ?>
          <tr>
            <td align="left">
              Reg. Number : <?=$value->item_name;?><br/>   
              Reg. Date : <?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->purchase_date;?>
            </td>
            <td align="left">
              Engine No. : <?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->engine_no;?><br/> 
              Chasis No. : <?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->chasis_no;?> 
            </td>
            <td align="left">
              Make : <? if($make_id>=1)echo $this->db->get_where('make', array('id' => $make_id, ))->row()->title;?><br/>
              Model : <? if($model_id>=1)echo $this->db->get_where('model', array('id' => $model_id, 'make_id' => $make_id ))->row()->title;?>
            </td>
            <td align="left">
              Insu. Date. : <?=$this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->insuarance_date;?> <br/> 
              Insu. Exp. Date. : <? $exp_date = new DateTime($this->db->get_where("tbl_vehicledetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$value->item_name))->row()->insuarance_date);$exp_date->modify('+1 year');echo $exp_date->format('m/d/Y');?> 
            </td>
            <td align="right">
             <?=$value->mode_of_payment;?><br/>
             <? if($value->cheque_no>0) echo $value->cheque_no;?>
           </td>
            <td align="right">
             <?=$value->final_amount;?>
           </td>
           <td align="right"> 
            <?=$value->first_amount;?>
          </td>
          <td align="right"> 
            <?=$value->advance_amount;?>
          </td>
          <td align="center"> 
            <?=$value->vat;?>
          </td>
          <td align="right"> 
            <?=$value->commission_amount;?>
          </td>
          <td align="right"> 
            <?=$value->total_amount;?>
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
