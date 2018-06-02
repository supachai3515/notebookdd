<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'>ลงชื่อเข้าใช้</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="sign-in-page inner-bottom-sm">
            <div class="row">
                <!-- Sign-in -->
                <div class="col-md-6 col-sm-6 sign-in">
                    <h4 class="">ลงชื่อเข้าใช้</h4>
                    <!-- <p class="">Hello, Welcome to your account.</p> -->
                    <!-- <div class="social-sign-in outer-top-xs">
                        <a href="#" class="facebook-sign-in"><i class="fa fa-facebook"></i> Sign In with Facebook</a>
                        <a href="#" class="twitter-sign-in"><i class="fa fa-twitter"></i> Sign In with Twitter</a>
                    </div> -->
                    <?php 
                        if($this->session->flashdata('msg') != ''){
                            echo '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$this->session->flashdata('msg').'
                            </div>';
                        }
                        if($this->session->flashdata('success') != ''){
                            echo '
                                <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$this->session->flashdata('success').'
                            </div>';
                        }    
                    ?>  
                    <form class="register-form outer-top-xs" role="form" action="<?php echo base_url('login/signin');?>" method="post">
                        <div class="form-group">
                            <label class="info-title" for="Username">Email Address
                                <span>*</span>
                            </label>
                            <input type="email" class="form-control unicase-form-control text-input" id="Username" name="username" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="Password">Password
                                <span>*</span>
                            </label>
                            <input type="password" class="form-control unicase-form-control text-input" id="Password"  name="password" placeholder="Password" required>
                        </div>
                        <div class="radio outer-xs">
                            <a href="#" class="forgot-password pull-left">ลืมรหัสผ่าน?</a>
                            <!-- <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">จดจำฉัน!
                            </label> -->
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">ล็อคอิน</button>
                    </form>
                </div>
                <!-- Sign-in -->

                <!-- create a new account -->
                <div class="col-md-6 col-sm-6 create-new-account">
                    <h4 class="checkout-subtitle">สมัครสมาชิก</h4>
                    <!-- <p class="text title-tag-line">Create your own Unicase account.</p> -->
                    <form class="register-form outer-top-xs" role="form">
                        <div class="form-group">
                            <label class="info-title" for="exampleInputEmail2">Email Address
                                <span>*</span>
                            </label>
                            <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail2">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword2">Password
                                <span>*</span>
                            </label>
                            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword2">
                        </div>
                        <div class="form-group">
                            <label class="info-title" for="exampleInputPassword3">Confirm Password
                                <span>*</span>
                            </label>
                            <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword3">
                        </div>
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">สมัครสมาชิก</button>
                    </form>
                    <!-- <span class="checkout-subtitle outer-top-xs">Sign Up Today And You'll Be Able To : </span> -->
                    <!-- <div class="checkbox">
                        <label class="checkbox">
                            <input type="checkbox" id="speed" value="option1"> Speed your way through the checkout.
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" id="track" value="option2"> Track your orders easily.
                        </label>
                        <label class="checkbox">
                            <input type="checkbox" id="keep" value="option3"> Keep a record of all your purchases.
                        </label>
                    </div> -->
                </div>
                <!-- create a new account -->
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
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
                    </div><!--/.item-->
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