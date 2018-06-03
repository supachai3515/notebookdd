
<script type="text/javascript">
  app.controller("products_ctrl", function($scope, $http, cfpLoadingBar) {
    
    //Limit long text
    String.prototype.trunc = String.prototype.trunc ||
        function(n){
        return (this.length > n) ? this.substr(0, n-1) + '...' : this;
    };
    $scope.limitName = function(s) {
        console.log('------', s)
        if(s) {
            return s.trunc(55);
        }
    }
});
</script>
