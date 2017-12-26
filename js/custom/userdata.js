jQuery(document).ready(function(){
								
	///// SHOW/HIDE USERDATA WHEN USERINFO IS CLICKED 跳出隐藏的右上角菜单栏 ///// 
	
	jQuery('.userinfo').click(function(){
		if(!jQuery(this).hasClass('active')) {
			jQuery('.userinfodrop').show();
			jQuery(this).addClass('active');
		} else {
			jQuery('.userinfodrop').hide();
			jQuery(this).removeClass('active');
		}
		//remove notification box if visible
		jQuery('.notification').removeClass('active');
		jQuery('.noticontent').remove();
		
		return false;
	});
	/////按钮美观
	jQuery('input:checkbox,input:button').uniform();
	
	////点击出现日历
///// DATE PICKER /////
	jQuery( "#datepickfrom, #datepickto,#datepick" ).datepicker({ dateFormat: 'yy-mm-dd'});	
	///点击出现选择年的控件
	jQuery( "#yearpick" ).datepicker({ dateFormat: 'yy'});	

	///// HORIZONTAL NAVIGATION (AJAX/INLINE DATA) 子页面跳转js/////	
	
	jQuery('.hornav a').click(function(){
		
		//this is only applicable when window size below 450px
		if(jQuery(this).parents('.more').length == 0)
			jQuery('.hornav li.more ul').hide();
		
		//remove current menu
		jQuery('.hornav li').each(function(){
			jQuery(this).removeClass('current');
		});
		
		jQuery(this).parent().addClass('current');	// set as current menu
		
		var url = jQuery(this).attr('href');
		if(jQuery(url).length > 0) {
			jQuery('.contentwrapper .subcontent').hide();
			jQuery(url).show();
		} else {
			jQuery.post(url, function(data){
				jQuery('#contentwrapper').html(data);
				jQuery('.stdtable input:checkbox').uniform();	//restyling checkbox
			});
		}
		return false;
	});
	
	
})