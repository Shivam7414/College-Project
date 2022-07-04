<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <!--fontawesome-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">


  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat'sans-serif;
      background-color: #252526;
    }

    .main-content {
      margin-top: 50px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .content-container {
      display: flex;

      margin-top: 40px;
      margin-bottom: 40px;

    }

    .img {

      display: flex;
      height: 400px;
      width: 400px;

    }

    .content {


      height: 400px;
      width: 600px;
      padding: 20px 40px;
      color: white;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;

    }

    .user {
      width: 270px;
      height: 80px;
      display: inline-flex;
      margin: 3px 3px;

    }

    .icon {

      width: 70px;
      height: 70px;
      border-radius: 50%;
      margin-right: 10px;

    }

    .name {
      width: 150px;
      height: 70px;

    }

    .heading {
      width: auto;
      height: 50px;
      margin: 18px 3px;
      color:#7C4DFF;

    }

    .sub-content {
      width: auto;
      height: 150px;
      margin: 3px 3px;
    }

    .p1 {
      position: relative;
      top: 10px;
    }
    .college-image{
      object-fit: cover; 
      overflow :hidden ;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;

    }
  </style>


  <title>StudentOcean</title>
</head>


<body>
  <?php

  include 'dbconfig.php';
  session_start();
  $user_id = $_SESSION['user_id'];

  if (!isset($user_id)) {
    header('location:userlogin.php');
  };

  if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:userlogin.php');
  }


  ?>
  <?php
  $select = mysqli_query($conn, "SELECT * FROM `register` WHERE id = '$user_id'") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
  }
  ?>
  <header class="header">
    <div class="header-inner"> 
      <div class="container-fluid px-lg-5">
        <nav class="navbar navbar-expand-lg my-navbar">
          <p class="navbar-brand"><span class="logo">
              <img src="img/logo5.png" class="img-fluid" style="width:30px; margin:-3px 0px 0px 0px;">StudentOcean</span>
          </p>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars" style="margin:5px 0px 0px 0px;"></i></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto">
              <li class="nav-item active">
                <a class="nav-link" href="./Homepage.php">Home<span class="sr-only">(current)</span></a>
              </li>
              <div class="dropdown">
                <button class="dropbtn">Study Resources</button>
                <div class="dropdown-content">
                  <a href="./semester1.html">Semester-1</a>
                  <a href="./semester2.html">Semester-2</a>
                  <a href="./semester3.html">Semester-3</a>
                  <a href="./semester4.html">Semester-4</a>
                  <a href="./semester5.html">Semester-5</a>
                  <a href="./semester6.html">Semester-6</a>
                </div>
              </div>
              <li class="nav-item">
                <a class="nav-link" href="teacher.php">Teacher</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./placement.php">Placement</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./about.html">About Us</a>
              </li>
            </ul>
            <div class="div-inline my-1 my-lg-0">
              <button class="header-btn my-5 my-sm-0" onclick="window.location.href='studentdashborad.php'"><?php echo $fetch['uname']; ?></button>
              <button class="header-btn my-5 my-sm-0" onclick="window.location.href='index.html? logout = <?php echo $user_id; ?>'">Logout</button>
            </div>
          </div>
        </nav>

      </div>
    </div>


  </header>



  <section class="content-banner">

    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
          <div class="banner-con text-center">
            <p class="first-title">Student Ocean</p>
            <p class="banner-des">All semester notes,Last year question paper and project report,Teachers can upload
              notes according to Semester...</p>

          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="main-content">
    <center>
      <p style="color: #5c5adb ;font-size:60px">COLLEGE NEWS</p>
    </center>
    <?php
    $query = "SELECT  * from teacher  INNER JOIN eventnews on teacher.id=eventnews.tid ; ";
    $query_run = mysqli_query($conn, $query);
    $fetch_data = mysqli_num_rows($query_run) > 0;
    if ($fetch_data) {
      while ($row = mysqli_fetch_assoc($query_run)) {

    ?>
        <div class="content-container">

          <div class="img"> <img src="eventnews/<?php echo $row['eventnewsimage'] ?>" alt="" style="object-fit: cover; overflow :hidden; "class="college-image"></div>
          <div class="content">
            <div class="user">
              <img src="teacherimg/<?php echo $row['image'] ?>" alt=""  class="icon">
              <div class="name">
                <p class="p1"><?php echo $row['name'] ?></p>
                <p class="p2"><?php echo $row['date'] ?></p>
              </div>
            </div>
            <div class="heading">
              <h2><?php echo $row['title'] ?></h2>
            </div>
            <div class="sub-content">
              <p><?php echo $row['description'] ?></p>
            </div>
          </div>
        </div>
    <?php
      }
    }

    ?>



  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript">
    $(function() {
      var navbar = $('.header-inner');
      $(window).scroll(function() {
        if ($(window).scrollTop() <= 40) {
          navbar.removeClass('navbar-scroll');
        } else {
          navbar.addClass('navbar-scroll');
        }
      });
    });
  </script>
  <script type="text/javascript">
    $(function() {
      var navbar = $('.header-inner');
      $(window).scroll(function() {
        if ($(window).scrollTop() <= 40) {
          navbar.removeClass('navbar-scroll');
        } else {
          navbar.addClass('navbar-scroll');
        }
      });
    });
  </script>
</body>

</html>