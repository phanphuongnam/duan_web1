<?php
session_start();

 	require_once 'commons/db.php';
 	//thông tin website
 	$sql='select * from settings_web';
 	$info_web = executeQuery($sql,false);
 	//lấy ra tất cả danh mục
 	$sql = "SELECT * FROM categories";
 	$Get_categories = executeQuery($sql,true);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | About Us :: w3layouts</title>
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
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2 active">
							<a class="nav-link" href="about.html">Gioi thieu</a>
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
						<li class="nav-item">
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
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>About Us</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- about -->
	<div class="welcome py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>A</span>bout
				<span>U</span>s</h3>
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-6 welcome-left">
					<h3>Welcome</h3>
					<h4 class="my-sm-3 my-2">consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse porta erat sit amet eros sagittis, quis hendrerit
						libero aliquam. Fusce semper augue ac dolor efficitur, a pretium metus pellentesque.</p>
				</div>
				<div class="col-lg-6 welcome-right-top mt-lg-0 mt-sm-5 mt-4">
					<img src="<?php echo Base_url ?>public/images/ab.jpg" class="img-fluid" alt=" ">
				</div>
			</div>
		</div>
	</div>
	<!-- //about -->

	<!-- testimonials -->
	<div class="testimonials py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center text-white mb-lg-5 mb-sm-4 mb-3">
				<span>O</span>ur
				<span>C</span>ustomers
				<span>S</span>ays</h3>
			<!-- tittle heading -->
			<div class="row gallery-index">
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left my-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="<?php echo Base_url ?>public/images/user.jpg" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Tyson</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left my-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="<?php echo Base_url ?>public/images/user.jpg" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Alejandra</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left mt-sm-5 my-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="<?php echo Base_url ?>public/images/user.jpg" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Charles</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
				<div class="col-sm-6 med-testi-grid">
					<div class="med-testi test-tooltip rounded p-4">
						<p>"sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
							ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
					<div class="row med-testi-left mt-5">
						<div class="col-lg-2 col-3 w3ls-med-testi-img">
							<img src="<?php echo Base_url ?>public/images/user.jpg" alt=" " class="img-fluid rounded-circle" />
						</div>
						<div class="col-lg-10 col-9 med-testi-txt">
							<h4 class="font-weight-bold mb-lg-1 mb-2">Jessie</h4>
							<p>fames ac turpis</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //testimonials -->

	<!-- footer -->
		<?php include_once 'layouts/footer.php' ?>
	<!-- //footer -->
</body>

</html>