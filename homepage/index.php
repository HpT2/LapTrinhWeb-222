<?php include("../base/base.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) { ?>
        <a href="../user_profile"> Click to view profile </a>
        <form action="../php/logout.php">
            <input type="submit" name="logout" value="log out">
        </form>
    <?php } ?>
</html>