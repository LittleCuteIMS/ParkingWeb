<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'administrator/index.php';</script>";
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
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript" src="js/custom/blog.js"></script>
    <script type="text/javascript" src="js/custom/selectuser.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.form.js"></script>
    
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
            <!--div class="notification">
                <a class="count" href="ajax/notifications.html"><span>9</span></a>
            </div-->
        	<div class="userinfo">
            	<img src="images/thumbs/avatar.png" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="images/thumbs/avatarbig.png" alt="" /></a>
                    <div class="changetheme">
                    	切换主题: <br />
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
            <li class="current"><a href="manageblog.php"><span class="icon icon-pencil"></span>用户管理</a></li>
            <li><a href="messages.php"><span class="icon icon-message"></span>停车场管理</a></li>
            <li><a href="financial.php"><span class="icon icon-chart"></span>财务管理</a></li>
        </ul>       
        
    </div><!--header-->
    
    <div class="vernav">
    	<ul>
        	<li><a href="manageblog.php" >用户手机号查询</a></li>
            <li class="current"><a href="userinfo.php">注册时间查询</a></li>
            <li ><a href="newpost.php">用户停车信息</a></li>
            <li><a href="manageblog.php">其他</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">

        <div class="pageheader notab">           
            <h1 class="pagetitle">用户变动信息查询</h1>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
        <!--ajax实现局部页面刷新，将查询结果显示在"txtHint"div块中-->

            <div>
                <form  id="check"  method="get" "margin-top:15px;"> 
                <h3 >请输入查询时间</h3>
                <p>起始日期:
                &nbsp;<input type="text" name="date1" value=""  id="datepickfrom" />
               &nbsp; &nbsp; 截止日期:
                &nbsp;<input type="text" name="date2" value=""   id="datepickto"/>
               &nbsp;&nbsp;&nbsp; <input type="button" onclick="timeGet()" value="查询"  />
                <input type="button" onclick="withdraw()" value="取消"  /> 
                </form>
                 <table cellpadding="0" cellspacing="0" border="0" align="center" class="stdtable mailinbox">
                    <colgroup>
                        <col class="con1" width="30%"/>
                        <col class="con0" width="10%" />
                        <col class="con1" width="30%"/>
                        <col class="con0" width="30%"/>                    
                    </colgroup>
                    <thead>
						<tr>
							<th class="head0">注册日期</th>
							<th class="head1">id</th>
							<th class="head0">昵称</th>
							<th class="head1">手机号码</th>	
						</tr>
                    </thead>
                    <tbody id="Datetable">
                    </tbody>
                </table>   
                 <br />
                <div id="txtHint"></div> 

            </div>            

        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>