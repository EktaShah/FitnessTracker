<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>FitnessTracker</title>

		<!-- Bootstrap core CSS -->
		<!-- Custom styles for this template -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

		<link href="css/main.css" rel="stylesheet">

		
	</head>
	<body>
	<div id="top-nav"></div>
		<div class="container">
			<br>
			<br>

			<div class="starter-template">

				<h1><i>FitnessTracker</i></h1>
				<p class="lead">
					Track life, food and the pursuit of happiness!
				</p>
			</div>

			<p align="left">

				<br>
				<a href="ftsignIn.html" class="btn btn-default" role="button">Login</a>
				<!-- <button type="button" class="btn btn-default" href="ftsignIn.php" >
					Login
				</button> -->
				<br>

				<button type="button" class="btn btn-default" href = "#">
					FaceBook Signup
				</button>
				<br>
				<button type="button" class="btn btn-default" href = "#">
					Google+ Signup
				</button>

			</p>

		</div><!-- /.container -->
		<!-- add jQuery before adding the backstretch plugin -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>

		<!-- Stretches the background image as per screen size -->
		<!-- add the backstretch plugin -->
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>

		<script type='text/javascript'>
			$(window).load(function() {
				$.backstretch("http://www.burn60.com/blog/wp-content/uploads/2013/12/morning-workout.jpg");
				$("#top-nav").load("inc/navigation.html", function() {
					$(".index").addClass("active");
				});
			});
		</script>
	</body>
</html>