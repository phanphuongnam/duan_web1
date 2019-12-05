<?php 	
session_start();
require_once 'commons/db.php';
$proId = isset($_GET['id']) ? $_GET['id'] : -1;
$sqlQuery = "select * from  products where id = $proId";
$product = executeQuery($sqlQuery);
if($product){
	if(!isset($_SESSION['CART']) || $_SESSION['CART'] == null){
		$_SESSION['CART'][] = [
			'id' => $product['id'],
			'name' => $product['name'],
			'image' => $product['image'],
			'price' => $product['price'],
			'sale_off' => $product['sale_off'],
			'quantity' => 1,
		];
	}else{
		$cart = $_SESSION['CART'];
		$flag = -1;
		foreach ($cart as $index => $item) {
			if($product['id'] == $item['id']){
				$flag = $index;
				break;
			}
		}

		if($flag == -1){
			$cart[] = [
				'id' => $product['id'],
				'name' => $product['name'],
				'image' => $product['image'],
				'price' => $product['price'],
				'sale_off' => $product['sale_off'],
				'quantity' => 1,
			];
		}else{
			$cart[$flag]['quantity']++;
		}
		$_SESSION['CART'] = $cart;
	}
	$result = [
		'status' => true,
		'data' => $_SESSION['CART'],
		'msg' => 'Thêm vào giỏ hàng thành công'
	];
}else{
	$result = [
		'status' => false,
		'msg' => 'Sản phẩm không tồn tại'
	];
}
echo json_encode($result);



 ?>