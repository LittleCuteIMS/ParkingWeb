jQuery(document).ready(function(){
	
		
		
		///// DATE PICKER /////
		jQuery( "#datepickfrom, #datepickto,#datepick" ).datepicker({ dateFormat: 'yy-mm-dd'});	
	
	///// CHECKBOX TRANSFORM /////
		jQuery('input:checkbox,input:button').uniform();

});



//查询日志
function timeGet(){   
	var xmlHttp;
	GetXmlHttpObject();
	var url="adminPHP/log_check.php?timestamp="+new Date().getTime();
	xmlHttp.open("GET",url+"&"+dateCheck());
	xmlHttp.send(null);
	xmlHttp.onreadystatechange=stateChanged;
	
    function GetXmlHttpObject()
    {
	if(window.ActiveXObject){
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	    }else{
		xmlHttp=new XMLHttpRequest();
	    }
    }
/*
 * 当readyState属性值发生改变时就会激活此函数来执行
 */
    function stateChanged()
    {
	if(xmlHttp.readyState==4){
		if(xmlHttp.status==200 ){
			var content=xmlHttp.responseText;
			document.getElementById("logtable").innerHTML=content;
		}
		
	   }
    }
    
    //时间查询
   function dateCheck()
    {
	var date1=document.getElementById("datepickfrom").value;
	var date2=document.getElementById("datepickto").value;
	var dateString="date1="+date1+"&date2="+date2;
	return dateString;
    }
}

//取消事件
function withdraw(){
	var i;
	var items=new Array("datepickfrom","datepickto");
	for(i=0;i<items.length;i++)
	document.getElementById(items[i]).value=null;
	document.getElementById("logtable").innerHTML="";

}

