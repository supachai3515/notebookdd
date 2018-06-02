
<script type="text/javascript">

  app.controller("tracking_ctrl", function($scope, $http,cfpLoadingBar, cfpLoadingBar) {
    $scope.orderTracking = '';
    $scope.getOrderTracking = function() {
        cfpLoadingBar.start();
        var orderid = $scope.txtSearchTracking || 'all';
        $http({
            method: 'GET',
            url: '<?php echo base_url('tracking/get_all?get=');?>' + orderid,
            headers: {'Content-Type': 'application/x-www-form-urlencoded' }
        }).then(function(resp) {
            $scope.orderTracking = resp.data;
            //console.log(resp)
        }, function(err) {
            console.log("can't get tracking", err)
        });
    }
    $scope.getOrderTracking();

  });

</script>
