<?php
 include 'dbconfig.php';
 session_start();
 $teacher_id=$_SESSION['teacher_id'];

 if(isset($_POST['update_teacher_profile'])){

    $update_name = mysqli_real_escape_string($conn, $_POST['teacher_name']);
    mysqli_query($conn, "UPDATE `teacher` SET name = '$update_name '  WHERE id = '$teacher_id'") or die('query failed');
 
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($conn,$_POST['update_pass']);
    $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
    $confirm_pass = mysqli_real_escape_string($conn, $_POST['confirm_pass']);
 
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
       if($update_pass != $old_pass){
          echo "<script> 
          alert(' Old password not match !'); 
          window.location.href='Teacherdashboard.php'; 
          </script>";
       }elseif($new_pass != $confirm_pass){
        echo "<script> 
        alert(' confrim password not match !');
        window.location.href='Teacherdashboard.php'; 
        </script>";
       }else{
          mysqli_query($conn, "UPDATE `teacher` SET password = '$confirm_pass' WHERE id = '$teacher_id'") or die('query failed');
          echo "<script> 
          alert('password updated sucessfully !');
          window.location.href='Teacherdashboard.php'; 
          </script>";
       }
    }
 
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = 'teacherimg/'.$update_image;
    echo $update_image;
 
    if(!empty($update_image)){
       if($update_image_size > 6000000){
        echo "<script> 
        alert('  image is too large !');
        window.location.href='Teacherdashboard.php'; 
        </script>";
       }else{
          $image_update_query = mysqli_query($conn, "UPDATE `teacher` SET image = '$update_image' WHERE id = '$teacher_id'") or die('query failed');
          if($image_update_query){
             move_uploaded_file($update_image_tmp_name, $update_image_folder);
             echo "<script> 
             alert('  Image updated successfully !');
             window.location.href='Teacherdashboard.php'; 
             </script>";
          }
         
       }
    }
 
 }
