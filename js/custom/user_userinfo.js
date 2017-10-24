var xmlHttp;
function startGet()
{
	GetXmlHttpObject();
	var url="user/userinfo.php?timestamp="+new Date().getTime();
	xmlHttp.open("GET",url+"&"+phoneCheck());
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

function phoneCheck()
{
	    var userTelephone=document.getElementById("userTelephone").value;
		var dateString="userTelephone="+userTelephone;
		return dateString;
}
function withdraw(){
	var items=new Array("userTelephone");
	document.getElementById(items).value=null;
	document.getElementById("txtHint").innerHTML="";
}
