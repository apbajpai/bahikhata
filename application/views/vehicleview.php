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
                                <h1 class="title">vehicles</h1>                            </div>

                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-vehicles.html">vehicles</a>
                                    </li>
                                    <li class="active">
                                        <strong>All vehicles</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">All vehicles</h2>
                                <div class="actions panel_actions float-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
                                        <table id="example-11" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th><th>Reg. ID</th><th>Owner Info</th><th>Type</th><th>Vehicle Details</th><th>Brief Desc</th><th>Seller Info</th><th>Other Info</th> <th>Action</th>                   </tr>
                                            </thead>

                                            <tbody>
                                       <?php  
                                       		$cust_data = $this->db->order_by('id', 'DESC');
                									        $cust_data = $this->db->get_where("tbl_vehicledetails",  array('user_id' => $sess_id));
                									        $i=0; 
                									        foreach ($cust_data->result() as $vehicle_details)
                                            {  $i++;?>
                                              <tr>
                                                  <td><?=$i;?></td>
                                                  <td> <b>Invoice No. # </b>(<?=$vehicle_details->id;?>)
                                                    <br/><?=$vehicle_details->reg_no;?>
                                                    <br/> <b>Reg. Date : </b><?=$vehicle_details->purchase_date;?> 
                                                    
                                                  </td>
                                                  <td><?=$vehicle_details->owner_name;?> <br/> <?=$vehicle_details->owner_address;?>
                                                    <br/> <?=$vehicle_details->owner_email;?><br/> <?=$vehicle_details->owner_mobile;?>
                                                    <br/> <?=$vehicle_details->sup_no;?> </td>
                                                  <td><?=$vehicle_details->veh_type;?><br/><?=strtoupper($vehicle_details->status);?></td>
                                                  <td>
                                                        <b>Make : </b><? if($vehicle_details->make>=1)echo $this->db->get_where('make', array('id' => $vehicle_details->make, ))->row()->title;?><br/> 
                                                        <b>Model : </b><? if($vehicle_details->model>=1)echo $this->db->get_where('model', array('id' => $vehicle_details->model, 'make_id' => $vehicle_details->make ))->row()->title;?><br/>

                                                        <b>Model Year: </b><?=$vehicle_details->model_year;?> 
                                                        <b>Engine No. : </b><?=$vehicle_details->engine_no;?><br/> 
                                                        <b>Chasis No. : </b><?=$vehicle_details->chasis_no;?> <br/> 
                                                        <b>Insu. Date. : </b> <?=$vehicle_details->insuarance_date;?><br/> 
                                                        
                                                        <b>Insu. Exp. Date. : </b> <? $exp_date = new DateTime($vehicle_details->insuarance_date);$exp_date->modify('+1 year');echo $exp_date->format('m/d/Y');?><br/> 
                                                      
                                                   </td>
                                                   <td><?=$vehicle_details->brief_desc;?><br/> 
                                                      <img class="img-fluid" src="<?=base_url()."assets/uploads/".$vehicle_details->image_path;?>" alt="<?=$vehicle_details->reg_no;?>" style="max-height:88px;">
                                                    <td>
                                                       <b>Seller Name: </b><?=$vehicle_details->seller_comp_name;?><br/> 
                                                       <b>Seller Address: </b><?=$vehicle_details->seller_comp_address;?><br/> 
                                                       <b>Manager Name: </b><?=$vehicle_details->truevalue_man_name ;?><br/> 
                                                       <b>Manager Email: </b><?=$vehicle_details->truevalue_man_email;?> <br/>
                                                       <b>Manager Mobile: </b><?=$vehicle_details->truevalue_man_mobile;?><br/>  
                                                   </td>

                                                   <td>
                                                       <b>Final Amount: </b><?=$vehicle_details->final_amount;?><br/>
                                                       <b>First Amount: </b><?=$vehicle_details->first_amount;?><br/>
                                                       <b>Advance Amount: </b><?=$vehicle_details->advance_amount;?><br/> 
                                                       <b>Second Amount: </b><?=$vehicle_details->second_amount;?><br/>
                                                       <b>Commission Amount: </b><?=$vehicle_details->commission_amount;?><br/> 
                                                       <b>GST Amount: </b><?=$this->db->get_where("tbl_temp_purchase_master",array('user_id' => $this->session->userdata('user_id'),'bill_no'=>$vehicle_details->bill_no))->row()->vat;?><br/> 
                                                       <b>Total Amount: </b><?=$vehicle_details->total_amount;?><br/> 
                                                   </td>
                                                  

                                                  </td>

                                                  <td>
                                                    <a href="<?=base_url();?>index.php/vehicleedit/custedit/<?=$vehicle_details->id;?>">
                                                      <i class="fa fa-edit"></i>
                                                    </a> |
                                                    <a href="<?=base_url();?>index.php/Accounts/payments/?pbn=<?=$vehicle_details->bill_no;?>">
                                                      <i class="fa fa-rupee"> Add Payment</i>
                                                    </a>  
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
        <script type="text/javascript" language="javascript" src="<?=base_url('assets/');?>assets/plugins/datatables/js/dataTables.min.js">
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