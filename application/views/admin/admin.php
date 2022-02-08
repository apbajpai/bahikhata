<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>
        <div class='col-xl-12 col-lg-12 col-md-12 col-12'>
            <div class="page-title">
                <div class="float-left">
                    <h1 class="title">CRM</h1>                            </div>
                <div class="float-right d-none">
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i>Home</a>
                        </li>
                        <li>
                            <a href="general.html">Multi Purpose</a>
                        </li>
                        <li class="active">
                            <strong>CRM Admin</strong>
                        </li>
                    </ol>
                </div>

            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xl-12">
            <section class="box nobox">
                <div class="content-body">
                    <div class="row">
                      <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-thumbs-up icon-md icon-rounded icon-success'></i>
                                <div class="stats">
                                  <?  $comp_data_sales = $this->db->select('*, sum(finaltotal) as amount');
                                      $comp_data_sales = $this->db->get_where("tbl_bill_no_sales", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data_sales->row()->amount;?></strong></h4>

                                    <span>Sales (<?=$this->db->get_where("tbl_bill_no_sales", array('user_id'=> $sess_id))->num_rows();?>)</span>
                                </div>
                            </div>
                        </div>
                      <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-thumbs-down icon-md icon-rounded icon-orange'></i>
                                <div class="stats">
                                  <?  $comp_data_purchase = $this->db->select('*, sum(finaltotal) as amount');
                                      $comp_data_purchase = $this->db->get_where("tbl_bill_no_purchase", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data_purchase->row()->amount;?></strong></h4>

                                    <span>Purchase (<?=$this->db->get_where("tbl_bill_no_purchase", array('user_id'=> $sess_id))->num_rows();?>)</span>
                                </div>
                            </div>
                        </div>
                      <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-thumbs-up icon-md icon-rounded icon-success'></i>
                                <div class="stats">
                                  <?  $comp_data_receipt = $this->db->select('*, sum(finaltotal) as amount');
                                      $comp_data_receipt = $this->db->get_where("tbl_bill_no_receipt", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data_receipt->row()->amount;?></strong></h4>

                                    <span>Receipt (<?=$this->db->get_where("tbl_bill_no_receipt", array('user_id'=> $sess_id))->num_rows();?>)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-thumbs-down icon-md icon-rounded icon-orange'></i>
                                <div class="stats">
                                  <?  $comp_data_payment = $this->db->select('*, sum(finaltotal) as amount');
                                      $comp_data_payment = $this->db->get_where("tbl_bill_no_payment", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data_payment->row()->amount;?></strong></h4>

                                    <span>Payment (<?=$this->db->get_where("tbl_bill_no_payment", array('user_id'=> $sess_id))->num_rows();?>)</span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-md-6 col-12" <? if ( $this->session->userdata('user_id')=='1')  {   if (strcasecmp($this->session->userdata('user_type'),'Admin' )!=0) { echo "style='display:none;'"; } }else{ echo "style='display:none;'"; } ?>>
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-shopping-cart icon-md icon-rounded icon-orange'></i>
                                <div class="stats">
                                    <? $comp_data = $this->db->order_by('id', 'DESC');
                                      $comp_data = $this->db->get_where("tbl_vehicledetails", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data->num_rows();;?></strong></h4>
                                    <span>Vehicles Purchased</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12" <? if ( $this->session->userdata('user_id')=='1')  {   if (strcasecmp($this->session->userdata('user_type'),'Admin' )!=0) { echo "style='display:none;'"; } }else{ echo "style='display:none;'"; } ?>>
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-rupee icon-md icon-rounded icon-success'></i>
                                <div class="stats">
                                    <? $comp_data = $this->db->order_by('id', 'DESC');
                                      $comp_data = $this->db->get_where("tbl_vehicledetails", array('user_id'=> $sess_id, 'status' => 'sell'));?>
                                    <h4><strong><?=$comp_data->num_rows();;?></strong></h4>
                                    <span>Vehicle Sold </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12" <? if ( $this->session->userdata('user_id')=='1')  {   if (strcasecmp($this->session->userdata('user_type'),'Admin' )!=0) { echo "style='display:none;'"; } }else{ echo "style='display:none;'"; } ?>>
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-thumbs-up icon-md icon-rounded icon-warning'></i>
                                <div class="stats">
                                    <? $comp_data = $this->db->order_by('id', 'DESC');
                                        $comp_data = $this->db->get_where("tbl_vehicledetails",  array('status' => 'own' ));?>
                                    <h4><strong><?=$comp_data->num_rows();;?></strong></h4>
                                    <span>Vehicles Not Sold</span>
                                </div>
                            </div>
                        </div>

                         <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-dollar icon-md icon-rounded icon-warning'></i>
                                <div class="stats"><? $comp_data = $this->db->order_by('id', 'DESC');
                                    $comp_data = $this->db->get_where("tbl_bankdetails", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data->num_rows();?></strong></h4>

                                    <span>Bank(s)</span>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-users icon-md icon-rounded icon-primary'></i>
                                <div class="stats"><? $comp_data = $this->db->order_by('id', 'DESC');
                                    $comp_data = $this->db->get_where("tbl_customerdetails", array('user_id'=> $sess_id));?>
                                    <h4><strong><?=$comp_data->num_rows();?></strong></h4>

                                    <span>Customer(s)</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <div class="r4_counter db_box">
                                <i class='float-left fa fa-users icon-md icon-rounded icon-success'></i>
                                <div class="stats">
                                    <? echo "<b>User Type: </b>".$this->session->userdata('user_type');?><br/>
                                    <? echo "<b>User Name: </b>".$this->session->userdata('username');?><br/>
                                    <span><? echo "<b>Company Id: </b>".$this->session->userdata('user_id');?></span>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End .row -->  
                </div>
            </section></div>
        <div class="row margin-0">
            <div class="col-xl-12" <? if ( $this->session->userdata('user_id')=='1')  {   if (strcasecmp($this->session->userdata('user_type'),'Admin' )!=0) { echo "style='display:none;'"; } }else{ echo "style='display:none;'"; } ?>>
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Vehcle Added</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                    <tr>
                                        <th>ID</th><th>Reg. ID</th><th>Owner Info</th><th>Type</th><th>Vehicle Details</th><th>Brief Desc</th><th>Seller Info</th><th>Other Info</th> <th>Action</th>                   </tr>
                                </thead>

                                <tbody>
                           <?php  
                              $cust_data = $this->db->order_by('id', 'DESC');
               $cust_data = $this->db->get_where("tbl_vehicledetails",  array('user_id' => $sess_id, 'status' => 'own'),2);
              $i=0; 
              foreach ($cust_data->result() as $vehicle_details)
                                {  $i++;?>
                                  <tr>
                                      <td><?=$i;?></td>
                                      <td> (<?=$vehicle_details->id;?>) <?=$vehicle_details->reg_no;?>
                                       <br/>
                                          <img class="img-fluid" src="<?=base_url()."assets/uploads/".$vehicle_details->image_path;?>" alt="" style="max-width:120px;">
                                      </td>
                                      <td><?=$vehicle_details->owner_name;?> <br/> <?=$vehicle_details->owner_address;?>
                                        <br/> <?=$vehicle_details->owner_email;?><br/> <?=$vehicle_details->owner_mobile;?>
                                        <br/> <?=$vehicle_details->sup_no;?> </td>
                                      <td><?=$vehicle_details->veh_type;?><br/><?=strtoupper($vehicle_details->status);?></td>
                                      <td>
                                           Make : <? if($vehicle_details->make>=1)echo $this->db->get_where('make', array('id' => $vehicle_details->make, ))->row()->title;?><br/> 
                                           Model : <? if($vehicle_details->model>=1)echo $this->db->get_where('model', array('id' => $vehicle_details->model, 'make_id' => $vehicle_details->make ))->row()->title;?><br/> 
                                           Engine No. : <?=$vehicle_details->engine_no;?><br/> 
                                           Chasis No. : <?=$vehicle_details->chasis_no;?> <br/> 
                                           Insu. Exp. Date. : <?=$vehicle_details->insuarance_date;?> <br/> 
                                           Reg. Date : <?=$vehicle_details->purchase_date;?> <br/> 
                                       </td>
                                       <td><?=$vehicle_details->brief_desc;?>
                                        <td>
                                           Seller Company Name: <?=$vehicle_details->seller_comp_name;?><br/> 
                                           Seller Company Address: <?=$vehicle_details->seller_comp_address;?><br/> 
                                           Truevalue Man Name: <?=$vehicle_details->truevalue_man_name ;?><br/> 
                                           Truevalue Man Email: <?=$vehicle_details->truevalue_man_email;?> <br/>
                                           Truevalue Man Mobile: <?=$vehicle_details->truevalue_man_mobile;?><br/>  
                                       </td>

                                       <td>
                                           Final Amount: <?=$vehicle_details->final_amount;?><br/>
                                           First Amount: <?=$vehicle_details->first_amount;?><br/> 
                                           Advance Amount: <?=$vehicle_details->advance_amount;?><br/> 
                                           Second Amount: <?=$vehicle_details->second_amount;?><br/> 
                                           Commission Amount: <?=$vehicle_details->commission_amount;?><br/> 
                                       </td>
                                      

                                      </td>

                                      <td><a href="<?=base_url();?>index.php/vehicleedit/custedit/<?=$vehicle_details->id;?>"><i class="fa fa-edit"></i></a></td>
                                  </tr>
                                  <? }?>                                             


                                 </tbody>
                            </table>
                    </div>
                </section></div>

            <div class="col-xl-4">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Customer Added</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:45%">Name</th>
                                    <th style="width:55%">Address</th>
                                </tr>
                            </thead>
                            <tbody>


                              <?php 
                              $comp_data = $this->db->order_by('id', 'DESC');
                              $comp_data = $this->db->get_where("tbl_customerdetails", array('user_id'=> $sess_id),4);
                              
                              foreach ($comp_data->result() as $row)
                                    { ?>
                                      <tr>
                                          <td><?=$row->party_name;?><br><?=$row->mobile;?><br><?=$row->email;?><br></td>
                                          <td><?=$row->partyadd;?></td>
                                      </tr>
                                      <? } ?>
                            </tbody>
                        </table>
                    </div>
                </section></div>

                <div class="col-xl-4">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Profit And Losses</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th >A/C Head </th>
                                    <th style="text-align:right;">Amount </th>
                                    <th style="text-align:right;">Rest In Business</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <? 
                                 $total_purchase =$comp_data_purchase->row()->amount;
                                 $total_sales =$comp_data_sales->row()->amount;
                                 $total_payment =$comp_data_payment->row()->amount;
                                 $total_receipt =$comp_data_receipt->row()->amount;


                                 $final = $final_profit = 0;
                                 
                                 ?>
                                      <tr>
                                          <td>Purchase</td>
                                          <td style="text-align:right;"><?=number_format($comp_data_purchase->row()->amount,2);?></td>
                                          <? $final = $final+(intval($total_purchase));
                                            if ($final<0) {$bal = " CR";} else {$bal = " DR";}?>

                                          <td style="color:<? if($final>0) echo "red";else echo "blue";?>; text-align:right;"><?=number_format(abs($final),2);?> <?=$bal;?> </td> 
                                      </tr>
                                     

                                     

                                      <tr>
                                          <td>Sales</td>
                                          <td style="text-align:right;"><?=number_format($comp_data_sales->row()->amount,2);?></td>
                                          <? $final = $final-(intval($total_sales));
                                            if ($final<0) {$bal = " CR";} else {$bal = " DR";}?>

                                          <td style="color:<? if($final>0) echo "red";else echo "blue";?>; text-align:right;"><?=number_format(abs($final),2);?> <?=$bal;?> </td> 
                                      </tr>
                                       <tr>
                                          <td>Payment</td>
                                          <td style="text-align:right;"><?=number_format($comp_data_payment->row()->amount,2);?></td>
                                          <? $final_profit = $final_profit+(intval($total_payment));
                                            if ($final_profit<0) {$bal = " CR";} else {$bal = " DR";}?>
                                          <td style="color:<? if($final_profit>0) echo "red";else echo "blue";?>; text-align:right;"><?=number_format(abs($final_profit),2);?> <?=$bal;?> </td> 
                                      </tr>
                                      <tr>
                                          <td>Receipt</td>
                                          <td style="text-align:right;"><?=number_format($comp_data_receipt->row()->amount,2);?></td>
                                          <? $final_profit = $final_profit-(intval($total_receipt));
                                            if ($final_profit<0) {$bal = " CR";} else {$bal = " DR";}?>
                                          <td style="color:<? if($final_profit>0) echo "red";else echo "blue";?>; text-align:right;"><?=number_format(abs($final_profit),2);?> <?=$bal;?> </td> 
                                      </tr>

                                      <tr>
                                          <td colspan="2">Purchase - Payment (Have to Give)</td>
                                          <td style="text-align:right;"><?=number_format(abs($total_purchase -$total_payment),2);?></td>
                                      </tr>
                                      <tr>
                                          <td colspan="2">Sales - Receipt (Have to Collect)</td>
                                          <td style="text-align:right;"><?=number_format(abs($total_sales -$total_receipt),2);?></td>
                                      </tr>

                                      
                            </tbody>
                        </table>
                    </div>
                </section></div>

            <div class="col-xl-4">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Login History</h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width:35%" >Login </th>
                                    <th style="width:35%" >Logout </th>
                                    <th style="width:30%" >IP Address </th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php 
                               $log_data = $this->db->order_by('id', 'DESC');
                              if ($user_session_id['user_type']=='Admin') {
                                  $log_data = $this->db->where_in('user_type',array('Admin', "emp", "" ));
                                  $log_data = $this->db->get("tbl_login_details",5);
                              } else {
                                   $log_data = $this->db->where_not_in('user_type',array('Admin', ''));
                                  $log_data = $this->db->get_where("tbl_login_details",array('user_id'=>$this->session->userdata('user_id')),5);
                              }
                              
                              foreach ($log_data->result() as $log)
                                    { ?>
                                      <tr>
                                          <td><?=$log->login_date;?><br/><?=$log->login_time;?></td>
                                          <td><?=$log->logout_date;?><br/><?=$log->logout_time;?></td>
                                          <td><?=$log->user_ip_address;?><br/><?=$log->user_os;?></td>
                                      </tr>
                                      <? } ?>
                            </tbody>
                        </table>
                    </div>
                </section></div>
        </div>
    </section>
</section>