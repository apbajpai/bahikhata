<?php include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        
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
                                <h1 class="title">Ledger</h1>    </div>

                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-customers.html">Customers</a>
                                    </li>
                                    <li class="active">
                                        <strong>Ledger All</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <?php    
                    if ($pptype=='bank') {
                        if ($this->uri->segment('3')) {
                        $ledgerone_uname =  str_replace("-", " ", $this->uri->segment('3'));
                     } 
                       //$ledgerone_uname = $this->uri->segment('3'); 

                            if (!isset($ledgerone_uname)) { $arrayName = array('tbl_bankdetails.user_id' => $sess_id, 'bank_name <> ' =>''  ); }else{ $arrayName = array('tbl_bankdetails.user_id' => $sess_id, 'bank_name' => $ledgerone_uname);}
                                    $this->db->select("bank_name");
                                    $this->db->distinct();
                                    $this->db->from('tbl_bankdetails');
                                    $this->db->where($arrayName);
                                    $this->db->join($table_name, $table_name.'.type = tbl_bankdetails.bank_name');
                                    $this->db->order_by('bank_name', 'ASC');
                                    $data_party = $this->db->get();

                                                    foreach ($data_party->result() as $party_details)
                                                    {  
                                                        $uname = $party_details->bank_name;?>

                            <div class="col-lg-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title float-left"><?=$uname;?></h2>
                                        <!-- <div class="actions panel_actions float-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                            <i class="box_close fa fa-times"></i>
                                        </div> -->
                                    </header>
                                    <div class="content-body">    <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">



                                                <!-- ********************************************** -->
                                                <table id="<? if(isset($ledgerone_uname)){echo "example";}else{ echo $uname;}?>" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th><th>Name</th><th>Invoice No</th><th>Date</th><th>Type</th><th style="text-align:right;">Dr</th><th style="text-align:right;">Cr</th><th style="text-align:right;">Balance</th>      </tr>
                                                    </thead>

                                                    <tbody>
                                               <?php             

                                                    
                                                    
                                                    
                                                    
                                                    $bank_data = $this->db->order_by('id', 'ASC');  $bank_data = $this->db->get_where("$table_name",   array('user_id' => $sess_id, 'type' => $uname));
                                                    $i=0; $balance=0;$total_cr = 0;
                                                    foreach ($bank_data->result() as $bank_ledger_details)
                                                    {  $i++; 
                                                        $balance = $balance+(intval($bank_ledger_details->dr) - intval($bank_ledger_details->cr));
                                                        if ($balance<0) {$bal = abs($balance)." CR";} else {$bal = abs($balance)." DR";}
                                                        $total_cr = $total_cr+(intval($bank_ledger_details->cr));
                                                        //if ($balance<0) {$bal = abs($balance)." CR";} else {$bal = abs($balance)." DR";}
                                                        ?>
                                                      <tr>
                                                          <td><?=$i;?></td><td><?=$bank_ledger_details->pname;?> </td><td><?=$bank_ledger_details->ref;?> </td><td><?=$bank_ledger_details->dat;?></td><td><?=$bank_ledger_details->ptype;?></td><td style="text-align:right;"><?=$bank_ledger_details->dr;?></td><td style="text-align:right;"><?=$bank_ledger_details->cr;?> </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>; text-align:right;"><?=$bal;?> </td>
                                                      </tr>
                                                      <? }
                                                      //echo $this->db->last_query();
                                                      ?> 
                                                     
                                                     </tbody>
                                                     <tfoot> <tr>
                                                          <td colspan="5"  style="text-align:right;"> Total</td><td style="text-align:right;"><?=$bank_ledger_details->dr;?></td><td style="text-align:right;"><?=number_format(floatval($total_cr),2);?> </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>;  text-align:right;"><?=number_format(floatval($bal),2);
                                                          if ($balance<0) {echo " CR";} else {echo " DR";}?> </td>
                                                      </tr></tfoot>
                                                </table>
                                                <!-- ********************************************** -->




                                            </div>
                                        </div>
                                    </div>
                                </section></div>
                                <? }
                    } else {
                        ?>

                            <div class="col-lg-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title float-left">Cash Book</h2>
                                        <!-- <div class="actions panel_actions float-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                            <i class="box_close fa fa-times"></i>
                                        </div> -->
                                    </header>
                                    <div class="content-body">    <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">



                                                <!-- ********************************************** -->
                                                <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th><th>Name</th><th>Invoice No</th><th>date</th><th>type</th><th style="text-align:right;">dr</th><th style="text-align:right;">cr</th><th style="text-align:right;">Balance</th>      </tr>
                                                    </thead>

                                                    <tbody>
                                               <?php             

                                                    
                                                    
                                                    
                                                    
                                                    $cash_data = $this->db->order_by('id', 'ASC');  
                                                    $cash_data = $this->db->get_where($table_name,   array('user_id' => $sess_id));
                                                    $i=0; $balance=0;$total_cr = 0;
                                                    //print_r($cash_data->result_array());echo $this->db->last_query();

                                                    foreach ($cash_data->result() as $cash_ledger_details)
                                                    {  $i++; 
                                                        $balance = $balance+(intval($cash_ledger_details->dr) - intval($cash_ledger_details->cr));
                                                        if ($balance<0) {$bal = abs($balance)." CR";} else {$bal = abs($balance)." DR";}
                                                        $total_cr = $total_cr+(intval($cash_ledger_details->cr));
                                                        //if ($balance<0) {$bal = abs($balance)." CR";} else {$bal = abs($balance)." DR";}
                                                        ?>
                                                      <tr>
                                                          <td><?=$i;?></td><td><?=$cash_ledger_details->pname;?> </td><td><?=$cash_ledger_details->ref;?> </td><td><?=$cash_ledger_details->dat;?></td><td><?=$cash_ledger_details->ptype;?></td><td style="text-align:right;"><?=$cash_ledger_details->dr;?></td><td style="text-align:right;"><?=$cash_ledger_details->cr;?> </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>; text-align:right;"><?=$bal;?> </td>
                                                      </tr>
                                                      <? }
                                                      //echo $this->db->last_query();
                                                      ?> 
                                                     
                                                     </tbody>
                                                     <?php if( count($cash_data->result())>0){?>
                                                         <tfoot> <tr>
                                                              <td colspan="5"  style="text-align:right;"> Total</td><td style="text-align:right;"><?=$cash_ledger_details->dr;?></td><td style="text-align:right;"><?=number_format(floatval($total_cr),2);?> </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>;  text-align:right;"><?=number_format(floatval($bal),2);
                                                              if ($balance<0) {echo " CR";} else {echo " DR";}?> </td>
                                                          </tr></tfoot>
                                                      <?php }?>
                                                </table>
                                                <!-- ********************************************** -->




                                            </div>
                                        </div>
                                    </div>
                                </section></div>
                                <?     
                            }
                    
                     ?>





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
<script >
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrt',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
    //     aLengthMenu: [
    //     [25, 50, 100, 200, "All"]
    // ],
    iDisplayLength: -1
    } );
} );</script>