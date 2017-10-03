<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>

    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../../build/css/custom.css" rel="stylesheet">
</head>
<body class="nav-md">
<?php
   session_start();
   require "init.php";
   $profile_query=mysqli_query($con,"select profile from user_info where Uname='".$_SESSION["login_user"]."'");
   while($profile_row=mysqli_fetch_assoc($profile_query))
   {
       $profile=$profile_row["profile"];
   }
   ?>
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="../Home/Home_Page.html" class="site_title"><i class="fa fa-paw"></i> <span>ProjectoPro</span></a>
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
                            <li><a href="Employee_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                            <li><a href="e_Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                            <li><a href="e_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                            <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                            <li><a href="e_knowledge_base.php"><i class="fa fa-book"></i> Knowledge Base </a></li>
                            <li><a href="e_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
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
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                                <img src="../profiles/<?php echo $profile;?>" alt="Not Found" onerror=this.src="../images/alt_profile.png"><span><?php if(isset($_SESSION["login_user"])) echo $_SESSION["login_user"]; ?></span>
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
                                <li><a href="../Home/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                        <?php
                      $notify_query=mysqli_query($con,"select * from notifications where recepient='".$_SESSION["login_user"]."'");
                      $notify_num=mysqli_num_rows($notify_query);
                      ?>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-envelope-o"></i>
                                <span class="badge bg-green"><?php echo $notify_num?></span>
                            </a>

                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                                <?php
                              $k=$notify_num;
                              while($k>$notify_num-3&&$notiify_row=mysqli_fetch_assoc($notify_query))
                                {
                                ?>
                                <li>
                                    <a>
                                        <span><span>Sender:  </span><span><?php echo $notiify_row["sender"];?></span></span>
                                        <span class="message"><?php echo $notiify_row["message"];?></span>
                                    </a>
                                </li>

                                <?php
                                  $k--;
                              }
                              ?>
                                <li>
                                    <div class="text-center">
                                        <a>
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
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
                ProjectoPro
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>


<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<script src="../../vendors/nprogress/nprogress.js"></script>
<script src="../../vendors/Chart.js/dist/Chart.min.js"></script>
<script src="../../vendors/gauge.js/dist/gauge.min.js"></script>
<script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<script src="../../vendors/iCheck/icheck.min.js"></script>
<script src="../../vendors/skycons/skycons.js"></script>
<script src="../../vendors/Flot/jquery.flot.js"></script>
<script src="../../vendors/Flot/jquery.flot.pie.js"></script>
<script src="../../vendors/Flot/jquery.flot.time.js"></script>
<script src="../../vendors/Flot/jquery.flot.stack.js"></script>
<script src="../../vendors/Flot/jquery.flot.resize.js"></script>
<script src="../../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
<script src="../../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
<script src="../../vendors/flot.curvedlines/curvedLines.js"></script>
<script src="../../vendors/DateJS/build/date.js"></script>
<script src="../../vendors/jqvmap/dist/jquery.vmap.js"></script>
<script src="../../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
<script src="../../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
<script src="../../vendors/moment/min/moment.min.js"></script>
<script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../build/js/custom.min.js"></script>

</body>
</html>