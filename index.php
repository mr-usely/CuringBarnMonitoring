<?php 
require_once("../../Initialization/initialize.php");
if (!$session->is_logged_in()) {redirect_to("../index.php"); };
$found_user = Personnel::find_by_userid($session->UserID); 
?>

<!-- header -->
<?php include_once 'base/header.php'; ?>

<!-- Side Bar -->
<?php include_once 'base/sidebar.php'; ?>

<!-- Navigation Bar -->
<?php include_once 'base/navbar.php'; ?>

<?php

    switch (true) {
        case ($menu == "main"):
        case null:
            include_once 'pages/dashboard.php';
            break;
        default:
            echo "Page Not Found";
            break;
    }

?>

<!-- Footer -->
<?php include_once 'base/footer.php'; ?>