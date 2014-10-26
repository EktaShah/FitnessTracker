<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Signin Template for Bootstrap</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

		<!-- Custom styles for this template -->
		<link href="css/signin.css" rel="stylesheet">

	</head>

	<body>
		<div id="top-nav"></div>
		<div class="container">

			<form class="form-signin" role="form">
				<h2 class="form-signin-heading">Please sign in</h2>
				<input type="email" class="form-control" placeholder="Email address" required autofocus>
				<input type="password" class="form-control" placeholder="Password" required>
				<label class="checkbox">
					<input type="checkbox" value="remember-me">
					Remember me </label>
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Sign in
				</button>
			</form>

		</div>
		<!-- /container -->
				<!-- add jQuery before adding the backstretch plugin -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>

		<!-- Stretches the background image as per screen size -->
		<!-- add the backstretch plugin -->
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>

		<script type='text/javascript'>
			$(window).load(function() {
				$.backstretch("http://www.burn60.com/blog/wp-content/uploads/2013/12/morning-workout.jpg");
				$("#top-nav").load("inc/navigation.php, function() {
					$(".index").addClass("active");
				});
			});
		</script>
	</body>
</html>
