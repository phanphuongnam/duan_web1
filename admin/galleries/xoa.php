<?php
	require_once ('../../commons/db.php'); 
	$id_image=$_GET['id-image'];
	$product_id=$_GET['productid'];
	var_dump($id);
	$sql = "DELETE FROM product_gallreries WHERE id = $id_image";
	executeQuery($sql);
	header("location:".Base_url."admin/galleries/?product-album=".$product_id);



?>