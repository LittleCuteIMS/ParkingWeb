jQuery(document).ready(function(){
								
	
	///// LOGIN FORM SUBMIT /////
	jQuery('#formId').submit(function(){
	
		if(jQuery('#mother_name').val() == '' || jQuery('#teacher_name').val() == ''
			 || jQuery('#mobile').val() == ''  || jQuery('#poem').val() == '') {
			jQuery('.nomsg').fadeIn();
			return false;	
		}
	});
	
});
