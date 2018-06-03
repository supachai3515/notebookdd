<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li class='active'>สินค้า</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs" ng-controller="products_ctrl">
	<div class='container'>
		<div class='row outer-bottom-sm'>
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
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
            <div class="clearfix filters-container m-t-10">
                <div class="row">
                    <div class="col col-sm-6 col-md-2">
                        <div class="filter-tabs">
                            <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                <li class="active">
                                    <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-list"></i>Grid</a>
                                </li>
                                <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a></li>
                            </ul>
                        </div><!-- /.filter-tabs -->
                    </div><!-- /.col -->
                    <div class="col col-sm-12 col-md-6">
                    </div><!-- /.col -->
                    <div class="col col-sm-6 col-md-4 text-right">
                        <div class="pagination-container">
                            <ul class="list-inline list-unstyled">
                                <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                <li><a href="#">1</a></li>	
                                <li class="active"><a href="#">2</a></li>	
                                <li><a href="#">3</a></li>	
                                <li><a href="#">4</a></li>	
                                <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                            </ul><!-- /.list-inline -->
                        </div><!-- /.pagination-container -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>

				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
                            <div class="category-product  inner-top-vs">
                                <div class="row">

                                    <?php $i =1; foreach ($product_list as $row): ?>
                                    <div class="col-sm-6 col-md-4 wow fadeInUp">
                                        <div class="products">
                                            <div class="product">		
                                                <div class="product-image">
                                                    <div class="image">
                                                        <?php 
                                                            $image_url="";
                                                            if($row['image'] !="") {
                                                                $image_url = $this->config->item('url_img').$row['image'];
                                                            } else {
                                                                $image_url = $this->config->item('no_url_img');
                                                            }
                                                        ?>
                                                        <a href="<?php echo $image_url;?>"><img  src="<?php echo $image_url;?>" data-echo="<?php echo $image_url;?>" alt=""></a>
                                                    </div><!-- /.image -->	
                                                    <?php if ($row['is_hot']==1): ?>
                                                        <div class="tag hot"><span>hot</span></div>
                                                    <?php endif ?>
                                                    <?php if ($row['is_promotion']==1): ?>
                                                        <div class="tag new"><span>pro</span></div>
                                                    <?php endif ?>
                                                    <?php if ($row['is_sale']==1): ?>
                                                        <div class="tag sale"><span>sale</span></div>
                                                    <?php endif ?>                		   
                                                </div><!-- /.product-image -->
                                                <p class="text-center">
                                                    <?php if ($row['stock_all'] > 0 || $row['is_add_outofstock']): ?>
                                                        <span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> มีสินค้า</span>
                                                    <?php else: ?>
                                                        <span class="label label-default">หมดชั่วคราว</span>
                                                    <?php endif ?>
                                                    
                                                </p>
                                                <div class="product-info text-left">
                                                    <h3 class="name"><a href="<?php echo base_url('product/'.$row['sku']) ?>">{{limitName('<?php echo $row['name'] ?>')}}</a></h3>
                                                    <div class="rating rateit-small"></div>
                                                    <div class="description"></div>
                                                    <div class="product-price">
                                                        <?php 
                                                            $price = $row["price"];
                                                            $disprice = 0 ;
                                                            if ($row["dis_price"] > 0) {
                                                                $disprice =$row["dis_price"];
                                                            }
                                                            if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"){
                                                                $price = $row["member_discount"];
                                                            }
                                                        ?>
                                                        <?php if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"): ?>
                                                            <?php $price  = $row["member_discount"];?>
                                                        <?php endif ?>

                                                        <?php if ($price > 1): ?>
                                                            <?php if ($row["dis_price"] > 1): ?>
                                                                <span class="price"ng-bind="<?php echo $row["dis_price"];?> | currency:'฿':0"></span><span class="price-before-discount" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></span>
                                                            <?php else: ?>
                                                                <span class="price" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></span>
                                                            <?php endif ?>
                                                        <?php else: ?>
                                                            <span class="price">ราคาสอบถาม</span>
                                                        <?php endif ?>
                                                    </div><!-- /.product-price -->
                                                </div><!-- /.product-info -->
                                                <div class="cart clearfix animate-effect">
                                                    <div class="action">
                                                        <ul class="list-unstyled text-center">
                                                            <li class="add-cart-button btn-group">
                                                                <?php if ($price >1): ?>
                                                                    <?php if ($row['stock_all'] > 0): ?>
                                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                            <i class="fa fa-shopping-cart"></i>													
                                                                        </button>
                                                                        <a class="lnk btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>">สั่งซื้อสินค้า</a>
                                                                    <?php else: ?>

                                                                        <?php if ($row['is_add_outofstock']): ?>
                                                                            <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                                <i class="fa fa-shopping-cart"></i>													
                                                                            </button>
                                                                            <a class="lnk btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>">สั่งซื้อสินค้า</a>
                                                                        <?php else: ?>
                                                                            <?php if ($row['is_reservations']): ?>
                                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                                    <i class="fa fa-shopping-cart"></i>													
                                                                                </button>
                                                                                <a class="lnk btn btn-primary" href="<?php echo base_url('cart/add_reservations/'.$row["id"]) ?>">สั่งซื้อสินค้า</a>
                                                                            <?php else: ?>
                                                                                <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                                                    <i class="fa fa-shopping-cart"></i>													
                                                                                </button>
                                                                                <button class="btn btn-primary" type="button">หมดชั่วคราว</button>
                                                                            <?php endif ?>
                                                                        <?php endif ?>
                                                                    <?php endif ?>

                                                                <?php else: ?>
                                                                    <a class="lnk btn btn-primary" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a>
                                                                <?php endif ?>                 
                                                            </li>
                                                            <!-- <li class="lnk wishlist">
                                                                <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                                        <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            </li>
                                                            <li class="lnk">
                                                                <a class="add-to-cart" href="detail.html" title="Compare">
                                                                    <i class="fa fa-retweet"></i>
                                                                </a>
                                                            </li> -->
                                                        </ul>
                                                    </div><!-- /.action -->
                                                </div><!-- /.cart -->
                                            </div><!-- /.product -->
                                        </div><!-- /.products -->
                                    </div><!-- /.item -->
                                    <?php $i++; endforeach ?>
                                </div><!-- /.row -->
                            </div><!-- /.category-product -->
                        </div><!-- /.tab-pane -->
							
						<div class="tab-pane "  id="list-container">
							<div class="category-product  inner-top-vs">
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">				
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img data-echo="assets/images/products/c1.jpg" src="assets/images/blank.gif" alt="">
                                                        </div>
                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="detail.html">Simple Products Demo Showcase</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">	
                                                            <span class="price">$650.99</span><span class="price-before-discount">$ 800</span>					
                                                        </div><!-- /.product-price -->
                                                        <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
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
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->		
                                                    </div><!-- /.product-info -->	
                                                </div><!-- /.col -->
                                            </div><!-- /.product-list-row -->
                                            <div class="tag new"><span>new</span></div>        
                                        </div><!-- /.product-list -->
                                    </div><!-- /.products -->
                                </div><!-- /.category-product-inner -->
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">				
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img data-echo="assets/images/products/c1.jpg" src="assets/images/blank.gif" alt="">
                                                        </div>
                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="detail.html">Simple Products Demo Showcase</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">	
                                                            <span class="price">$650.99</span><span class="price-before-discount">$ 800</span>					
                                                        </div><!-- /.product-price -->
                                                        <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
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
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->		
                                                    </div><!-- /.product-info -->	
                                                </div><!-- /.col -->
                                            </div><!-- /.product-list-row -->
                                            <div class="tag new"><span>new</span></div>        
                                        </div><!-- /.product-list -->
                                    </div><!-- /.products -->
                                </div><!-- /.category-product-inner -->
                                <div class="category-product-inner wow fadeInUp">
                                    <div class="products">				
                                        <div class="product-list product">
                                            <div class="row product-list-row">
                                                <div class="col col-sm-4 col-lg-4">
                                                    <div class="product-image">
                                                        <div class="image">
                                                            <img data-echo="assets/images/products/c1.jpg" src="assets/images/blank.gif" alt="">
                                                        </div>
                                                    </div><!-- /.product-image -->
                                                </div><!-- /.col -->
                                                <div class="col col-sm-8 col-lg-8">
                                                    <div class="product-info">
                                                        <h3 class="name"><a href="detail.html">Simple Products Demo Showcase</a></h3>
                                                        <div class="rating rateit-small"></div>
                                                        <div class="product-price">	
                                                            <span class="price">$650.99</span><span class="price-before-discount">$ 800</span>					
                                                        </div><!-- /.product-price -->
                                                        <div class="description m-t-10">Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget, lacinia id purus. Suspendisse posuere arcu diam, id accumsan eros pharetra ac. Nulla enim risus, facilisis bibendum gravida eget.</div>
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
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->		
                                                    </div><!-- /.product-info -->	
                                                </div><!-- /.col -->
                                            </div><!-- /.product-list-row -->
                                            <div class="tag new"><span>new</span></div>        
                                        </div><!-- /.product-list -->
                                    </div><!-- /.products -->
                                </div><!-- /.category-product-inner -->
							</div><!-- /.category-product -->
						</div><!-- /.tab-pane #list-container -->
					</div><!-- /.tab-content -->
					<div class="clearfix filters-container">
						
							<div class="text-right">
                                <div class="pagination-container">
                                    <ul class="list-inline list-unstyled">
                                        <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>	
                                        <li class="active"><a href="#">2</a></li>	
                                        <li><a href="#">3</a></li>	
                                        <li><a href="#">4</a></li>	
                                        <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul><!-- /.list-inline -->
                                </div><!-- /.pagination-container -->
						    </div><!-- /.text-right -->
						
					</div><!-- /.filters-container -->

				</div><!-- /.search-result-container -->

			</div><!-- /.col -->
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <div id="brands-carousel" class="logo-slider wow fadeInUp">

            <h3 class="section-title">Brands</h3>
            <div class="logo-slider-inner">
                <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
                    <div class="item m-t-15">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/acer-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/apple-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/asus-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/benq-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/dell-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/fujtsu-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/fujtsu-logo.png"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/hp-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/hp-logo.png"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/ibm-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/ibm-logo.png"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/lenovo-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/lenovo-logo.png"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/samsung-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/samsung-logo.png"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/sony-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/sony-logo.png"
                                alt="">
                        </a>
                    </div><!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/toshiba-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/toshiba-logo.png"
                                alt="">
                        </a>
                    </div><!--/.item-->
                </div><!-- /.owl-carousel #logo-slider -->
            </div><!-- /.logo-slider-inner -->
        </div><!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->

</div><!-- /.body-content -->