<?php
include 'dbconfig.php';
#For Register

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $user_name = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['repassword']));
    $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);


    $select = mysqli_query($conn, "SELECT * FROM `register` WHERE uname = '$user_name' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        echo "<script> 
        alert('User already exists');
        window.location.href='index.html'; 
        </script>";
    } else {

        if ($pass != $cpass) {
            echo "<script> 
        alert('password not match');
        window.location.href='index.html'; 
        </script>";
        } else {

            $insert = mysqli_query($conn, "INSERT INTO `register`(fname,uname, email, password, phoneno) VALUES('$name','$user_name', '$email', '$pass', '$phoneno')") or die('query failed');

            if ($insert) {
                header('location:index.html');
            } else {
                echo "<script> 
            alert('registeration failed');
            window.location.href='index.html'; 
            </script>";
            }
        }
    }
}
