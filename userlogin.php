
<?php

//student login

include 'dbconfig.php';
session_start();

if (isset($_POST['Studentlogin'])) {

    $name = mysqli_real_escape_string($conn, $_POST['stuname']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

    $select = mysqli_query($conn, "SELECT * FROM `register` WHERE uname = '$name' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['id'];
        header('location:Homepage.php');
    } else {
        echo "<script> 
        alert('password not match');
        window.location.href='index.html'; 
        </script>";
    }
}

//teacher login

if (isset($_POST['teacherlogin'])) {

    $name = mysqli_real_escape_string($conn, $_POST['tname']);
    $pass = mysqli_real_escape_string($conn,$_POST['tpass']);

    $select = mysqli_query($conn, "SELECT * FROM `teacher` WHERE name = '$name' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['teacher_id'] = $row['id'];
        header('location:Teacherdashboard.php');
    } else {
        echo "<script> 
        alert('password not match');
        window.location.href='index.html'; 
        </script>";
    }
}

