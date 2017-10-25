<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<link href="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-editable.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-table.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-table-editable.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-editable.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/tableExport.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-table-filter-control.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/bootstrap-table/dist/bootstrap-datepicker.js"></script>

<link href="<?php echo base_url(); ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendors/select2/dist/js/select2.full.min.js"></script>

<link href="<?php echo base_url(); ?>assets/vendors/timepickermaster/jquery.ui.timepicker.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendors/timepickermaster/jquery.ui.timepicker.js"></script>

<script src="<?php echo base_url(); ?>assets/vendors/moment/min/moment.min.js"></script>
<link href="<?php echo base_url(); ?>assets/vendors/datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendors/datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

<!-- Graph -->
<script src="<?php echo base_url(); ?>assets/vendors/raphael/raphael.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendors/morris.js/morris.min.js"></script>
<link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<link href="<?php echo base_url(); ?>assets/vendors/datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>assets/vendors/datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>


<style>
    .form-horizontal .form-group{
        margin-left:0 !important;
    }
    
    input.form-control {
        width:200px !important;
        margin: 1px 0;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="xcrud-container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="portlet box">
                        <div class="portlet-body">
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Order No :</b></label>
                                <input type="text" class="form-control input-sm" name="container_no" value="<?php echo $arr[0]['order_no']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Order Date :</b></label>
                                <input type="text" class="form-control input-sm" name="order_date" value="<?php echo $arr[0]['order_date']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Order Status :</b></label>
                                    <input type="text" class="form-control input-sm" name="order_status" value="<?php echo $arr[0]['order_status']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Last Position :</b></label>
                                    <input type="text" class="form-control input-sm" name="last_position" value="<?php echo $arr[0]['last_position']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Last Updated :</b></label>
                                    <input type="text" class="form-control input-sm" name="last_updated" value="<?php echo $arr[0]['last_updated']; ?>" readonly>							
                                  
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-lg-12">
                                    <table id="table"
                                           data-toggle="table"
                                           data-minimum-count-columns="2"
                                           data-show-footer="false"
                                           data-height="auto"
                                           data-url="<?php echo base_url(); ?>order_tracking/getOrderTracking/order_no/<?php echo $order_no; ?>">
                                        <thead>
                                            <tr>
                                                <th data-field="container_no">Container No</th>
                                            </tr>
                                        </thead>
                                    </table>
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

</script>
