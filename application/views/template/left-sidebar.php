<div class="left-sidebar">
    <?php 
        $page_n ="";
        if(isset($page)) {
            $page_n = $page;
        }
     ?> 
    <div class="side-menu animate-dropdown outer-bottom-xs <?php if ($page_n == "product_detail"): ?> hidden-sm hidden-xs <?php endif ?>">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> ประเภทสินค้า</div>
        <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">


            <?php foreach ($menu_type as $master): ?>
                <?php  

                    $count_sub = 0;
                    foreach ($menu_sub_type as $sub) {
                       if ($master['id'] == $sub['parenttype_id'] && $sub['name'] !=""){
                        $count_sub++;
                       }
                    }

                ?>
                <?php if ($count_sub == 0): ?>
                <li class="dropdown menu-item">
                        <a href="<?php echo base_url('products/category/'.$master['slug']) ?>">
                         <?php echo $master['name']; ?>
                        </a>
                    </li>
                <?php else: ?>
                <li class="dropdown menu-item">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <?php echo $master['name']; ?> <span class="pull-right"><i class="fas fa-chevron-right"></i></span></a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">
                                <div class="col-md-12 col-md-3">
                                    <ul class="links list-unstyled">
                                    <?php foreach ($menu_sub_type as $sub): ?>
                                        <?php if ($master['id'] == $sub['parenttype_id'] && $sub['name'] !=""): ?>

                                            <?php  
                                                $sub_3_count = 0;
                                                foreach ($menu_sub_type as $sub_3) {
                                                if ($sub['id'] == $sub_3['parenttype_id'] && $sub_3['name'] !=""){
                                                    $sub_3_count++;
                                                }
                                                }
                                            ?>
                                            <?php if ($sub_3_count == 0): ?>
                                                <li>
                                                    <a href="<?php echo base_url('products/category/'.$sub['slug']) ?>">
                                                        <?php echo  $sub['name']; ?> <span>(<?php echo $sub['count_product'] ?>)</span></a>
                                                </li>
                                            <?php else: ?>
                                                <li><a href="#"><?php echo $sub['name']; ?></a>
                                                    <ul>
                                                    <?php foreach ($menu_sub_type as $sub_3_item): ?>
                                                        <?php if ($sub['id'] == $sub_3_item['parenttype_id']): ?>
                                                            
                                                        <li><a href="<?php echo base_url('products/category/'.$sub_3_item['slug']) ?>">
                                                        <?php echo  $sub_3_item['name']; ?> <span>(<?php echo $sub_3_item['count_product'] ?>)</span></a></li>
                                                                
                                                        <?php endif ?>
                                                    
                                                    <?php endforeach ?>
                                                        <li><a href="<?php echo base_url('products/category/'.$sub['slug']) ?>">ทั้งหมด</a></li>
                                                    </ul>
                                                </li>
                                            <?php endif ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                    <li><a href="<?php echo base_url('products/category/'.$master['slug']) ?>">ทั้งหมด</a></li>
                                    </ul>
                                </div><!-- /.col -->
                                
                            </div><!-- /.row -->
                        </li><!-- /.yamm-content -->
                    </ul><!-- /.dropdown-menu -->
                </li><!-- /.menu-item -->
                </li><!-- /.menu-item -->
                <?php endif ?>
                <?php endforeach ?>

            </ul><!-- /.nav -->
        </nav><!-- /.megamenu-horizontal -->
    </div><!-- /.side-menu -->

    <?php if ($content == "products"): ?>
    <div class="side-menu animate-dropdown outer-bottom-xs <?php if ($page_n == "product_detail"): ?> hidden-sm hidden-xs <?php endif ?>">
        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> ยี่ห้อสินค้า</div>
        <nav class="yamm megamenu-horizontal" role="navigation">
            <ul class="nav">
                <?php foreach ($menu_brands as $brand): ?>
                <?php if ($brand['name']!="" && $brand['type_id'] !="4"): ?>
                <li>
                    <a href="<?php echo base_url('products/brand/'.$brand['slug']) ?>">
                        <?php echo $brand['name'] ?>
                        <span>(<?php echo $brand['count_product'] ?>)</span>
                    </a>
                </li>
                <?php endif ?>
                <?php endforeach ?>
            </ul><!-- /.nav -->
        </nav><!-- /.megamenu-horizontal -->
    </div><!-- /.side-menu -->
    <!-- category-menu-area end-->

    <?php endif ?>

</div>
