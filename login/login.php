<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true && $_SESSION['role'] == 'customer'){
    header("location: welcome.php");
    exit;
}else{
	//navigate to admin page
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
	if(isset($_POST['customer-login-btn'])){
		// Validate credentials
		if(empty($username_err) && empty($password_err)){
			// Prepare a select statement
			$sql = "SELECT id, username, password FROM customer WHERE username = ?";
			
			if($stmt = mysqli_prepare($link, $sql)){
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "s", $param_username);
				
				// Set parameters
				$param_username = $username;
				
				// Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stmt)){
					// Store result
					mysqli_stmt_store_result($stmt);
					
					// Check if username exists, if yes then verify password
					if(mysqli_stmt_num_rows($stmt) == 1){                    
						// Bind result variables
						mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
						if(mysqli_stmt_fetch($stmt)){
							if(password_verify($password, $hashed_password)){
								// Password is correct, so start a new session
								// session_start();
								
								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["username"] = $username;                            
								$_SESSION["role"] = "customer";                            
								// Redirect user to welcome page
								header("location: welcome.php");
							} else{
								// Password is not valid, display a generic error message
								$login_err = "Invalid username or password.";
							}
						}
					} else{
						// Username doesn't exist, display a generic error message
						$login_err = "Invalid username or password.";
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}

				// Close statement
				mysqli_stmt_close($stmt);
			}
		}
	}
    else{
        if(empty($username_err) && empty($password_err)){
			// Prepare a select statement
			$sql = "SELECT COUNT(*) FROM admin WHERE username = '$username' && password = SHA('$password');";
            $res = mysqli_query($link, $sql);
            $val = mysqli_fetch_assoc($res);
            
			if ($val['COUNT(*)'] == 1) {
                // session_start();						
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username; 
                $_SESSION["role"] = "admin";                                                                           
                header("location: admin.php");
            } else{
                // Password is not valid, display a generic error message
                $login_err = "Invalid username or password.";
            }
		}
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../utils/animate/animate.min.css" rel="stylesheet">
    <link href="../utils/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../utils/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../utils/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../utils/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa-solid fa-apple-whole"></i> 4Tech</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="../homepage/index.html" class="nav-item nav-link active">Home</a>
                        <a href="product.html" class="nav-item nav-link">Product</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                    </div>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-login mb-5">
                <div class="d-flex flex-column container my-5 pt-5 pb-4">
                    <div class="d-flex justify-content-center">
                        <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
                    </div>
                    <?php 
                    if(!empty($login_err)){
                        echo '<div class="alert alert-danger">' . $login_err . '</div>';
                    }        
                    ?>
                    <div style="padding: 20px;" class="d-flex justify-content-center">
                        <form action="" method="post">
                            <div class="form-group" style="width:400px;">
                                <label>Username</label>
                                <input type="text" name="username" placeholder="Username" style="height: 50px" class="form-control  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                            </div><br>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Password" style="height: 50px" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                            </div><br>
                            <div class="form-group">
                                <input type="submit" name="customer-login-btn" class="btn btn-primary" value="Login as customer" style="width:200px;">
                                <input type="submit" name="admin-login-btn" class="btn btn-primary" value="Login as admin" style="width:200px;">
                            </div><br>
                            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Shop</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>                        
                        <a class="btn btn-link" href="">Privacy Policy</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>268 Ly Thuong Kiet, Quan 10, TPHCM</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>(+84)987654321</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Monday - Saturday</h5>
                        <p>07AM - 09PM</p>
                        <h5 class="text-light fw-normal">Sunday</h5>
                        <p>09AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Newsletter</h4>
                        <p>If you want to get newsletter from my shop. Please leave your email in the box below</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">4Tech</a>, All Right Reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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