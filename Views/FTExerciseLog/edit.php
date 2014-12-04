<div class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title"><span class="glyphicon glyphicon-star"></span> Log Exercise</h4>
            </div>
            <!-- Header -->
            <div class="modal-body">
                <ng-form name="nameDialog" novalidate role="form">
                    <div class="form-group input-group-sm"
                    ng-class="{ true: 'has-error' }[nameDialog.foodName.$dirty && nameDialog.foodName.$invalid]">
                        <label class="control-label" for="foodName">*Activity Type:</label>
                        <input type="text" class="form-control" name="Running/Walking" id="Running/Walking" ng-model="exercise.activity" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm"
                    ng-class="{ true: 'has-error' }[nameDialog.calories.$dirty && nameDialog.calories.$invalid]">
                        <label class="control-label" for="calories">*Distance:</label>
                        <input type="text" class="form-control" name="Distance" id="Distance" ng-model="exercise.distance" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm"
                    ng-class="{ true: 'has-error' }[nameDialog.fat.$dirty && nameDialog.fat.$invalid]">
                        <label class="control-label" for="fat">*Average pace:</label>
                        <input type="text" class="form-control" name="Average pace" id="Average pace" ng-model="exercise.averagepace" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm"
                    ng-class="{ true: 'has-error' }[nameDialog.protein.$dirty && nameDialog.protein.$invalid]">
                        <label class="control-label" for="protein">*Calories Burned:</label>
                        <input type="text" class="form-control" name="calories" id="calories" ng-model="exercise.calories" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm"
                    ng-class="{ true: 'has-error' }[nameDialog.carbs.$dirty && nameDialog.carbs.$invalid]">
                        <label class="control-label" for="carbs">*Date:</label>
                         <input type="datetime-local" class="form-control" id="date" ng-model="exercise.date" value="<?=date('m/d/Y H:i:s')?>" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm">
                        <label class="control-label" for="time">Time:</label>
                        <input type="datetime-local" class="form-control" id="time" ng-model="food.time" value="<?=strtotime($model['Time']) ?>">
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