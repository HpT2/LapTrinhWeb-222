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
			
		}else{
			$query = "select * from bill where CustomerID=".$CUSTOMER_ID;
			$res = $connection->query($query);
			$bills = $res->fetch_all(MYSQLI_ASSOC);
			
		}
		$connection->close();
	}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Orders</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css/bill.css">
	</head>
	<body style="background-color: #a6a9be;">
		<?php include('../base/header.php'); ?>
			<div class="container-fluid">
					<div class="container mt-4 mb-4">
						<?php
							if (!isset($_GET["id"])){
							?>
							<div class='row justify-content-center' style='margin-top: 10px;'>
								<ul class='list-group'>
									<li class="list-group-item d-flex justify-content-between align-items-center align-middle" style="border:none;background-color: inherit">
										<div class="row" style="width:100%;margin-top: 50px;">
											<div class="col-1 d-flex justify-content-center">
												ID
											</div>
											<div class="col-4 d-flex justify-content-center">
												Date
											</div>
											<div class="col-2 d-flex justify-content-end">
												Cost
											</div>
											<div class="col">
											</div>
										</div>
									</li>
								</ul>
							</div>
							<?php	
								echo '<div class="scrollable">';
								echo "<div class='row justify-content-center' style='margin-top: 10px;'>";
								echo "<ul class='list-group'>";
								foreach($bills as $bill){
									echo '<li class="list-group-item d-flex justify-content-between align-items-center align-middle">';?>
									<div class="row" style="width:100%">
										<div class="col-1 d-flex justify-content-center">
											<?php echo $bill['id']; ?>
										</div>
										<div class="col-4 d-flex justify-content-center">
											<?php echo $bill['date']; ?>
										</div>
										<div class="col-2 d-flex justify-content-end align-middle">
											<?php echo $bill['totalcost']; ?>
										</div>
										<div class="col-1">
											$
										</div>
										<div class="col d-flex justify-content-center">
											<a href="?id=<?php echo $bill['id']; ?>" class="btn btn-primary">Detail</a>
										</div>
									</div>
								<?php 
									echo '</li>';
								}
							echo '</ul>';
							echo '</div>';
							echo '</div>';
							echo '<div class="col d-flex justify-content-center">
							<a href="/homepage/" class="btn btn-primary" style="margin-top: 20px;">Back to Homepage</a></div>';
						?>
							<?php }else{ ?>
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
										<div class="col d-flex justify-content-center">
											<a class="btn btn-primary" href="/homepage/">Back to Homepage</a>
											<a href="/bills/" class="btn btn-primary" style="margin-left: 10px">Other bills</a>
										</div>
									</div>
							<?php } ?>
					</div>
			</div>
		<?php include('../base/footer.html'); ?>
	</body>
</html>