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
                        <li><a href="../adminPHP/exit.php">退出</a></li>           
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
            <li class="current"><a href="accountsettings.php">账号设置</a></li>
            <li><a href="editprofile.php">编辑资料</a></li>
            <li><a href="security.php">安全设置</a></li>
          <li><a href="log.php">管理日志</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu-->
    <div class="centercontent">
    <div class="pageheader" >
        	<span class="profilepic"><img src="../images/thumbs/avatar2.png" alt="" /></span>
            <div class="profiletitle">
            <h1 class="pagetitle">信息修改</h1> 
            </div>
            <br><ul class="hornav">
                <li class="current"><a href="#profile">邮箱修改</a></li>
                <li><a href="#revise_pwd">重置密码</a></li>
            </ul>
        </div><!--pageheader-->
        
       <div class="contentwrapper"> 
          
            <div id="profile" class="subcontent" >
               <div class="widgetbox">
                            <div class="title"><font color="#f0801d" size="4">新的邮箱地址</font> </div>
                            <div class="widgetcontent">
                                <ul class="recent_list"></ul>                                   
                              
                              <form action="" method="post">  
                               <div class="form-group" style="margin-right: 600px">   
                                          新的邮箱地址：
                <br><input type="text"  class="form-control"  name="newemail" />   
                <p><button class="stdbtn">确认修改</button></p>
                </div>
                </form>  
                 <?php  
                 include_once '../user/link1.php';
                 if(!empty($_POST['newemail'])){                  
                     $newemail=$_POST['newemail'];
                     $oldemail=$_SESSION['email'];
                     $sql="UPDATE administrator SET email = '$newemail' WHERE email = '$oldemail'";
                     mysqli_query($link, $sql);
                     $sql1="select * from administrator where email='$newemail'";
                     $result1=mysqli_query($link, $sql1);
                     if(mysqli_num_rows($result1)){
                         $_SESSION['email']=$newemail;
                         echo "<script> alert('邮箱地址修改成功');</script>";
                     }else{
                         echo"<script> alert('邮箱地址修改失败');</script>";
                     }
                 } 
                 ?>                                                                
                            </div><!--widgetcontent-->
                        </div><!--widgetbox-->    
        </div>

        <div id="revise_pwd" class="subcontent" style="display: none" >
         <div class="widgetbox"  id="#revise_pwd">
                            <div class="title"><font color="#f0801d" size="4">密码修改</font> </div>
                            <div class="widgetcontent">
                                <ul class="recent_list">  </ul>  
                                <form id="formid"  method="post" action="" >     
                                         <div class="form-group" style="margin-right: 600px">
                   <font size="2"> 当前密码：</font>
                    <br><input type="password" class="form-control" name="pwd1" id="pwd2">
                </div>
                <div class="form-group" style="margin-right: 600px">
                   <font size="2"> 新密码：</font>
                <br><input type="password" class="form-control" name="pwd2" id="pwd2"/> 
                </div>
                <div class="form-group" style="margin-right: 600px">
                    <font size="2"> 确认密码：</font>
                <br><input type="password" class="form-control" name="pwd3" id="pwd3"/> 
                </div>                                                                                                                                                                                         
                  <p><input type="button" class="stdbtn" id="sub" onclick="submit()" value="确认修改"></p> 
                   </form>
                  <?php 
                  include_once '../user/link1.php';
                  if(!empty($_POST['pwd1']) & !empty($_POST['pwd2']) & !empty($_POST['pwd3']) ){
                      $pwd1=md5($_POST['pwd1']);
                      $pwd2=md5($_POST['pwd2']);
                      $pwd3=md5($_POST['pwd3']);
                      if($pwd2==$pwd3){
                         $sql="UPDATE administrator SET admin_pwd = '$pwd2' WHERE admin_pwd = '$pwd1'";
                         $result=mysqli_query($link, $sql);
                         if($result==true){
                             echo "<script> alert('密码修改成功');</script>";
                         }else{
                             echo "<script> alert('密码修改失败');</script>";
                         }
                      }else{
                          echo"<script> alert('两次新密码不一致');</script>";
                         }
                  }    
                  ?>  
                     </div><!--widgetcontent-->
                        </div><!--widgetbox--> 
        </div>    
    </div><!--contentwrapper-->
    </div><!--centercontent-->   
</div><!--bodywrapper-->
</body>
</html>

