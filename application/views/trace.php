<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Monitoring <small>By DO</small></h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-lg-12">
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								Trace DO
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">
							<?php $attrib = array('class' => 'form-horizontal'); echo form_open("trace", $attrib);?>
							<div class="form-group">
								<label class="control-label col-md-2">No DO :</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="do_no">
								</div>							
							</div>					
							<div class="modal-footer">
									<button type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>								
							</div>
							<?php echo form_close();?> 			
							</div>
						</div>
					</div>
					<!-- /.table-responsive -->
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
</div>
</div>
