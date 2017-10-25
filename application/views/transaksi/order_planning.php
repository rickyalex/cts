<?php echo $content;  ?>
<script type="text/javascript">
function fn_opt_tarif(){
		var a = jQuery("#customer").val() ;
		var b = jQuery("#product").val() ;
		var c = jQuery("#origin").val() ;
		var d = jQuery("#city").val() ;
		var e = jQuery("#plant").val() ;
		var f = jQuery("#product_trucktype").val();
		var g = jQuery("#opt_tarif").val();
	jQuery.ajax({
			 type: "POST",
			 dataType: "text",
			 url: "<?php echo base_url();?>index.php/transaksi/get_tarif/"+a+"/"+b+"/"+c+"/"+d+"/"+f+"/"+g,
			 success: function(response) {
				jQuery('#tarif').val(response);
			 },
			 error: function(response){
				 jQuery('#tarif').val('');
			 },
			 complete: function(response){
			 }
			});

	jQuery.ajax({
			 type: "POST",
			 dataType: "text",
			 url: "<?php echo base_url();?>index.php/transaksi/get_ujo/"+b+"/"+c+"/"+d+"/"+e+"/"+f+"/"+g,
			 success: function(response) {
				jQuery('#ujo').val(response);
			 },
			 error: function(response){
				 jQuery('#ujo').val('');
			 },
			 complete: function(response){
			 }
			});
			
	jQuery.ajax({
			 type: "POST",
			 dataType: "text",
			 url: "<?php echo base_url();?>index.php/transaksi/get_komisi/"+b+"/"+c+"/"+d+"/"+e+"/"+f+"/"+g,
			 success: function(response) {
				jQuery('#komisi').val(response);
			 },
			 error: function(response){
				 jQuery('#komisi').val('');
			 },
			 complete: function(response){
			 }
			});
}
</script>
