<div ng-init="loc='../'" />

<h2><i>Exercise Log</i></h2>

<div class="container content" ng-controller="dialogServiceTest">
	<div class="row">
		<div class="col-md-12">
						
<button class="btn btn-success" ng-click="launch('create')">
				<i class="glyphicon glyphicon-plus"></i>Run/Walk
			</button>
			<button id="quickAddButton" class="btn btn-success selectedButton" 
                 ng-click="launch('quickAdd')" disabled="true"
                 data-toggle="popover" title="Quick add the selected item">
                <i class="glyphicon glyphicon-plus-sign"></i> Quick Add
			</button>
			<button id="deleteButton" class="btn btn-danger selectedButton" ng-click="launch('delete')" disabled="true"
                 data-toggle="popover" title="Delete the selected item">
				<i class="glyphicon glyphicon-trash"></i> Delete
			</button>
			<button id="updateButton" class="btn btn-warning selectedButton" 
			     ng-click="launch('update')" disabled="true"
			     data-toggle="popover" title="Update the selected item">
				<i class="glyphicon glyphicon-pencil"></i> Update
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