<?php session_start();
if(empty($_SESSION["name"])){
    echo "<script> window.location.href = 'index.php';</script>";
}?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>财务管理页面</title>
    <link rel="stylesheet" href="css/style.default.css" type="text/css" />
    <script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.alerts.js"></script>
    <script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="js/custom/general.js"></script>   
</head>

<body>

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
                        	切换主题： <br />
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
                <li><a href="manageblog.php"><span class="icon icon-pencil"></span>用户管理</a></li>
                <li><a href="messages.php"><span class="icon icon-message"></span>停车场管理</a></li>
                <li class="current"><a href="financial.php"><span class="icon icon-chart"></span>财务管理</a></li>
            </ul>            
        </div><!--header-->
        
        <div class="vernav">
            <ul>
                <li><a href="financial.php">账单管理</a></li>
                <li class="current"><a href="balance.php" class="editor">余额管理</a>
                    <span class="arrow"></span>
                    <ul id="formsub">
                        <li><a href="rechargeRecord.php">充值记录</a></li>
                        <li><a href="">查询账户余额</a></li>
                    </ul>
                </li>
            </ul>
            <a class="togglemenu"></a>
        </div><!--leftmenu-->

        <div class="centercontent">

            <div class="pageheader">            
                <ul class="hornav">
                    <li class="current"><a href="#compose">查询账户余额</a></li>
                </ul>
            </div><!--pageheader-->
            
            <div  id="contentwrapper" class="contentwrapper">
                
                <div id="compose" class="subcontent">
                    <form action="" style="margin-bottom: 20px">
                        请输入账户手机号：<p>
                        <input type="text" name="userPhone" id="mobile"/>
                        <input type="button" value="查询" id="btn"/>
                    </form>
                
                    <table cellpadding="0" cellspacing="0" border="0" class="stdtable mailinbox">
                    <colgroup>
                        <col class="con1" width="20%"/>
                        <col class="con0" width="25%" />
                        <col class="con1" width="30%"/>
                        <col class="con0" width="25%"/>
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">用户编号</th>
                            <th class="head1">用户昵称</th>
                            <th class="head0">手机号</th>
                            <th class="head1">账户余额</th>
                        </tr>
                    </thead>
                    <tbody id="table3">
                    </tbody>
                    </table>   
                </div>
                
            </div><!--contentwrapper-->

        </div><!--centercontent-->
        
    </div><!--bodywrapper-->

</body>
</html>
