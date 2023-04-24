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
    <title>Document</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
	<?php include "../base/header.php" ?>

	<div class="container mt-5 mb-5">
    <!-- Search -->
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="search-bar" method="post">
                    <input class="search-input pl-3" type="text" placeholder="Tìm kiếm sản phẩm..." name="search" />
                    <button class="search-btn btn bg-danger" name="submit">Search</button>
                    <button class="search-btn btn bg-danger" name="increase-sort-submit">Low to Hight</button>
                    <button class="search-btn btn bg-danger" name="decrease-sort-submit">Hight to Low</button>
                </form>
            </div>
        </div>
    </div>

    <div class="product-page">
        <!-- !Search -->

        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-md-2 d-none d-md-block">
                    <div class="category">
                        <h2 class="category-title">Categories</h2>
                        <ul class="category-list">
                            <li class="category-item">
                                <a href="#" class="category-link">All Products</a>
                            </li>
                            <li class="category-item">
                                <a href="#" class="category-link">Apple</a>
                            </li>
                            <li class="category-item">
                                <a href="#" class="category-link">Acer</a>
                            </li>
                            <li class="category-item">
                                <a href="#" class="category-link">Asus</a>
                            </li>
                        </ul>
                    </div>
                </div>
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
                                            echo '<h2 class=text-danger>Computer not found</h2>';
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
                                                echo '<h2 class=text-danger>Computer not found</h2>';
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