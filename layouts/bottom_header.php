<?php 	
$cart = isset($_SESSION['CART']) ? $_SESSION['CART'] : [];
$totalItem=null;
$totalPrice = 0;
foreach ($cart as $item) {
	$totalItem += $item['quantity'];
	$totalPrice += $item['price']*$item['quantity'];
}

 ?>
<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<div class="col-md-3 logo_agile">

					<h1 class="text-center">
						<a href="<?php echo Base_url ?>" class="font-weight-bold font-italic">
							<img src="<?php echo Base_url ?><?php echo $info_web['logo'] ?>" alt=" " class="img-fluid">
							<?php echo $info_web['slogan'] ?>

						</a>
					</h1>

				</div>
				<!-- //logo -->
				<!-- header-bot -->
				<div class="col-md-9 header mt-4 mb-md-0 mb-4">
					<div class="row">
						<!-- search -->
						<div class="col-10 agileits_search">
							<form class="form-inline" action="<?php echo Base_url.'search.php' ?>" method="get">
								<input class="form-control mr-sm-2 nam123" type="search" placeholder="Search" aria-label="Search" name="search">
								<button class="btn my-2 my-sm-0" type="submit" id="search123">Search</button>
								<span class="text-danger"><?php if(isset($ERRs)) echo $ERRs; ?></span>
							</form>
						</div>
						<script>
							$(document).ready(function(){
								
								$('#search123').click(function(event){
									event.preventDefault();
									var nam123 = $('.nam123').val();
									console.log(nam123);
									if (nam123=='') {
										$('#searchModel').modal('show');
										$('.ss1').html("Vui lòng nhập nội dung tìm kiếm");
									}
									else{
										window.location.href="<?php echo Base_url.'search.php?search=' ?>"+nam123;
									}

								});

							});
						</script>
						<div id="searchModel" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content border-danger">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        
						      </div>
						      <div class="">
						        <p class="ss1 text-danger text-center"></p>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
						      </div>
						    </div>

						  </div>
						</div>
						<!-- //search -->
						<!-- cart details -->
						<div class="col-sm-2 top_nav_right text-center mt-sm-0 mt-2">
							<div class="col-sm-1 wthreecartaits wthreecartaits2 cart cart box_1" title="Giỏ Hàng">
								
									<a href="<?php echo Base_url ?>checkout.php">
									<button class="btn w3view-cart">
										
										

										<i class="fas fa-cart-arrow-down">
											<span id="totalCartItem"><?php echo  $totalItem ?></span>
											
										</i>
										
										
									</button>
								</a>
								
							</div>
						</div>
						<!-- //cart details -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- shop locator (popup) -->