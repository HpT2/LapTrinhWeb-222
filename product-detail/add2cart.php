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
	  require_once "../config/config.php";

	  $stmt = $connection->prepare("SELECT ID FROM CART WHERE CUSTOMERID = ?");
	  $stmt->bind_param("i", $_SESSION['id']);
	  $CART_ID = $stmt->execute();
	  

?>