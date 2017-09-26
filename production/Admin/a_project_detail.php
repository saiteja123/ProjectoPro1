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

        <title>ProjectoPro | View Project</title>

        <!-- Bootstrap -->
        <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- iCheck -->
        <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="../../build/css/custom.css" rel="stylesheet">
    </head>

    <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="../Home/Home_Page.html" class="site_title"><i class="fa fa-paw"></i>
                            <span>ProjectoPro</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>

                    </div>
                    <!-- /menu profile quick info -->

                    <br/>

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="Manager_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                                <li><a href="m_Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                                <li><a href="../Admin/a_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                                <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                                <li><a><i class="fa fa-book"></i> Knowledge Base </a></li>
                                <li><a href="../Admin/a_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                   aria-expanded="false">
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
            <!-- /top navigation -->

            <!-- page content -->
            <?php
            $Pid=$_GET["Pid"];
            $query="select * from project_details where Pid='$Pid'";
            $result=mysqli_query($con,$query);

            while($row=mysqli_fetch_assoc($result)) {
                ?>
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3><?php echo $row["Title"]; ?></span></h3>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="row">


                        <div class="pane" style="width:100%;text-align:center;margin-left: auto; margin-right: auto;margin-bottom: 15px">
                            <button type="button" class="btn btn-round btn-primary" style="width:125px;" id="Review">Review</button>
                           <span><button type="button" class="btn btn-round btn-primary" style="width:125px;" id="Assign">Assign</button></span>
                        </div>

                            <div id="step-1">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>New Partner Contracts Consultancy</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="x_content">

                                            <div class="col-md-9 col-sm-9 col-xs-12">

                                                <ul class="stats-overview">

                                                    <li>
                                                        <span class="name"> Project Title </span>
                                                        <span class="value text-success"> <?php echo $row["Title"]; ?> </span>
                                                    </li>
                                                    <li>
                                                        <span class="name"> Budget </span>
                                                        <span class="value text-success"> <?php echo $row["Tot_budget"];?> </span>
                                                    </li>
                                                    <li>
                                                        <span class="name"> Type </span>
                                                        <span class="value text-success"> <?php echo $row["Project_type"]?> </span>
                                                    </li>
                                                    <li>
                                                        <span class="name"> Duration </span>
                                                        <span class="value text-success" style="background: #fff; cursor: pointer; padding: 5px 8px; ">
                                                    <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span><?php echo $row["Start_date"]?> - <?php echo $row["End_date"] ?></span>
                                                </span>
                                                    </li>


                                                </ul>

                                                <br/>

                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="x_panel">
                                                        <div class="x_title">
                                                            <h2>Bar Charts</h2>
                                                            <ul class="nav navbar-right panel_toolbox">
                                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                                            </ul>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <div class="x_content">
                                                            <div id="graph_bar" style="width:100%; height:280px;"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <!-- Objectives -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Objectives</h2>
                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <?php
                                                                $sql1="select Objective from objectives where Pid='$Pid' ";
                                                                $result3=mysqli_query($con,$sql1);
                                                                while($row1=mysqli_fetch_assoc($result3))
                                                                {
                                                                    echo "<li>".$row1["Objective"]."</li>";
                                                                }

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Objectives -->

                                                    <!-- Requirements -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Requirements</h2>
                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <?php
                                                                $sql2="select Requirement from requirements where Pid='$Pid' ";
                                                                $result4=mysqli_query($con,$sql2);
                                                                while($row1=mysqli_fetch_assoc($result4))
                                                                {
                                                                    echo "<li>".$row1["Requirement"]."</li>";
                                                                }

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Requirements -->

                                                    <!-- Modules -->
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="x_panel">
                                                            <div class="x_title">
                                                                <h2>Modules</h2>
                                                                <ul class="nav navbar-right panel_toolbox">
                                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                                    </li>
                                                                </ul>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <div class="x_content">
                                                                <?php
                                                                $sql3="select Modules from modules where Pid='$Pid' ";
                                                                $result5=mysqli_query($con,$sql3);
                                                                while($row1=mysqli_fetch_assoc($result5))
                                                                {
                                                                    echo "<li>".$row1["Modules"]."</li>";
                                                                }

                                                                ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modules -->
                                                </div>


                                            </div>

                                            <!-- start project-detail sidebar -->
                                            <div class="col-md-3 col-sm-3 col-xs-12">

                                                <section class="panel">

                                                    <div class="x_title">
                                                        <h2>Project Description</h2>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="panel-body">
                                                        <h3 class="green"><?php echo $row["Title"] ?></h3>

                                                        <p><?php echo $row["Description"] ?></p>
                                                        <br/>

                                                        <div class="project_detail">
                                                            <p class="title">Project Leader</p>
                                                            <p>
                                                                <?php
                                                                $query1 = "select Team_members from project_members inner join user_info on project_members.Team_members = user_info.Uname where project_members.Pid = '$Pid' and user_info.Designation = 'manager'";
                                                                $result1 = mysqli_query($con,$query1);
                                                                while($row=mysqli_fetch_assoc($result1))
                                                                    echo "<li>".$row["Team_members"]."</li>";
                                                                ?>
                                                            </p>

                                                            <p class="title">Team members</p>
                                                            <p>
                                                                <?php
                                                                $query2 = "select Team_members from project_members inner join user_info on project_members.Team_members = user_info.Uname where project_members.Pid = '$Pid' and user_info.Designation != 'manager'";
                                                                $result2 = mysqli_query($con,$query2);
                                                                while($row=mysqli_fetch_assoc($result2))
                                                                {
                                                                    echo "<li>".$row["Team_members"]."</li>";
                                                                }

                                                                ?>
                                                            </p>
                                                        </div>

                                                        <br/>
                                                        <h5>Project files</h5>
                                                        <ul class="list-unstyled project_files">
                                                            <li><a href=""><i class="fa fa-file-word-o"></i>
                                                                    Functional-requirements.docx</a>
                                                            </li>
                                                            <li><a href=""><i class="fa fa-file-pdf-o"></i> UAT.pdf</a>
                                                            </li>
                                                            <li><a href=""><i class="fa fa-mail-forward"></i>
                                                                    Email-from-flatbal.mln</a>
                                                            </li>
                                                            <li><a href=""><i class="fa fa-picture-o"></i> Logo.png</a>
                                                            </li>
                                                            <li><a href=""><i class="fa fa-file-word-o"></i>
                                                                    Contract-10_12_2014.docx</a>
                                                            </li>
                                                        </ul>
                                                        <br/>

                                                        <div class="text-center mtop20">
                                                            <a href="#" class="btn btn-sm btn-primary">Add files</a>
                                                            <a href="#" class="btn btn-sm btn-warning">Report contact</a>
                                                        </div>
                                                    </div>

                                                </section>

                                            </div>
                                            <!-- end project-detail sidebar -->

                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div id="step-2" class="hidden pane1">
                                <div class="col-md-12 assign">
                                    <?php
                                    $mod_sql="select Modules from modules where Pid='$Pid'";
                                    $mod_result=mysqli_query($con,$mod_sql);
                                    $i=0;
                                    $count=0;
                                    $mod_array=array();
                                    while($mod_row=mysqli_fetch_assoc($mod_result))
                                    {
                                        $mod_array[$i]=$mod_row['Modules'];
                                        $count++;
                                        $i++;
                                    }

                                    $assign_query=mysqli_query($con,"select Team_members from project_members where Pid='$Pid'");
                                    $assign_mem=array();
                                    $k=0;
                                    while($assign_row=mysqli_fetch_assoc($assign_query))
                                    {
                                        $assign_mem[$k] = $assign_row['Team_members'];
                                    }
                                    ?>





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
                    ProjectoPro
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- ECharts -->
    <script src="../../vendors/echarts/dist/echarts.min.js"></script>
                <script src="../../vendors/raphael/raphael.min.js"></script>
                <script src="../../vendors/morris.js/morris.min.js"></script>
                <!-- jQuery Smart Wizard -->
                <script src="../../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
                <script src="../js/saiteja.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>
                <script>
                    var count=<?=$count ?>;
                    var mod_array = new Array();
                    var assign_array=new Array();

                    <?php foreach($mod_array as $key => $val){ ?>
                    mod_array.push('<?php echo $val; ?>');
                    <?php } ?>

                    <?php foreach($assign_mem as $key => $val){ ?>
                    assign_array.push('<?php echo $val; ?>');
                    <?php } ?>

                    for(var i=0;i<count;i++)
                    {
                        $('.assign').append('<div class="x_panel">' +
                                            '   <div class="x_title">' +
                                            '       <div class="row">' +
                                            '           <div class="col-md-6">' +
                                            '               <h2></h2>' +
                                            '           </div>' +
                                            '           <div class="col-md-5">' +
                                            '               <div class="form-group">' +
                                            '                   <label class="col-md-5 control-label" style="align:right; font-size:15px; margin-top:15px;" >Assign To :</label>' +
                                            '                   <div class="col-md-7 inputGroupContainer">' +
                                            '                       <div class="input-group col-md-11">' +
                                            '                           <select name="Type" class="form-control" style="border: none; border-bottom: solid #e3e3e6 1px;box-shadow: none;">' +
                                            '                               <option>select</option>'+
                                            '                               <option value="Web">Web</option>' +
                                            '                               <option value="IOT">IOT</option>' +
                                            '                           </select>' +
                                            '                       </div>' +
                                            '                   </div>' +
                                            '               </div>' +
                                            '           </div>' +
                                            '           <div class="col-md-1">' +
                                            '               <ul class="nav navbar-right panel_toolbox">' +
                                            '                   <li><a class="collapse-link"><i class="fa fa-chevron-up" ></i ></a ></li>' +
                                            '               </ul>'+
                                            '           </div>'+
                                            '       </div>' +
                                            '   <div class="clearfix" ></div >' +
                                            '   </div>' +
                                            '   <div class="x_content cont">' +
                                            '       <div class="row">' +
                                            '           <div class="col-md-11">' +
                                            '               <input name="Task[]" placeholder="Task 1" class="form-control"  type="text" style="border: none; border-bottom: solid #e3e3e6 1px;box-shadow: none">' +
                                            '           </div>' +
                                            '       <div class="col-md-1">' +
                                            '           <button type="button" class="fa fa-plus" id="plus" style="margin-top: 10px"></button>' +
                                            '       </div>' +
                                            '   </div>' +
                                            '   </div>' +
                                            '</div>');
                    }
                </script>

    </body>
    </html>
    <?php
}
?>