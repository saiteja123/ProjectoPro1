<?php
require "init.php";
require "functions.php";
session_start();

$uname=test_input($_POST["name"]);
$email=test_input($_POST["email"]);
$gender=test_input($_POST["gender"]);
$password=test_input($_POST["password"]);
$DOB=test_input($_POST["date"]);
$designation=test_input($_POST["designation"]);
$department=test_input($_POST["department"]);
$contact=test_input($_POST["phone"]);

$file_name = $_FILES['profile']['name'];
$file_size =$_FILES['profile']['size'];
$file_tmp =$_FILES['profile']['tmp_name'];
$file_type=$_FILES['profile']['type'];

if($file_size > 2097152){
    $errors[]='File size must be excately 2 MB';
}

if(empty($errors)==true){
    move_uploaded_file($file_tmp,"../profiles/".$file_name);
}

$query=mysqli_query($con,"select Uname from user_info where Uname='".$uname."';");

if(mysqli_num_rows($query)>0)
    {
    $_SESSION["uname_error"]="username already exists";
    redirect_to("registration.php");
    exit();

    }
    else{
    $_SESSION["uname_error"]="";
    $sql_query="insert into user_info values(null,'$uname','$email','$gender','$password','$DOB','$designation','$department','$contact','$file_name');";
         	if(mysqli_query($con,$sql_query))
              {
                  echo "<h3>Data insertion success..<h3>";
              }
               else
                {
                   echo "Data insertion error..".mysqli_error($con);
                }
    }





?>