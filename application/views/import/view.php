<div class="card-header">
	<h3 class="float-left"><i class="fa-solid fa-file-import"></i> Import..</h3>
	<a href="<?= base_url(); ?>" class="btn btn-outline-danger float-right"><i class="fa-solid fa-angle-left"></i> Back</a>
    <a href="<?= base_url('import/add'); ?>" class="btn btn-primary float-right mr-2"><i class="fa-solid fa-circle-plus"></i> Import</a>
</div>
<div class="card-body">	
	<div class="row">
	<div class="col-md-12">
		<?php if (count($import) > 0){ ?>
			<table class="table table-striped" id="viewImport">
				<thead>
					<tr>
						<?php foreach ($import[0] as $key => $value){ ?>
							<th scope="col"><?= $key;?> </th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php $i=1; foreach($import as $row){  ?>
					<tr>
						<?php foreach ($row as $key => $value){ ?>
							<td scope="row"><?= $value; ?></td>
						<?php } ?>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php }else{ ?>
				<div id="noRecords"> <h4 style="text-align: center;">No records.</h4> </div>
		<?php } ?>
	</div>

		
		
