/*
 * 	Additional function for message.html
 *	Written by ThemePixels	
 *	http://themepixels.com/
 *
 *	Copyright (c) 2012 ThemePixels (http://themepixels.com)
 *	
 *	Built for Amanda Premium Responsive Admin Template
 *  http://themeforest.net/category/site-templates/admin-templates
 */


jQuery(document).ready(function(){	

	///// CHECKBOX TRANSFORM /////
	jQuery('input:checkbox,input:button').uniform();

	///// STAR /////
	jQuery('.msgstar').click(function(){
		if(jQuery(this).hasClass('starred'))
			jQuery(this).removeClass('starred');
		else
			jQuery(this).addClass('starred');
	});
	
	
	///// CHECK ALL /////
	jQuery('.checkall, .checkall2').click(function(){
		if(jQuery(this).is(':checked')) {
			jQuery(this).parents('table')
						.find('input:checkbox')
						.each(function(){
									   
				jQuery(this).attr('checked',true);
				
				//check if this checkbox is part of the list(tbody) not in the header/footer (thead/tfoot)
				//this will add class "selected" in a row when checked
				if(jQuery(this).parents('tbody').length > 0)
					jQuery(this).parents('tr').addClass('selected');
			});
		} else {
			jQuery(this).parents('table')
						.find('input:checkbox')
						.each(function(){
									   
				jQuery(this).attr('checked',false);
				
				//check if this checkbox is part of the list(tbody) not in the header/footer (thead/tfoot)
				//this will remove class "selected" in a row when unchecked
				if(jQuery(this).parents('tbody').length > 0)
					jQuery(this).parents('tr').removeClass('selected');
			});
		}
		
		//this is needed to remain the checkbox in transformed (uniform) state
		jQuery.uniform.update();
	});
	
	
	///// EACH CHECKBOX CLICK EVENT /////
	jQuery('.mailinbox input:checkbox').each(function(){
		jQuery(this).click(function(){
			if(!jQuery(this).is(':checked')) {
				
				//this will hide trash icon only when there are no selected row
				var hidetrash = true;
				jQuery('.mailinbox tbody input:checkbox').each(function(){
					if(jQuery(this).is(':checked'))
						hidetrash = false;
				});
				
				if(hidetrash)
					jQuery('.dropdown_label, .reportspam, .msgtrash').hide();
				
				//check if this checkbox is part of the list(tbody) not in the header/footer (thead/tfoot)
				//this will remove class "selected" in a row when checked
				if(jQuery(this).parents('tbody').length > 0)
					jQuery(this).parents('tr').removeClass('selected');
					
			} else {
				
				//we use css({display:block}) instead of show() because show() is 
				//using display: inline to show element
				jQuery('.dropdown_label, .reportspam, .msgtrash').css({display: 'block'});
				
				//check if this checkbox is part of the list(tbody) not in the header/footer (thead/tfoot)
				//this will add class "selected" in a row when checked
				if(jQuery(this).parents('tbody').length > 0)
					jQuery(this).parents('tr').addClass('selected');
			
			}
		});
	});
	
	
	///// SHOW DROP DOWN BUTTON /////
	jQuery('.dropdown').each(function(){
		var t = jQuery(this);
		t.find('a.dropdown_label').click(function(){
			if(!t.hasClass('open')) {
				var h = t.height();
				t.find('ul').show().css({top: h+2+'px'});	
				t.addClass('open');
			} else {
				t.find('ul').hide();	
				t.removeClass('open');				   
			}
			return false;
		});
		
	});
	
	///// HIDE DROP DOWN BUTTON /////
	jQuery(document).click(function(){
		jQuery('.dropdown').removeClass('open').find('ul').hide();
	});
	
	//点击所有查询，将数据库中的信息放在表中
	jQuery(".searchAll").click(function(){
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
						+"</td><td>"+jsonObj[i].carport_sum
						+"</td><td>"+jsonObj[i].carport_free_num
						+"</td><td>"+jsonObj[i].address
						+"</td><td>"+jsonObj[i].phone
						+"</td><td>"+jsonObj[i].charge+"</td></tr>";
				}
				jQuery("#tb1").html(dataTable);
			}
		};
		xmlhttp.open("GET","parkPHP/parkSelect.php?mode=all",true);
		xmlhttp.send();
	});

	//点击部分查询，然后点击查询，根据名称将数据库中的信息放在表中
	jQuery("#searchByName").click(function(){
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
						+"</td><td>"+jsonObj[i].carport_sum
						+"</td><td>"+jsonObj[i].carport_free_num
						+"</td><td>"+jsonObj[i].address
						+"</td><td>"+jsonObj[i].phone
						+"</td><td>"+jsonObj[i].charge+"</td></tr>";
				}
				jQuery("#tb2").html(dataTable);
				if(dataTable==""){
					alert("您查询的停车场信息不存在");
				}
			}
		};
		var name=jQuery("#parkName").val();
		xmlhttp.open("GET","parkPHP/parkSelect.php?mode=part"+"&parkName="+name,true);
		xmlhttp.send();
	});
	
	
	

});