	<div class="page-content-wrapper">
		<div class="page-content">
			<?php //echo $content; ?>
			<table id="table"
				   data-toggle="table"
				   data-toolbar="#toolbar"
				   data-search="true"
				   data-show-refresh="true"
					   data-show-toggle="true"
					   data-show-columns="true"
					   data-show-export="true"
					   data-minimum-count-columns="2"
					   data-show-pagination-switch="true"
					   data-pagination="true"
					   data-page-list="[10, 25, 50, 100, ALL]"
					   data-show-footer="false"
				   data-url="<?php echo base_url();?>dashboard_new/getData">
				<thead>
				<tr>
					<th data-field="no_do">No DO</th>
					<th data-field="nama_kustomer">Customer</th>
					<th data-field="no_unit">No Unit</th>
				</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<script>
	//$(".xcrud-row").on('click',function(){
		//var id = $(this).find("a").attr('data-primary');
		//alert('ok : '+id);
	//});
	$(document).ready(function(){
		var $table = $('#table');
		$table.on('click-row.bs.table', function (row, $element) {
			window.open("<?php echo base_url(); ?>view_detail/getData/no_do/"+$element.no_do,'_blank');
		});
	});
	
</script>
