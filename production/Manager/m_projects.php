<?php
require "init.php";
session_start();
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
                                <img src="../images/img.jpg" alt=""><span><?php echo $_SESSION["login_user"]; ?></span>
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
                            <li><a href="m_Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                            <li><a href="../Manager/m_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                            <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                            <li><a><i class="fa fa-book"></i> Knowledge Base </a></li>
                            <li><a href="../Manager/m_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <!-- page content -->
        <div class="right_col hideIt" role="main">
            <div class="row">
                <div class="cont">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Projects <small>Listing design</small></h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 panel1">
                            <div class="x_panel" >
                                <div class="x_title">
                                    <h2>Projects</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>


                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <!-- start project list -->
                                    <table class="table table-striped projects">
                                        <thead>
                                        <tr>
                                            <th style="width: 1%">#</th>
                                            <th style="width: 20%">Project Name</th>
                                            <th>Team Members</th>
                                            <th>Project Progress</th>
                                            <th>Status</th>
                                            <th style="width: 20%">#Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $design=mysqli_query($con,"select Designation from user_info WHERE Uname='".$_SESSION["login_user"]."' ");
                                        if($design="manager"){
                                            $query="select * from projects inner join project_members on projects.Pid = project_members.Pid where project_members.team_members='".$_SESSION["login_user"]."'";
                                            $result=mysqli_query($con,$query);
                                            if (mysqli_num_rows($result) > 0)
                                            {
                                                while ($row = mysqli_fetch_assoc($result))
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?php $Pid = $row["Pid"];
                                                            echo $Pid; ?></td>
                                                        <td>
                                                            <a><?php echo $row["project_name"]; ?></a>
                                                            <br/>

                                                        </td>
                                                        <td><?php
                                                            $query1 = "select Team_members from project_members where Pid='$Pid';";
                                                            $result1 = mysqli_query($con, $query1);
                                                            if (mysqli_num_rows($result1) > 0) {
                                                                while ($row1 = mysqli_fetch_assoc($result1)) {
                                                                    ?>
                                                                    <ul class="list">
                                                                        <li>
                                                                            <?php echo $row1["Team_members"]; ?>
                                                                        </li>
                                                                    </ul>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <?php
                                                        $progress = $row["progress"];
                                                        ?>

                                                        <td class="project_progress">
                                                            <div class="progress progress_sm">
                                                                <div class="progress-bar bg-green" role="progressbar"
                                                                     data-transitiongoal="<?= $progress ?>"></div>
                                                            </div>
                                                            <small><?= $progress ?>% Complete</small>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                    class="btn btn-success btn-xs"><?php echo $row["status"]; ?></button>
                                                        </td>
                                                        <td>
                                                            <a href="m_project_detail.php?Pid=<?= $row['Pid']?>" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i></a>
                                                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>


                                        </tbody>
                                    </table>
                                    <!-- end project list -->


                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                ProjctoPro
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
</div>

    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="../../build/js/custom.min.js"></script>

</body>
</html>