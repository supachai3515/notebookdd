<div id="content">
	<div class="main-content">
		<div class="container">
			<div class="bread-crumb">
				<a href="<?php echo base_url(); ?>">Home</a> 
				<span class="lnr lnr-chevron-right"></span>
				<a href="<?php echo base_url('products'); ?>">สินค้า</a> 
				<span class="lnr lnr-chevron-right"></span>
				<span><?php echo $product_detail['name'] ?></span>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="hidden-xs sidebar sidebar-left sidebar-product">
						<div class="panel-group category-products">
						<div class="cat-product">
						<h2 class="widget-title sub-title">หมวดสินค้า</h2>
						<?php foreach ($menu_type as $master): ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $master['id']; ?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<?php echo $master['name']; ?><span> (<?php echo $master['count_product'] ?>)</span>
										</a>
									</h4>
								</div>
								<div id="<?php echo $master['id']; ?>" class="panel-collapse collapse">
									<div class="panel-body cat-body">
										<ul>
										<?php foreach ($brand_oftype as $detail): ?>
											<?php if ($master['id'] == $detail['product_type_id'] && $detail['product_brand_name'] !=""): ?>
												<a href="<?php echo base_url('products/category_brand/'.$master['name'].'/'.$detail['product_brand_name']) ?>">
													<li><?php echo  $detail['product_brand_name']; ?></li>
												</a>
											<?php endif ?>
										<?php endforeach ?>
											<a href="<?php echo base_url('products/category/'.$master['name']) ?>">
												<li>ทั้งหมด</li>
											</a>
										</ul>
									</div>
								</div>
							</div>
						<?php endforeach ?>
						</div>
						</div>
						
					</div>
					<!-- End Sidebar -->
				</div>
				<div class="col-md-9 col-sm-8 col-xs-12">
					<div class="content-product-detail has-sidebar">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">

									<?php if (count($product_images)==0): ?>
										<img  width="100%" src="<?php echo $this->config->item('no_url_img');?>" class="img-responsive" alt="Image">
									<?php endif ?>
							<?php $i= 1; foreach ($product_images as $value): ?>
									<?php 
										$image_url="";
										if($value['path'] !="")
										{
											$image_url = $this->config->item('url_img').$value['path'];
										}
										else{

											$image_url = $this->config->item('no_url_img');

										}
									?>
									<?php if ($i==1): ?>
										<a class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo $image_url;?>" >
											<img  width="100%" src="<?php echo $image_url;?>" alt="" /></a><br>
										

									<?php else: ?>
										<a class="fancybox-thumb" rel="fancybox-thumb" href="<?php echo $image_url;?>" >
											<img  width="100px" style="padding: 10px 5px" src="<?php echo $image_url;?>" alt="" /></a>
										
										
									<?php endif ?>
								<?php $i++ ; endforeach ?>

								<!-- End Product Gallery -->
							</div>
							<div class="col-md-6 col-sm-12 col-xs-12">
								<div class="info-product-detail">
									<h1 class="title-product-detail"><?php echo $product_detail['name'] ?></h1>
									<p class="desc">
										<span><strong>SKU : </strong></span><span> <?php echo $product_detail['sku'] ?></span><br>
										<?php if (isset($product_detail['model']) && $product_detail['model'] !=''): ?>
											<span><strong>MODEL : </strong></span><span> <?php echo $product_detail['model'] ?></span><br>
										<?php endif ?>
										<?php if (isset($product_detail['brand_name'])  && $product_detail['brand_name'] !=''): ?>
											<span><strong>BRAND : </strong></span><span> <?php echo $product_detail['brand_name'] ?></span><br>
										<?php endif ?>
									</p> 
									 <p>

						                <?php if ($product_detail["stock_all"] > 0 || $product_detail['is_add_outofstock']): ?>
						                    <span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> มีสินค้า</span>
						                <?php else: ?>
						                    <span class="label label-default">หมดชั่วคราว</span>
						                <?php endif ?>
						                
						            </p>
									<div class="info-price">

									 <?php 
					                        $price = $product_detail["price"];
					                        $disprice = 0 ;
					                        if ($product_detail["dis_price"] > 0) {
					                                $disprice =$product_detail["dis_price"] ;

					                        }

					                        if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"){
					                            $price = $product_detail["member_discount"];
					                        }
					                     
					                     ?>



										<?php if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"): ?>
						                    <?php $price  = $product_detail["member_discount"];?>

						                <?php endif ?>  

						                	<?php if ($price > 1): ?>
						                    <?php if ($product_detail["dis_price"] > 0): ?>
						                    	<strong><span class="text-success color-price"ng-bind="<?php echo $product_detail["dis_price"];?> | currency:'฿':0"></span></strong>
						                        <del ng-bind="<?php echo $product_detail["price"];?> | currency:'฿':0"></del>
						                        
						                    <?php else: ?>
						                        <strong><span class="text-success color-price" class="amount" ng-bind="<?php echo $product_detail["price"];?> | currency:'฿':0"></span></strong>
						                    <?php endif ?>

						                    <?php else: ?>
						                        <strong><span class="text-success color-price" class="amount" >ราคาสอบถาม</span> </strong>
						                    <?php endif ?>
						                
									</div>
								</div>
								<div class="wrap-cart-qty">
									<?php if ($price >1): ?>
			                     <?php if ($product_detail['stock_all'] > 0): ?>
			                     	
			                      
			                   <a  href="<?php echo base_url('cart/add/'.$product_detail["id"]) ?>"  class="" 
			                   ><button type="button" class="btn btn-primary">สั่งซื้อสินค้า</button></a>
			                    <?php else: ?>
			                    	<?php if ($product_detail['is_add_outofstock']): ?>
			                    		<a  href="<?php echo base_url('cart/add/'.$product_detail["id"]) ?>"  class="" 
			                   ><button type="button" class="btn btn-primary">สั่งซื้อสินค้า</button></a>
		                        	<?php else: ?>
		                        		<?php if ($product_detail['is_reservations']): ?>
				                            <a  href="<?php echo base_url('cart/add_reservations/'.$product_detail["id"]) ?>" class=""><button type="button" class="btn btn-primary">จองสินค้า</button></a>
				                        <?php else: ?>
				                        	<button type="button" class="btn btn-default"><strong class="text-danger">หมดชั่วคราว</strong></button>
				                        <?php endif ?>
		                        	<?php endif ?>
			                    <?php endif ?>
			                    <?php else: ?>
						                    <a class="btn btn-default" href="<?php echo base_url('contact') ?>" role="button"><strong class="text-primary">ติดต่อเรา</strong> </a>
						                <?php endif ?>
								</div>
							</div>
						</div>
						<!-- End Product Top -->
						<div class="detail-product-tab">
						
							<!-- Nav tabs -->
							<div class="nav-tabs-default">
								<ul class="nav nav-tabs" role="tablist">
									<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
								</ul>
								<h2 style="font-size: 20px">รายละเอียด : <?php echo $product_detail['name'] ?></h2>

							</div>
							<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="home">
									<p><?php if (isset($product_detail['detail'])  && $product_detail['detail'] !=''): ?>
												<?php echo $product_detail['detail'] ?>
											<?php endif ?>
									</p>
								</div>
							</div>
						</div>
						<!-- End Product Tab -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Grid Product -->
</div>
<?php $this->load->view('template/logo'); ?>