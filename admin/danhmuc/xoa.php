<?php
	require_once ('../../commons/db.php'); 
	$id=$_GET['id'];
	$sql = "DELETE FROM categories WHERE id = $id";
	executeQuery($sql);
	header("location:".Base_url.'admin/danhmuc');



?>