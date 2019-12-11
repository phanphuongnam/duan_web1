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
		'Tạm Ngưng' => 2,
		'Còn Hàng' => 1,
		'Hết Hàng' => 0

	];
	$payment_method = [
		'CK Ngân Hàng/ATM' => 1,
		'Visa/Master Card' => 2,
		'COD' => 3

	];
	$disabled_cmt = [
		'Đóng' => -1,
		'Mở' => 0

	];
	$status_order=[
		"<button class='btn btn-success'>Đã thanh toán</button>" => 2,
		"<button class='btn btn-warning'>Đang chuyển</button>" => 1,
		"<button class='btn btn-info' disabled='disabled'>Chưa thanh toán</button>" =>0,
		"<button class='btn btn-danger'>Hủy</button>" => -1
	];
	$USER_ROLES = [
	'Quản Trị Viên' => 2,
	"Biên Tập Viên" => 1,
	"Thành Viên" => 0
];
	$USER_STATUS = [
	'Kích Hoạt' => 1,
	"Chưa Kích Hoạt" => 0,
	"Banned" => -1
];
?>