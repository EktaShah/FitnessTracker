fitnessTracker.controller('facebook', function($scope, $rootScope, $timeout, $dialogs, $http, UserData) {
	$scope.login = function() {
		FB.login(function(response) {
			if (response.authResponse) {
				jQuery(document).trigger("facebook-logged-in");
				location.reload();
			}
		});
	};

	$scope.logout = function() {
		FB.logout(function(response) {
			if (response.authResponse) {
				jQuery(document).trigger("facebook-logged-out");
				location.replace("../index.php");
			}
		});
	};

	// This is called with the results from from FB.getLoginStatus().
	$scope.statusChangeCallback = function(response) {
		console.log('statusChangeCallback');
		console.log(response);
		// The response object is returned with a status field that lets the
		// app know the current login status of the person.
		// Full docs on the response object can be found in the documentation
		// for FB.getLoginStatus().
		if (response.status === 'connected') {
			// Logged into your app and Facebook.
			$scope.testAPI();
			$('.SignOut').css("diplay", "inline");
			$('.SignIn').css("display", "none");

		} else if (response.status === 'not_authorized') {
			// The person is logged into Facebook, but not your app.
			document.getElementById('status').innerHTML = '<h3>Please log ' + 'into this app.';
			$('.SignOut').css("diplay", "none");
			$('.SignIn').css("display", "inline");

		} else {
			// The person is not logged into Facebook, so we're not sure if
			// they are logged into this app or not.
			document.getElementById('status').innerHTML = '<h3>Please Sign In';
			$('.SignIn').css("diplay", "inline");
			$('.SignOut').css("display", "none");

		}
	};

	// This function is called when someone finishes with the Login
	// Button.  See the onlogin handler attached to it in the sample
	// code below.
	$scope.checkLoginState = function() {
		alert("Finished Loggin in");
		FB.getLoginStatus(function(response) {
			$scope.statusChangeCallback(response);
			
		});
	};

	window.fbAsyncInit = function() {
		FB.init({
			appId : '1520587814864583',
			status : true,
			cookie : true, // enable cookies to allow the server to access
			// the session
			xfbml : true, // parse social plugins on this page
			version : 'v2.1' // use version 2.1
		});

		// Now that we've initialized the JavaScript SDK, we call
		// FB.getLoginStatus().  This function gets the state of the
		// person visiting this page and can return one of three states to
		// the callback you provide.  They can be:
		//
		// 1. Logged into your app ('connected')
		// 2. Logged into Facebook, but not your app ('not_authorized')
		// 3. Not logged into Facebook and can't tell if they are logged into
		//    your app or not.
		//
		// These three cases are handled in the callback function.

		FB.getLoginStatus(function(response) {
			$scope.statusChangeCallback(response);
		});

	};

	// Load the SDK asynchronously
	( function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id))
				return;
			js = d.createElement(s);
			js.id = id;
			js.src = "//connect.facebook.net/en_US/sdk.js";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

	// Here we run a very simple test of the Graph API after login is
	// successful.  See statusChangeCallback() for when this call is made.
	$scope.testAPI = function() {
		console.log('Welcome!  Fetching your information.... ');
		FB.api('/me', function(response) {
			console.log(JSON.stringify(response)); 
			UserData.facebook = {
				authorization : response,
				
			};
			$('#status').innerHTML = '<h3>Thanks for logging in, ' + response.name + '!';
			console.log("Scope in food:" + JSON.stringify(response.id));
			UserData.prepForBroadcast();
		});
		FB.api("/me/picture/taggable_friends", function(response) {
			if (response && !response.error) {
				$('#profile').prop("src", response['data']['url']);
			}
		});
		// I have to still get the list of friends.
		FB.api('/me/taggable_friends', function(response) {
                       console.log(response);
                       UserData.facebook.taggable = response;
});

	};
});
