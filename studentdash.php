<?php
include 'dbconfig.php';
session_start();
$user_id = $_SESSION['user_id'];
//insert acdmic data

if (isset($_POST['form2-save'])) {
  $roll = mysqli_real_escape_string($conn, $_POST['rollno']);
  $age =  mysqli_real_escape_string($conn, $_POST['age']);
  $sem =   mysqli_real_escape_string($conn, $_POST['semester']);
  $check_user = mysqli_query($conn, "SELECT * FROM `academic_info` WHERE student_id = '$user_id'") or die('failed to serch');
  if (mysqli_num_rows($check_user) > 0){
    $update_acd = mysqli_query($conn, "UPDATE `academic_info` SET `rno`='$roll',`age`='$age',`sem`='$sem' WHERE student_id='$user_id'");
    if($update_acd){
      echo "<script> 
      alert('academic information updated successfully');
      window.location.href='studentdashborad.php'; 
      </script>";
    }else{
      echo "<script> 
      alert('failed to update data');
      window.location.href='studentdashborad.php'; 
      </script>";
    }

  }
  else{
  $insert_acd = mysqli_query($conn, "INSERT INTO `academic_info`(`rno`,`age`, `sem`, `student_id`) VALUES ('$roll','$age','$sem','$user_id')") or die('query failed');
  if ($insert_acd) {
    echo "<script> 
          alert('academic information inserted successfully');
          window.location.href='studentdashborad.php'; 
          </script>";
  } else {
    echo "<script> 
          alert('failed to insert data');
          window.location.href='studentdashborad.php'; 
          </script>";
  }
}
}
//insert student data 

if (isset($_POST['placement_save'])) {
  $stuname = $fetch['fname'];
  $phone = $fetch['phoneno'];
  $email = $fetch['email'];
  $username = $fetch['uname'];
  $skill = mysqli_real_escape_string($conn, $_POST['skill']);
  $loc = mysqli_real_escape_string($conn, $_POST['location']);
  $link = mysqli_real_escape_string($conn, $_POST['link']);
  $about = mysqli_real_escape_string($conn, $_POST['about']);

  $image = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = 'Studentimg/' . $image;

  $resume = $_FILES['resume']['name'];
  $resume_size = $_FILES['resume']['size'];
  $resume_tmp_name = $_FILES['resume']['tmp_name'];
  $resume_folder = 'resume/' . $resume;
  $select = mysqli_query($conn, "SELECT * FROM `placement` WHERE student_id = '$user_id'") or die('query failed');

  if (mysqli_num_rows($select) > 0) {
    echo "<script> 
            alert('you already inserted data');
            window.location.href='studentdashborad.php'; 
            </script>";
  } else {

    if ($image_size > 2000000) {
      echo "<script> 
        alert('image is too large');
        window.location.href='studentdashborad.php'; 
        </script>";
    } else {

      $insert_placement = mysqli_query($conn, "INSERT INTO `placement`(`skill`, `location`, `linkdin`, `about`,`profile`,`resume`,`student_id`) 
        VALUES ('$skill','$loc','$link','$about','$image','$resume','$user_id')") or die('query2 failed');
      $update_placement = mysqli_query($conn, "UPDATE `placement` SET `skill`='$skill',`location`='$loc',`linkdin`='$link',`about`='$about',`profile`='$image',`resume`='$resume' WHERE student_id='$user_id'") or die('query3 failed');

      if ($update_placement) {
        move_uploaded_file($image_tmp_name, $image_folder);
        move_uploaded_file($resume_tmp_name,  $resume_folder);
        echo "<script> 
          alert('placement information inserted successfully');
          window.location.href='studentdashborad.php'; 
          </script>";
      } else {
        echo "<script> 
          alert('failed to insert information');
          window.location.href='studentdashborad.php'; 
          </script>";
      }
    }
  }
}

//update placement data
if (isset($_POST['placement_update'])) {
  $skill = mysqli_real_escape_string($conn, $_POST['skill']);
  $loc = mysqli_real_escape_string($conn, $_POST['location']);
  $link = mysqli_real_escape_string($conn, $_POST['link']);
  $about = mysqli_real_escape_string($conn, $_POST['about']);

  $image = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $image_folder = 'Studentimg/' . $image;

  $resume = $_FILES['resume']['name'];
  $resume_size = $_FILES['resume']['size'];
  $resume_tmp_name = $_FILES['resume']['tmp_name'];
  $resume_folder = 'resume/' . $resume;


  if ($image_size > 2000000) {
    echo "<script> 
        alert('image is too large');
        window.location.href='studentdashborad.php'; 
        </script>";
  } else {

    $update_placement = mysqli_query($conn, "UPDATE `placement` SET `skill`='$skill',`location`='$loc',`linkdin`='$link',`about`='$about',`profile`='$image',`resume`='$resume' WHERE student_id='$user_id'") or die('update failed');

    if ($update_placement) {
      move_uploaded_file($image_tmp_name, $image_folder);
      move_uploaded_file($resume_tmp_name,  $resume_folder);
      echo "<script> 
          alert('placement information updated successfully');
          window.location.href='studentdashborad.php'; 
          </script>";
    } else {
      echo "<script> 
          alert('failed to update information');
          window.location.href='studentdashborad.php'; 
          </script>";
    }
  }
}
