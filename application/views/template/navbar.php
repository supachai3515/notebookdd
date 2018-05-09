<div class="offcanvas-overlay"></div>
<header class="header-container header-type-classic header-navbar-classic header-scroll-resize">
    <div class="topbar">
        <div class="container topbar-wap">
            <div class="row">
                <div class="col-sm-6 col-left-topbar">
                    <div class="left-topbar">
                        <i class="fa fa-comment"> line : mainboardsimple</i>
                    </div>
                </div>
                <div class="col-sm-6 col-right-topbar">
                    <div class="right-topbar">
                        <div class="user-login">
                            <ul class="nav top-nav">
                                <li><a href="https://www.facebook.com/noteboodd/" target="_blank"><i class="fa fa-facebook-official"> notebookDD</i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-container">
        <div class="navbar navbar-default navbar-scroll-fixed">
            <div class="navbar-default-wrap">
                <div class="container">
                    <div class="row">
                        <div class="navbar-default-col">
                            <div class="navbar-wrap">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar bar-top"></span>
                                        <span class="icon-bar bar-middle"></span>
                                        <span class="icon-bar bar-bottom"></span>
                                    </button>
                                    <a class="navbar-search-button search-icon-mobile" href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a class="cart-icon-mobile" href="<?php echo base_url('cart');?>">
                                        <i class="elegant_icon_bag"></i><span ng-bind="sumItems()"></span>
                                    </a>
                                    <a class="navbar-brand" href="<?php echo base_url()?>">
                                                <img class="logo" alt="WOOW" src="<?php echo base_url('theme/');?>/images/logo.png">
                                                <img class="logo-fixed" alt="WOOW" src="<?php echo base_url('theme/');?>/images/logo-fixed.png">
                                                <img class="logo-mobile" alt="WOOW" src="<?php echo base_url('theme/');?>/images/logo-mobile.png">
                                            </a>
                                </div>
                                <nav class="collapse navbar-collapse primary-navbar-collapse">
                                    <ul class="nav navbar-nav primary-nav">
                                        <li><a href="<?php echo base_url()?>"><span class="underline">Home</span></a></li>
                                        <li class="menu-item-has-children dropdown">
                                            <a href="<?php echo base_url('products')?>" class="dropdown-hover">
                                                <span class="underline">ร้านค้า</span> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php echo base_url('products')?>">ร้านค้า</a></li>
                                                <li><a href="<?php echo base_url('howtobuy')?>"><i class="fa fa-shopping-bag"></i> วิธีการสั่งซื้อ</a></li>
                                                        <li><a href="<?php echo base_url('payment')?>"><i class="fa fa-money"></i> แจ้งชำระเงิน</a></li>
                                                        <li><a href="<?php echo base_url('tracking')?>"><i class="fa fa-truck"></i> tracking</a></li>
                                            </ul>
                                        </li>
                                        <!--
                                        <li class="menu-item-has-children megamenu megamenu-fullwidth dropdown">
                                            <a href="<?php echo base_url('products')?>" class="dropdown-hover">
                                                <span class="underline">ร้านค้า</span> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li class="mega-col-3">
                                                    <h3 class="megamenu-title">หมวดหมู่สินค้า <span class="caret"></span></h3>
                                                    <ul class="dropdown-menu">                            
                                                         <?php $i = 1 ;  foreach ($menu_type as $value): ?>
                                                            <?php if ($i <= 10): ?>
                                                                <li><a href="<?php echo base_url('products/category/'.$value['name']) ?>"><?php echo $value['name'] ?> (<?php echo $value['count_product'] ?>)</a></li>
                                                            <?php  endif ?>
                                                        <?php $i++;  endforeach ?>
                                                    </ul>
                                                </li>
                                                <?php if (count($menu_type) > 10): ?>

                                                <li class="mega-col-3">
                                                    <h3 class="megamenu-title">หมวดหมู่สินค้า <span class="caret"></span></h3>
                                                    <ul class="dropdown-menu">                            
                                                        <?php $i = 1 ;  foreach ($menu_type as $value): ?>
                                                            <?php if ($i > 10): ?>
                                                                <li><a href="<?php echo base_url('products/category/'.$value['name']) ?>"><?php echo $value['name'] ?> (<?php echo $value['count_product'] ?>)</a></li>
                                                            <?php  endif ?>
                                                        <?php $i++;  endforeach ?>
                                                    </ul>
                                                </li>
                                                <?php endif ?>

                                                <li class="mega-col-3">
                                                    <h3 class="megamenu-title">Brands <span class="caret"></span></h3>
                                                    <ul class="dropdown-menu">
                                                    <?php foreach ($menu_brands as $value): ?>
                                                        <li><a href="<?php echo base_url('products/brand/'.$value['name']) ?>"><?php echo $value['name'] ?> (<?php echo $value['count_product'] ?>)</a></li>
                                                    <?php endforeach ?>
                                                    </ul>
                                                </li>
                                                <li class="mega-col-3">
                                                    <h3 class="megamenu-title">Features <span class="caret"></span></h3>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="<?php echo base_url('howtobuy')?>"><i class="fa fa-shopping-bag"></i> วิธีการสั่งซื้อ</a></li>
                                                        <li><a href="<?php echo base_url('payment')?>"><i class="fa fa-money"></i> แจ้งชำระเงิน</a></li>
                                                        <li><a href="<?php echo base_url('tracking')?>"><i class="fa fa-truck"></i> tracking</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                        -->
                                        <li><a href="<?php echo base_url('dealer')?>"><span class="underline">Dealer</span></a></li>
                                        <li class="menu-item-has-children dropdown">
                                            <a href="#" class="dropdown-hover">
                                                <span class="underline">บริการ</span> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="blog-default.html">Blog</a></li>
                                                <li><a href="blog-center.html">Dowload</a></li>
                                                <li><a href="blog-masonry.html">แจ้งงานซ่อม</a></li>
                                                <li><a href="blog-masonry.html">เงื่อนไขการรับประกัน</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children dropdown">
                                            <a href="#" class="dropdown-hover">
                                                <span class="underline">ติดต่อเรา</span> <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="about-us.html">เกี่ยวกับเรา</a></li>
                                                <li><a href="contact-us.html">ติดต่อ</a></li>
                                                <li><a href="faq.html">ถามตอบ</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="header-right">
                                    <div class="navbar-search">
                                        <a class="navbar-search-button" href="#">
                                            <i class="fa fa-search"></i>
                                        </a>
                                        <div class="search-form-wrap show-popup hide"></div>
                                    </div>
                                    <div class="navbar-minicart navbar-minicart-topbar">
                                        <div class="navbar-minicart">
                                            <a class="minicart-link cart_anchor" href="#">
                                                <span class="minicart-icon">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            <span ng-bind="sumItems()"></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-search-overlay hide">
                <div class="container">
                    <div class="header-search-overlay-wrap">

                        <form action="<?php echo base_url('search')?>" method="GET" role="form" class="searchform">
                            <input type="search" class="searchinput" name="search" autocomplete="off" value="" placeholder="ค้นหา..." />
                        </form>
                        <button type="button" class="close">
                            <span aria-hidden="true" class="fa fa-times"></span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>