<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username == "HPT"){
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = 'HPT';
        $_SESSION['role'] = 'admin';
        header('Location: ../admin/');
        exit;
    }else{
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = 'customer';
        header('Location: ../user_profile/');
        exit;
    }
?>
