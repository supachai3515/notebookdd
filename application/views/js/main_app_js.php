<script type="text/javascript">
	var inject = ['angular-loading-bar', 'ngAnimate'];
	var app = angular.module('mainApp', inject);

	app.config(function(cfpLoadingBarProvider) {
		cfpLoadingBarProvider.latencyThreshold = 100;
		cfpLoadingBarProvider.includeSpinner = true;
	})
	app.controller("mainCtrl", function($scope) {
	    //code
	});

</script>
