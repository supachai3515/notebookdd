<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
    <div class="row">
			<!-- ============================================== SIDEBAR ============================================== -->
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
			<?php 
				//left-sidebar
				$this->load->view('template/left-sidebar');
			?>
			<?php 
				//video
				//$this->load->view('home/video');
			?>	
					


			</div><!-- /.sidemenu-holder -->
			<!-- ============================================== SIDEBAR : END ============================================== -->

				<!-- ============================================== CONTENT ============================================== -->
				<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
					<!-- ========================================== SECTION – HERO ========================================= -->

					<div id="hero">
						<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">


						<?php foreach ($slider_list as $slider): ?>
						<?php if ($slider['id'] < 5): ?>

						<div class="item" style="background-image: url(<?php echo $slider['image'] ?>);">
								<div class="container-fluid">
									<div class="caption bg-color vertical-center text-left">
										<div class="big-text fadeInDown-1">

											<?php if (isset($slider['name']) && $slider['name'] != ""): ?>
												 <?php echo $slider['name'] ?> 
											<?php endif ?>
										</div>

										<div class="excerpt fadeInDown-2 hidden-xs">
										<?php if (isset($slider['description'])&& $slider['description'] != ""): ?>
											<span><?php echo $slider['description'] ?></span> 
										<?php endif ?>
										<?php if (isset($slider['description1'])&& $slider['description1'] != ""): ?>
											<span><?php echo $slider['description1'] ?></span>
										<?php endif ?>
										 
										</div>
										<div class="button-holder fadeInDown-3">
											<a href="<?php echo $slider['link'] ?>"
												class="btn-lg btn btn-uppercase btn-primary shop-now-button"><?php echo $slider['name_link'] ?></a>
										</div>
									</div><!-- /.caption -->
								</div><!-- /.container-fluid -->
							</div><!-- /.item -->

						<?php endif ?>    
					<?php endforeach ?> 
						</div><!-- /.owl-carousel -->
					</div>

					<!-- ========================================= SECTION – HERO : END ========================================= -->

					<!-- ============================================== INFO BOXES ============================================== -->
					<div class="info-boxes wow fadeInUp">
						<div class="info-boxes-inner">
							<div class="row">

							<?php foreach ($slider_list as $slider): ?>
								<?php if ($slider['id'] > 5 && $slider['id'] < 9 ) : ?>

								<?php if ($slider['name'] != "" ): ?>
								<div class="col-md-6 col-sm-4 col-lg-4">
									<div class="info-box">
										<div class="row">
											<div class="col-xs-2">
												<i class="icon <?php echo $slider['description1'] ?>"></i>
											</div>
											<div class="col-xs-10">
												<h4 class="info-box-heading green"><?php echo $slider['name'] ?></h4>
											</div>
										</div>
										<h6 class="text"><?php echo $slider['description'] ?></h6>
									</div>
								</div><!-- .col -->
								<?php endif ?>   
								<?php endif ?>    
							<?php endforeach ?> 
							</div><!-- /.row -->
						</div><!-- /.info-boxes-inner -->

					</div><!-- /.info-boxes -->
					<!-- ============================================== INFO BOXES : END ============================================== -->
					<!-- ============================================== FEATURED PRODUCTS ============================================== -->
					<section class="section wow fadeInUp">
						<h3 class="section-title">สินค้าใหม่</h3>
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

							 <!-- sports-tab-start -->
							 <?php 
								$data['product_list']= $product_new; 
								$this->load->view('home/product_new',$data);
							?>
										<!-- sports-tab-end -->
						</div><!-- /.home-owl-carousel -->
					</section><!-- /.section -->
					<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
					<!-- ============================================== FEATURED PRODUCTS ============================================== -->
					<section class="section wow fadeInUp">
						<h3 class="section-title">ลดราคา</h3>
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

							 <!-- sports-tab-start -->
							 <?php 
								$data['product_list']= $product_promotion; 
								$this->load->view('home/product_new',$data);
							?>
										<!-- sports-tab-end -->
						</div><!-- /.home-owl-carousel -->
					</section><!-- /.section -->
					<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

 
					<!-- ============================================== FEATURED PRODUCTS ============================================== -->
					<section class="section wow fadeInUp">
						<h3 class="section-title">สินค้าขายดี</h3>
						<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

							 <!-- sports-tab-start -->
							 <?php 
								$data['product_list']= $product_sale; 
								$this->load->view('home/product_new',$data);
							?>
										<!-- sports-tab-end -->
						</div><!-- /.home-owl-carousel -->
					</section><!-- /.section -->
					<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

				</div><!-- /.homebanner-holder -->
				<!-- ============================================== CONTENT : END ============================================== -->
			</div><!-- /.row --> 
		 
        <?php $this->load->view('template/footer_brand.php'); ?>
	</div>
	<!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->