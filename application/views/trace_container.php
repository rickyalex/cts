<div class="page-content-wrapper">
	<div class="page-content">
		<div class="xcrud-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="portlet box blue-sharp">
						<div class="portlet-title">
							<div class="caption">
								Trace Container
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<?php $attrib = array('class' => 'form-horizontal'); echo form_open("trace_container", $attrib);?>
							<div class="form-group">
								<label class="control-label col-md-2">Container No :</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="container_no">
								</div>							
							</div>					
							<div class="modal-footer">
									<button type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>								
							</div>
							<?php echo form_close();?> 			
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
