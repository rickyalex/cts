<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN PAGE HEADER-->
			<!-- BEGIN PAGE HEAD -->
			<div class="page-head">
				<!-- BEGIN PAGE TITLE -->
				<div class="page-title">
					<h1>Detail Trucking Contract <small>Trucking Contract</small></h1>
				</div>
				<!-- END PAGE TITLE -->
			</div>
			<!-- END PAGE HEAD -->
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-6">
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Master Contract
							</div>
						</div>
						<div class="portlet-body form">
							<form class="form-horizontal" role="form">
								<div class="form-body">
									<div class="form-group">
										<label class="col-md-4 control-label">Customer</label>
										<div class="col-md-8">
											<input name="customer" class="form-control" value="<?php echo $test['customer']?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Contract Number</label>
										<div class="col-md-8">
											<input name="pic" class="form-control" value="<?php echo $test['pic']?>" readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Contract Title</label>
										<div class="col-md-8">
											<input name="address" class="form-control" value="<?php echo $test['address']?>" readonly>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="form-actions">
						<a href="<?php echo base_url();?>contract/trucking" class="btn btn-danger"><i class="fa fa-times"></i> Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>