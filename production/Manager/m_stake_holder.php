<?php
require "init.php";
session_start();
$profile_query=mysqli_query($con,"select profile from user_info where Uname='".$_SESSION["login_user"]."'");
while($profile_row=mysqli_fetch_assoc($profile_query))
{
    $profile=$profile_row["profile"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects</title>
    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.css" rel="stylesheet">
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="../profiles/<?php echo $profile;?>" alt="Not Found" onerror=this.src="../images/alt_profile.png"><span><?php echo $_SESSION["login_user"]; ?></span>
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
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="../Home/Home_Page.html" class="site_title"><i class="fa fa-paw"></i> <span>ProjectoPro</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
                    </div>

                </div>
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a href="Manager_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                            <li><a href="m_projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                            <li><a href="m_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                            <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                            <li><a href="m_knowledge_base.php"><i class="fa fa-book"></i> Knowledge Base </a></li>
                            <li><a href="m_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- page content -->
        <div class="right_col" style="padding-top: 80px;" role="main">
            <div class="">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        <h3 align="center" class="panel-title">Stake Holders</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-default">
                            <div class="panel-heading"><h3>Admin</h3></div>
                            <div class="panel-body">
                                <div class="container">
                                    <table  class="table table-striped" >
                                        <thead>
                                        <tr>
                                            <th class='col-md-2'>S.no</th>
                                            <th class='col-md-3'>Username</th>
                                            <th class='col-md-2'>Gender</th>
                                            <th class='col-md-2'>Department</th>
                                            <th class='col-md-3'>Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        require "init.php";
                                        $query="select UID,Gender,Uname,Department,Contact from user_info where Designation='admin'";
                                        $result=mysqli_query($con,$query);
                                        while( $row = mysqli_fetch_array($result) )
                                        {
                                            echo "<tr>";
                                            echo "<td class='col-md-2'>".$row['UID']."</td>";
                                            echo "<td class='col-md-3'>".$row['Uname']."</td>";
                                            echo "<td class='col-md-2'>".$row['Gender']."</td>";
                                            echo "<td class='col-md-2'>".$row['Department']."</td>";
                                            echo "<td class='col-md-3'>".$row['Contact']."</td>";
                                            echo "</tr>\n";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="panel-default">
                            <div class="panel-heading"><h3>Manager</h3></div>
                            <div class="panel-body">
                                <div class="container">
                                    <table  class="table table-striped" >
                                        <thead>
                                        <tr>
                                            <th class='col-md-2'>S.no</th>
                                            <th class='col-md-3'>Username</th>
                                            <th class='col-md-2'>Gender</th>
                                            <th class='col-md-2'>Department</th>
                                            <th class='col-md-3'>Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        require "init.php";
                                        $query="select UID,Uname,Gender,Department,Contact from user_info where Designation='manager'";
                                        $result=mysqli_query($con,$query);
                                        while( $row = mysqli_fetch_array($result) )
                                        {
                                            echo "<tr>";
                                            echo "<td class='col-md-2'>".$row['UID']."</td>";
                                            echo "<td class='col-md-3'>".$row['Uname']."</td>";
                                            echo "<td class='col-md-2'>".$row['Gender']."</td>";
                                            echo "<td class='col-md-2'>".$row['Department']."</td>";
                                            echo "<td class='col-md-3'>".$row['Contact']."</td>";
                                            echo "</tr>\n";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="panel-default">
                            <div class="panel-heading"><h3>Employee</h3></div>
                            <div class="panel-body">
                                <div class="container">
                                    <table  class="table table-striped" >
                                        <thead>
                                        <tr>
                                            <th class='col-md-2'>S.no</th>
                                            <th class='col-md-3'>Username</th>
                                            <th class='col-md-2'>Gender</th>
                                            <th class='col-md-2'>Department</th>
                                            <th class='col-md-3'>Contact</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        require "init.php";
                                        $query="select UID,Uname,Gender,Department,Contact from user_info where Designation='employee'";
                                        $result=mysqli_query($con,$query);
                                        while( $row = mysqli_fetch_array($result) )
                                        {
                                            echo "<tr>";
                                            echo "<td class='col-md-2'>".$row['UID']."</td>";
                                            echo "<td class='col-md-3'>".$row['Uname']."</td>";
                                            echo "<td class='col-md-2'>".$row['Gender']."</td>";
                                            echo "<td class='col-md-2'>".$row['Department']."</td>";
                                            echo "<td class='col-md-3'>".$row['Contact']."</td>";
                                            echo "</tr>\n";
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div align="center">
                    <button class="btn btn-warning">Send</button>
                </div>



            </div>
        </div>
        <!-- /page content -->
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
