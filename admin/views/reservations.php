<div id="page-wrapper" ng-app="myApp">
    <div class="container-fluid" ng-controller="myCtrl">
        <div class="page-header">
            <h1>ใบสั่งจองสินค้า</h1>
            <?php //if(isset($sql))echo "<p>".$sql."</p>"; ?>
        </div>
        <form action="<?php echo base_url('reservations/search');?>" method="POST" class="form-inline" role="form">

            <div class="form-group">
                <label class="sr-only" for="">เลขที่ใบเสร็จ</label>
                <input type="number" class="form-control" id="order_id" name="order_id" placeholder="เลขที่ใบเสร็จ">
            </div>
            <select id="select_status" name="select_status" class="form-control">
                <?php foreach ($order_status_list as $status): ?>
                        <option value="<?php echo $status['id']; ?>"><?php echo $status['name']; ?></option> 
                <?php endforeach ?>
                <option value="0" selected>ทั้งหมด</option> 
            </select>
        
            <div class="form-group">
                <label class="sr-only" for="">search</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="ชื่อ , tracking">
            </div>
    
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>สถานะ</th>
                        <th>#</th>
                         <th>การจอง</th>
                        <th>จำนวน</th>
                        <th>ส่งไปยัง</th>
                        <th>รวม</th>
                       
                        <th>ดู</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($reservations_list as $reservations): ?>
                    <tr>
                        <td>
                            <strong><?php echo $reservations['order_status_name'];?></strong><br/>
                            <?php if (isset($reservations['trackpost'])) : ?>
                                <?php if ($reservations['trackpost'] !=""): ?>
                                   <span>traking : </span>  <strong><?php echo $reservations['trackpost'];?></strong><br/>
                                <?php endif ?>
                            <?php endif ?>
                        </td>
                        <td>
                            <span>เลขที่ใบจอง : <strong>#<?php echo $reservations['id'] ?></strong></span><br/>
                            <span>โดย : <strong><?php echo $reservations['name'] ?></strong></span><br/>
                            <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($reservations['date']));?></span>

                        </td>

                        <td>
                            <?php if (isset($reservations['wating_date'])): ?>
                                <span>วันที่รอ : </span><?php echo $reservations['wating_date'] ?> <span> วัน</span>
                                <br/>
                            <?php else: ?>
                                <span class="text-danger">ยังไม่ได้กำหนดวันรอรับสินค้า</span>
                                <br/>
                            <?php endif ?>

                            <?php if (isset($reservations['start_date'])): ?>
                                <span>วันที่ยืนยัน : <i class="fa fa-calendar-o"> </i> <?php echo  date("d-m-Y H:i", strtotime($reservations['start_date']));?></span><br/>
                            <?php endif ?>

                            <?php if (isset($reservations['expirtdate'])): ?>
                                <span>วันที่สิ้นสุด : <i class="fa fa-calendar-o"></i> <?php echo  date("d-m-Y H:i", strtotime($reservations['expirtdate']));?></span><br/>
                            <?php endif ?>

                            <?php if ($reservations['is_confirm']=="1"): ?>
                                <span><i class="fa fa-check"></i> ยันยันแล้ว</span>
                                <br/>
                            <?php else: ?>
                                <span class="text-danger">ลูกค้ายังไม่ได้ยืนยัน</span>
                            <?php endif ?>
                        </td> 

                        <td>
                            <span><strong><?php echo $reservations['quantity'] ?></strong> item</span><br/>
                        </td>
                        <td>
                            <strong>ที่อยู่ : </strong><span><?php echo $reservations['address']; ?></span><br/>
                            <strong>วิธีการจัดส่ง : </strong><span><?php echo $reservations['shipping']; ?></span><br/>
                            <strong>อีเมลล์ : </strong><span><?php echo $reservations['email']; ?></span><br/>
                            <strong>เบอร์โทร : </strong><span><?php echo $reservations['tel']; ?></span><br/>
                            <?php if ($reservations['is_tax']=="1"): ?>
                                <h4>ออกใบกำภาษี</h4>
                                 <strong>เลขที่ผุ้เสียภาษี : </strong><span><?php echo $reservations['tax_id']; ?></span><br/>
                                 <strong>บริษัท : </strong><span><?php echo $reservations['tax_company']; ?></span><br/>
                                <strong>ที่อยู่ : </strong><span><?php echo $reservations['tax_address']; ?></span><br/>
                          
                            <?php endif ?>
                           
                        </td>
                        <td>
                             <strong ng-bind="<?php echo $reservations['total'];?> | currency:'฿':0"></strong>
                        </td>

                        
                        <td><a class="btn btn-xs btn-info" href="<?php echo base_url('reservations/edit/'.$reservations['id']) ?>" role="button"><i class="fa fa-eye"></i></a></td>       
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php if(isset($links_pagination)) {echo $links_pagination;} ?>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->