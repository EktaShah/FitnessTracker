<div class="modal">
	<div class="modal-dialog">
		<div class="modal-content" ng-keyup="keyupEvent($event)">
			<div class="modal-header">
				<a type="button" ng-click="cancel()" class="close" data-dismiss="modal">&times;</a>
				<h4 class="modal-title"><span class="glyphicon glyphicon-star"></span> Log Food</h4>
			</div>
			<!-- Header -->
			<div class="modal-body row">
				<ng-form name="nameDialog" novalidate role="form" ng-keyup="keyupEvent($event, nameDialog)">
					<div>
					    
					<div class="form-group input-group-sm col-sm-9"
					ng-class="{ true: 'has-error' }[nameDialog.foodName.$dirty && nameDialog.foodName.$invalid]">
						<label class="control-label" for="foodName">*Food Name:</label>
						<input type="text" class="form-control" name="foodName" id="foodName" ng-model="food.Name" required>
						</input>
					</div>
					<div class="form-group input-group-sm col-sm-3"
					ng-class="{ true: 'has-error' }[nameDialog.servings.$dirty && nameDialog.servings.$invalid]">
						<label class="control-label" for="servings">*Servings:</label>
						<input type="number" class="form-control" name="servings" id="servings" ng-model="food.Servings" min="1" max="10000" required>
						</input>
					</div>
					</div>
					<div>
					<div class="form-group input-group-sm col-md-3"
					ng-class="{ true: 'has-error' }[nameDialog.calories.$dirty && nameDialog.calories.$invalid]">
						<label class="control-label" for="calories">*Calories:</label>
						<input type="text" class="form-control" name="calories" id="calories" 
						  ng-model="food.Calories" placeholder="0" required>
						</input>
					</div>
					<div class="form-group input-group-sm col-md-3"
					ng-class="{ true: 'has-error' }[nameDialog.fat.$dirty && nameDialog.fat.$invalid]">
						<label class="control-label" for="fat">Fat (g):</label>
						<input type="text" class="form-control" name="fat" id="fat" ng-model="food.Fat" >
						</input>
					</div>
					<div class="form-group input-group-sm col-md-3"
					ng-class="{ true: 'has-error' }[nameDialog.carbs.$dirty && nameDialog.carbs.$invalid]">
						<label class="control-label" for="carbs">Carbs (g):</label>
						<input type="text" class="form-control" name="carbs" id="carbs" ng-model="food.Carbs" >
						</input>
					</div>
					<div class="form-group input-group-sm col-md-3"
					ng-class="{ true: 'has-error' }[nameDialog.protein.$dirty && nameDialog.protein.$invalid]">
						<label class="control-label" for="protein">Protein (g):</label>
						<input type="text" class="form-control" name="Protein" id="protein" ng-model="food.Protein" >
						</input>
					</div>
					</div>
					<div class="form-group input-group-sm col-sm-12">
						<label class="control-label" for="time">Time:</label>
						<input type="datetime-local" class="form-control" id="time" ng-model="food.Time">
					</div>

				</ng-form>

			</div>
			<!-- Body -->
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
		<!-- Content -->
	</div>
	<!-- Dialog -->
</div>
<!-- modal -->