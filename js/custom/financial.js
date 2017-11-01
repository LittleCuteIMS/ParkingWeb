jQuery(document).ready(function(){	
	/*
	查询
	 */
	jQuery(".searchFinancial").click(function(){
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				var jsonData=xmlhttp.responseText.toString();
				var jsonObj = eval ("(" + jsonData + ")");
				var dataTable="";
				for(var i in jsonObj){
					dataTable=dataTable
						+"<tr><td>"+jsonObj[i].id
						+"</td><td>"+jsonObj[i].name
						+"</td><td>"+jsonObj[i].address
						+"</td><td>"+"0.00"
						+"</td><td>"+"0.00"+"</td></tr>";
				}
				jQuery("#balance").html(dataTable);
			}
		};
		xmlhttp.open("GET","financialPHP/financialSelect.php",true);
		xmlhttp.send();
	});	

});