<?php $i=1; foreach ($product_list as $row): ?>
<div class="item item-carousel">
	<div class="products">
        <div class="product">
            <div class="product-image">
                <div class="image">
                    <?php 
                        $image_url="";
                        if($row['image'] !=""){
                            $image_url = $this->config->item('url_img').$row['image'];
                        } else {
                            $image_url = $this->config->item('no_url_img');
                        }
                    ?> 
                    <a data-lightbox="<?php echo $i;?>" data-title="<?php echo $row['name'] ?>" href="<?php echo $image_url;?>"><img src="<?php echo $image_url;?>" data-echo="<?php echo $image_url;?>" alt=""></a>
                </div><!-- /.image -->
                <div class="tag new">
                    <span>new</span>
                </div>
            </div><!-- /.product-image -->
            <p class="text-center">
                <?php if ($row['stock_all'] > 0 || $row['is_add_outofstock']): ?>
                    <span class="label label-success"><i class="fa fa-check" aria-hidden="true"></i> มีสินค้า</span>
                <?php else: ?>
                    <span class="label label-default">หมดชั่วคราว</span>
                <?php endif ?>
                
            </p>
            <div class="product-info text-left">
                <h3 class="name"><a href="<?php echo base_url('product/'.$row['sku']) ?>">{{limitProductName('<?php echo $row['name'] ?>')}}</a></h3>
                <div class="rating rateit-small"></div>
                <div class="description"></div>
                
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
                <div class="product-price">
                    <?php if ($price > 1): ?>
                        <?php if ($row["dis_price"] > 1): ?>
                            <span class="price"ng-bind="<?php echo $row["dis_price"];?> | currency:'฿':0"></span><span class="price-before-discount" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></span>
                        <?php else: ?>
                            <span class="price" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></span>
                        <?php endif ?>
                    <?php else: ?>
                        <span class="price">ราคาสอบถาม</span>
                    <?php endif ?>	
                </div><!-- /.product-price -->
            </div><!-- /.product-info -->
            <div class="cart clearfix animate-effect">
                <div class="action">
                    <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                        <?php if ($price >1): ?>
                            <?php if ($row['stock_all'] > 0): ?>
                                <a class="lnk btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
                            <?php else: ?>

                                <?php if ($row['is_add_outofstock']): ?>
                                    <a class="lnk btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
                                <?php else: ?>
                                    <?php if ($row['is_reservations']): ?>
                                        <a class="lnk btn btn-primary" href="<?php echo base_url('cart/add_reservations/'.$row["id"]) ?>"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
                                    <?php else: ?>
                                        <button class="btn btn-primary" type="button">หมดชั่วคราว</button>
                                    <?php endif ?>
                                <?php endif ?>
                            <?php endif ?>

                        <?php else: ?>
                            <a class="lnk btn btn-primary" href="<?php echo base_url('contact') ?>">ติดต่อเรา</a>
                        <?php endif ?>     
                        </li>
                    </ul>
                </div><!-- /.action -->
            </div><!-- /.cart -->
        </div><!-- /.product -->
	</div><!-- /.products -->
</div><!-- /.item -->
<?php $i++;  endforeach ?> 