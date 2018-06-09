<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
            <ul class="list-inline list-unstyled">
                <li><a href="<?php echo base_url()?>">Home</a></li>
                <li class='active'>วีธีการสั่งซื้อ</li>
            </ul>
        </div><!-- /.breadcrumb-inner -->
    </div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-bd">
    <div class="container">
        <div class="terms-conditions-page inner-bottom-sm">
            <div class="row">
                <div class="col-md-12 terms-conditions">
                    <h2>วีธีการสั่งซื้อ</h2>
                    <!-- <span> This Agreement was last modified on July 20, 2014.</span> -->
                    <div class="inner-top-sm">
                        <h3>วิธีสั่งซื้อผ่านเว็บไซต์ แบบปกติ</h3>
                        <ol>
                            <li>เลือกสินค้า จากนั้นกดปุ่ม "สั่งซื้อสินค้า"</li>
                            <li>เมื่อเลือกสินค้าที่ต้องการครบเรียบร้อยแล้วไปที่หน้าตะกร้าสินค้าโดยกดปุ่มตะกร้าสินค้าด้านบน</li>
                            <li>ตรวจสอบรายการสั่งซื้อ จากนั้นกดปุ่ม "ยืนยันการสั่งซื้อ"</li>
                            <li>ชำระเงิน ด้วยวิธีโอนเงินเข้าบัญชีธนาคาร</li>
                            <li>ลูกค้าแจ้งการชำระเงิน <a href="<?php echo base_url('payment')?>" class='contact-form'>วิธีแจ้งชำระเงิน</a></li>
                            <li>ลูกค้ารอรับสินค้าตามที่อยู่ที่ท่านแจ้งไว้</li>
                        </ol>
                        <h3>วิธีสั่งซื้อผ่านเว็บไซต์ แบบจอง</h3>
                        <ol>
                            <li>เลือกสินค้า กดปุ่ม "จองสินค้า"</li>
                            <li>เมื่อเลือกสินค้าที่ต้องการครบเรียบร้อยแล้ว <span style="display: inline-block; color: #ff0000;">*สามารถเลือกสินค้าได้แค่ชนิดเดียวต่อการสั่งซื้อ</span></li>
                            <li>เมื่อเลือกสินค้าที่ต้องการครบเรียบร้อยแล้วไปที่หน้าตะกร้าสินค้าโดยกดปุ่มตะกร้าสินค้าด้านบน</li>
                            <li>ตรวจสอบรายการสั่งซื้อ จากนั้นกดปุ่ม "ยืนยันการสั่งซื้อ"</li>
                            <li>รอการติดต่อกลับจากทางร้าน ยืนยันรายละเอียดการสั่งซื้อ และ วันเวลการรับสินค้า</li>
                            <li>ให้ลูกค้ายืนยันการจองผ่านอีเมลล์ที่ลูกค้ากรอก เพื่อเป็นหลักฐานการจอง</li>
                            <li>ชำระเงิน ด้วยวิธีโอนเงินเข้าบัญชีธนาคาร</li>
                            <li>ลูกค้ารอรับสินค้าตามที่อยู่ที่ท่านแจ้งไว้</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.sigin-in-->
        <!-- ============================================== BRANDS CAROUSEL ============================================== -->
        <?php $this->load->view('template/footer_brand'); ?>
        <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->
    </div>
    <!-- /.container -->
</div>
<!-- /.body-content -->