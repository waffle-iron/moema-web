app.controller('CurrenciesCtrl', function($scope, $http, $interval, UserSrvc, AsyncAjaxSrvc){
	function updateList() {
		$scope.configurations = AsyncAjaxSrvc.getListOfItens(baseUrl()+"admin/data/currencies-data.json");
	}

	updateList();
	$interval(updateList, 5000, 0, true);

	$scope.getLastUpdate = function(timestamp, isUnixTimestamp) {
		if(isUnixTimestamp)
			return moment.unix(timestamp).format("DD/MM/YYYY HH:mm:ss");
		else
			return moment(timestamp).format("DD/MM/YY HH:mm");
	}

	$scope.showDetails = function(currency) {
		$scope.objectModal = currency;
		$("#modalNarrower").modal('show');
	}
});