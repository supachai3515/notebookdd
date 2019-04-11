</div>
</div>
<!-- /container -->
<div id="footer">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="logo logo-footer">
                        <a href="http://www.notebookdd.com/" class="sub-title"><span class="lnr lnr-apartment"></span> notebookdd</a>
                    </div>
                    <div class="contact-phone">
                        <label class="sub-title"><i class="fa fa-map-marker" aria-hidden="true"></i> ADDRESS:</label>
                        <span class="phone-number">135/99 ถ.สุขุมวิท ต.ศรีราชา อ.ศรีราชา จ.ชลบุรี 20110 ชั้น 2 ตึกคอมศรีราชา</span>
                    </div>
                    <div class="contact-phone">
                        <label class="sub-title"><i class="fa fa-phone" aria-hidden="true"></i> hot-line:</label>
                        <span class="phone-number">089 507 2023</span>
                        <span class="phone-number">090 983 9636</span>
                        <span class="phone-number">086 996 3596</span>
                    </div>
                    <div class="contact-phone">
                        <label class="sub-title"><i class="fa fa-comment"></i> line id:</label>
                        <span class="phone-number"><a href="http://line.me/ti/p/%40zlg9137d" target="_blank">@notebookdd</a></span>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="footer-nav">
                        <h2 class="sub-title">Account</h2>
                        <ul class="list-unstyled">
                            <li><a href="http://www.notebookdd.com/products"><i class="fa fa-laptop"></i> ร้านค้า</a></li>
                            <li><a href="http://www.notebookdd.com/howtobuy"><i class="fa fa-shopping-bag"></i> วิธีการสั่งซื้อ</a></li>
                            <li><a href="http://www.notebookdd.com/payment"><i class="fa fa-money"></i> แจ้งชำระเงิน</a></li>
                            <li><a href="http://www.notebookdd.com/tracking"><i class="fa fa-truck"></i> tracking</a></li>
                            <li><a href="http://www.notebookdd.com/warranty">เงื่อนไขการรับประกัน</a></li>
                            <li><a href="http://www.notebookdd.com/download">Dowload เอกสาร</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="newsletter">
                        <h2 class="sub-title">เวลาทำการ notebookdd.com</h2>
                        <p><i class="fa fa-clock-o"></i> ทุกวัน 10.30 - 20.00 น.</p>
                        <h2 class="sub-title">ช่องทางการชำระเงิน</h2>
                        <p>
                            <a href="http://www.notebookdd.com/payment"> <img src="http://www.notebookdd.com/theme/images/bankimg.jpg" class="img-responsive" alt="Image" width="100%"></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer -->
</div>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/jquery-ui.js"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/owl.carousel.js"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/jquery.bxslider.js"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/js/theme.js"></script>
<script type='text/javascript' src='http://www.notebookdd.com/theme/js/angular.min.js'></script>
<!-- Add fancyBox Js -->
<script type="text/javascript" src="http://www.notebookdd.com/theme/fancyBox/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/fancyBox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/fancyBox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/fancyBox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="http://www.notebookdd.com/theme/fancyBox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript">
$(document).ready(function() {
    $(".fancybox-thumb").fancybox({
        prevEffect: "none",
        nextEffect: "none",
        helpers: {
            title: {
                type: "outside"
            },
            thumbs: {
                width: 50,
                height: 50
            }
        }
    });
});
</script>
<script type="text/javascript">
//Angular js
var app = angular.module('myApp', []);
app.controller('mainCtrl', function($scope, $http) {
    $scope.product_alert = false;
    $scope.is_reservations_check = false;
    $scope.product_alert_text = 'สินค้า 1 ชิ้น ได้ถูกเพิ่มเข้าไปยังตะกร้าสินค้าของคุณ <a class="btn btn-default" href="http://www.notebookdd.com/cart" role="button">ดูตะกร้าสินค้า</a>';

    $scope.productItems = [{
        id: '0',
        sku: '0',
        name: '',
        img: '',
        price: 0,
        quantity: 0,
        rowid: '',
        model: '',
        brand: '',
        is_reservations: 0,
        type: ''
    }];

    $scope.sumTotal = function() {
        var total = 0;
        for (var i = 0; i < $scope.productItems.length; i++) {
            var product = $scope.productItems[i];
            total += (product.price * product.quantity);
        }
        return total;
    }

    $scope.sumItems = function() {
        var quantity = 0;
        for (var i = 0; i < $scope.productItems.length; i++) {
            var product = $scope.productItems[i];
            quantity = quantity + product.quantity;
        }
        return parseInt(quantity, 10);
    }

    $scope.addProduct_click = function(productId) {
        // Simple GET request example:
        $http({
            method: 'GET',
            url: 'http://www.notebookdd.com/cart/add_item/' + productId

        }).success(function(data) {
            $scope.product_alert = true;
            $scope.getOrder();
        });
    }

    $scope.updateProduct_click = function(rowid, editValue) {
        // Simple GET request example:
        $http({
            method: 'GET',
            url: 'http://www.notebookdd.com/cart/update_item/' + rowid + '/' + editValue
        }).success(function(data) {
            $scope.getOrder();
            $scope.deleteResult = data;
        });
    }

    $scope.updateProduct_click_plus = function(rowid) {
        var qty = 0;

        angular.forEach($scope.productItems, function(value, key) {
            if (value.rowid == rowid) {
                qty = value.quantity + 1;
            }

        });
        if (qty > 0) {
            $http({
                method: 'GET',
                url: 'http://www.notebookdd.com/cart/update_item/' + rowid + '/' + qty
            }).success(function(data) {
                $scope.getOrder();
                $scope.deleteResult = data;
            });
        }

    }

    $scope.updateProduct_click_minus = function(rowid) {

        var qty = 0;

        angular.forEach($scope.productItems, function(value, key) {
            if (value.rowid == rowid) {
                qty = value.quantity - 1;
            }

        });
        if (qty > 0) {
            $http({
                method: 'GET',
                url: 'http://www.notebookdd.com/cart/update_item/' + rowid + '/' + qty
            }).success(function(data) {
                $scope.getOrder();
                $scope.deleteResult = data;
            });
        }

    }


    $scope.deleteProduct_click = function(rowid) {

        // Simple GET request example:
        $http({
            method: 'GET',
            url: 'http://www.notebookdd.com/cart/delete_item/' + rowid
        }).success(function(data) {
            $scope.getOrder();
            //$scope.deleteResult = data;
        });
    }

    $scope.getOrder = function() {

        // Simple GET request example:
        $http({
            method: 'GET',
            url: 'http://www.notebookdd.com/cart/get_cart'
        }).success(function(data) {

            $scope.productItems = [{
                id: '0',
                sku: '0',
                name: '',
                img: '',
                price: 0,
                quantity: 0,
                rowid: '',
                model: '',
                brand: '',
                is_reservations: 0,
                type: ''
            }];

            $scope.dataResult = data;
            for (var i = 0; i < $scope.dataResult.length; i++) {
                var product = $scope.dataResult[i];
                $scope.productItems.push({
                    id: product.id,
                    sku: product.sku,
                    name: product.name,
                    img: product.img,
                    price: product.price,
                    quantity: product.qty,
                    rowid: product.rowid,
                    model: product.model,
                    brand: product.brand,
                    is_reservations: product.is_reservations,
                    type: product.type
                });
                if (product.is_reservations == "1") {
                    $scope.is_reservations_check = true;
                }

            }
            $scope.productItems.slice(0, 1);
        });

    }

    $scope.caltax = function() {
        var sumtex = 0;
        if ($scope.isTax) {
            sumtex = (($scope.sumTotal()) * 7) / 100;
        }
        return sumtex;
    }

    $scope.caltaxReceipt = function(val) {

        if (val) {
            $scope.isTax = true;

        } else {
            $scope.isTax = false;

        }
    }


    $scope.isProscess = false;
    $scope.message_prosecss = "";

    $scope.saveDealer = function() {
        $scope.isProscess = true;
        $scope.message_prosecss = "กรุณารอ...";

        $http({
            method: 'POST',
            url: 'http://www.notebookdd.com/dealer/register',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            data: $scope.dealer

        }).success(function(data) {


            if (data.error == true) {
                $scope.isProscess = false;
                $scope.message_error = data.error;
                $scope.message_prosecss = data.message;

            } else {
                $scope.isProscess = false;
                $scope.message_error = data.error;
                $scope.message_prosecss = 'เราได้รับข้อมูลของคุณเรียบร้อยแล้ว';
            }

            console.log(data);
        });

    }

    $scope.showOrderDealer = true;
    $scope.editDealerForm = false;

    $scope.showOrderDealer_click = function() {
        $scope.showOrderDealer = true;
        $scope.editDealerForm = false;
    }

    $scope.editDealerForm_click = function() {

        $scope.showOrderDealer = false;
        $scope.editDealerForm = true;

    }


    $scope.savedealerEdit = function() {


    }

    $scope.getDealer = function(name) {
        $scope.name_dealer = name
        $http({
            method: 'POST',
            url: 'http://www.notebookdd.com/dealer/getdealer',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },

            data: {
                name_dealer: $scope.name_dealer
            }

        }).success(function(data) {
            $scope.dealerEdit = data;
            //console.log(data);
        });

    }


    $scope.sendPayment = function() {
        $scope.isProscess = true;
        $scope.message_prosecss = "กรุณารอ...";
        console.log($scope.paymentMessage);

        $http({
            method: 'POST',
            url: 'http://www.notebookdd.com/payment/sendmail',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            data: $scope.paymentMessage
        }).success(function(data) {
            $scope.isProscess = false;
            $scope.message_prosecss = 'ส่งข้อความสำเร็จ';

            console.log(data);
        });

    }

    $scope.getOrderTracking = function() {
        console.log($scope.txtSearchTracking);
        var orderid = $scope.txtSearchTracking;
        if ($scope.txtSearchTracking == null) {
            orderid = "all"
        }

        $http({
            method: 'GET',
            url: 'http://www.notebookdd.com/tracking/get_all?get=' + orderid,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },

        }).success(function(data) {
            $scope.orderTracking = data;
            //console.log(data);
        });


    }

    $scope.getDoclist = function() {
        console.log($scope.txtSearchTracking);
        $http({
            method: 'GET',
            url: 'http://www.notebookdd.com/download/get_all',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },

        }).success(function(data) {
            $scope.doc_list = data;
            //console.log(data);
        });


    }


    //init get
    $scope.getOrder();


});
</script>
<?php wp_footer(); ?>
</body>

</html>