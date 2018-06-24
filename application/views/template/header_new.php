<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">
        <meta name="msapplication-TileImage" content="http://www.notebookdd.com/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-270x270.jpg" />    
        <title><?php echo $header['title']; ?></title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="http://www.notebookdd.com/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-32x32.jpg">
        <link rel="icon" href="http://www.notebookdd.com/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-32x32.jpg" sizes="32x32" />
        <link rel="icon" href="http://www.notebookdd.com/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-192x192.jpg" sizes="192x192" />
        <link rel="apple-touch-icon-precomposed" href="http://www.notebookdd.com/content/wp-content/uploads/2016/04/cropped-NBDD_LOGO_4-180x180.jpg" />

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
<body class="cnt-home" ng-app="mainApp" ng-controller="mainCtrl">

	<!-- ============================================== HEADER ============================================== -->
	<header class="header-style-1">

		<!-- ============================================== TOP MENU ============================================== -->
		<div class="top-bar animate-dropdown">
			<div class="container">
				<div class="header-top-inner">
					<div class="cnt-account">
						<ul class="list-unstyled">
							<li><a href="<?php echo base_url('account')?>"><i class="icon fa fa-user"></i>บัญชีผู้ใช้</a></li>
							<!-- <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li> -->
							<li><a href="#"><i class="icon fa fa-shopping-cart"></i>ตะกร้าสินค้า</a></li>
							<li><a href="<?php echo base_url('payment');?>"><i class="icon fa fa-money"></i>แจ้งชำระเงิน</a></li>
							<?php if (!$this->session->userdata('is_logged_in')): ?>
							<li><a href="<?php echo base_url('account')?>"><i class="icon fa fa-sign-in"></i>เข้าสู่ระบบ</a></li>
							<?php else: ?>
							<li><a href="<?php echo base_url('logout')?>"><i class="icon fa fa-sign-out"></i>ออกจากระบบ</a></li>
							<?php endif ?>
						</ul>
					</div>
					<!-- /.cnt-account -->

					<div class="cnt-block" style="display: none;">
						<ul class="list-unstyled list-inline">
							<li class="dropdown dropdown-small">
								<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
									<span class="key">currency :</span>
									<span class="value">USD </span>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">USD</a>
									</li>
									<li>
										<a href="#">INR</a>
									</li>
									<li>
										<a href="#">GBP</a>
									</li>
								</ul>
							</li>

							<li class="dropdown dropdown-small">
								<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
									<span class="key">language :</span>
									<span class="value">English </span>
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li>
										<a href="#">English</a>
									</li>
									<li>
										<a href="#">French</a>
									</li>
									<li>
										<a href="#">German</a>
									</li>
								</ul>
							</li>
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
							<a href="<?php echo base_url()?>">
								<img src="<?php echo base_url('theme_unicase')?>/assets/images/NBDD_LOGO.jpg" style="max-width: 181px;">
							</a>
						</div><!-- /.logo -->
						<!-- ============================================================= LOGO : END ============================================================= -->
					</div><!-- /.logo-holder -->

					<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
						<div class="contact-row">
							<div class="phone inline">
								<i class="icon fa fa-phone"></i> 061 4788 949
							</div>
							<div class="contact inline">
								<a href="mailto:simpleitnotebook@gmail.com">
									<i class="icon fa fa-envelope"></i> simpleitnotebook@gmail.com</a>
							</div>
							<div class="line inline">
								<a class="pull-right" href="http://line.me/ti/p/%40zlg9137d" target="_blank">
									<i class="icon fa fa-comments"></i> line : @notebookdd</a>
							</div>
						</div><!-- /.contact-row -->
						<!-- ============================================================= SEARCH AREA ============================================================= -->
						<div class="search-area">
							<form role="search" action="<?php echo base_url('search')?>" method="GET">
								<div class="control-group">
									<ul class="categories-filter animate-dropdown">
										<li class="dropdown">
											<a class="dropdown-toggle" data-toggle="dropdown" href="category.html">Categories
												<b class="caret"></b>
											</a>
											<ul class="dropdown-menu" role="menu">
												<li class="menu-header">Computer</li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="category.html">- Laptops</a>
												</li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="category.html">- Tv & audio</a>
												</li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="category.html">- Gadgets</a>
												</li>
												<li role="presentation">
													<a role="menuitem" tabindex="-1" href="category.html">- Cameras</a>
												</li>

											</ul>
										</li>
									</ul>
										<input type="text" class="search-field" placeholder="ค้นหา" name="search">
										<button type="submit"  class="search-button"></button>
								</div>
							</form>
						</div><!-- /.search-area -->
						<!-- ============================================================= SEARCH AREA : END ============================================================= -->
					</div><!-- /.top-search-holder -->

					<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row" ng-controller="header_cart_ctrl">
						<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

						<div class="dropdown dropdown-cart">
							<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
								<div class="items-cart-inner">
									<div class="total-price-basket">
										<span class="lbl">cart -</span>
										<span class="total-price">
											<span class="value">{{sumTotal() | currency:'฿':0}}</span>
										</span>
									</div>
									<div class="basket"><i class="glyphicon glyphicon-shopping-cart"></i></div>
									<div class="basket-item-count">
										<span class="count" ng-bind="sumItems()"></span>
									</div>
								</div>
							</a>
							<ul class="dropdown-menu">
								<li>
									<div ng-if="sumTotal() > 0 ">
										<div class="cart-item product-summary">
											<div class="row" ng-repeat="item in productItems" ng-if="item.price != '0'">
												<div class="col-xs-4">
													<div class="image">
														<a href="<?php echo base_url('product/'.'{{item.sku}}') ?>">
															<img src="{{item.img}}" alt="" style="width: 100%;">
														</a>
													</div>
												</div>
												<div class="col-xs-7">
													<h3 class="name">
														<a href="<?php echo base_url('product/'.'{{item.sku}}') ?>" title="{{item.name}}">{{limitProductName(item.name)}}</a>
													</h3>
													<div class="price">{{item.price | currency:'฿':0}}</div>
												</div>
												<div class="col-xs-1 action">
													<a href="" ng-click="deleteProduct_click(item.rowid)"><i class="fa fa-trash"></i></a>
												</div>
											</div>
										</div><!-- /.cart-item -->
										<div class="clearfix"></div>
										<hr>
										<div class="clearfix cart-total">
											<div class="pull-right">
												<span class="text">ยอดรวมทั้งสิ้น :</span>
												<span class='price'>{{sumTotal() | currency:'฿':0}}</span>
											</div>
											<div class="clearfix"></div>
											<a href="<?php echo base_url('cart') ?>" class="btn btn-upper btn-primary btn-block m-t-20">ตะกร้าสินค้า</a>
											<a href="<?php echo base_url('checkout') ?>" class="btn btn-upper btn-primary btn-block m-t-20">ดำเนินการชำระเงิน</a>
										</div><!-- /.cart-total-->
									</div>
									<div ng-if="sumTotal() < 1 ">
										<p class="text-center">ยังไม่ได้เลือกสินค้า</p>
									</div>
								</li>
							</ul><!-- /.dropdown-menu-->
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
																	<li><a href="<?php echo base_url('products/category/'.$value['name']) ?>"><?php echo $value['name'] ?></a></li>
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
																	<a href="#">งานซ่อม</a>
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

	<!-- ============================================== HEADER : END ============================================== -->