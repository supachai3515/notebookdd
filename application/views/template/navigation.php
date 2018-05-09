<div class="offcanvas open">
    <div class="offcanvas-wrap">
        <div class="offcanvas-user clearfix">
            <a class="offcanvas-user-wishlist-link" href="<?php echo base_url('products')?>">
                สินค้า
            </a>
            <a class="offcanvas-user-account-link" href="<?php echo base_url()?>">
                <i class="fa fa-user"></i> Dealer
            </a>
        </div>
        <nav class="offcanvas-navbar">
            <ul class="offcanvas-nav">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class="menu-item-has-children dropdown">
                    <a href="shop.html" class="dropdown-hover">ร้านค้า <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class="menu-item-has-children dropdown-submenu">
                            <a href="#">หมวดหมู่สินค้า <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <?php foreach ($menu_type as $value): ?>
                                <li><a href="<?php echo base_url('products/category/'.$value['name']) ?>"><?php echo $value['name'] ?></a></li>
                            <?php endforeach ?>
                            </ul>
                        </li>
                        <li class="menu-item-has-children dropdown-submenu">
                            <a href="#">Brands <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                            <?php foreach ($menu_brands as $value): ?>
                                <li><a href="<?php echo base_url('products/brand/'.$value['name']) ?>"><?php echo $value['name'] ?></a></li>
                            <?php endforeach ?>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url('howtobuy')?>"><i class="fa fa-shopping-bag"></i> วิธีการสั่งซื้อ</a></li>
                        <li><a href="<?php echo base_url('payment')?>"><i class="fa fa-money"></i> แจ้งชำระเงิน</a></li>
                        <li><a href="<?php echo base_url('tracking')?>"><i class="fa fa-truck"></i> tracking</a></li>

                    </ul>
                </li>
                <li><a href="<?php echo base_url('dealer')?>">Dealer</a></li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-hover">บริการ <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="blog-default.html">Blog</a></li>
                        <li><a href="blog-center.html">Dowload</a></li>
                        <li><a href="blog-masonry.html">แจ้งงานซ่อม</a></li>
                        <li><a href="blog-masonry.html">เงื่อนไขการรับประกัน</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-hover">ติดต่อเรา <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="about-us.html">เกี่ยวกับเรา</a></li>
                        <li><a href="contact-us.html">ติดต่อ</a></li>
                        <li><a href="faq.html">ถามตอบ</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<div id="wrapper" class="wide-wrap">