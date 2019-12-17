<?php
		session_start();
		require_once 'commons/db.php';
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'libarys/PHPMailer/src/Exception.php';
		require 'libarys/PHPMailer/src/PHPMailer.php';
		require 'libarys/PHPMailer/src/SMTP.php';
		$test='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-.]+(\.[a-z0-9-]+)$/';
		$customer_email=$_POST['Email'];
		$customer_address=$_POST['address'];
		$customer_name=$_POST['name'];
		$customer_phone=$_POST['phone'];
		$payment_mt=isset($_POST['payment_mt']) ? $_POST['payment_mt'] : 0;
		if ($customer_email=='' || $customer_phone=='' || $customer_name==''|| $customer_address==''|| $payment_mt==0)
		{
			
			header('location:'.Base_url.'checkout.php?errAll=Bạn chưa nhập đầy đủ thông tin đặt hàng');
		}

		elseif (!preg_match($test, $customer_email)) {
			header('location:'.Base_url.'checkout.php?errEmail=Email không đúng định dạng');
			
		}
		elseif (isset($_SESSION['login'])) {
			$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];
			$totalItem=null;
			$totalPrice = 0;
			foreach ($cart as $value) {
				$totalPrice += $value['quantity']*$value['price'];
			}
			$payment_mt = isset($_POST['payment_mt']) ? $_POST['payment_mt'] : "" ;
			$sql="insert into orders(customer_email,customer_address,customer_name,
				customer_phone,total_price,payment_method) values('$customer_email','$customer_address','$customer_name','$customer_phone','$totalPrice','$payment_mt')";
			executeQuery($sql);
			var_dump($sql);
			foreach ($cart as $item) {
				$product_name=$item['name']."<br>";
				var_dump($product_name);
				$totalItem = $item['quantity'];
				$totalPrice += $item['price']*$item['quantity'];
				$sql='select * from orders order by id desc';
				$orders = executeQuery($sql);
				
				$order_id=$orders['id'];
				var_dump($order_id);
				$product_id = $item['id'];
				$quantity =$totalItem;
				$unit_price=$item['price'];
				
				$sql="insert into order_detail(order_id,product_id,quantity,
					unit_price) values('$order_id','$product_id','$quantity',$unit_price)";
				executeQuery($sql);
				
			}
			$id_user = $_SESSION['login']['id'];
			$sql="insert into historys(id_user,id_order) values('$id_user','$order_id')";
			executeQuery($sql);
			
			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    // $mail->SMTPDebug = 2;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'namhhtml001@gmail.com';                     // SMTP username
			    $mail->Password   = 'badboy1997';                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			    $mail->Port       = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom("namhhtml001@gmail.com","Phụ Kiện Máy Tính");
			    $mail->addAddress($customer_email);               // Name is optional
			    $mail->addReplyTo('info@example.com', 'Information');	
			    // Content
			    $mail->CharSet = "UTF-8";
			    $mail->isHTML(true);                            // Set email format to HTML
			    $mail->Subject = 'Thông tin đơn hàng gửi tới bạn';
			    foreach($payment_method as $key => $value){
				    if ($value==$payment_mt) {
				    $mail->Body="Chào:".$customer_name."<br>"."Thông tin đơn hàng của bạn"."<br>". 
				    "Sản Phẩm: ".$product_name."<br>"."Tổng Số Tiền Thanh Toán: ".$totalPrice."VND"."<br>"."Phương thức thanh toán: ".$key;
				    	# code...
				    }
				}
			    $mail->send();
			    
			    header('location:'.Base_url.'checkout.php?success=Đặt hàng thành công');
			    unset($_SESSION['CART']);
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

		}
		else{
			$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];
			$totalItem=null;
			$totalPrice=0;
			foreach ($cart as $value) {
				$totalPrice += $value['quantity']*$value['price'];
			}
			$payment_mt = isset($_POST['payment_mt']) ? $_POST['payment_mt'] : "" ;
			$sql="insert into orders(customer_email,customer_address,customer_name,
				customer_phone,total_price,payment_method) values('$customer_email','$customer_address','$customer_name','$customer_phone','$totalPrice','$payment_mt')";
			executeQuery($sql);
			foreach ($cart as $item) {
				$product_name=$item['name']."<br>";
				$totalItem = $item['quantity'];
				$totalPrice += $item['price']*$item['quantity'];
				$sql='select * from orders order by id desc';
				$orders = executeQuery($sql);
				
				$order_id=$orders['id'];
				$product_id = $item['id'];
				$quantity =$totalItem;
				$unit_price=$item['price'];
				
				$sql="insert into order_detail(order_id,product_id,quantity,
					unit_price) values('$order_id','$product_id','$quantity',$unit_price)";
				executeQuery($sql);
				
			}
			$mail = new PHPMailer(true);

			try {
			    //Server settings
			    // $mail->SMTPDebug = 2;                      // Enable verbose debug output
			    $mail->isSMTP();                                            // Send using SMTP
			    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'namhhtml001@gmail.com';                     // SMTP username
			    $mail->Password   = 'badboy1997';                               // SMTP password
			    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
			    $mail->Port       = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom("namhhtml001@gmail.com","Phụ Kiện Máy Tính");
			    $mail->addAddress($customer_email);               // Name is optional
			    $mail->addReplyTo('info@example.com', 'Information');	
			    // Content
			    $mail->CharSet = "UTF-8";
			    $mail->isHTML(true);                            // Set email format to HTML
			    $mail->Subject = 'Thông tin đơn hàng gửi tới bạn';
			    foreach($payment_method as $key => $value){
				    if ($value==$payment_mt) {
				    $mail->Body="Chào:".$customer_name."<br>"."Thông tin đơn hàng của bạn"."<br>". 
				    "Sản Phẩm: ".$product_name."<br>"."Tổng Số Tiền Thanh Toán: ".$totalPrice."VND"."<br>"."Phương thức thanh toán: ".$key;
				    	# code...
				    }
				}
			    $mail->send();
			    echo "Thành công";
			    header('location:'.Base_url.'checkout.php?success=Đặt hàng thành công');
			    unset($_SESSION['CART']);
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			
			
		}
	



?>