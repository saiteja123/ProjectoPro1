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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ProjectoPro | View Project</title>

    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
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
                                <li><a href="Employee_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                                <li><a href="e_Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                                <li><a href="e_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                                <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                                <li><a href="e_knowledge_base.php"><i class="fa fa-book"></i> Knowledge Base </a></li>
                                <li><a href="e_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
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
            <!-- /top navigation -->

            <!-- page content -->
            <?php
            $Pid=$_GET["Pid"];
            $query="select * from project_details where Pid='$Pid'";
            $result=mysqli_query($con,$query);

            while($row=mysqli_fetch_assoc($result))
            {
                ?>
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>
                    <div class="row">
                        <div class="pane" style="width:100%;text-align:center;margin-left: auto; margin-right: auto;margin-bottom: 15px">
                            <button type="button" class="btn btn-round btn-primary" style="width:125px;" id="Review">Review</button>
                            <span><button type="button" class="btn btn-round btn-primary" style="width:125px;" id="Perform">Perform</button></span>
                        </div>

                        <div id="step-1">
                            <div class="col-md-12">
                                <div class="x_panel">

                                    <div class="x_title">
                                        <h2><?php echo $row["Title"];?></h2>
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
                                                    <span class="value text-success" style="background: #fff; cursor: pointer; padding: 5px 8px; "><i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                                    <span><?php echo $row["Start_date"]?> - <?php echo $row["End_date"] ?></span></span>
                                                </li>
                                            </ul>

                                            <br/>

                                            <?php
                                            $chart_data='';
                                            $q0=mysqli_query($con,"select Mid from modules where Pid='$Pid'");
                                            $p=0;
                                            while($q0_row=mysqli_fetch_assoc($q0))
                                            {
                                                $q1=mysqli_query($con,"select Tid from tasks where Pid='$Pid' and Mid='".$q0_row["Mid"]."'");
                                                $q2=mysqli_query($con,"select Tid from tasks where Pid='$Pid' and Mid='".$q0_row["Mid"]."' and stat=1");

                                                $q1_count=mysqli_num_rows($q1);
                                                $q2_count=mysqli_num_rows($q2);

                                                $comp = ($q2_count / $q1_count) * 100;
                                                $chart_data .="{module:'module$p',percentage:$comp},";
                                                $p++;
                                            }
                                                $chart_data=substr($chart_data,0,-1);
                                            ?>

                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <div class="x_panel">
                                                    <div class="x_title">
                                                        <h2>Statistics</h2>
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
                                                        <?php
                                                        $file_query=mysqli_query($con,"select file_name,file_type from file_uploads where Pid='$Pid'");
                                                        while($file_row=mysqli_fetch_assoc($file_query))
                                                        {
                                                            if(isset($file_row['file_name']))
                                                            {
                                                             if($file_row['file_type']=="image/jpeg")
                                                             {
                                                                 echo "<li>"."<a href='uploads/".$file_row["file_name"]."' target='_blank'>"."<i class='fa fa-picture-o'>"."</i>".$file_row["file_name"]."</a>";
                                                             }
                                                             if($file_row['file_type']=="image/png")
                                                             {

                                                             }
                                                             if($file_row['file_type']=="application/pdf")
                                                             {
                                                                 echo "<li>"."<a href='uploads/".$file_row["file_name"]."' target='_blank'>"."<i class='fa fa-file-pdf-o'>"."</i>".$file_row["file_name"]."</a>";
                                                             }
                                                             if($file_row['file_type']=="application/msword")
                                                             {
                                                                 echo "<li>"."<a href='uploads/".$file_row["file_name"]."' target='_blank'>"."<i class='fa fa-file-word-o'>"."</i>".$file_row["file_name"]."</a>";
                                                             }
                                                             if($file_row['file_type']=="pdf")
                                                             {

                                                             }
                                                             else
                                                             {

                                                             }
                                                            }
                                                        }

                                                        ?>
                                                        </ul>
                                                        <br/>

                                                        <div class="text-center mtop20">
                                                            <form enctype="multipart/form-data">
                                                            <input type="file" multiple="multiple" name="files[]" id="multiFiles" style="margin-bottom: 10px;">
                                                            <input type="button" class="btn btn-sm btn-primary add" id="add" value="Upload">
                                                            </form>
                                                        </div>
                                                    </div>
                                                </section>

                                            </div>
                                            <!-- end project-detail sidebar -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="step-3" class="hidden">

                            <!-- Start to do list -->
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>To Do List</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div class="">
                                            <ul class="to_do">
                                                <?php
                                                $perform_query=mysqli_query($con,"select m.Modules,t.Task,t.Tid,t.stat,m.Start_date,m.End_date from tasks t join modules m on t.Mid=m.Mid and t.Pid=m.Pid where m.Assigned_to='".$_SESSION["login_user"]."' and t.Pid='$Pid'");
                                                while($perform_row=mysqli_fetch_assoc($perform_query))
                                                {
                                                ?>
                                                    <div class="row">
                                                    <div class="col-md-8">
                                                        <?php
                                                        if($perform_row['stat']==0)
                                                             echo "<li>"."<p>"."<input type='checkbox' name='tasks_perform[]' value='".$perform_row["Tid"]."' class='flat notChecked'>"."  ".$perform_row["Task"]."</p>"."</li>";
                                                        else
                                                            echo "<li>"."<p>"."<input type='checkbox' name='tasks_perform[]' value='".$perform_row["Tid"]."' class='flat yesChecked' checked disabled='disabled'>"."  ".$perform_row["Task"]."</p>"."</li>";
                                                        ?>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label>Start:</label>
                                                          <?php echo $perform_row["Start_date"]?>
                                                    </div>
                                                     <div class="col-md-2">
                                                         <label>End:</label>
                                                         <?php echo $perform_row["End_date"]?>
                                                     </div>
                                                </div>
                                                             <?php
                                                    }
                                                    ?>
                                            </ul>
                                        </div>


                                    </div>
                                </div>

                                <div style="margin-bottom: 50px;"><button type="button" id="perform" style="position: absolute; left: 50%; margin-left: -50px;padding-top: 12px;padding-bottom: 12px; padding-left: 25px;padding-right: 25px;font-size: 18px;" class="btn btn-warning fa fa-tasks">&nbsp&nbspUpdate</button></div>
                                <div class="clearfix"></div>
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
    </div>

                <script src="../../vendors/jquery/dist/jquery.min.js"></script>
                <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
                <script src="../../vendors/fastclick/lib/fastclick.js"></script>
                <script src="../../vendors/nprogress/nprogress.js"></script>
                <script src="../../vendors/iCheck/icheck.min.js"></script>
                <script src="../../vendors/echarts/dist/echarts.min.js"></script>
                <script src="../../vendors/raphael/raphael.min.js"></script>
                <script src="../../vendors/morris.js/morris.min.js"></script>
                <script src="../../vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>

                <!-- Custom Theme Scripts -->
                <script type="text/javascript">

                var is_gen_mem_Clicked = false;
                var is_add_files_clicked=false;
                function gen_mem()
                {
                    if(is_gen_mem_Clicked === false)
                    {
                        $('.assign').find('.sel').append("<option>"+"Select"+"</option>");
                        for (var p = 0; p < count_1; p++)
                        {
                            $('.assign').find('.sel').append("<option value='"+assign_array[p]+"'>" + assign_array[p] + "</option>");
                        }
                        document.body.removeEventListener('click', gen_mem);
                        is_gen_mem_Clicked = true;
                    }
                }


                var Pid=<?= $Pid?>;
                $(document).ready(function (e) {
                    $('#add').on('click', function () {
                        var form_data = new FormData();
                        var ins = document.getElementById('multiFiles').files.length;
                        for (var x = 0; x < ins; x++)
                        {
                            form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                        }
                        $.ajax({
                            url: 'uploads.php?Pid=<?=$Pid?>', // point to server-side PHP script
                            dataType: 'text', // what to expect back from the PHP script
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (response)
                            {
                                alert(response); // display success response from the PHP script
                                $("#multiFiles").val('');
                            },
                            error: function (response)
                            {
                                alert(response); // display error response from the PHP script
                            }
                            });
                        });
                    });

                $(document).on('click','#delegate',function()
                {
                    $.ajax({
                        url: "assign_tasks.php?Pid=<?= $Pid?>",
                        method: "POST",
                        dataType:"html",
                        data: {select:$(".sel").serialize(),tasks:$(".tasks").serialize(),duration:$(".duration").serialize(),start:$(".start").serialize(),end:$(".end").serialize()},
                        success: function (data)
                        {
                            alert(data);
                        }
                    });

                });

                $(document).on('click','#perform',function()
                {
                    $.ajax({
                        url: "update_tasks.php?Pid=<?= $Pid?>",
                        method: "POST",
                        dataType:"html",
                        data:{task:$(".notChecked:checked").serialize()},
                        success: function (data)
                        {
                            setTimeout(location.reload.bind(location), 2000);
                            alert(data);
                        }
                    });
                });

                Morris.Bar({
                    element:"graph_bar",
                    data:[<?php echo $chart_data;?>],
                    xkey:"module",
                    ykeys:["percentage"],
                    labels:["percentage"],
                    barColors: ["#26B99A", "#34495E", "#ACADAC", "#3498DB"],
                    xLabelAngle: 35,
                    hideHover: "auto",
                    resize: !0
                });

                </script>

                <script src="../js/saiteja.js"></script>
                <script src="../../build/js/custom.min.js"></script>

</body>
</html>
<?php
}
?>