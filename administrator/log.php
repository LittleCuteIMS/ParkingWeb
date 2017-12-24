<?php session_start();
if(empty($_SESSION["name"]))
{ echo "<script> window.location.href = 'index.php';</script>";
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
    <script type="text/javascript" src="../js/custom/log.js"></script>
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
            <li class="current"><a href="accountsettings.php"><span class="icon icon-flatscreen"></span>管理员中心</a></li>  
        </ul>   
    </div>
    
    <div class="vernav">
    	<ul>
        	<li><a href="admin_check_info.php" class="editor">个人信息</a></li>
            <li><a href="accountsettings.php">账号设置</a></li>
            <li><a href="editprofile.php">编辑资料</a></li>
            <li><a href="security.php">安全设置</a></li>
            <li class="current"><a href="log.php">管理日志</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->

    
     <div class="centercontent">
    <div class="pageheader" >
        	<span class="profilepic"><img src="../images/thumbs/avatar3.png" alt="" /></span>
            <div class="profiletitle">
            <h1 class="pagetitle">管理日志</h1> 
            </div>
            <br><ul class="hornav">
                <li class="current"><a href="#log_write">日志记录</a></li>
                <li><a href="#log_check">日志查询</a></li>
            </ul>
        </div><!--pageheader-->
        
       <div  id="contentwrapper" class="contentwrapper">
        
            <div id="log_write" class="subcontent" >
            <form  method="post" >
                               记录时间：<input type="text" id="datepick" name="log_date"/>   
                <p>记录人：<input type="text" name="recorder"/>          
                <p>记录内容：
                <p><textarea rows="10" cols="30" name="log" ></textarea>
                <P><button class="stdbtn">保存</button>
                 </form>  
 <?php
if($_POST){
    $log_date = $_POST['log_date'];
    $log = $_POST['log'];
    $recorder = $_POST['recorder'];  
    include_once '../user/link1.php';
    $sql = "INSERT INTO admin_log (recorder,log_date,log) VALUES ('$recorder','$log_date','$log')";
    $result = mysqli_query($link, $sql); 
    if($result==true){
        echo "<script> alert('保存成功');</script>";
    }else{
        echo"<script> alert('保存失败');</script>";
    }
}
?>		 
       </div>

        <div id="log_check" class="subcontent" style="display: none" >
        
                        	<form id="check"  method="get"> 
                        	从: &nbsp;<input type="text" id="datepickfrom" /> &nbsp; &nbsp; 到: &nbsp;<input type="text" id="datepickto" />
                        	&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="button" onclick="timeGet()" value="查询"  /> &nbsp; &nbsp; 
                        	<input type="button" onclick="withdraw()" value="清除"  />
                       </form>
                        
                        <div id="logMessage" class="chatmessage radius2" style="margin-top: 20px">
                   		 <table cellpadding="0" cellspacing="0" border="0" align="center" class="stdtable mailinbox">
                    <colgroup>
                        <col class="con1" width="15%"/>
                        <col class="con0" width="10%" />
                        <col class="con1" width="75%"/>                                 
                    </colgroup>
                    <thead>
						<tr >
							<th class="head0">记录日期</th>
							<th class="head1">记录者</th>
							<th class="head0">记录内容</th>	
						</tr>
                    </thead>
                    <tbody id="logtable">
                    </tbody>
                </table>   
                   </div><!--chatmessage-->
         </div>
              
    </div><!--contentwrapper-->
    </div><!--centercontent-->

</div><!--bodywrapper-->
   
   
</body>
</html>


 
  