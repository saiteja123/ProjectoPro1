<?php
require "init.php";


$Pid=$_GET["Pid"];

$tasks=array();
$select=array();
$duration=array();
$start=array();
$end=array();

$count=0;

parse_str($_POST["tasks"],$tasks);
parse_str($_POST["select"],$select);
parse_str($_POST["duration"],$duration);
parse_str($_POST["start"],$start);
parse_str($_POST["end"],$end);



$mod_sql="select Mid from modules where Pid='$Pid'";
$mod_result=mysqli_query($con,$mod_sql);
$i=0;
$mod_array=array();
while($mod_row=mysqli_fetch_assoc($mod_result))
{
    $mod_array[$i]=$mod_row['Mid'];
    $i++;
}

$mod_count=count($mod_array);



for($i=0;$i<$mod_count;$i++)
{
    for ($x = 0; $x < count($tasks["Task$i"]); $x++)
    {
        if (trim($tasks["Task$i"][$x] != ''))
        {
            $tasks_query = "insert into tasks(Pid,Mid,Tid,Task,stat)values('$Pid','$mod_array[$i]',null,'" . $tasks["Task$i"][$x] . "',0)";
            if (mysqli_query($con, $tasks_query))
            {
                $count++;
            }

        }
    }


    if(trim($select["sel"][$i] != '')&&trim($duration["duration"][$i] != '')&&trim($start["start"][$i] != '')&&trim($end["end"][$i] != ''))
    {
        $assign_query="UPDATE modules
                       SET Assigned_to='".$select["sel"][$i]."',Start_date='".$start["start"][$i]."' ,End_date='".$end["end"][$i]."'
                       WHERE Mid=$mod_array[$i]";
        if(mysqli_query($con,$assign_query))
        {
            $message="updated";
        }
        else
            $message="".mysqli_error($con);

    }

}



if($count)
    echo $count." tasks assigned".$message;
else
    echo "tasks not assigned".mysqli_error($con);



?>