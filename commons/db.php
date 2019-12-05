<?php
	
	function getConnect(){
		$host = "localhost";
		$dbname = "duan_web";
		$dbusername = "root";
		$dbpwd = "";
		try{
			$connect = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpwd);
		}catch(Exception $ex){
			var_dump($ex->getMessage());
			die;
		}
		return $connect;
	}
	define('Base_url', 'http://localhost/duan_web1/');

	function executeQuery($sqlQuery, $getAll = false){
		// tạo kết nối đến csdl
		$conn = getConnect();
		// nạp câu lệnh sql từ tham số vào kết nối
		$stmt = $conn->prepare($sqlQuery);
		// thực thi câu lệnh với csdl
		$stmt->execute();
		// lấy dữ liệu đc trả về từ csdl và gán cho biến $result
		$result = $stmt->fetchAll();
		if(!$result){
			return null;
		}
		if($getAll){
			return $result;
		}
		return $result[0];
	}
	$status_products=[
		'<span class="text-primary">Còn Hàng</span>' => 1,
		'<span class="text-danger">Hết Hàng</span>' => 0

	];
	$payment_method = [
		'CK Ngân Hàng/ATM' => 1,
		'Visa/Master Card' => 2,
		'COD' => 3

	]
?>