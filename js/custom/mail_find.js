jQuery(document).ready(function(){
	jQuery('#sub_btn').click(function(){
		var email=jQuery('#email').val();
        var preg = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/; //匹配Email 
        if(email=='' || !preg.test(email)){ 
        	alert("请填写正确的邮箱！");            
        }
    });
}); 
      