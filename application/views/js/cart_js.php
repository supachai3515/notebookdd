
<script type="text/javascript">
  app.controller("cart_ctrl", function($scope, $http, cfpLoadingBar) {
    $scope.product_alert = false;
    $scope.is_reservations_check = false;
    $scope.product_alert_text = 'สินค้า 1 ชิ้น ได้ถูกเพิ่มเข้าไปยังตะกร้าสินค้าของคุณ <a class="btn btn-default" href="<?php echo base_url("cart") ?>" role="button">ดูตะกร้าสินค้า</a>';
    
	$scope.productItems = [{
     		id: '0',
            sku: '0',
            name: '',
            img: '',
            price: 0,
            quantity: 0,
            rowid: '',
            model : '',
            brand   : '',
            is_reservations   : 0,
            type   : ''
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
            url: '<?php echo base_url()."cart/add_item/";?>'+ productId

        }).success(function(data) {
            $scope.product_alert = true;
             $scope.getOrder();
       });
    }

     $scope.updateProduct_click = function(rowid, editValue) {
        // Simple GET request example:
        $http({
            method: 'GET',
            url: '<?php echo base_url()."cart/update_item/";?>'+ rowid + '/' + editValue
        }).success(function(data) {
             $scope.getOrder();
            $scope.deleteResult = data;
        });
    }

    $scope.updateProduct_click_plus = function(rowid) {
        var qty = 0;

         angular.forEach($scope.productItems, function(value, key){
             if(value.rowid == rowid)
             {
                qty =value.quantity +1;
             }
               
         });
         if(qty>0){
             $http({
                method: 'GET',
                url: '<?php echo base_url()."cart/update_item/";?>'+ rowid + '/' + qty
            }).success(function(data) {
                 $scope.getOrder();
                $scope.deleteResult = data;
            });
         }     

    }

     $scope.updateProduct_click_minus = function(rowid) {

       var qty = 0;

         angular.forEach($scope.productItems, function(value, key){
             if(value.rowid == rowid)
             {
                qty =value.quantity - 1;
             }
               
         });
         if(qty>0){
             $http({
               method: 'GET',
               url: '<?php echo base_url()."cart/update_item/";?>'+ rowid + '/' + qty
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
            url: '<?php echo base_url()."cart/delete_item/";?>'+ rowid
        }).success(function(data) {
             $scope.getOrder();
            //$scope.deleteResult = data;
        });
    }

    $scope.getOrder = function() {
        cfpLoadingBar.start();
        // Simple GET request example:
        $http({
            method: 'GET',
            url: '<?php echo base_url()."cart/get_cart";?>'
        }).success(function(data) {
 
            $scope.productItems = [{
                id: '0',
                sku: '0',
                name: '',
                img: '',
                price: 0,
                quantity: 0,
                rowid: '',
                model : '',
                brand   : '',
                is_reservations   : 0,
                type   : ''
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
                    model : product.model,
                    brand : product.brand,
                    is_reservations: product.is_reservations,
                    type : product.type
                });
                if(product.is_reservations=="1"){
                    $scope.is_reservations_check = true;
                }

            }
            $scope.productItems.slice(0, 1);
        });

    }
    $scope.getOrder();

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



    // $scope.ckeckoutSubmit = function() {        
    //     swal({
    //         title: 'ยืนยัน?',
    //         text: "คุณต้องการแก้ไขบัญชีผู้ใช้!",
    //         type: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#abd07d',
    //         cancelButtonColor: '#ff7879',
    //         confirmButtonText: 'ยืนยัน',
    //         cancelButtonText: 'ยกเลิก'
    //     }).then((result) => {
    //         if (result) {
    //             sendCheckout()
    //         }
    //     })
    // }

    function sendCheckout() {

        $http({
            method: 'POST',
            url: '<?php echo base_url('payment/sendmail');?>',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $scope.paymentMessage
        }).then(function(resp) {
            swal({
                type: 'success',
                title: 'สำเร็จ',
                text: 'ทำการสั่งซื้อสำเเร็จ',
                confirmButtonColor: '#abd07d'
            })
        }, function(err){
            swal({
                type: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'ไม่สามารถทำการสั่งซื้อได้',
                confirmButtonColor: '#ff7879'
            })
        });
       }

  });



</script>
<script type="text/javascript">

function validateForm() {

     $.ajax({
            url: "<?php echo base_url('sms_otp/Call_otp_test');?>",
            type: "POST",
            async: false,
            cache: false,
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            data: {
                'mobile_number': "0917750586"
            },
            success: function (res) {

                swal({
                    title: 'กรุณาตรวจสอบ หรัส OTP',
                    text: "You are going to send emails from the system. Please confirm",                   
                    showCancelButton: true,
                    input: 'email',
                    inputValue: "",
                    confirmButtonText: 'Submit',
                    confirmButtonColor: '#4aa0f1',
                    cancelButtonColor: '#898b8e',
                    confirmButtonText: 'Send'
                    }).then(function (email) {  
                        send_email = email;
                        sentHtmtBody_send();
                        loadingIcon();
                    });
                swal("Done!", res.otp_id, "success");
                return false;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                return false;
                swal("Error deleting!", "Please try again", "error");
            }
        });    
        return true;
}
</script>