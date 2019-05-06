<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class='active'>ยืนยันการสั่งซื้อ</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
        <?php if($this->session->flashdata('msg') != ''){
        echo '  <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$this->session->flashdata('msg').'
        </div>';
          }?>
        <div class="row inner-bottom-sm">
            <div class="shopping-cart">
            <?php if ($this->cart->contents()): ?>
                      
                <div class="col-md-12 col-sm-12 shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="cart-description item">รูป</th>
                                    <th class="cart-product-name item">ชื่อ</th>
                                
                                    <th class="cart-qty item">จำนวน</th>
                                    <th class="cart-sub-total item">ราคา</th>
                                    <th class="cart-total last-item">รวมทั้งหมด</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="<?php echo base_url('cart') ?>" class="btn btn-upper btn-primary outer-left-xs"><i class="fas fa-chevron-left"></i> กลับไปแก้ไขสินค้า</a>
                                               
                                                <?php if ($is_tax == 0 ): ?>
                                                <a  href="<?php echo base_url('checkout/tax') ?>" class="btn btn-upper btn-primary pull-right outer-right-xs"><i class="fas fa-file-invoice-dollar"></i> ออกใบกำกับภาษี </a>
                                                </a>

                                            <?php else: ?>
                                            <a  href="<?php echo base_url('checkout') ?>" class="btn btn-upper btn-primary pull-right outer-right-xs"><i class="fas fa-file-invoice-dollar"></i> ยกเลิกการออกใบกำกับภาษี </a>
                                                
                                            <?php endif ?>
                    
                    
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 1;
                                    $productResult = array();
                                    $productResult  = $this->initdata_model->get_cart_data();
                                 ?>
                                <?php foreach($this->cart->contents() as $items): ?>
                                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                                <?php foreach ($productResult as $row): ?>
                                <?php if ($row['rowid']== $items['rowid']): ?>
                                <tr>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="<?php echo base_url('product/'.$row['slug']) ?>">
                                            <img src="<?php echo $row['img']; ?>" class="img-responsive" alt="" width="100">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="<?php echo base_url('product/'.$row['slug']) ?>">  <?php echo $row['name']; ?></a></h4>
                                     
                                        <div class="cart-product-info">
                                        <?php if ($row['sku']!=''): ?>
                                            <span class="product-imel">SKU:<span><?php echo $row['sku']; ?></span></span><br>
                                        <?php endif ?>
                                         
                                        </div>
                                    </td>
                    
                                    <td class="cart-product-sub-total">
                                         
                                    <span class="cart-sub-total-price"><?php echo $row['qty']; ?></span>
                                        
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $this->cart->format_number($row['price']); ?></span>
                                    </td>
                                    <td class="cart-product-grand-total"><span
                                            class="cart-grand-total-price"><?php echo $this->cart->format_number($items['subtotal']); ?></span></td>
                                </tr>
                             
                                <?php endif ?>
                                    <?php endforeach ?>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>

                                    <?php if ($is_tax == 0 ): ?>
                        
                                <tr>
                                    <td colspan="2" rowspan="4"></td>
                                    <td colspan="2"  class="cart-product-name-info"> 
                                      <h4>ราคารวมสินค้า</h4>
                                  </td>
                                  <td  colspan="2" class="cart-product-grand-total">
                                    <span class="cart-grand-total-price"> <?php echo $this->cart->format_number($this->cart->total()); ?></span>
                                  </td>
                                  
                                </tr>
                                <tr>
                                <td colspan="2"  class="cart-product-name-info"> 
                                      <h4>ค่าจัดส่งสินค้า</h4>
                                  </td>
                                  <td  colspan="2" class="cart-product-grand-total">
                                    <span class="cart-grand-total-price" ng-bind="shipping_price + spcial_price | currency:'' "></span>
                                  </td>
                                </tr>
                                <tr>
                                <td colspan="2"  class="cart-product-name-info"> 
                                      <h4>รวมทั้งหมด</h4>
                                  </td>
                                  <td  colspan="2" class="cart-product-grand-total">
                                    <span class="cart-grand-total-price" ng-bind="<?php echo $this->cart->total();?> + shipping_price + spcial_price | currency:'' "></span>
                                  </td>
                                    
                                </tr>
                           
                            <?php else: ?>

                             
                                <tr>
                                    <td colspan="2" rowspan="5"></td>
                                    <td colspan="2">ราคารวมสินค้า</td>
                                    <td colspan="2"  class="cart-product-grand-total">
                                    <span class="cart-grand-total-price"> <?php echo $this->cart->format_number($this->cart->total()); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">ภาษีมูลค่าเพิ่ม 7%</td>
                                    <td colspan="2" class="cart-product-grand-total"><span class="cart-grand-total-price"> <?php echo $this->cart->format_number($this->cart->total()*7 /107); ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">ค่าจัดส่งสินค้า</td>
                                    <td colspan="2" class="cart-product-grand-total"><span class="cart-grand-total-price" ng-bind="shipping_price + spcial_price | currency:'' "></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="total"><span>รวมทั้งหมด</span></td>
                                    <td colspan="2" class="cart-product-grand-total"><span class="cart-grand-total-price" ng-bind="<?php echo $this->cart->total();?> + shipping_price + spcial_price | currency:'' ">
                                </tr>
                          

                            <?php endif ?>


                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 estimate-ship-tax">
               
                <table class="table table-bordered">
		<thead>
			<tr>
				<th>
					<span class="estimate-title text-center">กรุณากรอกรายละเอียดที่อยู่ เพื่อรับสินค้าจากเว็บไซต์</span>
					 
				</th>
			</tr>
            </thead><!-- /thead -->
            <tbody>
                    <tr>
                        <td>
                        <form class="form-horizontal" ng-submit="ckeckoutSubmit()"  name="form1" method="post" action="<?php echo base_url('checkout/save'); ?>" OnSubmit="return chkSubmit();">
                                <!-- Multiple Radios -->
                                <div class="form-group " hidden="true">
                                    <label class="info-title control-label">รูปแบบการออกใบเสร็จ</label>
                                    <?php if ($is_tax == 0 ): ?>
                                            <label><input type="checkbox" name="purchase" id="p2"> ใบกำกับภาษี</label><br />
                                        <?php else: ?>
                                            <label><input type="checkbox" name="purchase" id="p2" checked> ใบกำกับภาษี</label><br />
                                        <?php endif ?>

                                </div>

                                <?php if ($is_tax == 1): ?>

                                    <!-- Text input-->
                                <div class="form-group">
                                    <label class="info-title control-label">ชื่อบริษัท / ร้าน</label>
                                 
                                    <?php if( $isUsername == 1) {?>
                                    <input id="company" name="company" type="text" placeholder="ชื่อบริษัท / ร้าน" value="<?php echo $username_login["Company"]; ?>" class="form-control unicase-form-control text-input">
                                    <?php } else { ?>
                                    <input id="company" name="company" type="text" placeholder="ชื่อบริษัท / ร้าน" class="form-control unicase-form-control text-input">
                                    <?php } ?>

                                </div>


                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="info-title control-label" for="purchase_address">ชื่อ / ที่อยู่สำหรับออกใบกำกับภาษี</label>
                                
                                    <?php if( $isUsername == 1) {?>
                                        <textarea class="form-control" name="purchase_address"><?php echo trim($username_login["AVat"]);?></textarea>
                                    <?php } else { ?>
                                        <textarea class="form-control" name="purchase_address"></textarea>
                                    <?php } ?>
                                 
                                </div>

                                <!-- Text input-->
                                <div class="form-group" >
                                    <label class="info-title control-label" for="IDCARD">เลขประจำตัวผู้เสียภาษี</label>
                                 
                                    <?php if( $isUsername == 1) {?>
                                    <input id="IDCARD" name="IDCARD" type="text" placeholder="เลขประจำตัวผู้เสียภาษี" value="<?php echo $username_login["Nid"]; ?>" class="form-control unicase-form-control text-input">
                                    <?php } else { ?>
                                    <input id="IDCARD" name="IDCARD" type="text" placeholder="เลขประจำตัวผู้เสียภาษี" class="form-control unicase-form-control text-input">
                                    <?php } ?>

                                  
                                </div>


                                <?php endif ?>


                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="info-title control-label" for="textinput">ชื่อผู้รับ</label>
                                  
                                    <?php if( $isUsername == 1) {?>
                                        <input type="text" name="txtName"  placeholder="ชื่อผู้รับ" class="form-control unicase-form-control text-input" required="required"
                                        value="<?php echo $username_login["FullName"] ." ". $username_login["LastName"]; ?>"/>
                                    <?php } else { ?>
                                        <input type="text" name="txtName"  placeholder="ชื่อผู้รับ" class="form-control unicase-form-control text-input" required="required"
                                    value=""/>
                                    <?php } ?>
                                 
                                </div>

                                <!-- Textarea -->
                                <div class="form-group">
                                    <label class="info-title control-label" for="textarea">ที่อยู่จัดส่ง</label>
                                   
                                    <?php if( $isUsername == 1) {?>
                                        <textarea class="form-control" name="txtAddress"><?php echo trim($username_login["ARecieve"]);?></textarea>
                                    <?php } else { ?>
                                        <textarea class="form-control" name="txtAddress"></textarea>
                                    <?php } ?>
                                
                                </div>

                                <div class="form-group">
                                    <label class="info-title control-label" for="passwordinput">เบอร์โทร</label>
                              
                                    <?php if( $isUsername == 1) {?>
                                        <input type="text" name="txtTel" id="txtTel" required="required" class="form-control unicase-form-control text-input" placeholder="เบอร์โทร" maxlength="12" value="<?php echo $username_login["Mobile"];?>" />
                                    <?php } else { ?>
                                        <input type="text" name="txtTel" id="txtTel" class="form-control unicase-form-control text-input" placeholder="เบอร์โทร" required="required" maxlength="12" value="" />
                                    <?php } ?>
                           
                                </div>


                                <!-- Select Basic -->
                                <div class="form-group">
                                    <label class="info-title control-label" for="txtTransport">เลือกการจัดส่ง</label>
                                    <input type="hidden" name="shipping_price" value="{{shipping_price + spcial_price}}">
                
                                        <select id="txtTransport" name="txtTransport" class="form-control" ng-model="txtTransport" ng-change="changeShipping(txtTransport)"
                                                ng-model="txtTransport"
                                                ng-options="shipping.id as shipping.name for shipping in shipping_method track by shipping.id "
                                                required>
                                        <option value="">เลือกวิธีการจัดส่ง</option>
                                        </select>
                                        <span ng-show="form1.txtTransport.$error.required" class="text-danger">กรุณาเลือกวิธีการจัดส่ง</span>
                                        <p>ค่าจัดส่งสินค้า : {{shipping_price + spcial_price}}</p>
                                 

                                </div>

                                <div class="well" ng-if="txtTransport==2">
                                    <div class="form-group" ng-if="txtTransport==2">
                                    <label class="info-title control-label" for="province">จังหวัด</label>
                                    <
                                        <select id="province" name="province" class="form-control"  ng-change="changeProvince(province)"
                                                ng-model="province"
                                                ng-options="province.id as province.name for province in province_list track by province.id "
                                                required>
                                                <option value="">เลือกจังหวัด</option>
                                        </select>
                                        <span ng-show="form1.province.$error.required" class="text-danger">กรุณาเลือกจังหวัด</span>
                                  
                                </div>
                                <div class="form-group" ng-if="items.length > 1">
                                    <label class="info-title control-label" for="amphur_id">อำเภอ</label>
                                 
                                        <select id="amphur_id" name="amphur_id" class="form-control"  ng-change="changeAmphur(amphur_id)"
                                                ng-model="amphur_id"
                                                ng-options="amphur.id as amphur.name for amphur in items track by amphur.id "
                                                required>
                                                <option value="">เลือกอำเภอ</option>
                                        </select>
                                        <span ng-show="form1.amphur_id.$error.required" class="text-danger">กรุณาเลือกอำเภอ</span>
                                 
                                </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group">
                                    <label class="info-title control-label" for="txtEmail">อีเมล์</label>
                                   
                                    <?php if( $isUsername == 1) {?>
                                        <input type="text" name="txtEmail" id="txtEmail" required="required "placeholder="อีเมล์"  class="form-control unicase-form-control text-input" value="<?php echo $username_login["Email"];?>" />
                                    <?php } else { ?>
                                        <input id="txtEmail" name="txtEmail" type="email" placeholder="อีเมล์" class="form-control unicase-form-control text-input" required="required">
                                    <?php } ?>
                                </div>

                                <div class="pull-right">
                                    <button type="submit" name="Submit" class="btn-upper btn btn-primary">ยืนยันการสั่งซื้อ</button>
                                </div>

                                <!-- Button -->
                                <div class="form-group">
                                    <label class="info-title control-label" for="singlebutton"></label>

                                    <div class="form-group" ng-if="isProscess==true">
                                        <hr>
                                            <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success" style="width:70%"></div>
                                        </div>
                                    </div>
                                    <h4 class="text-success" ng-bind="message_prosecss"></h4>

                                </div>
                                
                            </form>
                           
                        </td>
                    </tr>
            </tbody>
        </table>
 

                       
        
                        </div>
                <?php endif ?>
                    </div><!-- /.shopping-cart -->
                </div> <!-- /.row -->
        
            </div><!-- /.container -->
        </div><!-- /.body-content -->