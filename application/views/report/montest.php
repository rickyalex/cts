	<div class="page-content-wrapper">
		<div class="page-content">
			<link href="<?php echo base_url();?>xcrud/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url();?>xcrud/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url();?>xcrud/plugins/jcrop/jquery.Jcrop.min.css" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url();?>xcrud/plugins/timepicker/jquery-ui-timepicker-addon.css" rel="stylesheet" type="text/css" />
			<link href="<?php echo base_url();?>xcrud/themes/bootstrap/xcrud.css" rel="stylesheet" type="text/css" /><div class="xcrud">
			<div style="display:none;" class="xcrud-main-tab">Order Monitoring<small> </small><span class="xcrud-toggle-show xcrud-toggle-down"><i class="glyphicon glyphicon-chevron-down"></i></span></div>    
				<div class="xcrud-container">
							<div class="xcrud-ajax">
									<input type="hidden" class="xcrud-data" name="key" value="823145ee3fbf8c2c7a310ede586f4a6745cb7e98" /><input type="hidden" class="xcrud-data" name="orderby" value="" /><input type="hidden" class="xcrud-data" name="order" value="asc" /><input type="hidden" class="xcrud-data" name="start" value="0" /><input type="hidden" class="xcrud-data" name="limit" value="10" /><input type="hidden" class="xcrud-data" name="instance" value="00e346c478b2f9ffabb1589afc3aef0a181a4a10" /><input type="hidden" class="xcrud-data" name="task" value="list" />
									<h2>Order Monitoring<small> </small>
									<span class="xcrud-toggle-show xcrud-toggle-up">
									<i class="glyphicon glyphicon-chevron-up"></i></span></h2>        <div class="xcrud-top-actions">
															<div class="clearfix"></div>
							</div>
							<div class="xcrud-list-container">
								<?php echo $table; ?>
							</div>
					</div>
			</div>
			<button name="back" class="btn btn-primary" onClick="history.back(1);">Back</button>			
		</div>
	</div>
</div>
