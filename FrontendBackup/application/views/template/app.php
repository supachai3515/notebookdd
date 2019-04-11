<script type="text/javascript">

//Angular js
var app = angular.module('myApp', []);
app.controller('mainCtrl', function($scope,$http) {
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
     $scope.message_prosecss="";

        $scope.saveDealer = function() {
            $scope.isProscess = true;
            $scope.message_prosecss = "กรุณารอ...";
         
          $http({
            method: 'POST',
            url: '<?php echo base_url('dealer/register');?>',
             headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
         },
            data: $scope.dealer

        }).success(function(data) {


            if(data.error == true) {
                $scope.isProscess = false;
                $scope.message_error = data.error;
                $scope.message_prosecss = data.message;

            }
            else {
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
            <?php if ($this->session->userdata('is_logged_in')): ?>
                $scope.getDealer("<?php echo $this->session->userdata('username');?>");
            <?php endif ?>        
       }

    
     $scope.savedealerEdit = function() {
            <?php if($this->session->userdata('is_logged_in')) {?>

                $http({
                    method: 'POST',
                    url: '<?php echo base_url('dealer/edit/');?>',
                     headers: {
                   'Content-Type': 'application/x-www-form-urlencoded'
                },
                    data: $scope.dealerEdit
                }).success(function(data) {

                    if(data.error == true) {
                    $scope.isProscess = false;
                    
                    $scope.message_prosecss = data.message;
                }
                else {
                    $scope.isProscess = false;
                    $scope.message_prosecss = 'บันทึกสำเร็จ';
                }
               });

             <?php }?>
       

       }

        $scope.getDealer = function(name) {
            $scope.name_dealer = name
             $http({
            method: 'POST',
            url: '<?php echo base_url('dealer/getdealer');?>',
             headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
         },

         data: { name_dealer : $scope.name_dealer}
           
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
            url: '<?php echo base_url('payment/sendmail');?>',
             headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
         },
            data:$scope.paymentMessage
        }).success(function(data) {
             $scope.isProscess = false;
            $scope.message_prosecss = data.message;

            console.log(data);
       });

      }

       $scope.getOrderTracking = function() {        
            console.log($scope.txtSearchTracking);
            var orderid = $scope.txtSearchTracking;
            if($scope.txtSearchTracking==null)
            {
                orderid="all"
            }

            $http({
            method: 'GET',
            url: '<?php echo base_url('tracking/get_all') ?>?get='+orderid,
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
            url: '<?php echo base_url('download/get_all') ?>',
             headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
         },
           
        }).success(function(data) {
            $scope.doc_list = data;
            //console.log(data);
       });

     
       }

        $scope.ckeckoutSubmit = function() {        
           
                 $scope.isProscess = true;
         $scope.message_prosecss = "กรุณารอ...";
            console.log($scope.paymentMessage);

                  $http({
                method: 'POST',
                url: '<?php echo base_url('payment/sendmail');?>',
                 headers: {
               'Content-Type': 'application/x-www-form-urlencoded'
             },
                data:$scope.paymentMessage
            }).success(function(data) {
                 $scope.isProscess = false;
                $scope.message_prosecss = 'ทำการสั่งซื้อสำเเร็จ';

                console.log(data);
           });
       }


    //init get
     $scope.getOrder();


});
</script>
