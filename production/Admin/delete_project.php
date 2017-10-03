<?php
require 'init.php';
$delete_query=mysqli_query($con,"delete from project_details where Pid='".$_POST["Pid"]."'");
$delete_query1=mysqli_query($con,"delete from projects where Pid='".$_POST["Pid"]."'");
$delete_query2=mysqli_query($con,"delete from objectives where Pid='".$_POST["Pid"]."'");
$delete_query3=mysqli_query($con,"delete from modules where Pid='".$_POST["Pid"]."'");
$delete_query4=mysqli_query($con,"delete from requirements where Pid='".$_POST["Pid"]."'");
$delete_query5=mysqli_query($con,"delete from project_members where Pid='".$_POST["Pid"]."'");
$delete_query6=mysqli_query($con,"delete from tasks where Pid='".$_POST["Pid"]."'");
$delete_query7=mysqli_query($con,"delete from file_uploads where Pid='".$_POST["Pid"]."'");
if($delete_query&&$delete_query1&&$delete_query2&&$delete_query3&&$delete_query4&&$delete_query5&&$delete_query6&&$delete_query7)
{
    echo "project ".$_POST["Pid"]." deleted successfully";
}
else
{
    echo "operation failed".mysqli_error($con);
}
?>