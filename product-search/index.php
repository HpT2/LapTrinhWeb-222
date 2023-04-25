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
	
	<div class="container bg-white">
    <nav class="navbar navbar-expand-md navbar-light bg-white">
        <div class="container-fluid p-0"> <a class="navbar-brand text-uppercase fw-800" href="#"><span class="border-red pe-2">New</span>Product</a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="myNav" aria-expanded="false" aria-label="Toggle navigation"> <span class="fas fa-bars"></span> </button>
            <div class="collapse navbar-collapse" id="myNav">
                <div class="navbar-nav ms-auto"> <a class="nav-link active" aria-current="page" href="#">All</a> <a class="nav-link" href="#">Women's</a> <a class="nav-link" href="#">Men's</a> <a class="nav-link" href="#">Kid's</a> <a class="nav-link" href="#">Accessories</a> <a class="nav-link" href="#">Cosmetics</a> </div>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/54203/pexels-photo-54203.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-red">sale</div>
            <div class="title pt-4 pb-1">Winter Sweater</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 60.0</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/6764040/pexels-photo-6764040.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-black">out of stock</div>
            <div class="title pt-4 pb-1">Denim Dresses</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 55.0</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/914668/pexels-photo-914668.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-green">new</div>
            <div class="title pt-4 pb-1"> Empire Waist Dresses</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 70.0</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/6311392/pexels-photo-6311392.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="title pt-4 pb-1">Pinafore Dresses</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 60.0</div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/54203/pexels-photo-54203.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-red">sale</div>
            <div class="title pt-4 pb-1">Winter Sweater</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 60.0</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/6764040/pexels-photo-6764040.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-black">out of stock</div>
            <div class="title pt-4 pb-1">Denim Dresses</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 55.0</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/914668/pexels-photo-914668.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="title pt-4 pb-1"> Empire Waist Dresses</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 70.0</div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex flex-column align-items-center justify-content-center product-item my-3">
            <div class="product"> <img src="https://images.pexels.com/photos/6311392/pexels-photo-6311392.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
                <ul class="d-flex align-items-center justify-content-center list-unstyled icons">
                    <li class="icon"><span class="fas fa-expand-arrows-alt"></span></li>
                    <li class="icon mx-3"><span class="far fa-heart"></span></li>
                    <li class="icon"><span class="fas fa-shopping-bag"></span></li>
                </ul>
            </div>
            <div class="tag bg-green">new</div>
            <div class="title pt-4 pb-1">Pinafore Dresses</div>
            <div class="d-flex align-content-center justify-content-center"> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span class="fas fa-star"></span> </div>
            <div class="price">$ 60.0</div>
        </div>
    </div>
</div>




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

										<a href="/homepage/" class="btn btn-outline-secondary text-secondary nav-item nav-link">Home</a>
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