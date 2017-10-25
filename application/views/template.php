<!doctype html>
    <html>
        <head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta name="description" content="">
			<meta name="author" content="">
			<title>Sistem Informasi Bisnis</title>
			<!-- Bootstrap Core CSS -->
			<link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
			<!-- MetisMenu CSS -->
			<link href="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.css');?>" rel="stylesheet">
			<!-- Custom CSS -->
			<link href="<?php echo base_url('assets/dist/css/sb-admin-2.css');?>" rel="stylesheet">
			<!-- Custom Fonts -->
			<link href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
        </head>
        <body>
			<div id="wrapper">
				<!-- Navigation -->
				<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
					<div>
					<!--HEADER-->
					<?php echo $_header;?>
					</div>
					<div id="sidebar">
					<!--SIDEBAR MENU-->
					<?php echo $_sidebar;?>
					</div>
				</nav>
				<!--CONTENT-->
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<?php echo $_content;?>
						</div>
					</div>
				</div>
			</div>
			<!-- Core Scripts - Include with every page -->
			<!-- jQuery -->
			<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery-ui-1.11.3.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery-ui-1.11.3.min.js');?>"></script>
			<!-- Bootstrap Core JavaScript -->
				<script src="<?php echo base_url();?>xcrud/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>		
			<!--
			<script src="<?php //echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
			-->
			<!-- Metis Menu Plugin JavaScript -->
			<script src="<?php echo base_url('assets/bower_components/metisMenu/dist/metisMenu.min.js');?>"></script>
			<!-- Custom Theme JavaScript -->
			<script src="<?php echo base_url('assets/dist/js/sb-admin-2.js');?>"></script>
        </body>
    </html>
