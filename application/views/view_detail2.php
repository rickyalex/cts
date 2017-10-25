<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-table-develop/dist/bootstrap-table.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-table-develop/dist/extensions/editable/bootstrap-table-editable.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-editable.js"></script>


<link href="<?php echo base_url();?>assets/bootstrap-table-develop/src/bootstrap-table.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/css/bootstrap-editable.css" rel="stylesheet" type="text/css" /><div class="xcrud">

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<link href="<?php echo base_url();?>xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>xcrud/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>xcrud/plugins/jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>xcrud/plugins/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>xcrud/themes/bootstrap/xcrud.css" rel="stylesheet" type="text/css" /><div class="xcrud">
		<div style="display:none;" class="xcrud-main-tab">Order Monitoring<small> </small><span class="xcrud-toggle-show xcrud-toggle-down"><i class="glyphicon glyphicon-chevron-down"></i></span></div>    
			<div class="xcrud-container">
				
					<h2>Monitoring DO</h2>
					
				<div class="xcrud-list-container">
					<?php 
						if(isset($no_do)){ //if no do is set

					?>
					<table class="table table-bordered table-hover table-responsive">
						<tbody>
							<tr><td width="20%"><b>No DO</b></td><td><?php echo $header[0]['no_do']; ?></td></tr>
							<tr><td><b>Customer Name</b></td><td><?php echo $header[0]['nama_kustomer']; ?></td></tr>
							<tr><td><b>No Unit</b></td><td><?php echo $header[0]['nomor_unit']; ?></td></tr>
							<tr><td><b>Type</b></td><td><?php echo $header[0]['nama_tipe']; ?></td></tr>
							<tr><td><b>Driver</b></td><td><?php echo $header[0]['nama_personil']; ?></td></tr>
							<tr><td><b>Product</b></td><td><?php echo $header[0]['nama_produk']; ?></td></tr>
							<tr><td><b>Rute</b></td><td><?php echo $header[0]['rute']; ?></td></tr>
						</tbody>
					</table>
					<h3>Details</h3>
					<?php if(GROUPID==2){ ?> 
							<button name="add" class="btn btn-success" style="margin-bottom:5px" onClick="window.open('<?php echo base_url()."entry_tracking/viewData/no_do/".$header[0]['no_do']."'" ?>,'_parent')">
								Add
							</button>
					<?php } ?>
					<table class="table table-bordered table-hover table-responsive">
						<thead class="portlet box green-haze">
							<tr><td><b>ID</b></td><td><b>Transaction Date</b></td><td><b>Tonage</b></td><td><b>Last Position</b></td><td><b>Status</b></td><td><b>Depart Time</b></td><td><b>Created By</b></td></tr>
						</thead>
						<tbody>
							
							<?php 
								if(count($detail)>=1){
									foreach($detail as $det){
										$x=0;
										?>
										<tr>
										<?php
											foreach($det as $d){ 
												if($x==0) { ?><td class="id"><?php echo $d; ?></td><?php }
												elseif($x==2) { ?><td><span class="xedit"><?php echo $d; ?></span></td><?php }
												else { ?><td><?php echo $d; ?></td><?php } ?>
											<?php 
												$x++;
											} ?>
										</tr> <?php
									}
								}
								else { ?>
								<tr><td style="text-align:center" colspan="6">No Data</td></tr>
							<?php
								}
							?>
						</tbody>
					</table>
					<?php 
						else echo "<h2>".$message."</h2>";
					?>
				</div>
			</div>
		</div>
		<button name="back" class="btn btn-primary" onClick="history.back(1);">Back</button>			
	</div>
</div>
<script>
jQuery(document).ready(function() {
	$.fn.editable.defaults.mode = 'popup';
	$('.xedit').editable();
	$(document).on('click','.editable-submit',function(){
		var x = $(this).closest('tr').find('td.id').text();
		var y = $('.input-sm').val();
		var z = $(this).closest('td').children('span');
		//alert(z);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>view_detail/updateDetail/id/"+x+"/data/"+y,
			success: function(s){
				
			}
			,
			error: function(e){
				alert('Update Error');
			}
		});
	});
<<<<<<< HEAD
=======
	
	$(document).on('click','.remove',function(e){
		var id = $(this).closest('tr').find('td.id').text();
		
		//alert(id);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>view_detail/removeDetail/id/"+id,
			success: function(s){
				alert("Delete Success")
				location.reload();
			}
			,
			error: function(e){
				alert('Delete Error');
			}
		});
	});
>>>>>>> branch
});
</script>

