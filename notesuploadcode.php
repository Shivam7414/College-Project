<?php
include 'dbconfig.php';
session_start();
$teacher_id = $_SESSION['teacher_id'];
if (isset($_POST['Save_notes'])) {

    $select = mysqli_query($conn, "SELECT * FROM `teacher` WHERE id = '$teacher_id'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $fetch = mysqli_fetch_assoc($select);
    }
  
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['desc']);
    $semester = mysqli_real_escape_string($conn, $_POST['semester']);
    $tname = $fetch['name'];

    $notes = $_FILES['notes']['name'];
    $notes_size = $_FILES['notes']['size'];
    $notes_tmp_name = $_FILES['notes']['tmp_name'];
    $notes_folder = 'Teachernotes/'.$notes;
    
        $query = mysqli_query($conn, "INSERT INTO `notesupload`(`notes_title`, `notes_desc`, `teacher_name`, `notesname`, `semester`,`teacher_id`) 
        VALUES ('$title','$description',' $tname','$notes',' $semester','$teacher_id')") or die ("Query failed");
        if ($query) {
            move_uploaded_file($notes_tmp_name, $notes_folder);
            echo "<script> 
                alert('Notes uploaded successfully');
                window.location.href='eventnews.php'; 
                </script>";
        } else {
            echo "<script> 
                alert('failed to upload notes');
                window.location.href='eventnews.php'; 
                </script>";
        }
}
