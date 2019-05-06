
<div class="category-product  inner-top-vs">
    <div class="row">
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
 
 <div class="col-sm-6 col-md-4">
    <div class="products">

        <div class="product">
            <div class="product-image">
                <div class="image">
                    <a href="<?php echo base_url('product/'.$row['slug']) ?>"><img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                            data-echo="<?php echo $image_url;?>" class="img-responsive" alt="<?php echo $row['name']; ?>" >
                    </a>
                </div><!-- /.image -->
            </div><!-- /.product-image -->


            <div class="product-info text-left">
                <h3 class="name"><a href="<?php echo base_url('product/'.$row['slug']) ?>"><?php echo $row['name']; ?></a></h3>
                <?php if (isset($row['model']) && $row['model'] != ""): ?>
                <div class="description"><?php echo $row['model']; ?></div>
                <?php endif ?>
                <div class="product-price">

                <?php if ($dis_price < $price): ?>
                    
                    <span class="price" ><?php echo number_format($dis_price,2);?></span>
                    <span class="price-before-discount" ><?php echo number_format($price,2);?></span>

                <?php else: ?>
                    <span class="price" ><?php echo number_format($dis_price,2);?></span>
                <?php endif ?>

                </div><!-- /.product-price -->

            </div><!-- /.product-info -->
            <div class="cart clearfix animate-effect">
                <div class="action">
            
                <?php if ($row['stock'] > 0): ?>
                    <a class="btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>" type="button"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
                <?php else: ?>
                     <a class="btn btn-primary" href="<?php echo base_url('product/'.$row['slug']) ?>" type="button"><i class="fas fa-info"></i> รายละเอียด</a>
                <?php endif ?>


                </div><!-- /.action -->
            </div><!-- /.cart -->
        </div><!-- /.product -->

    </div><!-- /.products -->
</div><!-- /.item -->

    <?php if ($i%3 ==0): ?>
    <div class="clearfix"></div>
    <?php endif ?>
    <?php $i++;  endforeach ?>
    </div>
    </div><!-- /.category-product -->

