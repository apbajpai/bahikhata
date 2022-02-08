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
                    <ul class="dropdown-menu messages animated fadeIn"><li class="list dropdown-item"><ul class="dropdown-menu-list list-unstyled ps-scrollbar"> </ul></li></ul>
                </li>
            </ul>
        </div>      
        <div class='float-right'>
            <ul class="info-menu right-links list-inline list-unstyled">
                <li class="profile list-inline-item">
                    <a href="#" data-toggle="dropdown" class="toggle">
                        <img src="<?=base_url("assets/uploads/");?><?=($company_result->logo);?>" alt="user-image" class="rounded-circle img-inline">
                        <span><?=ucfirst($this->session->userdata('username'));?> <i class="fa fa-angle-down"></i></span>
                    </a>
                    <ul class="dropdown-menu profile animated fadeIn">
                        <li class=" dropdown-item">
                            <a href="<?=base_url("index.php/logout");?>">
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