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
                                <h1 class="title">List Sub User(s)</h1>    </div>

                            <div class="float-right ">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="<?=base_url("Settings/add_subuser");?>" > <i class="fa fa-edit"></i>Add New SubUser</a>                                   
                                        
                                    </li>
                                   
                                </ol>
                            </div>
                            <div class="float-right d-none">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="crm-customers.html">List Sub User(s)</a>
                                    </li>
                                    <li class="active">
                                        <strong>All Sub User(s) List</strong>
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                 
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title float-left">List Sub User(s)</h2>
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
                                                    <th>Sno.</th><th> Full Name</th><th>Email</th><th>UserName</th> <th>User Type</th> <th>Password</th> </tr>
                                            </thead>

                                            <tbody>
                                       <?php $i=0;
                                            foreach ($subusers as $sub_user)
                                            {    $i++; 
                                               
                                                ?>
                                              <tr>
                                                  <td><?=$i;?></td><td><?=$sub_user->fname.' '.$sub_user->lname;?> </td><td><?=$sub_user->user_email;?></td><td><?=$sub_user->user_name;?></td><td><?=$sub_user->user_type;?> </td><td><?=str_replace('sha1-','', $sub_user->pass_help);?></td>
                                              </tr>
                                              <?php } ?> 
                                             
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