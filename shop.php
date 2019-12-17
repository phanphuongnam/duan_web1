<?php
session_start();
 	require_once 'commons/db.php';
 //thông tin website
 	$sql='select * from settings_web';
 	$info_web = executeQuery($sql,false);
 	$sql = "SELECT * FROM categories";
 	$Get_categories = executeQuery($sql,true);
 	$sql = "SELECT * FROM products ORDER BY created_at DESC";
 	$All_pros = executeQuery($sql,true);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Electronics :: w3layouts</title>
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
						
						<li class="nav-item mr-lg-2 mb-lg-0 mb-2 active">
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
						<a href="<?php echo Base_url ?>">Trang Chủ</a>
						<i>|</i>
					</li>
					<li>Sản Phẩm</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>T</span>ất
				<span>C</span>ả
				<span>S</span>ản
				<span>P</span>hẩm
			</h3>

			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="agileinfo-ads-display col-lg-9">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<div class="row">
								<?php foreach($All_pros as $All_prs): ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img src="<?php echo Base_url.$All_prs['image']; ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo Base_url.'detail.php?id='.$All_prs['id']; ?>" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
										</div>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="<?php echo Base_url.'detail.php?id='.$All_prs['id']; ?>"><?php echo $All_prs['name']; ?></a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">
													<?php echo $All_prs['price'] ?> VNĐ
												</span>
												<?php if($All_prs['sale_off']==null ||
														$All_prs['sale_off']==''):
												?>
												
												<?php else: ?>
													<del><?php echo $All_prs['sale_off']; ?> VNĐ</del>
												<?php endif; ?>
											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												<input pro-id="<?php echo $All_prs['id'] ?>" class=" btn-add2Cart button btn" type="button" value="Add to cart">
												<span class="msg1"></span>
											</div>

										</div>
									</div>
								</div>
								<?php endforeach; ?>
								
							</div>
						<!-- //first section -->		
						</div>
					</div>
				</div>
				<!-- //product left -->

				<!-- product right -->
				<div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
					<div class="side-bar p-sm-4 p-3">
						<div class="search-hotel border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Brand</h3>
							<form action="#" method="post">
								<input type="search" placeholder="Search Brand..." name="search" required="">
								<input type="submit" value=" ">
							</form>
							<div class="left-side py-2">
								<ul>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Samsung</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Red Mi</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Apple</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Nexus</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Motorola</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Micromax</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Lenovo</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Oppo</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">Sony</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">LG</span>
									</li>
									<li>
										<input type="checkbox" class="checked">
										<span class="span">One Plus</span>
									</li>
								</ul>
							</div>
						</div>
						<!-- ram -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Ram</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">Less than 512 MB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">512 MB - 1 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">1 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">2 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">3 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">5 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">6 GB</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">6 GB & Above</span>
								</li>
							</ul>
						</div>
						<!-- //ram -->
						<!-- price -->
						<div class="range border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Price</h3>
							<div class="w3l-range">
								<ul>
									<li>
										<a href="#">Under $1,000</a>
									</li>
									<li class="my-1">
										<a href="#">$1,000 - $5,000</a>
									</li>
									<li>
										<a href="#">$5,000 - $10,000</a>
									</li>
									<li class="my-1">
										<a href="#">$10,000 - $20,000</a>
									</li>
									<li>
										<a href="#">$20,000 $30,000</a>
									</li>
									<li class="mt-1">
										<a href="#">Over $30,000</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //price -->
						<!-- discounts -->
						<div class="left-side border-bottom py-2">
							<h3 class="agileits-sear-head mb-3">Discount</h3>
							<ul>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">5% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">10% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">20% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">30% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">50% or More</span>
								</li>
								<li>
									<input type="checkbox" class="checked">
									<span class="span">60% or More</span>
								</li>
							</ul>
						</div>
						<!-- //discounts -->
						
						
					</div>
					<!-- //product right -->
				</div>
			</div>
		</div>
	</div>
	<!-- //top products -->

	<!-- middle section -->
	<div class="join-w3l1 py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<div class="row">
				<div class="col-lg-6">
					<div class="join-agile text-left p-4">
						<div class="row">
							<div class="col-sm-7 offer-name">
								<h6>Smooth, Rich & Loud Audio</h6>
								<h4 class="mt-2 mb-3">Branded Headphones</h4>
								<p>Sale up to 25% off all in store</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="<?php echo Base_url ?>public/images/off1.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6 mt-lg-0 mt-5">
					<div class="join-agile text-left p-4">
						<div class="row ">
							<div class="col-sm-7 offer-name">
								<h6>A Bigger Phone</h6>
								<h4 class="mt-2 mb-3">Smart Phones 5</h4>
								<p>Free shipping order over $100</p>
							</div>
							<div class="col-sm-5 offerimg-w3l">
								<img src="<?php echo Base_url ?>public/images/off2.png" alt="" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- middle section -->

	<!-- footer -->
		<?php include_once 'layouts/footer.php' ?>
	<!-- //footer -->
</body>

</html>