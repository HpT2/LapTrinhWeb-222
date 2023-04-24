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

	  $customer_id = $_SESSION['id'];
	  $product_id = $_POST['id'];
	  $now =  date('Y-m-d H:i:s');
	  $comment = $_POST['content'];
	  
	  $query = "select * from comment where customerid=$customer_id and productid=$product_id";
	  $connection->query($query);
	  if($connection->affected_rows == 1){
		$query = "update comment set content='$comment', comment_date='$now' where customerid=$customer_id and productid=$product_id";
		$response = "update";
	  }else{
		$query = "insert into comment values ($product_id, $customer_id, '$comment', '$now')";
		$response = "new";
	  }

	  echo $response;
	  $connection->query($query);
	  
	  $connection->close();



?>