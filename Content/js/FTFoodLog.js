$(window).load(function() {
	$(".index").addClass("active");
});
$(document).ready(function() {
	$('#example').dataTable({
		"ajax" : "FTFoodLog.php?format=json&action=get",
		"columns" : [{
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
				alert(JSON.stringify(food));
				// Save to database
				$http.post('?action=save', food).
				  success(function(data, status, headers, config) {
				    //$("#myAlert").show().find('div').html(JSON.stringify(data));
				    $scope.foodlogMessage = 'Good Job! Now don\'t eat too much';
				    $('#example').ajax.reload();
				  }).
				  error(function(data, status, headers, config) {
				    $scope.foodlogMessage = 'data';
				  });
			}, function() {
				$scope.foodlogMessage = 'You decided not to enter any food, that makes me sad.';
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

fitnessTracker.controller('foodLogController', function($scope, $modalInstance, data) {
	var currentdate = new Date();
	var hours = currentdate.getHours() ;
	var ampm = 'AM';
	if(hours > 12) {
		hours -= 12;
		ampm = 'PM';
	}
	$scope.food = {
		Name : '',
		Calories: 0,
		Fat:0,
		Carbs:0,
		Protein:0,
		Time:  (currentdate.getMonth()+1)  + "/"
				+currentdate.getDate() + "/" 
                + currentdate.getFullYear() + " "  
                + hours + ":"  
                + currentdate.getMinutes() + " " 
                + ampm,
		UserId: 'shahe1'
	};

	$scope.cancel = function() {
		$modalInstance.dismiss('canceled');
	};
	// end cancel

	$scope.save = function() {
		$modalInstance.close($scope.food);
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