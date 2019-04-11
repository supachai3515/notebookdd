
<script type="text/javascript">
  app.controller("download_ctrl", function($scope, $http, cfpLoadingBar) {
    $scope.doc_list = '';
    $scope.getDoclist = function() {        
        $http({
            method: 'GET',
            url: '<?php echo base_url('download/get_all') ?>',
             headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function(resp) {
            $scope.doc_list = resp.data;
        }, function(err) {
        });
    }
    $scope.getDoclist();

  });
</script>
