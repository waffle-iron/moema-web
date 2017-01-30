var app = angular.module('web_app', ['filters', 'ui.utils.masks', 'angucomplete-alt', 'datePicker'], function($httpProvider) {
	// Use x-www-form-urlencoded Content-Type
	$httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

	var param = function(obj) {
		var query = '', name, value, fullSubName, subName, subValue, innerObj, i;

		for(name in obj) {
			value = obj[name];

			if(value instanceof Array) {
				for(i=0; i < value.length; ++i) {
					subValue = value[i];
					fullSubName = name + '[' + i + ']';
					innerObj = {};
					innerObj[fullSubName] = subValue;
					query += param(innerObj) + '&';
				}
			}
			else if(value instanceof Object) {
				for(subName in value) {
					subValue = value[subName];
					fullSubName = name + '[' + subName + ']';
					innerObj = {};
					innerObj[fullSubName] = subValue;
					query += param(innerObj) + '&';
				}
			}
			else if(value !== undefined && value !== null)
				query += encodeURIComponent(name) + '=' + encodeURIComponent(value) + '&';
		}

		return query.length ? query.substr(0, query.length - 1) : query;
	};

	$httpProvider.defaults.transformRequest = [function(data) {
		return angular.isObject(data) && String(data) !== '[object File]' ? param(data) : data;
	}];
});

app.directive('ngEnter', function () {
	return function (scope, element, attrs) {
		element.bind("keydown keypress", function (event) {
			if(event.which === 13) {
				scope.$apply(function (){
					scope.$eval(attrs.ngEnter);
				});
				
				event.preventDefault();
			}
		});
	};
});

angular.module('filters', [])
	.filter('numberFormat', function () {
		return function (number, decimals, dec_point, thousands_sep) {
			number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
		    var n = !isFinite(+number) ? 0 : +number,
		    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
		    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
		    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
		    s = '',
		    toFixedFix = function(n, prec) {
		      var k = Math.pow(10, prec);
		      return '' + (Math.round(n * k) / k)
		        .toFixed(prec);
		    };
		  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
		   s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
		   if (s[0].length > 3) {
		    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
		   }
		  if ((s[1] || '')
		    .length < prec) {
		    s[1] = s[1] || '';
		    s[1] += new Array(prec - s[1].length + 1)
		      .join('0');
		  }
		  return s.join(dec);
	    };
	}).filter('dateFormat', function () {
		return function (inputFormat,tipo) {
		  	function pad(s) { return (s < 10) ? '0' + s : s; }
		  if (isEmpty(inputFormat)) return "" ;
		  if(inputFormat.length < 6){
		  	return "" ;
		  }else if(inputFormat == '0000-00-00'){
		  	return "" ;
		  }else if(tipo == 'date-m/y'){;
		  	if(inputFormat.length == 6)
		  		return inputFormat.substring(0,2)+'/'+inputFormat.substring(2,6);
		  	else{
		  		var arr = inputFormat.split('-');
		  		return arr[1]+'/'+arr[0];
		  	}
		  }

		  inputFormat = inputFormat.replace(/-/g,"/");
		  var d = new Date(inputFormat);
		  if(tipo == null || tipo == "dateTime"){
		  	var hora = d.getHours() < 10 ? '0'+d.getHours() : d.getHours() ;
		  	var minutos = d.getMinutes() < 10 ? '0'+d.getMinutes() : d.getMinutes() ;
		  	var segundos = d.getSeconds() < 10 ? '0'+d.getSeconds() : d.getSeconds() ;

		  	return pad(d.getDate())+'/'+pad(d.getMonth()+1)+'/'+d.getFullYear()+' '+hora+':'+minutos+':'+segundos;
		  }else if(tipo=="time"){
		  	var hora = d.getHours() < 10 ? '0'+d.getHours() : d.getHours() ;
		  	var minutos = d.getMinutes() < 10 ? '0'+d.getMinutes() : d.getMinutes() ;
		  	var segundos = d.getSeconds() < 10 ? '0'+d.getSeconds() : d.getSeconds() ;
		  	return hora+':'+minutos+':'+segundos;
		  }else if(tipo=='time-HH:mm'){
		  	var hora = d.getHours() < 10 ? '0'+d.getHours() : d.getHours() ;
		  	var minutos = d.getMinutes() < 10 ? '0'+d.getMinutes() : d.getMinutes() ;
		  	return hora+':'+minutos;
		  }
	      else
	      	return pad(d.getDate())+'/'+pad(d.getMonth()+1)+'/'+d.getFullYear();
	    };
	})

app.factory('httpRequestInterceptor',function () {
	var userLogged = null;
	if(isEmpty(sessionStorage.user)) {
		$.ajax({
			url: baseUrl()+'/php.util/session.php',
			async: false,
			success: function(userData){
				userLogged = userData;
			}
		});
		sessionStorage.user = angular.toJson(userLogged);
	}
	else
		userLogged = JSON.parse(sessionStorage.user);

	return {
		request: function (config) {
			//config.headers['Authorization'] = 'Basic d2VudHdvcnRobWFuOkNoYW5nZV9tZQ==';
			
			return config;
		}
	};
});

app.config(function ($httpProvider) {
	$httpProvider.interceptors.push('httpRequestInterceptor');
});

app.service('UserSrvc', function($http, $window){
	this.getUserLogged = function() {
		var userLogged = {};
		if(isEmpty(sessionStorage.user)) {
			$.ajax({
				url: baseUrl()+'/php.util/session.php',
				async: false,
				success: function(userData){
					userLogged = userData;
				}
			});
			sessionStorage.user = angular.toJson(userLogged);
		}
		else
			userLogged = JSON.parse(sessionStorage.user);

		return userLogged;
	},
	this.getFirstAndLastName = function(nmeUsuario) {
		return nmeUsuario.split(" ")[0] + " " + nmeUsuario.split(" ")[nmeUsuario.split(" ").length-1];
	}
	this.clearUserLogged = function() {
		sessionStorage.removeItem("user");
	}
});

app.service('AsyncAjaxSrvc', function(UserSrvc) {
	var userLogged = UserSrvc.getUserLogged();

	this.getListOfItens = function(route) {
		var list = [];
		$.ajax({
			url: route,
			async: false,
			beforeSend: function (request){
				// Do anything here...
			},
			success: function(responseData){
				list = responseData;
			}
		});
		return list;
	};
});

app.controller('CurrenciesTaxesCtrl', function($scope, $http, $interval, UserSrvc, AsyncAjaxSrvc){
	$scope.userLogged 	= UserSrvc.getUserLogged();

	function updateList() {
		$scope.configurations = AsyncAjaxSrvc.getListOfItens(baseUrl()+"currencies-data.json");
	}

	updateList();
	$interval(updateList, 120000, 0, true);

	$scope.getLastUpdate = function(timestamp, isUnixTimestamp) {
		if(isUnixTimestamp)
			return moment.unix(timestamp).format("DD/MM/YYYY HH:mm:ss");
		else
			return moment(timestamp).format("DD/MM/YY HH:mm");
	}

	$scope.calculateBrokingValue = function(item, type){
		item.broking[type].value = (item.cost[type] * (item.broking[type].percent/100)) + item.cost[type];
		$scope.calculateComercialValues();
		$scope.calculateFinalValues();
	}

	$scope.calculateComercialValues = function() {
		$.each($scope.configurations.currencies, function(i, item){
			item.comercial.bid = (item.broking.bid.value * ($scope.configurations.iofTax/100)) + item.broking.bid.value;
			item.comercial.ask = (item.broking.ask.value * ($scope.configurations.iofTax/100)) + item.broking.ask.value;
		});
	}

	$scope.calculateFinalValues = function() {
		$.each($scope.configurations.currencies, function(i, item){
			item.finalValue.bid = (item.comercial.bid * (item.markupPercent.bid/100)) + item.comercial.bid;
			item.finalValue.ask = (item.comercial.ask * (item.markupPercent.ask/100)) + item.comercial.ask;
		});	
	}

	$scope.calculateMarkupValues = function() {
		$.each($scope.configurations.currencies, function(i, item){
			item.markupPercent.bid = ((item.finalValue.bid / item.comercial.bid)-1)*100;
			item.markupPercent.ask = ((item.finalValue.ask / item.comercial.ask)-1)*100;
		});
	}

	$scope.save = function() {
		$http.post("api.php?action=update-file", { configurations: $scope.configurations })
			.success(function(data, status, headers, config) {
				swal("Maravilha!", 
					 "As informações cadastradas foram salvas e o arquivo de consulta já está disponível!", 
					 "success");
			})
			.error(function(data, status, headers, config) {
				swal("Ops!", 
					 "Ocorreu algum erro! Contate o administrador.", 
					 "error");
			});
	}

	$scope.updateData = function() {
		$http.get("api.php?action=update-data")
			.success(function(data, status, headers, config) {
				setTimeout(function() {
					swal("Atualizado!", 
						 "Informações atualizadas com sucesso", 
						 "success");
				},500);
			})
			.error(function(data, status, headers, config) {
				swal("Ops!", 
					 "Ocorreu algum erro! Contate o administrador.", 
					 "error");
			});
	}

	$scope.showDetails = function(currency) {
		$scope.objectModal = currency;
		$("#modalNarrower").modal('show');
	}

	$.each($scope.configurations.currencies, function(i, item){
		$scope.calculateBrokingValue(item, 'ask');
		$scope.calculateBrokingValue(item, 'bid');
	});
});

app.controller('CurrencyCtrl', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	function formatState (state) {
		if (!state.id) { return state.text; }
			var $state = $(
				'<span><span class="flag-icon flag-icon-'+ state.element.value.toLowerCase() +'"></span> <span>'+ state.text +'</span>'
			);
		return $state;
	};

	$('select#state').select2({
		templateResult: formatState,
		templateSelection: formatState
	});

	$scope.countries = AsyncAjaxSrvc.getListOfItens(baseUrl()+"countries.json");
	$scope.currency = {};

	$scope.save = function() {
		$scope.currency.icon = $('select#state').val();
		$scope.currency.externalRefresh = (isEmpty($scope.currency.externalRefresh)) ? false : $scope.currency.externalRefresh;

		$http.post("api.php?action=new-currency", { currency: $scope.currency })
			.success(function(data, status, headers, config) {
				swal("Maravilha!", 
					 "Moeda cadastrada com successo!", 
					 "success");
				$scope.currency = {};
				$('select#state').val(' ');
			})
			.error(function(message, status, headers, config) {
				swal((status == 406) ? "Atenção!" : "Ocorreu um erro!",
					 message, 
					 (status == 406) ? "warning" : "error");
			});
	}
});