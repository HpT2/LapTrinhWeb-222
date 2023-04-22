<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "laptrinhweb_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
    <!-- Search -->
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="search-bar" method="post">
                    <input class="search-input pl-3" type="text" placeholder="Tìm kiếm sản phẩm..." name="search" />
                    <button class="search-btn btn bg-danger" name="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="product-page">
        <!-- !Search -->

        <!-- Product -->
        <div class="container">
            <div class="row">
                <div class="col-sm-2 d-none d-sm-block">
                    <div class="category">
                        <h2 class="category-title">Category</h2>
                        <ul class="category-list">
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
                <div class="col-12 col-sm-10">
                    <div class="product-list">
                        <div class="row">
                            <?php
                                if(isset($_POST['submit'])) {
                                    $search = $_POST['search'];

                                    // id='$search': must correct all
                                    // id like'%search$': just need partially correct
                                    $sql="Select * from `products` where id like '%$search%'
                                    or name like '%$search%'
                                    or price like '%$search%'
                                    or brand='$search'";    
                                    $result=mysqli_query($conn, $sql);
                                    if($result) {
                                        // Num of products > 0
                                        if(mysqli_num_rows($result) > 0) {
                                            // https://...?data=x  = href='...?data=x'
                                            while($row = mysqli_fetch_assoc($result)){
                                                echo '
                                                <div class="col-6 col-sm-4 product-item">
                                                    <a class="product-item-link text-center" href="detail/detail.php?data='.$row['id'].'">
                                                        <div class="product-img-container">
                                                            <div><img class="product-img" src='.$row['image'].'></div>
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
                            ?>
                        </div>

                        <!-- <div class="row">
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-6 col-sm-3">
                                <a class="product-item-link text-center" href="">
                                    <img class="product-img" src="./assets/imgs/1.png" alt="">
                                    <div class="product-content">
                                        <h2 class="product-title">Iphone 14</h2>
                                        <p class="product-price">Price: 200$</p>
                                        <div class="product-desc">
                                            <span class="product-sold">3k sold</span>
                                            <div class="product-from">Viet Nam</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- !Product -->
    </div>

    <script src='./assets/js/search.js'></script>
</body>

</html>