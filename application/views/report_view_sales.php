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
                                <h1 class="title"></h1>Report View    </div>

                                 <div class="float-right">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="<?=base_url();?>"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                </ol>
                            </div>


                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="<?=base_url();?>"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-customers.html">Customers</a>
                                    </li>
                                    <li class="active">
                                        <strong> Report View</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                   

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">Report view (<?=$page_name=$this->uri->segment('3');?>)</h2>
                                <!-- <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div> -->
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">



                                        <!-- ********************************************** -->
                                        <table id="<? if($this->uri->segment('3')){echo "example";}else{ echo $uname;}?>" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr> <th>Sno.</th><th>Date</th><th>Party Name</th><th>Bill No</th><th>Particulars</th><th>Type</th><th style="text-align:right;">Debit</th><th style="text-align:right;">Credit</th><th style="text-align:right;">Balance</th><th style="text-align:right;">DR/CR</th><th style="text-align:center;">Action</th><th style="text-align:center;">View</th></tr>
                                            </thead>

                                            <tbody>
                                       <?php             

                                            $i=0; $balance=0;$total_cr = 0;$bal=0;

									        foreach ($report_view_details as $customer_details)
                                            {  $i++; 
                                               if ($page_name =='genpurchases' || $page_name == 'sales' || $page_name == 'gensales') {$customer_details->amount = $customer_details->grand_total;}
                                               if ($page_name =='genpurchases' || $page_name == 'sales' || $page_name == 'gensales') {$customer_details->particulars = $customer_details->note;$customer_details->bill_date=$customer_details->bil_date;}
                                               if ($page_name =='genpurchases') {$customer_details->payment_option = "Purchases"; $customer_details->party_code=$customer_details->bill_no;}
                                               if ($page_name == 'sales') {$customer_details->payment_option = "Sales";$customer_details->party_code=$customer_details->bill_no;}
                                               if ($page_name == 'gensales') {$customer_details->payment_option = "Sales";$customer_details->party_code=$customer_details->bill_no;}
                                              
                                                $balance = $balance+(intval($customer_details->amount));
                                                if ($balance<0) {$bal = " CR";} else {$bal = " DR";}
                                                //$total_cr = $total_cr+(intval($customer_details->cr));
                                                //if ($balance<0) {$bal = abs($balance)." CR";} else {$bal = abs($balance)." DR";}
                                                ?>
                                              <tr>
                                                  <td><?=$i;?></td><td><?=$customer_details->bill_date;?></td><td><?=$customer_details->party_name;?> </td><td> Bill No. <?=$customer_details->party_code;?> </td><td><?=wordwrap($customer_details->particulars,50,"<br>\n");?></td><td><?=$customer_details->payment_option;?></td><td style="text-align:right;"><?=$customer_details->amount;?></td><td style="text-align:center;"> - </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>; text-align:right;"><?=number_format($balance,2);?> </td> <td style="text-align:right;"><?=$bal;?> </td> 
                                                  <td style="text-align:center;">
                                                    <a href="<?=base_url("index.php/accounts/report_del/".$this->uri->segment('3')."/".$customer_details->party_code);?>"><i class="fa fa-close" style="font-size:20px;color:red;"></a></i>

                                                </td>
                                                  <td>
                                                    <a href="<?=base_url("index.php/accounts/invoice_view_sales/".$this->uri->segment('3')."/".$customer_details->party_code);?>"><i class="fa fa-eye" aria-hidden="true" style="font-size:20px;color:blue;"></i></a>&nbsp;&nbsp;/&nbsp;&nbsp;
                                                    <a href="<?=base_url("index.php/accounts/invoice_print_sales_dup/".$this->uri->segment('3')."/".$customer_details->party_code);?>"><i class="fa fa-print" aria-hidden="true"></i></a>

                                                  </td>
                                              </tr>
                                              <? }?> 

                                             </tbody>                                             
                                        </table>
                                        <!-- ********************************************** -->

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
   
<script >
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrt',
        buttons: [
             'csv', 'excel', 'pdf', 'print'
        ],
    
    iDisplayLength: -1
    } );
} );</script> </body>
</html>