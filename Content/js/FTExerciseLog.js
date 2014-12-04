$(window).load(function() {
	$(".index").addClass("active");
});
$(document).ready(function() {
	$('#example').dataTable({
		"ajax" : "FTExerciseLog.php?format=json&action=get",
		"columns" : [{
			"data" : "Activity Type"
		}, {
			"data" : "Distance"
		}, {
			"data" : "Average pace"
		}, {
			"data" : "Calories Burned"
		}, {
			"data" : "Date"
		}, {
			"data" : "Time"
		}]
	});
});

fitnessTracker.controller('dialogServiceTest', function($scope, $rootScope, $timeout, $dialogs, $http) {

	$scope.launch = function(which) {
		var dlg = null;
		switch(which) {
/*

		// Error Dialog
		case 'error':
			dlg = $dialogs.error('This is my error message');
			break;

		// Wait / Progress Dialog
		case 'wait':
			dlg = $dialogs.wait(msgs[i++], progress);
			fakeProgress();
			break;

		// Notify Dialog
		case 'notify':
			dlg = $dialogs.notify('Something Happened!', 'Something happened that I need to tell you.');
			break;

		// Confirm Dialog
		case 'confirm':
			dlg = $dialogs.confirm('Please Confirm', 'Is this awesome or what?');
			dlg.result.then(function(btn) {
				$scope.confirmed = 'You thought this quite awesome!';
			}, function(btn) {
				$scope.confirmed = 'Shame on you for not thinking this is awesome!';
			});
			break;
*/

		// Create Your Own Dialog
		case 'create':
			dlg = $dialogs.create('?action=create&format=plain', 'exerciseLogController', {}, {
				key : false,
				back : 'static'
			});
			dlg.result.then(function(exercise) {
				
				// Save to database
				$http.post('?action=save', exercise).
				  success(function(data, status, headers, config) {
				    $("#myAlert").show().find('div').html(JSON.stringify(data));
				  }).
				  error(function(data, status, headers, config) {
				    $scope.exerciselogMessage = 'data';
				  });
			}, function() {
				$scope.exerciselogMessage = 'You decided not to enter any workout, that makes me sad.';
			});

			break;
		}; // end switch
	};
	// end launch

	// for faking the progress bar in the wait dialog
/*
	var progress = 25;
	var msgs = ['Hey! I\'m waiting here...', 'About half way done...', 'Almost there?', 'Woo Hoo! I made it!'];
	var i = 0;

	var fakeProgress = function() {
		$timeout(function() {
			if (progress < 100) {
				progress += 25;
				$rootScope.$broadcast('dialogs.wait.progress', {
					msg : msgs[i++],
					'progress' : progress
				});
				fakeProgress();
			} else {
				$rootScope.$broadcast('dialogs.wait.complete');
			}
		}, 1000);
	};*/

	// end fakeProgress

});// end dialogsServiceTest

fitnessTracker.controller('exerciseLogController', function($scope, $modalInstance, data) {
	$scope.user = {
		name : ''
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};
	// end cancel

	$scope.save = function() {
		$modalInstance.close($scope.exercise);
		// you can also save to databse here
	};
	// end save

	$scope.hitEnter = function(evt) {
		if (angular.equals(evt.keyCode, 13) && !(angular.equals($scope.name, null) || angular.equals($scope.name, '')))
			$scope.save();
	};
	// end hitEnter
});// end whatsYourNameCtrl

/*
fitnessTracker.run(['$templateCache',
function($templateCache) {
	$templateCache.put('?action=create', '<div class="modal"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h4 class="modal-title"><span class="glyphicon glyphicon-star"></span> User\'s Name</h4></div><div class="modal-body"><ng-form name="nameDialog" novalidate role="form"><div class="form-group input-group-lg" ng-class="{true: \'has-error\'}[nameDialog.username.$dirty && nameDialog.username.$invalid]"><label class="control-label" for="username">Name:</label><input type="text" class="form-control" name="username" id="username" ng-model="user.name" ng-keyup="hitEnter($event)" required><span class="help-block">Enter your full name, first &amp; last.</span></div></ng-form></div><div class="modal-footer"><button type="button" class="btn btn-default" ng-click="cancel()">Cancel</button><button type="button" class="btn btn-primary" ng-click="save()" ng-disabled="(nameDialog.$dirty && nameDialog.$invalid) || nameDialog.$pristine">Save</button></div></div></div></div>');
}]);*/

// end run / module