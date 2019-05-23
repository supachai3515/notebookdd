<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class='active'>ตะกร้าสินค้า</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
    <div class="container">
        <?php if($this->session->flashdata('msg') != ''){
        echo '  <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        '.$this->session->flashdata('msg').'
        </div>';
          }?>
        <div class="row inner-bottom-sm">
            <div class="shopping-cart">
            <?php if ($this->cart->contents()): ?>
               <?php echo form_open('cart/update_cart'); ?>
                      
                <div class="col-md-12 col-sm-12 shopping-cart-table ">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="cart-romove item">ลบ</th>
                                    <th class="cart-description item">รูป</th>
                                    <th class="cart-product-name item">ชื่อ</th>
                                
                                    <th class="cart-qty item">จำนวน</th>
                                    <th class="cart-sub-total item">ราคา</th>
                                    <th class="cart-total last-item">รวมทั้งหมด</th>
                                </tr>
                            </thead><!-- /thead -->
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="shopping-cart-btn">
                                            <span class="">
                                                <a href="<?php echo base_url('products') ?>" class="btn btn-upper btn-primary outer-left-xs"><i class="fas fa-chevron-left"></i> กลับไปเลือกสินค้า</a>
                                                <button type = "submit"  class="btn btn-upper btn-primary pull-right outer-right-xs"><i class="fas fa-redo-alt"></i> ปรับปรุงตะกร้าสินค้า</button>
                                            </span>
                                        </div><!-- /.shopping-cart-btn -->
                                    </td>
                                </tr>
                            </tfoot>
                            <tbody>
                            <?php $i = 1; ?>
                                    <?php foreach($this->cart->contents() as $items): ?>
                                    <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                                    <?php foreach ($cart_list as $row): ?>
                                    <?php if ($row['rowid']== $items['rowid']): ?>
                                <tr>
                                    <td class="romove-item"><a href="<?php echo base_url('cart/delete/'.$row['rowid']) ?>" title="cancel" class="icon"><i class="fas fa-trash-alt"></i></a></td>
                                    <td class="cart-image">
                                        <a class="entry-thumbnail" href="<?php echo base_url('product/'.$row['slug']) ?>">
                                            <img src="<?php echo $row['img']; ?>" class="img-responsive" alt="" width="100">
                                        </a>
                                    </td>
                                    <td class="cart-product-name-info">
                                        <h4 class='cart-product-description'><a href="<?php echo base_url('product/'.$row['slug']) ?>">  <?php echo $row['name']; ?></a></h4>
                                     
                                        <div class="cart-product-info">
                                        <?php if ($row['sku']!=''): ?>
                                            <span class="product-imel">SKU:<span><?php echo $row['sku']; ?></span></span><br>
                                        <?php endif ?>
                                         
                                        </div>
                                    </td>
                    
                                    <td class="cart-product-quantity">
                                        <div class="quant-input">
                                            <input type="text" hidden="true"  name="product_id[]" value="<?php echo $row['id'] ?>">
                                            <input type="number" name="qty[]" value="<?php echo $row['qty']; ?>" maxlength="3" size="5">
                                        </div>
                                    </td>
                                    <td class="cart-product-sub-total"><span class="cart-sub-total-price"><?php echo $this->cart->format_number($row['price']); ?></span>
                                    </td>
                                    <td class="cart-product-grand-total"><span
                                            class="cart-grand-total-price"><?php echo $this->cart->format_number($items['subtotal']); ?></span></td>
                                </tr>
                             
                                <?php endif ?>
                                    <?php endforeach ?>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>

                            </tbody><!-- /tbody -->
                        </table><!-- /table -->
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 cart-shopping-total pull-right">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>
										<div class="cart-grand-total">
                                        รวมทั้งหมด<span class="inner-left-md"><?php echo $this->cart->format_number($this->cart->total()); ?></span>
										</div>
									</th>
								</tr>
							</thead><!-- /thead -->
							<tbody>
								<tr>
									<td>
										<div class="cart-checkout-btn pull-right">
											<a href="<?php echo base_url('checkout') ?>" class="btn btn-primary"><i class="fas fa-check-circle"></i> ยืนยันการสั่งซื้อ</a>
										</div>
									</td>
								</tr>
							</tbody><!-- /tbody -->
						</table><!-- /table -->
					</div><!-- /.cart-shopping-total -->

                <?php echo form_close();  ?>
                <?php endif ?>
            </div><!-- /.shopping-cart -->
        </div> <!-- /.row -->
 
    </div><!-- /.container -->
</div><!-- /.body-content -->