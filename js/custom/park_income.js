jQuery(document).ready(function(){
	
///// SHOW/HIDE USERDATA WHEN USERINFO IS CLICKED ///// 
	
	jQuery('.userinfo').click(function(){
		if(!jQuery(this).hasClass('active')) {
			jQuery('.userinfodrop').show();
			jQuery(this).addClass('active');
		} else {
			jQuery('.userinfodrop').hide();
			jQuery(this).removeClass('active');
		}
		//remove notification box if visible
		jQuery('.notification').removeClass('active');
		jQuery('.noticontent').remove();
		
		return false;
	});

	
	var myChart = echarts.init(document.getElementById('main'));
	//显示标题，图例和空的坐标轴
	myChart.setOption({
		
		    grid: {
		        left: '3%',
		        right: '4%',
		        bottom: '3%',
		        containLabel: true
		    },
	title: {
	   text: '停车场收入柱状图',
	   subtext:'收入/元'
	},
	 tooltip : {
		   show:true,
	    	trigger:'item',   		    	
	          trigger: 'axis',
	             axisPointer : {            // 坐标轴指示器，坐标轴触发有效
	        }
	    },//加载数据图表
	legend: { 
	   data:['收入']
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
	   data: [],
	   show: true,
	   axisTick: {
           alignWithLabel: true
       },
    axisLabel:{  
        interval:0,  
        rotate:45,//倾斜度 -90 至 90 默认为0  
        margin:8,  
    }    
	},
	yAxis: {},
	dataZoom: [
        {
       	 type: 'slider',
       	  show: true, 
       	    realtime: true, 
       	    y: 36, 
       	    height: 20, 
       	    start: 10, 
       	    end: 80,
        } 
    ],
	series: [
		{
	   name: '收入',
	   color: ['#c23531'],
	   type: 'bar',
	   barWidth: '40%',
	   data: []
	}]
	});
	
	myChart.showLoading();    //数据加载完之前先显示一段简单的loading动画
	var names=[];    //类别数组（实际用来盛放X轴坐标值）
	var incomes=[];    //销量数组（实际用来盛放Y坐标值）
	$.ajax({
	type : "post",
	async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
	url : "parkPHP/park_analysis.php",    
	data : {},
	dataType : "json",        //返回数据形式为json
	success : function(result,status) {
	    //请求成功时执行该函数内容，result即为服务器返回的json对象
	    if (result) {
	           for(var i=0;i<result.length;i++){       
	              names.push(result[i].name);    //挨个取出类别并填入类别数组
	              incomes.push(result[i].income); 
	            }   

	           myChart.hideLoading();    //隐藏加载动画
	           myChart.setOption({    
	               xAxis: {
	                   data: names
	               },
	               series: [
	            	   {
	                   // 根据名字对应到相应的系列
	                   name: '收入',
	                   data: incomes
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