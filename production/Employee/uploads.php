<?php
require "init.php";

if (isset($_FILES['files']) && !empty($_FILES['files']))
{

    $errors= array();
    $Pid=$_GET["Pid"];


    $extensions= array("jpeg","jpg","png","pdf","txt","doc","docx","gif","rar");

    $no_files = count($_FILES["files"]['name']);
    for ($i = 0; $i < $no_files; $i++)
    {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_type = $_FILES['files']['type'][$i];

        if($file_size > 2097152)
        {
            $errors[]='File size must be excately 2 MB';
        }
        if (file_exists('../uploads/' . $_FILES["files"]["name"][$i]))
        {
            $errors[]= 'File already exists : uploads/' . $_FILES["files"]["name"][$i];
        }
        if(empty($errors)==true)
        {
            move_uploaded_file($_FILES["files"]["tmp_name"][$i], 'uploads/' . $_FILES["files"]["name"][$i]);
            echo 'File successfully uploaded : uploads/' . $_FILES["files"]["name"][$i] . ' ';
            $query=mysqli_query($con,"insert into file_uploads(Pid,file_id,file_name,file_type) values('$Pid',null,'".$_FILES["files"]["name"][$i]."','".$_FILES["files"]["type"][$i]."');");
        }
        else
        {
            print_r($errors);
        }

    }
}
else {
    echo 'Please choose at least one file'.mysqli_error($con);
}

?>