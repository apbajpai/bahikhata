<?php include"top_bar.php";?>
<!-- START CONTAINER -->
<div class="page-container row-fluid">
    <!-- SIDEBAR - START -->
    <div class="page-sidebar ">
        <!-- MAIN MENU - START -->
        <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
            <!-- USER INFO - START -->
            <div class="profile-info row">
                <div class="profile-image col-lg-4 col-md-4 col-4">
                    <a href="<?=base_url("index.php/userprofile");?>">
                        <img src="<?=base_url("assets/uploads/");?><?=($company_result->logo);?>" class="img-fluid rounded-circle">
                    </a>
                </div>
                <div class="profile-details col-lg-8 col-md-8 col-8">
                    <h3>
                        <a href="<?=base_url("index.php/userprofile");?>"><?=ucfirst($this->session->userdata('username'));?></a>
                        <!-- Available statuses: online, idle, busy, away and offline -->
                        <span class="profile-status online"></span>
                    </h3>
                    <p class="profile-title">Administrator</p>
                </div>
            </div>
            <!-- USER INFO - END -->
            <ul class='wraplist'>	
             
            <li class="<? if(strcasecmp($this->router->class,'dashboard' )==0){ ?> open<? }?>"> 
                <a href="<?=base_url("index.php/dashboard");?>">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="<? if(strcasecmp($this->router->method,'dsr_report' )==0){ ?> open<? }?>"> 
                <a href="<?=base_url("index.php/accounts/dsrreport/");?>">
                    <i class="fa fa-dashboard"></i>
                    <span class="title">DSR Report</span>
                </a>
            </li>
            <li class="<? if(strcasecmp($this->router->class,'vehicleedit' )==0 ){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-question-circle"></i>
                    <span class="title">Vehicle (Purchase)</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a class="<? if($this->router->class=='vehicleview'){ ?> active<? }?>" href="<?=base_url("index.php/vehicleview");?>" >All vehicles</a>
                    </li>
                    <li>
                        <a class="<? if($this->router->class=='vehicleadd'){ ?> active<? }?>" href="<?=base_url("index.php/vehicleadd");?>" >Add vehicle</a>
                    </li>
                    

                </ul>
            </li>
            <li class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"receipt")==0 || strcasecmp($this->router->method,"payments")==0){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Accounts</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"receipt")==0){ ?> active<? }?>" href="<?=base_url("index.php/accounts/receipt");?>" >Receipt</a>
                    </li>
                    
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"payments")==0){ ?> active<? }?>" href="<?=base_url("index.php/accounts/payments");?>" >Payments</a>
                    </li>
                    
                    

                </ul>
            </li>


            <li class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"ledger_all")==0 || strcasecmp($this->router->method,"ledgerone")==0){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Ledger</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"ledger_all")==0){ ?> active<? }?>" href="<?=base_url("index.php/Accounts/ledger_all");?>" >Ledger All (Party)</a>
                    </li>
                     <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"ledgerone")==0){ ?> active<? }?>" href="<?=base_url("index.php/Accounts/ledgerone");?>" >Ledger One (By Name)</a>
                    </li>


                </ul>
            </li>
            <li class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"view_report")==0 || strcasecmp($this->router->method,"view_report")==0){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Reports</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"view_report")==0){ ?> active<? }?>" href="<?=base_url("index.php/accounts/view_report/sales");?>" >Sales Report</a>
                    </li>
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"view_report")==0){ ?> active<? }?>" href="<?=base_url("index.php/accounts/view_report/sales");?>" >Purchase Report</a>
                    </li>
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"view_report")==0){ ?> active<? }?>" href="<?=base_url("index.php/accounts/view_report/receipt");?>" >Receipt Report</a>
                    </li>
                     <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"view_report")==0){ ?> active<? }?>" href="<?=base_url("index.php/accounts/view_report/payment");?>" >Payment Report</a>
                    </li>


                </ul>
            </li>

             <li class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"ledgercash")==0 || strcasecmp($this->router->method,"ledgerbank")==0 || strcasecmp($this->router->method,"bankone")==0){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Cash Book / Bank Book</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" >
                    
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"ledgercash")==0){ ?> active<? }?>" href="<?=base_url("index.php/Accounts/ledgercash");?>" >Cash Book</a>
                    </li>
                     <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"ledgerbank")==0){ ?> active<? }?>" href="<?=base_url("index.php/Accounts/ledgerbank");?>" >Bank Book (All)</a>
                    </li>
                     <li>
                        <a class="<? if(strcasecmp($this->router->class,"accounts")==0 && strcasecmp($this->router->method,"bankone")==0){ ?> active<? }?>" href="<?=base_url("index.php/Accounts/bankone");?>" >Bank Book (By Name)</a>
                    </li>

                </ul>
            </li>

            
            
            
           
            <li class="<? if(strcasecmp($this->router->class,"customerview")==0  || strcasecmp($this->router->class,"customeradd")==0  || strcasecmp($this->router->class,"customeredit")==0  ){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Customers</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"customerview")==0){ ?> active<? }?>" href="<?=base_url("index.php/customerview");?>" >All Customers</a>
                    </li>
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"customeradd")==0){ ?> active<? }?>" href="<?=base_url("index.php/customeradd");?>" >Add Customer</a>
                    </li>

                </ul>
            </li>
            
            <li class="<? if(strcasecmp($this->router->method,"change_password")!=0 && strcasecmp($this->router->class,"Settings")==0  || strcasecmp($this->router->class,"Vehicle_make")==0 || strcasecmp($this->router->class,"vehicle_model")==0 ){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-users"></i>
                    <span class="title">Settings</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu" >
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"Settings")==0 && strcasecmp($this->router->method,"bankdetails")==0){ ?> active<? }?>" href="<?=base_url("index.php/Settings/bankdetails");?>" >Bank Details</a>
                    </li>
                   <!--  <li>
                        <a class="<? if(strcasecmp($this->router->class,"Settings")==0 && strcasecmp($this->router->method,"add_banks")==0){ ?> active<? }?>" href="<?=base_url("index.php/Settings/add_banks");?>" >Add Banks</a>
                    </li> -->

                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"Vehicle_make")==0 &&  $this->router->method=='index'){ ?> active<? }?>" href="<?=base_url("index.php/Vehicle_Make");?>" >Vehicle Make View</a>
                    </li>

                    <li>
                        <a class="<? if( strcasecmp($this->router->class,"vehicle_model")==0 && $this->router->method=='index' && $this->router->method!='edit_val'){ echo "active";}?>" href="<?=base_url("index.php/Vehicle_Model");?>" >Vehicle Model View</a>
                    </li>

                 </ul>
            </li>
            <li class="<? if(strcasecmp($this->router->class,"userprofile")==0  || strcasecmp($this->router->method,"change_password")==0){ ?> open<? }?>"> 
                <a href="javascript:;">
                    <i class="fa fa-user"></i>
                    <span class="title">My Profile</span>
                    <span class="arrow "></span>
                </a>
                <ul class="sub-menu" style=''>
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"userprofile")==0){ ?> active<? }?>" href="<?=base_url("index.php/userprofile");?>" >My Profile</a>
                    </li>
                    
                    <li>
                        <a class="<? if(strcasecmp($this->router->class,"Settings")==0 && strcasecmp($this->router->method,"change_password")==0){ ?> active<? }?>" href="<?=base_url("index.php/Settings/change_password/");?>" >Change Password</a>
                    </li>
                    <li>
                        <a class="" href="<?=base_url("index.php/logout");?>" >Logout</a>
                    </li>

                    <li>
                        <a class="" href="<?=base_url("index.php/Testpages");?>" >Test Page</a>
                    </li>
                </ul>
            </li>



        </ul>

    </div>
    <!-- MAIN MENU - END -->
    <div class="project-info">
       <div class="block1">
         <div class="data">
            <span class='title'>Target</span>
            <span class='total'>77%</span>
        </div>
        <div class="graph">
            <span class="sidebar_orders">...</span>
        </div>
    </div>

    <div class="block2">
        <div class="data">
            <span class='title'>Customers</span>
            <span class='total'>3146</span>
        </div>
        <div class="graph">
            <span class="sidebar_visitors">...</span>
        </div>
    </div>

</div>
</div>
<!--  SIDEBAR - END -->
