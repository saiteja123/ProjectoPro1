<?php
require "init.php";
require "functions.php";

$uname=test_input($_POST["name"]);
$email=test_input($_POST["email"]);
$gender=test_input($_POST["gender"]);
$password=test_input($_POST["password"]);
$DOB=test_input($_POST["date"]);
$designation=test_input($_POST["designation"]);
$department=test_input($_POST["department"]);
$contact=test_input($_POST["phone"]);

$sql_query="insert into user_info values(null,'$uname','$email','$gender','$password','$DOB','$designation','$department','$contact');";
     	if(mysqli_query($con,$sql_query))
          {
              echo "<h3>Data insertion success..<h3>";
          }
           else
            {
               echo "Data insertion error..".mysqli_error($con);
            }


?>