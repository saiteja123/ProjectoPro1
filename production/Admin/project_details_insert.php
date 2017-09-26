<?php
$connect = mysqli_connect("localhost", "root", "root", "projectopro");


$Pid=$_POST["Project_ID"];
$Title=$_POST["Project_Title"];
$Description=$_POST["description"];
$Problem_statement=$_POST["problem_statement"];
$Project_goal=$_POST["project_Goal"];
$objectives = count($_POST["objective"]);
$modules=count($_POST["module"]);
$requirements=count($_POST["requirement"]);
$From=($_POST["From"]);
$To=($_POST["To"]);
$Budget=$_POST["Budget"];
$Type=$_POST["Type"];

$sql = "INSERT INTO project_details(Pid,Title,Description,Problem_statement,Project_goal,Start_date,End_date,Tot_budget,Project_type) 
        VALUES('$Pid','$Title','$Description','$Problem_statement','$Project_goal','$From','$To','$Budget','$Type')";

if($objectives > 0)
{
    for ($i = 0; $i < $objectives; $i++)
    {
        if (trim($_POST["objective"][$i] != ''))
        {
            $sql1 = "insert into objectives(Pid,Objective)values('$Pid','" . mysqli_real_escape_string($connect, $_POST["objective"][$i]) . "')";
            mysqli_query($connect, $sql1);
        }
    }
}

if($modules > 0)
{
    for ($i = 0; $i < $modules; $i++)
    {
        if (trim($_POST["objective"][$i] != ''))
        {
            $sql2 = "insert into modules(Mid,Pid,Modules,Assigned_to,Start_date,End_date)values(null,'$Pid','" . mysqli_real_escape_string($connect, $_POST["module"][$i]) . "',null,null,null)";
            mysqli_query($connect, $sql2);
        }
    }
}

if($requirements > 0)
{
    for ($i = 0; $i < $requirements; $i++)
    {
        if (trim($_POST["objective"][$i] != ''))
        {
            $sql3 = "insert into requirements(Pid,Requirement)values('$Pid','" . mysqli_real_escape_string($connect, $_POST["requirement"][$i]) . "')";
            mysqli_query($connect, $sql3);
        }
    }
}





if (mysqli_query($connect,$sql))
{
    $sql4="insert into projects(Pid,project_name,progress,status)values('$Pid','$Title',10,'Initialized')";
    mysqli_query($connect,$sql4);
    echo json_encode(array("message1" => "data inserted successfully", "message2" => $Pid));
}

else
    echo "data not inserted ".mysqli_error($connect);




?>
