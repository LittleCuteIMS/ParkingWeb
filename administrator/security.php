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
            <li><a href="editprofile.php">编辑资料</a></li>
            <li class="current"><a href="security.php">安全设置</a></li>
           <li><a href="log.php">管理日志</a></li>
        </ul>
        <a class="togglemenu"></a>
    </div><!--leftmenu--> 
    <div class="centercontent">  
        <div class="pageheader">
        	<span class="profilepic"><img src="../images/thumbs/avatar4.png" alt="" /></span>
            <div class="profiletitle">
            <h1 class="pagetitle">设置密保</h1> 
             <div style="margin-top: 10px"><span class="pagedesc">设置密保以便您能快速找回密码！</span></div>  
            </div>
            <ul class="hornav">   
            </ul>
        </div><!--pageheader-->
       <div id="contentwrapper" class="contentwrapper">
       <div class="form-group" style="margin-right: 200px;margin-left: 200px">                                       
                 <form action=""  method="post">     
                  <font size="2">您母亲的姓名是？</font>
                <br><input type="text" class="form-control" name="mother_name" />             
                       <p><font size="2">您初中班主任的姓名是？</font>
              <br><input type="text" class="form-control" name="teacher_name" /> 
                     <p><font size="2">您最喜爱的一句古诗是？</font>
              <br><input type="text" class="form-control" name="poem" />          
                <p align="center"><button class="stdbtn">确认提交</button>
                </form> 
                </div>
        </div><!--contentwrapper-->
    </div><!--centercontent-->
</div><!--bodywrapper-->
<?php 
include_once '../user/link1.php';
if(!empty($_POST['mother_name']) && !empty($_POST['teacher_name']) && !empty($_POST['poem'])){
    $mother_name = $_POST['mother_name'];
    $teacher_name = $_POST['teacher_name'];
    $poem =  $_POST['poem'];
    $mobile = $_SESSION["mobile"];
    $check="SELECT * FROM security WHERE mobile='$mobile'";
    $securityCheck=mysqli_query($link, $check);
    if($securityCheck){
        echo "<script> alert('您已设置过密保问题');</script>";
    }else{
        $sql = "INSERT INTO security (mother_name,teacher_name,poem,mobile)
                VALUES('$mother_name','$teacher_name','$poem','$mobile') ";
        mysqli_query($link, $sql);
        $sql1 = "SELECT * FROM security WHERE mobile = '$mobile'";
        $result = mysqli_query($link, $sql1);
        if(mysqli_num_rows($result)){
            echo "<script> alert('设置密保成功');</script>";
        }else{
            echo "<script> alert('设置密保失败');</script>";
        }
        }  
}
?>
</body>
</html>

 