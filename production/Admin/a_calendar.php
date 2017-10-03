<?php
session_start();
require "init.php";
$profile_query=mysqli_query($con,"select profile from user_info where Uname='".$_SESSION["login_user"]."'");
while($profile_row=mysqli_fetch_assoc($profile_query))
{
    $profile=$profile_row["profile"];
}
if(!isset($_SESSION['login_user']))
{
    $_SESSION['login_user'] = session_id();
}
$uid = $_SESSION['login_user'];  // set your user id settings
$datetime_string = date('c',time());

if(isset($_POST['action']) or isset($_GET['view']))
{
    if(isset($_GET['view']))
    {
        if(!$result = mysqli_query($con, "SELECT title,start_date,end_date FROM calendar where uid='".$uid."'")) die();

        $rawdata = array();

        while($row = mysqli_fetch_array($result))
        {
            $title=$row['title'];
            $start=$row['start_date'];
            $end=$row['end_date'];

            $rawdata[] = array('title'=> $title,'start'=> $start,'end'=>$end);
        }

        //Parse to JSON and return
        $data=json_encode($rawdata);
        return $data;
    }
    elseif($_POST['action'] == "add")
    {
        mysqli_query($con,"INSERT INTO `calendar` (
                    `title` ,
                    `start_date` ,
                    `end_date` ,
                    `uid` 
                    )
                    VALUES (
                    '".mysqli_real_escape_string($con,$_POST["title"])."',
                    '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($_POST["start"])))."',
                    '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($_POST["end"])))."',
                    '".mysqli_real_escape_string($con,$uid)."'
                    )");
        header('Content-Type: application/json');
        echo '{"id":"'.mysqli_insert_id($con).'"}';
        exit;
    }
    elseif($_POST['action'] == "update")
    {
        mysqli_query($con,"UPDATE `calendar` set 
            `start_date` = '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
            `end_date` = '".mysqli_real_escape_string($con,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
            where uid = '".mysqli_real_escape_string($con,$uid)."' and id = '".mysqli_real_escape_string($connection,$_POST["id"])."'");
        exit;
    }
    elseif($_POST['action'] == "delete")
    {
        mysqli_query($con,"DELETE from `calendar` where uid = '".mysqli_real_escape_string($con,$uid)."' and id = '".mysqli_real_escape_string($con,$_POST["id"])."'");
        if (mysqli_affected_rows($con) > 0) {
            echo "1";
        }
        exit;
    }
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

    <title> ProjectoPro </title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- FullCalendar -->
    <link href="../../vendors/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="../../vendors/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">

    <!-- Custom styling plus plugins -->
    <link href="../../build/css/custom.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
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
                            <li><a href="Admin_Dashboard.php"><i class="fa fa-home"></i> Home </a></li>
                            <li><a href="a_Projects.php"><i class="fa fa-edit"></i> Projects </a></li>
                            <li><a href="a_calendar.php"><i class="fa fa-calendar"></i> Calendar </a></li>
                            <li><a><i class="fa fa-bug"></i> Bugs & Issues </a></li>
                            <li><a href="a_knowledge_base.php"><i class="fa fa-book"></i> Knowledge Base </a></li>
                            <li><a href="a_stake_holder.php"><i class="fa fa-users"></i> Stake Holders </a></li>
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

        <!-- page content -->
        <div class="right_col" role="main">

            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Calendar <small>Click to add/edit events</small></h3>
                    </div>


                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Calendar Events <small>Sessions</small></h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <div id='calendar'></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- /page content -->

        <!-- Modal -->
        <div id="createEventModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Event</h4>
                    </div>
                    <div class="modal-body">
                        <div class="control-group">
                            <label class="control-label" for="inputPatient">Event:</label>
                            <div class="field desc">
                                <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
                            </div>
                        </div>

                        <input type="hidden" id="startTime"/>
                        <input type="hidden" id="endTime"/>



                        <div class="control-group">
                            <label class="control-label" for="when">When:</label>
                            <div class="controls controls-row" id="when" style="margin-top:5px;">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
                    </div>
                </div>

            </div>
        </div>


        <div id="calendarModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Event Details</h4>
                    </div>
                    <div id="modalBody" class="modal-body">
                        <h4 id="modalTitle" class="modal-title"></h4>
                        <div id="modalWhen" style="margin-top:5px;"></div>
                    </div>
                    <input type="hidden" id="eventID"/>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal-->


    </div>
</div>


<!-- jQuery -->
<script src="../../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../../vendors/nprogress/nprogress.js"></script>
<!-- FullCalendar -->
<script src="../../vendors/moment/min/moment.min.js"></script>
<script src="../../vendors/fullcalendar/dist/fullcalendar.min.js"></script>

<!-- Custom Theme Scripts -->

<script type="text/javascript">

    $(document).ready(function(){
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
            header:{
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listMonth'
            },
            defaultView: 'month',
            editable: true,
            selectable: true,
            selectHelper: !0,
            allDaySlot: true,

            events: 'a_calendar.php?view=1',


            eventClick:  function(event, jsEvent, view) {
                endtime = $.fullCalendar.moment(event.end).format('h:mm');
                starttime = $.fullCalendar.moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },

            //header and other values
            select: function(start, end, jsEvent) {
                endtime = $.fullCalendar.moment(end).format('h:mm');
                starttime = $.fullCalendar.moment(start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
            },


            eventDrop: function(event, delta){
                $.ajax({
                    url: 'a_calendar.php',
                    data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                    type: "POST",
                    success: function(json) {
                        //alert(json);
                    }
                });
            },
            eventResize: function(event) {
                $.ajax({
                    url: 'a_calendar.php',
                    data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
                    type: "POST",
                    success: function(json) {
                        //alert(json);
                    }
                });
            }
        });

        $('#submitButton').on('click', function(e){
            // We don't want this to act as a link so cancel the link action
            e.preventDefault();
            doSubmit();
        });

        $('#deleteButton').on('click', function(e){
            // We don't want this to act as a link so cancel the link action
            e.preventDefault();
            doDelete();
        });

        function doDelete(){
            $("#calendarModal").modal('hide');
            var eventID = $('#eventID').val();
            $.ajax({
                url: 'a_calendar.php',
                data: 'action=delete&id='+eventID,
                type: "POST",
                success: function(json) {
                    if(json == 1)
                        $("#calendar").fullCalendar('removeEvents',eventID);
                    else
                        return false;


                }
            });
        }
        function doSubmit(){
            $("#createEventModal").modal('hide');
            var title = $('#title').val();
            var startTime = $('#startTime').val();
            var endTime = $('#endTime').val();

            $.ajax({
                url: 'a_calendar.php',
                data: 'action=add&title='+title+'&start='+startTime+'&end='+endTime,
                type: "POST",
                success: function(json) {
                    $("#calendar").fullCalendar('renderEvent',
                        {
                            id: json.id,
                            title: title,
                            start: startTime,
                            end: endTime,
                        },
                        true);
                }
            });

        }
    });



</script>
<script src="../../build/js/custom.min.js"></script>

</body>
</html>