<?php
    session_start();
	require_once "../config/config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4Tech Product</title>




    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
	<?php include "../base/header.php" ?>
	
	<div class="container mt-5 mb-5">
    <!-- Search -->

			<div class="row">
				<form class="search-bar" method="post">
					<div class="col-12">
						<div class="row mb-2">
						<div class="col-9 d-flex justify-content-end"><input class="search-input pl-3"  type="text" placeholder="Tìm kiếm sản phẩm..." name="search" /></div>
						<div class="col-3"><button class="search-btn btn btn-primary" name="submit">Search</button></div>
						</div>
						<div class="row">
							<div class="col-6 d-flex justify-content-end">
							<button class="search-btn btn btn-primary" name="increase-sort-submit">Low to High</button>
							</div>
							<div class="col-6">
							<button class="search-btn btn btn-primary" name="decrease-sort-submit">High to Low</button>
							</div>	
						
						</div>
					</div>
				</form>

			</div>
			<div class="container-fluid position-relative p-0" >
				<nav class="navbar navbar-expand-lg px-4 px-lg-5 py-3 py-lg-0">
								<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
									<span class="fa fa-bars"></span>
								</button>
								<div class="collapse navbar-collapse" id="navbarCollapse">
									<div class="navbar-nav ms-auto py-0 pe-4">

										<a href="/homepage/" class="btn btn-secondary nav-item nav-link">Home</a>
										<a href="/product-search/" class="nav-item nav-link">Product</a>
										<a href="about.html" class="nav-item nav-link">About</a>
										<a href="contact.html" class="nav-item nav-link">Contact</a>
								</div>
							</nav>
			</div>

		<div class="product-page">
			<!-- !Search -->
			
			<!-- Product -->
			<div class="container">
				<div class="row">
					
					<div class="col-12 col-md-10">
						<div class="product-list">
							<div class="row">
								<?php

									$sql_data = isset($_SESSION['sql_data']) ? $_SESSION['sql_data'] : "Select * from `products`";

									// Filter
									if(isset($_POST['increase-sort-submit']) || isset($_POST['decrease-sort-submit'])) {
										if(isset($_POST['increase-sort-submit'])) {
											$sql_data .= " ORDER BY price ASC";
											$result=mysqli_query($connection, $sql_data);
										} else if(isset($_POST['decrease-sort-submit'])) {
											$sql_data .= " ORDER BY price DESC";
											$result=mysqli_query($connection, $sql_data);
										}
										if($result) {
											// Num of products > 0
											if(mysqli_num_rows($result) > 0) {
												// https://...?data=x  = href='...?data=x'
												while($row = mysqli_fetch_assoc($result)){
													echo '
													<div class="col-12 col-sm-6 col-md-4 product-item">
														<a class="product-item-link text-center" href="../product-detail/detail.php?data='.$row['id'].'">
															<div class="product-img-container">
																<div class="product-img" style="background-image: url('.$row['image'].')"></div>
															</div>
															<div class="product-content">
																<h2 class="product-title">'.$row['name'].'</h2>
																<button class="product-price btn btn-danger mt-2">Giá: '.$row['price'].' đ</button>
															</div>
														</a>
													</div>
													';
												}
											} else {
												echo '<h2 class=text-danger>Product	 not found</h2>';
											}
										}
									}
									// !Filter

									// Search Input
									if(isset($_POST['submit'])) {
										$search = $_POST['search'];
										// id='$search': must correct all
										// id like'%search$': just need partially correct
										// echo $search;
										if($search == '') {
											$sql = "SELECT DISTINCT type FROM `products`";

											$result = mysqli_query($connection, $sql);

											if (!$result) {
												die("Query failed: " . mysqli_error($connection));
											}

											while ($row = mysqli_fetch_assoc($result)) {
												$value = $row['type'];
												$sqltype = "SELECT * FROM `products` WHERE type = '$value'";
												$resulttype = mysqli_query($connection, $sqltype);
												echo '<h1 class="col-12 my-4">'.$value.':</h1>';
												// while ($rowtype = mysqli_fetch_assoc($resulttype)) 
												for($i = 0; $i < 6; $i++)
												{
													if($rowtype = mysqli_fetch_assoc($resulttype)) {
														echo '
															<div class="col-12 col-sm-6 col-md-4 product-item">
																<a class="product-item-link text-center" href="../product-detail/detail.php?data='.$rowtype['id'].'">
																	<div class="product-img-container">
																		<div class="product-img" style="background-image: url('.$rowtype['image'].')"></div>
																	</div>
																	<div class="product-content">
																		<h2 class="product-title">'.$rowtype['name'].'</h2>
																		<button class="product-price btn btn-danger mt-2">Giá: '.$rowtype['price'].' đ</button>
																	</div>
																</a>
															</div>
															';
													}
												}
											}
											// if($result) {
											//     // Num of products > 0
											//     if(mysqli_num_rows($result) > 0) {
											//         // https://...?data=x  = href='...?data=x'
											//         while($row = mysqli_fetch_assoc($result)){
											//             echo '
											//             ';
											//         }
											//     } else {
											//         echo '<h2 class=text-danger>Computer not found</h2>';
											//     }
											// }
										} else {
											$sql="Select * from `products` where id like '%$search%'
											or name like '%$search%'
											or price like '%$search%'
											or type='$search'";    
											$_SESSION['sql_data'] = $sql;
											$result=mysqli_query($connection, $sql);
											if($result) {
												// Num of products > 0
												if(mysqli_num_rows($result) > 0) {
													// https://...?data=x  = href='...?data=x'
													while($row = mysqli_fetch_assoc($result)){
														echo '
														<div class="col-12 col-sm-6 col-md-4 product-item">
															<a class="product-item-link text-center" href="../product-detail/detail.php?data='.$row['id'].'">
																<div class="product-img-container">
																	<div class="product-img" style="background-image: url('.$row['image'].')"></div>
																</div>
																<div class="product-content">
																	<h2 class="product-title">'.$row['name'].'</h2>
																	<button class="product-price btn btn-danger mt-2">Giá: '.$row['price'].' đ</button>
																</div>
															</a>
														</div>
														';
													}
												} else {
													echo '<h2 class=text-danger>Product not found</h2>';
												}
											}

										}
										
									}
									// !Search Input

								?>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- !Product -->
		</div>
	</div>
						
	<?php include "../base/footer.html"; ?>
    <script src='./assets/js/search.js'></script>
</body>

</html>