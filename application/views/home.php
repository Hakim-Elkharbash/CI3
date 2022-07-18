<div class="card-header">
	<h3 class="float-left">CodeIgniter 3..</h3>
	<a href="" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#Setting"><i class="fa-solid fa-gear"></i> Setting</a>
</div>
<div class="card-body">	
	<div class="row">
		<div class="col-md-4">
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title"><i class="fa-solid fa-database"></i> Database</h5>
					<hr>
					<p class="card-text">Shows how to insert, edit and delete using MySQL database.</p>
					<a href="<?= base_url('db'); ?>" class="btn btn-dark btn-block">Try it <i class="fa-solid fa-angles-right"></i></a>
				</div>
				<div class="card-footer text-muted">
					<span class="ci3_timeAgo"> 2 days ago </span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title"><i class="fa-solid fa-upload"></i> Upload</h5>
					<hr>
					<p class="card-text">Shows how to upload and download multinble type of files.</p>
					<a href="#" class="btn btn-dark btn-block disabled">Try it <i class="fa-solid fa-angles-right"></i></a>
				</div>
				<div class="card-footer text-muted">
					<span class="ci3_timeAgo"> 0 days ago </span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title"><i class="fa-solid fa-file-import"></i> Import</h5>
					<hr>
					<p class="card-text">Shows how to import Excel file into MySQL database.</p>
					<a href="#" class="btn btn-dark btn-block disabled">Try it <i class="fa-solid fa-angles-right"></i></a>
				</div>
				<div class="card-footer text-muted">
					<span class="ci3_timeAgo"> 0 days ago </span>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title"><i class="fa-solid fa-chart-column"></i> Charts</h5>
					<hr>
					<p class="card-text">Shows different types of charts.</p>
					<a href="#" class="btn btn-dark btn-block disabled" >Try it <i class="fa-solid fa-angles-right"></i></a>
				</div>
				<div class="card-footer text-muted">
					<span class="ci3_timeAgo"> 0 days ago </span>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="card mb-3">
				<div class="card-body">
					<h5 class="card-title"><i class="fa-solid fa-map-location-dot"></i> Maps</h5>
					<hr>
					<p class="card-text">Shows different types of charts.</p>
					<a href="#" class="btn btn-dark btn-block disabled" >Try it <i class="fa-solid fa-angles-right"></i></a>
				</div>
				<div class="card-footer text-muted">
					<span class="ci3_timeAgo"> 0 days ago </span>
				</div>
			</div>
		</div>



<!-- Modal -->
<div class="modal fade" id="Setting" tabindex="-1" role="dialog" aria-labelledby="SettingLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="SettingLabel">Setting..</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<form>
			<div class="form-group">
				<label for="notifications-name" class="col-form-label">Notifications:</label>
				<input type="text" class="form-control" id="notifications-name" value="hakem_g@yahoo.com">
				<small id="emailHelp" class="form-text text-muted">Leave it blank for no email notifications.</small>
			</div>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="SaveChanges">Save changes</button>	
      </div>
    </div>
  </div>
</div>
