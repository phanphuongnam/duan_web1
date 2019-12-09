<?php

session_start();

 	require_once 'commons/db.php';
 	//thông tin website
 	$sql='select * from settings_web';
 	$info_web = executeQuery($sql,false);
 	//lấy ra tất cả danh mục
 	$sql = "SELECT * FROM categories";
 	$Get_categories = executeQuery($sql,true);
 	if (isset($_POST['submit'])) {
 		$test='/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)$/';
 		$fullname = $_POST['Name'];
 		$email = $_POST['Email'];
 		$content = $_POST['content'];
 		if($content==''){
 			$errContent ="Bạn chưa nhập nội dung";
 		}
 		if($fullname==''){
 			$errFullname ="Bạn chưa nhập họ tên";
 		}
 		if($email==''){
 			$errEmail ="Bạn chưa nhập email";
 		}
 		elseif (!preg_match($test,$email)) {
          $errEmail="Email không hợp lệ, vui lòng nhập lại";
          
          
        }
 		else{
 			$insert_contact = "INSERT INTO contacts(fullname,content,email)
             VALUES ('$fullname','$content','$email')";
            executeQuery($insert_contact);
            $sucsess= 'Cảm ơn bạn đã liên hệ với chúng tôi!';

 		}
 	}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Contact Us :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<?php include_once 'layouts/head_tag.php' ?>

</head>

<body>
	<!-- top-header -->
	
		<?php include_once 'layouts/top_header.php' ?>
	<!-- //top-header -->

	<!-- header-bottom-->
		<?php include_once 'layouts/bottom_header.php' ?>
	<!-- //header-bottom -->
	<!-- navigation -->
	<div class="navbar-inner">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto text-center mr-xl-5">
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="<?php echo Base_url ?>">Trang Chu
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Danh Muc San Pham
							</a>
							<div class="dropdown-menu">
								<div class="agile_inner_drop_nav_info p-4">
									<div class="row">
										<?php foreach($Get_categories as $get_cate): ?>
										<div class="col-sm-6 multi-gd-img">
											<ul class="multi-column-dropdown">
												<li>
													<a 
													href="<?php echo Base_url.'category.php?id='
													.$get_cate['id'] ?>"><?php echo $get_cate['cate_name'] ?></a>
												</li>	
											</ul>
										</div>
									  <?php endforeach ?>
									</div>
								</div>
							</div>
						</li>
						
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="<?php echo Base_url ?>shop.php">San Pham</a>
						</li>
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link" href="<?php echo Base_url ?>about.php">Gioi thieu</a>
						</li>
					<!-- 	<li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Pages
							</a>
							<div class="dropdown-menu">
								<a class="dropdown-item" href="product.html">Product 1</a>
								<a class="dropdown-item" href="product2.html">Product 2</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo Base_url ?>detail.php">Single Product 1</a>
								<a class="dropdown-item" href="single2.html">Single Product 2</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="checkout.html">Checkout Page</a>
								<a class="dropdown-item" href="payment.html">Payment Page</a>
							</div>
						</li> -->
						<li class="nav-item active">
							<a class="nav-link" href="<?php echo Base_url ?>contact.php">Lien He</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->

	<!-- banner-2 -->
	<div class="page-head_agile_info_w3l">

	</div>
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="<?php echo Base_url ?>">Home</a>
						<i>|</i>
					</li>
					<li>Contact Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- contact -->
	<div class="contact py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>L</span>iên
				<span>H</span>ệ với chúng tôi
			</h3>
			<!-- //tittle heading -->
			<div class="row contact-grids agile-1 mb-5">
				<div class="col-sm-4 contact-grid agileinfo-6 mt-sm-0 mt-2">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-map-marker-alt rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Địa chỉ</h4>
						<p><?php echo $info_web['address'] ?>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6 my-sm-0 my-4">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-phone rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Liên Lạc</h4>
						<p><?php echo $info_web['hotline'] ?>
						</p>
					</div>
				</div>
				<div class="col-sm-4 contact-grid agileinfo-6">
					<div class="contact-grid1 text-center">
						<div class="con-ic">
							<i class="fas fa-envelope-open rounded-circle"></i>
						</div>
						<h4 class="font-weight-bold mt-sm-4 mt-3 mb-3">Email</h4>
						<p>
							<a href="mailto:<?php echo $info_web['email'] ?>"><?php echo $info_web['email'] ?></a>
						</p>
					</div>
				</div>
			</div>
			<!-- form -->
			<form action="" method="post">
				<div class="contact-grids1 w3agile-6">
					<p class="text-primary"><?php if(isset($sucsess)) echo $sucsess; ?></p>
					<div class="row">
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Họ Tên</label>
							<input type="text" class="form-control" name="Name" placeholder="Nhập Họ Tên">
							<p class="text-danger"><?php if(isset($errFullname)) echo $errFullname; ?></p>
						</div>
						<div class="col-md-6 col-sm-6 contact-form1 form-group">
							<label class="col-form-label">Email</label>
							<input type="text" class="form-control" name="Email" placeholder="Nhập Email">
							<p class="text-danger"><?php if(isset($errEmail)) echo $errEmail; ?></p>
						</div>
					</div>
					<div class="contact-me animated wow slideInUp form-group">
						<label class="col-form-label">Nội dung</label>
						<textarea name="content" class="form-control"></textarea>
						<p class="text-danger"><?php if(isset($errContent)) echo $errContent; ?></p>
					</div>
					<div class="contact-form">
						<input type="submit" name="submit" value="Gửi Phản Hồi">
					</div>
				</div>
			</form>
			<!-- //form -->
		</div>
	</div>
	<!-- //contact -->

	<!-- map -->
	<div class="map mt-sm-0 mt-4">
		<iframe src="<?php echo $info_web['map']; ?>"></iframe>
	</div>
	<!-- //map -->


	<!-- footer -->
		<?php include_once 'layouts/footer.php' ?>
	<!-- //footer -->
</body>

</html>