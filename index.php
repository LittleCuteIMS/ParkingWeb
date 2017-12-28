<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>登录页面</title>
	<link rel="stylesheet" href="css/style.default.css" type="text/css" />
	<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/custom/general.js"></script>
	<script type="text/javascript" src="js/custom/index.js"></script>
</head>
<body class="loginpage">
	<div class="loginbox">
    	<div class="loginboxinner">
            <div class="logo">
            	<h1 class="logo"><span>停了吗</span></h1>
				<span class="slogan">后台管理系统</span>
            </div><!--logo-->
            
            <br clear="all" /><br />
            
            <div class="nousername">
				<div class="loginmsg">请输入账户和密码.</div>
            </div><!--nousername-->
            
            <div class="nopassword">
				<div class="loginmsg">请输入密码.</div>
                <div class="loginf">
                    <div class="thumb"><img alt="" src="images/thumbs/avatar1.png" /></div>
                    <div class="userlogged">
                        <h4></h4>
                        <a href="index.php">账户不是 <span></span> 吗?</a> 
                    </div>
                </div><!--loginf-->
            </div><!--nopassword-->        
            <form id="login" action=" " method="post">
            	
                <div class="username">
                	<div class="usernameinner">
                    	<input type="text" name="username" id="username" />
                    </div>
                </div>    
                <div class="password">
                	<div class="passwordinner">
                    	<input type="password" name="password" id="password" />
                    </div>
                </div>
                
                <button>登录</button>
                
                <div class="keep"><input type="checkbox" /> 记住密码</div>
            
            </form>
             <div class="forget" align="center" ><a href="administrator/pwd_find.php"><font color="blank">忘记密码</font></a></div>
              <div class="regist" align="center" style="margin-top: 10px" ><a href="administrator/admin_register.php"><font color="blank">未注册？点此注册</font></a></div>
        </div><!--loginboxinner-->
    </div><!--loginbox-->
</body>
</html>
<?php
include_once 'user/link1.php';
if(isset($_POST['username'],$_POST['password'])){
    $name=$_POST["username"];
    $pwd=md5($_POST["password"]);
    $sql="select * from administrator where admin_name='$name' and admin_pwd='$pwd'";
    $result=mysqli_query($link, $sql);
    $datarow = mysqli_num_rows($result);
    if($datarow==1){
        $_SESSION["name"]=$name;
        $row = mysqli_fetch_array($result);
        $_SESSION["mobile"]=$row['mobile'];
        $_SESSION["email"]=$row['email'];  
        $_SESSION["date"]=$row['date'];
        $_SESSION["real_name"]=$row['real_name'];
        $_SESSION["confirm"]=$row['confirm'];
        $_SESSION["qq"]=$row['qq'];
        echo"<script> alert('欢迎您，管理员！');</script>";
        echo "<script> window.location.href = 'manageblog.php';</script>";
    }else{
        echo"<script> alert('登录失败');</script>";
        echo "<script> window.location.href = 'index.php';</script>";
    }
}
?>

