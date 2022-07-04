<?php
include 'dbconfig.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cutive+Mono&family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Placement Profile</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;  
            font-family: 'Poppins', sans-serif;
            
        }

        body {
            background-color: #192734;
            display: flex;
            flex-direction: column;
           
        }

        .container {
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            position: relative;
            width: 800px;

            background-color: #192734;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            overflow: hidden;
        }

        .card:before {
            content: '';
            position: absolute;
            width: 100%;
            height: 330px;
            top: 0;
            left: 0;
            background-image: linear-gradient(to top, #00f2fe, #4facfe);
            clip-path: circle(487px at 50% -48.5%);

        }


        .header {
            position: relative;
            height: 315px;
        }



        .hamburger-menu {
            position: absolute;
            width: 21px;
            height: 16px;
            top: 1.4rem;
            left: 1.9rem;
            z-index: 3;
            cursor: pointer;
            transition: .3s;
            opacity: .8;
        }

        .hamburger-menu:hover {
            opacity: 1;
        }

        .hamburger-menu .center {
            position: absolute;
            height: 2px;
            width: 70%;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff;
            border-radius: 1px;
        }

        .hamburger-menu:before,
        .hamburger-menu:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            border-radius: 1px;
            background-color: #fff;
        }

        .hamburger-menu:before {
            top: 0;
        }

        .hamburger-menu:after {
            bottom: 0;
        }

        .main {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .main .image {
            position: relative;
            width: 180px;
            height: 170px;
            border-radius: 50%;

            border: 4px solid #00d8fe;
            margin-bottom: 2px;
            overflow: hidden;
            cursor: pointer;

        }

        .image .hover {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(79, 172, 254, .7);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            transition: .5s;
            opacity: 0;
        }

        .image:hover .hover {
            opacity: 1;
        }

        .hover.active {
            opacity: 1;
        }

        .name {
            font-size: 1.2rem;
            color: #fff;
            font-weight: 500;
            line-height: 1;
            margin: 5px 0;
            position: relative;

        }


        .content {
            display: flex;
            padding: 1.7rem 2.5rem 2.6rem 2.5rem;
        }

        .title {
            position: relative;
            color: #00f2fe;
            font-weight: 500;
            font-size: 1.3rem;
            padding: 0 0 3px 0;
            margin-bottom: .9rem;
            display: inline-block;
        }

        .title:after {
            content: '';
            position: absolute;
            height: 3px;
            width: 50%;
            background-color: white;
            bottom: 0;
            left: 0;
        }

        .text {
            color: white;
            font-weight: 300;
            line-height: 1.7;
            margin-bottom: 10px;
        }

        .icons-container {
            padding: 1rem 0;
        }

        .icon {
            color: #00f2fe;
            font-size: 1.5rem;
            text-decoration: none;
            margin-right: 8px;
            transition: .3s;
        }

        .icon-text {
            padding-left: 80px;
            font-size: 1.2rem;
            color: white;
        }

        #text3 {
            padding-left: 60px;
        }


        .buttons-wrap {
            display: flex;
            margin-top: 30px;
            width: 715px;
        }

        .follow-wrap,
        .resume-wrap {
            flex: 4;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: .5s;
        }

        .follow-wrap:hover,
        .resume-wrap:hover {
            flex: 5;
        }

        .follow {
            padding: 9.6px 0;
            width: 100%;
            background: linear-gradient(to right, #4facfe 0%, #00f2fe 140%);
            color: #fff;
            text-align: center;
            text-decoration: none;
            font-size: .7rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 18.1px;
            margin-right: 3px;
        }

        .resume {
            padding: 7.6px 0;
            width: 100%;
            border: 2px solid #4facfe;
            color: #4facfe;
            text-decoration: none;
            text-align: center;
            font-size: .7rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-left: 3px;
            border-radius: 18.1px;
        }

        .modal {
            position: fixed;
            width: 100%;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: -1;
            opacity: 0;
            transition: .5s;
        }

        .modal img {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%) scale(.3);
            max-width: 100%;
            max-height: 100%;
            transition: .5s;
        }

        .modal.show {
            opacity: 1;
            z-index: 99;
        }

        .modal.show img {
            top: 50%;
            transform: translate(-50%, -50%) scale(1);
        }

        .close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: .3s;
        }

        .close:hover {
            opacity: .5;
        }

        .close:before,
        .close:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 3px;
            border-radius: 1.5px;
            top: 50%;
            left: 50%;
            background-color: #fff;
        }

        .close:before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .close:after {
            transform: translate(-50%, -50%) rotate(135deg);
        }

        @media (max-width: 410px) {
            .content {
                flex-direction: column;
            }

            .right {
                flex-direction: row;
                text-align: center;
                justify-content: space-around;
                align-items: center;
                margin: 0;
            }
        }

        @media (max-width: 370px) {
            .header {
                height: 230px;
            }

            .card:before {
                clip-path: circle(400px at 50% -74.5%);
                height: 230px;
            }

            .hamburger-menu {
                width: 16px;
                height: 12px;
                top: 1.1rem;
                left: 1.5rem;
            }

            .mail {
                font-size: 1.1rem;
                top: .75rem;
                right: 1.5rem;
            }

            .main .image {
                width: 90px;
                height: 90px;
                border-width: 3px;
            }

            .name,
            .sub-name {
                font-size: 1rem;
            }

            .content {
                padding: 1.2rem 1.8rem 1.8rem 1.8rem;
            }

            .number {
                font-size: 1.8rem;
            }

            .number-title {
                font-size: .4rem;
            }

            .right {
                padding-top: 1rem;
            }

            .title {
                font-size: .9rem;
                margin-bottom: .5rem;
            }

            .text {
                font-size: .8rem;
            }

            .icons-container {
                padding: .5rem 0;
            }

            .icon {
                font-size: 1.1rem;
            }

            .follow {
                padding: 7.6px 0;
                border-radius: 14.6px;
                font-size: .6rem;
            }

            .resume  {
                padding: 5.6px 0;
                border-radius: 14.6px;
                font-size: .6rem;
            }
        }
    </style>
</head>

<body>
    <?php
    $query="SELECT  * from placement  INNER JOIN register on placement.student_id=register.id ;";
    $query_run=mysqli_query($conn,$query);
    $fetch_data=mysqli_num_rows($query_run)>0;
    if ($fetch_data){
        while($row=mysqli_fetch_assoc($query_run)){
          
            ?>
          

<div class="modal">
        <img src="Studentimg/<?php echo $row['profile'] ?>" alt="">
        <div class="close"></div>
    </div>

    <div class="container">
        <div class="card">
            <div class="header">
                <div class="hamburger-menu">
                    <div class="center"></div>
                </div>
                <div class="main">
                    <div class="image" style=" background: url('Studentimg/<?php echo $row['profile'] ?>') no-repeat center / cover;">
                        <div class="hover">
                            <i class="fas fa-camera fa-2x"></i>
                        </div>
                    </div>
                    <h3 class="name"><?php echo $row['fname'] ?></h3>
                </div>
            </div>

            <div class="content">
                <div class="left">
                    <div class="about-container">
                        <h3 class="title">About</h3>
                        <p class="text"><?php echo $row['about'] ?></p>
                    </div>
                    <div class="about-container">
                        <h3 class="title">Skill</h3>
                        <p class="text"><?php echo $row['skill'] ?> </p>
                    </div>
                    <div class="icons-container">
                        <span><i class="fas fa-envelope icon fa-3x">&nbsp; Gmail</i></span>
                        <span class="icon-text"><?php echo $row['email'] ?></span>
                    </div>
                    <div class="icons-container">
                        <span><i class="fas fa-phone-alt icon">&nbsp; Phone</i></span>
                        <span class="icon-text"><?php echo $row['phoneno'] ?></span>
                    </div>
                    <div class="icons-container">
                        <span><i class="fas fa-map-marker-alt icon">&nbsp; Location</i></span>
                        <span class="icon-text" id="text3"><?php echo $row['location'] ?></span>
                    </div>

                    <div class="buttons-wrap">
                        <div class="follow-wrap">
                            <a href="<?php echo $row['linkdin'] ?>" class="follow">Follow on Linkdin</a>
                        </div>
                        <div class="resume-wrap">
                            <a href="resume/<?php echo $row['resume'] ?>" class="resume" target="_blank">Resume</a>
                        </div>
                    </div>
                </div>

 
            </div>
        </div>
    </div>

            <?php
        }
    }
    ?>
    

    
    <script>
        const image = document.querySelector('.image');
        const hover = document.querySelector('.hover');
        const modal = document.querySelector('.modal');
        const close = document.querySelector('.close');

        function show() {
            hover.classList.add('active');
            modal.classList.add('show');
        }

        function hide() {
            hover.classList.remove('active');
            modal.classList.remove('show');
        }

        image.addEventListener('click', show);
        close.addEventListener('click', hide);
    </script>
</body>
</html>