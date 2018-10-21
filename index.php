<?php

require_once("php/functions.php");

$searchErr = $search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["search"])) {
        $searchErr = "Please enter a search term";
    } else {
        $search = validate_input($_POST["search"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$search)) {
            $searchErr = "Only letters and spaces allowed";
        } else {
            session_start();
            $_SESSION = $_POST;
            session_write_close();
            header('Location: search.php');
            exit();
        }
    }
}

?>

<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.5, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.5, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/jobsecurity-logo-122x77.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Home</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-r6DRi6Yi43" once="menu" id="menu2-0">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                        <img src="assets/images/jobsecurity-logo-122x77.png" alt="JobSecurity" title="JobSecurity" style="height: 5rem;">
                    </a>
                </span>
                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-black display-4" href="index.php">
                        Home</a>
                </li><li class="nav-item"><a class="nav-link link text-black display-4" href="upload.html">
                        Upload CV</a></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">Contact Us</a></li><li class="nav-item"><a class="nav-link link text-black display-4" href="register.html">Sign Up</a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="login.html">
                    
                    Login</a></div>
        </div>
    </nav>
</section>

<!--<section class="engine"><a href="https://mobirise.info/z">best free website templates</a></section>--><section class="header14 cid-r6E0Xa3P44 mbr-fullscreen mbr-parallax-background" id="header14-5">

    

    

    <div class="container">
        <div class="media-container-row">

            <!--<div class="mbr-figure" style="width: 10%;">
                <img src="assets/images/01.jpg" alt="Mobirise">
            </div>-->

            <div class="media-content">
                <h1 class="mbr-section-title pb-3 align-center mbr-white mbr-fonts-style display-1">
                    Find your dream job now!</h1>
                
                <div class="mbr-section-text  pb-3 ">
                    <p class="mbr-text align-center mbr-white mbr-fonts-style display-5">
                        Just search for the job position you are looking for</p>
                </div>

                <div class="align-center">
                    <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= $search;?>">
                        </div>
                        <div class="error"><?= $searchErr ?></div>
                        <button type="submit" class="btn btn-primary display-4">SEARCH</button>
                    </form>
                </div>                

                <!--<div class="media-container-column align-center" data-form-type="formoid">
                    <div data-form-alert="" hidden="">Thanks for filling out the form!</div>
                    <form class="form-inline" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form">
                        <input type="hidden" value="VFcHrC/YXc6ucXJDjRDRXDRN7qxQqUJm4dbV5q/vXldtDnc4IXq1ee1lG2GEIBsE+33v8UXX16DtqAeAbSz0VPJmdLN9uSE1o6TjKiBZ2g6ZzF+m952/S/FhKt4Dgopj" data-form-email="true">
                        <div class="form-group">
                            <input type="email" class="form-control input-sm input-inverse" name="email" required="" data-form-field="Email" placeholder="Job Position" id="email-header14-5">
                        </div>
                        <div class="buttons-wrap"><button href="" class="btn btn-primary display-4" type="submit" role="button">SEARCH</button></div>
                    </form>
                </div>-->
            </div>
        </div>
    </div>
</section>

<section class="cid-r6E1gEZCGl" id="footer5-6">

    

    

    <div class="container">
        <div class="media-container-row">
            <div class="col-md-3">
                <div class="media-wrap">
                    <a href="index.php">
                       <img src="assets/images/jobsecurity-logo-192x121.png" alt="Mobirise" title="">
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <p class="mbr-text align-right links mbr-fonts-style display-7"></p><p><a href="#" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">HOME</a><span style="font-size: 1rem;">&nbsp; &nbsp; &nbsp;&nbsp;</span><a href="#" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">UPLOAD CV</a><span style="font-size: 1rem;">&nbsp; &nbsp; &nbsp;&nbsp;</span><a href="#" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">CONTACT US</a><span style="font-size: 1rem;"> &nbsp;&nbsp;&nbsp;&nbsp;
</span><a href="#" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">SIGN UP</a><br></p><p></p>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-md-6 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2018 SE26PT02 - All Rights Reserved
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="social-list align-right">
                        <div class="soc-item">
                            <a href="https://twitter.com" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                            </a>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
</body>
</html>