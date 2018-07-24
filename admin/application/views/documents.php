<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid box" ng-controller="mainCtrl">
        <div class="page-header">
            <h1>เอกสาร<small> Download</small></h1>
            <?php //if(isset($sql))echo "<p>".$sql."</p>"; ?>
        </div>
          <div role="tabpanel">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#search" aria-controls="search" role="tab" data-toggle="tab"><i class="fa fa-search"></i> ค้นหาเอกสาร</a>
                </li>
                <li role="presentation">
                    <a href="#add" aria-controls="tab" role="add" data-toggle="tab"><i class="fa fa-plus"></i> เพิ่มเอกสาร</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="search">
                    <div style="padding-top:30px;"></div>
                    <form action="<?php echo base_url('documents/search');?>" method="POST" class="form-inline" role="form">
        
                        <div class="form-group">
                            <label class="sr-only" for="">search</label>
                            <input type="text" class="form-control" id="search" name="search" placeholder="ชื่อ">
                        </div>
                
                        <button type="submit" class="btn btn-primary">ค้นหา</button>
                    </form>
                    <div style="padding-top:30px;"></div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ชื่อ</th>
                                    <th>รายละเอียด</th>
                                    <th>ประเภท</th>
                                    <th>link Download</th>
                                    <th>สถานะ</th>
                                    <th>แก้ไข</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($documents_list as $document): ?>
                                <tr>
                                    <td>
                                        <span><?php echo $document['name']; ?></span>
             
                                    </td>
                                    <td>
                                         <span><?php echo $document['description']; ?></span>
                                    </td>
                                    <td>
                                         <span><?php echo $document['type_name']; ?></span>
                                    </td>
                                    <td>
                                        <?php if (isset($document['link_1'])): ?>
                                            <a target="_blank" href="<?php echo $document['link_1']; ?>"><span><?php echo $document['link_1']; ?></span><br/></a>
                                            
                                        <?php endif ?>
                                        <?php if (isset($document['link_2'])): ?>
                                             <a target="_blank" href="<?php echo $document['link_2']; ?>"><span><?php echo $document['link_2']; ?></span><br/></a>
                                        <?php endif ?>
                                    </td>
                                    <td>
                                        <span><i class="fa fa-calendar-o"></i> <?php echo  date("d-m-Y H:i", strtotime($document['create_date']));?></span>
                                        <br/>
                                        <span><i class="fa fa-calendar"></i> <?php echo date("d-m-Y H:i", strtotime($document['modified_date']));?></span>
                                        <br/>
                                           <?php if ($document['is_active']=="1"): ?>
                                            <span><i class="fa fa-check"></i> ใช้งาน</span>
                                            <br/>
                                        <?php else: ?>
                                            <span class="text-danger"><i class="fa fa-times"></i> ยกเลิก</span>
                                            <br/>
                                        <?php endif ?>
                                    </td>
                                    <td><a class="btn btn-xs btn-info" href="<?php echo base_url('documents/edit/'.$document['id']) ?>" role="button"><i class="fa fa-pencil"></i> แก้ไข</a></td>       
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(isset($links_pagination)) {echo $links_pagination;} ?>
                </div>
                <!-- close  tab search -->
                <div role="tabpanel" class="tab-pane" id="add">
                    <div style="padding-top:30px;"></div>
                    <form class="form-horizontal" method="POST" action="<?php echo base_url('documents/add');?>" accept-charset="utf-8" enctype="multipart/form-data">
                        <fieldset>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">ชื่อ</label>
                                <div class="col-md-6">
                                    <input id="name" name="name" type="text" placeholder="name" class="form-control input-md" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label" for="model">ประเภท</label>
                                 <div class="col-md-6">
                                    <select id="type_name" name="type_name" class="form-control">
                                            <option value="bios">bios</option>
                                            <option value="diagram">diagram</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="model">รายละเอียด</label>
                                <div class="col-md-6">
                                    <input id="description" name="description" type="text" placeholder="description" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="model">link_1</label>
                                <div class="col-md-6">
                                    <input id="link_1" name="link_1" type="text" placeholder="link_1" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="model">link_2</label>
                                <div class="col-md-6">
                                    <input id="link_2" name="link_2" type="text" placeholder="link_2" class="form-control input-md">
                                </div>
                            </div>
                            <!-- Multiple Checkboxes -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="isactive">ใช้งาน</label>
                                <div class="col-md-4">
                                    <div class="checkbox">
                                        <label for="isactive-0">
                                            <input type="checkbox" name="isactive" id="isactive-0" value="1" checked> ใช้งานสินค้า
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="save"></label>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
            <!-- /.container-fluid box -->
            </div>
        <!-- /.content -->
    </section>
</div>