<?php 
	session_start(); 
	if(isset($_POST['login-btn'])){
		if ($_POST['username'] == ""){
			$username_err = "Please type username";
		}
		else if ($_POST['password'] == ""){
			$password_err = "Please type password";
		}
		else {
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['logged'] = true;
			header("Location: info.php");
			exit;
		}
	}
	if(!isset($_SESSION['username']) or $_SESSION['logged'] == false){
?>	
	<!DOCTYPE html>
	<html lang="en">
		<head>
			<title>Login page</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		</head>
		<body>
			<div style="padding: 20px;" class="d-flex justify-content-center">
                        <form action="" method="post">
                            <div class="form-group" style="width:400px;">
                                <label>Username</label>
                                <input type="text" id="username" name="username" placeholder="Username" style="height: 50px" class="form-control" value="">
								<span style="color:red;font-weight:500;"><?php if(isset($username_err)) echo $username_err; ?></span>
							</div><br>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" placeholder="Password" style="height: 50px" class="form-control ">
								<span style="color:red;font-weight:500;"><?php if(isset($password_err)) echo $password_err; ?></span>
							</div><br>
                            <div class="form-group justify-content-center d-flex">
                                <input type="submit" name="login-btn" class="btn btn-primary" value="Login" style="width:200px;">
                            </div><br>
                            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
                        </form>
                    </div>
		</body>
	</html>
<?php	}else{
	header("Location: info.php");
} ?>
