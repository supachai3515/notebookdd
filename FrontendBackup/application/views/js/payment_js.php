
<script type="text/javascript">
  app.controller("payment_ctrl", function($scope, $http, cfpLoadingBar) {

      $scope.sendPayment = function() {
        cfpLoadingBar.start();
        $http({
            method: 'POST',
            url: '<?php echo base_url('payment/sendmail');?>',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: $scope.paymentMessage
        }).then(function(resp) {
            swal({
                type: 'success',
                title: 'สำเร็จ',
                text: 'การแจ้งชำระเงินสำเร็จ'
            })
        }, function(err) {
            swal({
                type: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'การแจ้งชำระเงินไม่สำเร็จ'
            })
        });
    }

  });
</script>
