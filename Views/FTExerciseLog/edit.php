<div class="modal">
   <div class="modal-dialog">
     <div class="modal-content" ng-keyup="keyupEvent($event)">
          <div class="modal-header">

                <a type="button" ng-click="cancel()" class="close" data-dismiss="modal">&times;</a>
                <h4 class="modal-title"><span class="glyphicon glyphicon-star"></span> Log Exercise</h4>
            </div>
            <!-- Header -->
            <div class="modal-body row">
                <ng-form name="nameDialog" novalidate role="form"ng-keyup="keyupEvent($event, nameDialog)">
                    <div class="form-group input-group-sm col-sm-9"
                    ng-class="{ true: 'has-error' }[nameDialog.Exercise.$dirty && nameDialog.Exercise.$invalid]">
                        <label class="control-label" for="Exercise">*Exercise:</label>
                        <input type="text" class="form-control" name="Exercise" id="Exercise" ng-model="exercise.Exercise" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm col-sm-6"
                    ng-class="{ true: 'has-error' }[nameDialog.ActivityType.$dirty && nameDialog.ActivityType.$invalid]">
                        <label class="control-label" for="ActivityType">*Activity Type:</label>
                        <input type="text" class="form-control" name="ActivityType" id="ActivityType" ng-model="exercise.ActivityType" required>
                        </input>
                    </div>
                    <div>
                    <div class="form-group input-group-sm col-sm-4"
                    ng-class="{ true: 'has-error' }[nameDialog.Distance.$dirty && nameDialog.Distance.$invalid]">
                        <label class="control-label" for="Distance">*Distance:</label>
                        <input type="text" class="form-control" name="Distance" id="Distance" ng-model="exercise.Distance" required>
                        </input>
                    </div>
                    <div class="form-group input-group-sm col-sm-4"
                    ng-class="{ true: 'has-error' }[nameDialog.AveragePace.$dirty && nameDialog.AveragePace.$invalid]">
                        <label class="control-label" for="AveragePace">*Average pace:</label>
                        <input type="text" class="form-control" name="Average pace" id="Average pace" ng-model="exercise.AveragePace">
                        </input>
                    </div>
                    <div class="form-group input-group-sm col-sm-4"
                    ng-class="{ true: 'has-error' }[nameDialog.Calories.$dirty && nameDialog.Calories.$invalid]">
                        <label class="control-label" for="Calories">*Calories Burned:</label>
                        <input type="text" class="form-control" name="calories" id="calories" ng-model="exercise.Calories" required>
                        </input>
                    </div>
                    </div>
                    
                    
                    <!-- ng-class="{ true: 'has-error' }[nameDialog.Time.$dirty && nameDialog.Time.$invalid]"> -->
                    <div class="form-group input-group-sm col-sm-12"
                        <label class="control-label" for="Time">*Time:</label>
                         <input type="datetime-local" class="form-control" id="Time" ng-model="exercise.Time" value="<?=date('m/d/Y H:i:s')?>">
                        </input>
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