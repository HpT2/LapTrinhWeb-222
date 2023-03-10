<?php
    session_start();
    if($_SESSION['loggedin'] ||  $_SESSION['loggedin'] == true){
        session_unset();
        session_destroy();
    }
    header('Location: ../homepage/');
    exit;
?>
