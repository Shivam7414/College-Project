<?php
  include 'dbconfig.php';
  session_start();
  $teacher_id=$_SESSION['teacher_id'];
  if (!isset($teacher_id)) {
    header('location:userlogin.php');
  };

  if (isset($_GET['logout'])) {
    unset($teacher_id);
    session_destroy();
    header('location:userlogin.php');
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Teacherdashboard</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      list-style: none;
      text-decoration: none;
      box-sizing: border-box;
      font-family: "Roboto", sans-serif;
    }

    body {
      background: #fff;
    }

    .wrapper .header {
      z-index: 1;
      background: #22242A;
      position: fixed;
      width: calc(100% - 0%);
      height: 70px;
      display: flex;
      top: 0;
    }

    .wrapper .header .header-menu {
      width: calc(100% - 0%);
      height: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    }

    .wrapper .header .header-menu .title {
      color: #fff;
      font-size: 25px;
      text-transform: uppercase;
      font-weight: 900;
    }

    .wrapper .header .header-menu .title span {
      color: #4CCEE8;
    }

    .wrapper .header .header-menu .sidebar-btn {
      color: #fff;
      position: absolute;
      margin-left: 240px;
      font-size: 22px;
      font-weight: 900;
      cursor: pointer;
      transition: 0.3s;
      transition-property: color;
    }

    .wrapper .header .header-menu .sidebar-btn:hover {
      color: #4CCEE8;
    }

    .wrapper .header .header-menu ul {
      display: flex;
    }

    .wrapper .header .header-menu ul li a {
      background: #fff;
      color: #000;
      display: block;
      margin: 0 10px;
      font-size: 18px;
      width: 34px;
      height: 34px;
      line-height: 35px;
      text-align: center;
      border-radius: 50%;
      transition: 0.3s;
      transition-property: background, color;
    }

    .wrapper .header .header-menu ul li a:hover {
      background: #4CCEE8;
      color: #fff;
    }

    .wrapper .sidebar {
      z-index: 1;
      background: #2F323A;
      position: fixed;
      top: 70px;
      width: 250px;
      height: 100%;
      transition: 0.3s;
      transition-property: width;
      overflow-y: auto;
    }

    .wrapper .sidebar .sidebar-menu {
      overflow: hidden;
    }

    .wrapper .sidebar .sidebar-menu .profile img {
      margin: 20px 0;
      width: 100px;
      height: 100px;
      border-radius: 50%;
    }

    .wrapper .sidebar .sidebar-menu .profile p {
      color: #bbb;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .wrapper .sidebar .sidebar-menu .item {
      width: 250px;
      overflow: hidden;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn {
      display: block;
      color: #fff;
      position: relative;
      padding: 25px 20px;
      transition: 0.3s;
      transition-property: color;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn:hover {
      color: #4CCEE8;
    }

    .wrapper .sidebar .sidebar-menu .item .menu-btn i {
      margin-right: 20px;
    }

    .wrapper .main-container {
      width: (100% - 250px);

      margin-left: 250px;
      padding: 15px;
      background: #22242A;
      background-size: cover;
      height: 100vh;
      transition: 0.3s;
    }

    .wrapper.collapse .sidebar {
      width: 70px;
    }

    .wrapper.collapse .sidebar .profile img,
    .wrapper.collapse .sidebar .profile p,
    .wrapper.collapse .sidebar a span {
      display: none;
    }

    .wrapper.collapse .sidebar .sidebar-menu .item .menu-btn {
      font-size: 23px;
    }



    .wrapper.collapse .main-container {
      width: calc(100% - 70px);
      margin-left: 70px;
    }

    .wrapper .main-container .card {
      background: #22242A;
      padding: 15px;

      font-size: 14px;
    }


    .group {
      position: relative;
      margin-bottom: 45px;
    }

    input {
      font-size: 18px;
      padding: 10px 10px 10px 5px;
      display: block;
      width: 300px;
      border: none;
      border-bottom: 1px solid #757575;
      background: #22242A;
      color: white;
    }

    input:focus {
      outline: none;
    }


    label {
      color: white;
      font-size: 18px;
      font-weight: normal;
      position: absolute;
      pointer-events: none;
      left: 5px;
      top: 10px;
      transition: 0.2s ease all;
      -moz-transition: 0.2s ease all;
      -webkit-transition: 0.2s ease all;
    }

    /* active state */
    input:focus~label,
    input:valid~label {
      top: -20px;
      font-size: 14px;
      color: #4760c5;
    }

    /* BOTTOM BARS ================================= */
    .bar {
      position: relative;
      display: block;
      width: 300px;
    }

    .bar:before,
    .bar:after {
      content: '';
      height: 2px;
      width: 0;
      bottom: 1px;
      position: absolute;
      background: #5264AE;
      transition: 0.2s ease all;
      -moz-transition: 0.2s ease all;
      -webkit-transition: 0.2s ease all;
    }

    .bar:before {
      left: 50%;
    }

    .bar:after {
      right: 50%;
    }

    /* active state */
    input:focus~.bar:before,
    input:focus~.bar:after {
      width: 50%;
    }

    /* HIGHLIGHTER ================================== */
    .highlight {
      position: absolute;
      height: 60%;
      width: 100px;
      top: 25%;
      left: 0;
      pointer-events: none;
      opacity: 0.5;
    }

    .main-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin-top: 20px;
    }

    .btn {
      border: none;
      text-decoration: none;
      color: rgba(255, 255, 255, 0.95);
      cursor: pointer;
      background-color: #2F323A;
      transition: 0.3s all ease-in-out;
      width: 150px;
      box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
      border-radius: 3px;
    }


    .btn:hover {
      background: rgba(0, 0, 0, 0.2);
      box-shadow: 0px 0px 10px 5px rgba(255, 255, 255, 0.85);
    }

    .upload-btn-wrapper {
      position: relative;
      overflow: hidden;
      display: inline-block;
      left: 170px;
      top: -40px;

    }

    .upload-btn {
      border: none;
      text-decoration: none;
      color: rgba(255, 255, 255, 0.95);
      cursor: pointer;
      background-color: #2F323A;
      transition: 0.3s all ease-in-out;
      width: 150px;
      box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 3px, rgba(0, 0, 0, 0.24) 0px 1px 2px;
      border-radius: 3px;
      height: 40px;
      font-size: 20px;
    }


    .upload-btn-wrapper input[type=file] {
      font-size: 100px;
      position: absolute;
      left: 0;
      top: 0;
      opacity: 0;
    }
  </style>
</head>

<body>
<?php
      $select = mysqli_query($conn, "SELECT * FROM `teacher` WHERE id = '$teacher_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
  <!--wrapper start-->
  <div class="wrapper">
    <!--header menu start-->
    <div class="header">
      <div class="header-menu">
        <div class="title">Student<span>ocean</span></div>
        <div class="sidebar-btn">
          <i class="fas fa-bars"></i>
        </div>
        <ul>

          <li><a href="index.html?logout=<?php echo $teacher_id; ?>" ><i class="fas fa-power-off"></i></a></li>
        </ul>
      </div>
    </div>
    <!--header menu end-->
    <!--sidebar start-->
    <div class="sidebar">
      <div class="sidebar-menu">
        <center class="profile">
        <?php
         if($fetch['image'] == ''){
            echo '<img src="img/default-avatar.jpg">';
         }else{
            echo '<img src="teacherimg/'.$fetch['image'].'">';
         }
         ?>
          <p><?php echo $fetch['name'] ?></p>
        </center>
        <li class="item" id="profile">
          <a href="Teacherdashboard.php" class="menu-btn">
            <i class="fas fa-user-circle"></i><span>Profile</span>
          </a>

        </li>
        <li class="item" id="profile">
          <a href="Teacherviewdashboard.php" class="menu-btn">
            <i class="fas fa-chart-line"></i><span>Dashboard</span>
          </a>

        </li>
        <li class="item">
          <a href="notesupload.php" class="menu-btn">
            <i class="fa fa-upload"></i><span>Upload Notes</span>
          </a>
        </li>

        <li class="item" id="messages">
          <a href="eventnews.php" class="menu-btn">
            <i class="fas fa-calendar-day"></i><span>Event and News </span>
          </a>

        </li>

      </div>
    </div>
    


    <div class="main-container">
      <div class="profile-container">
        <form action="updateteacher.php" method="POST" class="profile" enctype="multipart/form-data">


          <div class="group">
            <input type="text" name="teacher_name" value="<?php echo $fetch['name']; ?>">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Name</label>
          </div>
          <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
          <div class="group">
            <input type="password" name="update_pass" >
            <span class="highlight" ></span>
            <span class="bar"></span>
            <label>Enter old password</label>
          </div>
          <div class="group">
            <input type="password"name="new_pass">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Enter new password</label>
          </div>
          <div class="group">
            <input type="password"  name="confirm_pass"> 
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Confirm password</label>
          </div>
          <input type="submit" value="Update" class="btn" name="update_teacher_profile">
          <div class="upload-btn-wrapper">
            <button class="upload-btn">Upload Profile</button>
            <input type="file" accept="image/jpg, image/jpeg, image/png" name="update_image" />
          </div>
        </form>
      </div>


      <script type="text/javascript">
        $(document).ready(function() {
          $(".sidebar-btn").click(function() {
            $(".wrapper").toggleClass("collapse");
          });
        });
      </script>

</body>

</html>