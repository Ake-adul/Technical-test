<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a target="_blank" href="<?php url() ?>" class="site_title"><i class="fa fa-paw"></i> <span>Technical Test</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="backend/images/avatar.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>to my restaurant</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    
                    <li><a href="{{ url('/admin') }}"><i class="fa fa-cutlery"></i>Admin Restaurant </a></li>
                    <li><a href="{{ url('/') }}"><i class="fa fa-cutlery"></i>User Restaurant </a></li>
                    
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div> 