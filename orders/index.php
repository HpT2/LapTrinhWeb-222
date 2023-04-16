<?php
	session_start();

	if(!isset($_SESSION['username']) || $_SESSION['loggedin'] == false){
		//show error page
		echo "You must log in to see this page";
		exit();
	}
	if($_SESSION['role'] != 'customer'){
		//show error page
		echo 'This page is only for customer';
	}else{
		
	}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/header.css">
	</head>
	<body>
		<?php include('../base/header.php'); ?>
			<div class="container">

			</div>
		<?php include('../base/footer.html'); ?>
	</body>
</html>