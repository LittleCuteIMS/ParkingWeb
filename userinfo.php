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
    <script type="text/javascript" src="js/custom/userdata.js"></script>
    <script type="text/javascript" src="js/custom/dateinquiry.js"></script>
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
        
    </div><!--header-->
    
    <div class="vernav">
    	<ul>
        	<li><a href="manageblog.php" >用户手机号查询</a></li>
            <li class="current"><a href="userinfo.php">注册时间查询</a></li>
            <li ><a href="car_location.php">用户车辆归属</a></li>
            <li><a href="user_regist_info.php">新增用户</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">

        <div class="pageheader notab">           
            <h1 class="pagetitle">用户变动信息查询</h1>
        </div><!--pageheader-->
        
        <div id="contentwrapper" class="contentwrapper">  
                <form  id="check"  method="post" >                 
                 <div class="form-group" style=" float:left">  起始日期:
                 <input type="text" name="date1"  id="datepickfrom" />&nbsp;&nbsp;
                </div>           
                <div class="form-group" style=" float:left">  截止日期:
               <input type="text" name="date2"  id="datepickto"/>&nbsp;&nbsp;&nbsp;&nbsp;
               </div>
               <div class="form-group">
               <input type="button" id="time_sub" value="查询"  />
                <input type="button" onclick="withdraw()" value="取消"  /> 
                </div>
                </form>
                <div style="margin-top: 15px">
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