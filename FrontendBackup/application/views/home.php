<div id="content">
    <div class="banner-slider-rect-vertical">
        <div class="wrap-item">
         <?php foreach ($slider_list as $slider): ?>
            <?php if ($slider['id'] != '4'): ?>
            <div class="item">
                <div class="content-banner-slider">
                    <a href="<?php echo $slider['link'] ?>" class="banner-thumb-link">
                        <img src="<?php echo $slider['image'] ?>" alt="" />
                    </a>
                    <div class="banner-info">
                        <div class="container">
                            <div class="banner-rect-info">
                                <h4><span><?php echo $slider['name'] ?></span></h4>
                                <h2><span><?php echo $slider['description'] ?></span></h2>
                                <p class="desc"><?php echo $slider['description1'] ?></p>
                                <a href="<?php echo $slider['link'] ?>" class="btn-link-default"><?php echo $slider['name_link'] ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Item -->        
            <?php endif ?>    
         <?php endforeach ?>         
        </div>
    </div>
    <!-- End Banner Slider -->
    <div class="banner-top-home3">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Top -->
    <div class="product-best-sale">
        <div class="container">
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
                                                <li>
                                                    <?php echo  $detail['product_brand_name']; ?>
                                                </li>
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
                <div class="hidden-xs sidebar sidebar-left sidebar-product">
                 <p> 
                    <a href="http://line.me/ti/p/%40zlg9137d" target="_blank">
                     <img src="<?php echo base_url('theme/images/qrcodeNotebookdd.jpg') ?>" class="img-responsive" alt="Image">
                    </a>
                 </p>
                 </div>
                 <p>

                  <div class="hidden-xs sidebar sidebar-left sidebar-product">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.6&appId=615663091936505";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="add-banner-carsuol">

                           <div class="fb-page" data-href="https://www.facebook.com/notebooksimple/"  data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/notebooksimple/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/notebooksimple/">ร้าน ซิมเปิ้ล อิท จำหน่ายอะไหล่โน๊ตบุ๊ค-รับซ่อมโน๊ตบุ๊ต คอมพิวเตอร์</a></blockquote></div>
                        </div>
                    </div>
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
             <?php foreach ($slider_list as $slider): ?>
                <?php if ($slider['id'] == '4'): ?>

                <div class="bs-calltoaction bs-calltoaction-mit">
                    <div class="row">
                        <div class="col-md-9 cta-contents">
                            <h1 class="cta-title"><i class="fa fa-bullhorn" aria-hidden="true"> </i> <?php echo $slider['name'] ?></h1>
                            <div class="cta-desc">
                                <p><?php echo $slider['description'] ?></p>
                            </div>
                        </div>
                        <div class="col-md-3 cta-button">
                            <a href="<?php echo $slider['link'] ?>" class="btn btn-lg btn-block btn-info"><?php echo $slider['name_link'] ?></a>
                        </div>
                     </div>
                </div>
                <!-- End Item -->        
                <?php endif ?>    
             <?php endforeach ?>
       

                <div class="title-product-best-sale">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <h2 class="title-normal">สินค้ามาใหม่</h2>
                            <div class="nav-tabs-bestsale">
                                <ul role="tablist" class="nav nav-tabs">
                                    <li class="active" role="presentation"><a data-toggle="tab" role="tab" aria-controls="furniture" href="#furniture">สินค้ามาใหม่</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div id="furniture" class="tab-pane active" role="tabpanel">
                        <ul class="list-product row list-unstyled">
                            <?php 
                         $data_product_new['product_list'] = $product_new;
                         $this->load->view('home/product_new',$data_product_new); 
                        ?>
                        </ul>
                    </div>
                    <!-- End Best Seller -->
                    <div id="lighting" class="tab-pane" role="tabpanel">
                    </div>
                    <!-- End Special -->
                    <div id="bedbath" class="tab-pane " role="tabpanel">
                    </div>
                    <!-- End Featured -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Best Sale -->
</div>
<!-- End Content -->
<?php $this->load->view('template/logo'); ?>
