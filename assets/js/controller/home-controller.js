app.controller('HomeCtrl', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.pesquisa = {
		way_direction: 1,
		type: 'flights',
		data_ida: null,
		hora_ida: null,
		data_volta: null,
		hora_volta: null,
		qtd_quartos: 1,
		qtd_adultos: 1,
		qtd_criancas: 0,
		qtd_bebes: 0
	};

	$scope.getSearchTitle = function() {
		var title = '';
		switch($scope.pesquisa.type) {
			case 'flights':
				title = 'VOOS';
				break;
			case 'hotels':
				title = 'HOTÉIS';
				break;
			case 'packages':
				title = 'PACOTES';
				break;
		}
		return title;
	}

	$scope.getOffers = function() {
		$http({
			method: 'GET',
			url: baseUrlApi()+'offer'
		}).then(
			function successCallback(response) {
				$scope.offers = response.data;
				setTimeout(function(){
					smallBannersHoteis();
				}, 1);
			},
			function errorCallback(response){
				console.log(response);
			}
		);
	}

	$scope.getCurrencies = function() {
		$http({
			method: 'GET',
			url: baseUrl()+"admin/data/currencies-data.json"
		}).then(
			function successCallback(response) {
				$scope.currencies = response.data;
				setTimeout(function(){
					$scope.$apply();
					boxSliderMoneyNews();
				}, 1);
			},
			function errorCallback(response){
				console.log(response);
			}
		);
	}

	$scope.getLastUpdate = function(timestamp, isUnixTimestamp) {
		if(isUnixTimestamp)
			return moment.unix(timestamp).format("DD/MM/YYYY HH:mm:ss");
		else
			return moment(timestamp).format("DD/MM/YY HH:mm");
	}

	$scope.getNews = function() {
		$http({
			method: 'GET',
			url: baseUrl()+"admin/scripts/news.php"
		}).then(
			function successCallback(response) {
				$scope.news = response.data.item;
				setTimeout(function(){
					$scope.$apply();
					sliderNews();
				}, 1);
			},
			function errorCallback(response){
				console.log(response);
			}
		);
	}

	$scope.searchRedirect = function() {
		var data_ida = moment($scope.pesquisa.data_ida).format('YYYY-MM-DD');
		var data_volta = moment($scope.pesquisa.data_volta).format('YYYY-MM-DD');
		var qtd_adultos = $scope.pesquisa.qtd_adultos;
		var qtd_criancas = $scope.pesquisa.qtd_criancas + $scope.pesquisa.qtd_bebes;

		var url = "";

		switch($scope.pesquisa.type) {
			case 'flights': {
				var origem 	= $scope.pesquisa.origem.description.id;
				var destino = $scope.pesquisa.destino.description.id;

				url = "https://www.e-agencias.com.br/ag81117/flights/search/RoundTrip/";
				url += origem +"/"+ destino +"/"+ data_ida +"/"+ data_volta +"/"+ qtd_adultos +"/"+ qtd_criancas;
				url += "/0/NA/NA/NA/NA";
				break;
			}
			case 'hotels': {
				var destino = $scope.pesquisa.destino.originalObject.code;
				var qtd_quartos = $scope.pesquisa.qtd_quartos;

				url = "https://www.e-agencias.com.br/ag81117/hotels#/search?";
				url += "destination="+ destino +"&";
				url += "checkin="+ data_ida +"&";
				url += "checkout="+ data_volta +"&";
				url += "distribution="+ qtd_quartos;
				break;
			}
			case 'packages': {
				url = "https://www.e-agencias.com.br/ag81117/cp/search/";
				url += origem+ "/"+ destino +"/"+ data_ida +"/"+ data_volta +"/"+ qtd_adultos +"/"+ qtd_criancas +"/0/NA/";
				url += data_ida + "/"+ data_volta +"/"+ qtd_adultos +"/true/search";
				break;
			}
		}

		window.location.href = url;
	}

	$scope.getOffers();
	$scope.getCurrencies();
	$scope.getNews();
});