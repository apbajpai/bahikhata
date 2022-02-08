<?php include "header.php";?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        
        <?=link_tag('assets/assets/plugins/datatables/css/dataTables.min.css');?>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

    </head>
    <!-- END HEAD -->
<body class=" ">
<?php //include "nav.php";?> 
	<div class="col-xl-12">
            <section class="box nobox">
                <div class="content-body">    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12">

                            <h1 class="page_error_code text-primary">404</h1>
                            <h1 class="page_error_info">Oops! Page Not Found</h1>

                            <div class="col-12">
                                <div class="row justify-content-center">
                                    <form action="javascript:;" method="post" class="page_error_search" style="width: 60%;">
                                        <div class="input-group transparent">
                                            <span class="input-group-addon">
                                                <i class="fa fa-search icon-primary"></i>
                                            </span>
                                            <input type="text" class="form-control" placeholder="Try a new search">
                                            <input type='submit' value="">
                                        </div>

                                        <div class="text-center page_error_btn">
                                            <a class="btn btn-primary btn-lg" href='<?=base_url();?>'><i class='fa fa-location-arrow'></i> &nbsp; Back to Home</a>
                                        </div>
                                    </form>
                                </div></div>

                        </div>
                    </div>
                </div>
            </section></div>
<?php include "footer.php";?>		
 


     



    </body>
</html>