<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <body>
    <?php include("../base/header.php"); ?>
    <script type="text/javascript">
        var ss = '<?php echo json_encode($_SESSION) ?>';
    </script>
        <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'admin'){ ?>
            <div class="container-fluid b">
                <div class="d-flex">
                    <div class="b1">
                            <div class="avatar">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="admin" class="rounded-circle" width="150">
                            </div> 
                            <div class="info">
                                    Name: <?php echo $_SESSION['username'] ?> <br>
                                    Role: Admin
                            </div>
                    </div>
                    <div class="b2" >
                        <ul class="list-group" name="user_list" style="width:100%;">

                        </ul>
                    </div>
                </div>
            </div>
        <?php }else{echo "You don't have permission to access this page";} ?>
        <script src="admin.js"></script>
        <?php include('../base/footer.html'); ?>
    </body>
</html>