<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'> ตะกร้าสินค้า</li>
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
                                    <th class="cart-romove item">ลบสินค้าออก</th>
                                    <th class="cart-description item">รูปสินค้า</th>
                                    <th class="cart-product-name item">ข้อมูลสินค้า</th>
                                    <th class="cart-sub-total item">ราคา</th>
                                    <th class="cart-qty item">จำนวณ</th>
                                    <th class="cart-total last-item">ยอดรวม</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="<?php echo base_url('products') ?>" class="btn btn-upper btn-primary outer-left-xs">กลับไปหน้าสินค้า</a>
                                                <!-- <a href="#" class="btn btn-upper btn-primary pull-right outer-right-xs">Update shopping cart</a> -->
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr ng-repeat="item in productItems" ng-if="item.price != '0'">
                                    <td class="romove-item">
                                        <a href="" title="cancel" class="icon" ng-click="deleteProduct_click(item.rowid)"><i class="fa fa-trash-o"></i></a>
                                    </td>
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
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient" ng-click="updateProduct_click_plus(item.rowid)">
                                                    <span class="ir">
                                                        <i class="icon fa fa-sort-asc"></i>
                                                    </span>
                                                </div>
                                                <div class="arrow minus gradient" ng-click="updateProduct_click_minus(item.rowid)">
                                                    <span class="ir">
                                                        <i class="icon fa fa-sort-desc"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="number" step="1" min="0" value="{{item.quantity}}" ng-model="editValue">
                                        </div>
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
                                    <p class="text-center">*** ทางร้านขอสงวนสิทธิการเปลี่ยนแปลงราคาสินค้า***</p>
                                    <div class="cart-sub-total"><span class="col-sm-6">ยอดรวม</span><span class="col-sm-6">{{sumTotal() | currency:'฿ ':0}}</span></div>
                                    <div class="cart-sub-total"><span class="col-sm-6">ค่าจัดส่ง</span><span class="col-sm-6">{{100 | currency:'฿ ':0}}</span></div>
                                    <div class="cart-grand-total"><span class="col-sm-6">ยอดรวมทั้งสิ้น</span><span class="col-sm-6">{{sumTotal() + 100 | currency:'฿ ':0}}</span></div>
                                </th>
                            </tr>
                        </thead><!-- /thead -->
                        <tbody>
                            <tr>
                                <td>
                                    <div class="cart-checkout-btn pull-right">
                                        <a href="<?php echo base_url('checkout') ?>" class="btn btn-upper btn-primary">ดำเนินการชำระเงิน</a>
                                        <!-- <span class="">Checkout with multiples address!</span> -->
                                    </div>
                                </td>
                            </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                </div><!-- /.cart-shopping-total -->
            </div><!-- /.shopping-cart -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.body-content -->