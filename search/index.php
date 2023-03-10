<?php include("../base/base.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel='stylesheet' href='style.css' type='text/css'>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row margin-2">
                <div class="col-10">
                    <div class="form-outline mb-4">
                        <input type="search" class="form-control" id="datatable-search-input" placeholder="Search">
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">
                        Search
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="price">Price</label>
                    <select class="form-select" id="price">
                        <option value="low2high">Low to High</option>
                        <option value="high2low">High to Low</option>
                        <option value="default" selected>Default</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="name">Name</label>
                    <select class="form-select" id="name">
                        <option value="A2Z">A-Z</option>
                        <option value="Z2A">Z-A</option>
                        <option value="default" selected>Default</option>
                    </select>
                </div>
                <div class="col-2">
                    <label for="date">Date</label>
                    <select class="form-select" id="date">
                        <option value="newest">From newest to oldest</option>
                        <option value="oldest">From oldest to newest</option>
                        <option value="default" selected>Default</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <table class="table" style="text-align: center;">
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
                            <th scope="row">1</th>
                            <td><img src="iphone.jpeg" style="height:100px;"></td>
                            <td>Iphone</td>
                            <td>10000000000000</td>
                            <td>1/1/1222</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td><img src="iphone.jpeg" style="height:100px;"></td>
                            <td>Iphone</td>
                            <td>10000000000000</td>
                            <td>1/1/1222</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td><img src="iphone.jpeg" style="height:100px;"></td>
                            <td>Iphone</td>
                            <td>10000000000000</td>
                            <td>1/1/1222</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>