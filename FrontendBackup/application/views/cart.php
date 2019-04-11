<div id="content">
    <div class="main-content">
        <div class="container">
            <div class="bread-crumb">
                <a href="<?php echo base_url(); ?>">Home</a> <span class="lnr lnr-chevron-right"></span> <span>ตะกร้าสินค้า</span>
            </div>
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
            <div class="row">

             <div class="col-md-12">
               
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

                <div  ng-if="sumTotal() > 0 "class="commerce" >
                        <form>
                            <table class="table shop_table cart">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs text-center">#</th>
                                        <th class="hidden-xs text-center"></th>
                                        <th class="">Product</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center hidden-xs">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="item in productItems" ng-if="item.price != '0'">
                                        <td class="text-center">
                                            <a  href="" class="remove" title="Remove this item" ng-click="deleteProduct_click(item.rowid)"><i class="fa fa-times-circle fa-2x"></i></a>
                                        </td>
                                        <td class="hidden-xs text-center">
                                            <a href="<?php echo base_url('product/'.'{{item.sku}}') ?>">
                                                <img src="{{item.img}}"width="100"  class="img-responsive" alt="">
                                                
                                            </a>
                                        </td>
                                        <td>
                                        <p>
                                              <a href="<?php echo base_url('product/'.'{{item.sku}}') ?>"><span ng-bind="item.name"></span></a><br/>
                                              <span ng-if="item.sku !='' ">sku: <span ng-bind="item.sku"></span><br/></span>
                                              <span ng-if="item.model !='' ">Model: <span ng-bind="item.model"></span><br/></span>
                                              <span ng-if="item.brand !='' ">Brand: <span ng-bind="item.brand"></span><br/></span>
                                              <span ng-if="item.is_reservations == '1' "ng><span class="text-success"> ***ก่อนทําการโอนเงินสั่งซื้อ กรุณารอเจ้าหน้าที่ ติดติอกลับเพื่อแจ้งเงื่อนไขการสั่งซื้อ</span><br/></span>
                                          </p>
                                        </td>
                                        <td class="text-center">
                                            <span class="amount"><span class="amount"><span ng-bind="item.price | currency:'฿':0"></span></span>
                                        </td>
                                        <td class="product-quantity text-center ">

                                            <button type="button" ng-click="updateProduct_click_minus(item.rowid)"><i class="fa fa-minus"></i></button>

                                            <input type="number" step="1" min="0" ng-model="editValue" ng-change="updateProduct_click(item.rowid,editValue)"  value="{{item.quantity}}"  style="width:50px; height: 30px; text-align:center"/>

                                            <button type="button" ng-click="updateProduct_click_plus(item.rowid)"><i class="fa fa-plus"></i></button>

                                        </td>
                                        <td class="product-subtotal hidden-xs text-center">
                                            <span class="amount"><span class="amount"><span ng-bind="item.price * item.quantity | currency:'฿':0"></span></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <div class="row">
                            <div class="col-md-8">
                            <div ng-if="is_reservations_check == 1">
                                 <p> <h4>การจองสินค้า หรือการสั่งซื้อแบบ By Order</h4>
                            - ทางร้านติดต่อกลับเพื่อแจ้งเงื่อนไข เช่นระยะเวลาการดําเนินการ ราคาที่สั่งซื้ออาจมีการเปลี่ยนแปลง  <br/>
                            - กรณีที่ลูกค้าตกลงยอมรับในเงื่อนไข ลูกค้าโอนเงินเต็มจํานวนที่ตกลง และแจ้ง confirm order ทางร้านจึงจะดําเนินการให้  <br/>
                            - ทางร้านขอสงวนสิทธิในการเปลี่ยนแปลงราคา สินค้า หรือ การยกเลิกการสั่งซื้อ โดยคืนเงินเต็มจํานวนตามที่ลูกค้าจ่ายเข้ามา</p>
                            </div>
                           
                            </div>
                            <div class="col-md-4 link-cart">
                            <p class="text-center">*** ทางร้านขอสงวนสิทธิการเปลี่ยนแปลงราคาสินค้า***</p>
                                     <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge"><span ng-bind="sumTotal() | currency:'฿':0"></span></span>
                                           ราคารวม
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><span ng-bind="100 | currency:'฿':0"></span></span>
                                            ค่าจัดส่ง
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><span ng-bind="sumTotal() + 100 | currency:'฿':0"></span></span>
                                            รวมทั้งหมด
                                        </li>
                                    </ul>
                                    <a class="cart-edit pull-left" href="<?php echo base_url('products') ?>" role="button">กลับไปเลือกสินค้า</a>
                                    <a class="cart-checkout pull-right" href="<?php echo base_url('checkout') ?>" role="button">ยืนยันการสั่งซื้อ</a>
                     
                            </div>
                        </div>
                       
                    </div>
                    <div ng-if="sumTotal() < 1 " class="commerce">
                        <p class="cart-empty">คุณไม่มีสินค้าในตะกร้า</p>
                        <p class="return-to-shop"><a class="button wc-backward rounded" href="<?php echo base_url('products') ?>">กลับไปเลือกสินค้า</a></p>
                    </div> 


                </div>
            </div>
        </div>
    </div>
    <!-- End Grid Product -->
</div>
<!-- End Content -->