<?php
require "init.php";

$Pid=$_POST['Pid'];

$choked=array();
$choked1=array();
$choked2=array();

parse_str($_POST["choked"],$choked);
parse_str($_POST["choked1"],$choked1);
parse_str($_POST["choked2"],$choked2);

$count=count($choked["admin"]);
$count1=count($choked1["manager"]);
$count2=count($choked2["employee"]);


if($count > 0)
{
    for ($i = 0; $i < $count; $i++)
    {
        if (trim($choked['admin'][$i] != ''))
        {
            $sql = "insert into project_members(Pid,Team_members)values('$Pid','" . mysqli_real_escape_string($con, $choked['admin'][$i]) . "')";
            mysqli_query($con, $sql);

        }
    }

    for ($i = 0; $i < $count1; $i++)
    {
        if (trim($choked1['manager'][$i] != ''))
        {
            $sql1 = "insert into project_members(Pid,Team_members)values('$Pid','" . mysqli_real_escape_string($con, $choked1['manager'][$i]) . "')";
            mysqli_query($con, $sql1);

        }
    }


    for ($i = 0; $i < $count2; $i++)
    {
        if (trim($choked2['employee'][$i] != ''))
        {
            $sql2 = "insert into project_members(Pid,Team_members)values('$Pid','" . mysqli_real_escape_string($con, $choked2['employee'][$i]) . "')";
            mysqli_query($con, $sql2);

        }
    }



    echo "insertion successful ".$Pid." ".$count+$count1+$count2;
}


else
    echo "insertion failure".mysqli_error($con);


?>