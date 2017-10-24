var xmlHttp;
function startGet()
{
	GetXmlHttpObject();
	var url="user/dateinquiry.php?timestamp="+new Date().getTime();
	xmlHttp.open("GET",url+"&"+dateCheck());
	xmlHttp.send(null);
	xmlHttp.onreadystatechange=stateChanged;
	
}
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
			document.getElementById("txtHint").innerHTML=content;
		}
		
	}
}
function dateCheck()
{
	var date1=document.getElementById("date1").value;
	var date2=document.getElementById("date2").value;
	var dateString="date1="+date1+"&date2="+date2;
	return dateString;
}
function withdraw(){
	var i;
	var items=new Array("date1","date2");
	for(i=0;i<items.length;i++)
	document.getElementById(items[i]).value=null;
	document.getElementById("txtHint").innerHTML="";
}