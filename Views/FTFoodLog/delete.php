<div class="modal">
	<div class="modal-dialog">
		<div class="modal-content" ng-keyup="keyupEvent($event, null)">
			<div class="modal-header">

				<button type="button" ng-click="cancel()" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
				</button>
				<h4 class="modal-title"><span class="glyphicon glyphicon-trash"></span> Delete a food</h4>
			</div>
			<!-- Header -->
			<div class="modal-body">
			    <h5>Are you sure you want to delete <?=$model['Name']?>?</h5>
        
				<div class="modal-footer">
				    <input type="hidden" id="deleteID" name="id" value="<?=$model['id']?>" />
                    <button ng-click="cancel()" type="button" class="btn btn-default" data-dismiss="modal" value="Close">
						Close
					</button>
					<button ng-click="save()" type="button" class="btn btn-primary" value="Save Changes">
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