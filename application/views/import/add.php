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

            <div id="Fsuccess" style="display:none">
                <div class="class alert alert-success" role="alert"">
                    <p>File has been imported. Please pick the fields you want to import.</p>
                </div>   
                <hr>
                <br>         
                <div class="container">
                    <div class="row" id="pickFields">
                        
                    </div>
                </div> <!--container div  -->
                <hr>
                <a id="importFields" class="btn btn-danger btn-lg btn-block"><i class="fa-solid fa-file-import"></i> Import</a>
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

