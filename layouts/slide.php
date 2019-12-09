<?php
	$sql="select * from slider";
	$slide = executeQuery($sql,true);
?>	
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<!-- Indicators-->
		<ol class="carousel-indicators">
			<?php $i=0; ?>
			<?php foreach($slide as $sl): ?>
			
			<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"
				<?php if($i==0): ?>
			 		class="active">
			 	<?php endif; ?>
			 >	
			
			<?php $i++; ?>
			</li>
			<?php endforeach; ?>
		</ol>
		<div class="carousel-inner">
			<?php $i=0; ?>
			<?php foreach($slide as $sl): ?>
			<div style="background-image: url(<?php echo Base_url.$sl['image']; ?>);background-size: 100% 100%;"
				<?php if($i==0): ?>
				 	class="carousel-item item active"
				<?php else: ?>
					class="carousel-item"
				<?php endif; ?>
			>
				<?php $i++; ?>
				<div class="container">
					<div class="w3l-space-banner">
						<div class="carousel-caption p-lg-5 p-sm-4 p-3">
							<h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">
								<?php echo $sl['description']; ?>
							</h3>
							<a class="button2" href="<?php echo $sl['url']; ?>">Shop Now </a>
						</div>
					</div>
				</div>
			</div>
			<?php endforeach; ?>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>