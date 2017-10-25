<!DOCTYPE html>
<html lang="en">
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title><?php echo isset($title) ? $title : 'KempenK';?></title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="<?php echo base_url();?>assets/css/components-rounded.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/light.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo base_url();?>assets/js/metronic.js"></script>
	<script src="<?php echo base_url();?>assets/js/layout.js"></script>
	<script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">var base_url = '<?php echo base_url();?>';</script>
	<script>
		jQuery(document).ready(function() {       
		Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
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
				<a href="index.html">
				<img src="<?php echo base_url();?>assets/images/logo-light.png" alt="logo" class="logo-default"/>
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
			<div class="page-actions">
			</div>
		<!-- END PAGE ACTIONS -->
		<!-- BEGIN PAGE TOP -->
			<div class="page-top">
			<!-- BEGIN TOP NAVIGATION MENU -->
				<div class="top-menu">
					<ul class="nav navbar-nav pull-right">
						<li class="separator hide">
						</li>
						<li class="separator hide">
						</li>
						<li class="separator hide">
						</li>
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<li class="dropdown dropdown-user dropdown-dark">
							<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username username-hide-on-mobile">
							<?php echo $this->session->userdata('name');?> </span>
						<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
							<img alt="" class="img-circle" src="<?php echo base_url();?>assets/images/avatar9.jpg"/>
							</a>
							<ul class="dropdown-menu dropdown-menu-default">
								<li>
									<a href="extra_profile.html">
									<i class="icon-user"></i> My Profile </a>
								</li>
								<li>
									<a href="login.html">
									<i class="icon-key"></i> Log Out </a>
								</li>
							</ul>
						</li>
					<!-- END USER LOGIN DROPDOWN -->
					</ul>
				</div>
			<!-- END TOP NAVIGATION MENU -->
			</div>
		<!-- END PAGE TOP -->
		</div>
	<!-- END HEADER INNER -->
	</div>
<!-- END HEADER -->
<div class="clearfix">
</div>