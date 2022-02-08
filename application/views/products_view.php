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
                        <h1 class="title">Products Details</h1>    </div>
                        <div class="float-right ">
                            <ol class="breadcrumb">

                                <li><a href="<?=base_url("index.php/Settings/product_add");?>" > <i class="fa fa-home"></i>Dashboard</a></li>
                                <li>&nbsp;&nbsp;<a href="<?=base_url("index.php/Settings/product_add");?>" > <i class="fa fa-edit"></i>Add New Product(s)</a></li>
                            </ol>
                        </div>
                        <div class="float-right d-none">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="crm-customers.html">Products Details</a>
                                </li>
                                <li class="active">
                                    <strong>Products Details(All)</strong>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">Products Details</h2>
                        </header>
                        <div class="content-body">    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>SNo.</th><th> Product</th><th>Status</th> <th>Edit</th> </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=0;
                                            foreach ($productS as $product)
                                                {    $i++; 
                                                    ?>
                                                    <tr>
                                                        <td><?=$i;?></td><td><?=$product->p_name;?> </td>
                                                        <td><a href="#" class="active_status" id="<?=$product->id;?>"><? if ($product->active_status) { echo $product->active_status;}else{echo "Inactive";}?></a> </td>
                                                        <td><a href="<?=base_url();?>/Settings/product_add/<?=$product->id;?>"><i class="fa fa-edit"></i></a></td>
                                                    </tr>
                                                <? }
                                                ?> 
                                            </tbody>
                                        </table>
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
                <script src="<?=base_url('assets/');?>assets/js/scripts.js" type="text/javascript"></script> 
                <script src="<?=base_url('assets/');?>assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
                <script src="<?=base_url('assets/');?>assets/js/chart-sparkline.js" type="text/javascript"></script>
                <script >
                    $(document).ready(function() {
                        $('#example').DataTable( {
                            "paginate": true,
                            "sort": true
                        } );
                        $(".active_status").click(function(){
                            $.ajax({
                                type: "POST",
                                url: "<?=base_url();?>/settings/product_status",
                                data: { 
                                    keyword: this.id
                                },
                                dataType: "json",
                                success: function (data) { 
                                    window.location.replace("<?=base_url();?>/settings/product/");
                                }
                            });
                        });
                    } );</script>
                </body>
                </html>