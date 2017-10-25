function ajax_revenue(){
		var a = jQuery("#project_name").val() ;
		var b = jQuery("#periode").val() ;
		var c = jQuery("#item").val() ;
		
	jQuery.ajax({
			 type: "POST",
			 dataType: "text",
			 url: "<?php echo base_url();?>index.php/pica/get_revenue/"+a+"/"+b+"/"+c,
			 success: function(response) {
				jQuery('#actual').val(response);
			 },
			 error: function(response){
				 jQuery('#actual').val('');
			 },
			 complete: function(response){
			 }
			});
	jQuery.ajax({
			 type: "POST",
			 dataType: "text",
			 url: "<?php echo base_url();?>index.php/pica/get_target_revenue/"+a+"/"+b+"/"+c,
			 success: function(response) {
				jQuery('#target').val(response);
			 },
			 error: function(response){
				 jQuery('#target').val('');
			 },
			 complete: function(response){
			 }
			});
}
</script>