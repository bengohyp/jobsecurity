<?php //phpinfo();
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['initiated'])) {
    session_regenerate_id();
    $_SESSION['initiated'] = true;
}
require_once("php/html_functions.php");
require_once("php/functions.php");
require_once("php/database.php");

$token = get_csrf_token();

if (!empty($_SESSION["successmsg"])) {
    $successmsg = $_SESSION["successmsg"];
    unset($_SESSION["successmsg"]);
}
?>
<?php jobsec_header();?>
<?php  if ($_SERVER["REQUEST_METHOD"] === "POST" && validate_csrf($_POST)) {
    if (empty($_POST["username"])) {
        $usernameErr = "Please enter a username";
    } elseif (empty($_POST["password"])) {
        $usernameErr = "Please enter a password";
    } else {
        $_POST["username"]=filter_var($_POST["username"],FILTER_SANITIZE_STRING);
        if (login_user($_POST["username"], $_POST["password"], $conn)) {
            session_start();
            $_SESSION['login_user']=$_POST["username"];
            header('Location: index.php');
            exit();
        } else {
            $usernameErr="Wrong login credentials!";
        }
    }
}
?>
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
    <span class="align-center"><div class="error"><?php echo @$successmsg ?: ''; ?></div><br></span>
    <div class="container">
        <div class="row justify-content-center">
            <div >
                    <div data-form-alert="" hidden="">Thanks for filling out the form!</div>
            
                    <form  action="login.php" method="POST" autocomplete="off"><div class="row row-sm-offset">
                            <input type="hidden" name="token" value="<?php echo $token; ?>" />
                            <div class="col-md-4 multi-horizontal" data-for="name">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="name-form1-m">Name</label>
                                    <input type="text" class="form-control" name="username" data-form-field="Name" placeholder="Username">
                                </div>
                            </div>
                            <div class="col-md-4 multi-horizontal" data-for="email">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7" for="email-form1-m">Password</label>
                                    <input type="password" class="form-control" name="password" autocomplete="new-password" placeholder="Password" >
                                </div>
                            </div>
                            
                        </div>
                        
            
                        <span class="input-group-btn"><button  type="submit" class="btn btn-primary btn-form display-4">LOG IN</button></span>
                        <a href='resetPassword.php?username=priyankajalan'><p  class="text-center" style="margin-top:20px;">I forgot my password !</p></a>
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