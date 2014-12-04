<div class="modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title"><span class="glyphicon glyphicon-star"></span> Log Food</h4>
			</div>
			<!-- Header -->
			<div class="modal-body">
				<ng-form name="nameDialog" novalidate role="form">
					<div class="form-group input-group-sm"
					ng-class="{ true: 'has-error' }[nameDialog.foodName.$dirty && nameDialog.foodName.$invalid]">
						<label class="control-label" for="foodName">*Food Name:</label>
						<input type="text" class="form-control" name="foodName" id="foodName" ng-model="food.Name" required>
						</input>
					</div>
					<div class="form-group input-group-sm"
					ng-class="{ true: 'has-error' }[nameDialog.calories.$dirty && nameDialog.calories.$invalid]">
						<label class="control-label" for="calories">*Calories:</label>
						<input type="text" class="form-control" name="calories" id="calories" ng-model="food.Calories" required>
						</input>
					</div>
					<div class="form-group input-group-sm"
					ng-class="{ true: 'has-error' }[nameDialog.fat.$dirty && nameDialog.fat.$invalid]">
						<label class="control-label" for="fat">Fat:</label>
						<input type="text" class="form-control" name="fat" id="fat" ng-model="food.Fat" >
						</input>
					</div>
					<div class="form-group input-group-sm"
					ng-class="{ true: 'has-error' }[nameDialog.carbs.$dirty && nameDialog.carbs.$invalid]">
						<label class="control-label" for="carbs">Carbs:</label>
						<input type="text" class="form-control" name="carbs" id="carbs" ng-model="food.Carbs" >
						</input>
					</div>
					<div class="form-group input-group-sm"
					ng-class="{ true: 'has-error' }[nameDialog.protein.$dirty && nameDialog.protein.$invalid]">
						<label class="control-label" for="protein">Protein:</label>
						<input type="text" class="form-control" name="Protein" id="protein" ng-model="food.Protein" >
						</input>
					</div>
					<div class="form-group input-group-sm">
						<label class="control-label" for="time">Time:</label>
						<input type="datetime-local" class="form-control" id="time" ng-model="food.Time">
					</div>

				</ng-form>

				<div class="modal-footer">
					<button ng-click="cancel()" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
						Close
					</button>
					<button ng-click="save()" type="button" class="btn btn-primary" value="Save Changes"
					ng-disabled="(nameDialog.$dirty && nameDialog.$invalid) || nameDialog.$pristine">
						Save changes
					</button>
				</div>
				<!-- Footer -->
			</div>
			<!-- Body -->
		</div>
		<!-- Content -->
	</div>
	<!-- Dialog -->
</div>
<!-- modal -->