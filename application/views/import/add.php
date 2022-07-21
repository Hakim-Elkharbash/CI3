<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-file-excel"></i> Import Excel </h3>
	<a href="<?= base_url('import'); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
</div>
<div class="card-body">	
	<div class="row">

  <div class="col-md-12">
        <div class="container p-4">
        <!-- <form action="upload"  method="POST" enctype="multipart/form-data"> -->
        <form id="uploadExcelFile"  method="POST" enctype="multipart/form-data">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="uploadedExcelFile" name="uploadedExcelFile" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                <label class="custom-file-label" for="uploadedExcelFile">Choose file</label>
            </div>
            <div id="Fsuccess" style="display:none" class="alert alert-success" role="alert">
                    
            </div>
            <div id="fileDetails" style="display:none">
                <div id="Ftype">
                    
                </div>
                <div id="Fsize" class="mb-3">
                    
                </div>
                <div id="Ferror" style="display:none" class="alert alert-danger" role="alert">
                    
                </div>
                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-upload"></i> Import</button>
            </div>    
        </form>
        </div>
  </div>

