<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="row">
			<!-- ============================================== SIDEBAR ============================================== -->
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">

				<!-- ================================== TOP NAVIGATION ================================== -->
				<div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head">
						<i class="icon fa fa-align-justify fa-fw"></i> หมวดหมู่สินค้า</div>
					<nav class="yamm megamenu-horizontal" role="navigation">
						<ul class="nav">
							<?php foreach ($menu_type as $master): ?>
							<li class="dropdown menu-item">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $master['name']; ?>(<?php echo $master['count_product'] ?>)</a>
								<ul class="dropdown-menu mega-menu">
									<li class="yamm-content">
										<div class="row">
											<div class="col-sm-12 col-md-12">
												<ul class="links list-unstyled">
													<?php foreach ($brand_oftype as $detail): ?>
													<?php if ($master['id'] == $detail['product_type_id'] && $detail['product_brand_name'] !=""): ?>
													<li><a href="<?php echo base_url('products/category_brand/'.$master['name'].'/'.$detail['product_brand_name']) ?>"><?php echo  $detail['product_brand_name']; ?></a></li>
													<?php endif ?>
													<?php endforeach ?>
													<li><a href="<?php echo base_url('products/category/'.$master['name']) ?>">ทั้งหมด</a></li>
												</ul>
											</div>
										</div><!-- /.row -->
									</li><!-- /.yamm-content -->
								</ul><!-- /.dropdown-menu -->
							</li><!-- /.menu-item -->
							<?php endforeach ?>
						</ul><!-- /.nav -->
					</nav><!-- /.megamenu-horizontal -->
				</div><!-- /.side-menu -->
				<!-- ================================== TOP NAVIGATION : END ================================== -->
				<!-- ============================================== SPECIAL OFFER ============================================== -->

				<div class="sidebar-widget outer-bottom-small wow fadeInUp">
					<h3 class="section-title">Special Offer</h3>
					<div class="sidebar-widget-body outer-top-xs">
						<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
							<div class="item">
								<div class="products special-product">
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm1.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm1.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->
														<div class="tag tag-micro hot">
															<span>hot</span>
														</div>


													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Simple Product</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm2.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm2.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->


													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Canon EOS 60D</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm3.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm3.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->

														<div class="tag tag-micro new">
															<span>new</span>
														</div>

													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Sony Camera X30</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
								</div>
							</div>
							<div class="item">
								<div class="products special-product">
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm1.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm1.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->


													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Simple Product</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm2.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm2.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->


														<div class="tag tag-micro sale">
															<span>sale</span>
														</div>
													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Canon EOS 60D</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm3.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm3.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->


													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Sony Camera X30</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
								</div>
							</div>
							<div class="item">
								<div class="products special-product">
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm1.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm1.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->

														<div class="tag tag-micro new">
															<span>new</span>
														</div>

													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Simple Product</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm2.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm2.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->
														<div class="tag tag-micro hot">
															<span>hot</span>
														</div>


													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Canon EOS 60D</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
									<div class="product">
										<div class="product-micro">
											<div class="row product-micro-row">
												<div class="col col-xs-5">
													<div class="product-image">
														<div class="image">
															<a href="<?php echo base_url('theme_unicase');?>/assets/images/products/sm3.jpg" data-lightbox="image-1" data-title="Nunc ullamcors">
																<img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/sm3.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
																    alt="">
																<div class="zoom-overlay"></div>
															</a>
														</div>
														<!-- /.image -->


													</div>
													<!-- /.product-image -->
												</div>
												<!-- /.col -->
												<div class="col col-xs-7">
													<div class="product-info">
														<h3 class="name">
															<a href="#">Sony Camera X30</a>
														</h3>
														<div class="rating rateit-small"></div>
														<div class="product-price">
															<span class="price">
																$650.99 </span>

														</div>
														<!-- /.product-price -->
														<div class="action">
															<a href="#" class="lnk btn btn-primary">Add To Cart</a>
														</div>
													</div>
												</div>
												<!-- /.col -->
											</div>
											<!-- /.product-micro-row -->
										</div>
										<!-- /.product-micro -->

									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.sidebar-widget-body -->
				</div>
				<!-- /.sidebar-widget -->
				<!-- ============================================== SPECIAL OFFER : END ============================================== -->
				<!-- ============================================== PRODUCT TAGS ============================================== -->
				<div class="sidebar-widget product-tag wow fadeInUp">
					<h3 class="section-title">Product tags</h3>
					<div class="sidebar-widget-body outer-top-xs">
						<div class="tag-list">
							<a class="item" title="Phone" href="category.html">Phone</a>
							<a class="item active" title="Vest" href="category.html">Vest</a>
							<a class="item" title="Smartphone" href="category.html">Smartphone</a>
							<a class="item" title="Furniture" href="category.html">Furniture</a>
							<a class="item" title="T-shirt" href="category.html">T-shirt</a>
							<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
							<a class="item" title="Sneaker" href="category.html">Sneaker</a>
							<a class="item" title="Toys" href="category.html">Toys</a>
							<a class="item" title="Rose" href="category.html">Rose</a>
						</div>
						<!-- /.tag-list -->
					</div>
					<!-- /.sidebar-widget-body -->
				</div>
				<!-- /.sidebar-widget -->
				<!-- ============================================== PRODUCT TAGS : END ============================================== -->
				<!-- ============================================== COLOR============================================== -->
				<div class="sidebar-widget  wow fadeInUp outer-top-vs ">
					<div id="advertisement" class="advertisement">
						<div class="item bg-color">
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text">
										Save
										<span class="big">50%</span>
									</div>


									<div class="excerpt">
										on selected items
									</div>
								</div>
								<!-- /.caption -->
							</div>
							<!-- /.container-fluid -->
						</div>
						<!-- /.item -->

						<div class="item" style="background-image: url('assets/images/advertisement/1.jpg');">

						</div>
						<!-- /.item -->

						<div class="item bg-color">
							<div class="container-fluid">
								<div class="caption vertical-top text-left">
									<div class="big-text">
										Save
										<span class="big">50%</span>
									</div>


									<div class="excerpt fadeInDown-2">
										on selected items
									</div>
								</div>
								<!-- /.caption -->
							</div>
							<!-- /.container-fluid -->
						</div>
						<!-- /.item -->

					</div>
					<!-- /.owl-carousel -->
				</div>

				<!-- ============================================== COLOR: END ============================================== -->


			</div>
			<!-- /.sidemenu-holder -->
			<!-- ============================================== SIDEBAR : END ============================================== -->

			<!-- ============================================== CONTENT ============================================== -->
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<!-- ========================================== SECTION – HERO ========================================= -->

				<div id="hero">
					<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

						<div class="item" style="background-image: url(<?php echo base_url('theme_unicase');?>/assets/images/sliders/01.jpg);">
							<div class="container-fluid">
								<div class="caption bg-color vertical-center text-left">
									<div class="big-text fadeInDown-1">
										The new
										<span class="highlight">imac</span> for you
									</div>

									<div class="excerpt fadeInDown-2 hidden-xs">

										<span>21.5-Inch Now Starting At $1099 </span>
										<span>27-Inch Starting At $1799</span>
									</div>
									<div class="button-holder fadeInDown-3">
										<a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
									</div>
								</div>
								<!-- /.caption -->
							</div>
							<!-- /.container-fluid -->
						</div>
						<!-- /.item -->

						<div class="item" style="background-image: url(<?php echo base_url('theme_unicase');?>/assets/images/sliders/01.jpg);">
							<div class="container-fluid">
								<div class="caption bg-color vertical-center text-left">
									<div class="big-text fadeInDown-1">
										The new
										<span class="highlight">imac</span> for you
									</div>

									<div class="excerpt fadeInDown-2 hidden-xs">

										<span>21.5-Inch Now Starting At $1099 </span>
										<span>27-Inch Starting At $1799</span>
									</div>
									<div class="button-holder fadeInDown-3">
										<a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
									</div>
								</div>
								<!-- /.caption -->
							</div>
							<!-- /.container-fluid -->
						</div>
						<!-- /.item -->



					</div>
					<!-- /.owl-carousel -->
				</div>

				<!-- ========================================= SECTION – HERO : END ========================================= -->

				<!-- ============================================== INFO BOXES ============================================== -->
				<div class="info-boxes wow fadeInUp">
					<div class="info-boxes-inner">
						<div class="row">
							<div class="col-md-6 col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										<div class="col-xs-2">
											<i class="icon fa fa-dollar"></i>
										</div>
										<div class="col-xs-10">
											<h4 class="info-box-heading green">money back</h4>
										</div>
									</div>
									<h6 class="text">30 Day Money Back Guarantee.</h6>
								</div>
							</div>
							<!-- .col -->

							<div class="hidden-md col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										<div class="col-xs-2">
											<i class="icon fa fa-truck"></i>
										</div>
										<div class="col-xs-10">
											<h4 class="info-box-heading orange">free shipping</h4>
										</div>
									</div>
									<h6 class="text">free ship-on oder over $600.00</h6>
								</div>
							</div>
							<!-- .col -->

							<div class="col-md-6 col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										<div class="col-xs-2">
											<i class="icon fa fa-gift"></i>
										</div>
										<div class="col-xs-10">
											<h4 class="info-box-heading red">Special Sale</h4>
										</div>
									</div>
									<h6 class="text">All items-sale up to 20% off </h6>
								</div>
							</div>
							<!-- .col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.info-boxes-inner -->

				</div>
				<!-- /.info-boxes -->
				<!-- ============================================== INFO BOXES : END ============================================== -->
				<!-- ============================================== SCROLL TABS ============================================== -->
				<div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
					<div class="more-info-tab clearfix ">
						<h3 class="new-product-title pull-left">สินค้ามาใหม่</h3>
						<ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
							<!-- <li class="active">
								<a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a>
							</li> -->
							<!-- <li>
								<a data-transition-type="backSlide" href="#smartphone" data-toggle="tab">smartphone</a>
							</li>
							<li>
								<a data-transition-type="backSlide" href="#laptop" data-toggle="tab">laptop</a>
							</li>
							<li>
								<a data-transition-type="backSlide" href="#apple" data-toggle="tab">apple</a>
							</li> -->
						</ul>
						<!-- /.nav-tabs -->
					</div>

					<div class="tab-content outer-top-xs">
						<div class="tab-pane in active" id="all">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

									<?php 
										$data_product_new['product_list'] = $product_new;
										$this->load->view('home/new_product',$data_product_new); 
									?>

								</div><!-- /.home-owl-carousel -->
							</div><!-- /.product-slider -->
						</div><!-- /.tab-pane -->

						<div class="tab-pane" id="smartphone">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/3.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag sale">
														<span>sale</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Apple Iphone 5s 32GB</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/2.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag new">
														<span>new</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Samsung Galaxy S4</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/4.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag sale">
														<span>sale</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">LG Smart Phone LP68</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/6.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag new">
														<span>new</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Nokia Lumia 520</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/2.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag hot">
														<span>hot</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Samsung Galaxy S4</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/1.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag hot">
														<span>hot</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Sony Ericson Vaga</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->
								</div>
								<!-- /.home-owl-carousel -->
							</div>
							<!-- /.product-slider -->
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="laptop">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/2.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag new">
														<span>new</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Samsung Galaxy S4</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/6.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag new">
														<span>new</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Nokia Lumia 520</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/4.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag sale">
														<span>sale</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">LG Smart Phone LP68</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/2.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag hot">
														<span>hot</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Samsung Galaxy S4</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/1.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag hot">
														<span>hot</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Sony Ericson Vaga</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/3.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag sale">
														<span>sale</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Apple Iphone 5s 32GB</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->
								</div>
								<!-- /.home-owl-carousel -->
							</div>
							<!-- /.product-slider -->
						</div>
						<!-- /.tab-pane -->

						<div class="tab-pane" id="apple">
							<div class="product-slider">
								<div class="owl-carousel home-owl-carousel custom-carousel owl-theme">

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/3.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag sale">
														<span>sale</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Apple Iphone 5s 32GB</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/1.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag hot">
														<span>hot</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Sony Ericson Vaga</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/4.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag sale">
														<span>sale</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">LG Smart Phone LP68</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/6.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag new">
														<span>new</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Nokia Lumia 520</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/2.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag new">
														<span>new</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Samsung Galaxy S4</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->

									<div class="item item-carousel">
										<div class="products">

											<div class="product">
												<div class="product-image">
													<div class="image">
														<a href="detail.html">
															<img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/products/2.jpg"
															    alt="">
														</a>
													</div>
													<!-- /.image -->

													<div class="tag hot">
														<span>hot</span>
													</div>
												</div>
												<!-- /.product-image -->


												<div class="product-info text-left">
													<h3 class="name">
														<a href="detail.html">Samsung Galaxy S4</a>
													</h3>
													<div class="rating rateit-small"></div>
													<div class="description"></div>

													<div class="product-price">
														<span class="price">
															$650.99 </span>
														<span class="price-before-discount">$ 800</span>

													</div>
													<!-- /.product-price -->

												</div>
												<!-- /.product-info -->
												<div class="cart clearfix animate-effect">
													<div class="action">
														<ul class="list-unstyled">
															<li class="add-cart-button btn-group">
																<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
																	<i class="fa fa-shopping-cart"></i>
																</button>
																<button class="btn btn-primary" type="button">Add to cart</button>

															</li>

															<li class="lnk wishlist">
																<a class="add-to-cart" href="detail.html" title="Wishlist">
																	<i class="icon fa fa-heart"></i>
																</a>
															</li>

															<li class="lnk">
																<a class="add-to-cart" href="detail.html" title="Compare">
																	<i class="fa fa-retweet"></i>
																</a>
															</li>
														</ul>
													</div>
													<!-- /.action -->
												</div>
												<!-- /.cart -->
											</div>
											<!-- /.product -->

										</div>
										<!-- /.products -->
									</div>
									<!-- /.item -->
								</div>
								<!-- /.home-owl-carousel -->
							</div>
							<!-- /.product-slider -->
						</div>
						<!-- /.tab-pane -->

					</div>
					<!-- /.tab-content -->
				</div>
				<!-- /.scroll-tabs -->
				<!-- ============================================== SCROLL TABS : END ============================================== -->
				<!-- ============================================== WIDE PRODUCTS ============================================== -->
				<div class="wide-banners wow fadeInUp outer-bottom-vs">
					<div class="row">

						<div class="col-md-7">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/banners/1.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
									    alt="">
								</div>
								<div class="strip">
									<div class="strip-inner">
										<h3 class="hidden-xs">samsung</h3>
										<h2>galaxy</h2>
									</div>
								</div>
							</div>
							<!-- /.wide-banner -->
						</div>
						<!-- /.col -->

						<div class="col-md-5">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/banners/2.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
									    alt="">
								</div>
								<div class="strip">
									<div class="strip-inner">
										<h3 class="hidden-xs">new trend</h3>
										<h2>watch phone</h2>
									</div>
								</div>
							</div>
							<!-- /.wide-banner -->
						</div>
						<!-- /.col -->

					</div>
					<!-- /.row -->
				</div>
				<!-- /.wide-banners -->

				<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
				<!-- ============================================== FEATURED PRODUCTS ============================================== -->
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title">สินค้าลดราคา</h3>
					<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

						<?php 
							$data_product_new['product_list'] = $product_sale;
							$this->load->view('home/sale_product',$data_product_new); 
						?>
						
					</div>
					<!-- /.home-owl-carousel -->
				</section>
				<!-- /.section -->
				<!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
				<!-- ============================================== WIDE PRODUCTS ============================================== -->
				<div class="wide-banners wow fadeInUp outer-bottom-vs">
					<div class="row">

						<div class="col-md-12">
							<div class="wide-banner cnt-strip">
								<div class="image">
									<img class="img-responsive" data-echo="<?php echo base_url('theme_unicase');?>/assets/images/banners/3.jpg" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
									    alt="">
								</div>
								<div class="strip strip-text">
									<div class="strip-inner">
										<h2 class="text-right">one stop place for
											<br>
											<span class="shopping-needs">all your shopping needs</span>
										</h2>
									</div>
								</div>
								<div class="new-label">
									<div class="text">NEW</div>
								</div>
								<!-- /.new-label -->
							</div>
							<!-- /.wide-banner -->
						</div>
						<!-- /.col -->

					</div>
					<!-- /.row -->
				</div>
				<!-- /.wide-banners -->
				<!-- ============================================== WIDE PRODUCTS : END ============================================== -->
			</div>
			<!-- /.homebanner-holder -->
			<!-- ============================================== CONTENT : END ============================================== -->
		</div>
		<!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
		<?php $this->load->view('template/footer_brand'); ?>
		<!-- /.logo-slider -->
		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div>
	<!-- /.container -->
</div>
<!-- /#top-banner-and-menu -->