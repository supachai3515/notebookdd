<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url()?>">Home</a></li>
				<li class='active'>แจ้งชำระเงิน</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd" ng-controller="payment_ctrl">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="contact-page">
                <div class="col-md-6 contact-form">
                    <div class="col-md-12 contact-title">
                        <h4>แจ้งการชำระเงิน</h4>
                    </div>
                    <div class="col-md-10 ">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="paymentName">ชื่อ
                                    <span>*</span>
                                </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="paymentName" placeholder="ชื่อ">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="paymentTel">เบอร์ติดต่อ
                                    <span>*</span>
                                </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="paymentTel" placeholder="เบอร์ติดต่อ">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="paymentOrderId">เลขที่ใบสั่งซื้อ
                                    <span>*</span>
                                </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="paymentOrderId" placeholder="เลขที่ใบสั่งซื้อ">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title control-label" for="paymentBank">เลือกธนาคาร
                                    <span>*</span>
                                </label>
                                <select class="form-control unicase-form-control selectpicker" id="paymentBank">
                                    <option>--Select options--</option>
                                    <option>ธนาคารกรุงเทพ</option>
                                    <option>ธนาคารไทยพาณิชย์</option>
                                    <option>ธนาคารกสิกรไทย</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="paymentTotal">จำนวนเงิน
                                    <span>*</span>
                                </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="paymentTotal" placeholder="จำนวนเงิน">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="paymentDate">วันที่โอน ตัวอย่าง 01/04/2016
                                    <span>*</span>
                                </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="paymentDate" placeholder="วันที่โอน">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-10">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="paymentTime">เวลาโอน ตัวอย่าง 12:00
                                    <span>*</span>
                                </label>
                                <input type="text" class="form-control unicase-form-control text-input" id="paymentTime" placeholder="เวลาโอน">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 outer-bottom-small m-t-20">
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">แจ้งชำระเงิน</button>
                    </div>
                </div>
                <div class="col-md-6 contact-info">
                    <div class="row bank-payment">
                    <div class="col-sm-3">
                        <img src="<?php echo base_url('theme'); ?>/images/bb.jpg" class="img-responsive img-rounded" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <h5><strong>ธนาคารกรุงเทพ</strong></h5>
                        <p>เลขที่บัญชี : 0687-076-380<br>ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารกรุงเทพ สาขาพาราไดซ์ พาร์ค<br></p>
                    </div>
                </div>
                <div class="row bank-payment">
                    <div class="col-sm-3" style=" margin:0 auto;">
                        <img src="<?php echo base_url('theme'); ?>/images/thaipanit.jpg" class="img-responsive img-rounded" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <h5><strong>ธนาคารไทยพาณิชย์</strong></h5>
                        <p>เลขที่บัญชี : 175-2203-837<br>
                        นายสมิด ตรวจมรคา ธนาคารไทยพาณิชย์ สาขาพาราไดซ์ พาร์ค<br>
                    </div>
                </div>
                <div class="row bank-payment">
                    <div class="col-sm-3" style=" margin:0 auto;">
                        <img src="<?php echo base_url('theme'); ?>/images/kban.jpg" class="img-responsive img-rounded" alt="Image">
                    </div>
                    <div class="col-sm-9">
                        <h5><strong>ธนาคารกสิกรไทย</strong></h5>
                        <p>เลขที่บัญชี : 628-2014-074<br>
                        นายสมิด ตรวจมรคา ธนาคารกสิกรไทย สาขาพาราไดซ์ พาร์ค<br>
                    </div>
                </div>
                <div class="clearfix email">
                    <h5><strong>แจ้งชำระเงินผ่านทางอีเมล</strong></h5>
                    <div class="pull-left">
                        <span class="contact-i">
                            <i class="fa fa-envelope"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <span class="contact-span"><a href="mailto:simpleitnotebook@gmail.com">simpleitnotebook@gmail.com</a></span>
                    </div>
                </div>
                <div class="clearfix line">
                    <h5><strong>แจ้งชำระเงินผ่านทางไลน์</strong></h5>
                    <div class="pull-left">
                        <span class="contact-i">
                            <i class="fa fa-comments"></i>
                        </span>
                    </div>
                    <div class="media-body">
                        <span><a href="http://line.me/ti/p/%40zlg9137d" target="_blank"> line : @notebookdd</a></span>
                    </div>
                </div>
                </div>
            </div><!-- /.contact-page -->
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