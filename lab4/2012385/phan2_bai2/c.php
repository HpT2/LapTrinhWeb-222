<?php 
	$connection = mysqli_connect('localhost','root','','shop');

	if ($connection === false){
		http_response_code(500);
		exit;
	}

	$id = $_POST['product_id'];
	$name = $_POST['product_name'];
	$des = $_POST['product_description'];
	$price = $_POST['product_price'];
	$image = $_POST['product_image'];

	$query = "update products set name='".$name."',description='".$des."',price=".$price.",image='".$image."' where id=".$id;
	$connection->query($query);
	$connection->close();


?>