<!DOCTYPE html>
<html lang="en" ng-app="FitnessTracker">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>FitnessTracker</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		</link>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		</link>
		<link rel="stylesheet" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
		</link>
		<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'/>
		<link href="<? echo $loc ?>Content/css/main.css" rel="stylesheet">
		</link>
		<script scr="<? echo $loc ?>Content/js/FitnessTracker.js" type="text/javascript"></script>
		<!-- JQuery -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>

		<!-- Bootstrap -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>

		<!-- Angular -->
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>

		<!-- JQuery: DataTables -->
		<script type="text/javascript" src="http:///cdn.datatables.net/1.10.4/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>

		<!-- Dialog Service -->
		<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js" type="text/javascript"></script>
		<script src="http://m-e-conroy.github.io/angular-dialog-service/javascripts/dialogs.min.js" type="text/javascript"></script>

		<!-- Main Initialization Code -->
		<script src="<? echo $loc ?>Content/js/FitnessTracker.js" type="text/javascript"></script>
	</head>
	<body>
		<script src="<? echo $loc ?>Content/js/facebook.js" type="text/javascript"></script>
		<div id="top-nav" ng-include="'<? echo $loc ?>inc/navigation.php'"></div>
		<?
            include __DIR__ . '/../' . $view;
		?>
		<footer>
			<div class="container">
				<div id="status"></div>
			</div>
		</footer>

	</body>
</html>