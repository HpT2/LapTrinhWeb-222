        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" type="text/css">
        <link rel="stylesheet" href="../css/header.css" type="text/css">

        <header class="p-3 bg-dark text-white">
            <div class="container-fluid">
                <div class="d-flex">

                    <div class="block1">
                        <ul class="nav justify-content-center">
                            <li><a href="../homepage/" class="nav-link px-2 text-white">Home</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">Features</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                            <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                        </ul>
                    </div>

                    <form class="form-center" action="../search/">
          
                            <div class="form-outline">
                              <input type="search" class="form-control" placeholder="Search..." name="search" aria-label="Search">
                            </div>
          
                            <div class="form-outline">
                              <button type="submit" class="btn btn-primary">Search</button>
                            </div>
          
                    </form>
                    <?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) { ?>
                        <div class="block3">
                                <a href="../login/" class="btn btn-outline-light me-2">Login</a>
                                <a href="../register/" class="btn btn-warning">Sign-up</a>
                        </div>
                    <?php }else{ ?>
                        <div class="block3">
                            <form action="../php/logout.php">
                                <button type="submit" class="btn btn-danger me-2">Logout</button>
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
    </header>