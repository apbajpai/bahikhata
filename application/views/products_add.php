<?php include "includes/header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
<?=link_tag('assets/assets/plugins/datepicker/css/datepicker.css');?>       
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
                        <h1 class="title">Add Product(s) </h1> 
                    </div>
                    <div class="float-right ">
                        <ol class="breadcrumb">
                            <li>
                                <a href="<?=base_url();?>index.php/Settings/accounthead">Products View</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php echo form_open_multipart('Settings/product_update');?>
            <div class="col-xl-12 col-lg-12 col-12 col-md-12">
                <section class="box ">
                    <header class="panel_header">
                        <h2 class="title float-left">Products </h2>
                        <div class="actions panel_actions float-right">
                            <i class="box_toggle fa fa-chevron-down"></i>
                        </div>
                    </header>
                    <? if(isset($product_details)){
                        ?>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_name">Product Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$product_details->p_name;?>" class="form-control" id="p_name" name="p_name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_sku">SKU</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$product_details->p_sku;?>" class="form-control" id="p_sku" name="p_sku" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_hsn">HSN Code</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$product_details->p_hsn;?>" class="form-control" id="p_hsn" name="p_hsn" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_mrprice">MRP</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$product_details->p_mrprice;?>" class="form-control" id="p_mrprice" name="p_mrprice" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_gstax">GST (%)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$product_details->p_gstax;?>" class="form-control" id="p_gstax" name="p_gstax" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_stock">Stock</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="<?=$product_details->p_stock;?>" class="form-control" id="p_stock" name="p_stock" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                        <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" name="user_id">
                                        <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" name="modified">
                                        <input type="hidden" class="form-control"  value="<?=$this->uri->segment('3');?>" name="id">
                                        <input type="hidden" class="form-control"  value="<?=$product_details->active_status;?>" name="active_status">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?   }else{?>
                        <div class="content-body">
                            <div class="row">
                                <div class="col-xl-8 col-lg-8 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_name">Name</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="p_name" name="p_name" required autofocus>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_sku">SKU</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="p_sku" name="p_sku" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_hsn">HSN Code</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="p_hsn" name="p_hsn" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_mrprice">MRP</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="p_mrprice" name="p_mrprice" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_gstax">GST (%)</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="p_gstax" name="p_gstax" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-4 col-md-9 col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="p_stock">Stock</label>
                                        <span class="desc"></span>
                                        <div class="controls">
                                            <input type="text" value="" class="form-control" id="p_stock" name="p_stock" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-9 col-12 padding-bottom-30">
                                    <div class="text-left">
                                        <input type="hidden" class="form-control"  value="<?=$this->session->userdata('user_id');?>" name="user_id">
                                        <input type="hidden" class="form-control"  value="<?=BAD__TIME;?>" name="created">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? }?>
                </section>
            </div>
        </form>
    </section>
</section>
<?php include "includes/footer.php";?>		
<script src="<?=base_url('assets/');?>assets/plugins/datepicker/js/datepicker.js" type="text/javascript"></script> 
<script src="<?=base_url('assets/');?>assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
<!-- CORE TEMPLATE JS - START --> 
<script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
<!-- END CORE TEMPLATE JS - END --> 
<!-- Sidebar Graph - START --> 
<script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
<script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
<!-- Sidebar Graph - END --> 
</body>
</html>