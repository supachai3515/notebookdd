<div id="brands-carousel" class="logo-slider wow fadeInUp">
    <h3 class="section-title">ยี่ห้อสินค้า</h3>
    <div class="logo-slider-inner">
        <div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">

            <?php foreach ($menu_brands as $item) : ?>
                <?php if (isset($item['image'])) : ?>
                    <div class="item"> 
                        <a href="<?php echo base_url('products/brand/' . $item['slug']) ?>" class="image">
                            <img class="img-responsive" data-echo="<?php echo base_url() . $item['image'] ?>" src="<?php echo base_url('theme_unicase'); ?>/assets/images/blank.gif" alt="">
                        </a>
                    </div>
                    <!--/.item-->
                <?php endif ?>
            <?php endforeach ?>
        </div><!-- /.owl-carousel #logo-slider -->
    </div><!-- /.logo-slider-inner -->
</div>