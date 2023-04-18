<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
  //show error page
  header("Location: /login/login.php");
  exit();
}
if($_SESSION['role'] != 'customer'){
  //show error page
  echo 'This page is only for customer';
  exit();
}
// Include config file
require_once "../login/config.php";

if(isset($_POST['update-btn'])){
  // Validate credentials
  $updatesql = 'UPDATE customer SET name ="'.$_POST['name'].'",phone = "'.$_POST['phone'].'",address ="'.$_POST['address'].'",birthday = "'.$_POST['birthday'].'" WHERE id ='.$_SESSION["id"];
  $link->query($updatesql);
}

$link->close();

header("Location: /customer");
?>