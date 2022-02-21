<?php 
    helper('dbfunction'); 
    $user_id = session()->get('user_id');
    $user_name = session()->get('user_fullname');
    $user_type = (session()->get('user_type')) ? session()->get('user_type') : 'Admin' ;

    $company_result = getCompanyDetails($user_id);
?>
<div class='page-topbar '>
    <div class='logo-area'></div>
    <div class='quick-area'>
        <div class='float-left'>
            <ul class="info-menu left-links list-inline list-unstyled">
                <li class="sidebar-toggle-wrap list-inline-item">
                    <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
                <li class="message-toggle-wrapper list-inline-item">
                    <ul class="dropdown-menu messages animated fadeIn"><li class="list dropdown-item">
                        <ul class="dropdown-menu-list list-unstyled ps-scrollbar"> </ul></li></ul>
                </li>
            </ul>
        </div>      
        <div class="float-right">
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile list-inline-item showopacity">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <img src="<?=base_url("public/assets/uploads/");?>/<?=($company_result->logo);?>" alt="user-image" class="rounded-circle img-inline">
                        <span><?=ucfirst($user_name);?> <i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <li class=" dropdown-item">
                            <a href="<?= base_url('auth/logout'); ?>">
                                <i class="fa fa-lock"></i>
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>           
        </div>
    </div>
</div>
<!-- END TOPBAR -->

<!-- START CONTAINER -->
<div class="page-container row-fluid">
    <!-- SIDEBAR - START -->
    <div class="page-sidebar ">
        <!-- MAIN MENU - START -->
        <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
            <!-- USER INFO - START -->
            <div class="profile-info row">
                <div class="profile-image col-lg-4 col-md-4 col-4">
                    <a href="<?=base_url("user-profile");?>">
                        <img src="<?=base_url("/public/assets/uploads/");?>/<?=($company_result->logo);?>" class="img-fluid rounded-circle">
                    </a>
                </div>
                <div class="profile-details col-lg-8 col-md-8 col-8">
                    <h3>
                        <a href="<?=base_url("user-profile");?>">
                        <?= ucfirst($user_name);?></a>
                        <!-- Available statuses: online, idle, busy, away and offline -->
                        <span class="profile-status online"></span>
                    </h3>
                    <p class="profile-title"><?= $user_type;?></p>
                </div>
            </div>
            <!-- USER INFO - END -->

            <ul class='wraplist'>
                <li class=" open"> 
                    <a href="<?=base_url("dashboard");?>">
                        <i class="fa fa-dashboard"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>
                <li class=""> 
                    <a href="<?=base_url("dsr-report");?>" >
                        <i class="fa fa-bar-chart"></i>
                        <span class="title">DSR Report</span>
                    </a>
                </li>
                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-rupee"></i>
                        <span class="title">Accounts</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu" style="display: none;">
                        <li>
                            <a class="" href="<?=base_url("accounts/general-purchase");?>">General Purchase</a>
                        </li>
                        <li>
                            <a class="" href="<?=base_url("accounts/general-sales");?>">General Sales</a>
                        </li>
                        <li>
                            <a class="" href="<?=base_url("accounts/contra");?>">Contra</a>
                        </li>
                        <li>
                            <a class="" href="<?=base_url("accounts/receipt");?>">Receipt</a>
                        </li>
                        
                        <li>
                            <a class="" href="<?=base_url("accounts/payments");?>">Payments</a>
                        </li>
                    </ul>
                </li>
                <li class=""> 
                    <a href="<?=base_url("notes");?>">
                        <i class="fa fa-edit"></i>
                        <span class="title">Add / Edit Notes</span>
                    </a>
                </li>
                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span class="title">Ledger</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="" href="<?=base_url("ledger/all-party");?>">Ledger All (Party)</a>
                        </li>
                        <li>
                            <a class="" href="<?=base_url("ledger/one-name");?>">Ledger One (By Name)</a>
                        </li>
                        <li>
                            <a class="" href="<?=base_url("ledger/one-item");?>">Ledger All (Item)</a>
                        </li>
                        <li>
                            <a class="" href="<?=base_url("ledger/one-item");?>">Ledger One (By Item)</a>
                        </li>
                    </ul>
                </li>

                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-line-chart"></i>
                        <span class="title">Reports</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/accounts/view_report/gensales">Sales Report (General)</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/accounts/view_report/genpurchases">Purchase Report (General)</a>
                        </li>
                        <li style="display:none;">
                            <a class="" href="https://onlinebahikhata.com/index.php/accounts/view_report/sales">Sales Report</a>
                        </li>
                        <li style="display:none;">
                            <a class="" href="https://onlinebahikhata.com/index.php/accounts/view_report/purchase">Purchase Report</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/accounts/view_report/receipt">Receipt Report</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/accounts/view_report/payment">Payment Report</a>
                        </li>
                    </ul>
                </li>

                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-rupee"></i>
                        <span class="title">Cash Book / Bank Book</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/Accounts/ledgercash">Cash Book</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/Accounts/ledgerbank">Bank Book (All)</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/Accounts/bankone">Bank Book (By Name)</a>
                        </li>
                    </ul>
                </li>

                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-users"></i>
                        <span class="title">Customers</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/customerview">All Customers</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/customeradd">Add Customer</a>
                        </li>
                    </ul>
                </li>

                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-wrench"></i>
                        <span class="title">Settings</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/Settings/bankdetails">Bank Details</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/Settings/loginhistory">Login History</a>
                        </li> 
                        <li style="display:none;">
                            <a class="" href="https://onlinebahikhata.com/index.php/Vehicle_Make">Vehicle Make View / Add</a>
                        </li>
                        <li style="display:none;">
                            <a class="" href="https://onlinebahikhata.com/index.php/Vehicle_Model">Vehicle Model View / Add</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/settings/footertext">Footer Text</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/settings/accounthead">Account head (Receipt/Payment)</a>
                        </li>
                    </ul>
                </li>

                <li class=""> 
                    <a href="javascript:;">
                        <i class="fa fa-wrench"></i>
                        <span class="title">My Profile</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/userprofile">My Profile</a>
                        </li>
                        <li>
                            <a class="" href="https://onlinebahikhata.com/index.php/Settings/change_password/">Change Password</a>
                        </li> 
                        <li style="display:none;">
                            <a class="" href="https://onlinebahikhata.com/index.php/logout">Logout</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>

        <!-- MAIN MENU - END -->
        <div class="project-info">
            <div class="block1">
                <div class="data">
                    <span class="title">Target</span>
                    <span class="total">77%</span>
                </div>
                <div class="graph">
                    <span class="sidebar_orders"><canvas width="49" height="20" style="display: inline-block; width: 49px; height: 20px; vertical-align: top;"></canvas></span>
                </div>
            </div>
            <div class="block2">
                <div class="data">
                    <span class="title">Customers</span>
                                                                
                    <span class="total">3</span>
                </div>
                <div class="graph">
                    <span class="sidebar_visitors"><canvas width="49" height="20" style="display: inline-block; width: 49px; height: 20px; vertical-align: top;"></canvas></span>
                </div>
            </div>
        </div>
    </div>
</div>