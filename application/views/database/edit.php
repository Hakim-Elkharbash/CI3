<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-database"></i> Edit User </h3>
	<a href="<?= base_url('db'); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
</div>
<div class="card-body">	
	<div class="row">

  <div class="col-md-12">
  <form id="editUser" method="POST">
    <input type="hidden" id="id" name="id" value="<?= $userData->id ?>">
    <div class="form-group">
        <input type="text" class="form-control" id="fullName" value="<?= $userData->name ?>"  placeholder="Full Name">
        <small id="nameError"></small>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="phone" value="<?= $userData->phone ?>"  placeholder="Phone">
        <small id="phoneError"></small>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" value="<?= $userData->email ?>"  placeholder="Email">
        <small id="emailError"></small>
      </div>
      <div class="form-group">
        <textarea class="form-control" id="note" rows="2" placeholder="Notes"><?= $userData->note ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Update</button>
    </form>
  </div>



    