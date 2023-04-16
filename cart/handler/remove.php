<?php 
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['loggedin'] == false || $_SESSION['role'] != 'customer'){
		//return error code
	}else{
		if (isset($_POST['request'])){
			$connection = new mysqli('localhost',$_SESSION['username'],$_SESSION['password'],'laptrinhweb_db');
			$query = 'select id from customer where username="'.$_SESSION['username'].'"';
			$res = $connection->query($query);
			$Customer_id = $res->fetch_assoc();
			
			$query = 'select id from cart where CustomerID='.$Customer_id['id'];
			$res = $connection->query($query);
			$Cart_id = $res->fetch_assoc();

			foreach($_POST['products'] as $product){
				$query = 'delete from keep where cartID='.$Cart_id['id'].' and productID='.$product;
				$res = $connection->query($query);
			}

			header('Location: /cart');
		}else if (isset($_POST['id'])){
			$connection = new mysqli('localhost',$_SESSION['username'],$_SESSION['password'],'laptrinhweb_db');
			$query = 'select id from customer where username="'.$_SESSION['username'].'"';
			$res = $connection->query($query);
			$Customer_id = $res->fetch_assoc();

			$query = 'select id from cart where CustomerID='.$Customer_id['id'];
			$res = $connection->query($query);
			$Cart_id = $res->fetch_assoc();

			$query = 'delete from keep where cartID='.$Cart_id['id'].' and productID='.$_POST['id'];
			$res = $connection->query($query);
			header('Location: /cart');
		}else {
			//return error code
		}
	}
?>