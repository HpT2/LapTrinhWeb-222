<?php 
	session_start();
	if (!isset($_SESSION['username']) || !$_SESSION['loggedin'] || $_SESSION['role'] != 'customer'){
		//return to error page
		echo "you must login to see this page";
		exit();
	}
	$connection = new mysqli('localhost',$_SESSION['username'],$_SESSION['password'],'laptrinhweb_db');

	if ($connection->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$query = "select id,name,phone,address from customer where username='".$_SESSION['username']."'";
	$res = $connection->query($query);
	$CUSTOMER_INFO = $res->fetch_assoc();

	$_SESSION['products'] = array();
	$total_cost = 0;
	foreach($_POST as $id => $value){
		$id = explode('checkbox_',$id)[1];
		$query = "select price from product where id=".$id;
		$res = $connection->query($query);
		$price = $res->fetch_assoc()['price'];
		$total_cost += $value * $price;
		if(isset($_SESSION['products'][$id])){
			$_SESSION['products'][$id] = $value;
		}else{
			array_push($_SESSION['products'],[$id => $value]);
		}
	}

?>
<!DOCTYPE html>
<html lang="vi">
	<head>
		<title>Payment</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="/css//payment.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-2" style="border:1px solid black">
					Home logo
				</div>
				<div class="col-8" style="border:1px solid black">
					<h1>Payment</h1>
				</div>
				<div class="col-2" style="border:1px solid black">
					Tt liên hệ
				</div>
			</div>
		</div>
		<div class="container payment-body"">
			<form action="pay.php">
				<div class="content">
					<div class="Type">
						<div class="hinhthucgiao">

							<fieldset class="form-group border p-3" style="border: 1px solid black;">
								<legend class="w-auto px-2">Hình thức giao hàng</legend>
								<div class="form-group">
									<label><input type="radio" name="hinhthucgiao">Hình thức 1</label>
								</div>
								<div class="form-group">
									<label><input type="radio" name="hinhthucgiao">Hình thức 2</label>
								</div>
							</fieldset>

						</div>
						<div class="phuongthucthanhtoan">
							<fieldset class="form-group border p-3" style="border: 1px solid black;">
								<legend class="w-auto px-2">Phương thức thanh toán</legend>
								<div class="form-group">
									<label><input type="radio" name="phuongthucthanhtoan">Phương thức 1</label>
								</div>
								<div class="form-group">
									<label><input type="radio" name="phuongthucthanhtoan">Phương thức 2</label>
								</div>
								<div class="form-group">
									<label><input type="radio" name="phuongthucthanhtoan">Phương thức 3</label>
								</div>
							</fieldset>
						</div>
					</div>
					<div class="buy-info">
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
					</div>
					<div class="final">
						<div>
							<strong>Total cost:</strong>
						</div>
						<div class="row total">
							<div class="col-10">
								<input type="number" id="total" value="<?php echo $total_cost ?>" disabled>
							</div>
							<div class="col-2">
									$
							</div>
						</div>
						<div class="d-flex justify-content-center">
							<button class="btn btn-danger" type="submit" style="width: 100%;">Xác nhận</button>
						</div>	
					</div>
				</div>
			</form>
		</div>
	</body>
</html>