<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-database"></i> Add New </h3>
	<a href="<?= base_url('db'); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
</div>
<div class="card-body">	
	<div class="row">

  <div class="col-md-12">
  <form id="addUser" method="POST">
    <div class="form-group">
        <input type="text" class="form-control" id="fullName"  placeholder="Full Name">
        <small id="nameError"></small>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" id="phone" placeholder="Phone">
        <small id="phoneError"></small>
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="email" placeholder="Email">
        <small id="emailError"></small>
      </div>
      <div class="form-group">
        <textarea class="form-control" id="note" rows="2" placeholder="Notes"></textarea>
      </div>
      <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Save</button>
    </form>
  </div>



    