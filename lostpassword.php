<?php 
	require_once 'commons/db.php';
	use PHPMailer\PHPMailer\PHPMailer;
		use PHPMailer\PHPMailer\Exception;

		require 'libarys/PHPMailer/src/Exception.php';
		require 'libarys/PHPMailer/src/PHPMailer.php';
		require 'libarys/PHPMailer/src/SMTP.php';
	if (isset($_POST['email'])) {
		$email =$_POST['email'];

		$sql ="select * from users where email ='$email'";
		$emailabc =executeQuery($sql,false);
		// var_dump($emailabc);
		if ($emailabc==true) {
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
			    $mail->addAddress($email);               // Name is optional
			    $mail->addReplyTo('info@example.com', 'Information');	
			    // Content
			    $mail->CharSet = "UTF-8";
			    $mail->isHTML(true);                            // Set email format to HTML
			    $mail->Subject = 'Khoi Phuc Password';
				$mail->Body="Chào ban: ".'Yeu cau khoi phuc mat khau cua ban da duoc chap nhan, vui long truy cap duong dan duoi day de khoi phuc '.
					'<a href="http://localhost/duan_web1/checkout.php?success=Đặt hàng thành công">'.'Khoi Phuc Password'.'</a>';
				    	# code...
				  
			    $mail->send();
			    $result=[
			    	'status' => true,
			    	'msg' => 'Da gui thanh cong, vui long check email'
			    ];

			    
			    // unset($_SESSION['CART']);
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
			
		}
		else{
			$result=[
			    	'status' => false,
			    	'msg' => 'Email khong dung, khong the gui duoc!'
			];

			

		}
		echo json_encode($result);
		exit;
		
		
	}
	
	
	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quen Mat Khau</title>
	<?php include_once 'layouts/head_tag.php' ?>
</head>
<body>
	<div style="position: relative;" class="container mt-5" id="rs_form">
		<h3 class="text-center">Nhap email de khoi phuc mat khau</h3>
				<!-- <i  class="fas fa-check"></i> -->

		<input style="padding-left: 20px;" class="form-control col-sm-5 container" type="text" id="email" placeholder="Nhap email">

	<!-- 	<label id="check" style="position: absolute;left:780px;color: green;display: none;
  top: calc(40% - 0.5em);" for="email" class="fas fa-check"></label>
		 --><div style="padding:0px;" class="errEmail col-sm-5 container"></div>
		<div align="center">

			<button class="btn btn-primary col-md-2 text-center col-md-1" type="button" name="submit">Gui</button>	
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#email').keyup(function(){
				var email = $('#email').val();
				// console.log(email);
				if(email != ''){
					$('#email').css('border','solid 1px green');
					$('.errEmail').html('');
					$('#check').show();

				}
				else{
					$('#email').css('border','solid 1px red');
					$('.errEmail').html("Ban chua nhap email").css('color','red');
					$('#check').hide();
				}
			});
			
			
			$('.btn').click(function(){
				var email = $('#email').val();

				if (email=='') {
					$('.errEmail').html("Ban chua nhap email").css('color','red');
					$('#email').css('border','solid 1px red').focus();
					$('#check').hide();
					
					
				}

				else{

					$('.btn').html('Dang gui, voi long cho!').prop('disabled',true);
					// alert(email);
					$('#check').show();
					$.ajax({
						url: "<?php echo Base_url.'lostpassword.php'; ?>",
						method: 'POST',
						dataType: 'json',
						
						data: {email:email},
						success: function(response1){
							console.log(response1);
							if (response1.status==true) {
								// $('#rs_form')[0].reset();
								
								$('.errEmail').html(response1.msg).css('color','green');
								$('.btn').html('Gui').prop('disabled',false);
								$('#email').css('border','solid 1px #ced4da');
								$('#email').val('');

							}
							else{
								$('.errEmail').html(response1.msg).css('color','red');
								$('#email').css('border','solid 1px red').focus();
								$('.btn').html('Gui').prop('disabled',false);

							}
							
						}

					});
				}
			});
		});
	</script>

</body>
</html>