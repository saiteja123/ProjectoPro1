<?php
require "init.php";
require "functions.php";
session_start();

$username=$_POST['uname'];
$pass=$_POST['password'];

$query="select Designation from user_info WHERE Uname='$username' AND Password='$pass'";
$result=mysqli_query($con,$query);

while($row = mysqli_fetch_array($result))
  {
  $desig=$row['Designation'];

  }


if($desig=="admin")
{


$_SESSION['login_user']=$username;
redirect_to("../Admin/Admin_Dashboard.php");
}
else if($desig=="manager")
{
    $_SESSION['login_user']=$username;
    redirect_to("../Manager/Manager_Dashboard.php");
}
else if($desig=="employee")

{
    $_SESSION['login_user']=$username;
    redirect_to("../Employee/Employee_Dashboard.php");
}
else
redirect_to("error_Page.html");
session_unset();
session_destroy();

?>
