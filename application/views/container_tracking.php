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
                                    <table id="table"></table>
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
    $('#table').bootstrapTable({
        idField: 'id',
        url: '<?php echo base_url(); ?>container_tracking/getData',
        pageList: ["5", "10", "25", "50", "100", "ALL"],
        search: 'true',
        height: '100%',
        show: [{
                refresh: 'true',
                export: 'true'
            }],
        columns: [{
                field: 'container_id',
                title: 'Container ID',
                class: 'container_id'
            },{
                field: 'container_no',
                title: 'Container No',
                class: 'container_no'
            },{
                field: 'size',
                title: 'Container Size',
                class: 'size'
            },{
                field: 'owner',
                title: 'Owner',
                class: 'owner'
            }, {
                field: 'customer',
                title: 'Customer',
                class: 'customer',
                editable: {
                    type: 'select',
                    title: 'Customer',
                    source: <?php echo $all_customer; ?>
                }
            },{
                field: 'last_position',
                title: 'Last Position',
                class: 'last_position',
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
            },{
                field: 'status',
                title: 'Status',
                class: 'status',
                editable: {
                    type: 'select',
                    title: 'Status',
                    source: [
                        {value: 'FULL', text: 'FULL'},
                        {value: 'EMPTY', text: 'EMPTY'}
                    ]
                }
            }, {
                field: 'last_updated',
                title: 'Last Updated'
            }]
    });

    $(document).on('click', '.editable-submit', function () {
        var container = $(this).closest('tr').find('td.container_id').text();
        if($(this).closest('td').hasClass("customer")){
            var cls = "customer";
        }
        else if($(this).closest('td').hasClass("last_position")){
            var cls = "last_position";
        }
        else var cls = "status";
        var data = $('.input-sm').val();
        //alert(z);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>container_tracking/updateStatus/id/" + container + "/cls/" + cls + "/data/" + data,
            success: function (s) {
                alert(s);
            }
            ,
            error: function (e) {
                alert('Update Error');
            }
        });
    });
</script>
