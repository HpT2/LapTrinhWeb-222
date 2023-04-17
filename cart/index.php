<?php 
	session_start();
	$_SESSION['username'] = "hptisme";
	$_SESSION['password'] = '123';
	$_SESSION['loggedin'] = true;
	$_SESSION['role'] = 'customer';
	if(!isset($_SESSION['username']) || $_SESSION['loggedin'] == false){
		//show error page
		echo "You must log in to see this page";
		exit();
	}
	if($_SESSION['role'] != 'customer'){
		//show error page
		echo 'This page is only for customer';
		exit();
	}else{ 
		$connection = new mysqli('localhost',$_SESSION['username'],$_SESSION['password'],'laptrinhweb_db');

		// Check connection
		if ($connection->connect_error) {
			die("Connection failed: " . $connection->connect_error);
	  	}
		$query = "select id,name,phone,address from customer where username='".$_SESSION['username']."'";
		
		$res = $connection->query($query);
		$CUSTOMER_INFO = $res->fetch_assoc();

		$query = "select id from cart where customerID=".$CUSTOMER_INFO['id'];
		$res = $connection->query($query);
		$cartID = $res->fetch_assoc()['id'];

		$query = "select productID from keep where cartID=".$cartID;
	
		$res = $connection->query($query);
		$products_in_cart_id = $res->fetch_all(MYSQLI_ASSOC);

		$PRODUCTS_DETAIL = array();
		foreach($products_in_cart_id as $product_id){
			$query = "select * from product where id=".$product_id['productID'];
			$res = $connection->query($query);
			$detail = $res->fetch_assoc();
			$detail['to_money'] = $detail['price'];
			array_push($PRODUCTS_DETAIL, $detail);
		}
	
		$connection->close();

	?>
		<!DOCTYPE html>
		<html lang="vi">
			<head>
				<title>Cart page</title>
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" style="text/css" href="/css/bootstrap.min.css">
				<link rel="stylesheet" style="text/css" href="/css/cart.css">
				<link rel="stylesheet" style="text/css" href="/css/header.css">
			</head>
			<body>
				<?php include('../base/header.php'); ?>
				<div>
					<div class="body-content">
						<div class="container ">
							<div class="row">
								<h1>Cart</h1>
							</div>
							<div class="content">
								<div class="product-list">
									<div id="tbl-header" class="row tbl-header">
										<div class="col-3">Image</div>
										<div class="col-2">Product name</div>
										<div class="col-2">Price</div>
										<div class="col-2">Amount</div>
										<div class="col-1">Total</div>
										<div class="col-1"><input type="checkbox" class="check" id="checkall"></div>
										<div class="col-1">
											<button type="button" value="rm-all" name="rm-btn" ><img class="icon" src="/image/icon/thungrac.png"></button>
										</div>
									</div>
									<div class="scrollable">
										<?php
												foreach($PRODUCTS_DETAIL as $detail){
													echo '<div class="row tbl-item" id="product_'.$detail['id'].'">';

													echo '<div class="col-3"><form method="get" action="">
														<button  type="submit"><img class="product-img" src="'.$detail['image'].'">';
													echo '</button><input type="hidden" name="id" value="'.$detail['id'].'">';
													echo '</form></div>';

													echo '<div class="col-2">'.$detail['name'].'</div>';
													echo '<div class="col-2" id="price_of_'.$detail['id'].'">'.$detail['price'].'</div>';
													echo '<div class="col-2">
														<div class="btn-group" role="group">
															<button type="button" class="btn btn-light decrease-amount" name="decrease'.$detail['id'].'">-</button>
															<input type="number" class="amount btn-light" id="amount_of_'.$detail['id'].'" value="1">
															<button type="button" class="btn btn-light decrease-amount" name="increase'.$detail['id'].'">+</button>
														</div>
													</div>';
													echo '<div class="col-1" id="to_money_'.$detail['id'].'">'.$detail['to_money'].'</div>';
													echo  '<div class="col-1"><input name="checkbox_'.$detail['id'].'"type="checkbox" value="1" form="buy"></div>';
													echo '<div class="col-1">
														<button type="button" name="rm-btn" value="'.$detail['id'].'"><img class="icon" src="../image/icon/thungrac.png"></button>
														</div></div>';
												}
											?>
									</div>
								</div>
								<div class="customer-info">
									<div class="d-flex" id="info">
										<div class="row">
											<div class="col-6">
												Deliver to
											</div>
											<div class="col-6" style="text-align: right;">
												<a href="">Change</a>
											</div>
										</div>
										<hr style="margin-bottom: 10px;">	
										<div class="row">
											<div class="col">
											<?php
												echo "<strong>".$CUSTOMER_INFO['name'].'</strong> | 
												<strong>'.$CUSTOMER_INFO['phone'].'</strong><br>';
												echo "<div class='home'><span id='home'>Address</span> ".$CUSTOMER_INFO['address'].'</div>';
											?>
											</div>
										</div>
									</div>
									<div class="final">
										<div>
											<strong>Total cost:</strong>
										</div>
										<div class="row total">
											<div class="col-10">
												<input type="number" id="total" value="0" disabled>
											</div>
											<div class="col-2">
												$
											</div>
										</div>
										<div id="ntc">Please choose products</div>
									</div>
									<div class="d-flex justify-content-center">
										<form method="post" action="payment/" id="buy">
											<button class="btn btn-primary" type="submit">Buy</button>
										</form>
									</div>	
								</div>

								</div>
							</div>

						</div>
						
					</div>
				</div>
				<?php include('../base/footer.html'); ?>
				<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
				<script src="js/cart.js"></script>
			</body>
		</html>
	<?php } ?>