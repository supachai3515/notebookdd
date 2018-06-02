
<script type="text/javascript">
  app.controller("payment_ctrl", function($scope, $http) {
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
  });
</script>
