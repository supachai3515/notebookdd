<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url()?>">Home</a></li>
				<li class='active'>ติดต่อเรา</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="contact-page">
                <div class="col-md-12 contact-map outer-bottom-vs">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242.63445534952618!2d100.97349972685569!3d13.340863796170533!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x565d991334ae4fcd!2z4LiV4Li24LiB4LiE4Lit4Lih4LiK4Lil4Lia4Li44Lij4Li1IC0gVHVrY29tIENob25idXJp!5e0!3m2!1sth!2sth!4v1461402796153"
                        width="600" height="450" style="border:0"></iframe>
                </div>
                <div class="col-md-6 contact-form">
                    <div class="col-md-12 contact-title">
                        <h4>ข้อมูลการติดต่อ</h4>
                    </div>
                    <div class="col-md-4 ">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputName">ชื่อ
                                    <span>*</span>
                                </label>
                                <input type="email" class="form-control unicase-form-control text-input" id="exampleInputName" placeholder="ชื่อ">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">ชื่อ
                                    <span>*</span>
                                </label>
                                <input type="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="example@example.com">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputTitle">หัวข้อ
                                    <span>*</span>
                                </label>
                                <input type="email" class="form-control unicase-form-control text-input" id="exampleInputTitle" placeholder="หัวข้อ">
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <form class="register-form" role="form">
                            <div class="form-group">
                                <label class="info-title" for="exampleInputComments">รายละเอียด
                                    <span>*</span>
                                </label>
                                <textarea class="form-control unicase-form-control" id="exampleInputComments"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 outer-bottom-small m-t-20">
                        <button type="submit" class="btn-upper btn btn-primary checkout-page-button">Send Message</button>
                    </div>
                </div>
                <div class="col-md-6 contact-info">
                    <div class="contact-title">
                        <h4>ติดต่อเรา</h4>
                    </div>
                    <div class="clearfix address">
                        <div class="pull-left">
                            <span class="contact-i">
                                <i class="fa fa-map-marker"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <span class="contact-span">135/99 ถ.สุขุมวิท ต.ศรีราชา อ.ศรีราชา จ.ชลบุรี 20110 ชั้น 2 ตึกคอมศรีราชา<br>97/233 ม.1 ต.เสม็ด อ.เมือง จ.ชลบุรี 2000<br>SIMPLE IT (ตึกคอมชลบุรี) ตึกคอมชลบุรี ชั้น 3 อ.เมือง จ.ชลบุรี<br>SIMPLE IT (ตึกคอมศรีราชา) ตึกคอมศรีราชา ชั้น 2 อ.ศรีราชา จ.ชลบุรี<br>HOME IT (ตึกคอมศรีราชา) ตึกคอมศรีราชา ชั้น 2 อ.ศรีราชา จ.ชลบุรี</span>
                        </div>
                    </div>
                    <div class="clearfix phone-no">
                        <div class="pull-left">
                            <span class="contact-i">
                                <i class="fa fa-mobile"></i>
                            </span>
                        </div>
                        <div class="media-body">
                            <span class="contact-span">061 478 8949<br>089 507 2023<br>090 983 9636</span>
                        </div>
                    </div>
                    <div class="clearfix email">
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
            </div>
            <!-- /.contact-page -->
        </div>
        <!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /.body-content -->