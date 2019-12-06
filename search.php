<?php
	session_start();
 	require_once 'commons/db.php';
 	//thông tin website
 	$sql='select * from settings_web';
 	$info_web = executeQuery($sql,false);
 	 if (isset($_REQUEST['search'])) {
        $search= $_GET['search'];
      
	    $sql="select *,products.id as id_pros from products join categories on products.cate_id = categories.id 
	     		WHERE name LIKE '%$search%' or cate_name LIKE '%$search%' or price LIKE '%$search%'";
	    $sanpham= executeQuery($sql,true);
          
       
   	}
 	//lấy ra tất cả danh mục
 	$sql = "SELECT * FROM categories";
 	$Get_categories = executeQuery($sql,true);
 	
 	
	
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Electro Store Ecommerce</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<link rel="shortcut icon" type="image/png" href="<?php echo Base_url.$info_web['flavors_icon']; ?>">
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
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
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
						<li class="nav-item">
							<a class="nav-link" href="<?php echo Base_url ?>contact.php">Lien He</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</div>
	<!-- //navigation -->

	<!-- banner slideshow-->
			<?php include_once 'layouts/slide.php'; ?>
	<!-- //banner slideshow-->

	<!-- top Products -->
	<div class="ads-grid py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			
			<!-- //tittle heading -->
			<div class="row">
				<!-- product left -->
				<div class="container-fluid">
					<div class="wrapper">
						<!-- first section -->
						<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
							<?php if(isset($sanpham) =='' || $sanpham == false): ?>
							<h3 class="heading-tittle text-center font-italic">
							Không tìm thấy kết quả nào phù hợp
							</h3>
						</div>
							<?php else: ?>
							<h3 class="heading-tittle text-center font-italic">
								Kết Quả Tìm Kiếm Cho: <?php echo $search; ?></h3>
							<div class="row">
								<?php foreach($sanpham as $sp): ?>
								<div class="col-md-4 product-men mt-5">
									<div class="men-pro-item simpleCart_shelfItem">
										<div class="men-thumb-item text-center">
											<img style="width: 70%;" src="<?php echo Base_url.$sp['image'] ?>" alt="">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="<?php echo Base_url.'detail.php?id='.$sp['id_pros']; ?>" class="link-product-add-cart">
													Xem Chi Tiết
												    </a>
												</div>
											</div>
										</div>
										<span class="product-new-top">New</span>
										<div class="item-info-product text-center border-top mt-4">
											<h4 class="pt-1">
												<a href="<?php echo Base_url.'detail.php?id='.$sp['id_pros']; ?>">
													<?php echo $sp['name']; ?>
												</a>
											</h4>
											<div class="info-product-price my-2">
												<span class="item_price">
													<?php echo $sp['price'] ?> VNĐ
												</span>
												<?php if($sp['sale_off']==null ||
														$sp['sale_off']==''):
												?>
												
												<?php else: ?>
													<del><?php echo $sp['sale_off']; ?> VNĐ</del>
												<?php endif; ?>

											</div>
											<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
												
												<input pro-id="<?php echo $sp['id_pros'] ?>" class=" btn-add2Cart button btn" type="button" value="Add to cart">
												<span class="msg1"></span>

											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
							</div>
						</div>
					<?php endif; ?>
					
				</div>
				<!-- //product left -->
			</div>
		</div>
	</div>
</div>
	<!-- //top products -->

	<!-- footer -->
		<?php include_once 'layouts/footer.php'; ?>
	
	<!-- //footer -->
</body>

</html>