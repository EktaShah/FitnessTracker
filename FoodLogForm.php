<? include 'inc/_nav.php'; ?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal">
		<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
	</button>
	<h4 class="modal-title" id="myModalLabel"><i>Food Intake Log</i></h4>
	<h5><i>Today's FoodLog</i></h5>
</div>
<div class="modal-body">

	<form class="form-horizontal" >
		<form class="navbar-form navbar-right">
			<input type="text" class="form-control" placeholder="Search...">
		</form>
		<br>
		<div class="form-group">
			<label for="txtName" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtName" placeholder="Name">
			</div>
		</div>
		<div class="form-group">
			<label for="txtDistance" class="col-sm-2 control-label">Calories</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtCalories" placeholder="Calories">
			</div>
		</div>
		<div class="form-group">
			<label for="txtSpeed" class="col-sm-2 control-label">Fat(g)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtFat" placeholder="Fat">
			</div>
		</div>
		<div class="form-group">
			<label for="txtDuration" class="col-sm-2 control-label">Carbs(g)</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtCarbs" placeholder="Carbs">
			</div>
		</div>
		<div class="form-group">
			<label for="txtDuration" class="col-sm-2 control-label">Protien</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtProtien" placeholder="Protien">
			</div>
		</div><div class="form-group">
			<label for="txtDuration" class="col-sm-2 control-label">Time</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="txtTime" placeholder="Time">
			</div>
		</div>
		
		
		<div class="form-group">
			<label for="txtNotes" class="col-sm-2 control-label">Notes</label>
			<div class="col-sm-20">
				<!-- <input type="text" class="form-control" id="txtNotes" placeholder="notes"> -->
				<textarea id="txtNotes" class="form-control" rows="3">Notes</textarea>
			</div>
		</div>
	</form>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		Close
	</button>
	<button type="button" class="btn btn-primary">
		Save changes
	</button>
</div>
