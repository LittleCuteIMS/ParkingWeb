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
    <script type="text/javascript" src="js/custom/general.js"></script>
    <script type="text/javascript" src="js/custom/blog.js"></script>
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
                	<h4><?php echo $_SESSION["name"];?></h4>
                    <br><span class="email"><?php echo $_SESSION["email"]; ?></span>
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
         
    </div>
    <div class="vernav">
    	<ul>
        	<li class="current"><a href="manageblog.php" class="editor">用户注册信息查询</a></li>
            <li><a href="userinfo.php">注册时间查询</a></li>
            <li><a href="car_location.php ">用户停车信息</a></li>
            <li><a href="user_regist_info.php">新增用户</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader notab">           
            <h5 class="pagetitle">请输入查询号码</h5>
        </div><!--pageheader-->
       <div id="contentwrapper" class="contentwrapper">
        <!--ajax实现局部页面刷新，将查询结果显示在"txtHint"div块中-->
            <div>
                <form   method="get" action="user/userinfo.php"> 查询号码
                <div class="form-group" style="margin-right: 100px">
               <input type="text" name="userTelephone" value=""  id="userTelephone" />
               </div> 
               <div style="margin-top: 5px">
               <input type="button" onclick="phoneGet()"  value="查询"  />
                <input type="button" onclick="cancle()" value="取消"  />
                </div>
                </form>
                <div style="margin-top: 5px">
                <table class="stdtable mailinbox">
                    <colgroup>
                        <col class="con1" width="20%"/>
                        <col class="con0" width="12%" />
                        <col class="con1" width="20%"/>
                        <col class="con0" width="20%"/>
                        <col class="con1" width="28%"/>      
                    </colgroup>
                    <thead>
						<tr>
							<th class="head0">手机号</th>
							<th class="head1">id</th>
							<th class="head0">昵称</th>
							<th class="head1">余额</th>
							<th class="head0">注册时间</th>		
						</tr>
                    </thead>
                    <tbody id="Infotable">    
                    </tbody>
                </table>   
                <br />
        </div>
   
            <div>   
             
            </div>
</div>
        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->

</body>
</html>
