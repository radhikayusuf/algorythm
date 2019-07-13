<?php
    session_start();
    
    if(isset($_SESSION['user_data'])) {        
        header("location: http://192.168.64.2/algorythm/index.php");        
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
                  <li><a href="addsound.php">Public your sound</a></li>
                  <li class="active"><a href="login.php">Login</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div id="container-register">
        <div id="title">
            <i class="material-icons lock">lock</i> Register
        </div>

        <form action="php/controller/RegisterController.php" method="post" enctype="multipart/form-data">            

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">face</i>
                </div>
                <input id="fullname" placeholder="Fullname" name="fullname" type="text" required class="validate" autocomplete="off" maxlength="25">
            </div>

            <div class="clearfix"></div>

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">email</i>
                </div>
                <input id="email" placeholder="Email" type="email" name="email"  required class="validate" autocomplete="off"  maxlength="30">
            </div>

            <div class="clearfix"></div>

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">vpn_key</i>
                </div>
                <input id="password" placeholder="Password" type="password" name="password" required class="validate" autocomplete="off" maxlength="12">
            </div>

            <div class="clearfix"></div>

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">work</i>
                </div>
                <input id="work" placeholder="Your Jobs" type="text" name="job"  required class="validate" autocomplete="off" maxlength="30">
            </div>

            <div class="clearfix"></div>

            <div class="input-register">
                <div class="input-addon">
                    <i class="material-icons">sms</i>
                </div>
                <input id="quotes" placeholder="Quotes" type="text" name="quotes" required class="validate" autocomplete="off" maxlength="50">
            </div>


            <div class="input-register">
                <div class="input-addon-file">
                    <i class="material-icons">image</i>
                </div>
                <input id="imageprofile" placeholder="Image Profile" name="imageprofile" type="file" required class="validate" autocomplete="off">
            </div>


            <div class="remember-me" style="margin-top: 16px;">
                <input type="checkbox" name="accept" required>
                <span style="color: #DDD">I accept Terms of Service</span>
            </div>

            <input type="submit" name="submit" value="Register" />
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

        <div class="register">
            Do you already have an account?
            <a href="login.php">        
        </div>
        <div>
        <button id="register-link">Log In here</button></a>
        </div>
    </div>
</body>

</html>
