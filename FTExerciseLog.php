<!DOCTYPE html>
<html>
	<head>
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<title>Exercise Log</title>

			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
			<link rel="stylesheet" href="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css">

			<link href="css/signin.css" rel="stylesheet">

		</head>

	</head>
	<body>
		<div id="top-nav"></div>
		<div class="container">
			<h2><i>Exercise Log</i></h2>
			</div>
			</header>
			<div class="container content">
			<a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="ExerciselogForm.php"> <i class="glyphicon glyphicon-plus"></i>Add</a>
			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" >
				<div class="modal-dialog">
					<div class="modal-content"></div>
				</div>
			</div>
			<br />
			<br />
			<table id="example" class="table table-striped table-bordered" >
				<thead>
					<tr>
						<th>Place</th>
						<th>Type</th>
						<th>Distance (m)</th>
						<th>Calories Burned</th>
						<th>Time</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Treadmill</td>
						<td>Running</td>
						<td>18.0</td>
						<td>500</td>
						<td> Sunday 9:15am</td>
					</tr>
					<tr>
						<td>Treadmill</td>
						<td>Running</td>
						<td>18.0</td>
						<td>500</td>
						<td> Sunday 9:15am</td>
					</tr>
					<tr>
						<td>The tripping fields</td>
						<td>Biking</td>
						<td>18.0</td>
						<td>500</td>
						<td> Sunday 9:15am</td>
					</tr>
				</tbody>
			</table>

		</div>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.1/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

		<!-- Stretches the background image as per screen size -->
		<!-- add the backstretch plugin -->
		<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-backstretch/2.0.4/jquery.backstretch.min.js"></script>

		<script type='text/javascript'>
			$(window).load(function() {

				$("#top-nav").load("inc/navigation.php", function() {
					$(".index").addClass("active");
				});
				$(document).ready(function() {
					$('#example').dataTable();
				});
			});
		</script>
	</body>
</html>