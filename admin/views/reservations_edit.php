<div id="page-wrapper" ng-app="myApp">
    <div class="container-fluid" ng-controller="myCtrl">
        <div class="page-header">
          <h1>ใบสั่งซื้อสินค้า <strong>#<?php echo $reservations_data['id'] ?></h1>
        </div>
       
        <div style="padding-top:30px;"></div>
        <form action="<?php echo base_url('reservations/update_status/'.$reservations_data['id']); ?>" method="POST" class="form-inline" role="form">
          <div class="form-group">
            <label class="sr-only" for="">สถานะ</label>
             <select id="select_status" name="select_status" class="form-control">
                <?php foreach ($order_status_list as $status): ?>
                    <?php if ($status['id'] == $reservations_data['order_status_id']): ?>
                        <option value="<?php echo $status['id']; ?>" selected><?php echo $status['name']; ?></option>
                    <?php else: ?>
                        <option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option>
                    <?php endif ?>          
                <?php endforeach ?>
            </select>
          </div>
          <div class="form-group">
            <label class="sr-only" for="">description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="รายละเอียด">
          </div>
      
          <button type="submit" class="btn btn-primary">เปลี่ยน</button>
        </form>

        <h4 class="text-info">ข้อมูลการสั่งซื้อ</h4>
            <div class="table-responsive">
              <table class="table table-hover">
                  <thead>
                      <tr>
                          <th>สถานะ</th>
                          <th>#</th>
                          <th>จำนวน</th>
                          <th>ส่งไปยัง</th>
                          <th>รวม</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>
                              <strong><?php echo $reservations_data['order_status_name'];?></strong><br/>
                               <?php if (isset($reservations_data['trackpost'])) : ?>
                                <?php if ($reservations_data['trackpost'] !=""): ?>
                                   <span>traking : </span>  <strong><?php echo $reservations_data['trackpost'];?></strong><br/>
                                <?php endif ?>
                              <?php endif ?>
                          </td>
                          <td>
                              <span>เลขที่ใบเสร็จ : <strong>#<?php echo $reservations_data['id'] ?></strong></span><br/>
                              <span>โดย : <strong><?php echo $reservations_data['name'] ?></strong></span><br/>
                              <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($reservations_data['date']));?></span>

                          </td>
                          <td>
                              <span><strong><?php echo $reservations_data['quantity'] ?></strong> item</span><br/>
                          </td>
                          <td>
                              <strong>ที่อยู่ : </strong><span><?php echo $reservations_data['address']; ?></span><br/>
                              <strong>วิธีการจัดส่ง : </strong><span><?php echo $reservations_data['shipping']; ?></span><br/>
                              <strong>อีเมลล์ : </strong><span><?php echo $reservations_data['email']; ?></span><br/>
                              <strong>เบอร์โทร : </strong><span><?php echo $reservations_data['tel']; ?></span><br/>
                              <?php if ($reservations_data['is_tax']=="1"): ?>
                                <h4>ออกใบกำภาษี</h4>
                                 <strong>เลขที่ผุ้เสียภาษี : </strong><span><?php echo $reservations_data['tax_id']; ?></span><br/>
                                 <strong>บริษัท : </strong><span><?php echo $reservations_data['tax_company']; ?></span><br/>
                                <strong>ที่อยู่ : </strong><span><?php echo $reservations_data['tax_address']; ?></span><br/>
                          
                            <?php endif ?>
                             
                          </td>
                             
                          <td>
                               <strong ng-bind="<?php echo $reservations_data['total'];?> | currency:'฿':0"></strong>
                          </td>
                      </tr>
                  </tbody>
              </table>
          </div>
          

        <form action="<?php echo base_url('reservations/update_reservations/'.$reservations_data['id']); ?>" method="POST" class="form-inline" role="form">
          <div class="form-group">
            <label class="" for="">กำหนดวันที่รับสินค้า</label>
            <input type="number" class="form-control" id="wating_date" name="wating_date" 
            <?php if (isset($order_reservations['wating_date'])): ?>
              value="<?php echo $order_reservations['wating_date']; ?>"
            <?php endif ?>
            placeholder="วันที่รอรับสินค้า">
          </div>
      
          <button type="submit" class="btn btn-primary">กำหนด</button>
        </form>
        <div style="padding-top:30px;"></div>
        <?php if (isset($order_reservations['wating_date'] )): ?>
        
         <div class="table-responsive">
           <table class="table table-hover">
             <thead>
               <tr>
                 <th>จำนวนวันที่รอ</th>
                 <th>ลูกค้ายืนยัน</th>
                 <th>วันที่เริ่ม</th>
                 <th>วันที่สิ้นสุด</th>
                 
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td><span>วันที่รอ : </span><?php echo $order_reservations['wating_date'] ?> <span> วัน</span></td>
                 <td><?php echo $order_reservations['is_confirm'] ?></td>
                 <td><?php echo $order_reservations['start_date'] ?></td>
                 <td><?php echo $order_reservations['expirtdate'] ?></td>
               </tr>
             </tbody>
           </table>
         </div>
        <?php endif ?>
       

        <div class="row">
          <div class="col-md-8">

          <h4 class="text-info">รายละเอียดสินค้า</h4>
          <div class="table-responsive">
            <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <th>sku</th>
                  <th>name</th>
                  <td>quantity</td>
                  <td>price</td>
                  <td>vat</td>
                  <td>total</td>
                </tr>
              </thead>
              <tbody>
              <?php  $sum_price=0; foreach ($reservations_detail as $value): ?>
                <tr>
                  <td><?php echo  $value['sku'] ?></td>
                  <td><?php echo  $value['product_name'] ?></td>
                  <td><?php echo  $value['quantity'] ?></td>
                  <td><?php echo  $value['price'] ?></td>
                  <td><?php echo  $value['vat'] ?></td>
                  <td><?php echo  $value['total']-$value['vat'] ?></td>
                </tr>

              <?php $sum_price = $sum_price+($value['total']-$value['vat']); endforeach ?>

                <tr>
                  <td colspan="5" class="text-right"><strong>รวม</strong></td>
                  <td class="text-right"><ins ><?php echo  $sum_price ?></ins></td>
                </tr>

                <tr>
                  <td colspan="5" class="text-right"><strong>vat</strong></td>
                  <td class="text-right"><ins ><?php echo  $reservations_data['vat'] ?></ins></td>
                </tr>
                <tr>
                  <td colspan="5" class="text-right"><strong>ค่าจัดส่ง</strong></td>
                  <td class="text-right"><ins class="text-right"><?php echo  $reservations_data['shipping_charge'] ?></ins></td>
                </tr>
                 <tr>
                  <td colspan="5" class="text-right"><strong>รวมทั้งหมด</strong></td>
                  <td class="text-right"><ins class="text-right"><?php echo  $reservations_data['total'] ?></ins></td>
                </tr>
                
              </tbody>
            </table>

            <form action="<?php echo base_url('reservations/update_tracking/'.$reservations_data['id']); ?>" method="POST" class="form-inline" role="form">
              
              <div class="form-group">
                <label class="sr-only" for="">tracking</label>
                <input type="text" class="form-control" id="tracking" name="tracking"
                <?php if (isset($reservations_data['trackpost'])): ?>
                  value="<?php echo $reservations_data['trackpost']; ?>"
                <?php endif ?>
             placeholder="tracking number">
              </div>
          
              <button type="submit" class="btn btn-primary">ส่งรหัส tracking</button>
            </form>
          </div>
            
          </div>
          <div class="col-md-4">
            <h4 class="text-info">สถานะสินค้า</h4>
            <div class="well">
              <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>status</th>
                    <th>description</th>
                    <th>วันที่</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach ($order_status_history_list as $value): ?>
                  <tr>
                    <td><?php echo  $value['order_status_name'] ?></td>
                    <th><?php echo  $value['description'] ?></th>
                    <th><?php echo date("d-m-Y H:i", strtotime($value['create_date']));?></th>
                  </tr>
                <?php endforeach ?>
                  
                </tbody>
              </table>
            </div>
              
            </div>

          </div>
        </div>
        
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
