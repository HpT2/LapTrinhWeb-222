<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] === false){
  //show error page
  header("Location: /login/login.php");
  exit();
}
if($_SESSION['role'] != 'customer'){
  //show error page
  echo 'This page is only for customer';
  exit();
}
// Include config file
require_once "../config/config.php";
$sql = "select * from customer where username='".$_SESSION['username']."'";
$res = $connection->query($sql);
$customer = $res->fetch_assoc();
$connection->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Info Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->


</head>

<body>
    <div class="container-fluid bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

		<?php include("../base/header.php"); ?>
        <!-- Navbar & Hero End -->
        
        <div class="container">
            <div class="main-body" style="margin-top: 10px;">
                  <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex flex-column align-items-center text-center">
                            <img src="<?php echo $customer['image']; ?>" alt="" class="rounded-circle" width="150">
                            <div class="mt-3">
                              <?php
                                echo '<h4>'.$customer['name'].'</h4>';
                              ?>
                              <p class="text-secondary mb-1"><?php echo $customer['username']; ?></p>
                            </div>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    <div class="col-md-8">
                      <div class="card mb-3">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Full Name</?h6>
                            </div>
                            <?php
                              echo '<div class="col-sm-9 text-secondary">'.$customer['name'].'</div>';
                            ?>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Phone</h6>
                            </div>
                            <?php
                              echo '<div class="col-sm-9 text-secondary">'.$customer['phone'].'</div>';
                            ?>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Address</h6>
                            </div>
                            <?php
                              echo '<div class="col-sm-9 text-secondary">'.$customer['address'].'</div>';
                            ?>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0">Birthday</h6>
                            </div>
                            <?php
                              echo '<div class="col-sm-9 text-secondary">'.$customer['birthday'].'</div>';
                            ?>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12 d-flex justify-content-center">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal">
                                Edit
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>    
                    </div>
                  </div>
                </div>
            </div> 
        <!-- Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Customer Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- Update form goes here -->
                <form action="save.php" method="post">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Name" value = <?php echo $customer['name'];?>>
                  </div><br>
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone number" value = <?php echo $customer['phone'];?>>
                  </div><br>
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Address" value = <?php echo $customer['address'];?>>
                  </div><br>
                  <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" class="form-control" name="birthday" placeholder="Birthday" value = <?php echo $customer['birthday'];?>>
                  </div><br>
				  <div class="form-group">
                    <label for="avatar">Upload your image</label>
                    <input type="file" class="form-control" name="avatar" value = <?php echo $customer['image'];?>>
                  </div><br>
                  <div class="form-group">
                    <input type="button" name="exit-btn" class="btn btn-secondary" data-dismiss="modal" value="Close">
                    <input type="submit" name="update-btn" class="btn btn-primary" value="Save Changes">
                  </div>
                </form>
              </div>
              <!-- <div class="modal-footer">
                
              </div> -->
            </div>
          </div>
        </div>
        <!-- Footer Start -->
        <?php include('../base/footer.html'); ?>
        <!-- Footer End -->


        <!-- Back to Top -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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