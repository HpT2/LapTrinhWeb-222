<?php
	session_start();
	$connection = new mysqli('localhost',$_SESSION['username'],$_SESSION['password'],'laptrinhweb_db');

		// Check connection
	if ($connection->connect_error) {
		die("Connection failed: " . $connection->connect_error);
	}
	$total = 0;

	$query = "select id from customer where username='".$_SESSION['username']."'";
		
	$res = $connection->query($query);
	$CUSTOMER_ID = $res->fetch_assoc()['id'];

	$query = "select count(*) from bill where CustomerID=".$CUSTOMER_ID ;
	$res = $connection->query($query);
	$Bill_id = $res->fetch_assoc()['count(*)'] + 1;

	$now =  date('Y-m-d H:i:s');

	$query = "insert into bill values ($Bill_id,$CUSTOMER_ID,'$now', 0)";
	$connection->query($query);

	foreach($_SESSION['products'] as $key){
		foreach($key as $id => $quantity){
			$query = "select price,amount from products where id=".$id;
			$res = $connection->query($query);
			$data = $res->fetch_assoc();
			$price = $data['price'];
			$current_amount =$data['amount'];

			if($quantity <= $current_amount ){
				
				$total += $price * $quantity;
				
				$query = "insert into products_of_bill values ($Bill_id, $id, $quantity, $CUSTOMER_ID)";
				$connection->query($query);

				$current_amount -= $quantity;

				$query = "update products set amount=".$current_amount." where id=".$id;
				$connection->query($query);
			}
		}
		$query = "Update bill set totalcost=".$total." where id=".$Bill_id;
		$connection->query($query);
	}
	$connection->close();	
	header('Location: /bills?id='.$Bill_id);
?>