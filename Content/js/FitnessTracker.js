var fitnessTracker = angular.module('FitnessTracker', ['ui.bootstrap', 'dialogs']);
fitnessTracker.factory('UserData', function($rootScope) {
	var facebook = {};
	var message = '';

	return {
		prepForBroadcast : function(msg) {
			this.message = msg;
			$rootScope.$broadcast('handleLogin');
		}
	};
});
