<?php session_start(); ?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../css/base.css">
    <div class="container-fluid">
        <div class="row">
            <div class="head col-3">
                Site Name
            </div>
            <div class="head col-7">
                Icon fb | Icon insta | Icon Tweet
            </div>
            <div class="head col-2">
                <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) { ?>
                    <a href="../login/">Login</a>
                 <?php }else{ ?>
                    <a href="../php/logout.php">Log out</a>   
                <?php }?>
            </div>
        </div>
    </div>