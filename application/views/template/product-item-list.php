
 
<div class="category-product  inner-top-vs">
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
 
 <div class="category-product-inner">
        <div class="products">
            <div class="product-list product">
                <div class="row product-list-row">
                    <div class="col col-sm-4 col-lg-4">
                        <div class="product-image">

                            <div class="image">
                            <a href="<?php echo base_url('product/'.$row['slug']) ?>"><img src="<?php echo base_url('theme_unicase');?>/assets/images/blank.gif"
                                    data-echo="<?php echo $image_url;?>" class="img-responsive" alt="<?php echo $row['name']; ?>" >
                            </a>
                        </div><!-- /.image -->

                        </div><!-- /.product-image -->
                    </div><!-- /.col -->
                    <div class="col col-sm-8 col-lg-8">
                        <div class="product-info">
                            <h3 class="name"><a href="<?php echo base_url('product/'.$row['slug']) ?>"> <?php echo $row['name'] ?></a></h3>
                           
                            <div class="product-price">
                            <?php if ($dis_price < $price): ?>
                    
                                <span class="price" ><?php echo number_format($dis_price,2);?></span>
                                <span class="price-before-discount" ><?php echo number_format($price,2);?></span>

                            <?php else: ?>
                                <span class="price" ><?php echo number_format($dis_price,2);?></span>
                            <?php endif ?>

                            </div><!-- /.product-price -->

                            <?php if (isset($row['model']) && $row['model'] != ""): ?>
                            <div class="description m-t-10"><?php echo $row['model']; ?></div>
                            <?php endif ?>
                             
                            <div class="cart clearfix animate-effect">
                                <div class="action">

                                <?php if ($row['stock'] > 0): ?>
                    <a class="btn btn-primary" href="<?php echo base_url('cart/add/'.$row["id"]) ?>" type="button"><i class="fa fa-shopping-cart"></i> สั่งซื้อสินค้า</a>
                <?php else: ?>
                     <a class="btn btn-primary" href="<?php echo base_url('product/'.$row['slug']) ?>" type="button"><i class="fas fa-info"></i> รายละเอียด</a>
                <?php endif ?>




                                </div><!-- /.action -->
                            </div><!-- /.cart -->

                        </div><!-- /.product-info -->
                    </div><!-- /.col -->
                </div><!-- /.product-list-row -->
                
            </div><!-- /.product-list -->
        </div><!-- /.products -->
    </div><!-- /.category-product-inner -->

    <?php $i++;  endforeach ?>
     
    </div><!-- /.category-product -->
