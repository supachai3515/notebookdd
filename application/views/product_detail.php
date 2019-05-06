<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li><a href="<?php echo base_url('products'); ?>">สินค้า</a></li>
				<li><a href="<?php echo base_url('products/category/'.$product_detail['type_slug']) ?>"><?php echo $product_detail['type_name'] ?></a></li>  
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs" ng-controller="products_ctrl">
	<div class='container'>
		<div class='row single-product outer-bottom-sm '>
			<div class='col-md-3 sidebar'>
			<?php 
				//left-sidebar
				$this->load->view('template/left-sidebar');
			?>
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<div class="row  wow fadeInUp">
						<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
							<div class="product-item-holder size-big single-product-gallery small-gallery">

								<div id="owl-single-product">

								<?php if (count($product_images)==0): ?>
									
									<div class="single-product-gallery-item" id="slide1">
										<a data-lightbox="image-1" data-title="<?php echo $product_detail['name'] ?>"
											href="<?php echo $this->config->item('no_url_img');?>">
											<img class="img-responsive" alt="" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
												data-echo="<?php echo $this->config->item('no_url_img');?>" />
										</a>
									</div><!-- /.single-product-gallery-item -->

                            <?php endif ?>
								<?php $i= 1; foreach ($product_images as $value): ?>
								<?php
									$image_url="";
									if ($value['path'] !="") {
										$image_url = $this->config->item('url_img').$value['path'];
									} else {
										$image_url = $this->config->item('no_url_img');
									}
								?>
								 
								 <div class="single-product-gallery-item" id="slide<?php echo $i;?>">
										<a data-lightbox="image-1" data-title="<?php echo $product_detail['name'] ?>"
											href="<?php echo $image_url;?>">
											<img class="img-responsive" alt="" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
												data-echo="<?php echo $image_url;?>" />
										</a>
									</div><!-- /.single-product-gallery-item -->

								<?php $i++ ; endforeach ?>
								</div><!-- /.single-product-slider -->


								<div class="single-product-gallery-thumbs gallery-thumbs">

									<div id="owl-single-product-thumbnails">

									<?php if (count($product_images)==0): ?>

									<div class="item">
										<a class="horizontal-thumb active" data-target="#owl-single-product"
												data-slide="1" href="#slide1">
												<img class="img-responsive" width="85" alt=""
													src="<?php echo base_url('theme_unicase');?>assets/images/blank.gif"
													data-echo="<?php echo $this->config->item('no_url_img');?>" />
										</a>
										</div>
							
                                    <?php endif ?>
									<?php $i= 1; foreach ($product_images as $value): ?>
									<?php
										$image_url="";
										if ($value['path'] !="") {
											$image_url = $this->config->item('url_img').$value['path'];
										} else {
											$image_url = $this->config->item('no_url_img');
										}
									?>
									<?php if ($i==1): ?>
									<div class="item">
										<a class="horizontal-thumb active" data-target="#owl-single-product"
												data-slide="1" href="#slide1">
												<img class="img-responsive" width="85" alt=""
													src="<?php echo base_url('theme_unicase');?>assets/images/blank.gif"
													data-echo="<?php echo $image_url;?>" />
										</a>
										</div>
									
									   <?php else : ?>
 
									   <div class="item">
											<a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo $i;?>"
												href="#slide2">
												<img class="img-responsive" width="85" alt=""
													src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
													data-echo="<?php echo $image_url;?>" />
											</a>
										</div>
										<?php endif ?>
        
									<?php $i++ ; endforeach ?>

									</div><!-- /#owl-single-product-thumbnails -->
								</div><!-- /.gallery-thumbs -->

							</div><!-- /.single-product-gallery -->
						</div><!-- /.gallery-holder -->
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?php echo $product_detail['name'] ?></h1>
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
											<?php if (isset($product_detail['model']) && $product_detail['model'] !=''): ?>
                                            <span></span><span> <?php echo $product_detail['shot_detail'] ?></span>
											<br>
											<?php endif ?>
											<span><strong>SKU : </strong></span><span> <?php echo $product_detail['sku'] ?></span>
                                            <br>
                                            <?php if (isset($product_detail['model']) && $product_detail['model'] !=''): ?>
                                            <span><strong>MODEL : </strong></span><span> <?php echo $product_detail['model'] ?></span>
                                            <br>
                                            <?php endif ?>
                                            <?php if (isset($product_detail['brand_name'])  && $product_detail['brand_name'] !=''): ?>
                                            <span><strong>BRAND : </strong></span><span> <a href="<?php echo base_url('products/brand/'.$product_detail['brand_slug']) ?>"><?php echo $product_detail['brand_name'] ?></a></span>
                                            <br>
                                            <?php endif ?>
                                            <?php if (isset($product_detail['warranty'])  && $product_detail['warranty'] !=''): ?>
                                            <span><strong>ระยะประกัน : </strong></span><span><?php echo $product_detail['warranty'] ?></span>
                                            <br>
											<?php endif ?>
											
								</div><!-- /.description-container -->

								<div class="price-container info-container m-t-20">
									<div class="row">
										<div class="col-sm-12">
											<div class="price-box">
											<?php
                                                $price = $price = $product_detail["price"];
                                                $dis_price = $disprice = $product_detail["dis_price"];

                                                if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1") {
                                                    if ($this->session->userdata('is_lavel1')) {
                                                        if ($product_detail["member_discount_lv1"] > 1) {
                                                            $dis_price = $product_detail["member_discount_lv1"];
                                                        }
                                                    } else {
                                                        if ($product_detail["member_discount"] > 1) {
                                                            $dis_price = $product_detail["member_discount"];
                                                        }
                                                    }
                                                }
                                                if ($dis_price == 0) {
                                                    $dis_price =  $price;
                                                }
                                            ?>
                                            <?php if ($dis_price < $price): ?>
                                            <span class="price"  ><?php echo number_format($dis_price,2);?></span>
                                            <span class="price-strike" ><?php echo number_format($price,2);?></span>
                                            <?php else: ?>
                                            <span class="price" ><?php echo number_format($dis_price,2);?></span>
											<?php endif ?>
											
											
											</div>
										</div>
									</div><!-- /.row -->
								</div><!-- /.price-container -->
								<?php if ($product_detail['stock'] > 0): ?>
								<div class="quantity-container info-container">
									<div class="row">
										<div class="col-sm-12">
											<a href="<?php echo base_url('cart/add/'.$product_detail["id"]) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> สั่งซื้อสินค้า</a>
										</div>
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->
								<?php endif ?>
								<div class="product-social-link m-t-20 text-right">
									<span class="social-label">Share :</span>
									<div class="social-icons">
										<ul class="list-inline">
											<li><a class="fab fa-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('product/'.$product_detail['slug']); ?>"  target="_blank"></a></li>
											<li><a class="fab fa-twitter-square" href="https://twitter.com/home?status=<?php echo base_url('product/'.$product_detail['slug']) ?>" target="_blank"></a></li>
										</ul><!-- /.social-icons -->
									</div>
								</div>
							</div><!-- /.product-info -->
						</div><!-- /.col-sm-7 -->
					</div><!-- /.row -->


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
				</div><!-- /.col -->
				<div class="clearfix"></div>
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->

</div><!-- /.body-content -->