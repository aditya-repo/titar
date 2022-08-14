<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Titar </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('resources/vendors/bootstrap/dist/css/bootstrap.min.css' );?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('resources/vendors/font-awesome/css/font-awesome.min.css' );?>" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <!-- NProgress -->
    <link href="<?php echo base_url('resources/vendors/nprogress/nprogress.css' );?>" rel="stylesheet">
    <!-- jQuery custom content scroller -->
    <link href="<?php echo base_url('resources/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css' );?>" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('resources/build/css/custom.min.css' );?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><i class="fa fa-institution"></i> <span>Titar</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info pl-5 pt-2">
                <span>Welcome,</span>
                <h2><?php echo $this->session->userdata('name'); ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('panel/index');?>"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                  <li><a href="<?php echo base_url('panel/profile');?>"><i class="fa fa-edit"></i> Personal Details</a></li>
                  <li><a href="<?php echo base_url('panel/ads');?>"><i class="fa fa-upload"></i>Manage Ads </a></li>
                  <li><a href="<?php echo base_url('panel/balance');?>"><i class="fa fa-rupee"></i>Balance </a></li>
                  <li><a href="<?php echo base_url('admin/contactus');?>"><i class="fa fa-edit"></i>Daily Status</a></li>
                </div>
                </ul>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                  <ul>
                      <a class="navbar-right bg-danger text-white p-2" href="<?php echo base_url('panel/logout') ?>"><i class="fa fa-sign-out"></i> Log Out</a>
                  </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <?php                    
          if(isset($_view) && $_view)
          $this->load->view($_view);
        ?>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Powered By <a href="#">Adityadesk</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url('resources/vendors/jquery/dist/jquery.min.js'); ?>"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url('resources/vendors/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('resources/vendors/fastclick/lib/fastclick.js'); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo base_url('resources/vendors/nprogress/nprogress.js'); ?>"></script>
    <!-- jQuery custom content scroller -->
    <script src="<?php echo base_url('resources/vendors/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js'); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url('resources/build/js/custom.min.js'); ?>"></script>
  </body>
</html>