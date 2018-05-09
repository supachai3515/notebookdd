<div id="page-wrapper" ng-app="myApp">
    <div class="container-fluid" ng-controller="myCtrl">
        <div class="page-header">
          <h1>แก้ไขเอกสาร Download</h1>
        </div>

     	<div style="padding-top:30px;"></div>
    	<form class="form-horizontal" method="POST"  action="<?php echo base_url('documents/update/'.$document_data['id']);?>" accept-charset="utf-8" enctype="multipart/form-data">
		<fieldset>
		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="id">รหัส</label>  
		  <div class="col-md-4">
		  <input id="id" name="id" type="text" disabled="true" value="<?php echo $document_data['id']; ?>" placeholder="รหัส" class="form-control input-md" required="">
		  </div>
		</div>


		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="name">ชื่อ</label>  
		  <div class="col-md-6">
		  	<input id="name" name="name" type="text" value="<?php echo $document_data['name']; ?>" placeholder="ชื่อ" class="form-control input-md" required="">
		  </div>
		</div>

		<div class="form-group">
            <label class="col-md-3 control-label" for="model">ประเภท</label>
             <div class="col-md-6">
                <select id="type_name" name="type_name" class="form-control">
                        <?php if ($document_data['type_name']== "bios"): ?>
                            <option value="bios" selected>bios</option>
                        <?php else: ?>
                            <option value="bios">bios</option>
                        <?php endif ?>
                        <?php if ($document_data['type_name']== "diagram"): ?>
                            <option value="diagram" selected>diagram</option>
                        <?php else: ?>
                            <option value="diagram">diagram</option>
                        <?php endif ?>
                </select>
            </div>
        </div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="model">description</label>  
		  <div class="col-md-6">
		  <input id="description" name="description" type="text" value="<?php echo $document_data['description']; ?>" placeholder="description" class="form-control input-md">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="model">link_1</label>  
		  <div class="col-md-6">
		  <input id="link_1" name="link_1" type="text" value="<?php echo $document_data['link_1']; ?>" placeholder="link_1" class="form-control input-md">
		    
		  </div>
		</div>

		<!-- Text input-->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="model">link_2</label>  
		  <div class="col-md-6">
		  <input id="link_2" name="link_2" type="text" value="<?php echo $document_data['link_2']; ?>" placeholder="link_2" class="form-control input-md">
		    
		  </div>
		</div>

		<!-- Multiple Checkboxes -->
		<div class="form-group">
		  <label class="col-md-3 control-label" for="isactive">ใช้งาน</label>
		  <div class="col-md-4">
		  <div class="checkbox">
		    <label for="isactive-0">
		      <input type="checkbox" name="isactive" id="isactive-0" value="1" 
		      <?php if ($document_data['is_active']==1): ?>
		      	<?php echo "checked"; ?>
		      <?php endif ?>
		      >
		      ยันยันแล้ว
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
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
