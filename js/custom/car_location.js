jQuery(document).ready(function(){
	var myChart = echarts.init(document.getElementById('carLocation'));
	//显示标题，图例和空的坐标轴
	myChart.setOption({
		 title : {
		        text: '车辆归属及数量饼图',	        
		        x:'center'
		    },
		    tooltip : {
		        trigger: 'item',
		        formatter: "{a} <br/>{b} : {c} ({d}%)"
		    },
		    toolbox: {
		        show: true,
		        feature: {
		            dataZoom: {
		                yAxisIndex: 'none'
		            },
		            dataView: {readOnly: false},
		            saveAsImage: {}
		        }
		    },
		    legend: {
		        orient: 'vertical',
		        left: '',
		        data: []
		    },    
		    series : [
		        {
		            name: '车辆归属',
		            type: 'pie',
		            radius : '55%',
		            center: ['50%', '60%'],
		            data:[],
		            itemStyle: {
		                emphasis: {
		                    shadowBlur: 10,
		                    shadowOffsetX: 0,
		                    shadowColor: 'rgba(0, 0, 0, 0.5)'
		                }
		            }
		        }
		    ]
	})
		myChart.showLoading();   
		$.ajax({
		type : "post",
		async : true,            //异步请求（同步请求将会锁住浏览器，用户其他操作必须等待请求完成才可以执行）
		url : "user/car_location_info.php",    
		data : {},
		dataType : "json",        //返回数据形式为json
		success : function(result,status) {
		    //请求成功时执行该函数内容，result即为服务器返回的json对象
		    if (result) {
			    var res= [];
		    	  var names= []; 
		    	  var values= [];
		    	for(i = 0 ;i<result.length;i++ ){
		    		names.push(result[i].name); 
		    		values.push(result[i].num); 
		    		res[i]={name:names[i],value:values[i]};
		    		}
		    }
		    myChart.hideLoading();    //隐藏加载动画
	        myChart.setOption({  
	        	 legend: {
	                 data:names
	                 },    
	            series: [
	         	   {
	                // 根据名字对应到相应的系列
	                data: res
	         	   }]
	        });
		},
		error : function(errorMsg) {
		    //请求失败时执行该函数
		alert("图表请求数据失败!");
		myChart.hideLoading();
		}
		})
})