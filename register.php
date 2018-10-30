<?php
session_start();

if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
require_once("php/html_functions.php");
require_once("php/functions.php");
require_once("php/database.php");

$token = get_csrf_token();

$usernameErr = "";
$username_ok = $password_ok = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && validate_csrf($_POST)) {
    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    } elseif (strlen($_POST["username"]) < 3) {
        $usernameErr = "Please enter at least 3 characters";
    } else {
        $username = validate_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
            $usernameErr = "Only letters and numbers allowed";
        } else {
            if (check_existing_username($username, $conn)) {
                $usernameErr = "Username already exists. Please choose another username";
            } else {
                $username_ok = true;
                if (empty($_POST["password"])) {
                    $passwordErr = "Please enter a password";
                } elseif (strlen($_POST["password"]) < 6) {
                    $passwordErr = "Please enter at least 6 characters";
                } else {
                    $password = validate_input($_POST["password"]);
                    $confirm_password = validate_input($_POST["confirm_password"]);
                    if (!preg_match_all('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
                        $passwordErr = "Passwords need to be 8-12 characters, contain at least 1 lowercase character, 1 uppercase character, 1 number and 1 special symbol";
                    } elseif ($password != $confirm_password) {
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

<?php jobsec_header(); ?>
<section class="mbr-section form1 cid-r6E2MIvXO6" id="form1-e">
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
                <input type="hidden" name="token" value="<?php echo $token; ?>" />
                <div class="form-group">
                    <label class="form-control-label" for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $username;?>" required autofocus>
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

<?php jobsec_footer(); ?>