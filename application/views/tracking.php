<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url()?>">Home</a></li>
				<li class='active'>ติดตามการจัดส่ง</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="track-order-page">
                <div class="col-md-5 contact-form">
                    <div class="col-md-12 contact-title">
                        <h4 class="text-center">ค้นหา Tracking Number</h4>
                    </div>
                    <div class="search-area">

                    <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ใส่เลข Order"  ng-model="txtSearchTracking">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" ng-click="getOrderTracking()"><i class="glyphicon glyphicon-search"></i></button>
                                    </div>
                                </div>

                    </div>
                    <p></p>
                    <div class="table table-striped" >
                        <table class="table" style="border: 1px solid #ddd;">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">ชื่อ</th>
                                    <th class="text-center">Tracking</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="order in orderTracking">
                                    <td class="text-center" style="border-bottom: 1px solid #ddd;"><strong ng-bind="order.id"></strong></td>
                                    <td style="border-bottom: 1px solid #ddd;"><span ng-bind="order.name"></span></td>
                                    <td style="border-bottom: 1px solid #ddd;"><span ng-bind="order.trackpost"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/thaipost.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h4>ไปรษณีย์ไทย</h4>
                                <p><strong>ชำระเงินก่อน 15.30น. ส่งสินค้าออกวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป</strong></p>
                                <p><a href="https://track.thailandpost.co.th/tracking/default.aspx" class="btn btn-primary" target="_blank">ไปรษณีย์ไทย</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/kerry.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>เคอรี่ เอ็กซ์เพรส (ประเทศไทย)</h3>
                                <p><strong> ชำระเงินก่อน 14.00น. ส่งสินค้าออกในวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป </strong></p>
                                <p><a href="https://th.ke.rnd.kerrylogistics.com/shipmenttracking/" class="btn btn-primary" target="_blank">เคอรี่ เอ็กซ์เพรส (ประเทศไทย)</a></li></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/sds.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>เซ้าท์เทิร์น ดีลิเวอรี่ เซอร์วิส (SDS)</h3>
                                <p><strong>ชำระเงินก่อน 17.00น. ส่งสินค้าออกวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป</strong></p>
                                <p><a href="https://www.sds.co.th/status.php" class="btn btn-primary" target="_blank">เซ้าท์เทิร์น ดีลิเวอรี่ เซอร์วิส</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/first.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>สยามเฟิสท์</h3>
                                <p><strong>ชำระเงินก่อน 17.00น. ส่งสินค้าออกวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป </strong></p>
                                <p><a href="https://www.siamfirst.co.th/sfc/news.asp?ID=19" class="btn btn-primary" target="_blank">สยามเฟิสท์</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.track-order-page -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.container -->
</div><!-- /.body-content -->