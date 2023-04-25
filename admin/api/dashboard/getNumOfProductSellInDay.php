<?php
	require_once '../config/config.php';

	$now =  date('Y-m-d');
	$query = "select indx,id,customerID, date from bill";
	$res = $connection->query($query);
	$dates = $res->fetch_all(MYSQLI_ASSOC);
	$num_product_sell_in_day = 0;
	foreach($dates as $date){
		if($now == explode(' ',$date['date'])[0]){
			$billid = $date['id'];
			$customerid = $date['customerID'];
			$query = "select amount from products_of_bill where bill_id=$billid and customerID=$customerid";
			$res = $connection->query($query);
			$num_product_sell_in_day += $res->fetch_assoc()['amount'];
		}
	}

	$connection->close();
	echo json_encode([ "num_product_sell_in_day" => $num_product_sell_in_day]);
?>