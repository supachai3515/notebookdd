<div id="page-wrapper" ng-app="myApp">
    <div class="container-fluid" ng-controller="myCtrl">
        <div class="page-header">
            <h1>สมาชิก<small> สมาชิก dealer </small></h1>
            <?php //if(isset($sql))echo "<p>".$sql."</p>"; ?>
        </div>
        <form action="<?php echo base_url('members/search');?>" method="POST" class="form-inline" role="form">
        
            <div class="form-group">
                <label class="sr-only" for="">search</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="ชื่อ">
            </div>
    
            <button type="submit" class="btn btn-primary">ค้นหา</button>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ชื่อ</th>
                        <th>รายละเอียด</th>
                        <th>ที่อยู่จัดส่งสินค้า</th>
                        <th>ที่อยู่ใบกำกับภาษี</th>
                        <th>tax number</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($members_list as $member): ?>
                    <tr>
                        <td>
                             <span>name : <strong><?php echo $member['first_name'].' '.$member['last_name']; ?></strong></span><br/>
                              <span>username : <strong><?php echo $member['username']; ?></strong></span><br/>
                               <span>password : <strong><?php echo $member['password']; ?></strong></span>
                        
                        </td>
                        <td>
                            <span>tel : </span><?php echo $member['tel']; ?><br/>
                            <span>mobile : </span><?php echo $member['mobile']; ?><br/>
                            <span>email : </span><?php echo $member['email']; ?>
                        </td>
                        <td>
                            <span><?php echo $member['address_receipt']; ?></span>
                           
                        </td>
                        <td>
                            <span><?php echo $member['address_tax']; ?></span>
                        </td>
                        <td>
                            <span><?php echo $member['tax_number']; ?></span>
                        </td>
                        <td>
                             <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($member['date']));?></span>
							<br/>
                               <?php if ($member['verify']=="1"): ?>
                                <span class="text-success"><i class="fa fa-check"></i> ยืนยันแล้ว</span>
                                <br/>
                            <?php else: ?>
                                <span class="text-danger"><i class="fa fa-times"></i> ยังไม่ได้ยืนยัน</span>
                                <br/>
                                <a class="btn btn-xs btn-info" href="<?php echo base_url('members/confirm/'.$member['id']) ?>" role="button"> ยืนยันการสมัคร</a><br/>
                            <?php endif ?>
							
                               <?php if ($member['is_active']=="1"): ?>
                                <span><i class="fa fa-check"></i> ใช้งาน</span>
                                <br/>
                            <?php else: ?>
                                <span class="text-danger"><i class="fa fa-times"></i> ยกเลิก</span>
                                <br/>
                            <?php endif ?>
                        </td>
                        <td><a class="btn btn-xs btn-info" href="<?php echo base_url('members/edit/'.$member['id']) ?>" role="button"><i class="fa fa-pencil"></i> แก้ไข</a></td>       
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