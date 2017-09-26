<?php
require "init.php";

$Pid=$_POST['Pid'];
$sender=$_POST['sender'];

$choked=array();
$choked1=array();
$choked2=array();

parse_str($_POST["choked"],$choked);
parse_str($_POST["choked1"],$choked1);
parse_str($_POST["choked2"],$choked2);

$count=count($choked["admin"]);
$count1=count($choked1["manager"]);
$count2=count($choked2["employee"]);

$unread=true;


if($count > 0)
{
    for ($i = 0; $i < $count; $i++)
    {
        if (trim($choked['admin'][$i] != ''))
        {
            $sql = "insert into project_members(Pid,Team_members)values('$Pid','" . mysqli_real_escape_string($con, $choked['admin'][$i]) . "')";
            $notify1="insert into notifications(Nid,recepient,sender,unread,message,type) values(null,'".$choked['admin'][$i]."','$sender','$unread','new Project Invite','type')";
            mysqli_query($con, $sql);
            mysqli_query($con, $notify1);


        }
    }

    for ($i = 0; $i < $count1; $i++)
    {
        if (trim($choked1['manager'][$i] != ''))
        {
            $sql1 = "insert into project_members(Pid,Team_members)values('$Pid','" . mysqli_real_escape_string($con, $choked1['manager'][$i]) . "')";
            $notify2="insert into notifications(Nid,recepient,sender,unread,message,type) values(null,'".$choked1['manager'][$i]."','$sender','$unread','new Project Invite','type')";
            mysqli_query($con, $sql1);
            mysqli_query($con, $notify2);

        }
    }


    for ($i = 0; $i < $count2; $i++)
    {
        if (trim($choked2['employee'][$i] != ''))
        {
            $sql2 = "insert into project_members(Pid,Team_members)values('$Pid','" . mysqli_real_escape_string($con, $choked2['employee'][$i]) . "')";
            $notify3="insert into notifications(Nid,recepient,sender,unread,message,type) values(null,'".$choked2['employee'][$i]."','$sender','$unread','new Project Invite','type')";
            mysqli_query($con, $sql2);
            mysqli_query($con, $notify3);

        }
    }



    echo "Project Created Successfully ";
}


else
    echo "insertion failure".mysqli_error($con);


?>