<?php
	$connection = mysqli_connect('localhost','root','','shop');

	if ($connection === false){
		http_response_code(500);
		exit;
	}

	$query = "select * from products";
	$res = $connection->query($query);
	$data = $res->fetch_all(MYSQLI_ASSOC);
	$connection->close();
	echo json_encode($data);
?>