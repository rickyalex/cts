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
    
    textarea.form-control {
        margin: 5px 0;
    }
    
    .number-spinner{
        width: 10% !important;
    }
    
    .number-spinner input{
        width: 100% !important;
    }
    
    .number-spinner .btn{
        padding: 4px;
    }
    
    @media ( max-width: 585px ) {
        .number-spinner{
            width: 40% !important;
        }
    }
    
</style>
<div class="page-content-wrapper">
    <div class="page-content">
        <div class="xcrud-container">


            <div class="portlet box yellow-gold">
                            <div class="portlet-title">
                                <div class="caption">
                                    Order Detail
                                </div>
                                <div class="tools">
                                </div>
                            </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <?php $attrib = array('id' => 'order');
                            echo form_open("order_tracking",$attrib); ?>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Customer :</b></label>
                                <select id="customer_id" name="customer" class="form-control" data-placeholder="Select Customer" style="width:300px">
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Order No :</b></label>
                                <input type="text" class="form-control input-sm" name="order_no" value="<?php if ($mode == "update"){echo $arr[0]['order_no'];}else{echo $order_no;} ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Order Date :</b></label>
                                <input id="order_date" type="text" class="dp form-control input-sm" name="order_date" value="<?php if ($mode == "update") echo $arr[0]['order_date']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Request Date :</b></label>
                                <input id="request_date" type="text" class="dp form-control input-sm" name="request_date" value="<?php if ($mode == "update"){echo $arr[0]['request_date'];}else{echo $order_no;} ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Service Type :</b></label>
                                <select id="service_type" name="service_type" class="form-control" data-placeholder="Select Service" style="width:200px">
                                    <option></option>
                                    <option value="D2D">DOOR TO DOOR</option>
                                    <option value="S2D">STATION TO DOOR</option>
                                    <option value="S2S">STATION TO STATION</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Pick Up Point :</b></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="origin_wh"><?php if ($mode == "update") echo $arr[0]['origin_wh']; ?></textarea>
                                </div>	
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Destination :</b></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="destination_wh" cols="5"><?php if ($mode == "update") echo $arr[0]['destination_wh']; ?></textarea>							
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Remarks :</b></label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" name="remarks" cols="5"><?php if ($mode == "update") echo $arr[0]['remarks']; ?></textarea>							
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Feeder Type :</b></label>
                                <input type="text" class="form-control input-sm" name="feeder_type" value="<?php if ($mode == "update") echo $arr[0]['feeder_type']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>40 feet </b></label>
                                <div class="input-group number-spinner">
                                    <span class="input-group-btn data-dwn">
                                            <a class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                    </span>
                                    <input type="text" class="form-control text-center input-sm" name="cont_40feet" value="1" min="0" max="40">
                                    <span class="input-group-btn data-up">
                                            <a class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>20 feet </b></label>
                                <div class="input-group number-spinner">
                                    <span class="input-group-btn data-dwn">
                                            <a class="btn btn-default btn-info" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></a>
                                    </span>
                                    <input type="text" class="form-control text-center input-sm" name="cont_20feet" value="1" min="0" max="40">
                                    <span class="input-group-btn data-up">
                                            <a class="btn btn-default btn-info" data-dir="up"><span class="glyphicon glyphicon-plus"></span></a>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>Volume (tons):</b></label>
                                <input type="text" class="form-control input-sm" name="volume" value="<?php if ($mode == "update") echo $arr[0]['volume']; ?>">
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-md-3 col-lg-3"><b>PIC Marketing:</b></label>
                                <select id="pic_marketing" name="pic_marketing" class="form-control" data-placeholder="Select PIC" style="width:200px">
                                    <option></option>
                                    <option value="NURUL">NURUL</option>
                                    <option value="EDUARD">EDUARD</option>
                                    <option value="FANCO">FANCO</option>
                                    <option value="KARNO">KARNO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br><br><br>
                    <div class="modal-footer">
                                <button id="submit" type="submit" value="xls" name="submit" class="btn btn-primary">Submit</button>								
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
    $(window).bind("load", function() {
        $("#customer_id").select2({
            data : <?php echo json_encode($customer); ?>
	}); 
        $("#service_type").select2(); 
        $("#pic_marketing").select2(); 
        
        $('#order_date').datepicker('setDate', '<?php echo Date('Y-m-d'); ?>');
    });
    
    $(function() {
        var action;
        $(".number-spinner a").mousedown(function () {
            btn = $(this);
            input = btn.closest('.number-spinner').find('input');
            btn.closest('.number-spinner').find('button').prop("disabled", false);

            if (btn.attr('data-dir') == 'up') {
                action = setInterval(function(){
                    if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                        input.val(parseInt(input.val())+1);
                    }else{
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            } else {
                action = setInterval(function(){
                    if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                        input.val(parseInt(input.val())-1);
                    }else{
                        btn.prop("disabled", true);
                        clearInterval(action);
                    }
                }, 50);
            }
        }).mouseup(function(){
            clearInterval(action);
        });
    });
    
    $('#submit').on('click', function (e) {
        e.preventDefault();
        var form = $("form#order")[0];
        var formData = new FormData(form);
        $.ajax({
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            url: "<?php echo base_url(); ?>order_tracking/saveData",
            success: function (response) {
                console.log(response);
                window.open("<?php echo base_url(); ?>order_tracking",'_parent');
            },
            error: function (response) {
                console.log(response);
                
            }
        });
        return false;
    });
    
</script>
