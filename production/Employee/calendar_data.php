<?php
require "init.php";
$Pid=$_GET["Pid"];

if(isset($_POST['action']) or isset($_GET['view'])) //show all events
{
    if(isset($_GET['view']))
    {
        header('Content-Type: application/json');

        $start = mysqli_real_escape_string($connection,$_GET["start"]);

        $end = mysqli_real_escape_string($connection,$_GET["end"]);

        $result = mysqli_query($connection,"SELECT id, start ,end ,title FROM  events where (date(start) >= ‘$start’ AND date(start) <= ‘$end’)");

        while($row = mysqli_fetch_assoc($result))
        {
            $events[] = $row;
        }

        echo json_encode($events);

        exit;

    }

    elseif($_POST['action'] == "add") // add new event section

    {

        mysqli_query($connection,"INSERT INTO events (Pid,title,start_date,end_date)VALUES ($Pid,
                                        '".mysqli_real_escape_string($connection,$_POST["title"])."', 
                                        '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
                                        '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."'
                                        )");

        header('Content-Type: application/json');

        echo '{"id":"'.mysqli_insert_id($connection).'"}';

        exit;

    }

    elseif($_POST['action'] == "update")  // update event

    {

        mysqli_query($connection,"UPDATE events set 
 
            start_date = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["start"])))."', 
 
            end_date = '".mysqli_real_escape_string($connection,date('Y-m-d H:i:s',strtotime($_POST["end"])))."' 
 
            where Pid = '".mysqli_real_escape_string($connection,$Pid)."'");

        exit;

    }

    elseif($_POST['action'] == "delete")  // remove event

    {

        mysqli_query($connection,"DELETE from events where Pid = '".mysqli_real_escape_string($connection,$Pid)."'");

        if (mysqli_affected_rows($connection) > 0) {

            echo "1";

        }

        exit;

    }

}

?>