<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'> ยืนยันการสั่งซื้อ</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs" ng-controller="cart_ctrl">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="container well hidden-xs item-message-box item-message-success" ng-if="is_reservations_check == 1" >
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                    1. <i class="fa fa-shopping-cart"> </i><span> จองสินค้า</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        2. <i class="fa fa-user"> </i><span> ทางร้านติดต่อกลับ</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        3. <i class="fa fa-money"> </i><span> ชำระเงิน</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
                        4. <i class="fa fa-truck"> </i><span> รอรับสินค้า</span>
                    </div>
            </div>
            <?php if (isset($is_reservations)): ?>
                <?php if ($is_reservations =="1"): ?>
                    <div class="item-message-box item-message-warning">
                        <p><span class="lnr lnr-envelope"></span><span class="text-primary">มีสินค้าที่จองอยู่ในตะกล้า ไม่สามารถสั่งสินค้าปกติพร้อมกันได้ กรุณา <a href="<?php echo base_url('checkout') ?>"><strong><u>ยืนยันการสั่งซื้อ</u></strong></a> สินค้าก่อนคะ</span></p>
                    </div> 
                <?php else: ?>
                    <div class="item-message-box item-message-warning">
                        <p><span class="lnr lnr-envelope"></span><span class="text-primary">การจองไม่สามารถสั่งพร้อมสินค้าปกติ และ ไม่สามารถสั่งซื้อพร้อมกันสองชนิด กรุณา <a href="<?php echo base_url('checkout') ?>"><strong><u>ยืนยันการสั่งซื้อ</u></strong></a> สินค้าก่อนคะ</span></p>
                    </div> 
                <?php endif ?>
                
            <?php endif ?>
            <div class="shopping-cart-btn text-center" ng-if="sumTotal() < 1 "> 
                <span class="">
                    <p>คุณไม่มีสินค้าในตะกร้า</p>
                    <a href="<?php echo base_url('products') ?>" class="btn btn-upper btn-primary">กลับไปหน้าสินค้า</a>
                </span>
            </div><!-- /.shopping-cart-btn -->
            <div class="shopping-cart" ng-if="sumTotal() > 0 ">
                <div class="col-md-12 col-sm-12 shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="cart-description item">รูปสินค้า</th>
                                    <th class="cart-product-name item">ข้อมูลสินค้า</th>
                                    <th class="cart-sub-total item">ราคา</th>
                                    <th class="cart-qty item">จำนวณ</th>
                                    <th class="cart-total last-item">ยอดรวม</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                                <tr>
                                    <td colspan="5">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="<?php echo base_url('products') ?>" class="btn btn-upper btn-primary outer-left-xs">กลับไปหน้าสินค้า</a>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr ng-repeat="item in productItems" ng-if="item.price != '0'">
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="<?php echo base_url('product/'.'{{item.sku}}') ?>"><img src="{{item.img}}" alt=""></a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="<?php echo base_url('product/'.'{{item.sku}}') ?>">{{item.name}}</a></h4>
                                        <!-- <div class="row">
                                            <div class="col-sm-4">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">(06 Reviews)</div>
                                            </div>
                                        </div> -->
                                        <div class="cart-product-info">
                                            <div ng-if="item.sku !='' "><span class="product-imel">sku:<span>{{item.sku}}</span></span><br></div>
                                            <div ng-if="item.model !='' "><span class="product-color">Model:<span>{{item.model}}</span></span><br></div>
                                            <div ng-if="item.brand !='' "><span class="product-color">Brand:<span>{{item.brand}}</span></span><br></div>
                                            <div ng-if="item.is_reservations == '1' "><span class="product-color"><span>***ก่อนทําการโอนเงินสั่งซื้อ กรุณารอเจ้าหน้าที่ ติดติอกลับเพื่อแจ้งเงื่อนไขการสั่งซื้อ</span></span></div>
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total">
                                        <span class="cart-sub-total-price">{{item.price | currency:'฿':0}}</span>
                                    </td>
                                    <td class="cart-product-sub-total">
                                        <span class="cart-sub-total-price">{{item.quantity}}</span>
                                        
                                    </td>
                                    <td class="cart-product-grand-total">
                                        <span class="cart-grand-total-price">{{item.price * item.quantity | currency:'฿':0}}</span>
                                    </td>
                                </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
                <div class="col-md-7 col-sm-12 estimate-ship-tax">
                    <div ng-if="is_reservations_check == 1">
                            <p> <h4>การจองสินค้า หรือการสั่งซื้อแบบ By Order</h4>
                    - ทางร้านติดต่อกลับเพื่อแจ้งเงื่อนไข เช่นระยะเวลาการดําเนินการ ราคาที่สั่งซื้ออาจมีการเปลี่ยนแปลง  <br/>
                    - กรณีที่ลูกค้าตกลงยอมรับในเงื่อนไข ลูกค้าโอนเงินเต็มจํานวนที่ตกลง และแจ้ง confirm order ทางร้านจึงจะดําเนินการให้  <br/>
                    - ทางร้านขอสงวนสิทธิในการเปลี่ยนแปลงราคา สินค้า หรือ การยกเลิกการสั่งซื้อ โดยคืนเงินเต็มจํานวนตามที่ลูกค้าจ่ายเข้ามา</p>
                    </div>
                </div><!-- /.estimate-ship-tax -->

                <div class="col-md-5 col-sm-12 cart-shopping-total">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <div class="cart-sub-total"><span class="col-sm-6">ยอดรวม</span><span class="col-sm-6">{{sumTotal() | currency:'฿ ':0}}</span></div>
                                    <div class="cart-sub-total"><span class="col-sm-6">ค่าจัดส่ง</span><span class="col-sm-6">{{100 | currency:'฿ ':0}}</span></div>
                                    <div class="cart-grand-total"><span class="col-sm-6">ยอดรวมทั้งสิ้น</span><span class="col-sm-6">{{sumTotal() + 100 | currency:'฿ ':0}}</span></div>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
                <div class="col-md-12 col-sm-12">


                    <form class="form-horizontal" name="checkoutForm"  method="post" action="<?php echo base_url('checkout/save'); ?>">
                        <script type="text/javascript">
                        </script>
                        <fieldset>

                        <legend>กรุณากรอกรายละเอียดที่อยู่ เพื่อรับสินค้าจากเว็บไซต์</legend>

                        <!-- Multiple Radios -->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="purchase">รูปแบบการออกใบเสร็จ</label>
                        <div class="col-md-4">

                            <label><input type="checkbox" name="purchase" id="p2" ng-change="caltaxReceipt(tax)" ng-model="tax" /> ใบกำกับภาษี</label><br />

                        </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group" ng-if="caltax() > 1">
                        <label class="col-md-4 control-label" for="company">ชื่อบริษัท / ร้าน</label>  
                        <div class="col-md-4">
                        <?php if( $isUsername == 1) {?>
                            <input id="company" name="company" type="text" placeholder="ชื่อบริษัท / ร้าน" value="<?php echo $username_login["Company"]; ?>" class="form-control input-md unicase-form-control text-input">
                        <?php } else { ?>
                            <input id="company" name="company" type="text" placeholder="ชื่อบริษัท / ร้าน" class="form-control input-md unicase-form-control">
                        <?php } ?>
                            
                        </div>
                        </div>


                        <!-- Textarea -->
                        <div class="form-group" ng-if="caltax() > 1">
                        <label class="col-md-4 control-label" for="purchase_address">ชื่อที่อยู่สำหรับออกใบกำกับภาษี</label>
                        <div class="col-md-4">
                            <?php if( $isUsername == 1) {?>
                                <textarea class="form-control unicase-form-control text-input" name="purchase_address"><?php echo trim($username_login["AVat"]);?></textarea>
                            <?php } else { ?>
                                <textarea class="form-control unicase-form-control text-input" name="purchase_address"></textarea>
                            <?php } ?> 
                        </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group" ng-if="caltax() > 1">
                        <label class="col-md-4 control-label" for="IDCARD">เลขประจำตัวผู้เสียภาษี</label>  
                        <div class="col-md-4">
                        <?php if( $isUsername == 1) {?>
                            <input id="IDCARD" name="IDCARD" type="text" placeholder="เลขประจำตัวผู้เสียภาษี" value="<?php echo $username_login["Nid"]; ?>" class="form-control unicase-form-control text-input">
                        <?php } else { ?>
                            <input id="IDCARD" name="IDCARD" type="text" placeholder="เลขประจำตัวผู้เสียภาษี" class="form-control unicase-form-control text-input">
                        <?php } ?>
                            
                        </div>
                        </div>


                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อผู้รับสินค้า<sup>*</sup></label>  
                        <div class="col-md-4">
                            <?php if( $isUsername == 1) {?>
                                <input type="text" name="txtName"  placeholder="ชื่อผู้รับสินค้า" class="form-control unicase-form-control text-input" required="required" 
                                value="<?php echo $username_login["FullName"] ." ". $username_login["LastName"]; ?>"/>
                            <?php } else { ?>
                                <input type="text" name="txtName"  placeholder="ชื่อผู้รับสินค้า" class="form-control unicase-form-control text-input" required="required" 
                            value=""/>
                            <?php } ?>
                        </div>
                        </div>

                        <!-- Textarea -->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="textarea">ที่อยู่ที่ต้องการรับสินค้า</label>
                        <div class="col-md-4"> 
                            <?php if( $isUsername == 1) {?>
                                <textarea class="form-control unicase-form-control text-input" name="txtAddress"><?php echo trim($username_login["ARecieve"]);?></textarea>
                            <?php } else { ?>
                                <textarea class="form-control unicase-form-control text-input" name="txtAddress"></textarea>
                            <?php } ?>
                        </div>
                        </div>

                        <div class="form-group">
                        <label class="col-md-4 control-label" for="passwordinput">เบอร์โทรติดต่อกลับ<sup>*</sup></label>
                        <div class="col-md-4">
                            <?php if( $isUsername == 1) {?>
                                <input type="text" name="txtTel" id="txtTel" required="required" class="form-control unicase-form-control text-input" placeholder="เบอร์โทรติดต่อกลับ" maxlength="12" value="<?php echo $username_login["Mobile"];?>" />
                            <?php } else { ?>
                                <input type="text" name="txtTel" id="txtTel" class="form-control unicase-form-control text-input" placeholder="เบอร์โทรติดต่อกลับ" required="required" maxlength="12" value="" />
                            <?php } ?>
                        </div>
                        </div>

                        <!-- Select Basic -->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="selectbasic">เลือกการจัดส่ง</label>
                        <div class="col-md-4">
                            <select id="txtTransport" name="txtTransport" class="form-control unicase-form-control selectpicker" >
                            <option>EMS</option>
                            <option>SDS(ภาคใต้)</option>
                            <option>Kerry Express(ทั่วประเทศ)</option>
                            <option>สยามเฟิร์ส(ภาคเหนือ)</option>
                            </select>
                        </div>
                        </div>

                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="txtEmail">อีเมล์ติดต่อกลับ<sup>*</sup></label>  
                        <div class="col-md-4">
                        <?php if( $isUsername == 1) {?>
                                <input type="text" name="txtEmail" id="txtEmail" required="required " placeholder="อีเมล์ติดต่อกลับ"  class="form-control unicase-form-control text-input" value="<?php echo $username_login["Email"];?>" />
                            <?php } else { ?>
                                <input id="txtEmail" name="txtEmail" type="email" placeholder="อีเมล์ติดต่อกลับ" class="form-control unicase-form-control text-input" required="required">
                            <?php } ?>
                        </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                        <label class="col-md-4 control-label" for="singlebutton"></label>
                        <div class="col-md-4">
                            <button  type="button" class="btn btn-primary" onClick="validateForm()">ยืนยันการสั่งซื้อ</button>
                        </div>
                        </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- /.shopping-cart -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.body-content -->