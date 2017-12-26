jQuery(document).ready(function(){
	
	var myChart = echarts.init(document.getElementById('registInfo'));
	//显示标题，图例和空的坐标轴
	myChart.setOption({
		
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
	title: {
	   text: '新增用户',
	   subtext:'数量/人'
	},
	tooltip: {},
	legend: { 
	   data:['新增用户数']
	},
	toolbox: {
	    show: true,
	    feature: {
	        dataZoom: {
	            yAxisIndex: 'none'
	        },
	        dataView: {readOnly: false},
	        magicType: {type: ['line', 'bar']},
	        restore: {},
	        saveAsImage: {}
	    }
	},
	xAxis: {
	   data: ['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
	   show: true,
	   axisTick: {
	       alignWithLabel: true
	   }
	},
	yAxis: {},
	series: [
		{
	   name: '新增用户数',
	   color: ['#fb9337'],
	   type: 'line',
	   barWidth: '30%',
	   data: []
	}]
	});
	myChart.showLoading();   
	$.ajax({
	type : "post",
	async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
	url : "user/regist_info.php",    
	data : {},
	dataType : "json",        //返回数据形式为json
	success : function(result,status) {
	    //请求成功时执行该函数内容，result即为服务器返回的json对象
	    if (result) {
	    	 myChart.hideLoading();    //隐藏加载动画
	         myChart.setOption({  
	      	   tooltip : {
	      		   show:true,
	 		    	trigger:'item',   		    	
	 		          trigger: 'axis',
	 		             axisPointer : {            // 坐标轴指示器，坐标轴触发有效
	 		        }
	 		    },//加载数据图表    
	             series: [
	          	   {
	                 // 根据名字对应到相应的系列
	                 name: '新增用户数',
	                 data: [result.January,result.February,result.March,result.April ,result.May,result.June ,
	                        result.July ,result.August,result.September ,result.October,result.November,result.December ]
	             }]
	         });
	    }
	},
	error : function(errorMsg) {
	    //请求失败时执行该函数
	alert("图表请求数据失败!");
	myChart.hideLoading();
	}
	})
	
})