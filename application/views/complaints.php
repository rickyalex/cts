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
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <?php if (isset($msg)) { ?>
                        <div class="box box-success box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Message</h3>
                                <div class="box-tools pull-right">
                                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div><!-- /.box-tools -->
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <?php echo $msg; ?>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    <?php } ?>
                    <div class="portlet box yellow-gold">
                        <div class="portlet-title">
                            <div class="caption">
                                Customer Complaints
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <?php if (GROUPNAME == "Customer") { ?>
                                    <div id="toolbar">
                                        <button id="add" class="btn btn-success">
                                            <i class="glyphicon glyphicon-add"></i> Add
                                        </button>
                                    </div>
                                    <?php } ?>
                                    <table id="table"
                                           data-toggle="table">
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
    $(window).bind("load", function () {
        $("#complaint_type").select2();
    });
    var $add = $("#add");
    $add.on('click', function () {
        window.open("<?php echo base_url(); ?>complaints/complaintsForm", '_parent');
    });
    
    $('#table').bootstrapTable({
        idField: 'id',
        <?php if(GROUPNAME=="Customer"){ ?>
        url: '<?php echo base_url(); ?>complaints/getCustomerComplaints/customer_id/<?php echo USER_ID; ?>',
        <?php }else{ ?>
        url: '<?php echo base_url(); ?>complaints/getAllCustomerComplaints',
        <?php } ?>
        search: 'true',
        showRefresh:'true',
        pagination: 'true',
        height:'auto',
        pageList: ["5", "10", "25", "50", "100", "ALL"],
        show: [{
                refresh: 'true',
                export: 'true'
            }],
        columns: [{
                field: 'id',
                title: 'ID',
                class: 'id'
            },{
                field: 'complaint_type',
                title: 'Complaint',
                class: 'complaint_type'
            }, {
                field: 'description',
                title: 'Description',
                class: 'description'
            },{
                field: 'status',
                title: 'Status',
                class: 'status'
            }, {
                field: 'date_created',
                title: 'Date Created',
                class: 'date_created'
            }, {
                field: 'last_updated',
                title: 'Last Updated',
                class: 'last_updated'
            }<?php if(GROUPNAME=="Customer"){ ?>, {
                field: 'action',
                title: 'Action',
                class: 'action'
            }<?php } ?>]
    });
    
    function removeComplaint(id) {
        var result = confirm("Are you sure you want to delete this complaint ?");
        if (result) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>complaints/removeComplaint/id/" + id,
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
