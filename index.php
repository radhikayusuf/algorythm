<?php
  session_start();
  require_once 'php/connection.php';
  require_once 'php/model/soundmodel.php';
  require_once 'php/model/usermodel.php';

  $db = new Database();
  $sound = new SoundModel($db);
  $userModel = new UserModel($db);

  $content = $sound->retrieveSoundData();
  $contentUser = $userModel->retrieveUserData();

  
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>AlgoRythm &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

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
    
  </head>
  <body>
  
    
  
  <div class="site-wrap">

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
                  <li class="active">
                    <a href="index.php">Home</a>
                  </li>                  
                  <li><a href="addsound.php">Public your sound</a></li>
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

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    <div class="site-blocks-cover overlay" style="background-image: url('images/hero_bg_3.jpg');" data-aos="fade" data-stellar-background-ratio="0.5" data-aos="fade">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up" data-aos-delay="400">
            <h1>Listen &mdash; the world sounds</h1>
            <p class="mb-4"><span class="small">show how beautiful your voice to the world.</span></p>
        
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="pb-5" style="margin-top: -100px;">
      <div class="container-fluid">

        <? 
        $index = 0;        
        while ($row = $content->fetch_assoc()):?>

              <?php
                if($index %4 == 0) echo '<div class="row no-gutters">';
              ?>


              <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                <a class="unit-9" onclick="test('<?=$row['file']?>', <?= $index ?>)" style="cursor: pointer;"  data-music="http://localhost/musci.mp4" id="music-1">
                  <div class="image" style="background-image: url('<?=$row['images']?>');"></div>
                  <div class="unit-9-content">
                    <h2><?=$row['name']?></h2>
                    <span><?=$row['author']?></span>
                  </div>
                </a>
              </div>
            
        <?
        
        $index++;
        if(($index) % 4 == 0) echo '</div>';
        endwhile; ?>  

        </div>
     
    </div>

    <div class="site-section bg-light block-13">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
            <h2 class="mb-5">Love By Our Listeners</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, fugit nam obcaecati fuga itaque deserunt officia, error reiciendis ab quod?</p>
          </div>
        </div>
        <div class="nonloop-block-13 owl-carousel">
          
               
          <? while ($row = $contentUser->fetch_assoc()): ?>
            <div class="text-center p-3 p-md-5 bg-white">
              <div class="mb-4">            
                <img src="<?= $row['avatar']?>" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
              </div>
              <div class="">
                <h3 class="font-weight-light h5"><?= $row['name_user'] ?></h3>
                <p class="font-italic">&ldquo;<?= $row['quotes'] ?>&rdquo;</p>
              </div>
            </div>
          <? endwhile; ?>  
        </div>
      </div>
    </div>  
    


    <div class="bg-primary" data-aos="fade">
      <div class="container">
        <div class="row">
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-facebook text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-twitter text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-instagram text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-linkedin text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-pinterest text-white"></span></a>
          <a href="#" class="col-2 text-center py-4 social-icon d-block"><span class="icon-youtube text-white"></span></a>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About Radios</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe pariatur reprehenderit vero atque, consequatur id ratione, et non dignissimos culpa? Ut veritatis, quos illum totam quis blanditiis, minima minus odio!</p>
            </div>                      
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>                  
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Membership</a></li>
                </ul>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Follow Us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">Watch Live Streaming</h3>

              <div class="block-16">
                <figure>
                  <img src="images/img_1.jpg" alt="Image placeholder" class="img-fluid rounded">
                  <a href="https://vimeo.com/channels/staffpicks/93951774" class="play-button popup-vimeo"><span class="icon-play"></span></a>
                </figure>
              </div>

            </div>

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>            
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>2019 All rights reserved | Made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Radhika Yusuf</a> &amp; <a href="https://colorlib.com" target="_blank" >Yongki Agustin</a>            
            </p>
          </div>
          
        </div>
      </div>
    </footer>

  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/mediaelement-and-player.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/circleaudioplayer.js"></script>
  <script src="js/algorythm.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>