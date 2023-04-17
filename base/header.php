<link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" type="text/css">

    <!-- Libraries Stylesheet -->
    <link href="/utils/lib/animate/animate.min.css" rel="stylesheet" type="text/css">
    <link href="/utils/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="/utils/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" type="text/css" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/utils/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Template Stylesheet -->
    <link href="/utils/css/style.css" rel="stylesheet">
<!-- Navbar & Hero Start -->
       
	<div class="container-fluid position-relative p-0"   style="background-color:#0d1025 ;">
            <nav class="navbar navbar-expand-lg navbar-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="/homepage/" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa-solid fa-apple-whole"></i> 4Tech</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
					<?php if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true && $_SESSION['role']=='customer'){
						echo "<a href='/bills/' class='nav-item nav-link'>History</a>";
						}else{
							
						}?>
                        <a href="/homepage/" class="nav-item nav-link">Home</a>
                        <a href="product.html" class="nav-item nav-link">Product</a>
                        <a href="about.html" class="nav-item nav-link">About</a>
                        <a href="contact.html" class="nav-item nav-link">Contact</a>
                        <a href="/cart/" class="nav-item nav-link"><i class="fa-solid fa-cart-shopping" style="font-size:20px"></i></a>
                    </div>
					<?php if(isset($_SESSION['username']) && $_SESSION['loggedin'] == true && $_SESSION['role']=='customer'){
                    	echo'<a href="" class="nav-item nav-link">';
						echo '<i class="fa fa-user-circle" aria-hidden="true"></i>';
						echo '</a>';
						echo'<a href="/login/logout.php" class="btn btn-danger" style="margin-left: 5px">Logout</a>';
					}else{
						echo'<a href="" class="btn btn-primary">';
						echo "Login";
						echo '</a>';
					}
					?>
                </div>
            </nav>

            <div class="container-fluid py-5  hero-header mb" id="header-homepage" style="background-color:#0d1025;">

            </div>
        </div>