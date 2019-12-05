<?php 	
session_start();
$id=$_GET['id'];
$cart = isset($_SESSION['CART']) == true ? $_SESSION['CART'] : [];
$index = false;
for ($i=0; $i < count($cart); $i++) { 
	if($cart[$i]['id'] == $id){
		$index = $i;
		break;
	}
}
if($index !== false){
	array_splice($cart, $index, 1);
}

$_SESSION['CART'] = $cart;
header("location:"."http://localhost/duan_web1/checkout.php");
?>