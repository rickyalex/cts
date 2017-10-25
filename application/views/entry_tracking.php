<style>
	input.form-control,
	select.form-control{
		margin:1px;
		width:100% !important;
		font-size: 1em;
	}
		
	form.form_add,
	label,
	.bootstrap-table,
	div.th-inner,
	span.radio-label {
		font-size: 0.9em;
	}
		
	input.input-xs {
		  height: 22px;
		  padding: 2px 5px;
		  font-size: 0.9em;
		  line-height: 1.5; /* If Placeholder of the input is moved up, rem/modify this. */
		  border-radius: 3px;
	}
	
	span.select2{
		font-size: 0.9em;
		margin: 1px 0;
	}
		
	span.radio-label{
		margin:5px;
		padding: 3px;
	}
</style>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-12">
				<div class="portlet box blue-sharp">
					<div class="portlet-title">
						<div class="caption">
							Entry Tracking Data
						</div>
						<div class="tools">
						</div>
					</div>
					<div class="portlet-body">
						<form class='form_add' class='navbar-form'>
							<div class="row">
								<div class="col-lg-6 col-lg-offset-3">
									<div class="row">
										<div class="form-group">
											<label class="control-label col-md-2">No SJAB :</label>
											<div class="col-sm-9 col-md-9 col-lg-9">
												<input type="text" class="form-control input-xs" id="voyage_no" name="voyage_no" value="<?php echo $voyage_no; ?>" readonly>
											</div>					
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label class="control-label col-md-2">Origin :</label>
											<div class="col-sm-9 col-md-9 col-lg-9">
												<input type="text" class="form-control input-xs" id="origin" name="origin" value="<?php echo $result['origin']; ?>" readonly>
											</div>					
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label class="control-label col-md-2">Last Position :</label>
											<div class="col-sm-9 col-md-9 col-lg-9">
												<select id="last_position" name="last_position" class="form-control input-xs" data-placeholder="Select an option">
													<option></option>
													<option value="CLG">BCS LOGISTICS - CILEGON</option>
													<option value="CDP">CIKARANG DRY PORT - CIKARANG</option>
													<option value="SBY">STASIUN BENTENG - SURABAYA</option>
													<option value="CUSTOMER">CUSTOMER SITE</option>
												</select>
											</div>
										</div>
									</div>
									<div class="row">					
										<div class="form-group">
											<label class="control-label col-md-2">Status :</label>
											<div class="col-sm-9 col-md-9 col-lg-9">
												<select id="status" name="status" class="form-control input-xs" data-placeholder="Select an option">
													<option></option>
													<option value="LOAD">LOAD</option>
													<option value="UNLOAD">UNLOAD</option>
													<option value="ON TRAIN">ON TRAIN</option>
													<option value="ON DEPO">ON DEPO</option>
													<option value="CLOSED">CLOSED</option>
												</select>
											</div>
										</div>	
									</div>
									<div class="row">
										<div class="form-group">
											<label class="control-label col-md-2">Depart Time :</label>
											<div class="col-sm-9 col-md-9 col-lg-9">
												<input type="text" class="dtp form-control input-xs" id="depart_time" name="depart_time">
											</div>							
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<label class="control-label col-md-2">Remarks :</label>
											<div class="col-sm-9 col-md-9 col-lg-9">
												<input type="text" class="form-control input-xs" id="remarks" name="remarks" value="<?php //echo $result['remarks']; ?>">
											</div>					
										</div>
									</div>
								</div>
							</div>
							<hr>				
							<button id="button_submit" type="submit" value="xls" name="submit" class="btn btn-success">Submit</button>		
						</form>	
						</div>
					</div> <!-- /.portlet-body -->
					<button name="back" class="btn btn-primary" onClick="history.back(1);">Back</button>
				</div> <!-- /.portlet box -->
				
			</div> <!-- /.col -->
		</div> <!-- /.row -->
	</div> <!-- /.page-content -->
</div> <!-- /.page-content-wrapper -->

<script>
	$(window).bind("load", function() {
		$("select").select2({
			width: "100%"
		});
	});
	
	//form submit menggunakan FormData harus menggunakan browser versi IE 10+, Firefox 4.0+, Chrome 7+, Safari 5+, Opera 12+
	$('#button_submit').on('click',function(e){
		e.preventDefault();
		var form = $(".form_add")[0];
		var formData = new FormData(form);
		console.log(formData);
		$.ajax({
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			url: "<?php echo base_url();?>voyage/saveTracking",
				success: function(response) {
					console.log(response);
					alert(response);
					//window.open("<?php echo base_url(); ?>dashboard",'_parent');
				},
				error: function(response){
					console.log(response);
					alert(response.responseText);
				}
		});
		return false;
	});
</script>	


