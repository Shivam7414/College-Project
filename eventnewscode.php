<?php
include 'dbconfig.php';
session_start();
$teacher_id = $_SESSION['teacher_id'];
if (isset($_POST['Save_news'])) {

    $select = mysqli_query($conn, "SELECT * FROM `teacher` WHERE id = '$teacher_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
  
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $date =date("Y-m-d");;

    $tid = $fetch['id'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'eventnews/'.$image;
    
        $query = mysqli_query($conn, "INSERT INTO `eventnews`( `title`, `description`, `category`,`eventnewsimage`,`date`, `tid`) 
        VALUES('$title','$description','$category','$image','$date','$tid')") or die ("Query failed");
        if ($query) {
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "<script> 
                alert('News/Event added successfully');
                window.location.href='eventnews.php'; 
                </script>";
        } else {
            echo "<script> 
                alert('failed to insert data');
                window.location.href='eventnews.php'; 
                </script>";
        }
    
    
  

}
