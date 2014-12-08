<div ng-init="loc='../'" />

<h2><i>Exercise Log</i></h2>

<div class="container content" ng-controller="dialogServiceTest">
	<div class="row">
		<div class="col-md-12">
			<!--
			<button class="btn btn-danger" ng-click="launch('error')">
			Error Dialog
			</button>

			<button class="btn btn-primary" ng-click="launch('wait')">
			Wait Dialog
			</button>

			<button class="btn btn-default" ng-click="launch('notify')">
			Notify Dialog
			</button>

			<button class="btn btn-success" ng-click="launch('confirm')">
			Confirm Dialog
			</button>
			-->

			<button class="btn btn-success" ng-click="launch('create')">
				<i class="glyphicon glyphicon-plus"></i>Run/Walk
			</button>
			<button id="deleteButton" class="btn btn-danger" ng-click="launch('delete')">
				<i class="glyphicon glyphicon-trash"></i> Delete
			</button>
		</div>
	</div>
	<br />
	<div class="alert alert-success initialy-hidden" id="myAlert">
		<button type="button" class="close" data-dismiss="alert">
			<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
		</button>
		<div id="errorMessage" ng-bind="exerciselogMessage"></div>
	</div>

	<table id="exerciseLog" class="table table-striped table-bordered display" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>ID</th>
				<th>Exercise</th>
				<th>Activity Type</th>
				<th>Distance</th>
				<th>Average pace (min/mile)</th>
				<th>Calories Burned</th>
				<th>Time</th>
			</tr>
		</thead>
	</table>
	<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.6.0.js" type="text/javascript"></script>
	<script src="http://m-e-conroy.github.io/angular-dialog-service/javascripts/dialogs.min.js" type="text/javascript"></script>
	<script src="../Content/js/FTExerciseLog.js"></script>
</div>