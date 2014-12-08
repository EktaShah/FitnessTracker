$(window).load(function() {
	$(".index").addClass("active");
});
$(document).ready(function() {
	var table = $('#exerciseLog').dataTable({
		responsive : true,
		"ajax" : "FTExerciseLog.php?format=json&action=get",
		"columns" : [{
			"data" : "id"
		}, {
			"data" : "Exercise"
		}, {
			"data" : "ActivityType"
		}, {
			"data" : "Distance"
		}, {
			"data" : "AveragePace"
		}, {
			"data" : "Calories"
		}, {
			"data" : "Time"
		}]
	});

	$('#exerciseLog tbody').on('click', 'tr', function() {
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
			dlg = $dialogs.create('?action=create&format=plain', 'exerciseLogController', {}, {
				key : false,
				back : 'static'
			});
			dlg.result.then(function(exercise) {
				// Save to database
				$http.post('?action=save', exercise).success(function(data, status, headers, config) {
					var message = '<p>' + data['message'] + '</p>';
					$("#myAlert").show().find('div').html(message + JSON.stringify(data));
					//$scope.exericselogMessage = 'Good Job! working pretty hard';
					$('#exerciseLog').DataTable().ajax.reload();
				}).error(function(data, status, headers, config) {
					$("#myAlert").show().find('div').html(JSON.stringify(data));
				});
			}, function() {
				$scope.exerciselogMessage = 'You decided not to enter any workout, that makes me sad.';
			});

			break;
		case 'delete':
			// Get the selected row's id from datatable
			selectedExercise = $('#example').dataTable().fnGetData($('#example tr.selected'));
			
			if(!selectedExercise) {
				alert("Please select an exercise to delete");
			}
			var selectedId = selectedExercise['id'];
			
			dlg = $dialogs.create('?action=deleteGet&format=plain&id=' + selectedId, 'deleteExerciseController', {}, {
				key : false,
				back : 'static'
			});
			dlg.result.then(function(id) {
				// Save to database
				$http.get('?action=delete&id=' + id).success(function(data, status, headers, config) {
					var message = '<p>' + data['message'] + '</p>';
					$("#myAlert").show().find('div').html(message + JSON.stringify(data));
					// Add this row to datatable
					$('#exerciseLog').DataTable().ajax.reload();
				}).error(function(data, status, headers, config) {
					$("#myAlert").show().find('div').html(JSON.stringify(data));
				});
			}, function() {
				$scope.exerciselogMessage = 'Good!!! You decided not to delete any workout.';
			});

			break;
		};
	};

});

fitnessTracker.controller('deleteExerciseController', function($scope, $modalInstance, data) {
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

fitnessTracker.controller('exerciseLogController', function($scope, $modalInstance, data) {
	var currentdate = new Date();
	var hours = currentdate.getHours();
	var ampm = 'AM';
	if (hours > 12) {
		hours -= 12;
		ampm = 'PM';
	}
	$scope.exercise = {
		AveragePace : 0,
		Time : (currentdate.getMonth() + 1) + "/" + currentdate.getDate() + "/" + currentdate.getFullYear() + " " + hours + ":" + currentdate.getMinutes() + " " + ampm,
		UserId : 'shahe1'
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};
	// end cancel

	$scope.save = function() {
		$modalInstance.close($scope.exercise);
	};

	$scope.keyupEvent = function(evt, form) {
		if (angular.equals(evt.keyCode, 13) && form != null && form.$valid && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.save();
		else if (angular.equals(evt.keyCode, 27) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.cancel();
	};
});
