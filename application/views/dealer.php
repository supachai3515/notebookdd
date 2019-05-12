<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'>สมาชิก</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div id="content">
    <div class="main-content">
     
   			
		<div class="container">
		      <div id="message"></div>
		</div>
		<div class="content-container commerce page-layout-left-sidebar">
			<div class="container">
			<?php if (!$this->session->userdata('is_logged_in')): ?>
				<div class="row">
					<div class="col-sm-4 col-sm-offset-1">
		                <div class="login-form"><!--login form-->
		                    <form action="<?php echo base_url('dealer/login');?>" method="post">
		                    	<legend>เข้าสู่ระบบ</legend>
		                    	<?php 
								    if($this->session->flashdata('msg') != ''){
								        echo '
								        <div class="alert alert-danger alert-dismissible" role="alert">
								          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								          '.$this->session->flashdata('msg').'
								        </div>';
								    }
								    if($this->session->flashdata('success') != ''){
								        echo '
								         <div class="alert alert-success alert-dismissible" role="alert">
								          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								          '.$this->session->flashdata('success').'
								        </div>';
								    }    
								?>  

		                        <div class="form-group">
								    <input type="email" class="form-control"  id="Username" name="username" placeholder="Email" required="required">
								  </div>
								  <div class="form-group">
								   
								    <input type="password" class="form-control"  id="Password"  name="password" placeholder="Password"  required="required">
								  </div>
		                    	<button type="submit" class="btn btn-primary">Login</button>
		                    </form>
		                </div><!--/login form-->
		            </div>
		            <div class="col-sm-1">
		                <h3 class="or">หรือ</h2>
		            </div>
		            <div class="col-sm-4">
		                <div class="signup-form"><!--sign up form-->
			                <form  ng-submit="saveDealer()"> 

								<legend>สมัครสมาชิก</legend>
			                   <div class="form-group">  
								    <input ng-model="dealer.name" class="form-control"  id="name" name="name" placeholder="ชื่อจริง"  required="required" type="text">
								 </div>
								 <div class="form-group">
								    
								    <input ng-model="dealer.lastname" class="form-control"  id="lastname" name="lastname" placeholder="นามสกุลจริง"  required="required" type="text">
								 </div>

								 <div class="form-group">
								    
								    <input ng-model="dealer.shop" class="form-control"  id="shop" name="shop" placeholder="ชื่อร้าน"  required="required" type="hidden" >
								 
								 </div>

								 <div class="form-group">
								    
								    <input ng-model="dealer.email" class="form-control"  id="email" name="email" placeholder="Email"  required="required" type="email">
								 </div>

								 <div class="form-group">
								    <input ng-model="dealer.password" class="form-control"  id="password" name="password" placeholder="Password"  required="required" type="password">
								 </div>
								 <div class="form-group">
								    <input ng-model="dealer.confirm_password" class="form-control"  id="confirm_password" name="password" placeholder="Confirm Password"  required="required" type="password">
								 </div>

								 <div class="form-group">
								   
								    <input ng-model="dealer.phone" class="form-control"   id="phone" name="phone" placeholder="โทรศัพท์บ้านหรือ Fax" type="hidden">
								 </div>

								 <div class="form-group">
								   
								    <input ng-model="dealer.mobile" class="form-control"  pattern="[0-9]{10}" id="mobile" name="mobile" placeholder="เบอร์มือถึอ"  required="required" type="text">
								 </div>


								 <div class="form-group">
								    
								    <textarea ng-model="dealer.address" class="form-control" id="address" name="address" placeholder="ที่อยู่สำหรับส่งสินค้า"  required="required"> </textarea>
								 </div>

								 <div class="form-group">
								    
								    <textarea ng-model="dealer.addressVat" class="form-control" id="addressVat" name="addressVat" placeholder="ชื่อและที่อยู่สำหรับออกใบกำกับภาษี"> </textarea>
								 </div>

								 <div class="form-group">
								    
								    <input ng-model="dealer.nid" class="form-control" pattern="[0-9]{13}" id="nid" name="nid" placeholder="เลขประจำตัวผู้เสียภาษี" type="text">
								 </div>

				                <button  type="submit" class="btn btn-default">ยืนยันการสมัคร</button>
			                </form> <!--/sign up form-->
		                </div>
		                <div class="clearfix">   
		                </div>
		                <div class="form-group" ng-if="isProscess==true">
			                <hr>
			                <div class="progress progress-striped active">
			                	<div class="progress-bar progress-bar-success" style="width:70%"></div>
			           		</div>                 
		                </div>
		                <span ng-if="!message_error"><h4 class="text-success" ng-bind="message_prosecss"></h4></span>
		                <span ng-if="message_error"><h4 class="text-danger" ng-bind="message_prosecss"></h4></span>         
		        	</div>
		        </div>
			<?php else: ?>
				<div class="row">
					<div class="col-sm-3">
						<div class="panel panel-default">
							<div class="panel-heading">
								<?php
									echo '<i class="fa fa-user"></i> '.$this->session->userdata('username');
							?> 
							</div>
							<div class="panel-body">
							<button type="button" ng-click="showOrderDealer_click()" class="btn btn-info  btn-lg btn-block">
							<i class="fas fa-file-alt"></i> ใบสั่งซื้อย้อนหลัง </button>
							<button type="button" ng-click="editDealerForm_click()"class="btn btn-info btn-lg btn-block">
							<i class="fas fa-user-edit"></i> แก้ไขข้อมูล </button>
							<a class="btn btn-info btn-lg btn-block" href="<?php echo  base_url('dealer/logout'); ?>" role="button">
							<i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
							</div>
						</div>
					</div>
					<div class="col-sm-9">
							<div ng-if="showOrderDealer == true">
								<?php if (count($orderList) > 0): ?>
									<div class="table-responsive">
										<table class="table table-condensed">
											<thead>
												<tr>
													<th>#</th>
													<th>ข้อมูลการจัดส่ง</th>
													<th>ยอดรวม</th>	        					
													<th>link</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach ($orderList as $value): ?>
													<tr>
														<td>
															<strong>วันที่ : </strong><?php echo $value['date'];?><br/>
															<strong>เลขที่ใบสั่งซื้อ : </strong>#<?php echo $value['order_docno'];?><br/>
															<a href="<?php echo base_url('status/'.$value['ref_id']);?>" target="_bank">
															<button type="button" class="btn btn-xs btn-success">สะถานะสินค้า <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
															 
															</a>
															<p></p>

															<?php if ($value['order_status_id'] ==  "1"): ?>
																<a href="<?php echo base_url('payment/order/'.$value['ref_id']);?>">
																	<button type="button" class="btn btn-xs btn-warning">แจ้งชำระเงิน</button>
																</a> 
															<?php endif ?>
														</td>
														<td>
															<strong>ชื่อ : </strong><?php echo $value['name'];?><br/>
															<strong>ที่อยู่จัดส่ง : </strong><?php echo $value['address'];?><br/>
															<strong>Tracking : </strong><?php echo $value['trackpost'];?><br/>
														</td>
														<td>
															<span class="amount" ng-bind="<?php echo $value["total"];?> | currency:'฿':0"></span>
														</td>
														<td>
															<a href="<?php echo base_url('invoice/'.$value['ref_id']);?>" target="_bank">
																<button type="button" class="btn btn-xs btn-info">ดูใบเสร็จ</button>
															</a>
														</td>
													</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
								<?php else: ?>
									<?php echo '<p class="text-center"><strong class="text-center">ยังไม่มีรายการสั่งซื้อ</strong></p>';?>
								<?php endif ?>
							</div><!--/order-->
							<div ng-if="editDealerForm == true">
								<div class="signup-form">
									<form ng-submit="savedealerEdit()"> 

										<input ng-model="dealerEdit.company" class="form-control"  id="company" name="company" placeholder="ชื่อจริง" type="hidden">
										<input ng-model="dealerEdit.tel" class="form-control" pattern="[0-9]{9}" id="tel" name="tel" placeholder="โทรศัพท์บ้านหรือ Fax" type="hidden">
									

											<div class="form-group">
											<label for="first_name">ชื่อจริง</label>
											<input ng-model="dealerEdit.first_name" class="form-control"  id="first_name" name="first_name" placeholder="ชื่อจริง"  required="required" type="text" >
										</div>

										<div class="form-group">
											<label for="last_name">นามสกุลจริง</label>
											<input ng-model="dealerEdit.last_name" class="form-control"  id="last_name" name="last_name" placeholder="นามสกุลจริง"  required="required" type="text">
										
										</div>
										

										<div class="form-group">
											<label for="username">Email / ใช้เป็น Username / ถ้าแก้ไข username จะเปลี่ยนตาม</label>
											<input ng-model="dealerEdit.email" class="form-control"  id="email" name="email" placeholder="Email"  required="required" type="email">
										</div>

										<div class="form-group">
											<label for="password">Password</label>
											<input ng-model="dealerEdit.password" class="form-control"  id="password" name="password" placeholder="Password"  required="required" type="password">
										</div>

									 

										<div class="form-group">
											<label for="mobile">เบอร์มือถึอ</label>
											<input ng-model="dealerEdit.mobile" class="form-control"  pattern="[0-9]{10}" id="mobile" name="mobile" placeholder="เบอร์มือถึอ"  required="required" type="text">
										</div>


										<div class="form-group">
											<label for="address_receipt">ที่อยู่สำหรับส่งสินค้า</label>
											<textarea ng-model="dealerEdit.address_receipt" class="form-control" id="address_receipt" name="address_receipt" placeholder="ที่อยู่สำหรับส่งสินค้า"  required="required"> </textarea>
										</div>

										<div class="form-group">
											<label for="address_tax">ชื่อและที่อยู่สำหรับออกใบกำกับภาษี</label>
											<textarea ng-model="dealerEdit.address_tax" class="form-control" id="address_tax" name="address_tax" placeholder="ชื่อและที่อยู่สำหรับออกใบกำกับภาษี"> </textarea>
										</div>

										<div class="form-group">
											<label for="tax_number">เลขประจำตัวผู้เสียภาษี</label>
											<input ng-model="dealerEdit.tax_number" class="form-control" pattern="[0-9]{13}" id="tax_number" name="tax_number" placeholder="เลขประจำตัวผู้เสียภาษี" type="text">
										</div>       
											<button  type="submit" class="btn btn-default">แก้ไข</button>
									</form> <!--/sign up form-->
									<hr>
										<div class="form-group" ng-if="isProscess==true">
											<hr>
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-success" style="width:70%"></div>
											</div>                 
										</div>               
										<h4 class="text-success" ng-bind="message_prosecss"></h4>
								</div>
							</div>
						</div>
				</div>
			<?php endif ?>
			</div>
		</div>
		<div class="container-fluid">
			<div style="height: 100px;"></div>
		</div>
    </div>
	<!-- End Grid Product -->
</div>
<!-- End Content -->