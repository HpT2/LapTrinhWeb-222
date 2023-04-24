<?php
	$connection = mysqli_connect('localhost','root','','shop');

	if ($connection === false){
		http_response_code(500);
		exit;
	}

	$query = "select id from products";
	$res = $connection->query($query);
	$ids = $res->fetch_all(MYSQLI_ASSOC);
	$i = 0;
	foreach($ids as $id){
		if ($id['id'] != $i+1) break;
		$i += 1;
	}

	$id = $i + 1;
	$name = $_POST['product_name'];
	$des = $_POST['product_description'];
	$price = $_POST['product_price'];
	$image = $_POST['product_image'];

	$query = "insert into products values ($id,'$name','$des',$price,'$image')";
	$connection->query($query);
	$connection->close();

	echo $id;
?>