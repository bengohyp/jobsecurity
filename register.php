<?php

require_once("php/functions.php");
require_once("php/database.php");

$usernameErr = "";
$username_ok = $password_ok = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    } elseif(strlen($_POST["username"]) < 3) {
        $usernameErr = "Please enter at least 3 characters";
    } else {
        $username = validate_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
            $usernameErr = "Only letters and numbers allowed";
        } else {            
            if (check_existing_username($username, $conn)) {
                $usernameErr = "Username already exists. Please choose another username";
            } else {
                $username_ok = true;
                if (empty($_POST["password"])) {
                    $passwordErr = "Please enter a password";
                } elseif(strlen($_POST["password"]) < 6) {
                    $passwordErr = "Please enter at least 6 characters";
                } else {
                    $password = validate_input($_POST["password"]);
                    $confirm_password = validate_input($_POST["confirm_password"]);
                    if (!preg_match_all('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/',$password)) {
                        $passwordErr = "Password does not meet the complexity requirements";
                    } elseif($password != $confirm_password) {
                        $passwordErr = "Passwords do not match";
                    } else {
                        $password_ok = true;
                    }
                } 
            }
        }        
    }    
    if ($username_ok && $password_ok) {
        //create new user in db then redirect to home
        if (!create_new_user($username, $password, $conn)) {
            //redirect to error page
            session_start();
            $_SESSION["errmsg"] = "Could not create user. Please contact a system administrator";
            session_write_close();
            header('Location: error.php');
            exit();
        } else {
            //redirect to login
            session_start();
            $_SESSION["successmsg"] = "User account created! Please log in with your username and password";
            session_write_close();
            header('Location: login.php');
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
  <title>Sign Up</title>
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  <section class="menu cid-r6E2q31N0v" once="menu" id="menu2-d">

    

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
                    <a class="nav-link link text-black display-4" href="index.php">Home</a>
                </li><li class="nav-item"><a class="nav-link link text-black display-4" href="upload.html">
                        Upload CV</a></li>
                <li class="nav-item"><a class="nav-link link text-black display-4" href="index.html">Contact Us</a></li><li class="nav-item"><a class="nav-link link text-black display-4" href="register.html">Sign Up</a></li></ul>
            <div class="navbar-buttons mbr-section-btn"><a class="btn btn-sm btn-primary display-4" href="login.html">
                    
                    Login</a></div>
        </div>
    </nav>
</section>

<!--<section class="engine"><a href="https://mobirise.info/j">website templates</a></section>--><section class="mbr-section form1 cid-r6E2MIvXO6" id="form1-e">

    

    
    <div class="container">
        <div class="row justify-content-center">
            <div class="title col-12 col-lg-8">
                <h2 class="mbr-section-title align-center pb-3 mbr-fonts-style display-2">
                    SIGN UP</h2>
                <h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-5">
                    Sign up as a job seeker to find and apply for your dream job</h3>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="">
            <form action="<?= $phpSelf; ?>" method="POST">
                <div class="form-group">
                    <label class="form-control-label" for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username;?>" autofocus>
                    <div class="error"><?= $usernameErr ?></div><br>
                    <label class="form-control-label" for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" value="<?= $password;?>">
                    <div class="error"><?= $passwordErr ?></div><br>
                    <label class="form-control-label" for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" value="<?= $confirm_password;?>"><br>
                    <span class="input-group-btn"><button href="" type="submit" class="btn btn-primary btn-form display-4">REGISTER</button></span>
                </div>
            </form>
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