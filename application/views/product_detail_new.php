<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li><a href="<?php echo base_url('products'); ?>">สินค้า</a></li>
                <li class='active'>{{limitProductName('<?php echo $product_detail['name'] ?>')}}</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product outer-bottom-sm'>
			<div class='col-md-3 sidebar'>
                <div class="side-menu animate-dropdown outer-bottom-xs">
					<div class="head"><i class="icon fa fa-align-justify fa-fw"></i> หมวดหมู่สินค้า</div>
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

                <div class="sidebar-module-container type01">
                    <!-- ==============================================CATEGORY============================================== -->
                    <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                        <h3 class="section-title">ยี่ห้อสินค้า</h3>
                        <div class="sidebar-widget-body m-t-10">
                            <div class="accordion">

                            <?php foreach ($menu_brands as $brand): ?>
								<?php if ($brand['name']!=""): ?>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="<?php echo base_url('products/brand/'.$brand['name']) ?>"><?php echo $brand['name'] ?> <span>(<?php echo $brand['count_product'] ?>)</span></a>
                                        </div><!-- /.accordion-heading -->
                                    </div><!-- /.accordion-group -->
								<?php endif ?>								
                            <?php endforeach ?>
                            
                            </div><!-- /.accordion -->
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                </div><!-- /.sidebar-widget -->
                <!-- ============================================== CATEGORY : END ============================================== -->		
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<div class="row  wow fadeInUp">
						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">
                                    <?php if (count($product_images)==0): ?>
                                        <div class="single-product-gallery-item" id="slide1">
                                            <a data-lightbox="image-1" data-title="<?php echo $product_detail['name'] ?>" href="<?php echo $this->config->item('no_url_img');?>">
                                                <img class="img-responsive" alt="" src="<?php echo $this->config->item('no_url_img');?>" data-echo="<?php echo $this->config->item('no_url_img');?>" />
                                            </a>
                                        </div>
                                    <?php else: ?>
                                    <?php $i= 1; foreach ($product_images as $value): ?>
                                        <?php 
                                            $image_url="";
                                            if($value['path'] !="")
                                            {
                                                $image_url = $this->config->item('url_img').$value['path'];
                                            }
                                            else{

                                                $image_url = $this->config->item('no_url_img');

                                            }
                                        ?>
                                        <div class="single-product-gallery-item" id="slide<?php echo $i;?>">
                                            <a data-lightbox="image-1" data-title="<?php echo $product_detail['name'] ?>" href="<?php echo $image_url;?>">
                                                <img class="img-responsive" alt="" src="<?php echo $image_url;?>" data-echo="<?php echo $image_url;?>" />
                                            </a>
                                        </div>
                                    <?php $i++ ; endforeach ?>
									<?php endif ?>
								</div><!-- /.single-product-slider -->


								<div class="single-product-gallery-thumbs gallery-thumbs">

									<div id="owl-single-product-thumbnails">

                                        <?php if (count($product_images)==0): ?>
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="<?php echo $i;?>" href="#slide<?php echo $i;?>">
                                                    <img class="img-responsive" width="85" alt="" src="<?php echo $this->config->item('no_url_img');?>"/>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                        <?php $i= 1; foreach ($product_images as $value): ?>
                                            <?php 
                                                $image_url="";
                                                if($value['path'] !="")
                                                {
                                                    $image_url = $this->config->item('url_img').$value['path'];
                                                }
                                                else{

                                                    $image_url = $this->config->item('no_url_img');

                                                }
                                            ?>
                                            <div class="item">
                                                <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo $i-1;?>" href="#slide<?php echo $i-1;?>">
                                                    <img class="img-responsive" width="85" alt="" src="<?php echo $image_url;?>"/>
                                                </a>
                                            </div>
                                        <?php $i++ ; endforeach ?>
                                        <?php endif ?>
									</div><!-- /#owl-single-product-thumbnails -->
								</div><!-- /.gallery-thumbs -->
							</div><!-- /.single-product-gallery -->
                        </div><!-- /.gallery-holder -->
                        
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?php echo $product_detail['name'] ?></h1>

								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											<div class="rating rateit-small"></div>
										</div>
										<div class="col-sm-8">
											<div class="reviews">
												<a href="#" class="lnk">(06 Reviews)</a>
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.rating-reviews -->

								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-3">
											<div class="stock-box">
												<span class="label">สถานะสินค้า :</span>
											</div>
										</div>
										<div class="col-sm-9">
											<div class="stock-box">
                                                <?php if ($product_detail["stock_all"] > 0 || $product_detail['is_add_outofstock']): ?>
                                                    <span class="value">มีสินค้า</span>
                                                <?php else: ?>
                                                    <span class="value out-of-stock">หมดชั่วคราว</span>
                                                <?php endif ?>
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.stock-container -->

								<div class="description-container m-t-20">
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">
										<div class="col-sm-6">
											<div class="price-box">
                                            <?php 
					                        $price = $product_detail["price"];
					                        $disprice = 0 ;
					                        if ($product_detail["dis_price"] > 0) {
					                                $disprice =$product_detail["dis_price"] ;

					                        }

					                        if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"){
					                            $price = $product_detail["member_discount"];
					                        }
					                     
					                     ?>



										<?php if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"): ?>
						                    <?php $price  = $product_detail["member_discount"];?>

						                <?php endif ?>  

						                	<?php if ($price > 1): ?>
                                                <?php if ($product_detail["dis_price"] > 0): ?>
                                                    <span class="price" ng-bind="<?php echo $product_detail["dis_price"];?> | currency:'฿':0"></span>
                                                    <span class="price-strike" ng-bind="<?php echo $product_detail["price"];?> | currency:'฿':0"></span>
                                                <?php else: ?>
                                                    <span class="price" ng-bind="<?php echo $product_detail["price"];?> | currency:'฿':0"></span>
                                                <?php endif ?>

                                                <?php else: ?>
                                                    <span class="price">ราคาสอบถาม</span>
                                            <?php endif ?>
											</div>
										</div>

										<div class="col-sm-6">
											<div class="favorite-button m-t-10">
												<!-- <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
													<i class="fa fa-heart"></i>
												</a>
												<a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
													<i class="fa fa-retweet"></i>
												</a> -->
												<!-- <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="mailto:simpleitnotebook@gmail.com">
													<i class="fa fa-envelope"></i>
												</a> -->
											</div>
										</div>

									</div><!-- /.row -->
								</div><!-- /.price-container -->

								<div class="quantity-container info-container">
									<div class="row">

										<div class="col-sm-2">
										</div>

										<div class="col-sm-7">
                                        <?php if ($price >1): ?>
                                            <?php if ($product_detail['stock_all'] > 0): ?>
                                                <a href="<?php echo base_url('cart/add/'.$product_detail["id"]) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> สั่งซื้อสินค้า</a>
                                            <?php else: ?>
                                                <?php if ($product_detail['is_add_outofstock']): ?>
                                                    <a href="<?php echo base_url('cart/add/'.$product_detail["id"]) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> สั่งซื้อสินค้า</a>
                                                <?php else: ?>
                                                    <?php if ($product_detail['is_reservations']): ?>
                                                        <a href="<?php echo base_url('cart/add_reservations/'.$product_detail["id"]) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> จองสินค้า</a>
                                                    <?php else: ?>
                                                        <button type="button" class="btn btn-default"><strong class="text-danger">หมดชั่วคราว</strong></button>
                                                    <?php endif ?>
                                                <?php endif ?>
                                            <?php endif ?>
                                            <?php else: ?>
                                            <a href="<?php echo base_url('contact') ?>" class="btn btn-primary">ติดต่อเรา</a>
                                        <?php endif ?>
										</div>
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->

								<div class="product-social-link m-t-20 text-right">
									<span class="social-label">Share :</span>
									<div class="social-icons">
										<ul class="list-inline">
											<li>
												<a class="fa fa-facebook" href="http://facebook.com/transvelo"></a>
											</li>
											<li>
												<a class="fa fa-twitter" href="#"></a>
											</li>
											<li>
												<a class="fa fa-linkedin" href="#"></a>
											</li>
											<li>
												<a class="fa fa-rss" href="#"></a>
											</li>
											<li>
												<a class="fa fa-pinterest" href="#"></a>
											</li>
										</ul>
										<!-- /.social-icons -->
									</div>
								</div>




							</div>
							<!-- /.product-info -->
						</div>
						<!-- /.col-sm-7 -->
					</div>
					<!-- /.row -->


					<div class="product-tabs inner-bottom-xs  wow fadeInUp">
						<div class="row">
							<div class="col-sm-3">
								<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
									<li class="active">
										<a data-toggle="tab" href="#description">รายละเอียด</a>
									</li>
									<li>
										<a data-toggle="tab" href="#review">การรับประกัน</a>
									</li>
									<!-- <li>
										<a data-toggle="tab" href="#tags">TAGS</a>
									</li> -->
								</ul>
								<!-- /.nav-tabs #product-tabs -->
							</div>
							<div class="col-sm-9">

								<div class="tab-content">

									<div id="description" class="tab-pane in active">
										<div class="product-tab">
                                            <h4 class="title"><?php echo $product_detail['name'] ?></h4>
											<p class="text">
                                            <?php if (isset($product_detail['detail'])  && $product_detail['detail'] !=''): ?>
												<?php echo $product_detail['detail'] ?>
											<?php endif ?>
                                            <p>
										</div>
									</div>
									<!-- /.tab-pane -->

									<div id="review" class="tab-pane">
										<div class="product-tab">

											<div class="product-reviews">
												<h4 class="title">เงื่อนไขการรับประกัน</h4>

												<div class="reviews">
                                                    <h5>สินค้านอกเงื่อนไขการรับประกัน</h5>
                                                    <ol>
                                                        <li>สินค้า แตก หัก บุบ บิ่น งอ มีคราบน้ำ ของเหลว หรือสารเคมี</li>
                                                        <li>สินค้าเสียหายอันเนื่องมาจาการใช้งานผิดประเภท หรือ ดัดแปลงสภาพ </li>
                                                        <li>void รับประกัน หรือ ฉลากสินค้า ฉีก หรือ ขาด หรือ จางจนมองไม่เห็น </li>
                                                    </ol>
                                                    <h5>เงื่อนไขการเคลมสินค้า</h5>
                                                    <ol>
                                                        <li>สินค้าเสียที่อยู่ในการรับประกัน ทุกกรณี ส่งเคลมหน้าร้านหรือส่งทาง ไปรษนีย์ หรือ บริษัทขนส่งสินค้า</li>
                                                        <li>การเคลมอาจเปลี่ยนสินค้าตัวใหม่ให้ทันที หรือ รอเปลี่ยนสินค้า ในกรณีสินค้าหมด</li>
                                                        <li>กรณีส่งเคลมทางไปรษนีย์ หรือ ขนส่ง จะนับระยะเวลารับประกัน จนวันที่ ไปรษนีย์หรือขนส่งได้รับสินค้า </li>
                                                        <li>กรณีสินค้าเสียหายอันเนื่องมาจาก การขนส่ง ทางร้านไม่รับผิดชอบใดๆทั้งสิ้น และ ถือว่าอยู่นอกเหนือเงื่อนไขการรับประกัน (หมดประกันทันที)</li>
                                                    </ol>
                                                    <h5>วิธีการส่งสินค้ามาเคลมหรือเปลี่ยนสินค้า</h5>
                                                    <ol>
                                                        <li>ขนส่ง kerry express</li>
                                                        <li>ขนส่ง ไปรษณีย์</li>
                                                        <li>ขนส่ง SDS</li>
                                                        <li>โดยส่งมาที่ simple it ชั้น 2 ตึกคอมชลบุรี 135/99 ถ.สุขุมวิท ต.ศรีราชา อ.ศรีราชา จ.ชลบุรี 20110 ชั้น 2 ตึกคอมศรีราชา</li>
                                                    </ol>
                                                    <h5>ติดต่อเรา</h5>
                                                    <p>หากมีข้อสงสัยเกี่ยวกับเงื่อนไขการรับประกัน กรุณา <a href="<?php echo base_url('contact') ?>" class='contact-form'>ติดต่อเรา</a></p>

												</div>
												<!-- /.reviews -->
											</div>
											<!-- /.product-reviews -->
										</div>
										<!-- /.product-tab -->
									</div>
									<!-- /.tab-pane -->

									<div id="tags" class="tab-pane">
										<div class="product-tag">

											<h4 class="title">Product Tags</h4>
											<form role="form" class="form-inline form-cnt">
												<div class="form-container">

													<div class="form-group">
														<label for="exampleInputTag">Add Your Tags: </label>
														<input type="email" id="exampleInputTag" class="form-control txt">


													</div>

													<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
												</div>
												<!-- /.form-container -->
											</form>
											<!-- /.form-cnt -->

											<form role="form" class="form-inline form-cnt">
												<div class="form-group">
													<label>&nbsp;</label>
													<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
												</div>
											</form>
											<!-- /.form-cnt -->

										</div>
										<!-- /.product-tab -->
									</div>
									<!-- /.tab-pane -->

								</div>
								<!-- /.tab-content -->
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.product-tabs -->

					<!-- ============================================== UPSELL PRODUCTS ============================================== -->
					<section class="section featured-product wow fadeInUp">
						<h3 class="section-title">สินค้ามาใหม่</h3>
						<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">

                            <?php 
                                $data_product_new['product_list'] = $product_new;
                                $this->load->view('home/new_product',$data_product_new); 
                            ?>
                            
						</div>
						<!-- /.home-owl-carousel -->
					</section>
					<!-- /.section -->
					<!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

				</div>
				<!-- /.col -->
				<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->

</div><!-- /.body-content -->