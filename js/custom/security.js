/**
 * 
 */
jQuery(document).ready(function(){
///// CHECKBOX TRANSFORM /////
	jQuery('input:checkbox,input:button').uniform();
});

function securityFind(){
	var mother_name=document.getElementById("mother_name").value;
	var teacher_name=document.getElementById("teacher_name").value;
	var mobile=document.getElementById("mobile").value;
	var poem=document.getElementById("poem").value; 
	$.post("adminPHP/security_pwd_find.php",
			{mother_name:mother_name,
		     teacher_name:teacher_name,
		     mobile:mobile,
		     poem:poem
			},
			function(result){
				if(result=="成功"){
					alert(result);
				}else if($result =="请回答密保问题"){
					alert(result); 
				}else if($result == "失败"){
					alert(result);
				}
	 });
}