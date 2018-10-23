<?php
require_once("php/functions.php");
require_once("php/database.php");

session_start();
$_POST = $_SESSION;

$search = "";

if (empty($_POST["search"])) {
    $searchErr = "Please enter a search term";
} else {
    $search = validate_input($_POST["search"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$search)) {
        $searchErr = "Only letters and spaces allowed";
    }
}

?>

<!DOCTYPE html>
<html >
<head>
  <!-- Site made with Mobirise Website Builder v4.8.6, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.8.6, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/jobsecurity-logo-122x77.png" type="image/x-icon">
  <meta name="description" content="">
  <title>Search</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-r71GhxnvCO" once="menu" id="menu2-n">

    

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

<!--<section class="engine"><a href="https://mobirise.info/b">how to create a website</a></section>--><section class="features18 popup-btn-cards cid-r71GBnHD4m" id="features18-r">

    

    
    <div class="container">
        <h2 class="mbr-section-title pb-3 align-center mbr-fonts-style display-2">Search Results for: <?= $search ?></h2><div class="error"><?= $searchErr ?></div>
        
        <?php        
        $sql = "SELECT job_title, job_description, company_name, company_logo FROM `jobs` WHERE `job_title` LIKE ? OR `job_description` LIKE ?";
        if ($stmt = $conn->prepare($sql)) {
            $wildcard_search = "%{$search}%";
            $stmt->bind_param("ss", $wildcard_search, $wildcard_search);
            $stmt->execute();
            $stmt->store_result();
        }
        ?><h3 class="mbr-section-subtitle display-5 align-center mbr-fonts-style mbr-light">Showing <?= $stmt->num_rows ?> result(s)</h3>
        
        
        
        
        
            
        <div class="media-container">
            <?php
            $stmt->bind_result($job_title, $job_description, $company_name, $company_logo);
            while ($stmt->fetch()) {                
            ?>
            <div class="card p-3 col-12 col-md-6 col-lg-4 flex-row flex-wrap">
                <div class="card-header border-0 w-25">                    
                    <?= '<img src="data:image/jpeg;base64,'.base64_encode( $company_logo ).'" style="width:100%"/>'; ?>
                </div>
                <div class="card-block p-4 w-75">
                    <h4 class="card-title mbr-fonts-style display-7">Job Title: <?= $job_title ?></h4>
                    <h5 class="card-subtitle">Company Name: <?= $company_name ?></h5>
                    <p class="mbr-text mbr-fonts-style align-left display-7"> Job Description: <?= $job_description ?></p>  
                    <a class="btn btn-primary display-4">APPLY NOW</a>
                </div>  
            </div>
            <?php
            }
            $stmt->close();
            ?>
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
  <script src="assets/mbr-popup-btns/mbr-popup-btns.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>