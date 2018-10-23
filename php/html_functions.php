<?php

function jobsec_header() {
    ?>
    <!DOCTYPE html>
        <html>
            <head>            
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <!-- <meta name="generator" content="Mobirise v4.8.5, mobirise.com"> -->
            <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
            <link rel="shortcut icon" href="assets/images/jobsecurity-logo-122x77.png" type="image/x-icon">
            <meta name="description" content="">
            <title>JobSecurity</title>
            <link rel="stylesheet" href="assets/tether/tether.min.css">
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
            <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
            <link rel="stylesheet" href="assets/dropdown/css/style.css">
            <link rel="stylesheet" href="assets/socicon/css/styles.css">
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
                                <a href="index.php">
                                    <img src="assets/images/jobsecurity-logo-122x77.png" alt="JobSecurity" title="JobSecurity" style="height: 5rem;">
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                            <li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link link text-black display-4" href="upload.php">Upload CV</a></li>
                            <li class="nav-item"><a class="nav-link link text-black display-4" href="index.php">Contact Us</a></li>
                            <li class="nav-item"><a class="nav-link link text-black display-4" href="register.php">Sign Up</a></li>
                        </ul>
                        <div class="navbar-buttons mbr-section-btn">
                            <?php if (isset($_SESSION['login_user'])){ ?>
                            Logged in as <?= $_SESSION['login_user']?> <a class="btn btn-sm btn-primary display-4" href="logout.php">Logout</a>
                            <?php } else{?>
                            <a class="btn btn-sm btn-primary display-4" href="login.php">Login</a>
                            <?php }?>
                        </div>
                    </div>
                </nav>
            </section>
            <!-- <section class="engine"><a href="https://mobirise.info/m">free website design templates</a></section> -->
<?php
}

function jobsec_footer() {
    ?>
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
                    <p class="mbr-text align-right links mbr-fonts-style display-7"></p>
                    <p>
                        <a href="index.php" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">HOME</a>
                        <span style="font-size: 1rem;">&nbsp; &nbsp; &nbsp;&nbsp;</span>
                        <a href="upload.php" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">UPLOAD CV</a>
                        <span style="font-size: 1rem;">&nbsp; &nbsp; &nbsp;&nbsp;</span>
                        <a href="index.php" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">CONTACT US</a>
                        <span style="font-size: 1rem;"> &nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <a href="register.php" class="text-black" style="font-size: 1rem; background-color: rgb(255, 255, 255);">SIGN UP</a>
                        <br>
                    </p>
                    <p></p>
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
                        <p class="mbr-text mbr-fonts-style display-7">© Copyright 2018 SG5237 Part Time Team 02 - All Rights Reserved</p>
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
    <script src="assets/mbr-popup-btns/mbr-popup-btns.js"></script>
    <script src="assets/theme/js/script.js"></script>
    <script src="assets/formoid/formoid.min.js"></script>

    </body>
</html>
<?php
}

?>