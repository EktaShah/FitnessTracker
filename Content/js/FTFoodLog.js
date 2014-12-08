$(window).load(function() {
	$(".index").addClass("active");
});
$(document).ready(function() {
	var table = $('#example').dataTable({
		responsive : true,
		"ajax" : "FTFoodLog.php?format=json&action=get",
		"columns" : [{
			"data" : "id"
		}, {
			"data" : "Name"
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
		} else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});
});

fitnessTracker.controller('dialogServiceTest', function($scope, $rootScope, $timeout, $dialogs, $http) {

	$scope.launch = function(which) {
		var dlg = null;
		switch(which) {

		// Create Your Own Dialog
		case 'create':
			dlg = $dialogs.create('?action=create&format=plain', 'foodLogController', {}, {
				key : false,
				back : 'static'
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
		case 'delete':
			// Get the selected row's id from datatable
			selectedFood = $('#example').dataTable().fnGetData($('#example tr.selected'));
			
			if(!selectedFood) {
				alert("Please select a food to delete");
			}
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

fitnessTracker.controller('foodLogController', function($scope, $modalInstance, data) {

	var currentdate = new Date();
	var hours = currentdate.getHours();
	var ampm = 'AM';
	if (hours > 12) {
		hours -= 12;
		ampm = 'PM';
	}
	$scope.food = {
		Name : '',
		Fat : 0,
		Carbs : 0,
		Protein : 0,
		Time : (currentdate.getMonth() + 1) + "/" + currentdate.getDate() + "/" + currentdate.getFullYear() + " " + hours + ":" + currentdate.getMinutes() + " " + ampm,
		UserId : 'shahe1'
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};

	$scope.save = function() {
		$modalInstance.close($scope.food);
	};

	$scope.keyupEvent = function(evt, form) {
		if (angular.equals(evt.keyCode, 13) && form != null && form.$valid && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.save();
		else if (angular.equals(evt.keyCode, 27) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.cancel();
	};
});
