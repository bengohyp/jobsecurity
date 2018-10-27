<?php
session_start();

require_once("php/html_functions.php");
require_once("php/functions.php");
require_once("php/database.php");

#$_POST = $_SESSION;

$search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["search"])) {
        $_SESSION["searchErr"] = "Please enter a search term";
    } elseif (strlen($_POST["search"]) < 3) {
        $_SESSION["searchErr"] = "Please enter at least 3 characters to search";
        header('Location: index.php');
    } else {
        $search = validate_input($_POST["search"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$search)) {
            $_SESSION["searchErr"] = "Only letters and spaces allowed";
            header('Location: index.php');
        }
    }
}

?>
<?php jobsec_header(); ?>
<section class="features18 popup-btn-cards cid-r71GBnHD4m" id="features18-r">
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

<?php jobsec_footer(); ?>