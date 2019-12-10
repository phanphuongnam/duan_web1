<?php
	require_once ('../../commons/db.php'); 
	$id=$_GET['id'];
	$sql = "DELETE orders,order_detail FROM orders join order_detail on orders.id=order_detail.order_id WHERE orders.id = $id and order_detail.order_id = $id";
	executeQuery($sql);
	header("location:".Base_url.'admin/hoadon');



?>