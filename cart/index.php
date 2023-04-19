<?php 
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['loggedin'] == false){
		//show error page
		header("Location: /login/login.php");
		exit();
	}
	if($_SESSION['role'] != 'customer'){
		//show error page
		echo 'This page is only for customer';
		exit();
	}else{ 
		require_once('../config/config.php');

		$query = "select * from customer where username='".$_SESSION['username']."'";
		
		$res = $connection->query($query);
		$CUSTOMER_INFO = $res->fetch_assoc();


		$query = "select id from cart where customerID=".$CUSTOMER_INFO['id'];
		$res = $connection->query($query);
		$cartID = $res->fetch_assoc()['id'];

		$query = "select productID,amount from keep where cartID=".$cartID;
	
		$res = $connection->query($query);
		$products_in_cart_id = $res->fetch_all(MYSQLI_ASSOC);

		$total = 0;
		$PRODUCTS_DETAIL = array();
		foreach($products_in_cart_id as $product_id){
			$query = "select * from products where id=".$product_id['productID'];
			$res = $connection->query($query);
			$detail = $res->fetch_assoc();
			$detail['quantity'] = $product_id['amount'];
			$detail['subtotal'] = $detail['quantity'] * $detail['price'];
			array_push($PRODUCTS_DETAIL, $detail);
			$total +=  $detail['subtotal'];
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
			</head>
		<body style="background-color: #a6a9be;">

		
			<?php include('../base/header.php'); ?>
				<div class="container mt-3 mb-3">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-column">
                <div class="h3">My cart</div>
            </div>
        </div>

        <div id="table" class="bg-white rounded">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
							<th scope="col"></th>
                            <th scope="col" class="text-uppercase">item</th>
                            <th scope="col" class="text-uppercase">Quantity</th>
                            <th scope="col" class="text-uppercase">price each</th>
                            <th scope="col" class="text-uppercase">total</th>
							
                        </tr>
                    </thead>
                    <tbody>
						<?php foreach($PRODUCTS_DETAIL as $product){ ?>
							<tr id="product_<?php echo $product['id']; ?>">
							<td>
							<img src="<?php echo $product['image'] ?>"
                                        alt="">
							<div class="close" id="close_<?php echo $product['id']; ?>">&times;</div>
							</td>
                            <td class="item">
                                <div class="d-flex justify-content-center">
                                    <div class="pl-2">
                                       <?php echo $product['name'] ?>
                                        <div class="d-flex flex-column justify-content-center">
                                            <div class="add-cmt d-flex justify-content-center"><a href="#"><span class="red text-uppercase"><span
                                                            class="fas fa-comment pr-1"></span>Add a comment</span></a>
                                            </div>
                                        </div>
                                    </div>
                            </td>
                            <td>
								<input type="number" min="1" id="quantity_<?php echo $product['id'] ?>" value="<?php echo $product['quantity']; ?>" style="width:35px; height:25px">
							</td>
                            <td class="font-weight-bold">
                                $<?php echo $product['price'] ?>
                            </td>
							<td id="subtotal_<?php echo $product['id'] ?>">
								<?php echo $product['subtotal']; ?>
							</td>
                        </tr>	
						<?php } ?>
                        
                        
                    </tbody>
                </table>
            </div>

            
        </div>
        <div class="d-flex justify-content-between">
            <div class="text-muted">

            </div>
            <div class="d-flex flex-column justify-content-end align-items-end">
                <div class="d-flex px-3 pr-md-5 py-1 subtotal">
                    <div class="px-4">Subtotal</div>
                    <div class="h5 font-weight-bold px-md-2" id="total">$<?php echo $total; ?></div>
                </div>
				<button style="border:none; background-color:inherit">
				<div class="text-muted tag mt-2">
                   <a href="payment/" style="text-decoration: underline; color: inherit"> Confirm <span class="fas fa-shopping-cart pl-1"></span> </a> 
                </div>
				</button>
            </div>
        </div>
    </div>
	
			<?php include('../base/footer.html'); ?>

		<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
		<script src="js/cart.js"></script>
		<!-- JavaScript Libraries -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.15/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../utils/lib/wow/wow.min.js"></script>
    <script src="../utils/lib/easing/easing.min.js"></script>
    <script src="../utils/lib/waypoints/waypoints.min.js"></script>
    <script src="../utils/lib/counterup/counterup.min.js"></script>
    <script src="../utils/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../utils/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../utils/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../utils/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../utils/js/main.js"></script>
			</body>
		</html>
	<?php } ?>