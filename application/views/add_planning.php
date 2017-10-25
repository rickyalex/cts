<style>
		input.form-control,
		select.form-control{
			margin:1px;
			width:100% !important;
			font-size: 1em;
		}
		
		label{
			font-size: 1em;
		}
		
		span.radio-label{
			margin:5px;
			padding: 3px;
		}
</style>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="xcrud-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								Add Planning
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<form class='form_add' class='navbar-form'>
								<div class="row">
									<div class="col-lg-6">
										<h5>Trucking Area Barat</h5>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Trucking :</label>
												<div class="col-md-8">
													<input id="trucking_west1" name="trucking_west" type="radio" value="1" <?php //if($result['origin']=="CLG") echo "checked"; ?>><span class="radio-label">INTERNAL</span><input id="trucking_west2" name="trucking_west" type="radio" value="2" <?php //if($result['origin']=="CDP") echo "checked"; ?>><span class="radio-label">EXTERNAL</span>
												</div>							
											</div>
										</div>	
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Vendor  :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-sm" name="trucking_company_west">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">No Polisi  :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-sm" name="trucking_unitno_west">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Nama Supir :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-sm" name="trucking_driver_west">
												</div>							
											</div>
										</div>	
									</div>
									<div class="col-lg-6">
										<h5>Trucking Area Timur</h5>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Trucking :</label>
												<div class="col-md-8">
													<input id="trucking_east1" name="trucking_east" type="radio" value="1" <?php //if($result['origin']=="CLG") echo "checked"; ?>><span class="radio-label">INTERNAL</span><input id="trucking_east2" name="trucking_east" type="radio" value="2" <?php //if($result['origin']=="CDP") echo "checked"; ?>><span class="radio-label">EXTERNAL</span>
												</div>							
											</div>
										</div>	
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Vendor  :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-sm" name="trucking_company_east">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">No Polisi  :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-sm" name="trucking_unitno_east">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Nama Supir :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-sm" name="trucking_driver_east">
												</div>							
											</div>
										</div>	
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-12">			
										<button type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>	
										<a href="#" class="btn btn-default" onClick="window.history.go(-1); return false;">Back</a>	
									</div>
								</div>
								
							</form>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(window).bind("load", function() {
		$("#planning_id").select2({
			data : <?php echo $all_planning_id; ?>
		});
		
		$('#date').datetimepicker({
			format:'Y-m-d h:i:s'
		});
		
		
	});
	
	$(document).ready(function() {
		$('input[name=trucking_west]').change(function(){
			var res = this.value;
			
			if(res==1){
				$('input[name=trucking_company_west]').val('BCS');
			}
			else $('input[name=trucking_company_west]').val('');
		});
		
		$('input[name=trucking_east]').change(function(){
			var res = this.value;
			
			if(res==1){
				$('input[name=trucking_company_east]').val('BCS');
			}
			else $('input[name=trucking_company_east]').val('');
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
			url: "<?php echo base_url();?>unit_planning/saveData",
				success: function(response) {
					console.log(response);
					alert(response);
					window.open("<?php echo base_url(); ?>dashboard",'_parent');
				},
				error: function(response){
					console.log(response);
					alert(response.responseText);
				}
		});
		return false;
	});
		
		
</script>
