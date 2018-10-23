<?php

session_start();

if (!empty($_SESSION["successmsg"])) {
    $successmsg = $_SESSION["successmsg"];
    unset($_SESSION["successmsg"]);
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
  <title>Login</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-r6E3LqazvO" once="menu" id="menu2-i">

    

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
                    <a href="index.html">
                        <img src="assets/images/jobsecurity-logo-122x77.png" alt="JobSecurity" title="JobSecurity" style="height: 5rem;">
                    </a>
                </span>
                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true"><li class="nav-item">
                    <a class="nav-link link text-black display-4" href="index.html">
                        Home</a>
                </li><li class="nav-item"><a class="nav-link link text-black display-4" href="upload.html">
                        Upload CV</a></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="index.html">Contact Us</a></li><li class="nav-item"><a class="nav-link link text-black display-4" href="register.html">Sign Up</a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="login.html">
                    
                    Login</a></div>
        </div>
    </nav>
</section>

<section class="engine"><a href="https://mobirise.info/m">free website design templates</a></section><section class="mbr-section form1 cid-r6E4xzVODP" id="form1-m">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    LOG IN</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Log in to start your job hunt</h3>
            </div>
        </div>
    </div>    
    <span class="align-center"><div class="error"><?= $successmsg ?></div><br></span>
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-8" data-form-type="formoid">
                    <div data-form-alert="" hidden="">Thanks for filling out the form!</div>
            
                    <form class="mbr-form" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form"><input type="hidden" name="email" data-form-email="true" value="j5dMfSWTsHzvmg3OCW5WnsYpHrlKiiwlTqoiDMmHgBcAX0rYfnZDzD1xytig5047r/BRRZV6UQ+wYWd/CYkFtvNCtLU3zqcoAh66WvWexTRbEdyyWeuk2RHzlc3cFvQN">
                        <div class="row row-sm-offset">
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-m">Name</label>
                                    <input type="text" class="form-control" name="name" data-form-field="Name" required="" placeholder="Username" id="name-form1-m">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-m">Email</label>
                                    <input type="email" class="form-control" name="email" data-form-field="Email" required="" placeholder="Password" id="email-form1-m">
                                </div>
                            </div>
                            
                        </div>
                        
            
                        <span class="input-group-btn"><button href="" type="submit" class="btn btn-primary btn-form display-4">LOG IN</button></span>
                    </form>
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
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  
</body>
</html>