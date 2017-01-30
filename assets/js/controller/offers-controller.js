app.controller('OffersCtrl', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.offers = [];

	function validateFields(form_group) {
		var fields_empty = false;
		
		$.each($('#modalNewOfferGroup '+ form_group +' [required="true"]'), function(i, field){
			$(field).closest('.form-group').removeClass('has-error');
			var model_scope = $(field).attr('ng-model').split('.')[$(field).attr('ng-model').split('.').length-2];
			var model_field = $(field).attr('ng-model').split('.')[$(field).attr('ng-model').split('.').length-1];
			if(isEmpty($scope[model_scope][model_field])) {
				$(field).closest('.form-group').addClass('has-error');
				fields_empty = true;
			}
		});

		return fields_empty;
	}

	$scope.clearOffer = function() {
		$scope.offer = {
			name: null,
			title: null,
			order: null,
			show: false,
			excluir: false,
			items: []
		};
	}

	$scope.clearAdItem = function() {
		$scope.adItem = {
			title: null,
			link: null,
			type: null,
			order: null,
			show: false,
			start_price: 0,
			background_image: null,
			is_promotion: false,
			promotion_percent: 0,
			end_date: null,
			excluir: false
		};
	}

	$scope.newOfferModal = function(action, clearObject) {
		if(action == 'show')
			$($('.dropdown')[0]).trigger('click');
		if(clearObject)
			$scope.clearOffer();
		$scope.clearAdItem();
		$('#modalNewOfferGroup').modal(action);
		setTimeout(function(){
			$('#modalNewOfferGroup [data-toggle="tooltip"]').tooltip();
		},1);
	}

	$scope.saveAdItem = function() {
		if(validateFields('.items'))
			return false;
		var indexOfItem = _.findIndex($scope.offer.items, $scope.adItem);
		if(indexOfItem == -1)
			$scope.offer.items.push($scope.adItem);
		else {
			$scope.offer.items[indexOfItem] = $scope.adItem;
		}
		$scope.clearAdItem();
		setTimeout(function(){
			$('#modalNewOfferGroup [data-toggle="tooltip"]').tooltip();
		},1);
	}

	$scope.editAdItem = function(adItem) {
		$scope.adItem = adItem;
	}

	$scope.saveOffer = function() {
		if(validateFields('.offer'))
			return false;
	
		$http({
			method: (isEmpty($scope.offer.id)) ? 'POST' : 'PUT',
			url: baseUrlApi()+'offer',
			data: JSON.stringify(angular.copy($scope.offer))
		}).then(
			function successCallback(response) {
				$scope.newOfferModal('hide', true);
				$scope.getOffers();
			},
			function errorCallback(response){
				alert(response.data);
			}
		);
	}

	$scope.editOffer = function(offer) {
		$scope.offer = offer;
		$scope.newOfferModal('show', false);
	}

	$scope.deleteOffer = function(offer) {
		console.log('deleting offer...')
	}

	$scope.getOffers = function() {
		$scope.offers = [];
		$http({
			method: 'GET',
			url: baseUrlApi()+'offer'
		}).then(
			function successCallback(response) {
				$.each(response.data, function(x, offer){
					$.each(offer.items, function(y, adItem){
						response.data[x].items[y].excluir = false;
					});
				});

				$scope.offers = response.data;
			},
			function errorCallback(response){
				$scope.offers = [];
			}
		);
	}

	$scope.getOffers();
});