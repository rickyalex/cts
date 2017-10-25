<!-- js placed at the end of the document so the pages load faster -->
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap-table-develop/dist/bootstrap-table.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery-ui.js"></script>
<script>
	$('.dp').datepicker({ changeMonth: true, changeYear: true, yearRange: "-100:+10" });
	$('.dp').datepicker("option", "dateFormat", "yy-mm-dd" );
		
	$('.dtp').datetimepicker({
		format:'Y-m-d G:i:s'
	});
</script>
<!-- BEGIN FOOTER -->
		<div class="page-footer">
			<div class="page-footer-inner">
			2016 &copy; BCS Logistics
			</div>
			<div class="scroll-to-top">
				<i class="icon-arrow-up"></i>
			</div>
		</div>
	</body>
</html>
