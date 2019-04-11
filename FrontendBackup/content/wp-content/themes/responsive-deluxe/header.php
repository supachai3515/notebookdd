<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/font-linearicons.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/jquery.fancybox.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/owl.carousel.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/owl.transitions.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/owl.theme.css" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/theme.css" media="all" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/responsive.css" media="all" />
    <!-- Add fancyBox Css-->
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/fancyBox/source/jquery.fancybox.css?v=2.1.5" media="screen" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/fancyBox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/fancyBox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
    <link rel="stylesheet" type="text/css" href="http://www.notebookdd.com/theme/css/style.css" media="all" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-76815962-1', 'auto');
    ga('send', 'pageview');
    </script>
</head>

<body <?php body_class(); ?> ng-app="myApp" ng-controller="mainCtrl">
    <div class="top-header">
        <div class="container">
            <p>
                <a class="pull-left" href="http://www.notebookdd.com/contact"><i class="fa fa-phone"></i> 089 507 2023</a>
                <a class="pull-right" href="http://line.me/ti/p/%40zlg9137d" target="_blank"><i class="fa fa-comment"></i> line : @notebookdd</a>
            </p>
        </div>
    </div>
    <div class="wrap">
        <div id="header">
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="logo logo-header">
                                <a href="http://www.notebookdd.com/"><img src="http://www.notebookdd.com/theme/images/NBDD_LOGO.jpg" class="img-responsive" alt="Image" style="max-width: 150px;"></a>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <div class="info-header">
                                <ul class="info-total">
                                    <li class="info-user">
                                        <a href="" class="info-icon icon-user"><span class="lnr lnr-user"></span></a>
                                        <ul class="list-unstyled inner-user-info">
                                            <li><a href="http://www.notebookdd.com/dealer"><span class="lnr lnr-user"></span> Dealer</a></li>
                                        </ul>
                                    </li>
                                    <li class="info-cart">
                                        <a href="" class="info-icon icon-cart"><span class="lnr lnr-cart"></span> <sup><span ng-bind="sumItems()"></span></sup></a>
                                        <div ng-if="sumTotal() > 0 ">
                                            <div class="inner-cart-info">
                                                <h2><span ng-bind="sumItems()"></span> items</h2>
                                                <ul class="info-list-cart">
                                                    <li class="item-info-cart" ng-repeat="item in productItems" ng-if="item.price != '0'">
                                                        <div class="cart-thumb">
                                                            <a href="http://www.notebookdd.com/product/{{item.sku}}">
                                                                <img src="{{item.img}}" alt="" />
                                                            </a>
                                                        </div>
                                                        <div class="wrap-cart-title">
                                                            <h3 class="cart-title"><a href="http://www.notebookdd.com/product/{{item.sku}}"  ng-bind="item.name"></a></h3>
                                                            <div class="cart-qty">
                                                                <label>Qty:</label> <span ng-bind="item.quantity"></span></div>
                                                        </div>
                                                        <div class="wrap-cart-remove">
                                                            <a href="" ng-click="deleteProduct_click(item.rowid)" class="remove-product"></a>
                                                            <span class="cart-price">$23.00</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="total-cart">
                                                    <label>Subtotal</label> <span ng-bind="sumTotal() | currency:'฿':0"></span>
                                                </div>
                                                <div class="link-cart">
                                                    <a href="http://www.notebookdd.com/cart" class="cart-edit">edit cart</a>
                                                    <a href="http://www.notebookdd.com/checkout" class="cart-checkout">checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div ng-if="sumTotal() < 1 ">
                                            <div class="inner-cart-info">
                                                <p class="text-center text-info">ยังไม่ได้เลือกสินค้า</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="clearfix">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <hr/>
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            <div class="main-nav">
                                <ul class="main-menu">
                                    <li><a href="http://www.notebookdd.com/">Home</a></li>
                                    <li class="menu-item-has-childrent">
                                        <a href="http://www.notebookdd.com/products">notebookDD <span class="caret"></span></a>
                                        <ul class="sub-menu sub-menu-col-2">
                                            <li><a href="http://www.notebookdd.com/products"><i class="fa fa-laptop"></i> ร้านค้า</a></li>
                                            <li><a href="http://www.notebookdd.com/howtobuy"><i class="fa fa-shopping-bag"></i> วิธีการสั่งซื้อ</a></li>
                                            <li><a href="http://www.notebookdd.com/payment"><i class="fa fa-money"></i> แจ้งชำระเงิน</a></li>
                                            <li><a href="http://www.notebookdd.com/tracking"><i class="fa fa-truck"></i> tracking</a></li>
                                            <li><a href="http://www.notebookdd.com/warranty">เงื่อนไขการรับประกัน</a></li>
                                            <li><a href="http://www.notebookdd.com/download">Dowload เอกสาร</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-childrent">
                                        <a href="http://www.notebookdd.com/products">หมวดหมู่สินค้า <span class="caret"></span><sup class="title-new">New</sup></a>
                                        <ul class="sub-menu">
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Adapter อะแด็ปเตอร์">Adapter อะแด็ปเตอร์</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Battery แบตเตอรี่ โน๊ตบุ๊ค">Battery แบตเตอรี่ โน๊ตบุ๊ค</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Body Notebook กรอบ บอดี้ โน๊ตบุ๊ค">Body Notebook กรอบ บอดี้ โน๊ตบุ๊ค</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/CPU ซีพียู">CPU ซีพียู</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Fan พัดลมโน๊ตบุ๊ค">Fan พัดลมโน๊ตบุ๊ค</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/HARDDISK DRIVE">HARDDISK DRIVE</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Keybroad NB คีบอร์ดโน๊ตบุ๊ค">Keybroad NB คีบอร์ดโน๊ตบุ๊ค</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Notebook">Notebook</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Optical Drive">Optical Drive</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Ram">Ram</a></li>
                                                                                    <li><a href="http://www.notebookdd.com/products/category/Screen Panel จอโน๊ตบุ๊ค">Screen Panel จอโน๊ตบุ๊ค</a></li>
                                                                                </ul>
                                    </li>
                                    <li class="menu-item-has-childrent">
                                        <a href="http://www.notebookdd.com/content">service & support <span class="caret"></span></a>
                                        <ul class="sub-menu sub-menu-col-2">
                                            <li><a href="http://www.notebookdd.com/content/category/repair"><i class="fa fa-wrench" aria-hidden="true"></i> ซ่อมเครื่อง</a></li>
                                            <li>
                                            <a href="http://www.notebookdd.com/download"><i class="fa fa-cloud-download" aria-hidden="true"></i> ดาวน์โหลด</a></li>
                                            <li><a href="http://www.notebookdd.com/content/category/tip-trick"><i class="fa fa-question-circle" aria-hidden="true"></i> Tip & Trick</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="http://www.notebookdd.com/contact">ติดต่อเรา</a></li>
                                </ul>
                                <div class="mobile-menu">
                                    <a href="#" class="show-menu"><span class="lnr lnr-indent-decrease"></span></a>
                                    <a href="#" class="hide-menu"><span class="lnr lnr-indent-increase"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <form class="navbar-form" role="search" action="http://www.notebookdd.com/search" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ค้นหาสินค้า" name="search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->
        <div class="container">
            <div class="row">
