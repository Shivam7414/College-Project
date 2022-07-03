<?php
include 'dbconfig.php';
    // session_start();
      if (isset($_POST['form2-save'])) {
        $roll = mysqli_real_escape_string($conn, $_POST['rollno']);
        $age =  mysqli_real_escape_string($conn, $_POST['age']);
        $sem=   mysqli_real_escape_string($conn, $_POST['semester']);
        

        $insert_acd=mysqli_query($conn,"INSERT INTO `academic_info`(`rno`,`age`, `sem`) VALUES ('$roll','$age','$sem')")or die('query failed');
        if($insert_acd){
          echo "<script> 
          alert('academic information inserted successfully');
          window.location.href='studentdashborad.php'; 
          </script>";
        }
        else{
          echo "<script> 
          alert('failed to insert data');
          window.location.href='studentdashborad.php'; 
          </script>";

        }


      }
      session_start();
      $user_id = $_SESSION['user_id'];  
      if(isset($_POST['placement_save'])) {
        $stuname= $fetch['fname']; 
        $phone=$fetch['phoneno'];
        $email=$fetch['email'];
        $username=$fetch['uname'];
        $skill= mysqli_real_escape_string($conn, $_POST['skill']);
        $loc=mysqli_real_escape_string($conn, $_POST['location']);
        $link=mysqli_real_escape_string($conn, $_POST['link']);
        $about=mysqli_real_escape_string($conn, $_POST['about']);

        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'Studentimg/'.$image;

        $resume = $_FILES['resume']['name'];
        $resume_size = $_FILES['resume']['size'];
        $resume_tmp_name = $_FILES['resume']['tmp_name'];
        $resume_folder = 'resume/'.$resume;

          

   
        
      if($image_size > 2000000){
        echo "<script> 
        alert('image is too large');
        window.location.href='studentdashborad.php'; 
        </script>";
       }else{
        $insert_placement=mysqli_query($conn,"INSERT INTO `placement`(`skill`, `location`, `linkdin`, `about`,`profile`,`resume`,`student_id`) 
        VALUES ('$skill','$loc','$link','$about','$image','$resume','$user_id')")or die('query2 failed');
        if( $insert_placement){
          move_uploaded_file($image_tmp_name, $image_folder);
          move_uploaded_file( $resume_tmp_name,  $resume_folder);
          echo "<script> 
          alert('placement information inserted successfully');
          window.location.href='studentdashborad.php'; 
          </script>";
        }
        else{
          echo "<script> 
          alert('failed to insert information');
          window.location.href='studentdashborad.php'; 
          </script>";

        }

      }
      }

?>