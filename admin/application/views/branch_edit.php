<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid box" ng-controller="mainCtrl">
            <div class="page-header">
                <h1>แก้ไขสาขา</h1>
            </div>
            <div style="padding-top:30px;"></div>
            <form class="form-horizontal" method="POST" action="<?php echo base_url('branch/update/'.$branch_data['id']);?>" accept-charset="utf-8"
                enctype="multipart/form-data">
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="id">รหัส</label>
                        <div class="col-md-4">
                            <input id="id" name="id" type="text" disabled="true" value="<?php echo $branch_data['id']; ?>" placeholder="รหัส" class="form-control input-md"
                                required="">

                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name">ชื่อ</label>
                        <div class="col-md-6">
                            <input id="name" name="name" type="text" value="<?php echo $branch_data['name']; ?>" placeholder="ชื่อ" class="form-control input-md"
                                required="">
                        </div>
                    </div>

                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="model">รายละเอียด</label>
                        <div class="col-md-6">
                            <input id="last_name" name="description" type="text" value="<?php echo $branch_data['description']; ?>" placeholder="รายละเอียด"
                                class="form-control input-md">
                        </div>
                    </div>

                    <!-- Multiple Checkboxes -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="isactive">ใช้งาน</label>
                        <div class="col-md-4">
                            <div class="checkbox">
                                <label for="isactive-0">
                                    <input type="checkbox" name="isactive" id="isactive-0" value="1" <?php if ($branch_data[ 'is_active']==1): ?>
                                    <?php echo "checked"; ?>
                                    <?php endif ?> > ใช้งาน
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
        <!-- /.content -->
    </section>
</div>