<?php include("../base/base.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'admin'){ ?>
            <div class="container">
                <div class="row">
                    <div class="col-4">
                        <div class="avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="admin" class="rounded-circle" width="150">
                        </div>
                        <div class="info">
                                Name: <?php echo $_SESSION['username'] ?> <br>
                                Role: Admin
                        </div>
                    </div>
                    <div class="col-8" >
                        <ul class="list-group" name="user_list">

                        </ul>
                    </div>
                </div>
            </div>
        <?php }else{echo "You don't have permission to access this page";} ?>
        <script src="admin.js"></script>
    </body>
</html>