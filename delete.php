<?php
include 'dbconfig.php';
if ($_GET['eventnews_id'])
{
    $event_id = $_GET['eventnews_id'];
    $query="DELETE FROM eventnews WHERE event_id= '$event_id' ";
    $result=mysqli_query($conn,$query);
    if($result){
        header("location:teacherviewdashboard.php");
    }
}
?>