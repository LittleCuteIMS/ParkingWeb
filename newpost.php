<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'index.php';</script>";
}?>

<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>用户信息管理页面</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/plugins/tinymce/jquery.tinymce.js"></script>
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function(){

        	///// TINYMCE EDITOR /////
        	jQuery('textarea.tinymce').tinymce({
        	// Location of TinyMCE script
        	script_url : 'js/plugins/tinymce/tiny_mce.js',

        	// General options
        	theme : "advanced",
        	skin : "themepixels",
        	plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
        	inlinepopups_skin: "themepixels",
        	// Theme options
        	theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,outdent,indent,blockquote,formatselect,fontselect,fontsizeselect",
        	theme_advanced_buttons2 : "pastetext,pasteword,|,bullist,numlist,|,undo,redo,|,link,unlink,image,help,code,|,preview,|,forecolor,backcolor,removeformat,|,charmap,media,|,fullscreen",
        	theme_advanced_buttons3 : "",
        	theme_advanced_toolbar_location : "top",
        	theme_advanced_toolbar_align : "left",
        	theme_advanced_statusbar_location : "bottom",
        	theme_advanced_resizing : true,

        	// Example content CSS (should be your site CSS)
        	content_css : "css/plugins/tinymce.css",

        	// Drop lists for link/image/media/template dialogs
        	template_external_list_url : "lists/template_list.js",
        	external_link_list_url : "lists/link_list.js",
        	external_image_list_url : "lists/image_list.js",
        	media_external_list_url : "lists/media_list.js",

        	// Replace values for the template plugin
        	template_replace_values : {
        		username : "Some User",
        		staffid : "991234"
        	}
        	});
        		
        		
        	jQuery('.editornav a').click(function(){
        		jQuery('.editornav li.current').removeClass('current');
        		jQuery(this).parent().addClass('current');
        		if(jQuery(this).hasClass('visual'))
        			jQuery('#elm1').tinymce().show();
        		else
        			jQuery('#elm1').tinymce().hide();
        		return false;
        	});
        });</script>
    <script type="text/javascript">
        function showHint(str)
        {
            var xmlhttp;
            if (str.length==0)
              { 
              document.getElementById("txtHint").innerHTML="";
              return;
              }
            if (window.XMLHttpRequest)
              {// code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp=new XMLHttpRequest();
              }
            else
              {// code for IE6, IE5
              xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
              }
            xmlhttp.onreadystatechange=function()
              {
              if (xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
                }
              }
            xmlhttp.open("GET","user/newpost.php?q="+str,true);
            xmlhttp.send();
        }</script></script>
    <!--[if IE 9]>
        <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
    <![endif]-->
    <!--[if IE 8]>
        <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
    <![endif]-->
    <!--[if lt IE 9]>
    	<script src="js/plugins/css3-mediaqueries.js"></script>
    <![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">停了吗</h1>
            <span class="slogan">后台管理系统</span>
            
            <div class="search">
            	<form action="" method="post">
                	<input type="text" name="keyword" id="keyword" value="请输入" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
        	<!--<div class="notification">
                <a class="count" href="notifications.html"><span>9</span></a>
        	</div>
			-->
        	<div class="userinfo">
            	<img src="images/thumbs/avatar.png" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->

            <div class="userinfodrop">
            	<div class="avatar">
                	<img src="images/thumbs/avatarbig.png" alt="" />
                </div><!--avatar-->
                <div class="userdata">
                	<h4>管理员</h4>
                    <span class="email">youremail@yourdomain.com</span>
                    <ul>
                    	<li><a href="admin_check_info.php">账号</a></li> 
                         <li><a href="help.php">帮助</a></li>   
                          <li><a href="log.php">管理日志</a></li>   
                        <li><a href="exit.php">退出</a></li>
                        </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
            <li class="current"><a href="manageblog.php"><span class="icon icon-pencil"></span>用户管理</a></li>
            <li><a href="messages.php"><span class="icon icon-message"></span>停车场管理</a></li>
            <li><a href="financial.php"><span class="icon icon-chart"></span>财务管理</a></li>
        </ul>
   
    </div><!--header-->
    
    <div class="vernav">
    	<ul>
        	<li><a href="manageblog.php">用户手机号查询</a></li>
            <li ><a href="userinfo.php">注册时间查询</a></li>
            <li class="current"><a href="newpost.php">用户停车信息</a></li>
            <li><a href="">其他</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader notab">
            <h1 class="pagetitle">用户停车信息查询</h1>           
        </div><!--pageheader-->
        
        <div class="contentwrapper">
        	<div class="two_third">
                 <form action="" method="post">
                     <p>请在下面的输入框中键入查询关键字：</p>
                    <input type="text" id="txt1" onkeyup="showHint(this.value)" />
                    <p>建议：<span id="txtHint"></span></p>
                    
                    <br /><br />
                    
                    <!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
                    <div>
                        <textarea id="elm1" name="elm1" rows="10" cols="60" style="width: 70%" class="tinymce">
                        </textarea>
                    </div>
            
            
                    <br /><br />
                    <input type="submit" name="save" value="查询" />
                    <input type="reset" name="reset" value="取消" />
                 </form>
             </div><!--two_third-->
        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
