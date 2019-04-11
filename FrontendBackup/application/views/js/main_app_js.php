<script type="text/javascript">
	var inject = ['angular-loading-bar', 'ngAnimate'];
	var app = angular.module('mainApp', inject);

	app.config(function(cfpLoadingBarProvider) {
		cfpLoadingBarProvider.latencyThreshold = 100;
		cfpLoadingBarProvider.includeSpinner = true;
	})
	app.controller("mainCtrl", function($scope) {
	    //Limit long text
		String.prototype.trunc = String.prototype.trunc ||
			function(n){
			return (this.length > n) ? this.substr(0, n-1) + '...' : this;
		};
		$scope.limitProductName = function(s) {
			if(s) {
				return s.trunc(55);
			}
		}
	});

</script>
