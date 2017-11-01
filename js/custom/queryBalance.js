jQuery(document).ready(function(){	

	//点击部分查询，然后点击查询，根据名称将数据库中的信息放在表中
	jQuery("#btn").click(function(){
		var xmlhttp;
		if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				var jsonData=xmlhttp.responseText.toString();	//存放服务器返回的json数据
				var jsonObj = eval ("(" + jsonData + ")");		//存放解析后的json对象
				var dataTable="";								//存放表格化处理的数据
				for(var i in jsonObj){							//利用for in 循环，获取json对象中的值
					dataTable=dataTable
						+"<tr><td>"+jsonObj[i].id
						+"</td><td>"+jsonObj[i].nickname
						+"</td><td>"+jsonObj[i].mobile
						+"</td><td>"+jsonObj[i].balance+"</td></tr>";
				}
				//将表单项写入html页面
				jQuery("#table3").html(dataTable);
				if(dataTable==""){//查询的消息在数据库中不存在
					alert("您查询的用户信息不存在");
				}
			}
		};
		var phone=jQuery("#mobile").val();
		//向服务器发起请求
		xmlhttp.open("GET","financialPHP/queryUserBalance.php?&userPhone="+phone,true);//规定请求的类型、URL 以及是否异步处理请求。
		xmlhttp.send();//将请求发送到服务器
	});	

});