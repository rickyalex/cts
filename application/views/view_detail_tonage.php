<style>
	.inline{
		display:inline-block;
	}
</style><!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-dateFormat.min.js"></script>

<script>
	$(document).ready(function(){
		//$('#dp').datepicker();
		//$('#dp').datepicker("option", "dateFormat", "yy-mm-dd" );
		//$('#dp').val("");
		
		<?php
			if(isset($from)&&isset($to)) {
		?>
			$('#from').datepicker("setDate", new Date(<?php echo $from[0]; ?>,<?php echo $from[1]-1; ?>,<?php echo $from[2]; ?>));
			$('#to').datepicker("setDate", new Date(<?php echo $to[0]; ?>,<?php echo $to[1]-1; ?>,<?php echo $to[2]; ?>));
		<?php
			}
			else{
		?>
			$('#from').datepicker("setDate","<?php echo Date('Y-m-d'); ?>");
			$('#to').datepicker("setDate","<?php echo Date('Y-m-d'); ?>");
		<?php
			}
		?>
		
		$(function() {
			$( "#from" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 3,
				onClose: function( selectedDate ) {
					$( "#from" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
					$( "#to" ).datepicker( "option", "minDate", selectedDate );
				}
			});
			$( "#to" ).datepicker({
				defaultDate: "+1w",
				changeMonth: true,
				numberOfMonths: 3,
				onClose: function( selectedDate ) {
					$( "#to" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
					$( "#from" ).datepicker( "option", "maxDate", selectedDate );
				}
			});
		});
		
		$('button').click(function(e){
			e.preventDefault();
			var from = $( "#from" ).val();
			var to = $( "#to" ).val();
			window.open("<?php echo base_url(); ?>view_detail/viewTonage/from/"+from+"/to/"+to,'_parent');
		});
		
		
	});
</script>
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
				<h2>Tonage Report</h2>
				<div class="row" style="padding:10px 0">
					<div class="col-sm-12 col-md-12 col-xs-12">
						<form class="form-inline">
							<div class="form-group">
								<label for="from">From:</label>
								<input type="text" class="input-small form-control" id="from" name="from" value="<?php echo Date('d/m/Y'); ?>">
							</div>
							<div class="form-group">
								<label for="to">To:</label>
								<input type="text" class="input-small form-control" id="to" name="to" value="<?php echo Date('d/m/Y'); ?>">
							</div>
							<div class="form-group">
								<button class="btn">Submit</button>
							</div>
						</form>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 col-md-4" style="margin:10px 0;">
						<div style="padding:10px;border:1px solid #ccc">
							<div class="row">
								<div class="col-xs-2 col-sm-2 col-md-2">
									<i class="fa fa-truck" style="font-size:32px;margin-top:10px"></i>
								</div>
								<div class="col-xs-10 col-sm-10 col-md-10">
									<div style="text-align:center">Total</div>
									<div class="clearfix"></div>
									<div style="text-align:center"><b><?php echo $total; ?></b></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="xcrud-list-container">
					<table class="table table-bordered table-hover table-responsive">
						<thead class="portlet box green-haze">
							<tr><td width="5%"><b>No</b></td><td><b>No DO</b></td><td><b>No Unit</b></td><td><b>Tgl Transaksi</b></td><td><b>Tonage</b></td></tr>
						</thead>
						<tbody>
							
							<?php 
								if(count($detail)>=1){
									$x=1;
									foreach($detail as $det){ ?>
										<tr><td><?php echo $x; ?></td>
										<?php foreach($det as $d){ 
							?>
								<td><?php echo $d; ?></td>
							<?php 
										}
										$x++;
										?>
									</tr>
									<?php
									}
								}
								else { ?>
								<td style="text-align:center" colspan="5">No Data</td>
							<?php
								}
							?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<button name="back" class="btn btn-primary" onClick="history.back(1);">Back</button>			
	</div>
</div>
