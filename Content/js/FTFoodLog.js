$(".nav a").on("click", function() {
	$(".nav").find(".active").removeClass("active");
	$(this).parent().addClass("active");
});
$('[data-toggle="popover"]').popover({
	trigger : 'hover',
	'placement' : 'top'
});

fitnessTracker.controller('dialogServiceTest', function($scope, $rootScope, $timeout, $dialogs, $http, UserData) {
	$scope.$on('handleLogin', function() {
		$(document).ready(function() {
			var table = $('#example').dataTable({
				responsive : true,
				"ajax" : "FTFoodLog.php?format=json&action=get&UserId=" + UserData.facebook.authorization.id,
				"columns" : [{
					"data" : "id"
				}, {
					"data" : "Name"
				}, {
					"data" : "Servings"
				}, {
					"data" : "Calories"
				}, {
					"data" : "Fat"
				}, {
					"data" : "Carbs"
				}, {
					"data" : "Protein"
				}, {
					"data" : "Time"
				}]
			});
			$('#example tbody').on('click', 'tr', function() {
				if ($(this).hasClass('selected')) {
					$(this).removeClass('selected');
					$('.selectedButton').prop("disabled", true);
				} else {
					table.$('trselected').removeClass('selected');
					$(this).addClass('selected');
					$('.selectedButton').prop("disabled", false);
				}
			});
		});
	});
	$scope.launch = function(which) {
		var dlg = null;
		switch(which) {
		case 'create':
			dlg = $dialogs.create('?action=create&format=plain', 'foodLogController', null, {
				key : false,
				back : 'static',

			});
			dlg.result.then(function(food) {
				// Save to database
				$http.post('?action=save', food).success(function(data, status, headers, config) {
					var message = '<p>' + data['message'] + '</p>';
					$("#myAlert").show().find('div').html(message + JSON.stringify(data));
					// Add this row to datatable
					$('#example').DataTable().ajax.reload();
				}).error(function(data, status, headers, config) {
					$("#myAlert").show().find('div').html(JSON.stringify(data));
				});
			}, function() {
				$scope.foodlogMessage = 'You decided not to enter any food, that makes me sad.';
			});
			break;
		case 'update':
			// Get the selected row's id from datatable
			selectedFood = $('#example').dataTable().fnGetData($('#example tr.selected'));
			var selectedId = selectedFood['id'];

			$http.get('?action=edit&format=json&id=' + selectedId).success(function(data, status, headers, config) {
				dlg = $dialogs.create('?action=create&format=plain', 'foodLogController', data, {
					key : false,
					back : 'static',

				});
				dlg.result.then(function(food) {
					// Save to database
					$http.post('?action=save', food).success(function(data, status, headers, config) {
						var message = '<p>' + data['message'] + '</p>';
						$("#myAlert").show().find('div').html(message + JSON.stringify(data));
						// Add this row to datatable
						$('#example').DataTable().ajax.reload();
					}).error(function(data, status, headers, config) {
						$("#myAlert").show().find('div').html(JSON.stringify(data));
					});
				}, function() {
					$scope.foodlogMessage = 'You decided not to enter any food, that makes me sad.';
				});
			}).error(function(data, status, headers, config) {
				$("#myAlert").show().find('div').html(JSON.stringify(data));
			});

			break;
		case 'quickAdd':
			// Get the selected row's id from datatable
			selectedFood = $('#example').dataTable().fnGetData($('#example tr.selected'));
			var selectedId = selectedFood['id'];

			$http.get('?action=edit&format=json&id=' + selectedId).success(function(data, status, headers, config) {
				// Remove id so that a new one gets created.
				delete data["id"];
				dlg = $dialogs.create('?action=create&format=plain', 'foodLogController', data, {
					key : false,
					back : 'static',

				});
				dlg.result.then(function(food) {
					// Save to database
					$http.post('?action=save', food).success(function(data, status, headers, config) {
						var message = '<p>' + data['message'] + '</p>';
						$("#myAlert").show().find('div').html(message + JSON.stringify(data));
						// Add this row to datatable
						$('#example').DataTable().ajax.reload();
					}).error(function(data, status, headers, config) {
						$("#myAlert").show().find('div').html(JSON.stringify(data));
					});
				}, function() {
					$scope.foodlogMessage = 'You decided not to enter any food, that makes me sad.';
				});
			}).error(function(data, status, headers, config) {
				$("#myAlert").show().find('div').html(JSON.stringify(data));
			});

			break;
		case 'delete':
			// Get the selected row's id from datatable
			selectedFood = $('#example').dataTable().fnGetData($('#example tr.selected'));
			var selectedId = selectedFood['id'];

			dlg = $dialogs.create('?action=deleteGet&format=plain&id=' + selectedId, 'deleteFoodController', {}, {
				key : false,
				back : 'static'
			});
			dlg.result.then(function(id) {
				// Save to database
				$http.get('?action=delete&id=' + id).success(function(data, status, headers, config) {
					var message = '<p>' + data['message'] + '</p>';
					$("#myAlert").show().find('div').html(message + JSON.stringify(data));
					// Add this row to datatable
					$('#example').DataTable().ajax.reload();
				}).error(function(data, status, headers, config) {
					$("#myAlert").show().find('div').html(JSON.stringify(data));
				});
			}, function() {
				$scope.foodlogMessage = 'You decided not to delete any food, that makes me sad.';
			});

			break;
		};
	};

});

fitnessTracker.controller('deleteFoodController', function($scope, $modalInstance, data) {

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};

	$scope.save = function() {
		$modalInstance.close($('#deleteID').val());
	};

	$scope.keyupEvent = function(evt, form) {
		if (angular.equals(evt.keyCode, 13) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.save();
		else if (angular.equals(evt.keyCode, 27) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.cancel();
	};
});

fitnessTracker.controller('foodLogController', function($scope, $modalInstance, data, UserData) {
	var currentdate = new Date();
	var hours = currentdate.getHours();
	var ampm = 'AM';
	if (hours > 12) {
		hours -= 12;
		ampm = 'PM';
	}
	console.log("Scope in food:" + JSON.stringify(UserData.facebook));
	$scope.food = data ? data : {
		Name : '',
		Servings : 1,
		Fat : 0,
		Carbs : 0,
		Protein : 0,
		Time : (currentdate.getMonth() + 1) + "/" + currentdate.getDate() + "/" + currentdate.getFullYear() + " " + hours + ":" + currentdate.getMinutes() + " " + ampm,
		UserId : UserData.facebook.authorization.id,
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};

	$scope.save = function() {
		console.log(JSON.stringify($scope.food));
		$modalInstance.close($scope.food);
	};

	$scope.keyupEvent = function(evt, form) {
		if (angular.equals(evt.keyCode, 13) && form != null && form.$valid && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.save();
		else if (angular.equals(evt.keyCode, 27) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.cancel();
	};
});
