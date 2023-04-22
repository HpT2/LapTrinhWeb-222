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
		require_once('../config/config.php');

		$query = "select id from customer where username='".$_SESSION['username']."'";
		
		$res = $connection->query($query);
		$CUSTOMER_ID = $res->fetch_assoc()['id'];
		
		if(isset($_GET['id'])){
			$bills = $_GET['id'];
			$query = "select * from bill where id=".$_GET['id'];
			$res = $connection->query($query);
			if($connection->affected_rows == 0){
				$connection->close();
				header("Location: /history");
				exit;
			}
			
			$bill_detail = $res->fetch_assoc();
			
			$query = " select product_ID, amount from products_of_bill where bill_id=".$_GET['id'].' and customerID='.$CUSTOMER_ID;
			$res = $connection->query($query);
			$product_IDs = $res->fetch_all(MYSQLI_ASSOC);

			$products = array();
			foreach($product_IDs as $id){
				$query = "select * from products where id=".$id['product_ID'];
				$res = $connection->query($query);
				$product = $res->fetch_assoc();
				$product['quantity'] = $id['amount']; 
				array_push($products, $product);
			}
			$connection->close();
		}else{
			header("Location: /history");
			exit;
		}
	}
?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	</head>
	<body style="background-color: #a6a9be;">
		<?php include('../base/header.php'); ?>
			<div class="container-fluid">
					<div class="container mt-4 mb-4">
					<div class="card">
									<div class="card-header bg-black"></div>
									<div class="card-body">

										<div class="container">
										<div class="row">
											<div class="col-xl-12">
											<i class="far fa-building text-danger fa-6x float-start"></i>
											</div>
										</div>


										<div class="row">
											<div class="col-xl-12">

											<ul class="list-unstyled float-end">
												<li style="font-size: 30px; color: red;">UserIn4 here</li>
												<li>123, Elm Street</li>
												<li>123-456-789</li>
												<li>mail@mail.com</li>
											</ul>
											</div>
										</div>

										<div class="row text-center">
											<h3 class="text-uppercase text-center mt-3" style="font-size: 40px;">Invoice</h3>
											<p><?php echo $bill_detail['id']; ?></p>
										</div>

										<div class="row mx-3">
											<table class="table">
											<thead>
												<tr>
												<th scope="col">Description</th>
												<th scope="col">Amount</th>
												<th scope="col">Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$total = 0;
												foreach($products as $product){ ?>
													<tr>
														<td><?php echo $product['name']; ?></td>
														<td><?php echo $product['quantity']; ?></td>
														<td>$ <?php echo $product['price']*$product['quantity']; ?></td>
													</tr>
												<tr>
												<?php 
												$total += $product['quantity']*$product['price'];
												} ?>
											</tbody>
											</table>

											</div>
		
										<div class="row">
											<div class="col-xl-8" style="margin-left:60px">
											<p>Tax: 10%</p>
											<p
												style="font-size: 30px; color: red; font-weight: 400;font-family: Arial, Helvetica, sans-serif;">
												Total:
												<span><i class="fas fa-dollar-sign"></i> <?php echo $total + 0.1*$total; ?></span></p>
											</div>

										</div>

										<div class="row mt-2 mb-5">
											<p class="fw-bold">Date: <span class="text-muted"><?php echo $bill_detail['date']; ?></span></p>
										</div>

										</div>



									</div>
									<div class="card-footer bg-black"></div>
									</div>
									<div class="row">
										<div class="col d-flex justify-content-center mt-3">
											<a class="btn btn-primary" href="/homepage/">Back to Homepage</a>
											<a href="/history" class="btn btn-primary" style="margin-left: 10px">Other bills</a>
										</div>
									</div>
					</div>
			</div>
		<?php include('../base/footer.html'); ?>
	</body>
</html>