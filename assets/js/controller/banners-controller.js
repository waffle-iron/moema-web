app.controller('BannersCtrl', function($scope, $http, UserSrvc, AsyncAjaxSrvc){
	$scope.banners = {
		carousel: {
			image1: null,
			image2: null,
			image3: null,
			image4: null,
			image5: null
		},
		fixed: {
			image1: null,
			image2: null,
			image3: null
		}
	};

	$scope.getBanners = function() {
		$http({
			method: 'GET',
			url: baseUrlApi()+'banner',
			responseType: 'text'
		}).then(
			function successCallback(response) {
				$.each(response.data, function(i,item){
					item.changed = false;
					item.clear = false;
					item.image_changed = false;
					item.source = baseUrlApi() + '' + item.source.replace('assets/', '');
					$scope.banners[item.display_location][item.index] = item;
				});
				setTimeout(function(){
					$scope.$apply();
				}, 1);
			},
			function errorCallback(response){
				console.log(response);
			}
		);
	}

	$scope.saveBanners = function() {
		var post_data = _.compact(_.values(angular.copy($scope.banners['carousel'])).concat(_.values(angular.copy($scope.banners['fixed']))));

		$.each(post_data, function(i,item){
			if(!item.clear) {
				post_data[i].source = item.source.substring(item.source.indexOf(',')+1, item.source.length);
				post_data[i].source = item.source.replace(baseUrlApi(), 'assets/');
			}
		});

		$http({
			method: 'POST',
			url: baseUrlApi()+'banner',
			data: JSON.stringify(post_data),
			responseType: 'text'
		}).then(
			function successCallback(response) {
				console.log(response);
			},
			function errorCallback(response){
				console.log(response);
			}
		);
	}

	$scope.clearImage = function(displayLocation, imageIndex) {
		$scope.banners[displayLocation][imageIndex] = {
			changed: true,
			image_changed: true,
			clear: true,
			display_location: displayLocation,
			index: imageIndex
		};

		$('.btn-upload input:file').val("");
	}

	$(".btn-upload input:file").change(function(){
		var file = this.files[0];
		var reader = new FileReader();

		$scope.displayLocation 	= $(this).data().displayLocation;
		$scope.imageIndex 		= $(this).data().imageIndex;

		reader.onload = function (e) {
			var image_type = e.target.result.substring(0, e.target.result.indexOf(';'));
			image_type = image_type.substring(image_type.indexOf('/')+1, image_type.length);
			if (image_type == 'jpeg')
				image_type = 'jpg';

			$scope.banners[$scope.displayLocation][$scope.imageIndex] = {
				changed: true,
				image_changed: true,
				source: e.target.result,
				type: image_type,
				index: $scope.imageIndex,
				display_location: $scope.displayLocation,
				link: '',
				clear: false
			};

			setTimeout(function(){
				$scope.$apply();
			}, 1);
		}

		reader.readAsDataURL(file);
	});

	$scope.getBanners();
});