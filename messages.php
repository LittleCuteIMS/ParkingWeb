<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'index.php';</script>";
}?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>停车场管理页面</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript" src="js/custom/messages.js"></script>
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
                	<a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	切换主题 <br />
                    	<a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                	<h4>管理员</h4>
                    <span class="email">youremail@yourdomain.com</span>
                    <ul>
                    	<li><a href="administrator/admin_check_info.php">账号</a></li> 
                         <li><a href="administrator/help.php">帮助</a></li>    
                        <li><a href="administrator/exit.php">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    
    
    <div class="header">
    	<ul class="headermenu">
            <li><a href="manageblog.php"><span class="icon icon-pencil"></span>用户管理</a></li>
            <li class="current"><a href="#"><span class="icon icon-message"></span>停车场管理</a></li>
            <li><a href="financial.php"><span class="icon icon-chart"></span>财务管理</a></li>
		</ul>
        
    </div><!--header-->
    <div class="vernav iconmenu">
    	<ul>
        	<li class="current"><a href="#" class="inbox">停车场信息查询</a></li>
            <li><a href="parkRegister.php" class="drafts">停车场信息注册</a></li>
            <li><a href="park_income.php" class="drafts">停车场收入分析</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">停车场信息</h1>
            
            <ul class="hornav">
                <li class="current"><a class="searchAll" href="#inbox">所有查询</a></li>
                <li><a href="#compose">部分查询</a></li>
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
             
             <div id="inbox" class="subcontent">
                <table cellpadding="0" cellspacing="0" border="0" class="stdtable mailinbox">
                    <colgroup>
                        <col class="con1" width="5%"/>
                        <col class="con0" width="15%" />
                        <col class="con1" width="5%"/>
                        <col class="con0" width="5%"/>
                        <col class="con1" width="40%"/>
                        <col class="con0" width="20%"/>
                        <col class="con1" width="10%"/>
                    </colgroup>
                    <thead>
						<tr>
							<th class="head0">id</th>
							<th class="head1">停车场名称</th>
							<th class="head0">车位总数</th>
							<th class="head1">空闲车位数</th>
							<th class="head0">地址</th>
							<th class="head1">联系电话</th>
							<th class="head0">收费标准</th>
						</tr>
                    </thead>
                    <tbody id="tb1">
                    </tbody>
                </table>             
             </div>
             <div id="compose" class="subcontent" style="display: none">
             	<form action="" style="margin-bottom: 20px">
             		请输入停车场名称：
             		<input type="text" name="parkName" id="parkName"/>
             		<input type="button" value="查询" id="searchByName"/>
             	</form>
             	
             	<table cellpadding="0" cellspacing="0" border="0" class="stdtable mailinbox">
                    <colgroup>
                        <col class="con1" width="5%"/>
                        <col class="con0" width="15%" />
                        <col class="con1" width="5%"/>
                        <col class="con0" width="5%"/>
                        <col class="con1" width="40%"/>
                        <col class="con0" width="20%"/>
                        <col class="con1" width="10%"/>
                    </colgroup>
                    <thead>
						<tr>
							<th class="head0">id</th>
							<th class="head1">停车场名称</th>
							<th class="head0">车位总数</th>
							<th class="head1">空闲车位数</th>
							<th class="head0">地址</th>
							<th class="head1">联系电话</th>
							<th class="head0">收费标准</th>
						</tr>
                    </thead>
                    <tbody id="tb2">
                    </tbody>
                </table>   
             </div>
        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
