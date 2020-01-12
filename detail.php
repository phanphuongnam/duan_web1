<?php
	session_start();
 	require_once 'commons/db.php';
 	//thông tin website
 	$sql='select * from settings_web';
 	$info_web = executeQuery($sql,false);
 	//Hiện thị tất cả danh mục
 	$sql = "SELECT * FROM categories";
 	$Get_categories = executeQuery($sql,true);
 	//lấy mã sản phẩm
 	$id=$_GET['id'];
 	
 	//Hiện thị ảnh sản phẩm
 	$sql="SELECT * FROM product_gallreries where product_id = $id";
 	$product_gallreries = executeQuery($sql,true);
 	//Hiện thị số lượng bình luận
 	$sql = "SELECT count(*) as TotalCMT FROM comments where product_id = $id";
 	$CountCMT = executeQuery($sql,false);
 	//Hiện thị bình luận của sản phẩm
 	$sql ="SELECT *,DATE_FORMAT(comments.created_at,'%d/%m/%Y') AS n
   						FROM comments join users ON comments.user_id=users.id
   						where product_id =$id ORDER by comments.created_at DESC";

   	$ShowCMT=executeQuery($sql,true);
   	if ($ShowCMT==null || $ShowCMT=="") {
   		$errEmpty='Sản phẩm này chưa có bình luận';
   	}
   	//Hiện thị chi tiết sản phẩm
 	$sql="SELECT * FROM products join categories on
 						 products.cate_id=categories.id where products.id = $id";
 	$detail_product = executeQuery($sql,false);
 	if ($id==null || $detail_product==null) {
 		header('location:'.Base_url);
 	}
 	$id_cate=$detail_product['cate_id'];
 	//Các sản phẩm liên quan
 	$sql="SELECT *,products.id AS pro_id FROM products join categories on
 						 products.cate_id=categories.id where products.id <> $id and products.cate_id = $id_cate";
 	$Relate_products = executeQuery($sql,true);
 	$sql="UPDATE products SET views = views+1 WHERE id = $id";
 	executeQuery($sql);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Single Product 1 :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="<?php echo Base_url ?>public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="<?php echo Base_url ?>public/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo Base_url ?>public/css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="<?php echo Base_url ?>public/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="<?php echo Base_url ?>public/css/menu.css" rel="stylesheet" type="text/css" media="all" />

	<!-- menu style -->
	<!-- //Custom-Files -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
	<link rel="stylesheet" type="text/css" href="<?php echo Base_url ?>public/css/slider_brand.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

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
						
						<li class="nav-item active mr-lg-2 mb-lg-0 mb-2">
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
						<a href="<?php echo Base_url.'shop.php' ?>">Sản Phẩm</a>
						<i>|</i>
					</li>
					<li><?php echo $detail_product['name'] ?></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- //page -->

	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<!-- //tittle heading -->
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="<?php echo Base_url.$detail_product['image'] ?>">
									<div class="thumb-image">
										<img src="<?php echo Base_url.$detail_product['image'] ?>" data-imagezoom="true" class="img-fluid" alt="">
									</div>
								</li>
								<?php if($product_gallreries==""): ?>
								<?php else: ?>
								<?php foreach($product_gallreries as $pro_gallreries): ?>
								<li data-thumb="<?php echo Base_url.$pro_gallreries['image_url']; ?>">
									<div class="thumb-image">
										<img src="<?php echo Base_url.$pro_gallreries['image_url']; ?>" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<?php endforeach ?>
								<?php endif; ?>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"><?php echo $detail_product['name'] ?></h3>
					<p class="mb-3">
						<span class="item_price"><?php echo $detail_product['price'] ?> VNĐ</span>
						<?php if($detail_product['sale_off']==null ||
								$detail_product['sale_off']==''):
						?>						
						<?php else: ?>
						<del class="mx-2 font-weight-light">
							<?php echo $detail_product['sale_off']; ?> VNĐ
						</del>
						<?php endif; ?>
						
					</p>
					<p>Danh Mục: <?php echo $detail_product['cate_name']; ?></p>
					<p>Views: <?php echo $detail_product['views']; ?></p>
					<p>Trạng Thái: 
						<?php foreach($status_products as $key => $value): ?>
							<?php if($detail_product['status']==$value): ?>
								<span class="text-primary">
									<?php echo $key; ?>	
								</span>
							
							<?php endif; ?>
						<?php endforeach; ?>
					</p>
					<p>Mô Tả Ngắn: 
						<div class="single-infoagile">
							<ul>
								<li class="mb-3">
									<?php echo $detail_product['desc_short']; ?>
								</li>
								
							</ul>
						</div>


					</p>
					<div style="font-size: 15px;" class="description">
						
                        <h6>Điền đầy đủ thông tin để nhận hàng</h6>
                    	<?php if(isset($_GET['errAll'])): ?>
                    		<br>
                    		<span class="alert alert-danger">
                    			<?php echo $_GET['errAll']; ?>			
                    		</span>
                    		<br>
                    	<?php elseif(isset($_GET['success'])): ?>
                    		<br>
                    		<span class="alert alert-success">
                    			<?php echo $_GET['success']; ?>			
                    		</span>
                    		<br>
                    	<?php endif; ?>
                        <br>
                        <form action="<?php echo Base_url.'submit_order.php'; ?>" method="post">
                        	<input type="hidden" name="id" value="<?php echo $id; ?>">
                           <input class="form-control col-lg-9" type="text" name="Email" placeholder="Địa chỉ email">
                           
                           <span class="text-danger">
                           		<?php if(isset($_GET['errEmail'])) echo $_GET['errEmail']; ?>
                           	
                           </span>
                           <br>
                           <input class="form-control col-lg-9" type="text" name="address" placeholder="Địa chỉ nhận hàng">
                           <br>
                           <input class="form-control col-lg-9" type="text" name="name" placeholder="Họ Tên">
                           <br>
                           <input class="form-control col-lg-9" type="text" name="phone" placeholder="Số Điện Thoại">
                           <span class="text-danger">
                           		<?php if(isset($_GET['errPhone'])) echo $_GET['errPhone']; ?>
                           </span>
                           <br>
                           <input class="form-control col-lg-9" type="text" name="amount" placeholder="Số Lượng">
                           <span class="text-danger">
                           		<?php if(isset($_GET['errAmount'])) echo $_GET['errAmount'] ?>
                           </span>
                           <br>
                           <div class="form-group">
	                           <label>Phương thức thanh toán</label>
	                           <br>
	                           <?php foreach($payment_method as $key => $value): ?>
	                           		<input class="" type="radio"
	                           		 name="payment_mt" value="<?php echo $value ?>"><?php echo $key; ?>
	                           <?php endforeach; ?>
	                           <br>
	                           <span class="text-danger">
	                           		<?php if(isset($_GET['errPayment'])) echo $_GET['errPayment']; ?>
	                           </span>
                           </div>

                           <br>
                           <input class="btn btn-dark col-lg-3" name="btn_s" type="submit" value="Đặt hàng">
                        </form>
                     </div>
                     <br>
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
							<input pro-id="<?php echo $id; ?>" class=" btn-add2Cart button btn" type="button" value="Add to cart">
							<span class="msg1"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mt-4 container-fluid col-md-11 mr-3">
			<h5 class="col-md-11">Mô Tả Chi Tiết</h5>
			<div>	
				<p class="col-md-11">
					<?php if($detail_product['detail']==''): ?>
						Sản phẩm này chưa có mô tả!
					<?php else: ?>	
						<?php echo $detail_product['detail']; ?>
					<?php endif; ?>
						
				</p>
			</div>
			<h5 class="mt-4 mb-3 col-md-4 ">Bình Luận (
				<?php if($detail_product['disabled_comment']<0): ?>
					0
				<?php else: ?>
					<?php echo $CountCMT['TotalCMT']; ?>
				<?php endif; ?>
				)
			</h5>
			<div id="load_cmt" class="container-fluid">	
            	<p style="color:red;"> <?php if(isset($err)) echo $err; ?> </p>
            	<?php if($detail_product['disabled_comment']<0): ?>
            	<div class="container text-center">
            		<span class="alert alert-danger">
            			<i class="fa fa-times-circle" aria-hidden="true"></i>
						Bình luận đã được tắt cho sản phẩm này!
					</span>
				</div>
            	
            	<?php else: ?>
            	<div class="container-fluid mt-4">
            		<?php if(isset($_GET['err'])): ?>
            			<span class="text-danger">
            				<?php echo $_GET['err'] ?>
            			</span>
            		<?php endif; ?>	
	            	<form action="<?php echo Base_url.'submit_cmt.php' ?>" method="post">
	                <input type="hidden" name="pr_id" 
	                  value="<?php echo $id;?>">
	                <input style="height: 120px;font-size: 17px;" class="form-control col-lg-8" type="text" name="content" placeholder="Nhập nội dung để bình luận">
	                <br>
	                <input class="container col-lg-2 btn btn-primary" name="btn_submit" type="submit" value="Gửi">
	            	</form>
	            	
	            </div>
	            <?php if($ShowCMT==null): ?>
	            <?php else: ?>    
        	 	<?php foreach($ShowCMT as $cmt): ?>	
	             <div style="margin-top:20px;background: #f8f8f8;float: left;margin-bottom: 10px;" class="border col-lg-8">
	             	<div style="float: left;" class="col-sm-2 col-md-2">
	             		<img class="" src="<?php echo Base_url.$cmt['avatar'] ?>">
	             	</div>
	               
	               <div class="col-sm-8">
	               <p> <?php echo " Họ Tên:". $cmt['name'] ?></p>
	               <p> <?php echo "Nội Dung:" .$cmt['content'] ?></p>
	               <p><?php echo "Ngày Bình Luận: ".$cmt['n'] ?></p>
	               </div>
	               <div id="reply" class="btn button">Reply</div>
	               <div id="cancel_repy" class="btn button"></div>
	               <script type="text/javascript">
	               		$(document).ready(function(){
	               			$('#reply').click(function(){
	               				$('#show_rl').show();	               				
	               				$('#cancel_repy').html("Cancel").css('color','red').show();
	               			});
	               			$('#cancel_repy').click(function(){
	               				$('#show_rl').hide();
	               				$('#hd001').val('');
	               				$('#cancel_repy').hide();
	               			});
	               		});
	               </script>

	             </div>
	             <form id="show_rl" style="display: none;margin-top: 20px;margin-left: 50px;" action="<?php echo Base_url.'submit_cmt.php' ?>" method="post">
	                <input type="hidden" name="pr_id" 
	                  value="<?php echo $id;?>">
	                <input id="hd001" style="height: 120px;font-size: 17px;" class="form-control col-lg-8" type="text" name="content" placeholder="Nhập nội dung để bình luận">
	                <br>
	                <input class="container col-lg-2 btn btn-primary" name="btn_submit" type="submit" value="Gửi">
	            </form>

          		<?php endforeach ?>
	         	<?php endif; ?>
	         	<?php endif; ?>       
         	</div>
         	<div style="clear: both;"></div>	
		</div>
		<?php if($Relate_products==''): ?>
		<?php else: ?>
		<div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4 mt-5">
			<h3 class="heading-tittle text-center font-italic">Các Sản Phẩm Liên Quan</h3>
			<div class="row">

			<?php foreach($Relate_products as $Relate_prs): ?>
				<div class="col-md-4 product-men mt-5">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item text-center">
							<img src="<?php echo Base_url.$Relate_prs['image'] ?>" alt="">
							<div class="men-cart-pro">
								<div class="inner-men-cart-pro">
									<a href="<?php echo Base_url.'detail.php?id='.$Relate_prs['pro_id']; ?>" class="link-product-add-cart">Xem Chi Tiết</a>
								</div>
							</div>
						</div>
						
						<div class="item-info-product text-center border-top mt-4">
							<h4 class="pt-1">
								<a href="<?php echo Base_url.'detail.php?id='.$Relate_prs['pro_id']; ?>"><?php echo $Relate_prs['name']; ?></a>
							</h4>
							<div class="info-product-price my-2">
								<span class="item_price">
									<?php echo $Relate_prs['price']; ?> VNĐ
										
								</span>
								<?php if($Relate_prs['sale_off']==null ||
										$Relate_prs['sale_off']==''):
								?>
								
								<?php else: ?>
									<del><?php echo $Relate_prs['sale_off']; ?> VNĐ</del>
								<?php endif; ?>
							</div>
							<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
								<input pro-id="<?php echo $Relate_prs['pro_id']; ?>" class=" btn-add2Cart button btn" type="button" value="Add to cart">
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
	<!-- //Single Page -->

	
	<!-- footer -->
	<footer>
		<div class="footer-top-first">
			<div class="container py-md-5 py-sm-4 py-3">
				<!-- footer first section -->
				<h2 class="footer-top-head-w3l font-weight-bold mb-2">Electronics :</h2>
				<p class="footer-main mb-4">
					If you're considering a new laptop, looking for a powerful new car stereo or shopping for a new HDTV, we make it easy to
					find exactly what you need at a price you can afford. We offer Every Day Low Prices on TVs, laptops, cell phones, tablets
					and iPads, video games, desktop computers, cameras and camcorders, audio, video and more.</p>
				<!-- //footer first section -->
				<!-- footer second section -->
				<div class="row w3l-grids-footer border-top border-bottom py-sm-4 py-3">
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-dolly"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Free Shipping</h3>
								<p>on orders over $100</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer my-md-0 my-4">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Fast Delivery</h3>
								<p>World Wide</p>
							</div>
						</div>
					</div>
					<div class="col-md-4 offer-footer">
						<div class="row">
							<div class="col-4 icon-fot">
								<i class="far fa-thumbs-up"></i>
							</div>
							<div class="col-8 text-form-footer">
								<h3>Big Choice</h3>
								<p>of Products</p>
							</div>
						</div>
					</div>
				</div>
				<!-- //footer second section -->
			</div>
		</div>
		<!-- footer third section -->
		<div class="w3l-middlefooter-sec">
			<div class="container py-md-5 py-sm-4 py-3">
				<div class="row footer-info w3-agileits-info">
					<!-- footer categories -->
					<div class="col-md-3 col-sm-6 footer-grids">
						<h3 class="text-white font-weight-bold mb-3">Danh Mục</h3>
						<ul>
							<?php foreach($Get_categories as $get_cate): ?>
							<li class="mb-3">
								<a href="<?php echo Base_url.'category.php?id='.$get_cate['id'] ?>">
									<?php echo $get_cate['cate_name'] ?>	
								</a>
							</li>
							<?php endforeach ?>
						</ul>
					</div>
					<!-- //footer categories -->
					<!-- quick links -->
					<div class="col-md-3 col-sm-6 footer-grids mt-sm-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Liên Kết Nhanh</h3>
						<ul>
							<li class="mb-3">
								<a href="<?php echo Base_url ?>about.php">Giới Thiệu</a>
							</li>
							<li class="mb-3">
								<a href="<?php echo Base_url ?>contact.php">Liên Hệ</a>
							</li>
							<li class="mb-3">
								<a href="#">Help</a>
							</li>
							<li class="mb-3">
								<a href="#">Faqs</a>
							</li>
							<li class="mb-3">
								<a href="#">Terms of use</a>
							</li>
							<li>
								<a href="#">Privacy Policy</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids mt-md-0 mt-4">
						<h3 class="text-white font-weight-bold mb-3">Liên Hệ Với Chúng Tôi</h3>
						<ul>
							<li class="mb-3">
								<i class="fas fa-map-marker"></i> <?php echo $info_web['address'] ?></li>
							<li class="mb-3">
								<i class="fas fa-mobile"></i><?php echo $info_web['hotline'] ?></li>
							
							<li class="mb-3">
								<i class="fas fa-envelope-open"></i>
								<a href="mailto:example@mail.com"><?php echo $info_web['email'] ?></a>
							</li>
							
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 footer-grids w3l-agileits mt-md-0 mt-4">
						<!-- newsletter -->
						<h3 class="text-white font-weight-bold mb-3">Bản Tin</h3>
						<p class="mb-3">Đăng Kí Nhận Bản Tin</p>
						<form action="#" method="post">
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="email" required="">
								<input type="submit" value="Go">
							</div>
						</form>
						<!-- //newsletter -->
						<!-- social icons -->
						<div class="footer-grids  w3l-socialmk mt-3">
							<h3 class="text-white font-weight-bold mb-3">Follow Us on</h3>
							<div class="social">
								<ul>
									<li>
										<a class="icon fb" href="<?php echo $info_web['url_facebook'] ?>">
											<i class="fab fa-facebook-f"></i>
										</a>
									</li>
									<li>
										<a class="icon tw" href="<?php echo $info_web['url_twitter'] ?>">
											<i class="fab fa-twitter"></i>
										</a>
									</li>
									<li>
										<a style="background: red;" class="icon youtube" href="<?php echo $info_web['url_youtube'] ?>">
											<i class="fab fa-youtube"></i>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- //social icons -->
					</div>
				</div>
				<!-- //quick links -->
			</div>
			
		</div>
		<!-- //footer third section -->

		<!-- footer fourth section -->
		<div class="agile-sometext py-md-5 py-sm-4 py-3">
			<div class="container">
				<!-- brands -->
				<div class="sub-some">
					
				<div class="sub-some child-momu mt-4">
					<h5 class="font-weight-bold mb-3">Payment Method</h5>
					<ul>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay2.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay5.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay1.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay4.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay6.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay3.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay7.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay8.png" alt="">
						</li>
						<li>
							<img src="<?php echo Base_url ?>public/images/pay9.png" alt="">
						</li>
					</ul>
				</div>
				<!-- //payment -->
			</div>
		</div>
		<!-- //footer fourth section (text) -->
	</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right py-3">
		<div class="container">
			<p class="text-center text-white">© 2019 All rights reserved
			</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="<?php echo Base_url ?>public/js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->
	<script>
			$(document).ready(function(){
				$('.btn-add2Cart').click(function(){
					
					var proId = $(this).attr('pro-id');
					$.ajax({
						url: '<?php echo Base_url . 'add-2-cart.php' ?>',
						method: "GET",
						data: {
							id: proId
						},
						dataType: "json",
						success: function(response){
							var cart = response.data;
							
							var totalItem = 0;
							cart.forEach(function(value, index){
								totalItem += value.quantity;
							});
							$('#totalCartItem').text(totalItem);
							$('#myModal').modal('show');
							$('.ss1').text(response.msg);
							setTimeout(function() {
								 $("#myModal").modal('hide')
							}, 1500);
						}
					});
					
					
					
				});
				

			});
		</script>		
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content border-success">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        
		      </div>
		      <div class="modal-body">

		        <p class="ss1 text-success">
		        	
				</p>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
		      </div>
		    </div>

		  </div>
		</div>
	<!-- flexslider -->
	<link rel="stylesheet" href="<?php echo Base_url ?>public/css/flexslider.css" type="text/css" media="screen" />

	<!-- <script src="<?php echo Base_url ?>public/js/jquery.flexslider.js"></script> -->

	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->
	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="<?php echo Base_url ?>public/js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="<?php echo Base_url ?>public/js/minicart.js"></script>
	<script>
		paypals.minicarts.render(); //use only unique class names other than paypals.minicarts.Also Replace same class name in css and minicart.min.js

		paypals.minicarts.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- imagezoom -->
	<script src="<?php echo Base_url ?>public/js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="<?php echo Base_url ?>public/css/flexslider.css" type="text/css" media="screen" />

	<script src="<?php echo Base_url ?>public/js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- smoothscroll -->
	<script src="<?php echo Base_url ?>public/js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="<?php echo Base_url ?>public/js/move-top.js"></script>
	<script src="<?php echo Base_url ?>public/js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="<?php echo Base_url ?>public/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>