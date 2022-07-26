<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-upload"></i> Upload File </h3>
	<a href="<?= base_url('upload'); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
</div>
<div class="card-body">	
	<div class="row">

  <div class="col-md-12">
        <div class="container p-4">
        <!-- <form action="upload"  method="POST" enctype="multipart/form-data"> -->
        <form id="uploadFile"  method="POST" enctype="multipart/form-data">
            <div class="custom-file mb-3">
                <input type="file" class="custom-file-input" id="uploadedFile" name="uploadedFile">
                <label class="custom-file-label" for="uploadedFile">Choose file</label>
            </div>
            <div id="loading" style="display:none">
                <div class="d-flex justify-content-center">
                  <div class="spinner-grow text-primary" role="status">
                      <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-secondary" role="status">
                      <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-success" role="status">
                      <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-danger" role="status">
                      <span class="sr-only">Loading...</span>
                  </div>
                </div>    
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
                <button type="submit" class="btn btn-primary btn-block"><i class="fa-solid fa-upload"></i> Upload</button>
            </div>    
        </form>
        </div>
  </div>