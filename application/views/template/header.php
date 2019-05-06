<!doctype html>
<html lang="th">
    <head>
        <meta charset="utf-8">  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="idth=device-width, initial-scale=1.0, user-scalable=no">
        <meta name="description" content="<?php echo $header['description'];?>">
        <meta name="keyword" content="<?php echo $header['keyword'];?>" /> 
        <meta name="author" content="<?php echo $header['author'];?>">
	    <meta name="robots" content="all">
        <meta name="msapplication-TileImage" content="<?php echo base_url();?>/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-270x270.jpg" />    
        <title><?php echo $header['title']; ?></title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-32x32.jpg">
        <link rel="icon" href="<?php echo base_url();?>/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-32x32.jpg" sizes="32x32" />
        <link rel="icon" href="<?php echo base_url();?>/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-192x192.jpg" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-180x180.jpg" />

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/main.css">
	    <link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/green.css">
	    <link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/owl.carousel.css">
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/owl.transitions.css">

		<!-- loading bar -->
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/loading-bar.css">

		<!-- sweetalert2 -->
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/sweetalert2.css">

		<!-- lity -->
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/lity.min.css">
		
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="<?php echo base_url('theme_unicase');?>/assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/animate.min.css">
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/rateit.css">
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/bootstrap-select.min.css">
		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="<?php echo base_url('theme_unicase');?>/assets/css/font-awesome.min.css">
		<link href="<?php echo base_url('theme_unicase');?>/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

		<script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-76815962-1', 'auto');
          ga('send', 'pageview');

        </script>

	</head>
    <body ng-app="myApp" ng-controller="mainCtrl" class="cnt-home">

	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">

		<!-- ============================================== TOP MENU ============================================== -->
		<div class="top-bar animate-dropdown">
			<div class="container">
				<div class="header-top-inner">
					<div class="cnt-account">
                        <ul class="list-unstyled">
							<li><a href="<?php echo base_url('dealer')?>"><i class="icon fa fa-user"></i> บัญชีผู้ใช้</a></li>
						 
							<li><a href="<?php echo base_url('cart') ?>"><i class="icon fa fa-shopping-cart"></i> ตะกร้าสินค้า</a></li>
							<li><a href="<?php echo base_url('payment');?>"><i class="icon fa fa-money"></i> แจ้งชำระเงิน</a></li>
							<?php if (!$this->session->userdata('is_logged_in')): ?>
							    <li><a href="<?php echo base_url('dealer')?>"><i class="fas fa-sign-out-alt"></i> เข้าสู่ระบบ</a></li>
							<?php else: ?>
							    <li><a href="<?php echo base_url('dealer/logout')?>"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a></li>
							<?php endif ?>
						</ul>
					</div><!-- /.cnt-account -->

					<div class="cnt-block">
						<ul class="list-unstyled list-inline">
                        <li><a href="http://line.me/ti/p/%40zlg9137d" target="_blank"><i class="icon fab fa-line"></i> : @notebookdd</a></li>
						</ul><!-- /.list-unstyled -->
					</div><!-- /.cnt-cart -->
					<div class="clearfix"></div>
				</div><!-- /.header-top-inner -->
			</div><!-- /.container -->
		</div><!-- /.header-top -->
		<!-- ============================================== TOP MENU : END ============================================== -->
		<div class="main-header">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
						<!-- ============================================================= LOGO ============================================================= -->
						<div class="logo">
							<a href="home.html">

                            <a href="<?php echo base_url()?>">
								<img src="<?php echo base_url('theme_unicase')?>/assets/images/NBDD_LOGO.jpg" style="max-width: 181px;">
							</a>

							</a>
						</div><!-- /.logo -->
						<!-- ============================================================= LOGO : END ============================================================= -->
					</div><!-- /.logo-holder -->
				 
					<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
						<div class="contact-row">
							<div class="phone inline">
                            <a class="pull-right" href="http://line.me/ti/p/%40zlg9137d" target="_blank">
									<i class="icon fab fa-line"></i> @notebookdd
								</a>
							</div>
							<div class="contact inline">
								<a href="https://www.facebook.com/notebooksimple/" target="_blank">
									<i class="icon fab fa-facebook"></i> facebook
								</a>
								 
							</div>
						</div><!-- /.contact-row -->
						<!-- ============================================================= SEARCH AREA ============================================================= -->
						<div class="search-area">
                        <form role="search" action="<?php echo base_url('search')?>" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ค้นหาสินค้า" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
						</div><!-- /.search-area -->
						<!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div><!-- /.top-search-holder -->
                    

					<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
						<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

						<div class="dropdown dropdown-cart">
							<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
								<div class="items-cart-inner">
									<div class="total-price-basket">
                                    <?php 
                                        $productResult = array();
                                        $productResult  = $this->initdata_model->get_cart_data();
                                        $sumItems = 0;
                                        foreach ($productResult  as $r) {
                                            $sumItems = $sumItems + $r['qty'];
                                        }
                                     ?>
										<span class="lbl">ตะกร้าสินค้า -</span>
										<span class="total-price">
											<span class="value"><?php echo $this->cart->format_number($this->cart->total()); ?></span>
										</span>
									</div>
									<div class="basket">
										<i class="glyphicon glyphicon-shopping-cart"></i>
									</div>
									<div class="basket-item-count"><span class="count"><?php echo $sumItems; ?></span></div>

								</div>
                            </a>
                            <?php if ($this->cart->contents()): ?>
							<ul class="dropdown-menu">
								<li>
									<div class="cart-item product-summary">

                                    <?php $i = 1; ?>
                                            <?php foreach($this->cart->contents() as $items): ?>
                                                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                                                <?php foreach ($productResult as $row): ?>
                                                    <?php if ($row['rowid']== $items['rowid']): ?>

                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="image">
																<a href="<?php echo base_url('product/'.$row['slug']) ?>">
																<img src="<?php echo $row['img']; ?>" class="img-responsive" alt="">
															</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-7">
                                                            <h3 class="name"><a href="<?php echo base_url('product/'.$row['slug']) ?>"><span  ng-bind="item.name"></span></a></h3>
                                                            <div class="price"><?php echo $row['price'] ?> </div>
                                                        </div>
                                                        <div class="col-xs-1 action">
                                                            <a href="<?php echo base_url('cart/delete/'.$row['rowid']) ?>"><i class="fa fa-trash"></i></a>
                                                        </div>
                                                    </div>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
									</div><!-- /.cart-item -->
									<div class="clearfix"></div>
									<hr>

									<div class="clearfix cart-total">
										<div class="pull-right">

											<span class="text">รวม :</span><span class='price'><?php echo $this->cart->format_number($this->cart->total()); ?></span>

										</div>
										<div class="clearfix"></div>

										<a href="<?php echo base_url('checkout') ?>"
											class="btn btn-upper btn-primary btn-block m-t-20">ยันยันการสั่งซื้อ</a>
									</div><!-- /.cart-total-->


								</li>
                            </ul><!-- /.dropdown-menu-->
                            <?php endif ?>
						</div><!-- /.dropdown-cart -->

						<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->
					</div><!-- /.top-cart-row -->
				</div><!-- /.row -->

			</div><!-- /.container -->

		</div><!-- /.main-header -->

		<!-- ============================================== NAVBAR ============================================== -->
		<div class="header-nav animate-dropdown">
			<div class="container">
				<div class="yamm navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="nav-bg-class">
						<div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
							<div class="nav-outer">
								<ul class="nav navbar-nav">
									<li><a href="<?php echo base_url()?>">Home</a></li>
									<li class="dropdown yamm">
										<a href="#" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">หมวดหมู่สินค้า<span class="menu-label new-menu hidden-xs">new</span></a>
										<ul class="dropdown-menu">
											<li>
												<div class="yamm-content">
													<div class="row">
														<div class='col-sm-12'>
															<div class="col-xs-12 col-sm-12 col-md-12">
																<ul class="links">
																	<?php foreach ($menu_type as $value): ?>
																	<li><a href="<?php echo base_url('products/category/'.$value['slug']) ?>"><?php echo $value['name'] ?></a></li>
																	<?php endforeach ?>
																</ul>
															</div><!-- /.col -->
														</div>
													</div><!-- /.row -->
												</div><!-- /.yamm-content -->
											</li>
										</ul>
									</li>
									<li class="dropdown"><a href="<?php echo base_url('products')?>">สินค้า</a></li>
									<li class="dropdown yamm">
										<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">บริการ
											<span style="display: none;" class="menu-label hot-menu hidden-xs">hot</span>
										</a>
										<ul class="dropdown-menu pages">
											<li>
												<div class="yamm-content">
													<div class="row">
														<div class='col-xs-12 col-sm-12 col-md-12'>
															<ul class='links'>
																<li>
																	<a href="<?php echo base_url('tracking')?>"> tracking</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</li>
									<li class="dropdown yamm">
										<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">ความช่วยเหลือ</a>
										<ul class="dropdown-menu pages">
											<li>
												<div class="yamm-content">
													<div class="row">
														<div class='col-xs-12 col-sm-12 col-md-12'>
															<ul class='links'>
															 
																<li><a href="<?php echo base_url('warranty')?>">เงื่อนไขการรับประกัน</a></li>
																<li><a href="<?php echo base_url('howtobuy')?>">วิธีการสั่งซื้อ</a></li>
																<li><a href="<?php echo base_url('download')?>">ดาวน์โหลดเอกสาร</a></li>
															</ul>
														</div>
													</div>
												</div>
											</li>
										</ul>
									</li>
									<li class="dropdown"><a href="<?php echo base_url('contact')?>">ติดต่อเรา</a></li>
								</ul><!-- /.navbar-nav -->
								<div class="clearfix"></div>
							</div><!-- /.nav-outer -->
						</div><!-- /.navbar-collapse -->
					</div><!-- /.nav-bg-class -->
				</div><!-- /.navbar-default -->
			</div><!-- /.container-class -->
		</div><!-- /.header-nav -->
		<!-- ============================================== NAVBAR : END ============================================== -->

	</header>