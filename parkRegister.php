<?php session_start();
if(!@$_SESSION["name"])
{?>
<script type="text/javascript">
    window.location.href="index.php";
    </script>
<?php } ?>
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
	<script type="text/javascript" src="js/custom/parkRegister.js"></script>
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
                    	<li><a href="editprofile.html">编辑资料</a></li>
                        <li><a href="accountsettings.html">账号设置</a></li>
                        <li><a href="help.html">帮助</a></li>
                        <li><a href="exit.php">退出</a></li>
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
        	<li><a href="messages.php" class="inbox">停车场信息查询</a></li>
            <li class="current"><a href="#" class="drafts">停车场信息注册</a></li>
        </ul>
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
            <h1 class="pagetitle">停车场信息注册</h1>
            
            <ul class="hornav">
            </ul>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">
			<form>
				停车场名称：<br />
				<input name="name" type="text" id="name" /><br />
				车位总数：<br />
				<input name="carportSum" type="text" id="carportSum" /><br />
				空闲车位总数：<br />
				<input name="carportFreeNum" type="text" id="carportFreeNum" /><br />
				地址：<br />
				<input name="address" type="text" id="address" /><br />
				联系电话：<br />
				<input name="phone" type="text" id="phone" /><br />
				收费标准：<br />
				<input name="charge" type="text" id="charge" /><br />
				<input type="button" value="注册" onclick="register()" />
				<input type="button" value="重置" onclick="withdraw()" />
			</form>

			<div id="regisFeedback"></div>		

        </div><!--contentwrapper-->

    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
