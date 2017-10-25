<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>Container Tracking System</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/select2.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
        
	
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url();?>assets/css/components-rounded.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/light.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url();?>assets/js/metronic.js"></script>
	<script src="<?php echo base_url();?>assets/js/layout.js"></script>
	<script>
		jQuery(document).ready(function() {       
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		});
	</script>
	
	<script>
		$(document).ready(function() {
			// Create two variable with the names of the months and days in an array
			var monthNames = [ "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December" ]; 
			var dayNames= ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]

			// Create a newDate() object
			var newDate = new Date();
			// Extract the current date from Date object
			newDate.setDate(newDate.getDate());
			// Output the day, date, month and year   
			$('#Date').html(dayNames[newDate.getDay()] + " " + newDate.getDate() + ' ' + monthNames[newDate.getMonth()] + ' ' + newDate.getFullYear());

			setInterval( function() {
				// Create a newDate() object and extract the seconds of the current time on the visitor's
				var seconds = new Date().getSeconds();
				// Add a leading zero to seconds value
				$("#sec").html(( seconds < 10 ? "0" : "" ) + seconds);
				},1000);
				
			setInterval( function() {
				// Create a newDate() object and extract the minutes of the current time on the visitor's
				var minutes = new Date().getMinutes();
				// Add a leading zero to the minutes value
				$("#min").html(( minutes < 10 ? "0" : "" ) + minutes);
				},1000);
				
			setInterval( function() {
				// Create a newDate() object and extract the hours of the current time on the visitor's
				var hours = new Date().getHours();
				// Add a leading zero to the hours value
				$("#hours").html(( hours < 10 ? "0" : "" ) + hours);
				}, 1000);	
		});
	</script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed page-sidebar-closed-hide-logo ">
<!-- BEGIN HEADER -->
	<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
		<div class="page-header-inner">
		<!-- BEGIN LOGO -->
			<div class="page-logo">
				<a href="<?php echo base_url();?>">
				<img src="<?php echo base_url();?>assets/images/logo-bcs.png" alt="logo" class="logo-default" width="180px" height="auto"/>
				</a>
				<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
				</div>
			</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
			<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
			</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN PAGE ACTIONS -->
		<!-- DOC: Remove "hide" class to enable the page header actions -->
			<!--<div class="page-actions">
			</div>-->
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
			<div class="page-top">
			<!-- BEGIN TOP NAVIGATION MENU -->
				
			<!-- END TOP NAVIGATION MENU -->
			</div>
		<!-- END PAGE TOP -->
		</div>
	<!-- END HEADER INNER -->
	</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
