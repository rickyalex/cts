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


<div class="page-content-wrapper">
    <div class="page-content">
        <div class="xcrud-container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="portlet box">
                        <div class="portlet-body">
                            <?php $attrib = array('id' => 'complaint');
                            echo form_open("complaints",$attrib); ?>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Complaint Type</b></label>
                                <dd>
                                    <select id="complaint_type" name="complaint_type" class="form-control" data-placeholder="Select Your Complaint" style="width:200px">
                                        <option value="REJECT PRODUCT/DEFECT">REJECT PRODUCT/DEFECT</option>
                                        <option value="DELIVERY DELAY">DELIVERY DELAY</option>
                                        <option value="INCORRECT DELIVERY">INCORRECT DELIVERY</option>
                                    </select>
                                </dd>							
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Order No</b></label>
                                <dd>
                                    <select id="order_no" name="order_no" class="form-control" data-placeholder="Select Your Order" style="width:200px">
                                        <option></option>
                                    </select>
                                </dd>							
                            </div>	
                            <div class="form-group">
                                <label class="control-label col-sm-2 col-md-2 col-lg-2"><b>Description :</b></label>
                                <textarea id="description" name="description" class="form-control" data-placeholder="Describe Your Complaint" cols="15" rows="5"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>								
                                <a href="#" class="btn btn-default" onClick="window.location.replace('<?php echo base_url(); ?>complaints');"><i class="fa fa-back"></i> Back</a>
                                
                            </div>
                            <?php echo form_close(); ?> 	
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
        $("#order_no").select2({
            data: <?php echo json_encode($customer_order_no); ?>
        });
    });

//    $('button').on('click', function (e) {
//        e.preventDefault();
//        var form = $("form#complaint")[0];
//        var formData = new FormData(form);
//        $.ajax({
//            type: "POST",
//            data: formData,
//            contentType: false,
//            processData: false,
//            url: "<?php //echo base_url(); ?>complaints/saveData",
//            success: function (response) {
//                console.log(response);
//                
//            },
//            error: function (response) {
//                console.log(response);
//                
//            }
//        });
//        return false;
//    });

</script>
