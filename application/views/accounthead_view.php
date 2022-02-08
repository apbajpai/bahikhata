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
                        <h1 class="title">AccountHead Details</h1>    </div>
                        <div class="float-right ">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="<?=base_url("index.php/Settings/accounthead_add");?>" > <i class="fa fa-edit"></i>Add New AccountHead</a>                                   
                                </li>
                            </ol>
                        </div>
                        <div class="float-right d-none">
                            <ol class="breadcrumb">
                                <li>
                                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                </li>
                                <li>
                                    <a href="crm-customers.html">AccountHead Details</a>
                                </li>
                                <li class="active">
                                    <strong>AccountHead Details All</strong>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12">
                    <section class="box ">
                        <header class="panel_header">
                            <h2 class="title float-left">AccountHead Details</h2>
                        </header>
                        <div class="content-body">    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!-- ********************************************** -->
                                <table id="example" class="display table table-hover table-condensed" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th><th> AccountHead Name</th><th>Type</th><th>Status</th> <th>Edit</th> </tr>
                                        </thead>
                                        <tbody>
                                            <?php             
                                            $this->db->select('*');
                                            $this->db->where( array('user_id'=>$this->session->userdata('user_id')) );
                                            $this->db->order_by('tittle', 'ASC');
                                            $data_banks = $this->db->get('tbl_account_of');
                                            $i=0;
                                            foreach ($data_banks->result() as $bank_details)
                                                {    $i++; 
                                                    ?>
                                                    <tr>
                                                        <td><?=$i;?></td><td><?=$bank_details->tittle;?> </td><td><?=$bank_details->type;?></td>
                                                        <td><a href="#" class="active_status" id="<?=$bank_details->id;?>"><? if ($bank_details->active_status) { echo $bank_details->active_status;}else{echo "Inactive";}?></a> </td>
                                                        <td><a href="<?=base_url();?>index.php/Settings/accounthead_add/<?=$bank_details->id;?>"><i class="fa fa-edit"></i></a></td>
                                                    </tr>
                                                <? } ?> 
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
                     $('#example').dataTable( {
                        "paginate": true,
                        "sort": true
                      } );
                    /*$('#example').DataTable( {
                        dom: 'pif',
                        aLengthMenu: [
                        [10, 25, 50, 100, 200, "All"]
                        ],
                        iDisplayLength: 10
                    } );*/
                    $(".active_status").click(function(){ 
                        $.ajax({
                            type: "POST",
                            url: "<?=base_url();?>index.php/settings/gethead_status",
                            data: { 
                                keyword: this.id
                            },
                            dataType: "json",
                            success: function (data) { 
                                window.location.replace("<?=base_url();?>index.php/settings/accounthead/");
                            }
                        });
                    });
                } );</script>