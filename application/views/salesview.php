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
                                <h1 class="title">Sales</h1>                            </div>

                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-vehicles.html">Sales</a>
                                    </li>
                                    <li class="active">
                                        <strong>All Sales</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">All Vehicles (Sales)</h2>
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
                                                    <th>ID</th><th>Reg. ID</th><th>Owner Info (Refer RC)</th><!-- <th>Type</th> --><th>Vehicle Details</th><th>Brief Desc</th><!-- <th>Seller Info</th> --><th>Amount Info</th><th>Buyer Info</th>                    </tr>
                                            </thead>

                                            <tbody>
                                       <?php  
                  //                      		$cust_data = $this->db->order_by('id', 'DESC');
									         // $cust_data = $this->db->get_where("tbl_vehicledetails",  array('user_id' => $sess_id, 'status' => 'own'));

            $cust_data = $this->db->select('*');
            $cust_data = $this->db->from('tbl_vehiclesalesdetails');
            $cust_data = $this->db->join('tbl_vehicledetails', 'tbl_vehicledetails.reg_no = tbl_vehiclesalesdetails.reg_no');
            $cust_data = $this->db->where(array('tbl_vehiclesalesdetails.user_id' => $sess_id));
           
         $sales_deatils_temp = $this->db->get()->result();// echo $this->db->last_query();
									        $i=0; 
									        foreach ($sales_deatils_temp as $vehicle_details)
                                            {  $i++;
                                              $buyer_details = $this->db->get_where("tbl_balancesheet_master_sales",  array('user_id' => $sess_id, 'bill_no' => $vehicle_details->bill_no))->row();
                                             ?>
                                              <tr>
                                                  <td><?=$i;?></td>
                                                  <td><b> Invoice No. # </b>(<?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->id;?>)<br/> <?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->sales_date;?><br/><?=$vehicle_details->reg_no;?>
                                                   <br/>
                                                      <img class="img-fluid" src="<?=base_url()."assets/uploads/".$vehicle_details->image_path;?>" alt="" style="max-width:120px;">
                                                  </td>
                                                  <td> <?=$vehicle_details->owner_name;?> <br/> <?=$vehicle_details->owner_address;?>
                                                  <br/> <?=$vehicle_details->owner_email;?><br/> <?=$vehicle_details->owner_mobile;?>
                                                  <br/> <?=$vehicle_details->sup_no;?> </td>
                                                  <!-- <td><?=$vehicle_details->veh_type;?><br/><?=strtoupper($vehicle_details->status);?></td> -->
                                                  <td>
                                                       <b>Make : </b><? if($vehicle_details->make>=1)echo $this->db->get_where('make', array('id' => $vehicle_details->make, ))->row()->title;?><br/> 
                                                       <b>Model : </b><? if($vehicle_details->model>=1)echo $this->db->get_where('model', array('id' => $vehicle_details->model, 'make_id' => $vehicle_details->make ))->row()->title;?><br/> 
                                                       <b>Model Year: </b><?=$vehicle_details->model_year;?> 
                                                       <b>Engine No. : </b><?=$vehicle_details->engine_no;?><br/> 
                                                       <b>Chasis No. : </b><?=$vehicle_details->chasis_no;?> <br/> 
                                                       <b>Insu. Exp. Date. : </b><?=$vehicle_details->insuarance_date;?> <br/> 
                                                       <b>Reg. Date : </b><?=$vehicle_details->purchase_date;?> <br/> 
                                                   </td>
                                                   <td><?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->brief_desc;?><br/><br/>
                                                    <strong>Purchased From:-</strong><hr/>
                                                       <b>Name:</b> <?=$vehicle_details->seller_comp_name;?><br/> 
                                                       <b>Address:</b> <?=$vehicle_details->seller_comp_address;?><br/> 
                                                       <b>Manager Name:</b> <?=$vehicle_details->truevalue_man_name ;?><br/> 
                                                       <b>Manager Email:</b> <?=$vehicle_details->truevalue_man_email;?> <br/>
                                                       <b>Manager Mobile:</b> <?=$vehicle_details->truevalue_man_mobile;?><br/> 
                                                   

                                                  <!--  <td>
                                                       Final Amount: <?=$vehicle_details->final_amount;?><br/>
                                                       Advance Amount: <?=$vehicle_details->advance_amount;?><br/> 
                                                       Commission Amount: <?=$vehicle_details->commission_amount;?><br/> 
                                                       Total Amount: <?=$vehicle_details->total_amount;?><br/> 
                                                   </td> -->
                                                  
                                                    <td align="right">
                                                       <b>Selling : </b><?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->final_amount;?><br/>
                                                       <b>Advance : </b><?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->advance_amount;?><br/> 
                                                       <b>Commission : </b><?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->commission_amount;?><br/> 
                                                       <b>Total : </b><?=$this->db->get_where("tbl_vehiclesalesdetails",array('user_id' => $this->session->userdata('user_id'),'reg_no'=>$vehicle_details->reg_no))->row()->total_amount;?><br/> 
                                                   </td>
                                                   <!-- <td>
                                                       Seller Company Name: <?=$vehicle_details->seller_comp_name;?><br/> 
                                                       Seller Company Address: <?=$vehicle_details->seller_comp_address;?><br/> 
                                                       Truevalue Man Name: <?=$vehicle_details->truevalue_man_name ;?><br/> 
                                                       Truevalue Man Email: <?=$vehicle_details->truevalue_man_email;?> <br/>
                                                       Truevalue Man Mobile: <?=$vehicle_details->truevalue_man_mobile;?><br/>  
                                                   </td>
                                                   -->

                                                  <td>

                                                    <b>Buyer Name: </b><?=$buyer_details->party_name;?><br/> 
                                                    <b>Buyer Company Address: </b><?=$buyer_details->party_add;?><br/>
                                                    <b>Buyer Mobile: </b><?=$buyer_details->party_mobile;?><br/>  
                                                    <b>Buyer Phone: </b><?=$buyer_details->party_phone;?><br/>  
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