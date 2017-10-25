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
    
    #available_capacity, #next_delivery{
        font-family: 'Source Sans Pro','Helvetica Neue','Helvetica','Arial','sans-serif' !important;
        height:100%;
    }
    
    #booked_order:hover{
        background-color: #ffe680;
        cursor: pointer;
    }
    
    #available_capacity h4.text,#available_capacity h4.value,
    #next_delivery h4.text, #next_delivery h4.value,
    #booked_order h4.text, #booked_order h4.value{
        font-size:24px !important;
        text-align: center;
        vertical-align:middle;
    }
    
    #available_capacity h4.text, #next_delivery h4.text, #booked_order h4.text {
        padding: 0 10px;
    }
    
    #available_capacity h4.value, #next_delivery h4.value, #booked_order h4.value {
        padding: 10px 0;
    }
    
    @media (max-width: 768px){
        #available_capacity h4.text,#available_capacity h4.value,
        #next_delivery h4.text, #next_delivery h4.value,
        #booked_order h4.text, #booked_order h4.value{
            font-size:12px !important;
            text-align: center;
            vertical-align:middle;
        }
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
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <h4>Welcome, <?php echo USERNAME; ?></h4>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <i class="fa fa-calendar" style="font-size:32px;margin-top:10px"></i>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <div class="clock">
                                                    <div id="Date"></div>
                                                    <ul>
                                                        <li id="hours"></li>
                                                        <li id="point">:</li>
                                                        <li id="min"></li>
                                                        <li id="point">:</li>
                                                        <li id="sec"></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if($iscustomer=="Y"){ ?>
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="cdp_voyage" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <i class="fa fa-train" style="font-size:32px;margin-top:10px"></i>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <div style="text-align:center">On Progress Orders</div>
                                                <div class="clearfix"></div>
                                                <div style="text-align:center"><b><?php echo $orders; ?></b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="cdp_voyage" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <i class="fa fa-edit" style="font-size:32px;margin-top:10px"></i>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <div style="text-align:center">Outstanding Complaints</div>
                                                <div class="clearfix"></div>
                                                <div style="text-align:center"><b><?php echo $complaints; ?></b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } else {?>
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="cdp_voyage" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <i class="fa fa-train" style="font-size:32px;margin-top:10px"></i>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <div style="text-align:center">Waiting for Operation</div>
                                                <div class="clearfix"></div>
                                                <div style="text-align:center"><b><?php echo $waiting; ?></b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="cdp_voyage" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <i class="fa fa-edit" style="font-size:32px;margin-top:10px"></i>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <div style="text-align:center">On Progress</div>
                                                <div class="clearfix"></div>
                                                <div style="text-align:center"><b><?php echo $on_progress; ?></b></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="booked_order" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <h4 class="text"><b>Booked Order</b></h4>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <h4 class="value"><b><?php echo $booked_order; ?> TEUS</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="available_capacity" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <h4 class="text"><b>Available Capacity</b></h4>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <h4 class="value"><b><?php echo $available_capacity; ?> TEUS</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-4" style="margin-top:5px;">
                                    <div id="next_delivery" style="padding:10px;border:1px solid #ccc">
                                        <div class="row">
                                            <div class="col-xs-2 col-sm-2 col-md-2">
                                                <h4 class="text"><b>Monthly Order</b></h4>
                                            </div>
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                <h4 class="value"><b><?php echo $total_order; ?> TEUS</b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            		
                            <div class="row">
                                <div class="col-md-4">
                                    <div style="padding: 10px;margin: 15px 1px 15px 1px;border:1px solid #ddd">
                                        <h4 class="centered">Container Status</h4>
                                        <div id="pie-chart1" ></div>
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-md-4">
                                    <div style="padding: 10px;margin: 15px 1px 15px 1px;border:1px solid #ddd">
                                        <h4 class="centered">Utilization By Customer</h4>
                                        <div id="pie-chart2" ></div>
                                    </div><!-- /.box -->
                                </div>
                                <div class="col-md-4">
                                    <div style="padding: 10px;margin: 15px 1px 15px 1px;border:1px solid #ddd">
                                        <h4 class="centered">Tracked Containers </h4>
                                        <div id="pie-chart3" ></div>
                                    </div><!-- /.box -->
                                </div>

                            </div>
                            <?php } ?>
                            <?php /*
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
                              <th data-field="voyage_no">No SJAB</th>
                              <th data-field="origin">Origin</th>
                              <th data-field="customer_name">Customer</th>
                              <th data-field="status">Status</th>
                              <th data-field="last_position">Last Position</th>
                              <th data-field="remarks">Remarks</th>
                              <th data-field="depart_time">Last Updated</th>
                              <th data-field="date">Date</th>
                              <th data-field="action">Action</th>
                              </tr>
                              </thead>
                              </table><!-- </table> -->
                              </div>
                              </div>
                             */ ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .page-content -->
</div><!-- .page-content-wrapper -->
<script src="<?php echo base_url(); ?>assets/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/highcharts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/modules/exporting.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/highcharts/themes/grid-light.js" type="text/javascript"></script>	
<script>
    $(document).ready(function () {
        var $table = $('#table');
        var $booked_order = $('#booked_order');
        $booked_order.on('click', function () {
            window.open("<?php echo base_url(); ?>order_tracking/viewBookedOrder/schedule/<?php echo $next_delivery_schedule; ?>", '_parent');
        });
        var $add = $('#add');
        $add.on('click', function () {
            window.open("<?php echo base_url(); ?>voyage/addVoyage/", '_parent');
        });
        
        
    });

    function viewVoyage(voyage_no) {
        window.open("<?php echo base_url(); ?>voyage/viewVoyage/voyage_no/" + voyage_no, '_parent');
    }

    function editVoyage(voyage_no) {
        window.open("<?php echo base_url(); ?>voyage/editVoyage/voyage_no/" + voyage_no, '_parent');
    }

    function entryTracking(voyage_no) {
        window.open("<?php echo base_url(); ?>voyage/entryTracking/voyage_no/" + voyage_no, '_parent');
    }

    function remove(voyage_no) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>dashboard/removeVoyage/voyage_no/" + voyage_no,
            success: function (s) {
                alert('Delete Success');
                location.reload();
            }
            ,
            error: function (e) {
                alert(e);
            }
        });
    }
    ;

    new Highcharts.Chart({
        chart: {
            renderTo: 'pie-chart1'
        },
        credits: {
            enabled: false
        },
        title: false,
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        subtitle: {
            text: '',
            x: -20
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                },
                showInLegend: true
            }
        },
        series: [{
					name: 'Percentage',
					type: 'pie',
					data: <?php 
						$num = count($chart_status);
						$i = 0;
						echo "[";
						foreach($chart_status as $row){
							echo "['".$row['status']."',".$row['total']."]";
							if(++$i !== $num) echo ",";
						} 
						echo "]";
					?>        }],
        exporting: {
            enabled: true
        }
    });
    
    new Highcharts.Chart({
        chart: {
            renderTo: 'pie-chart2'
        },
        credits: {
            enabled: false
        },
        title: false,
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        subtitle: {
            text: '',
            x: -20
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                },
                showInLegend: true
            }
        },
         series: [{
					name: 'Percentage',
					type: 'pie',
					data: <?php 
						$num = count($chart_customer);
						$i = 0;
						echo "[";
						foreach($chart_customer as $row){
							echo "['".$row['customer']."',".$row['total']."]";
							if(++$i !== $num) echo ",";
						} 
						echo "]";
					?>        }],
        exporting: {
            enabled: true
        }
    });
    
    new Highcharts.Chart({
        chart: {
            renderTo: 'pie-chart3'
        },
        credits: {
            enabled: false
        },
        title: false,
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        subtitle: {
            text: '',
            x: -20
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y}',
                },
                showInLegend: true
            }
        },
         series: [{
					name: 'Percentage',
					type: 'pie',
					data: <?php 
						$num = count($chart_owner);
						$i = 0;
						echo "[";
						foreach($chart_owner as $row){
							echo "['".$row['owner']."',".$row['total']."]";
							if(++$i !== $num) echo ",";
						} 
						echo "]";
					?>        }],
        exporting: {
            enabled: true
        }
    });

</script>
