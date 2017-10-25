<style>
	#tonage:hover,
	#ritage:hover{
		background-color: #ffe680 !important;
		cursor: pointer;
	}
	
	.table-hover >tbody >tr:hover>td,
	.table-hover>tbody>tr:hover{
		background-color: #ffe680 !important;
		cursor: pointer;
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
					<div class="portlet box green-haze">
						<div class="portlet-title">
							<div class="caption">
								Unit Planning
							</div>
							<div class="tools">
							</div>
						</div>
						<div class="portlet-body">	
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div id="toolbar">
										<button id="add" class="btn btn-success">
											<i class="glyphicon glyphicon-add"></i> Add
										</button>
									</div>
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
										   data-url="<?php echo base_url();?>dashboard/getData">
										<thead>
											<tr>
												<th data-field="voyage_no">ID</th>
												<th data-field="origin">Vendor (Barat)</th>
												<th data-field="customer_name">No Polisi (Barat)</th>
												<th data-field="voyage_status">Driver (Barat)</th>
												<th data-field="origin">Vendor (Timur)</th>
												<th data-field="customer_name">No Polisi (Timur)</th>
												<th data-field="voyage_status">Driver (Timur)</th>
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
		var $add = $('#add');
		$table.on('click-row.bs.table', function (row, $element) {
			window.open("<?php echo base_url(); ?>view_detail/getData/no_do/"+$element.no_do,'_parent');
		});
		$add.on('click', function () {
			window.open("<?php echo base_url(); ?>unit_planning/addPlanning/",'_parent');
		});
	});
	
</script>
