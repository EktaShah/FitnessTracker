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
			var table = $('#exerciseLog').dataTable({
				responsive : true,
				"ajax" : "FTExerciseLog.php?format=json&action=get&UserId=" + UserData.facebook.authorization.id,
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
					$('.selectedButton').prop("disabled", true);
				} else {
					table.$('tr.selected').removeClass('selected');
					$(this).addClass('selected');
					$('.selectedButton').prop("disabled", false);
				}
			});

		});
	});
	$scope.launch = function(which) {
		var dlg = null;
		switch(which) {

		// Create Your Own Dialog
		case 'create':
			dlg = $dialogs.create('?action=create&format=plain', 'exerciseLogController', null, {
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
		case 'update':
			// Get the selected row's id from datatable
			selectedExercise = $('#exerciseLog').dataTable().fnGetData($('#exerciseLog tr.selected'));
			var selectedId = selectedExercise['id'];

			$http.get('?action=edit&format=json&id=' + selectedId).success(function(data, status, headers, config) {
				dlg = $dialogs.create('?action=create&format=plain', 'exerciseLogController', data, {
					key : false,
					back : 'static',

				});
				dlg.result.then(function(exercise) {
					// Save to database
					$http.post('?action=save', exercise).success(function(data, status, headers, config) {
						var message = '<p>' + data['message'] + '</p>';
						$("#myAlert").show().find('div').html(message + JSON.stringify(data));
						// Add this row to datatable
						$('#exerciseLog').DataTable().ajax.reload();
					}).error(function(data, status, headers, config) {
						$("#myAlert").show().find('div').html(JSON.stringify(data));
					});
				}, function() {
					$scope.exerciselogMessage = 'You decided not to enter any exercise, that makes me sad.';
				});
			}).error(function(data, status, headers, config) {
				$("#myAlert").show().find('div').html(JSON.stringify(data));
			});

			break;
		case 'quickAdd':
			// Get the selected row's id from datatable
			selectedExercise = $('#exerciseLog').dataTable().fnGetData($('#exerciseLog tr.selected'));
			var selectedId = selectedExercise['id'];

			$http.get('?action=edit&format=json&id=' + selectedId).success(function(data, status, headers, config) {
				// Remove id so that a new one gets created.
				delete data["id"];
				dlg = $dialogs.create('?action=create&format=plain', 'exerciseLogController', data, {
					key : false,
					back : 'static',

				});
				dlg.result.then(function(exercise) {
					// Save to database
					$http.post('?action=save', exercise).success(function(data, status, headers, config) {
						var message = '<p>' + data['message'] + '</p>';
						$("#myAlert").show().find('div').html(message + JSON.stringify(data));
						// Add this row to datatable
						$('#exerciseLog').DataTable().ajax.reload();
					}).error(function(data, status, headers, config) {
						$("#myAlert").show().find('div').html(JSON.stringify(data));
					});
				}, function() {
					$scope.exerciselogMessage = 'You decided not to add any exercise, that makes me sad.';
				});
			}).error(function(data, status, headers, config) {
				$("#myAlert").show().find('div').html(JSON.stringify(data));
			});

			break;

		case 'delete':
			// Get the selected row's id from datatable
			var selectedExercise = $('#exerciseLog').dataTable().fnGetData($('#exerciseLog tr.selected'));
			console.log(JSON.stringify(selectedExercise));
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

fitnessTracker.controller('exerciseLogController', function($scope, $modalInstance, data, UserData) {
	var currentdate = new Date();
	var hours = currentdate.getHours();
	var ampm = 'AM';
	if (hours > 12) {
		hours -= 12;
		ampm = 'PM';
	}
	$scope.exercise = data ? data : {
		Exercise : '',
		AveragePace : 0,
		Time : (currentdate.getMonth() + 1) + "/" + currentdate.getDate() + "/" + currentdate.getFullYear() + " " + hours + ":" + currentdate.getMinutes() + " " + ampm,
		UserId : UserData.facebook.authorization.id,
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};
	// end cancel

	$scope.save = function() {
		console.log(JSON.stringify($scope.exercise));
		$modalInstance.close($scope.exercise);
	};

	$scope.keyupEvent = function(evt, form) {
		if (angular.equals(evt.keyCode, 13) && form != null && form.$valid && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.save();
		else if (angular.equals(evt.keyCode, 27) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.cancel();
	};
});
