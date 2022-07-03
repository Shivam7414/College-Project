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
      background: #22242A;
      ;
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
      height: auto;
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

    .content-title {
      margin-top: 80px;
      font-size: 50px;
      color: #4CCEE8;
    }

    .content {
      margin-top: 50px;
      margin-left: 50px;
      display: flex;
      flex-wrap: wrap;
      justify-content: start;
    }

    .data {
      background-color: #22242A;
      color: white;
      width: 300px;
      height: auto;
      margin: 10px;
      font-size: 20px;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
    }

    .delete-btn-coloured {
      text-decoration: none;
      background: #00acec;
      border: 2px solid #00ACEC;
      padding: 10px 20px 10px 20px;
      color: #FFFFFF;
      text-align: center;
      width: 100%;
      border-radius: 10px;
    }

    .delete-btn:hover {
      color: #FFFFFF;
      background-color: #00acec;
    }

    .delete-btn-coloured:hover {
      color: #FFFFFF;
      background-color: #009FDB;
    }

    .inside-content {
      display: flex;
      justify-content: flex-end;

    }

    .title {
      padding: 10px;
      text-align: center;
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

          <li><a href="#"><i class="fas fa-power-off"></i></a></li>
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
          <a href="Teacherdashboard.php" class="menu-btn">
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
      <center>
        <p class="content-title">College Event & News</p>
      </center>
   
      <div class="content">
      <?php
    $query="SELECT  * from eventnews where tid='$teacher_id'";
    $query_run=mysqli_query($conn,$query);
    $fetch_data=mysqli_num_rows($query_run)>0;
    if ($fetch_data){
        while($row=mysqli_fetch_assoc($query_run)){
          
            ?>

        <div class="data">
          <div>
            <p class="title"><?php echo $row['title'] ?></p>

          </div>
          <div class="inside-content">
            <a href="#" class="delete-btn-coloured btn-lg">Delete</a>
          </div>
        </div>
      


      
      <?php
        }
      }
      ?>


</div>
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