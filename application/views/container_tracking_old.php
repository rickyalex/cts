<style>
	#tonage:hover,
	#ritage:hover{
		background-color: #ffe680 !important;
		cursor: pointer;
	}
	
	.table-hover >tbody >tr:hover>td,
	.table-hover>tbody>tr:hover{
		background-color: #ffe680 !important;
	}
	
	.xcrud .btn-group{
		white-space: none !important;
	}
	
	h3 {
		margin:0px !important;
		padding: 5px;
	}
	
	.inline{
		display:inline-block;
	}
	
	#Date{
		text-align: center;
	}
	
	.clock ul {
		margin: 0 auto;
		padding: 0px;
		list-style: none;
		text-align: center;
	}

	.clock ul li {
		display: inline;
		font-size: 1em;
		text-align: center;
	}
	
	.bars.pull-left{
		height: auto !important;
		width: auto !important;
	}
</style>
<div class="page-content-wrapper">
	<div class="page-content">
		<div class="xcrud-container">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12">
					<div class="portlet box">
						<div class="portlet-body">
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<table id="table"
										   data-toolbar="#toolbar"
										   data-toggle="table"
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
										   data-url="<?php echo base_url();?>trace_container/getData/container_no/<?php echo $container_no; ?>">
										<thead>
											<tr>
												<th data-field="container_no">Container No</th>
												<th data-field="equipment_no">Equipment No</th>
												<th data-field="size">Container Size</th>
												<th data-field="type">Container Type</th>
												<th data-field="voyage_no">No SJAB</th>
												<th data-field="origin">Origin</th>
												<th data-field="customer_name">Customer</th>
												<th data-field="status">Status</th>
												<th data-field="last_position">Last Position</th>
												<th data-field="depart_time">Last Updated</th>
												<th data-field="date">Date</th>
											</tr>
										</thead>
									</table><!-- </table> -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- .page-content -->
</div><!-- .page-content-wrapper -->

<script>
	$(document).ready(function(){
		var $table = $('#table');
		var $tonage = $('#tonage');
		var $ritage = $('#ritage');
		var $add = $('#add');
		//$table.on('dbl-click-row.bs.table', function (row, $element) {
			//window.open("<?php echo base_url(); ?>voyage/entryTracking/voyage_no/"+$element.voyage_no,'_parent');
		//});
		$tonage.on('click', function () {
			window.open("<?php echo base_url(); ?>view_detail/viewTonage/",'_parent');
		});
		$ritage.on('click', function () {
			window.open("<?php echo base_url(); ?>view_detail/viewRitage/",'_parent');
		});
		$add.on('click', function () {
			window.open("<?php echo base_url(); ?>voyage/addVoyage/",'_parent');
		});
	});
	
	function viewVoyage(voyage_no){
		window.open("<?php echo base_url(); ?>voyage/viewVoyage/voyage_no/"+voyage_no,'_parent');
	}
	
	function editVoyage(voyage_no){
		window.open("<?php echo base_url(); ?>voyage/editVoyage/voyage_no/"+voyage_no,'_parent');
	}
	
	function entryTracking(voyage_no){
		window.open("<?php echo base_url(); ?>voyage/entryTracking/voyage_no/"+voyage_no,'_parent');
	}
	
	function remove(voyage_no){
		//alert(id);
		$.ajax({
			type: "POST",
			url: "<?php echo base_url();?>voyage/removeVoyage/voyage_no/"+voyage_no,
			success: function(s){
				alert('Delete Success');
				location.reload();
			}
			,
			error: function(e){
				alert('Delete Error');
			}
		});
	};
	
</script>
