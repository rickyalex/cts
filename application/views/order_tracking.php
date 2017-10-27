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

    table, .th-inner{
        font-size: 0.8em;
    }

    .bars{
        height:auto;
    }
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="xcrud-container">
            <?php if (GROUPNAME == "Marketing" || GROUPNAME == "RW" || GROUPNAME == "TR" || GROUPNAME == "OCS") { ?>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="portlet box yellow-gold">
                            <div class="portlet-title">
                                <div class="caption">
                                    Tracking Order
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <?php if (GROUPNAME == "Marketing") { ?>
                                            <div id="toolbar">
                                                <button id="add" class="btn btn-success">
                                                    <i class="glyphicon glyphicon-add"></i> Add
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <table id="table" class="table-condensed"
                                               data-url="<?php echo base_url(); ?>order_tracking/getOrderData"></table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="portlet box yellow-gold">
                            <div class="portlet-title">
                                <div class="caption">
                                    Tracking Order
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                            <div class="portlet-body">
                                <?php
                                $attrib = array('class' => 'form-horizontal');
                                echo form_open("order_tracking", $attrib);
                                ?>
                                <div class="form-group">
                                    <label class="control-label col-sm-2 col-md-2 col-lg-2">Order No</label>
                                    <dd>
                                        <select id="order_no" name="order_no" class="form-control" data-placeholder="Select Your Order" style="width:200px">
                                            <option></option>
                                        </select>
                                    </dd>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>
                                </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div><!-- .page-content -->
</div><!-- .page-content-wrapper -->

<script>
    $(window).bind("load", function() {
<?php if (GROUPNAME == "Customer") { ?>
        $("#order_no").select2({
        data : <?php echo json_encode($customer_order_no); ?>
        });
<?php } else { ?>
        $("#order_no").select2();
<?php } ?>
    });
    var $add = $("#add");
    $add.on('click', function(){
    window.open("<?php echo base_url(); ?>order_tracking/form", '_parent');
    });
    $('#table').bootstrapTable({
    idField: 'id',
            url: '<?php echo base_url(); ?>order_tracking/getOrderData',
            search: 'true',
            showRefresh:'true',
            pagination: 'true',
            pageList: ["5", "10", "25", "50", "100", "ALL"],
            show: [{
            refresh: 'true',
                    export: 'true'
            }],
            columns: [{
            field: 'id',
                    title: 'ID',
                    class: 'id'
            }, {
            field: 'customer',
                    title: 'Customer',
                    class: 'customer'
            }, {
            field: 'order_date',
                    title: 'Order Date',
                    class: 'order_date'
            }, {
            field: 'request_date',
                    title: 'Request Date',
                    class: 'request_date'
            }, {
            field: 'days_remaining',
                    title: 'Days Remaining',
                    class: 'days_remaining'
            }, {
            field: 'order_no',
                    title: 'Order No',
                    class: 'order_no'
            }, {
            field: 'origin_wh',
                    title: 'Pick Up Point',
                    class: 'origin_wh'
            }, {
            field: 'destination_wh',
                    title: 'Destination',
                    class: 'destination_wh'
            }, {
            field: 'pic_marketing',
                    title: 'PIC',
                    class: 'pic_marketing'
            }, {
            field: 'container_size',
                    title: 'Container Size',
                    class: 'container_size'
            }, {
            field: 'unit_id',
                    title: 'Unit No',
                    class: 'unit_id'
<?php if (GROUPNAME == "RW") { ?>,
                        editable: {
                        type: 'select',
                                title: 'Unit',
                                source: <?php echo $all_unit; ?>
                        }
<?php } ?>
            }, {
            field: 'container_no',
                    title: 'Container No',
                    class: 'container_no'
<?php if (GROUPNAME == "RW") { ?>,
                        editable: {
                        type: 'select',
                                title: 'Container No',
                                source: <?php echo $all_container; ?>
                        }
<?php } ?>
            }, {
            field: 'dn_no',
                    title: 'DN No',
                    class: 'dn_no'
<?php if (GROUPNAME == "RW") { ?>,
                        editable: {
                        type: 'text',
                                title: 'DN No'
                        }
<?php } ?>
            }, {
            field: 'last_position',
                    title: 'Last Position',
                    class: 'last_position'
<?php if (GROUPNAME == "RW") { ?>,
                        editable: {
                        type: 'select',
                                title: 'Last Position',
                                source: [
                                {value: 'ON_TRUCK_CDP', text: 'ON TRUCK CDP'},
                                {value: 'ON_TRUCK_SBY', text: 'ON TRUCK SBY'},
                                {value: 'ON_TRUCK_CLG', text: 'ON TRUCK CLG'},
                                {value: 'ON_TRAIN_TO_CDP', text: 'ON TRAIN TO CDP'},
                                {value: 'ON_TRAIN_TO_SBY', text: 'ON TRAIN TO SBY'},
                                {value: 'ON_TRAIN_TO_CLG', text: 'ON TRAIN TO CLG'},
                                {value: 'ON_DEPO_CDP', text: 'ON DEPO CDP'},
                                {value: 'ON_DEPO_SBY', text: 'ON DEPO SBY'},
                                {value: 'ON_DEPO_CLG', text: 'ON DEPO CLG'},
                                {value: 'ON_CUSTOMER_CDP', text: 'ON CUSTOMER CDP'},
                                {value: 'ON_CUSTOMER_SBY', text: 'ON CUSTOMER SBY'},
                                {value: 'ON_CUSTOMER_CLG', text: 'ON CUSTOMER CLG'}
                                ]
                        }
<?php } ?>
            }, {
            field: 'status',
                    title: 'Status',
                    class: 'status'
<?php if (GROUPNAME == "RW") { ?>,
                        editable: {
                        type: 'select',
                                title: 'Status',
                                source: [
                                {value: 'FULL', text: 'FULL'},
                                {value: 'EMPTY', text: 'EMPTY'},
                                {value: 'LOAD', text: 'LOAD'},
                                {value: 'UNLOAD', text: 'UNLOAD'}
                                ]
                        }
<?php } ?>
            }, {
            field: 'order_status',
                    title: 'Order Status'
            }<?php if (GROUPNAME == "Marketing" || GROUPNAME == "RW") { ?>, {
                field: 'action',
                        title: 'Action'
                }<?php } ?>, {
            field: 'last_updated',
                    title: 'Last Updated'
            }]
    });
    $(document).on('click', '.editable-submit', function () {
    var id = $(this).closest('tr').find('td.id').text();
    if ($(this).closest('td').hasClass("container_no")) {
    var cls = "container_no";
    } else if ($(this).closest('td').hasClass("unit_id")) {
    var cls = "unit_id";
    } else if ($(this).closest('td').hasClass("last_position")) {
    var cls = "last_position";
    } else if ($(this).closest('td').hasClass("dn_no")) {
    var cls = "dn_no";
    } else
            var cls = "status";
    var data = $('.input-sm').val();
    //alert(z);
    $.ajax({
    type: "POST",
            url: "<?php echo base_url(); ?>order_tracking/updateStatus/id/" + id + "/cls/" + cls + "/data/" + data,
            success: function (s) {
            }
    ,
            error: function (e) {
            alert('Update Error');
            }
    });
    });
    function viewOrderHistory(id) {
    //alert('ID adalah ' + id);
    window.open("<?php echo base_url(); ?>order_tracking/viewOrderHistory/id/" + id, '_parent');
// Ricky's Part------------------------------------------------------------------------
//    $.ajax({
//    type: "POST",
//            url: "<?php //echo base_url();     ?>order_tracking/viewOrderHistory/id/" + id,
//            success: function (s) {
//
//            }
//    ,
//            error: function (e) {
//            alert('fail');
//            }
//    });
// Ricky's Part------------------------------------------------------------------------
    };
    function closeOrder(id) {
    $.ajax({
    type: "POST",
            url: "<?php echo base_url(); ?>order_tracking/closeOrder/id/" + id,
            success: function (s) {
            location.reload();
            }
    ,
            error: function (e) {
            alert(e);
            }
    });
    };
    function removeOrder(id) {
    var result = confirm("Are you sure you want to delete this order ?");
    if (result) {
    $.ajax({
    type: "POST",
            url: "<?php echo base_url(); ?>order_tracking/removeOrder/id/" + id,
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

    };
</script>
