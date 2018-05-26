<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid box" ng-controller="mainCtrl">

             <script type="text/ng-template" id="myModalContent.html">
                <div class="modal-header">
                    <h3 class="modal-title" ng-bind="items_stock[0].sku +' : '+ items_stock[0].product_name">Stock สินค้า </h3>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Branch</th>
                                    <th>Amont</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr ng-repeat="value in items_stock">
                                    <td><span ng-bind="value.serial"></span></td>
                                    <td><span ng-bind="value.branch_name"></span></span></td>
                                    <td><span class="text-success" ng-bind="value.number"></span></td>
                                    <td><span ng-bind="value.modified_date"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning" type="button" ng-click="cancel()">Cancel</button>
                </div>
            </script>

        <div class="page-header">
            <h1>Product<small> สินค้า </small></h1>
            <?php //if(isset($sql))echo "<p>".$sql."</p>"; ?>
        </div>
        <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#search" aria-controls="search" role="tab" data-toggle="tab"><i class="fa fa-search"></i> ค้นหาสินค้า</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="search">
                    <div style="padding-top:30px;"></div>
                    <form class="form-horizontal" method="POST" action="<?php echo base_url('products/search');?>" accept-charset="utf-8" enctype="multipart/form-data">
                        <fieldset>
                            <!-- Text input-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-4">
                                        <label for="search">รหัส + ชื่อ + Model + รายละเอียด</label>
                                        <input id="search" name="search"  value="<?php if(isset($data_search['search']))echo $data_search['search']; ?>" type="text" class="form-control input-md">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="select_brand">ยี่ห้อสินค้า</label>
                                        <select id="select_brand" name="select_brand" class="form-control">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($brands_list as $brand): ?>
                                                <?php if ($brand['id']==$data_search['product_brand_id']): ?>
                                                    <option value="<?php echo $brand['id']; ?>" selected><?php echo $brand['name']; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $brand['id']; ?>"><?php echo $brand['name']; ?></option>
                                                <?php endif ?>          
                                            <?php endforeach ?>
    
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="select_type">หมวดสินค้า</label>
                                        <select id="select_type" name="select_type" class="form-control">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($type_list as $type): ?>
                                                <?php if ($type['id']==$data_search['product_type_id']): ?>
                                                    <option value="<?php echo $type['id']; ?>" selected><?php echo $type['name']; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $type['id']; ?>"><?php echo $type['name']; ?></option>
                                                <?php endif ?>          
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-4" style="padding:0;">
                                        <div class="col-md-6">
                                            <label for="from_stock">สินค้าคงเหลือ</label>
                                            <input id="from_stock" name="from_stock" type="number" 
                                                value="<?php if(isset($data_search['from_stock']))echo $data_search['from_stock']; else echo "0"; ?>" class="form-control input-md">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="to_stock">ถึง</label>
                                            <input id="to_stock" name="to_stock" type="number" 
                                            value="<?php if(isset($data_search['to_stock']))echo $data_search['to_stock']; else echo "9999"; ?>" class="form-control input-md">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="promotion">โปรโมชั่น</label>
                                        <div class="checkbox">
                                            <label for="all_promotion">
                                                <input type="checkbox" name="all_promotion" id="all_promotion" value="1" 
                                                    <?php if(isset($data_search['all_promotion'])) {if($data_search['all_promotion']==1) echo "checked";} ?> > ทั้งหมด
                                            </label>
                                            <label for="is_promotion">
                                                <input type="checkbox" name="is_promotion" id="is_promotion" value="1"
                                                 <?php if(isset($data_search['is_promotion'])) {if($data_search['is_promotion']==1) echo "checked";} ?> > ลดราคา
                                            </label>
                                            <label for="is_sale">
                                                <input type="checkbox" name="is_sale" id="is_sale" value="1" 
                                                <?php if(isset($data_search['is_sale'])) {if($data_search['is_sale']==1) echo "checked";} ?> > แนะนำ
                                            </label>
                                            <label for="is_hot">
                                                <input type="checkbox" name="is_hot" id="is_hot" value="1"
                                                <?php if(isset($data_search['is_hot'])) {if($data_search['is_hot']==1) echo "checked";} ?>> ได้รับความนิยม
                                            </label>
                                            <label for="isactive-0">
                                                <input type="checkbox" name="isactive" id="isactive" value="1" 
                                                 <?php if(isset($data_search['is_active'])) {if($data_search['is_active']==1) echo "checked";} ?> > ใช้งานสินค้า
                                            </label>
                                            <br/>
                                            <span class="text-danger">* ไม่เลือกหมายถึงทั้งหมด เฉพาะ สินค้าจอง กับ สินค้าที่ซื้อได้เมื่อไม่มีสินค้า</span><br/>
                                            <label for="is_reservations-0">
                                            <input type="checkbox" name="is_reservations" id="is_reservations" value="1" 
                                             <?php if(isset($data_search['is_reservations'])) {if($data_search['is_reservations']==1) echo "checked";} ?> > สินค้าจอง
                                            </label>
                                              <label for="isactive-0">
                                                <input type="checkbox" name="is_add_outofstock" id="is_add_outofstock" value="1" 
                                                 <?php if(isset($data_search['is_add_outofstock'])) {if($data_search['is_add_outofstock']==1) echo "checked";} ?> > สินค้าที่ซื้อได้เมื่อไม่มีสินค้า
                                            </label>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                        <select id="select_branch" name="select_branch" class="form-control" style="display: none;">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($branch_list as $branch): ?>
                                                <?php if ($branch['id']==$data_search['branch_id']): ?>
                                                    <option value="<?php echo $branch['id']; ?>" selected><?php echo $branch['name']; ?></option>
                                                <?php else: ?>
                                                    <option value="<?php echo $branch['id']; ?>"><?php echo $branch['name']; ?></option>
                                                <?php endif ?>          
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <div class="clearfix">
                    </div>
                    <div style="padding-top:30px;"></div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Detail</th>
                                    <th>Model</th>
                                    <th>promotion</th>
                                    <th>Date</th>
                                    <th>stock</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($products_list as $product): ?>
                                    <tr>
                                        <td><img src=" <?php echo base_url($product['image']); ?>" style="width:100px;" class="img-responsive" alt="Image">
                                            <td>
                                                <span>รหัส : </span>
                                                <?php echo $product['sku'];?>
                                                    <br/>
                                                    <span>name : </span><strong><?php echo $product['name'];?></strong>
                                                    <br/>
                                                    <span>model : </span><?php echo $product['model'];?>
													<br/>
												<?php if ($product['is_reservations']=="1"): ?>
                                                    <span><i class="fa fa-check"></i> จองสินค้า</span>
                                                    <br/>
                                                <?php else: ?>
                                                    <span><i class="fa fa-times"></i> จองสินค้า</span>
                                                    <br/>
                                                <?php endif ?>

                                                <?php if ($product['is_add_outofstock']=="1"): ?>
                                                    <span><i class="fa fa-check"></i> สินค้าที่ซื้อได้เมื่อไม่มีสินค้า</span>
                                                    <br/>
                                                <?php else: ?>
                                                    <span><i class="fa fa-times"></i> สินค้าที่ซื้อได้เมื่อไม่มีสินค้า</span>
                                                    <br/>
                                                <?php endif ?>
                                                   
                                            </td>
                                            <td>
                                                <span>หมวด : </span>
                                                <?php echo $product['type_name'];?>
                                                    <br/>
                                                    <span>brand : </span>
                                                <?php echo $product['brand_name'];?>
                                                    <br/>
                                                <span>ราคา : </span><span class="text-success" ng-bind="<?php echo $product['price'];?> | currency:'฿':0"></span>
                                                <br/>
                                                <span>ลดราคา : </span><span class="text-danger" ng-bind="<?php echo $product['dis_price'];?> | currency:'฿':0"></span>
                                                <br/>
                                                <span>ราคา dealer : </span><span class="text-danger" ng-bind="<?php echo $product['member_discount'];?> | currency:'฿':0"></span>
                                            </td>
                                            <td>
                                                <?php if ($product['is_promotion']=="1"): ?>
                                                    <span><i class="fa fa-check"></i> ลดราคา</span>
                                                    <br/>
                                                <?php else: ?>
                                                    <span><i class="fa fa-times"></i> ลดราคา</span>
                                                    <br/>
                                                <?php endif ?>
                                                <?php if ($product['is_sale']=="1"): ?>
                                                    <span><i class="fa fa-check"></i> แนะนำ</span>
                                                    <br/>
                                                <?php else: ?>
                                                    <span><i class="fa fa-times"></i> แนะนำ</span>
                                                    <br/>
                                                <?php endif ?>
                                                <?php if ($product['is_hot']=="1"): ?>
                                                    <span><i class="fa fa-check"></i> ได้รับความนิยม</span>
                                                    <br/>
                                                <?php else: ?>
                                                    <span><i class="fa fa-times"></i> ได้รับความนิยม</span>
                                                    <br/>
                                                <?php endif ?> 
                                            </td>
                                            <td>
                                                <span><i class="fa fa-calendar-o"></i> <?php echo  date("d-m-Y H:i", strtotime($product['create_date']));?></span>
                                                <br/>
                                                <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($product['modified_date']));?></span>
                                                <br/>
                                                   <?php if ($product['is_active']=="1"): ?>
                                                    <span><i class="fa fa-check"></i> ใช้งาน</span>
                                                    <br/>
                                                <?php else: ?>
                                                    <span class="text-danger"><i class="fa fa-times"></i> ยกเลิก</span>
                                                    <br/>
                                                <?php endif ?>
                                            </td>
                                            <td>
                                                <?php if($product['stock_number'] < 5 && $product['stock_number'] != 0) { ?>
                                                    <strong><span class="text-danger"><?php echo $product['stock_number'];?> <i class="fa fa-caret-down"></i></span></strong>
                                                <?php } else if ($product['stock_number'] > 4) {?>
                                                    <strong><span class="text-success"><?php echo $product['stock_number'];?> <i class="fa fa-caret-up"></i></span></strong>
                                                <?php  }?>
                                                <?php if ($product['stock_number'] == 0): ?>
                                                    <strong><span class="text-danger">0</span></strong>
                                                <?php endif ?>
                                                <?php if ($product['stock_number'] > 0): ?>
                                                    <button type="button" class="btn btn-xs btn-info" 
                                                     ng-click="open(<?php echo $product['id'];?>)" >แยกตามสาขา</button>
                                                <?php endif ?>
                                                
                                            </td>
                                            <td><a class="btn btn-xs btn-info" href="<?php echo base_url('products/edit/'.$product['id']) ?>" role="button"><i class="fa fa-pencil"></i> แก้ไข</a></td>
                                    </tr>
                                    <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if(isset($links_pagination)) {echo $links_pagination;} ?>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal -->
    <div class="modal fade" id="stockModel" tabindex="-1" role="dialog" aria-labelledby="stockModelLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="stockModelLabel">stock แยกตามสาขา</h4>
          </div>
          <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item" ng-repeat="value in stock_data">
                    <span class="badge" ng-bind="value.number"></span>
                    {{stock_data}}
                  </li>
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>
      </div>
    <!-- /.container-fluid box -->
</div>
</section>
<!-- /.content -->



