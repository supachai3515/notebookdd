<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'> สถานะสินค้า</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
        <div class="row inner-bottom-sm">
            <div class="row">
                <div class="col-md-12">
                   <div class="row multistep">
                        <div class="col-xs-4">
                            <div class="text-center multistep-stepname"><h4>สั่งซื้อ</h4></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4">
                            <div class="text-center multistep-stepname"><h4>ชำระเงิน</h4></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="<?php if ($order['order_status_id']>1): ?>width: 100%<?php endif ?>">
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-4 multistep-step">
                            <div class="text-center multistep-stepname"><h4>ส่งสินค้า</h4></div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="<?php if ($order['order_status_id']==4): ?>width: 100%<?php endif ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-top:30px;">
            <?php if (count($order_reservations) > 0): ?>
                <?php if ($order_reservations['wating_date'] !=""): ?>
                   <div class="panel panel-info">
                       <div class="panel-heading">
                           <h3 class="panel-title">สินค้าจอง</h3>
                       </div>
                       <div class="panel-body">
                            <?php if ($order_reservations['is_confirm']): ?>
                                <p>ระยะเวลาการรอสินค้า : 

                                <?php
                                 $date1=date_create($order_reservations['start_date']);
                                  $date2=date_create($order_reservations['expirtdate']);
       
                                ?>
                                    <i class="fa fa-calendar"></i> <?php echo date_format($date1,"d/m/Y"); ?> - 
                                    <i class="fa fa-calendar"></i> <?php echo date_format($date2,"d/m/Y"); ?>
                                </p>
                            <?php else: ?>
                                 ระยะเวลารอรับสินค้าไม่เกิน <i class="fa fa-calendar"></i> <?php echo $order_reservations['wating_date']; ?> หลังจากการยืนยัน
                               <p class="text-danger">รอการยืนยัน</p>
                            <?php endif ?>
                       </div>
                   </div>
                <?php endif ?>
            <?php else: ?>
                <?php if($order['is_reservations'] == 1 ) { ?>
                   
                        <div class="alert alert-info">
                            <strong><u>สินค้าจอง</u> กรุณารอทางร้านติดต่อกลับเพื่อทำการยืนยันการจองอีกครั้ง อาจจะใช้เวลา 3 - 30 วัน</strong>
                        </div>
                   
                <?php } ?> 
            <?php endif ?>
            </div>

            <div class="shopping-cart">
            <div class="row">
                <div class="col-md-4 col-sm-12 estimate-ship-tax" style="margin-top: 20px;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">
                                        <?php if ($order['is_reservations'] == 1): ?>เลขที่ใบจอง #BO<?php echo $order['id']; ?>
                                        <?php else: ?>
                                            เลขที่ใบสั่งซื้อ #<?php echo $order['order_docno']; ?>
                                        <?php endif ?></span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                    <strong>สั่งเมื่อวันที่ <?php echo $order['date']?></strong><br/> 
                                    <span>กรุณาชำระเงินภายใน 3 วัน </span><br/><br/>
                                    <a target="_blank"class="btn btn-upper btn-primary" href="<?php echo base_url('invoice/'.$order['ref_id']) ?>"  role="button">
                                    <?php if ($order['is_reservations'] == 1): ?>
                                        ใบจอง
                                    <?php else: ?>
                                        ใบสั่งซื้อ
                                    <?php endif ?></a>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">ที่อยู่สำหรับจัดส่งสินค้า</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <p><?php echo $order["name"];?> , <?php echo $order["address"];?>
                                        โทร: <?php echo $order["tel"];?><br/>
                                        Email: <?php echo $order["email"];?><br/> 
                                        ประเภทการจักส่ง: <?php echo $order["shipping"];?>
                                        <?php if (isset($order["trackpost"])): ?>
                                            , tracking: <?php echo $order["trackpost"];?>
                                        <?php endif ?>
                                        </p>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    <?php if($order['is_tax'] == 1 ) { ?>
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <span class="estimate-title">ที่อยู่สำหรับออกใบกำกับภาษี</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <p>
                                        ชื่อ : <?php echo $order["name"];?><br/>
                                        ชื่อบริษัท / ร้าน : <?php echo $order["tax_company"];?><br/>
                                        ที่อยู่ : <?php echo $order["tax_address"];?><br/>
                                        เบอร์ติดต่อ : <?php echo $order["tel"];?><br/>
                                        อีเมล์ : <?php echo $order["email"];?><br/>
                                        เลขประจำตัวผู้เสียภาษี: <?php echo $order["tax_id"];?>
                                        </p>
                                    </td>
                                </tr>
                        </tbody><!-- /tbody -->
                    </table><!-- /table -->
                    <?php } ?>
                </div>
                <div class="col-md-8 col-sm-12 shopping-cart-table ">
                    <?php if($order['customer_id'] != ""){ ?> 
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h4>สมาชิก Dealer</h4>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="cart-product-name item">ข้อมูลสินค้า</th>
                                    <th class="cart-sub-total item">ราคา</th>
                                    <th class="cart-qty item">จำนวณ</th>
                                    <th class="cart-total last-item">ยอดรวม</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                                <tr>
                                    <td colspan="4" style="font-size: 18px;font-family: 'FjallaOneRegular';font-size: 20px;color: #555;">
                                        <div class="cart-sub-total"><span class="col-sm-3">ยอดรวม</span><span class="col-sm-6"><?php echo number_format($order['total'] - $order['vat'] - $order['shipping_charge'],2);?>&nbsp;บาท</span></div><br>
                                        <div class="cart-sub-total"><span class="col-sm-3"><?php if($order["is_tax"]==0){echo "VAT(0%)";}else{echo "VAT(7%)";} ?></span><span class="col-sm-6"><?php if($order["is_tax"]==0){echo "0.00";}else{echo number_format($order["vat"],2);} ?>&nbsp;บาท</span></div><br>
                                        <div class="cart-sub-total"><span class="col-sm-3">ค่าจัดส่ง</span><span class="col-sm-6">100.00&nbsp;บาท</span></div><br>
                                        <div class="cart-grand-total" style="color: #84b943;"><span class="col-sm-3">ยอดรวมทั้งสิ้น</span><span class="col-sm-6"><?php echo number_format($order["total"],2);?>&nbsp;บาท</span></div>
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php foreach ($order_detail as $value): ?>
                                <tr>
                                    <td class="cart-product-name-info">
                                        <h4 class="cart-product-description"><a target="_blank" href="<?php echo base_url("product/".$value['sku']) ?>"><?php echo $value['name'] ?></a></h4>
                                        <div class="cart-product-info">
                                            <span class="product-imel">sku:<span><?php echo $value['sku'] ?></span></span><br>
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total">
                                        <span class="cart-sub-total-price"><?php echo number_format($value['price_order'],2) ?></span>
                                    </td>
                                    <td class="cart-product-sub-total">
                                        <span class="cart-sub-total-price"><?php echo $value["quantity"];?></span>
                                        
                                    </td>
                                    <td class="cart-product-grand-total">
                                        <span class="cart-grand-total-price"><?php echo number_format($value['price_order']*$value["quantity"],2);?></span>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div><!-- /.shopping-cart-table -->
                </div>
                <div class="row">
                    <div class="col-md-4 col-sm-12 estimate-ship-tax">
                    </div><!-- /.estimate-ship-tax -->

                    <div class="col-md-8 col-sm-12 estimate-ship-tax">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        <span class="estimate-title">การชำระเงิน</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                        1.) ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารกรุงเทพ สาขาพาราไดซ์ พาร์ค เลขที่บัญชี :<strong> 0687-076-380</strong><br>
                                        2.) ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารไทยพาณิชย์ สาขาพาราไดซ์ พาร์ค เลขที่บัญชี :<strong> 175-2203-837</strong><br>
                                        3.) ชื่อบัญชี นายสมิด ตรวจมรคา กสิกรไทย สาขาพาราไดซ์ พาร์ค เลขที่บัญชี :<strong> 628-2014-074</strong><br>
                                        <p class="text-center text-success">เมื่อชำระเงินแล้ว กรุณาโทรแจ้ง 089 5072023 LINE ID: @notebookdd หรือแจ้งที่ อีเมล์ simpleitnotebook@gmail.com</p> 
                                        </td>
                                    </tr>
                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div><!-- /.estimate-ship-tax -->

                </div>
            </div><!-- /.shopping-cart -->
        </div><!-- /.row -->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- /.logo-slider -->
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div><!-- /.body-content -->