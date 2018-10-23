<?php
session_start();
require_once("php/html_functions.php");
require_once("php/functions.php");

$searchErr = $search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["search"])) {
        $searchErr = "Please enter a search term";
    } elseif (strlen($_POST["search"]) < 3) {
        $searchErr = "Please enter at least 3 characters to search";
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

<?php jobsec_header(); ?>
<section class="header14 cid-r6E0Xa3P44 mbr-fullscreen mbr-parallax-background" id="header14-5">
    <div class="container">
        <div class="media-container-row">
            <div class="media-content">
                <h1 class="mbr-section-title pb-3 align-center mbr-white mbr-fonts-style display-1">
                    Find your dream job now!</h1>
                
                <div class="mbr-section-text  pb-3 ">
                    <p class="mbr-text align-center mbr-white mbr-fonts-style display-5">
                        Just search for the job position you are looking for</p>
                </div>

                <div class="align-center">                    
                    <form action="<?= $phpSelf; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= $search; ?>" required autofocus>
                        </div>
                        <div class="error"><?= $searchErr ?></div>
                        <button type="submit" class="btn btn-primary display-4">SEARCH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php jobsec_footer(); ?>