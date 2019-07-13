<?php
    session_start();    
    if(!isset($_SESSION['user_data'])) {
        $_SESSION['message'] = "Please login before add your sound to public";
        header("location: http://192.168.64.2/algorythm/login.php");        
        exit;
    }

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="description" content="Login - Register Template">
    <meta name="author" content="Lorenzo Angelino aka MrLolok">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">  
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        body {
            background-color: #303641;
        }
    </style>
</head>

<body style="background-image: url('images/hero_bg_3.jpg'); background-repeat: no-repeat; background-size: cover;">

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="index.php" class="text-white h2 mb-0"><strong>AlgoRythm<span class="text-primary">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li><a href="index.php">Home</a></li>                  
                  <li class="active"><a href="addsound.php">Public your sound</a></li>
                  <?php
                    if(isset($_SESSION['user_data'])) {
                      echo "<li><a href='logout.php'>Logout</a></li>";
                    } else {
                      echo "<li><a href='login.php'>Login</a></li>";
                    }                  
                  ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="container-sound">
        <div id="title">
            Add Your Sound
        </div>

        <form action="php/controller/SoundController.php" method="post" enctype="multipart/form-data">            

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">play_arrow</i>
                </div>
                <input id="fullname" placeholder="Sound Name" name="sound_name" type="text" required class="validate" autocomplete="off" maxlength="25">
            </div>

            <div class="clearfix"></div>

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="fullname" placeholder="Author Name" name="author" type="text" required class="validate" autocomplete="off" maxlength="25">
            </div>

            <div class="clearfix"></div>

            <div class="input-register">
                <div class="input-addon-file">
                    <i class="material-icons">image</i>
                </div>
                <input id="imageCover" placeholder="Image Cover" name="imageCover" type="file" required class="validate">
            </div>


            <div class="input-register">
                <div class="input-addon-file">
                    <i class="material-icons">music_note</i>
                </div>
                <input id="sound" placeholder="Your Sound" name="sound" type="file" required class="validate">
            </div>

            <input type="submit" name="submit" value="Submit sound" style="margin-top: 64px;"/>
        </form>

        <div >
        <!-- <p style="color: red;">Error disini</p> -->
            <?php
                if(isset($_SESSION["message"])){
                    echo '<p style="color: red;">'.$_SESSION["message"].'</p>';
                    unset($_SESSION["message"]);
                }
            ?>
        </div>


    </div>
</body>

</html>
