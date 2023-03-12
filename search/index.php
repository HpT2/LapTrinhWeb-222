<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel='stylesheet' href='style.css' type='text/css'>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>
    <body>
    <?php include("../base/header.php"); ?>
        <div class="container-fluid">
            <div class="row margin-2">
                <div class="col">
                    <div class="form-outline mb-4">
                        <input type="search" class="form-control" id="datatable-search-input" placeholder="Search">
                    </div>
                </div>
                <div class="col">
                    <button class="btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label for="price">Price</label>
                    <select class="form-select" id="price">
                        <option value="low2high">Low to High</option>
                        <option value="high2low">High to Low</option>
                        <option value="default" selected>Default</option>
                    </select>
                </div>
                <div class="col">
                    <label for="name">Name</label>
                    <select class="form-select" id="name">
                        <option value="A2Z">A-Z</option>
                        <option value="Z2A">Z-A</option>
                        <option value="default" selected>Default</option>
                    </select>
                </div>
                <div class="col">
                    <label for="date">Date</label>
                    <select class="form-select" id="date">
                        <option value="newest">From newest to oldest</option>
                        <option value="oldest">From oldest to newest</option>
                        <option value="default" selected>Default</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <table class="table" style="text-align: center; width:100%;" name="product_table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Released date </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><button style="border:0px;"><img src="iphone.jpeg" style="height:100px;"></button></td>
                            <td><a href="#">Iphone</a></td>
                            <td>1011110</td>
                            <td>1/1/1222</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><button style="border:0px;"><img src="iphone.jpeg" style="height:100px;"></button></td>
                            <td><a href="#">Iphone</a></td>
                            <td>0000</td>
                            <td>1/1/1222</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><button style="border:0px;"><img src="iphone.jpeg" style="height:100px;"></button></td>
                            <td><a href="#">Iphone</a></td>
                            <td>0000</td>
                            <td>1/1/1222</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <input type="button" id="more" value="More..." onclick="More()">
    <?php include('../base/footer.html'); ?>
    <script src="search.js"></script>
    </body>
</html>