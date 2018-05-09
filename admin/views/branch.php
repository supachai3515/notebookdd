<div id="page-wrapper" ng-app="myApp">
    <div class="container-fluid" ng-controller="myCtrl">
        <div class="page-header">
            <h1>สมาชิก<small> สมาชิก dealer </small></h1>
            <?php //if(isset($sql))echo "<p>".$sql."</p>"; ?>
        </div>
        <form action="<?php echo base_url('branch/search');?>" method="POST" class="form-inline" role="form">
        
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
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <th>รายละเอียด</th>
                        <th>สถานะ</th>
                        <th>แก้ไข</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($branch_list as $branch): ?>
                    <tr>
                        <td>
                            <span>รหัส : <strong><?php echo $branch['id'] ?></strong></span><br/>

                        </td>
                        <td>
                            <span>name : <strong><?php echo $branch['name'] ?></strong></span><br/>
                        </td>
                        <td>
                            <span><?php echo $branch['description']; ?></span>
                           
                        </td>
                           
                        <td>
                             <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($branch['modified_date']));?></span>
                            <br/>
                            <?php if ($branch['is_active']=="1"): ?>
                                <span><i class="fa fa-check"></i> ใช้งาน</span>
                                <br/>
                            <?php else: ?>
                                <span class="text-danger"><i class="fa fa-times"></i> ยกเลิก</span>
                                <br/>
                            <?php endif ?>
                        </td>
                        <td><a class="btn btn-xs btn-info" href="<?php echo base_url('branch/edit/'.$branch['id']) ?>" role="button"><i class="fa fa-pencil"></i> แก้ไข</a></td>       
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