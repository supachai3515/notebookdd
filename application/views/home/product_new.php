<?php $i=1; foreach ($product_list as $row): ?>
        <?php 
            $image_url="";
            if($row['image'] != "") {
                $image_url = $this->config->item('url_img').$row['image'];
            }
            else { $image_url = $this->config->item('no_url_img');
            }

            $price = $price = $row["price"];
            $dis_price = $disprice = $row["dis_price"];

            if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1") {

                if($this->session->userdata('is_lavel1')) {
                    if($row["member_discount_lv1"] > 1){
                        $dis_price = $row["member_discount_lv1"];
                    }
                }
                else {

                    if($row["member_discount"] > 1){
                        $dis_price = $row["member_discount"];
                    }
                }
            }
            if ($dis_price == 0) {
               $dis_price =  $price;
            }
        ?>


                <div class="item item-carousel">
                    <div class="products">
                        <div class="product">
                            <div class="product-image">
                    
                            <div class="image">
                                <a href="<?php echo base_url('product/'.$row['slug']) ?>">
                                
                                <img class="img-responsive"  src="<?php echo base_url('theme_unicase')  ?>/assets/images/blank.gif" data-echo="<?php echo $image_url; ?>" alt=""></a>
								</div><!-- /.image -->
                                
                                <div class="tag new"><span>ใหม่</span></div>
                            </div><!-- /.product-image -->


                            <div class="product-info text-left">
                                <h3 class="name"><a href="<?php echo base_url('product/'.$row['slug']) ?>"><?php echo $row['name']; ?></a>
                                </h3>
                               
                                <div class="description"></div>

                                <div class="product-price">
                                    <span class="price" ng-bind=""><?php echo $dis_price;?> </span>
                                    <span class="price-before-discount" ng-bind=""><?php echo $price;?></span>

                                </div><!-- /.product-price -->

                            </div><!-- /.product-info -->
                            <div class="cart clearfix animate-effect">
                                <div class="action">
                                    <ul class="list-unstyled">

                                                            
                                        <?php if ($row['stock'] > 0): ?>
                                        
                                            <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"
                                                                    data-toggle="dropdown" type="button">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </button>
                                                                <a class="btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>" type="button">สั่งซื้อสินค้า</a>

                                                            </li>

                                        <?php else: ?>
                        
                                        
                                        <li class="add-cart-button btn-group">
                                                                <button class="btn btn-primary icon"
                                                                    data-toggle="dropdown" type="button">
                                                                    <i class="fas fa-info"></i>
                                                                </button>
                                                                <a class="btn btn-primary" href="<?php echo base_url('product/'.$row['slug']) ?>" type="button">รายละเอียด</a>

                                                            </li>
                    
                                        <?php endif ?>
                    
                                        
                                    </ul>
                                </div><!-- /.action -->
                            </div><!-- /.cart -->
                        </div><!-- /.product -->

                    </div><!-- /.products -->
                </div><!-- /.item -->

		<!-- single-product-end -->
    <?php $i++;  endforeach ?>
