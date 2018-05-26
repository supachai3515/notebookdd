<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid box" ng-controller="mainCtrl">

        <div class="page-header">
            <h1>ยี่ห้อสินค้า</h1>
            <?php //if(isset($sql))echo "<p>".$sql."</p>"; ?>
        </div>
        <form action="<?php echo base_url('productbrand/search');?>" method="POST" class="form-inline" role="form">
        
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
                <?php foreach ($productbrand_list as $productbrand): ?>
                    <tr>
                        <td>
                            <span>รหัส : <strong><?php echo $productbrand['id'] ?></strong></span><br/>

                        </td>
                        <td>
                            <span>name : <strong><?php echo $productbrand['name'] ?></strong></span><br/>
                        </td>
                        <td>
                            <span><?php echo $productbrand['description']; ?></span>
                           
                        </td>
                           
                        <td>
                             <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($productbrand['modified_date']));?></span>
                            <br/>
                            <?php if ($productbrand['is_active']=="1"): ?>
                                <span><i class="fa fa-check"></i> ใช้งาน</span>
                                <br/>
                            <?php else: ?>
                                <span class="text-danger"><i class="fa fa-times"></i> ยกเลิก</span>
                                <br/>
                            <?php endif ?>
                        </td>
                        <td><a class="btn btn-xs btn-info" href="<?php echo base_url('productbrand/edit/'.$productbrand['id']) ?>" role="button"><i class="fa fa-pencil"></i> แก้ไข</a></td>       
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        </div>
        <?php if(isset($links_pagination)) {echo $links_pagination;} ?>

      </div>
    <!-- /.container-fluid box -->
</div>
</section>
<!-- /.content -->