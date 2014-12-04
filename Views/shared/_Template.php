<!DOCTYPE html>
<html lang="en" ng-app="FitnessTracker">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>FitnessTracker</title>

		<!-- Bootstrap core CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"></link>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"></link>

		<link href="../Content/css/main.css" rel="stylesheet"></link>
		<script scr="../Content/js/FitnessTracker.js" type="text/javascript"></script>
		<!-- JQuery -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.js"></script>

        <!-- Bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
        
        <!-- Angular -->
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
        
        <!-- JQuery: DataTables -->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.1/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        
        <!-- Dialog Service -->
        <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js" type="text/javascript"></script>
        <script src="http://m-e-conroy.github.io/angular-dialog-service/javascripts/dialogs.min.js" type="text/javascript"></script>
            
        <!-- Main Initialization Code -->
        <script src="../Content/js/FitnessTracker.js" type="text/javascript"></script>
	</head>
	<body> 
		<div id="top-nav" ng-include="'../inc/navigation.php'"></div>
		<? include __DIR__ . '/../' . $view; ?>
		<!--
		<footer>
					<div class="container"></div>
				</footer>
		-->
		
	</body>
</html>