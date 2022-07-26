<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-upload"></i> Upload..</h3>
	<a href="<?= base_url(); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
  <a href="<?= base_url('upload/add'); ?>" class="btn btn-primary float-right mr-2"><i class="fa-solid fa-circle-plus"></i> Upload File</a>
	<!-- <button class="btn btn-danger float-right mr-2" style="<?php //if (count($files) == 0) echo 'display:none'; ?>" id="delAllUsers">Delete All</button> -->
</div>
<div class="card-body">	
	<div class="row">
		<div class="col-md-12">
    <?php if (count($files) > 0){ ?>
        <div class="container">
          <div class="row ">
            <?php foreach ($files as $file) : ?>
                <div class="col-lg-4 mb-3">
                        <div class="card bg-light" style = "width: 22rem; " >
                            <div class="align-self-center pt-3 pb-3">
                              <?php 
                                  if(pathinfo($file, PATHINFO_EXTENSION) == "pdf"){
                                      echo '<i class="fa-solid fa-file-pdf fa-6x"></i>';
                                  }elseif((pathinfo($file, PATHINFO_EXTENSION) == "png") || (pathinfo($file, PATHINFO_EXTENSION) == "jpg") || (pathinfo($file, PATHINFO_EXTENSION) == "gif")){
                                      echo '<i class="fa-solid fa-image fa-6x"></i>';
                                  }elseif(pathinfo($file, PATHINFO_EXTENSION) == "txt"){
                                      echo '<i class="fa-solid fa-file-text fa-6x"></i>';
                                  }elseif(pathinfo($file, PATHINFO_EXTENSION) == "xlsx"){
                                      echo '<i class="fa-solid fa-file-excel fa-6x"></i>';
                                  }else{
                                      echo '<i class="fa-solid fa-file fa-6x"></i>';
                                  }
                              ?>
                            </div>
                            <div class="card-body bg-white">
                                <h5 class="card-title"><b><?= $file; ?></b></h5>
                                <p class="card-text"><b>Type:</b> <?= pathinfo($file, PATHINFO_EXTENSION); ?> </p>
                                <p class="card-text"><b>Size:</b> <?= round(filesize($file)/1024)." KB"; ?> </p>
                                <a href="<?= base_url("uploads/".$file); ?>" class="btn btn-primary" download><i class="fa-solid fa-download"></i> Download</a>
                                <a id="<?= $file ?>" class="btn btn-secondary delFile"><i class="fa-solid fa-trash"></i> Delete</a>
                            </div>
                    </div>
                </div>
            <?php endforeach; ?>
          </div>
        </div> <!--container div  -->
      <?php }else{ ?>
				<div id="noRecords"> <h4 style="text-align: center;">No files.</h4> </div>
			<?php } ?>
	</div>

		
		
<!-- Delete File Modal -->
<div class="modal fade" id="deleteFileModal" tabindex="-1" role="dialog" aria-labelledby="deleteFileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteFileModalLabel">Delete File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h4>Are you sure? </h4>
        <input type="hidden" id="fileName" name="fileName">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="ConfirmFileDelete" class="btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>
