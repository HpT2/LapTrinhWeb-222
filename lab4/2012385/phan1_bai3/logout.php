<?php 
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['logged'] == false){
		header('Location: login.php');
		exit;
	}
	unset($_SESSION['username']);
	$_SESSION['logged'] = false;
	header('Location: login.php');
?>