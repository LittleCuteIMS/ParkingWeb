<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>密码找回页面</title>
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../css/theme.css" type="text/css" />
	<link rel="stylesheet" href="../css/style.default.css" type="text/css" />
	<script type="text/javascript" src="../js/plugins/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="../js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="../js/plugins/jquery.cookie.js"></script>
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

<body class="loginpage">
<div class="topheader orangeborderbottom5">
        <div class="left">
          <h1 class="logo">停了吗<span></span></h1>
            <div class="search">      
          </div><!--search-->         
            <br clear="all" />          
        </div><!--left--><!--right-->
    </div><!--topheader-->	
    <div id="textHint"></div>
   <div class="dialog">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse"  align="center"><font size="3">请填写您的新密码</font></p>
        <div class="panel-body">
            
            <form method="post" action="">
             <div class="form-group">
                    <label>请填写您注册的手机号</label>
                    <input type="text" class="form-control span12"  name="mobile" id="mobile">
                </div>
            <div class="form-group">
                    <label>新密码</label>
                    <input type="password" class="form-control span12"  name="pwd1" >
                </div>
                <div class="form-group">
                    <label>再次确认密码</label>
                    <input type="password" class="form-control span12" name="pwd2" >
                </div>
       
                <div class="form-group" align="center" >
                <input type="submit"   value="确认修改">              
                </div>
                </form>
                
                <p align="center"><a href="index.php">返回登录</a></p>
                <p align="center"><a href="pwd_find.php">选择其他方法找回密码</a></p>
                             
        </div>
         
    </div>
</div>

<?php 
if(!empty($_POST['pwd1']) && !empty($_POST['pwd2']) && !empty($_POST['mobile'])){ 
    $pwd1 = md5($_POST['pwd1']);
    $pwd2 = md5($_POST['pwd2']);
    $mobile = $_POST['mobile'];
    if($pwd1==$pwd2){
        include_once '../mysql_db/mysqliBySql.php';
        include_once '../user/link1.php';
        $sql = "UPDATE administrator SET admin_pwd='$pwd1' where mobile = '$mobile'";
        $result = updateBySql($sql);
        if($result){
            echo "<script> alert('密码修改成功，请前往登录页面！');</script>";
        }else{
            echo "<script> alert('密码修改失败！');</script>";
        }
    }else{
          echo "<script> alert('两次输入的密码不一致！');</script>";
    }   
}
?>
</body>
</html>
 