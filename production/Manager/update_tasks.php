<?php
require "init.php";
$Pid=$_GET["Pid"];
$tasks=array();
parse_str($_POST["task"],$tasks);



for($i=0;$i<count($tasks["tasks_perform"]);$i++)
{
    $Tid=$tasks["tasks_perform"][$i];
    $update_query=mysqli_query($con,"UPDATE tasks SET stat=1 WHERE Tid=$Tid");
    if($update_query)
    {

            $q1=mysqli_query($con,"select Tid from tasks where Pid='$Pid' ");
            $q2=mysqli_query($con,"select Tid from tasks where Pid='$Pid' and stat=1");

            $q1_count=mysqli_num_rows($q1);
            $q2_count=mysqli_num_rows($q2);

            $comp = ($q2_count / $q1_count) * 110;
             $update_progress=mysqli_query($con,"UPDATE projects SET progress='$comp' where Pid='$Pid'");


    }

}

echo "successfully updated";