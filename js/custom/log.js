var pageSize = 5;//每页显示的条数
	var page = 1;//当前页
$(document).ready(function(){
	$("#time_sub").click(function(){
		Load();
		Loadlist();
	})	
});
function Load(){
	 date1=$("#datepickfrom").val();
	 date2=$("#datepickto").val();
   $.ajax({
		type : "post",
		async : false,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
		url : "../adminPHP/log_check.php",    
		data : {page:page,pageSize:pageSize,date1:date1,date2:date2},
		dataType : "json",        //返回数据形式为json
		success : function(result,status) {
			var dataTable="";
			for(i=0;i<result.length;i++){
				dataTable=dataTable
				+"<tr><td>"+result[i].log_date
				+"</td><td>"+result[i].recorder
				+"</td><td>"+result[i].log+"</td></tr>";
			}
			$("#logtable").html(dataTable);
		}
	        })		       
}
//加载分页列表
function Loadlist(){
	var str = "";	  
	//上一页
	str+="<a id='prev'><font color='#465875'size='3'>上一页</font></a>&nbsp;&nbsp;";
	//加载列表
	for(var i=page-4;i<page+5;i++){
		//限制条件
        if(i>0 && i<=pagenum()){
        	if(i==page){
        		str+="<a class='active'><font color='#fb9337' size='3'>"+i+"</font></a>&nbsp;&nbsp;";     		
        	}else{
        		str+="<a class='item'><font color='#465875'size='3'>"+i+"</font></a>&nbsp;&nbsp;";
        	}
        }
	}
	//下一页
	str+="<a id='next'><font color='#465875'size='3'>下一页</font></a>";
	//alert(str);
	$("#logPage").html(str);	
	
	//上一页的点击事件
	$("#prev").click(function(){
		if(page>1){
			page--;
		}
		//页面加载数据
		Load();
		//加载分页的列表
		Loadlist();	
	})
	//当前页的点击事件
	$(".item").click(function(){
        var p = $(this).text();//取到的是字符串,转化为整数
        page = parseInt(p);
        //页面加载数据
        Load();
        //加载分页列表
        Loadlist();
      })  
      //下一页的点击事件
        $("#next").click(function(){
        if(page<pagenum()){
          page++;
        }
        //页面加载数据
        Load();
        //加载分页列表
        Loadlist();
      })

}
//总页数
function pagenum(){
    var totalPage=0;
    $.ajax({
    async:false,
    url:"../adminPHP/log_check_totalpage.php",
    type:"POST",
    data:{date1:date1,date2:date2},
    dataType:"json",
    success:function(data){
	var num=data.num;
    totalPage = parseInt(Math.ceil(num/pageSize));
    }
});
 return totalPage;
}

//取消事件
function withdraw(){
	var i;
	var items=new Array("datepickfrom","datepickto");
	for(i=0;i<items.length;i++)
	document.getElementById(items[i]).value=null;
	document.getElementById("logtable").innerHTML="";
	document.getElementById("logPage").innerHTML="";
}
