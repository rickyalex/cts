<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap toggle-->
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
<!---->
<!---->
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="xcrud-container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="portlet box">
                        <div class="portlet-body">
                            <div class="row">

                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="row invoice-info">

                                        <div class="col-sm-12 invoice-col">

                                            <table class="table table-striped">
                                                <thead>
                                                    <tr><th>ID Order		</th><th><?php //echo $DataMasterContainer['id'];        ?></th></tr>
                                                    <tr><th>Order No	</th><th><?php //echo $DataMasterContainer['container_no'];        ?></th></tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="nav-tabs-custom">

                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab_1" data-toggle="tab">History Order Tracking</a></li>
                                            <li><a href="#tab_2" data-toggle="tab">History Last Position</a></li>
                                            <li><a href="#tab_3" data-toggle="tab">History Status</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_1">

                                                <div class="row invoice-info">

                                                    <div class="col-sm-12 invoice-col">
                                                        <!--div id="toolbar">
                                                                <button id="add_training" class="btn btn-success">
                                                                       || <i class="glyphicon glyphicon-add"></i> Add
                                                                </button>
                                                        </div-->
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <!--<th>Id</th>
                                                                    <th>Container No</th>-->
                                                                    <th>Unit No</th>
                                                                    <th>DN No</th>
                                                                    <th>Last Position</th>
                                                                    <th>Status</th>
                                                                    <th>Waktu update</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div><!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_2">
                                                <div class="row invoice-info">
                                                    <div class="col-sm-12 invoice-col">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Last Position</th>
                                                                    <th>Is Current</th>
                                                                    <th>Last Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div><!-- /.tab-pane -->
                                            <div class="tab-pane" id="tab_3">
                                                <div class="row invoice-info">
                                                    <div class="col-sm-12 invoice-col">
                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Status</th>
                                                                    <th>Is Current</th>
                                                                    <th>Last Updated</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div><!-- /.tab-pane -->
                                        </div><!-- /.tab-content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .page-content -->
</div><!-- .page-content-wrapper -->