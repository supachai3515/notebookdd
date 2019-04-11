
<?php $i=1; foreach ($product_list as $row): ?>
    <li class="col-md-4 col-sm-4 col-xs-12">
        <div class="item-product">
            <div class="item-product-thumb">
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
                <img class="img-responsive img-thumproduct" src="<?php echo $image_url;?>" alt=""></a>
                <div class="product-box-promotion">
                    <span class="new-item">new</span>
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
<?php $i++;  endforeach ?> 