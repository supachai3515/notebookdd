
<script type="text/javascript">
  app.controller("header_cart_ctrl", function($scope, $http, cfpLoadingBar) {
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

  });
</script>
