<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <!-- Meta, title, CSS, favicons, etc. -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Admin</title>
      <!-- Bootstrap -->
      <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <!-- NProgress -->
      <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
      <!-- iCheck -->
      <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
      <!-- bootstrap-progressbar -->
      <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
      <!-- JQVMap -->
      <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
      <!-- bootstrap-daterangepicker -->
      <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="../build/css/custom.min.css" rel="stylesheet">
   </head>
   <body class="nav-md">
   <?php
   session_start();
   ?>
   <div class="container body">
      <div class="main_container">
         <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
               <div class="navbar nav_title" style="border: 0;">
                  <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>ProjectoPro</span></a>
               </div>
               <div class="clearfix"></div>
               <!-- menu profile quick info -->

               <!-- /menu profile quick info -->
               <br />
               <!-- sidebar menu -->
               <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                  <div class="menu_section">
                     <h3>General</h3>
                     <ul class="nav side-menu">
                        <li><a href="Admin_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                        <li><a href="Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                        <li><a href="calendar.html"><i class="fa fa-calendar"></i> Calendar </a></li>
                        <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                        <li><a><i class="fa fa-book"></i> Knowledge Base </a></li>
                        <li><a><i class="fa fa-users"></i> Stake Holders </a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>

         <div class="top_nav">
            <div class="nav_menu">
               <nav>
                  <div class="nav toggle">
                     <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                  </div>
                  <ul class="nav navbar-nav navbar-right">
                     <li class="col-lg-5">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                           <img src="images/img.jpg" alt=""><span><?php echo $_SESSION["login_user"]; ?></span>
                           <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                           <li><a href="javascript:;"> Profile</a></li>
                           <li>
                              <a href="javascript:;">
                                 <span>Settings</span>
                              </a>
                           </li>
                           <li><a href="javascript:;">Help</a></li>
                           <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>

         <!-- page content -->
         <div class="right_col" role="main">



         </div>
         <!-- /page content -->

         <!-- footer content -->
         <footer>
            <div class="pull-right">
               Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
            </div>
            <div class="clearfix"></div>
         </footer>
         <!-- /footer content -->
      </div>
   </div>


   <script src="../vendors/jquery/dist/jquery.min.js"></script>
   <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="../vendors/fastclick/lib/fastclick.js"></script>
   <script src="../vendors/nprogress/nprogress.js"></script>
   <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
   <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
   <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
   <script src="../vendors/iCheck/icheck.min.js"></script>
   <script src="../vendors/skycons/skycons.js"></script>
   <script src="../vendors/Flot/jquery.flot.js"></script>
   <script src="../vendors/Flot/jquery.flot.pie.js"></script>
   <script src="../vendors/Flot/jquery.flot.time.js"></script>
   <script src="../vendors/Flot/jquery.flot.stack.js"></script>
   <script src="../vendors/Flot/jquery.flot.resize.js"></script>
   <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
   <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
   <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
   <script src="../vendors/DateJS/build/date.js"></script>
   <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
   <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
   <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
   <script src="../vendors/moment/min/moment.min.js"></script>
   <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
   <script src="../build/js/custom.min.js"></script>

   </body>
</html>