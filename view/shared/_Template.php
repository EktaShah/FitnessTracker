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
		<div id="top-nav">
			<?
            include __DIR__ . '/../../inc/_nav.php';
			?>
		</div>
		<?
            include __DIR__ . '/../' . $view;
		?>
		<footer>
			<div class="container"></div>
		</footer>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<!-- Stretches the background image as per screen size -->
		<!-- add the backstretch plugin -->
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>

		<script type='text/javascript'>
			$(window).load(function() {
				$.backstretch("http://www.burn60.com/blog/wp-content/uploads/2013/12/morning-workout.jpg");
				$("#top-nav").load("inc/navigation.php", function() {
					$(".index").addClass("active");
				});
			});
		</script>
	</body>
</html>