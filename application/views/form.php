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
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="xcrud-container">
			<div class="row">
				<div class="col-lg-12">
					<?php if($mode=="view") { ?>
					<div class="row">
						<div class="col-lg-12">
							<?php if($result['flag_print_sjab']=='N') { ?><a id="button_print_sjab" href="#" class="btn btn-primary">Print SJAB</a><?php } ?>
							<?php if($result['flag_print_sjr']=='N') { ?><a id="button_print_sjr" href="#" class="btn btn-success">Print SJ Railway</a><?php } ?>	
							<?php if($result['flag_print_eir']=='N') { ?><a id="button_print_eir" href="#" class="btn btn-warning">Print EIR</a><?php } ?>	
						</div>
					</div>
					<br>
					<?php } ?>
					<div class="portlet box blue-sharp">
						<div class="portlet-title">
							<div class="caption">
								Voyage Data
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<form class='form_add' class='navbar-form'>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">No SJAB :</label>
												<div class="col-md-8">
													<input id="voyage_no" type="text" class="form-control input-xs" name="voyage_no" value="<?php if($mode=="update" || $mode=="view") echo $result['voyage_no']; else echo $voyage_no; ?>" readonly>
												</div>							
											</div>	
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Date :</label>
												<div class="col-md-8">
													<input type="text" class="dtp form-control" name="date" id="date">
												</div>							
											</div>	
										</div>
										<?php /*<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">In / Out :</label>
												<div class="col-md-8">
													
													<input id="in_out1" name="in_out" type="radio" value="IN"><span class="radio-label">IN</span><input id="in_out2" name="in_out" type="radio" value="OUT"><span class="radio-label">OUT</span>
												</div>							
											</div>	
										</div> */ ?>
									</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Service :</label>
												<div class="col-md-8">
													<select id="service_type" name="service_type" class="form-control" data-placeholder="Select an option">
														<option></option>
														<option value="D2D" <?php if($mode=="update" || $mode=="view") if($result['service_type'] == "D2D") echo "selected"; ?>>Door to Door</option>
														<option value="D2S" <?php if($mode=="update" || $mode=="view") if($result['service_type'] == "D2S") echo "selected"; ?>>Door to Station</option>
														<option value="S2D" <?php if($mode=="update" || $mode=="view") if($result['service_type'] == "S2D") echo "selected"; ?>>Station to Door</option>
														<option value="S2S" <?php if($mode=="update" || $mode=="view") if($result['service_type'] == "S2S") echo "selected"; ?>>Station to Station</option>
													</select>
												</div>							
											</div>	
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Tagihan :</label>
												<div class="col-md-8">
													
													<input id="origin1" name="origin" type="radio" value="CLG" <?php if($mode=="update" || $mode=="view") echo "checked"; elseif(USER_NAME == 'ricky alexander') if($result['origin'] == "CLG") echo "checked"; ?> ><span class="radio-label">CLG</span><input id="origin2" name="origin" type="radio" value="CDP" <?php if($mode=="update" || $mode=="view") echo "checked"; elseif(USER_NAME == 'cikarang') if($result['origin'] == "CLG") echo "checked"; ?> ><span class="radio-label">CDP</span><input id="origin3" name="origin" type="radio" value="SBY" <?php if($mode=="update" || $mode=="view") echo "checked"; elseif(USER_NAME == 'surabaya') if($result['origin'] == "CLG") echo "checked"; ?> ><span class="radio-label">SBY</span>
												</div>							
											</div>	
										</div>
									</div>
									
								</div>
								<hr>
								
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Pengirim :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="shipper_name" value="<?php if($mode=="update" || $mode=="view") echo $result['shipper_name']; ?>">
												</div>							
											</div>	
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Gudang :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="shipper_warehouse" value="<?php if($mode=="update" || $mode=="view") echo $result['shipper_warehouse']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Telp :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="shipper_phone" value="<?php if($mode=="update" || $mode=="view") echo $result['shipper_phone']; ?>">
												</div>							
											</div>
										</div>		
									</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Customer :</label>
												<div class="col-md-8">
													<input id="voyage_no" type="text" class="form-control input-xs" name="customer_name" value="<?php if($mode=="update" || $mode=="view") echo $result['customer_name']; ?>">
												</div>							
											</div>	
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Gudang :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="customer_warehouse" value="<?php if($mode=="update" || $mode=="view") echo $result['customer_warehouse']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Telp :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="customer_phone" value="<?php if($mode=="update" || $mode=="view") echo $result['customer_phone']; ?>">
												</div>							
											</div>
										</div>		
									</div>
									
								</div>
								<hr>
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
													<input type="text" class="form-control input-xs" name="trucking_company_west" value="<?php if($mode=="update" || $mode=="view") echo $result['trucking_company_west']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">No Polisi  :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="trucking_unitno_west" value="<?php if($mode=="update" || $mode=="view") echo $result['trucking_unitno_west']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Nama Supir :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="trucking_driver_west" value="<?php if($mode=="update" || $mode=="view") echo $result['trucking_driver_west']; ?>">
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
													<input type="text" class="form-control input-xs" name="trucking_company_east" value="<?php if($mode=="update" || $mode=="view") echo $result['trucking_company_east']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">No Polisi  :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="trucking_unitno_east" value="<?php if($mode=="update" || $mode=="view") echo $result['trucking_unitno_east']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Nama Supir :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="trucking_driver_east" value="<?php if($mode=="update" || $mode=="view") echo $result['trucking_driver_east']; ?>">
												</div>							
											</div>
										</div>	
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Container Owner :</label>
												<div class="col-md-8">
													<input id="owner1" name="container_owner" type="radio" value="1" <?php if($mode=="update" || $mode=="view") if($result['container_owner']=="1") echo "checked"; ?>><span class="radio-label">BCS</span><input id="owner2" name="container_owner" type="radio" value="2" <?php if($mode=="update" || $mode=="view") if($result['container_owner']=="2") echo "checked"; ?>><span class="radio-label">Vendor</span>
												</div>							
											</div>	
										</div>
										<div class="container_bcs">
											<div class="row">
												<div class="form-group">
													<label class="control-label col-md-4">Container No :</label>
													<div class="col-md-8">
														<select id="container_no" name="container_no_bcs" class="form-control" style="width:300px" data-placeholder="Select Container" <?php //if(($mode=='update' && $editable=='N') || $isApprover==1) echo "disabled"; ?>>
															<?php if($mode=="update" || $mode=="view") echo $selected_container; else echo "<option></option>"; ?>
														</select>
														
													</div>							
												</div>
											</div>
										</div>	
										<div class="container_vendor">
											<div class="row">
												<div class="form-group">
													<label class="control-label col-md-4">Container No :</label>
													<div class="col-md-8">
														<input type="text" class="form-control input-xs" name="container_no_vendor" value="<?php if($mode=="update" || $mode=="view") echo $result['container_no']; ?>">
													</div>							
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="control-label col-md-4">Container Type :</label>
													<div class="col-md-8">
														<input type="text" class="form-control input-xs" name="container_type" value="<?php if($mode=="update" || $mode=="view") echo $result['container_type']; ?>">
													</div>							
												</div>
											</div>
											<div class="row">
												<div class="form-group">
													<label class="control-label col-md-4">Container Size :</label>
													<div class="col-md-8">
														<input id="container_size1" name="container_size" type="radio" value="20 ft" <?php if($mode=="update" || $mode=="view") if($result['container_size']=="20 ft") echo "checked"; ?>><span class="radio-label">20"</span><input id="container_size2" name="container_size" type="radio" value="40 ft" <?php if($mode=="update") if($result['container_size']=="40 ft") echo "checked"; ?>><span class="radio-label">40"</span>
													</div>							
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Cargo :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="cargo_description" value="<?php if($mode=="update" || $mode=="view") echo $result['cargo_description']; ?>">
												</div>							
											</div>	
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Qty :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="cargo_qty" value="<?php if($mode=="update" || $mode=="view") echo $result['cargo_qty']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Weight/Volume (kg):</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="cargo_weight" value="<?php if($mode=="update" || $mode=="view") echo $result['cargo_weight']; ?>">
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Seal No :</label>
												<div class="col-md-8">
													<input type="text" class="form-control input-xs" name="seal_no" value="<?php if($mode=="update" || $mode=="view") echo $result['seal_no']; ?>">
												</div>							
											</div>
										</div>
									</div>
								</div>
								<?php if(USER_ID==2) { ?>
								<hr>
								<div class="row">
									<div class="col-lg-6">
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Flag Print SJAB :</label>
												<div class="col-md-8">
													<input id="flag_print_sjab1" name="flag_print_sjab" type="radio" value="N" <?php if($mode=="update" || $mode=="view") if($result['flag_print_sjab']=="N") echo "checked"; ?>><span class="radio-label">NO</span><input id="flag_print_sjab2" name="flag_print_sjab" type="radio" value="Y" <?php if($mode=="update" || $mode=="view") if($result['flag_print_sjab']=="Y") echo "checked"; ?>><span class="radio-label">YES</span>
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Flag Print SJR :</label>
												<div class="col-md-8">
													<input id="flag_print_sjr1" name="flag_print_sjr" type="radio" value="N" <?php if($mode=="update" || $mode=="view") if($result['flag_print_sjr']=="N") echo "checked"; ?>><span class="radio-label">NO</span><input id="flag_print_sjr2" name="flag_print_sjr" type="radio" value="Y" <?php if($mode=="update" || $mode=="view") if($result['flag_print_sjr']=="Y") echo "checked"; ?>><span class="radio-label">YES</span>
												</div>							
											</div>
										</div>
										<div class="row">
											<div class="form-group">
												<label class="control-label col-md-4">Flag Print EIR :</label>
												<div class="col-md-8">
													<input id="flag_print_eir1" name="flag_print_eir" type="radio" value="N" <?php if($mode=="update" || $mode=="view") if($result['flag_print_eir']=="N") echo "checked"; ?>><span class="radio-label">NO</span><input id="flag_print_eir2" name="flag_print_eir" type="radio" value="Y" <?php if($mode=="update" || $mode=="view") if($result['flag_print_eir']=="Y") echo "checked"; ?>><span class="radio-label">YES</span>
												</div>							
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								
								<?php if($mode=="view") { ?>
								<hr>
								<div class="row">
									<div class="col-lg-12">			
										<table id="table"
											   data-toggle="table"
											   data-search="true"
											   data-show-refresh="false"
											   data-show-toggle="false"
											   data-show-columns="false"
											   data-show-export="false"
											   data-minimum-count-columns="2"
											   data-show-pagination-switch="false"
											   data-pagination="true"
											   data-page-list="[10, 25, 50, 100, ALL]"
											   data-show-footer="false"
											   data-url="<?php echo base_url();?>voyage/getHistory/voyage_no/<?php echo $voyage_no; ?>">
											<thead>
												<tr>
													<th data-field="id">ID</th>
													<th data-field="status">Status</th>
													<th data-field="last_position">Last Position</th>
													<th data-field="depart_time">Last Updated</th>
													<th data-field="action">Action</th>
												</tr>
											</thead>
										</table><!-- </table> -->
									</div>
								</div>
								<?php }else{ ?> 
								<hr>
								<div class="row">
									<div class="col-lg-12">			
										<button id="button_submit" type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>	
									</div>
								</div>
								<?php } ?>
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
		
		$('div.container_bcs').show();
		$('div.container_vendor').hide();
		
		<?php if($mode == "new"){ ?>
		$("#planning_id").select2({
			data : <?php echo $all_planning_id; ?>
		});
		
		$("#container_no").select2({
			data : <?php echo $all_container_id; ?>
		});
		<?php } ?>
		
		$('select').select2({
			width: '100%'
		});
		
		
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
		
		$('input[name=container_owner]').change(function(){
			var res = this.value;
			
			if(res==1){
				$('div.container_bcs').show();
				$('div.container_vendor').hide();
			}
			else {
				$('div.container_bcs').hide();
				$('div.container_vendor').show();
			}
		});
	});
	
	function removeTracking(id){
		//alert(id);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>voyage/removeTracking/id/"+id,
			success: function(s){
				alert('Delete Success');
				location.reload();
			}
			,
			error: function(e){
				alert('Delete Error');
			}
		});
	};
	
	<?php if($mode=="view") { ?>
	$('#button_print_sjab').on('click',function(e){
		
		var voyage_no = '<?php echo $result['voyage_no']; ?>';
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>voyage/print_sjab/voyage_no/"+voyage_no,
			success: function(s){
				window.open('<?php echo "http://cilegon.bcs-logistics.co.id:8080/jasperserver/flow.html?_flowId=viewReportFlow&standAlone=true&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fprint_sjab&v_no=".$voyage_no."&output=pdf"; ?>','_blank');
				
			}
			,
			error: function(e){
				alert('Print Error');
			}
		});
		
		
	});
	
	$('#button_print_sjr').on('click',function(e){
		
		var voyage_no = '<?php echo $result['voyage_no']; ?>';
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>voyage/print_sjr/voyage_no/"+voyage_no,
			success: function(s){
				window.open('<?php echo "http://cilegon.bcs-logistics.co.id:8080/jasperserver/flow.html?_flowId=viewReportFlow&standAlone=true&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fprint_sj&v_no=".$voyage_no."&output=pdf"; ?>','_blank');
			}
			,
			error: function(e){
				alert('Print Error');
			}
		});
	});
	
	$('#button_print_eir').on('click',function(e){
		
		var voyage_no = '<?php echo $result['voyage_no']; ?>';
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>voyage/print_eir/voyage_no/"+voyage_no,
			success: function(s){
				window.open('<?php echo "http://cilegon.bcs-logistics.co.id:8080/jasperserver/flow.html?_flowId=viewReportFlow&standAlone=true&_flowId=viewReportFlow&ParentFolderUri=%2Freports&reportUnit=%2Freports%2Fprint_eir&v_no=".$voyage_no."&output=pdf"; ?>','_blank');
			}
			,
			error: function(e){
				alert('Print Error');
			}
		});
	});
	
	<?php } ?>
	
	//form submit menggunakan FormData harus menggunakan browser versi IE 10+, Firefox 4.0+, Chrome 7+, Safari 5+, Opera 12+
	$('#button_submit').on('click',function(e){
		e.preventDefault();
		var form = $(".form_add")[0];
		var formData = new FormData(form);
		var url = "<?php if($mode=="update") { echo base_url()."voyage/updateData/voyage_no/".$voyage_no; } else { echo base_url()."voyage/saveData"; } ?>";
		console.log(formData);
		$.ajax({
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			url: url,
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
