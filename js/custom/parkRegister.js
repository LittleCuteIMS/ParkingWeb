	function register(){
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("regisFeedback").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("POST","parkPHP/parkRegister.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send(getData());
	}
	function getData(){
		var name=document.getElementById("name").value.trim();
		var carportSum=document.getElementById("carportSum").value.trim();
		var carportFreeNum=document.getElementById("carportFreeNum").value.trim();
		var address=document.getElementById("address").value.trim();
		var phone=document.getElementById("phone").value.trim();
		var charge=document.getElementById("charge").value.trim();
		var data="name="+name+"&carportSum="+carportSum+"&carportFreeNum="+carportFreeNum+
				"&address="+address+"&phone="+phone+"&charge="+charge;
		return data;
	}
	function withdraw(){
		var i;
		var items=new Array("name","carportSum","carportFreeNum","address","phone","charge");
		for(i=0;i<items.length;i++)
			document.getElementById(items[i]).value=null;
		document.getElementById("regisFeedback").innerHTML=null;
	}