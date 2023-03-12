<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <?php include("../base/header.php"); ?>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) { ?>
        <a href="../user_profile"> Click to view profile </a>
    <?php } 
        include("../base/footer.html");
    ?>
</html>