<?php 
	$connection = mysqli_connect('localhost','root','','shop');

	if ($connection === false){
		http_response_code(500);
		exit;
	}

	$id = $_POST['id'];

	$query = "delete from products where id=".$id;
	$connection->query($query);
	if($connection->affected_rows == 0){
		$connection->close();
		http_response_code(400);
		exit;
	}

	$connection->close();
	echo $query;

?>