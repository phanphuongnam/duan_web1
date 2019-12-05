<?php
		require_once 'commons/db.php';
		use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'libarys/PHPMailer/src/Exception.php';
		require 'libarys/PHPMailer/src/PHPMailer.php';
		require 'libarys/PHPMailer/src/SMTP.php';
		
		$id=$_POST['id'];
		$test='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-.]+(\.[a-z0-9-]+)$/';
		$sql="SELECT * FROM products where id = $id";
 		$detail_product = executeQuery($sql,false);
		$customer_email=$_POST['Email'];
		$customer_address=$_POST['address'];
		$customer_name=$_POST['name'];
		$customer_phone=$_POST['phone'];
		$amount=$_POST['amount'];
		$price =$detail_product['price'];
		$payment_mt=isset($_POST['payment_mt']) ? $_POST['payment_mt'] : 0;
		
		if ($customer_email=='' || $customer_phone=='' || $customer_name==''|| $customer_address==''
		|| $amount=='' || $payment_mt==0) {
			
			header('location:'.Base_url.'detail.php?id='.$id.'&errAll=Bạn chưa nhập đầy đủ thông tin đặt hàng');
		}
		elseif (!is_numeric($amount)) {
			
			header('location:'.Base_url.'detail.php?id='.$id.'&errAmount=Số lượng phải là số');
		}
		elseif (!preg_match($test, $customer_email)) {
			header('location:'.Base_url.'detail.php?id='.$id.'&errEmail=Email không đúng định dạng');
			
		}
		else{
			$total_price= $price*$amount;
			$payment_mt = isset($_POST['payment_mt']) ? $_POST['payment_mt'] : "" ;
			$sql="insert into orders(customer_email,customer_address,customer_name,
				customer_phone,total_price,payment_method) values('$customer_email','$customer_address','$customer_name','$customer_phone','$total_price','$payment_mt')";
			executeQuery($sql);

			$sql='select * from orders order by id desc';
			$orders = executeQuery($sql);
			
			$order_id=$orders['id'];
			$product_id = $detail_product['id'];
			$quantity =$amount;
			$unit_price=$detail_product['price'];
			
			$sql="insert into order_detail(order_id,product_id,quantity,
				unit_price) values('$order_id','$product_id','$quantity',$unit_price)";
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
				    $mail->Body    ="Chào:".$customer_name."<br>"."Thông tin đơn hàng của bạn"."<br>". 
				    "Sản Phẩm: ".$detail_product['name']."<br>"."Tổng Số Tiền Thanh Toán: ".$total_price."VND"."<br>"."Phương thức thanh toán: ".$key;
				    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				    	# code...
				    }
				}
			    $mail->send();
			    header('location:'.Base_url.'detail.php?id='.$id.'&success=Đặt hàng thành công');
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			
			
		}
	



?>