<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'index.php';</script>";
}?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>停车场管理</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script> 
    <script type="text/javascript" src="js/custom/echarts.js"></script>
    <script type="text/javascript" src="js/custom/park_income.js"></script>
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
                	<h4><?php echo $_SESSION["name"];?></h4>
                    <br><span class="email"><?php echo $_SESSION["email"]; ?></span>
                    <ul>
                       <li><a href="administrator/admin_check_info.php">账号</a></li> 
                         <li><a href="help.php">帮助</a></li>  
                        <li><a href="adminPHP/exit.php">退出</a></li>
              
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
    </div>
    <div class="vernav">
    	<ul>
        	<li><a href="messages.php" class="inbox">停车场信息查询</a></li>
            <li><a href="parkRegister.php" class="drafts">停车场信息注册</a></li>
            <li class="current"><a href="park_income.php" class="drafts">停车场收入分析</a></li>
            <li><a href="carport_info.php" class="drafts">停车场车位情况</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    <div class="centercontent">  
<div id='main' style="width: 1000px; height: 500px; float:left" ></div>
</div><!--centercontent-->
</div><!--bodywrapper-->

</body>
</html>