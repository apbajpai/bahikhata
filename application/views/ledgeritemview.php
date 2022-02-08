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
                                <h1 class="title">Item Wise Ledger</h1>    </div>

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
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-customers.html">Customers</a>
                                    </li>
                                    <li class="active">
                                        <strong>Item Wise Ledger All</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <?php   
                    if ($this->uri->segment('3')) {
                        $ledgerone_uname =  str_replace("-", " ", $this->uri->segment('3'));
                     } 
                     

                    if (!isset($ledgerone_uname)) { $arrayName = array('user_id' => $sess_id); }else{ $arrayName = array('user_id' => $sess_id, 'item' => $ledgerone_uname);}

                             $this->db->select("item");
                             $this->db->distinct();
                             $this->db->where($arrayName);
                             $this->db->order_by('item', 'ASC');
                             $data_party = $this->db->get('tbl_item_ledger');

                                            foreach ($data_party->result() as $party_details)
                                            {  
                                                $uname = $party_details->item;?>

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
                                                    <th>ID</th><th>Name</th><th>Invoice No</th><th>Date</th><th>Type</th><th style="text-align:right;">Purchased</th><th style="text-align:right;">Sale</th><th style="text-align:right;">Balance</th>      </tr>
                                            </thead>

                                            <tbody>
                                       <?php             

                                            
                                            
                                            
                                       		
                                            $cust_data = $this->db->order_by('id', 'ASC');  $cust_data = $this->db->get_where("tbl_item_ledger",   array('user_id' => $sess_id, 'item' => $uname));
									        $i=0; $balance=0;$total_output = 0;$total_input = 0;$bal=0;
									        foreach ($cust_data->result() as $customer_details)
                                            {  $i++; 
                                                $balance = $balance+($customer_details->input - $customer_details->output);
                                                
                                                $total_output = $total_output+(intval($customer_details->output));
                                                $total_input = $total_input+(intval($customer_details->input));
                                                //if ($balance<0) {$bal = abs($balance)." CR";} else {$bal = abs($balance)." DR";}
                                                ?>
                                              <tr>
                                                  <td><?=$i;?></td><td><?=$customer_details->pname;?> </td><td><?=$customer_details->ref;?></td><td><?=$customer_details->dat;?></td><td><?=$customer_details->type;?></td><td style="text-align:right;"><?=$customer_details->input;?></td><td style="text-align:right;"><?=$customer_details->output;?> </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>; text-align:right;"><?=number_format(floatval($balance),2); ?></td>
                                              </tr>
                                              <? }
                                              //echo $this->db->last_query();
                                              ?> 
                                             
                                             </tbody>
                                             <tfoot> <tr>
                                                  <td colspan="4"  style="text-align:right;"> Total</td><td style="text-align:right;"><?=number_format(floatval($total_input),2);?></td><td style="text-align:right;"><?=number_format(floatval($total_output),2);?> </td> <td style="color:<? if($balance>0) echo "red";else echo "blue";?>;  text-align:right;"><?=number_format(floatval($balance),2); ?> </td>
                                              </tr></tfoot>
                                        </table>
                                        <!-- ********************************************** -->




                                    </div>
                                </div>
                            </div>
                        </section></div>
                        <? }?>





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