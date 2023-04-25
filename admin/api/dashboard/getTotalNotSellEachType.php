<?php
	require_once '../config/config.php';

	$query = "select amount from products where type='Macbook'";
	$res = $connection->query($query);
	$macbook = 0;
	while($amount = $res->fetch_assoc()){
		$macbook += $amount['amount'];
	}

	$query = "select amount from products where type='Iphone'";
	$res = $connection->query($query);
	$iphone = 0;
	while($amount = $res->fetch_assoc()){
		$iphone += $amount['amount'];
	}

	$query = "select amount from products where type='Ipad'";
	$res = $connection->query($query);
	$ipad = 0;
	while($amount = $res->fetch_assoc()){
		$ipad += $amount['amount'];
	}

	$query = "select amount from products where type='Apple watch'";
	$res = $connection->query($query);
	$applewatch = 0;
	while($amount = $res->fetch_assoc()){
		$applewatch += $amount['amount'];
	}


	$last_result = array("Macbook" => $macbook, "Ipad" => $ipad, "Iphone" => $iphone, "Applewatch" => $applewatch);
	$connection->close();
	echo json_encode($last_result);
?>