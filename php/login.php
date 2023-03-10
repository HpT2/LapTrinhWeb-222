<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username!="HPT"){
        echo "wrong username";
    }else{
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'HPT';
        header('Location: ../user_profile/');
        exit;
    }
?>
