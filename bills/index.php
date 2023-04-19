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
			$amount = array();
			foreach($product_IDs as $id){
				$query = "select * from products where id=".$id['product_ID'];
				$res = $connection->query($query);
				array_push($products, $res->fetch_assoc());
				array_push($amount, $id['amount']);
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
					<div class="container">
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
								<section class="h-100 h-custom">
									<div class="container py-5 h-100">
										<div class="row d-flex justify-content-center align-items-center h-100">
										<div class="col-lg-8 col-xl-6">
											<div class="card">
											<div class="card-body p-5" style="background-color: #21295c; border-radius:5px">

												<p class="lead fw-bold mb-5" style="color:#ffd166;">Purchase Reciept</p>

												<div class="row">
												<div class="col mb-3">
													<p class="small mb-1" style="color:#ffe3a3;">Date</p>
													<p style="color:#ffe3a3;"><?php echo $bill_detail['date']; ?></p>
												</div>
												<div class="col mb-3">
													<p class="small mb-1" style="color:#ffe3a3;">Order No.</p>
													<p style="color:#ffe3a3;"><?php echo $bill_detail['id'] ?></p>
												</div>
												</div>

												<div class="mx-n5 px-5 py-4" style="background-color: #a6a9be;">
													<div class='row'>
														<div class='col-md-3 col-lg-3' style="text-align: center;">
															<strong>Name</strong>
														</div>
														<div class="col-md-3 col-lg-3" style="text-align: center;">
															<strong>Price</strong>
														</div>
														<div class='col-md-3 col-lg-3' style="text-align: center;">
															<strong>Quantity</strong>
														</div>
														<div class='col-md-3 col-lg-3' style="text-align: center;">
															<strong>Total</strong>
														</div>
													</div>
													
													<?php
													$total = 0;
													$i= 0;
														foreach($products as $product){
															echo "<div class='row'>";
															echo "<div class='col-md-3 col-lg-3' style='text-align: center;'> ";
															echo "<p>".$product['name']."</p>";
															echo "</div>";
															echo "<div class='col-md-3 col-lg-3' style='text-align: center;'>";
															echo "<p> ".$product['price']." $</p>";
															echo "</div>";
															echo "<div class='col-md-3 col-lg-3' style='text-align: center;'>";
															echo "<p> x".$amount[$i]."</p>";
															echo "</div>";
															echo "<div class='col-md-3 col-lg-3' style='text-align: center;'>";
															echo "<p>".$product['price']*$amount[$i]." $</p>";
															$total += $product['price']*$amount[$i];
															echo "</div>";
															echo "</div>";
															$i += 1;
														}
													?>

												</div>

												<div class="row my-4">
													<div class="col-md-7" style="text-align: center;">
														<span class="lead fw-bold mb-0" style="color:#ffd166;">Total</span>
													</div>
													<div class="col-md-3">
														<span class="lead fw-bold mb-0" style="color:#ffd166;"><?php echo $total ?> $</span>
													</div>
												</div>



												<p class="mt-4 pt-2 mb-0"  style="color:#ffe3a3;">Want any help? <a href="#!" style="color: #f37a27;">Please contact
													us</a></p>

											</div>
											</div>
										</div>
										</div>
									</div>
									</section>
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