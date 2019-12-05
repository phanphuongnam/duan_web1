<?php 	
session_start();
// unset($_SESSION['CART']);
// header("location:"."http://localhost/duan_web1/");

$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];

 ?>
 <?php if($cart==null || $cart==''): ?>
 	<?php echo "Chưa có sản phẩm"; ?>

 <?php else: ?>
 <?php foreach ($cart as $item): ?>
 	<h1>Tên: <?php echo $item['name']; ?></h1>
 	<h1>Số Lượng: <?php echo $item['quantity']; ?></h1>
 	<h1>Giá: <?php echo $item['price']; ?></h1>
 	<h1>Tổng Tiền: <?php echo $item['quantity']*$item['price']; ?></h1>
 <?php endforeach; ?>
 <?php endif; ?>
