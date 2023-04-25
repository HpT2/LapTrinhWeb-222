<?php
	require_once '../config/config.php';

	$query = "select count(*) from customer where active=1";
	$res = $connection->query($query);
	$active = $res->fetch_assoc()['count(*)'];

	$query = "select count(*) from customer where active=0";
	$res = $connection->query($query);
	$inactive = $res->fetch_assoc()['count(*)'];

	$last_result = array("active" => $active, "inactive" => $inactive);
	$connection->close();
	echo json_encode($last_result);
?>