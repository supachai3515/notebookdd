
<script type="text/javascript">
  app.controller("account_ctrl", function($scope, $http, cfpLoadingBar) {
    $scope.accData = {};
    $scope.getDealer = function() {
        cfpLoadingBar.start();
        $scope.name_dealer = '<?php echo $this->session->userdata('username');?>'
        $http({
            method: 'POST',
            url: '<?php echo base_url('account/getdealer');?>',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            data: { name_dealer : $scope.name_dealer}
        }).then(function(resp) {
            $scope.accData = resp.data;
            console.log($scope.resp);
        }, function(err){

        });
    }
    $scope.getDealer();

    $scope.saveEditAccount = function() {

        <?php if($this->session->userdata('is_logged_in')) {?>
            swal({
                title: 'ยืนยัน?',
                text: "คุณต้องการแก้ไขบัญชีผู้ใช้!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#abd07d',
                cancelButtonColor: '#ff7879',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result) {
                    sendEditAccount()
                }
            })

        <?php }?>

       }

        function sendEditAccount() {
           $http({
                method: 'POST',
                url: '<?php echo base_url('account/edit/');?>',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                data: $scope.accData
            }).then(function(resp) {
                if(resp.error == true) {
                    swal({
                        type: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'อีเมลนี้ถูกใช้ไปแล้ว',
                        confirmButtonColor: '#ff7879'
                    })
                } else {
                    swal({
                        type: 'success',
                        title: 'สำเร็จ',
                        text: 'แก้ไขบัญชีผู้ใช้สำเร็จ',
                        confirmButtonColor: '#abd07d'
                    })
                }
            }, function(err){
                swal({
                    type: 'error',
                    title: 'เกิดข้อผิดพลาด',
                    text: 'ไม่สามารถแก้ไขบัญชีผู้ใช้ได้',
                    confirmButtonColor: '#ff7879'
                })
            });
       }

  });
</script>
