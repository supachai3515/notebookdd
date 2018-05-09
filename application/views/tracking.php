<div id="content">
    <div class="main-content">
        <div class="container">
            <div class="bread-crumb">
                <a href="<?php echo base_url(); ?>">Home</a> <span class="lnr lnr-chevron-right"></span> <span>Tracking</span>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="price-range">
                        <h4 class="text-center"><i class="fa fa-truck"></i> Tracking Number</h4>
                        <div class="panel-group" id="accordian" ng-init="getOrderTracking()">
                            <div class="panel panel-default">
                                <div class="search_box text-center" style="padding: 20px;">
                                    <form ng-submit="getOrderTracking()">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="ค้นหาใบสั่งซื้อ" ng-model="txtSearchTracking" required="required">
                                            <div class="input-group-btn">
                                                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <table class="table table-hover">
                                    <tbody>
                                        <tr ng-repeat="order in orderTracking">
                                            <td class="text-center"><i class="fa fa-list-alt"></i>
                                                <br> <strong ng-bind="order.id"></strong></td>
                                            <td><span ng-bind="order.name"></span>
                                                <br>
                                                <span ng-bind="order.trackpost" class="text-primary"></span>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--/tracking-->
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/thaipost.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>ไปรษณีย์ไทย</h3>
                                <p><strong>ชำระเงินก่อน 15.30น. ส่งสินค้าออกวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป  </strong></p>
                                <p class="text-success">
                                    <strong><i class="fa fa-thumbs-o-up"></i> ข้อดี</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> ส่งถึงหน้าบ้านทุกที่</span>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> ส่งได้ทุกพื้นที่</span>
                                </p>
                                <p class="text-danger">
                                    <strong><i class="fa fa-thumbs-o-down"></i> ข้อเสีย</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> สินค้าอาจชำรุดได้</span>
                                </p>
                                <p>
                                    <a href="http://track.thailandpost.co.th/tracking/default.aspx" class="btn btn-primary" target="_blank">ไปรษณีย์ไทย</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/kerry.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>เคอรี่ เอ็กซ์เพรส (ประเทศไทย)</h3>
                                <p><strong> ชำระเงินก่อน 14.00น. ส่งสินค้าออกในวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป </strong></p>
                                <p class="text-success">
                                    <strong><i class="fa fa-thumbs-o-up"></i> ข้อดี</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> รวดเร็ว รับสินค้าวันถัดไปเมื่อโอนก่อน 14.00น.</span>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> มีรับประกันสินค้าเสียหาย</span>
                                </p>
                                <p class="text-danger">
                                    <strong><i class="fa fa-thumbs-o-down"></i> ข้อเสีย</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> ยังไม่เจอ</span>
                                </p>
                                <p>
                                    <a href="http://th.ke.rnd.kerrylogistics.com/shipmenttracking/" class="btn btn-primary" target="_blank">เคอรี่ เอ็กซ์เพรส (ประเทศไทย)</a></li>
                                </p>
                            </div>
                        </div>
                    </div>
                     <hr/>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/sds.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>เซ้าท์เทิร์น ดีลิเวอรี่ เซอร์วิส (SDS)</h3>
                                <p><strong>ชำระเงินก่อน 17.00น. ส่งสินค้าออกวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป   </strong></p>
                                <p class="text-success">
                                    <strong><i class="fa fa-thumbs-o-up"></i> ข้อดี</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> รวดเร็ว รับสินค้าวันถัดไป อาจมีล่าช้าบางพื้นที่</span>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> สินค้าไม่ค่อยเสียหาย</span>
                                </p>
                                <p class="text-danger">
                                    <strong><i class="fa fa-thumbs-o-down"></i> ข้อเสีย</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> บางพื้นที่เข้าไม่ถึง</span>
                                </p>
                                <p>
                                    <a href="http://www.sds.co.th/status.php" class="btn btn-primary" target="_blank">เซ้าท์เทิร์น ดีลิเวอรี่ เซอร์วิส</a>
                                </p>
                            </div>
                        </div>
                    </div>
                     <hr/>
                    <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                            <img src="<?php echo base_url('theme'); ?>/images/first.jpg" alt="ALT NAME" class="img-responsive img-rounded" />
                        </div>
                        <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                            <div class="caption">
                                <h3>สยามเฟิสท์</h3>
                                <p><strong>ชำระเงินก่อน 17.00น. ส่งสินค้าออกวันเดียวกัน หลังจากนั้น ส่งสินค้าออกวันถัดไป </strong></p>
                                <p class="text-success">
                                    <strong><i class="fa fa-thumbs-o-up"></i> ข้อดี</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> รวดเร็ว รับสินค้าวันถัดไป</span>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> ดูแลสินค้าดีมาก</span>
                                </p>
                                <p class="text-danger">
                                    <strong><i class="fa fa-thumbs-o-down"></i> ข้อเสีย</strong>
                                    <br>
                                    <span><i class="fa fa-angle-right"></i> ต้องมารับสินค้าที่ศูนย์เท่านั้น ไม่ส่งถึงหน้าบ้าน</span>
                                </p>
                                <p>
                                    <a href="http://www.siamfirst.co.th/sfc/news.asp?ID=19" class="btn btn-primary" target="_blank">สยามเฟิสท์</a>
                                </p>
                            </div>
                        </div>
                    </div>
                     <hr/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Grid Product -->
</div>
<!-- End Content -->
<?php $this->load->view('template/logo'); ?>
