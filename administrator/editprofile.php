 <?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'index.php';</script>";
}?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>资料编辑页面</title>
    <link rel="stylesheet" href="../css/style.default.css" type="text/css" />
    <script type="text/javascript" src="../js/plugins/jquery-1.7.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.cookie.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.alerts.js"></script>
    <script type="text/javascript" src="../js/plugins/jquery.uniform.min.js"></script>
    <script type="text/javascript" src="../js/custom/general.js"></script>
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
                        <li><a href="exit.php">退出</a></li>
                        
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
        	<li><a href="admin_check_info.php" class="editor">个人信息</a></li>
        	<li><a href="accountsettings.php">账号设置</a></li>
            <li class="current"><a href="editprofile.php">编辑资料</a></li>
            <li><a href="security.php">安全设置</a></li>
            <li><a href="log.php">管理日志</a></li>
       </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    
    <div class="centercontent">
    
        <div class="pageheader">
        	<span class="profilepic"><img src="../images/thumbs/avatar1.png" alt="" /></span>
            <div class="profiletitle">
            <h1 class="pagetitle">资料完善</h1>   
            </div>
            <ul class="hornav">   
            </ul>
        </div><!--pageheader-->
       <div id="contentwrapper" class="contentwrapper">
        <!--ajax实现局部页面刷新，将查询结果显示在"txtHint"div块中-->
                                                     
                 <form action=""  method="post">     
                                         真实姓名：
                <br><input type="text" name="realname" />  
                   <p> 所在公司：
              <br><input type="text" name="confirm" />  
                       <p> qq号：
              <br><input type="text" name="qq" />                 
                <p><button class="stdbtn">确认提交</button>
                </form>  

        </div><!--contentwrapper-->
    
    </div><!--centercontent-->
    
    
</div><!--bodywrapper-->
<?php
include_once '../mysql_db/mysqliBySql.php';
include_once '../user/link1.php';
if(!empty($_POST['realname']) && !empty($_POST['confirm']) && !empty($_POST['qq'])){
    $realname = $_POST['realname'];
    $confirm = $_POST['confirm'];
    $qq =  $_POST['qq'];
    $mobile = $_SESSION["mobile"];
    $sql = "UPDATE administrator SET real_name= '$realname', confirm = '$confirm', qq = '$qq' 
            WHERE mobile = '$mobile'";
    mysqli_query($link, $sql);
    $sql1 = "SELECT * FROM administrator WHERE mobile = '$mobile'";
    $result = mysqli_query($link, $sql1);  
    $row = mysqli_fetch_array($result);
    $check_realname = $row['real_name'];
    $check_confirm = $row['confirm'];
    $check_qq = $row['qq'];   
    if(!empty($check_realname) && !empty($check_confirm) && !empty($check_qq)){
        $_SESSION["real_name"]=$row['real_name'];
        $_SESSION["confirm"]=$row['confirm'];
        $_SESSION["qq"]=$row['qq'];
        echo "<script> alert('完善信息成功');</script>";
    }else{
        echo "<script> alert('完善信息失败');</script>";
    }
}
?>
</body>
</html>

 