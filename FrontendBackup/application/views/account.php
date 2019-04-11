<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'>บัญชีผู้ใช้</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd" ng-controller="account_ctrl">
    <div class="container">
        <div class='row single-product outer-bottom-sm '>
            <div class='col-md-3 sidebar'>
                <div class="sidebar-module-container">
                    <!-- ==============================================CATEGORY============================================== -->
                    <div class="sidebar-widget tab outer-bottom-xs wow fadeInUp">
                        <h3 class="section-title">บัญชีผู้ใช้</h3>
                        <div class="sidebar-widget-body m-t-10">
                            <div class="tab-heading">
                                <a data-toggle="tab" href="#general">ทั่วไป</a>
                            </div>
                            <div class="tab-heading">
                                <a href="<?php echo base_url('payment');?>">แจ้งชำระเงิน</a>
                            </div>
                            <div class="tab-heading">
                                <a data-toggle="tab" href="#purchase_order">ใบสั่งซื้อย้อนหลัง</a>
                            </div>
                            <div class="tab-heading">
                                <a href="<?php echo base_url('tracking')?>">ติดตามการจัดส่ง</a>
                            </div>
                            <div class="tab-heading">
                                <a data-toggle="tab" href="#edit_profile">แก้ไขข้อมูลส่วนตัว</a>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                </div>
            </div>
            <!-- /.sidebar -->
            <div class='col-md-9'>
                <div class="row  wow fadeInUp">
                    <div class="col-xs-12 col-sm-12 col-md-12 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

                            <div class="tab-content">
                                <div id="general" class="tab-pane in active">
                                    <h3 style="margin-top: 0;">ทั่วไป</h3>
                                    <div class="register-form outer-top-xs" role="form">
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">ชื่อ</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.first_name}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">นามสกุล</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.last_name}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">Email</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.email}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">โทรศัพท์บ้านหรือ Fax</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.tel || '-'}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">เบอร์มือถึอ</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.mobile}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">ที่อยู่สำหรับส่งสินค้า</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.address_receipt}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">ชื่อและที่อยู่สำหรับออกใบกำกับภาษี</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.address_tax}}</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="info-title col-xs-12 col-sm-12 col-md-4">เลขประจำตัวผู้เสียภาษี</label>
                                            <div class="info-title col-xs-12 col-sm-12 col-md-4"><span>{{accData.tax_number}}</span></div>
                                        </div>
                                    </div>		
                                </div>
                                <div id="purchase_order" class="tab-pane">
                                    <h3 style="margin-top: 0;">ใบสั่งซื้อย้อนหลัง</h3>
                                </div>
                                <div id="edit_profile" class="tab-pane">
                                    <h3 style="margin-top: 0;">แก้ไขข้อมูลส่วนตัว</h3>
                                    <form class="outer-top-xs" role="form" ng-submit="saveEditAccount()">
                                        <div class="form-group">
                                            <label class="info-title" for="first_name">ชื่อ
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.first_name" type="text" class="form-control unicase-form-control text-input" id="first_name" name="first_name" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="last_name">นามสกุล
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.last_name" type="text" class="form-control unicase-form-control text-input" id="last_name" name="last_name" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="Email">Email / ใช้เป็น Username ถ้าแก้ไข username จะเปลี่ยนตาม
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.email" type="email" class="form-control unicase-form-control text-input" id="Email" name="Email" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="password">Password
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.password" type="password" class="form-control unicase-form-control text-input" id="password" name="password" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="tel">โทรศัพท์บ้านหรือ Fax
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.tel" type="text" class="form-control unicase-form-control text-input" id="tel" name="tel" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="mobile">เบอร์มือถึอ
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.mobile" type="text" class="form-control unicase-form-control text-input" id="mobile" name="mobile" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="address_receipt">ที่อยู่สำหรับส่งสินค้า
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.address_receipt" type="text" class="form-control unicase-form-control text-input" id="address_receipt" name="address_receipt" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="address_tax">ชื่อและที่อยู่สำหรับออกใบกำกับภาษี
                                                <span>*</span>
                                            </label>
                                            <textarea ng-model="accData.address_tax" class="form-control" id="address_tax" name="address_tax" placeholder="ชื่อและที่อยู่สำหรับออกใบกำกับภาษี"> </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="info-title" for="tax_number">เลขประจำตัวผู้เสียภาษี
                                                <span>*</span>
                                            </label>
                                            <input ng-model="accData.tax_number" type="text" class="form-control unicase-form-control text-input" id="tax_number" name="tax_number" placeholder="Email" required>
                                        </div>
                                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">บันทึก</button>
                                    </form>	
                                </div>
                            </div>

                        </div><!-- /.single-product-gallery -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.col -->
            <div class="clearfix"></div>
        </div>
        <!-- /.row -->
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
                    </div>
                    <!--/.item-->

                    <div class="item m-t-10">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/apple-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/asus-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/benq-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/dell-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/fujtsu-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/fujtsu-logo.png"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/hp-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/hp-logo.png"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/ibm-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/ibm-logo.png"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/lenovo-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/lenovo-logo.png"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->

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
                    </div>
                    <!--/.item-->
                    <div class="item">
                        <a href="#" class="image">
                            <img data-echo="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/toshiba-logo.png" src="<?php echo base_url('theme_unicase');?>/assets/images/brand-logo/toshiba-logo.png"
                                alt="">
                        </a>
                    </div>
                    <!--/.item-->
                </div>
                <!-- /.owl-carousel #logo-slider -->
            </div>
            <!-- /.logo-slider-inner -->

        </div>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /.body-content -->