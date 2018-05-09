
<?php foreach ($product_list as $row): ?>
    <li class="col-md-3 col-sm-6 col-xs-12">
        <div class="item-product item-product-loadmore">
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
                <a href="<?php echo base_url('product/'.$row['sku']) ?>" class="product-thumb-link"><img class="img-responsive" src="<?php echo $image_url;?>" alt=""></a>
                <div class="product-box-promotion">
                    <span class="new-item">new</span>
                </div>
            </div>
            <div class="item-product-info">
                <div class="info-price">
                 <?php if ($this->session->userdata('is_logged_in') && $this->session->userdata('verify') == "1"): ?>
                    <span ng-bind="<?php echo $row["member_discount"];?> | currency:'฿':0"></span>

                <?php else: ?>
                    <?php if ($row["dis_price"] > 0): ?>
                        <del ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></del>
                        <span ng-bind="<?php echo $row["dis_price"];?> | currency:'฿':0"></span>
                    <?php else: ?>
                        <span class="amount" ng-bind="<?php echo $row["price"];?> | currency:'฿':0"></span>
                    <?php endif ?>
                <?php endif ?>
                   
            </div>

                <h3 class="title-product"><a href="<?php echo base_url('product/'.$row['sku']) ?>"><?php echo $row['name'] ?></a></h3>
                <p class="desc"><?php echo $row['model'] ?></p>
                <div class="cart-wishlist-compare text-center">
                     <?php if ($row['stock_all'] > 0): ?>
                        <a  href="<?php echo base_url('cart/add/'.$row["id"]) ?>"  class="product-add-cart text-center" 
                    ng-click="addProduct_click(<?php echo $row["id"];?>)"></a>
                    <?php else: ?>
                        <?php if ($row['is_reservations']): ?>
                            <a  href="<?php echo base_url('cart/add/'.$row["id"]) ?>" class="text-center"><strong class="text-success">จองสินค้า</strong></a>
                        <?php else: ?>
                            <a  href=""  class="text-center" ><strong class="text-danger">หมดชั่วคราว</strong></a>
                        <?php endif ?>
                        
                    <?php endif ?>
                </div>
            </div>
        </div>
    </li>
<?php endforeach ?> 