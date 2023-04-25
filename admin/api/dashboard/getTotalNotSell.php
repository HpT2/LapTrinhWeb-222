<?php
	require_once '../config/config.php';

	$query = "select amount from products";
	$res = $connection->query($query);
	$total_amount_not_sell = 0;
	while($amount = $res->fetch_assoc()){
		$total_amount_not_sell += $amount['amount'];
	}

	$last_result = array("total_amount_not_sell" => $total_amount_not_sell);
	$connection->close();
	echo json_encode($last_result);
?>