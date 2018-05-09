<div id="content">
	<div class="main-content">
		<div class="container">
			<div class="bread-crumb">
				<a href="<?php echo base_url(); ?>">Home</a> <span class="lnr lnr-chevron-right"></span> <span>ร้านค้า</span>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-4 col-xs-12">
					<div class="sidebar sidebar-left sidebar-product">
						<div class="hidden-xs panel-group category-products">
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
						<div class="hidden-xs widget widget-attribute widget-default">
							<h2 class="widget-title sub-title">ยี่ห้อสินค้า</h2>
							<ul>
							<?php foreach ($menu_brands as $brand): ?>
								<?php if ($brand['name']!=""): ?>
										<li>
									<a href="<?php echo base_url('products/brand/'.$brand['name']) ?>"><?php echo $brand['name'] ?>
									<span>(<?php echo $brand['count_product'] ?>)</span>
									</a></li>

								<?php endif ?>								
							<?php endforeach ?>
							</ul>
						</div>
					</div>
					<!-- End Sidebar -->
				</div>
				<div class="col-md-9 col-sm-8 col-xs-12">
				<?php if (isset($title_tag)): ?>
					<div class="head-search">
						<h3 class="text-center text-success">
							<?php echo $title_tag; ?>
						</h3>
					</div>
				<?php endif ?>  
					<div class="product-grid has-sidebar">
						<div class="sort-pagi-bar top clearfix">
							<?php if (isset($links_pagination)): ?>
								<?php echo $links_pagination ?>
							<?php endif ?>
						</div>
						<ul class="list-product row list-unstyled">
							<?php $i =1; foreach ($product_list as $row): ?>
						    <li class="col-md-4 col-sm-4 col-xs-12">
						        <div class="item-product">
						        <div class="container-p">
						         <?php 
						                    $image_url="";
						                    if($row['image'] !="")
						                    {
						                        $image_url = $this->config->item('url_img').$row['image'];
						                    }
						                    else{

						                        $image_url = $this->config->item('no_url_img');

						                    }
						                ?>
						        	<a href="<?php echo $image_url;?>" class="product-thumb-link fancybox-thumb">
						        		<img src="<?php echo $image_url;?>" />
						        	</a>
						        	<div class="product-box-promotion">
						                <?php if ($row['is_hot']==1): ?>
						                	 <span class="new-item">hot</span>
						                <?php endif ?>
						                <?php if ($row['is_promotion']==1): ?>
						                	 <span class="new-item">pro</span>
						                <?php endif ?>
						                <?php if ($row['is_sale']==1): ?>
						                	 <span class="new-item">sale</span>
						                <?php endif ?>
						                   
						                </div>
						        </div>
						         
						           
						            <div class="item-product-info">
						            <p class="text-center">
						            	<?php if ($row['stock_all'] > 0 || $row['is_add_outofstock']): ?>
						                	<span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> มีสินค้า</span>
						                <?php else: ?>
						                	<span class="label label-default">หมดชั่วคราว</span>
						                <?php endif ?>
						            	
						            </p>
						            
						                <div class="info-price">
							                <?php 
							                    $price = $row["price"];
							                    $disprice = 0 ;
							                    if ($row["dis_price"] > 0) {
							                            $disprice =$row["dis_price"] ;

							                    }

							                    if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"){
							                        $price = $row["member_discount"];
							                    }
							                 
							                 ?>


							                 <?php if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"): ?>
							                     <?php $price  = $row["member_discount"];?>

							                 <?php endif ?>  

							                	<?php if ($price > 1): ?>

							                        <?php if ($row["dis_price"] > 1): ?>
							                            <del class="text-success" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></del>
							                             <strong><span class="text-success color-price" ng-bind="<?php echo $row["dis_price"];?> | currency:'฿':0"></span></strong>
							                        <?php else: ?>
							                             <strong><span class="text-success color-price" class="amount" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></span> </strong>
							                        <?php endif ?>


							                    <?php else: ?>
							                        <strong><span class="text-success color-price" class="amount" >ราคาสอบถาม</span> </strong>
							                    <?php endif ?>

							                  
							            </div>

						                <h3 class="title-product"><a href="<?php echo base_url('product/'.$row['sku']) ?>"><?php echo $row['name'] ?></a></h3>
						                <p class="desc"><?php echo $row['model'] ?></p>
						                <div class="cart-wishlist-compare text-center">

						                <?php if ($price >1): ?>
						                    <?php if ($row['stock_all'] > 0): ?>
						                    	<a class="btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>" role="button"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
						                    <?php else: ?>

						                    	<?php if ($row['is_add_outofstock']): ?>
					                        		<a class="btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>" role="button"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
					                        	<?php else: ?>
					                        		 <?php if ($row['is_reservations']): ?>
							                        	<a class="btn btn-primary" href="<?php echo base_url('cart/add_reservations/'.$row["id"]) ?>" role="button"><i class="fa fa-shopping-cart"></i> จองสินค้า</a>
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
						    </li>
						    <?php if ($i%3 ==0): ?>
						    	<div class="clearfix"></div>
						    <?php endif ?>

							<?php $i++; endforeach ?> 
						</ul>
						<div class="sort-pagi-bar bottom clearfix">
							<?php if (isset($links_pagination)): ?>
								<?php echo $links_pagination ?>
							<?php endif ?>
						</div>
					</div>
					<!-- End Grid Product -->
				</div>
			</div>
		</div>
	</div>
	<!-- End Grid Product -->
</div>
<!-- End Content -->
<?php $this->load->view('template/logo'); ?>