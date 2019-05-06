<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="<?php echo base_url(); ?>">Home</a></li>
				<li class='active'>สินค้า</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs" ng-controller="products_ctrl">
	<div class='container'>
		<div class='row outer-bottom-sm'>
			<div class='col-md-3 sidebar'>
			<?php 
				//left-sidebar
				$this->load->view('template/left-sidebar');
			?>
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
            <?php if (isset($title_tag)): ?>
                <div class="head-search text-center">
                    <h2><?php echo $title_tag; ?></h2>
                </div>
            <?php endif ?>  
            <div class="clearfix filters-container m-t-10">
                <div class="row">
                    <div class="col col-sm-6 col-md-2">
                        <div class="filter-tabs">
                            <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                                <li class="active">
                                    <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-list"></i>Grid</a>
                                </li>
                                <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th"></i>List</a></li>
                            </ul>
                        </div><!-- /.filter-tabs -->
                    </div><!-- /.col -->
                    <div class="col col-sm-12 col-md-6">
                    </div><!-- /.col -->
                    <div class="col col-sm-6 col-md-4 text-right">
                        <div class="pagination-container">
                            <?php if (isset($links_pagination)): ?>
                                <?php echo $links_pagination ?>
                            <?php endif ?>
                        </div><!-- /.pagination-container -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>

				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
                        <div class="tab-pane active " id="grid-container">
							<?php $this->load->view('template/product-item-grid',$product_list); ?>	
                        </div><!-- /.tab-pane -->
							
						<div class="tab-pane "  id="list-container">
							<?php $this->load->view('template/product-item-list',$product_list); ?>	
						</div><!-- /.tab-pane #list-container -->
					</div><!-- /.tab-content -->
					<div class="clearfix filters-container">
						
							<div class="text-right">
                                <div class="pagination-container">
                                <?php if (isset($links_pagination)): ?>
                                    <?php echo $links_pagination ?>
                                <?php endif ?>
                                </div><!-- /.pagination-container -->
						    </div><!-- /.text-right -->
						
					</div><!-- /.filters-container -->

				</div><!-- /.search-result-container -->

			</div><!-- /.col -->
		</div><!-- /.row -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
	</div><!-- /.container -->

</div><!-- /.body-content -->