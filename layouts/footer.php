<?php

	$sql="select * from brands";
 	$Brands=executeQuery($sql,true);
?>
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
			<div style="margin-bottom: 20px;">	
			  <h2>Our  Partners/ Our Clients</h2>
			   <section class="customer-logos slider">
			   	<?php foreach($Brands as $br): ?>
			      <div class="slide">
			      	<img src="<?php echo Base_url.$br['image'] ?>">
			      </div>
			     <?php endforeach; ?>
			   </section>
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
							console.log(cart);
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
	<!-- <script src="<?php echo Base_url ?>public/js/jquery-2.2.3.min.js"></script> -->
	<!-- //jquery -->

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
	
	<!-- scroll seller -->
	<script src="<?php echo Base_url ?>public/js/scroll.js"></script>
	<!-- //scroll seller -->

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
	<!-- Brands -->
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.customer-logos').slick({
		        slidesToShow: 6,
		        slidesToScroll: 1,
		        autoplay: true,
		        autoplaySpeed: 1500,
		        arrows: false,
		        dots: false,
		        pauseOnHover: false,
		        responsive: [{
		            breakpoint: 768,
		            settings: {
		                slidesToShow: 4
		            }
		        }, {
		            breakpoint: 520,
		            settings: {
		                slidesToShow: 3
		            }
		        }]
		    });
		});
	</script>
	<!-- end Brands -->
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
	<!-- imagezoom -->
	<!-- <script src="js/imagezoom.js"></script> -->
	<!-- //imagezoom -->

	
	<!-- for bootstrap working -->
	<script src="<?php echo Base_url ?>public/js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->