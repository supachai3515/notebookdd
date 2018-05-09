<div id="content">
    <div class="main-content">
        <div class="container">
            <div class="bread-crumb">
                <a href="<?php echo base_url(); ?>">Home</a> <span class="lnr lnr-chevron-right"></span> <span>สถาะนะสินค้า</span>
            </div>
            <div class="row">
                <div class="col-md-12">
                   <div class="row multistep">
                        <div class="col-xs-4 multistep-step complete">
                            <div class="text-center multistep-stepname"><i class="fa fa-shopping-cart"></i> สั่งซื้อ</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="" class="multistep-dot"></a>
                        </div>

                        <div class="col-xs-4 multistep-step <?php if ($order['order_status_id']>1): ?>complete<?php endif ?>">
                            <div class="text-center multistep-stepname"><i class="fa fa-money"></i> ชำระเงิน</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="" class="multistep-dot"></a>
                        </div>

                        <div class="col-xs-4 multistep-step <?php if ($order['order_status_id']==4): ?>complete<?php endif ?>">
                            <div class="text-center multistep-stepname"><i class="fa fa-truck"></i> ส่งสินค้า</div>
                            <div class="progress"><div class="progress-bar"></div></div>
                            <a href="" class="multistep-dot"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="" style="padding-top:30px;">
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

            <div class="row"  style="padding-top:30px;">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                        <?php if ($order['is_reservations'] == 1): ?>
                            เลขที่ใบจอง #BO<?php echo $order['id']; ?>
                        <?php else: ?>
                             เลขที่ใบสั่งซื้อ #<?php echo $order['id']; ?>
                        <?php endif ?>

                        </h3>
                    </div>
                    <div class="panel-body">
                        <strong>สั่งเมื่อวันที่ <?php echo $order['date']?></strong><br/> 
                        <span>กรุณาชำระเงินภายใน 3 วัน </span><br/><br/>
                        <a target="_blank"class="btn btn-default" href="<?php echo base_url('invoice/'.$order['ref_id']) ?>"  role="button">
                        <?php if ($order['is_reservations'] == 1): ?>
                              ใบจอง
                        <?php else: ?>
                             ใบสั่งซื้อ
                        <?php endif ?></a> 
                    </div>
                </div>

                  <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">ที่อยู่สำหรับจัดส่งสินค้า</h3>
                    </div>
                    <div class="panel-body">
                        <p><?php echo $order["name"];?> , <?php echo $order["address"];?>
                        โทร: <?php echo $order["tel"];?><br/>
                        Email: <?php echo $order["email"];?><br/> 
                        ประเภทการจักส่ง: <?php echo $order["shipping"];?>
                        <?php if (isset($order["trackpost"])): ?>
                            , tracking: <?php echo $order["trackpost"];?>
                        <?php endif ?>
                        </p>
                    </div>
                </div>

                <?php if($order['is_tax'] == 1 ) { ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <h3 class="panel-title">ที่อยู่สำหรับออกใบกำกับภาษี</h3>
                    </div>
                        <div class="panel-body">
                            <p>
                            ชื่อ : <?php echo $order["name"];?><br/>
                            ชื่อบริษัท / ร้าน : <?php echo $order["tax_company"];?><br/>
                            ที่อยู่ : <?php echo $order["tax_address"];?><br/>
                            เบอร์ติดต่อ : <?php echo $order["tel"];?><br/>
                            อีเมล์ : <?php echo $order["email"];?><br/>
                            เลขประจำตัวผู้เสียภาษี: <?php echo $order["tax_id"];?>
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-md-8">

            

            <?php if($order['customer_id'] != ""){ ?> 
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h4>สมาชิก Dealer</h4>
                    </div>
                </div>
            <?php } ?>

             <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center">รายละเอียด</td>
                                <td class="text-center sumpricepernum">ราคาต่อชิ้น</td>
                                <td class="text-center">จำนวน</td>
                                <td class="text-right">ราคารวม</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($order_detail as $value): ?>
                             <tr>
                                <td class="lineover">
                                    sku : <?php echo $value['sku'] ?><br/>
                                    <a target="_blank" href="<?php echo base_url("product/".$value['sku']) ?>">
                                        <?php echo $value['name'] ?>
                                    </a>
                                </td>
                                <td class="text-center">
                                    <?php echo number_format($value['price_order'],2) ?>
                                </td>
                                <td class="text-center"><?php echo $value["quantity"];?></td>
                                <td class="text-right"><?php echo number_format($value['price_order']*$value["quantity"],2);?></td>
                              </tr>
                        <?php endforeach ?>

                          <tr>
                                <td colspan="3" class="text-right">รวมราคาสินค้า</td>
                                <td class="highrow text-right"><?php echo number_format($order['total'] - $order['vat'] - $order['shipping_charge'],2);?>&nbsp;บาท</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="emptyrow text-right"><?php if($order["is_tax"]==0){echo "VAT(0%)";}else{echo "VAT(7%)";} ?></td>
                                <td class="emptyrow text-right"><?php if($order["is_tax"]==0){echo "0.00";}else{echo number_format($order["vat"],2);} ?>&nbsp;บาท</td>
                            </tr>
                             <tr>
                                <td colspan="3" class="emptyrow text-right">ค่าจัดส่ง</td>
                                <td class="emptyrow text-right">100.00&nbsp;บาท</td>
                            </tr>
                             <tr>
                                <td colspan="3" class="emptyrow text-right">รามราคาสุทธิ</td>
                                <td class="emptyrow text-right text-danger"><strong><?php echo number_format($order["total"],2);?>&nbsp;บาท</strong></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                 <div class="panel-heading">
                  <h3 class="panel-title">การชำระเงิน</h3>
                  </div>
                <div class="panel-body">
                    1.) ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารกรุงเทพ สาขาพาราไดซ์ พาร์ค เลขที่บัญชี :<strong> 0687-076-380</strong><br>
                    2.) ชื่อบัญชี นายสมิด ตรวจมรคา ธนาคารไทยพาณิชย์ สาขาพาราไดซ์ พาร์ค เลขที่บัญชี :<strong> 175-2203-837</strong><br>
                    3.) ชื่อบัญชี นายสมิด ตรวจมรคา กสิกรไทย สาขาพาราไดซ์ พาร์ค เลขที่บัญชี :<strong> 628-2014-074</strong><br>
                    <p class="text-center text-success">เมื่อชำระเงินแล้ว กรุณาโทรแจ้ง 089 5072023 LINE ID: @notebookdd หรือแจ้งที่ อีเมล์ simpleitnotebook@gmail.com</p> 

                </div>
            </div>
                
            </div>
        </div>
            </div>
        </div>

        </div>
    </div>
    <!-- End Grid Product -->
</div>
<!-- End Content -->
