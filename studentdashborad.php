<?php
$conn = mysqli_connect('localhost', 'root', '', 'signup') or die('connection failed');
session_start();
$user_id = $_SESSION['user_id'];

if (isset($_POST['update_profile'])) {

  $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
  $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
  $update_phone = mysqli_real_escape_string($conn, $_POST['update_phoneno']);

  mysqli_query($conn, "UPDATE `register` SET fname = '$update_name', email = '$update_email',phoneno=' $update_phone' WHERE id = '$user_id'") or die('query failed');

  $old_pass = $_POST['old_pass'];
  $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
  $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
  $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

  if (!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)) {
    if ($update_pass != $old_pass) {
      $message[] = 'old password not matched!';
    } elseif ($new_pass != $confirm_pass) {
      $message[] = 'confirm password not matched!';
    } else {
      mysqli_query($conn, "UPDATE `register` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
      $message[] = 'password updated successfully!';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/all.min.css">
  <title>Student Dashborad</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #252526 !important;
      

    }

    .message {
      margin: 10px 0;
      width: 100%;
      border-radius: 5px;
      padding: 10px;
      text-align: center;
      background-color: var(--red);
      color: var(--white);
      font-size: 20px;
    }

    .title {
      font-size: 2.2rem;
      color: white;
      margin-bottom: 10px;
      position: relative;
      top: -22px;
      margin: auto;
      position: relative;
      left: 0px;
      background-color: #252526;
    }

    .title>h2 {
      margin: 0px;
    }

    .input-field {
      max-width: 380px;
      width: 100%;
      background-color: #f0f0f0;
      margin-left: 65px;
      margin-top: 15px;
      height: 55px;
      border-radius: 55px;
      display: grid;
      grid-template-columns: 15% 85%;
      padding: 0 0.4rem;
      position: relative;
    }

    .input-field i {
      text-align: center;
      line-height: 55px;
      color: #acacac;
      transition: 0.5s;
      font-size: 1.1rem;
    }

    .input-field input {
      background: none;
      outline: none;
      border: none;
      line-height: 1;
      font-weight: 600;
      font-size: 1.1rem;
      color: #333;
    }

    .input-field input::placeholder {
      color: #aaa;
      font-weight: 500;
    }


    .dashborad-container {
      display: flex;
      justify-content: center;
      margin-top: 50px;
    }

    .btn {
      width: 150px;
      background-color: #5995fd;
      border: none;
      outline: none;
      height: 49px;
      border-radius: 49px;
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      margin: 25px 0;
      cursor: pointer;
      transition: 0.5s;
      position: relative;
      left: 175px;
    }

    .btn:hover {
      background-color: #4d84e2;
      color: white;
    }

    .form {
      align-items: center;
    }

    .form1 {
      border: 1px solid #808080;
      box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
      box-sizing: border-box;
      display: flex;
      justify-content: center;
      width: 700px;
    }

    .dashborad-container {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .form2 {
      display: flex;
      align-items: center;
      width: 700px;
      height: 450px;
      border: 1px solid #808080;
      flex-direction: column;
      padding-top: 70px;
      box-shadow: rgb(0 0 0 / 19%) 0px 10px 20px, rgb(0 0 0 / 23%) 0px 6px 6px;
      margin-top: 130px;
    }

    :root {
      --input-color: #6b8cd9;
      --input-border: #CDD9ED;
      --input-background: #fff;
      --input-placeholder: #CBD1DC;
      --input-border-focus: #275EFE;
      --group-color: var(--input-color);
      --group-border: var(--input-border);
      --group-background: #EEF4FF;
      --group-color-focus: #fff;
      --group-border-focus: var(--input-border-focus);
      --group-background-focus: #678EFE;
    }

    .form-field {
      display: block;
      width: 100%;
      padding: 8px 16px;
      line-height: 25px;
      font-size: 15px;
      font-weight: 500;
      font-family: inherit;
      border-radius: 6px;
      -webkit-appearance: none;
      color: var(--input-color);
      border: 1px solid var(--input-border);
      background: var(--input-background);
      transition: border 0.3s ease;
    }

    .form-field::-moz-placeholder {
      color: var(--input-placeholder);
    }

    .form-field:-ms-input-placeholder {
      color: var(--input-placeholder);
    }

    .form-field::placeholder {
      color: var(--input-placeholder);
    }

    .form-field:focus {
      outline: none;
      border-color: var(--input-border-focus);
    }

    .form-group {
      position: relative;
      display: flex;
      width: 100%;
      margin: 10px;
      top: -85px;
    }

    .form-group>span,
    .form-group .form-field {
      white-space: nowrap;
      display: block;
    }

    .form-group>span:not(:first-child):not(:last-child),
    .form-group .form-field:not(:first-child):not(:last-child) {
      border-radius: 0;
    }

    .form-group>span:first-child,
    .form-group .form-field:first-child {
      border-radius: 20px 0 0 20px;
    }

    .form-group>span:last-child,
    .form-group .form-field:last-child {
      border-radius: 0 20px 20px 0;
    }

    .form-group>span:not(:first-child),
    .form-group .form-field:not(:first-child) {
      margin-left: -1px;
    }

    .form-group .form-field {
      position: relative;
      z-index: 1;
      flex: 1 1 auto;
      width: 1%;
      margin-top: 0;
      margin-bottom: 0;
    }

    .form-group>span {
      text-align: center;
      padding: 8px 12px;
      font-size: 14px;
      line-height: 25px;
      color: var(--group-color);
      background: var(--group-background);
      border: 1px solid var(--group-border);
      transition: background 0.3s ease, border 0.3s ease, color 0.3s ease;
      width: 125px;
    }

    .form-group:focus-within>span {
      color: var(--group-color-focus);
      background: var(--group-background-focus);
      border-color: var(--group-border-focus);
    }

    .formbox {
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .title2 {
      text-align: center;
      font-size: 2.2rem;
      background-color: #252526;
      color: white;
      position: relative;
      top: -100px;
    }

    .custom-select {
      position: relative;
      font-family: Arial;
    }

    .custom-select select {
      display: none;
      /*hide original SELECT element: */
    }

    .select-selected {
      background-color: white;
      width: 245px;
      border-radius: 0px 20px 20px 0px;

    }

    /* Style the arrow inside the select element: */
    .select-selected:after {
      position: absolute;
      content: "";
      top: 14px;
      right: 10px;
      width: 0;
      height: 0;
      border: 6px solid transparent;
      border-color: #fff transparent transparent transparent;
    }

    /* Point the arrow upwards when the select box is open (active): */
    .select-selected.select-arrow-active:after {
      border-color: transparent transparent #fff transparent;
      top: 7px;
    }

    /* style the items (options), including the selected item: */
    .select-items div,
    .select-selected {
      color: #6b8cd9;
      padding: 9px 55px;
      border: 1px solid transparent;
      border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
      cursor: pointer;
    }

    /* Style items (options): */
    .select-items {
      position: absolute;
      background: transparent;
      backdrop-filter: blur(2px);
      top: 100%;
      left: 0;
      right: 0;
      z-index: 99;
      width: 245px;
      border-radius: 20px;
    }

    /* Hide the items when the select box is closed: */
    .select-hide {
      display: none;
    }

    .select-items div:hover,
    .same-as-selected {
      background-color: rgba(0, 0, 0, 0.1);
    }

    .form2_btn {
      width: 150px;
      background-color: #5995fd;
      border: none;
      outline: none;
      height: 49px;
      border-radius: 49px;
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      margin: 25px 0;
      cursor: pointer;
      transition: 0.5s;
      top: 67px;
      position: absolute;

    }

    .form3 {
      display: flex;
      align-items: center;
      width: 700px;
      height: 950px;
      border: 1px solid #808080;
      flex-direction: column;
      padding-top: 70px;
      box-shadow: rgb(0 0 0 / 19%) 0px 10px 20px, rgb(0 0 0 / 23%) 0px 6px 6px;
      margin-top: 250px;

    }

    .title3 {
      text-align: center;
      font-size: 2.2rem;
      background-color: #252526;
      color: white;
      position: relative;
      top: -100px;
    }

    #upload {
      display: inline-block;
      background-color: dodgerblue;
      color: white;
      padding: 0.5rem;
      font-family: sans-serif;
      border-radius: 0.3rem;
      cursor: pointer;
      margin-top: 1rem;
      position: relative;
      left: 195px;
    }

    img {
      height: 150px;
      width: 150px;
      border-radius: 50%;
      object-fit: cover;
      margin-bottom: 5px;
      position: relative;
      top: -90px;
    }

    .placement {
      position: relative;
      top: -85px;
    }

    .text-input {
      position: relative;
      margin-top: 50px;
    }

    .text-input input[type=text] {
      display: inline-block;
      width: 500px;
      height: 40px;
      box-sizing: border-box;
      outline: none;
      border: 1px solid lightgray;
      border-radius: 3px;
      padding: 10px 10px 10px 100px;
      transition: all 0.1s ease-out;
    }

    .text-input input[type=text]+label {
      position: absolute;
      top: 0;
      left: 0;
      bottom: 0;
      height: 40px;
      width: 100px;
      line-height: 40px;
      color: white;
      border-radius: 3px 0 0 3px;
      padding: 0 20px;
      background: #007acc;
      transform: translateZ(0) translateX(0);
      transition: all 0.3s ease-in;
      transition-delay: 0.2s;
    }

    .text-input input[type=text]:focus+label {
      transform: translateY(-120%) translateX(0%);
      border-radius: 3px;
      transition: all 0.1s ease-out;
    }

    .text-input input[type=text]:focus {
      padding: 10px;
      transition: all 0.3s ease-out;
      transition-delay: 0.2s;
    }

    textarea {
      resize: none;
    }

    textarea {
      background: none;
      color: #c6c6c6;
      font-size: 18px;
      padding: 10px 10px 10px 5px;
      display: block;
      width: 500px;
      border: none;
      border-radius: 0;
      border-bottom: 1px solid #c6c6c6;
      margin-top: 35px;
    }

    textarea:focus {
      outline: none;
    }

    textarea:focus~#textskill,
    textarea:valid~#textskill {
      top: 350px;
      font-size: 12px;
      color: #2196F3;
    }

    textarea:focus~.bar:before {
      width: 500px;
    }

    #textskill {
      color: #c6c6c6;
      font-size: 16px;
      font-weight: normal;
      position: absolute;
      pointer-events: none;
      left: 5px;
      top: 365px;
      transition: 300ms ease all;
    }

    .bar {
      position: relative;
      display: block;
      width: 320px;
    }

    .bar:before {
      content: "";
      height: 2px;
      width: 0;
      bottom: 0px;
      position: absolute;
      background: #2196F3;
      transition: 300ms ease all;
      left: 0%;
    }

    #resume {
      display: inline-block;
      background-color: #5995fd;
      color: white;
      text-align: center;
      font-family: sans-serif;
      border-radius: 0.3rem;
      cursor: pointer;
      padding-top: 14px;
      margin: 50px 0;
      width: 150px;
      border-radius: 49px;
      height: 49px;
      font-size: 15px;
      font-weight: 500;
      text-transform: uppercase;
      position: relative;
      left: 340px;
    }

    .form3_btn {
      width: 150px;
      background-color: #5995fd;
      border: none;
      outline: none;
      height: 49px;
      border-radius: 49px;
      color: #fff;
      text-transform: uppercase;
      font-weight: 600;
      margin: 25px 0;
      margin-left: 5px;
      cursor: pointer;
      transition: 0.5s;
      position: relative;
      left: -135px;

    }

    .form3_btn:hover {
      background-color: #4d84e2;
      color: white;
    }

    #resume:hover {
      background-color: #4d84e2;
      color: white;
    }
   
    
  </style>
</head>

<body>
  <?php
  $select = mysqli_query($conn, "SELECT * FROM `register` WHERE id = '$user_id'") or die('query failed');
  if (mysqli_num_rows($select) > 0) {
    $fetch = mysqli_fetch_assoc($select);
  }
  ?>

  <?php
  if (isset($message)) {
    foreach ($message as $message) {
      echo '<div class="alert alert-danger" role="alert">
          ' . $message . '</div>';
    }
  }
  ?>
  <div class="dashborad-container">
    <div class="form1">

      <form action="" method="post" class="sign-up-form" enctype="multipart/form-data">


        <span class="title">Student Registration Information </span>
        <div class="input-field">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Full Name" name="update_name" value="<?php echo $fetch['fname']; ?>" required />
        </div>
        <div class="input-field">
          <i class="fas fa-envelope"></i>
          <input type="email" placeholder="Email" name="update_email" value="<?php echo $fetch['email']; ?>" required />
        </div>
        <div class="input-field">
          <i class="fas fa-phone"></i>
          <input type="number" placeholder="+91" name="update_phoneno" value="<?php echo $fetch['phoneno']; ?>" required />
        </div>
        <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>" required />
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <input type="password" name="update_pass" placeholder="enter previous password" required />
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <input type="password" name="new_pass" placeholder="enter new password" required />
        </div>
        <div class="input-field">
          <i class="fas fa-lock"></i>
          <input type="password" name="confirm_pass" placeholder="confirm new password" required />
        </div>
        <input type="submit" class="btn" value="Update" name="update_profile" />

      </form>

    </div>
    <?php
        $select = mysqli_query($conn, "SELECT * FROM `academic_info` WHERE student_id = '$user_id'") or die('query failed');
      
    
        if (mysqli_num_rows($select) > 0) {
           $acdmic_fetch = mysqli_fetch_assoc($select);
        }
    ?>
    <div class="form2">
      <span class="title2">Student Academic Information </span>
      <form action="studentdash.php" class="formbox" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <span>Roll No</span>
          <input class="form-field" type="number" placeholder="Enter your roll no" name="rollno" value="<?php echo $acdmic_fetch['rno'] ?>" required>

        </div>
        <div class="form-group">
          <span>Age</span>
          <input class="form-field" type="number" placeholder="Enter your Age" name="age" max='25' value="<?php echo $acdmic_fetch['age'] ?>" required>
        </div>
        <div class="form-group">
          <span>Semester</span>
          <div class="custom-select" style="width:200px;">
            <select name="semester">
              <option value="1">Semester-1</option>
              <option value="2">Semester-2</option>
              <option value="3">Semester-3</option>
              <option value="4">Semester-4</option>
              <option value="5">Semester-5</option>
              <option value="6">Semester-6</option>

          </div>
        </div>
       
        <input type="submit" value="Save" name='form2-save' class="form2_btn">
       
        
      </form>
    </div>
  </div>

  <?php
  error_reporting(0);
 
  ?>

  <div class="form3">
    <span class="title3">Student Placement Information </span>
    <!-- <img src="img/login.jpg" alt="" class="profile"> -->
    <?php  
         $select = mysqli_query($conn, "SELECT * FROM `placement` WHERE student_id = '$user_id'") or die('query failed');
      
    
         if (mysqli_num_rows($select) > 0) {
            $placement_fetch = mysqli_fetch_assoc($select);
         }
         if ($placement_fetch['profile'] == '') {
            echo '<img src="img/default-avatar.jpg" class="profile">';
         } else {
            echo '<img src="Studentimg/' . $placement_fetch['profile'] . '">';
         }
      
      
        
         ?>
    <form action="studentdash.php" method="POST" class="placement" enctype="multipart/form-data">
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png" id="upload"  hidden />

      <label for="upload" id="upload">Upload profile</label>
      <div class="text-input">
        <input type="text" id="input1" placeholder="Enter your skills" name="skill" required value=" <?php echo $placement_fetch['skill'] ?>">
        <label for="input1">Skills</label>
      </div>
      <div class="text-input">
        <input type="text" id="input1" placeholder="Enter your location" name="location" required  value=" <?php echo $placement_fetch['location'] ?>">
        <label for="input1">Location</label>
      </div>
      <div class="text-input">
        <input type="text" id="input1" placeholder="Enter your linkdin link" name="link" required  value=" <?php echo $placement_fetch['linkdin'] ?>">
        <label for="input1">Link</label>
      </div>
      <div class="group">
        <textarea type="textarea" rows="5" name="about" required  <?php echo $placement_fetch['about'] ?> ></textarea>
        <span class="highlight"></span><span class="bar"></span>
        <label id="textskill">About yourself </label>
      </div>
      <input type="file" name="resume" class="box" accept=".pdf" id="resume" hidden  />

      <label for="resume" id="resume">Upload Resume</label>
      <input type="submit" value="Save" name='placement_save' class="form3_btn">
      <input type="submit" value="update" name='placement_update' class="form3_btn">
    </form>

  </div>
  </div>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      ll = selElmnt.length;
      /*for each element, create a new DIV that will act as the selected item:*/
      a = document.createElement("DIV");
      a.setAttribute("class", "select-selected");
      a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
      x[i].appendChild(a);
      /*for each element, create a new DIV that will contain the option list:*/
      b = document.createElement("DIV");
      b.setAttribute("class", "select-items select-hide");
      for (j = 1; j < ll; j++) {
        /*for each option in the original select element,
        create a new DIV that will act as an option item:*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
          /*when an item is clicked, update the original select box,
          and the selected item:*/
          var y, i, k, s, h, sl, yl;
          s = this.parentNode.parentNode.getElementsByTagName("select")[0];
          sl = s.length;
          h = this.parentNode.previousSibling;
          for (i = 0; i < sl; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
              s.selectedIndex = i;
              h.innerHTML = this.innerHTML;
              y = this.parentNode.getElementsByClassName("same-as-selected");
              yl = y.length;
              for (k = 0; k < yl; k++) {
                y[k].removeAttribute("class");
              }
              this.setAttribute("class", "same-as-selected");
              break;
            }
          }
          h.click();
        });
        b.appendChild(c);
      }
      x[i].appendChild(b);
      a.addEventListener("click", function(e) {
        /*when the select box is clicked, close any other select boxes,
        and open/close the current select box:*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
      });
    }

    function closeAllSelect(elmnt) {
      /*a function that will close all select boxes in the document,
      except the current select box:*/
      var x, y, i, xl, yl, arrNo = [];
      x = document.getElementsByClassName("select-items");
      y = document.getElementsByClassName("select-selected");
      xl = x.length;
      yl = y.length;
      for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
          arrNo.push(i)
        } else {
          y[i].classList.remove("select-arrow-active");
        }
      }
      for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
          x[i].classList.add("select-hide");
        }
      }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
  </script>

</body>

</html>