<div id="content">
    <div class="main-content">
        <div class="container">
            <div class="bread-crumb">
                <a href="<?php echo base_url(); ?>">Home</a> <span class="lnr lnr-chevron-right"></span> <span>ยืนยันการสั่งซื้อ</span>
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
               <div class="col-md-12">
                  <div class="main-content">
                      <div  ng-if="sumTotal() > 0 "class="commerce" >
                          <form>
                              <table class="table shop_table cart">
                                  <thead>
                                      <tr>
                                          <th class="hidden-xs">#</th>
                                          <th >Product</th>
                                          <th class="text-center">Price</th>
                                          <th class="text-center">Quantity</th>
                                          <th class="text-center hidden-xs">Total</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr class="cart_item" ng-repeat="item in productItems" ng-if="item.price != '0'">
                                         <td class="hidden-xs text-center">
                                              <a href="<?php echo base_url('product/'.'{{item.sku}}') ?>">
                                                  <img src="{{item.img}}"width="100"  class="img-responsive" alt="">
                                                  
                                              </a>
                                          </td>
                                          <td class="product-name">
                                              <p>
                                                  <a href="<?php echo base_url('product/'.'{{item.sku}}') ?>"><span ng-bind="item.name"></span></a><br/>
                                                  <span ng-if="item.sku !='' ">sku: <span ng-bind="item.sku"></span><br/></span>
                                                  <span ng-if="item.model !='' ">Model: <span ng-bind="item.model"></span><br/></span>
                                                  <span ng-if="item.brand !='' ">Brand: <span ng-bind="item.brand"></span><br/></span>
                                                   <span ng-if="item.is_reservations == '1' "><span class="text-success"> * สินค้าจอง ***ก่อนทําการโอนเงินสั่งซื้อ กรุณารอเจ้าหน้าที่ ติดติอกลับเพื่อแจ้งเงื่อนไขการสั่งซื้อ</span><br/></span>
                                              </p>
                                          </td>
                                          <td class="product-price text-center">
                                              <span class="amount"><span class="amount"><span ng-bind="item.price | currency:'฿':0"></span></span>
                                          </td>
                                          <td class="product-quantity text-center ">
                                              <span class="amount"><span class="amount"><span ng-bind="item.quantity"></span></span>
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
                            <div ng-if="is_reservations_check == 1" >
                              <p> <h4>การจองสินค้า หรือการสั่งซื้อแบบ By Order</h4>
                              - ทางร้านติดต่อกลับเพื่อแจ้งเงื่อนไข เช่นระยะเวลาการดําเนินการ ราคาที่สั่งซื้ออาจมีการเปลี่ยนแปลง  <br/>
                              - กรณีที่ลูกค้าตกลงยอมรับในเงื่อนไข ลูกค้าโอนเงินเต็มจํานวนที่ตกลง และแจ้ง confirm order ทางร้านจึงจะดําเนินการให้  <br/>
                              - ทางร้านขอสงวนสิทธิในการเปลี่ยนแปลงราคา สินค้า หรือ การยกเลิกการสั่งซื้อ โดยคืนเงินเต็มจํานวนตามที่ลูกค้าจ่ายเข้ามา</p> 
                            </div>
                              
                            </div>
                            <div class="col-md-4 link-cart">
                            
                                     <ul class="list-group">
                                        <li class="list-group-item">
                                            <span class="badge"><strong ng-bind="sumTotal() | currency:'฿':0"> </strong></span>
                                           ราคารวม
                                        </li>
                                        <li class="list-group-item" ng-if="caltax() > 1">
                                            <span class="badge"><strong class="amount" ng-bind="caltax() | currency:'฿':0"> </strong></span>
                                            ภาษีมูลค่าเพิ่ม 7%
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><strong class="amount" ng-bind="100 | currency:'฿':0"> </strong></span>
                                            ค่าจัดส่ง
                                        </li>
                                        <li class="list-group-item">
                                            <span class="badge"><strong class="amount" ng-bind="( (100+sumTotal() )+caltax() ) | currency:'฿':0"> </strong></span>
                                            <strong>รวมทั้งหมด</strong>
                                        </li>
                                    </ul>
                            </div>
                        </div>
                          <form class="form-horizontal" ng-submit="ckeckoutSubmit()"  name="form1" method="post" action="<?php echo base_url('checkout/save'); ?>" OnSubmit="return chkSubmit();">
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
                                  <input id="company" name="company" type="text" placeholder="ชื่อบริษัท / ร้าน" value="<?php echo $username_login["Company"]; ?>" class="form-control input-md">
                                <?php } else { ?>
                                  <input id="company" name="company" type="text" placeholder="ชื่อบริษัท / ร้าน" class="form-control input-md">
                                <?php } ?>
                                  
                                </div>
                              </div>


                              <!-- Textarea -->
                              <div class="form-group" ng-if="caltax() > 1">
                                <label class="col-md-4 control-label" for="purchase_address">ชื่อที่อยู่สำหรับออกใบกำกับภาษี</label>
                                <div class="col-md-4">
                                  <?php if( $isUsername == 1) {?>
                                      <textarea class="form-control" name="purchase_address"><?php echo trim($username_login["AVat"]);?></textarea>
                                  <?php } else { ?>
                                      <textarea class="form-control" name="purchase_address"></textarea>
                                  <?php } ?> 
                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group" ng-if="caltax() > 1">
                                <label class="col-md-4 control-label" for="IDCARD">เลขประจำตัวผู้เสียภาษี</label>  
                                <div class="col-md-4">
                                <?php if( $isUsername == 1) {?>
                                  <input id="IDCARD" name="IDCARD" type="text" placeholder="เลขประจำตัวผู้เสียภาษี" value="<?php echo $username_login["Nid"]; ?>" class="form-control input-md">
                                <?php } else { ?>
                                  <input id="IDCARD" name="IDCARD" type="text" placeholder="เลขประจำตัวผู้เสียภาษี" class="form-control input-md">
                                <?php } ?>
                                  
                                </div>
                              </div>


                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="textinput">ชื่อผู้รับสินค้า</label>  
                                <div class="col-md-4">
                                  <?php if( $isUsername == 1) {?>
                                      <input type="text" name="txtName"  placeholder="ชื่อผู้รับสินค้า" class="form-control input-md" required="required" 
                                      value="<?php echo $username_login["FullName"] ." ". $username_login["LastName"]; ?>"/>
                                  <?php } else { ?>
                                      <input type="text" name="txtName"  placeholder="ชื่อผู้รับสินค้า" class="form-control input-md" required="required" 
                                  value=""/>
                                  <?php } ?>
                                </div>
                              </div>

                              <!-- Textarea -->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="textarea">ที่อยู่ที่ต้องการรับสินค้า</label>
                                <div class="col-md-4"> 
                                  <?php if( $isUsername == 1) {?>
                                      <textarea class="form-control" name="txtAddress"><?php echo trim($username_login["ARecieve"]);?></textarea>
                                  <?php } else { ?>
                                      <textarea class="form-control" name="txtAddress"></textarea>
                                  <?php } ?>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-md-4 control-label" for="passwordinput">เบอร์โทรติดต่อกลับ</label>
                                <div class="col-md-4">
                                  <?php if( $isUsername == 1) {?>
                                      <input type="text" name="txtTel" id="txtTel" required="required" class="form-control input-md" placeholder="เบอร์โทรติดต่อกลับ" maxlength="12" value="<?php echo $username_login["Mobile"];?>" />
                                  <?php } else { ?>
                                      <input type="text" name="txtTel" id="txtTel" class="form-control input-md" placeholder="เบอร์โทรติดต่อกลับ" required="required" maxlength="12" value="" />
                                  <?php } ?>
                                </div>
                              </div>

                              <!-- Select Basic -->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="selectbasic">เลือกการจัดส่ง</label>
                                <div class="col-md-4">
                                  <select id="txtTransport" name="txtTransport" class="form-control">
                                    <option>EMS</option>
                                    <option>SDS(ภาคใต้)</option>
                                    <option>Kerry Express(ทั่วประเทศ)</option>
                                    <option>สยามเฟิร์ส(ภาคเหนือ)</option>
                                  </select>
                                </div>
                              </div>

                              <!-- Text input-->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="txtEmail">อีเมล์ติดต่อกลับ</label>  
                                <div class="col-md-4">
                                <?php if( $isUsername == 1) {?>
                                      <input type="text" name="txtEmail" id="txtEmail" required="required "placeholder="อีเมล์ติดต่อกลับ"  class="form-control input-md" value="<?php echo $username_login["Email"];?>" />
                                  <?php } else { ?>
                                      <input id="txtEmail" name="txtEmail" type="email" placeholder="อีเมล์ติดต่อกลับ" class="form-control input-md" required="required">
                                  <?php } ?>
                                </div>
                              </div>

                              <!-- Button -->
                              <div class="form-group">
                                <label class="col-md-4 control-label" for="singlebutton"></label>
                                <div class="col-md-4">
                                  <button  type="submit" name="Submit" class="btn btn-primary">ยืนยันการสั่งซื้อ</button>
                                  <div class="form-group" ng-if="isProscess==true">
                                      <hr>
                                      <div class="progress progress-striped active">
                                          <div class="progress-bar progress-bar-success" style="width:70%"></div>
                                      </div>                 
                                  </div>
                                </div>
                              </div>
                              </fieldset>
                          </form>
                      </div>
                      <div ng-if="sumTotal() < 1 " class="commerce">
                          <p class="cart-empty">คุณไม่มีสินค้าในตะกร้า</p>
                          <p class="return-to-shop"><a class="button wc-backward rounded" href="<?php echo base_url('products') ?>">กลับไปเลือกสินค้า</a></p>
                      </div>                     
                  </div>
              </div>
              
            </div>
        </div>
    </div>
    <!-- End Grid Product -->
</div>
<!-- End Content -->