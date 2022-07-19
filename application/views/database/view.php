<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-database"></i> Database..</h3>
	<a href="<?= base_url(); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
    <a href="<?= base_url('db/add'); ?>" class="btn btn-primary float-right mr-2"><i class="fa-solid fa-circle-plus"></i> Add New</a>
	<button class="btn btn-danger float-right mr-2" style="<?php if (count($users) == 0) echo 'display:none'; ?>" id="delAllUsers">Delete All</button>
</div>
<div class="card-body">	
	<div class="row">
		<div class="col-md-12">
			<?php if (count($users) > 0){ ?>
			<table class="table table-striped" id="viewUsers">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Email</th>
						<th scope="col">Notes</th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($users as $user){  ?>
					<tr>
						<th scope="row"><?= $i++; ?></th>
						<td><?= $user->name;?></td>
						<td><?= $user->phone;?></td>
						<td><?= $user->email;?></td>
						<td><?= $user->note;?></td>
						<td class="float-right"><a id="<?= $user->id ?>" class="delUser"><i class="fa-solid fa-trash-can fa-lg"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?= base_url('db/edit/'.$user->id) ?>"><i class="fa-solid fa-pencil fa-lg"></i></a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php }else{ ?>
				<div id="noRecords"> <h4 style="text-align: center;">No records.</h4> </div>
			<?php } ?>
		</div>

		
		
<!-- Delete User Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Are you sure? </h4>
        <input type="hidden" id="userId" name="userId">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="ConfirmDelete" class="btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>



<!-- Delete All Users Modal -->
<div class="modal fade" id="deleteAllUsersModal" tabindex="-1" role="dialog" aria-labelledby="deleteAllUsersModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteAllUsersModalLabel">Delete All Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to delete ALL users? </h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="ConfirmDeleteAllUsers" class="btn btn-danger">Confirm (DELETE all users)</button>
      </div>
    </div>
  </div>
</div>