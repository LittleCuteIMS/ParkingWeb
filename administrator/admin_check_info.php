<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = '../index.php';</script>";
}?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>管理员中心</title>
    <link rel="stylesheet" href="../css/style.default.css" type="text/css" />
    <script type="text/javascript" src="../js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.alerts.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="../js/custom/general.js"></script>
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
            	<img src="../images/thumbs/avatar.png" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
            	<div class="avatar">
                	<a href=""><img src="../images/thumbs/avatarbig.png" alt="" /></a>
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
                        <li><a href="admin_check_info.php">账号</a></li>     
                        <li><a href="../manageblog.php">返回主页</a></li>  
                        <li><a href="../adminPHP/exit.php">退出</a></li>
                        
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->  
    
    <div class="header">
    	<ul class="headermenu">
            <li class="current"><a href="admin_check_info.php"><span class="icon icon-flatscreen"></span>管理员中心</a></li>  
        </ul>
         
    </div>
    <div class="vernav">
    	<ul>
        	<li class="current"><a href="admin_check_info.php" class="editor">个人信息</a></li>
        	<li><a href="accountsettings.php">账号设置</a></li>
            <li><a href="editprofile.php">编辑资料</a></li>
            <li><a href="security.php">安全设置</a></li>
           <li><a href="log.php">管理日志</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader notab">           
            <h1 class="pagetitle">管理员基本信息</h1>
        </div><!--pageheader-->
       <div id="contentwrapper" class="contentwrapper">
        <!--ajax实现局部页面刷新，将查询结果显示在"txtHint"div块中-->

            <div>
               <div class="slide_img"><img src="../images/thumbs/avatarbig.png" alt="" /></div>
               <div class="slide_content">
                                    	<font color="#f0801d" size="5"><?php echo $_SESSION["name"]; ?></font> 
                                        <p><font size="2">电子邮箱 ：<?php echo $_SESSION["email"]; ?> </font>
                                        <p><font size="2">创建日期 ：<?php echo $_SESSION["date"]; ?> </font>
                                        <p><font size="2">联系电话 ：<?php echo $_SESSION["mobile"]; ?> </font> 
                                      <div class="title" style="margin-top: 20px"><font color="#32415a" size="4">个人信息</font> 
                                        <p><font size="2">真实姓名 ：<?php echo $_SESSION["real_name"]; ?> </font>
                                        <p><font size="2">公司名称 ：<?php echo $_SESSION["confirm"]; ?> </font>
                                        <p><font size="2">qq号 ：<?php echo $_SESSION["qq"]; ?> </font>
                                        
                                        <p><a href="editprofile.php"><button class="stdbtn btn_lime">完善信息</button></a>   
                                        <a href="accountsettings.php "> <button class="stdbtn">修改信息</button></a></p> 
                                    </div>
                <div id="txtHint">

                </div> 
        </div><!--pageheader-->
   
            <div>        
             
            </div>

        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->
</div>
</body>
</html>

