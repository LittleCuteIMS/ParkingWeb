<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>注册页面</title>
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
	<div class="loginbox">
    	<div class="loginboxinner">
        	
          <div class="logo">
            	<h1 class="logo"><span>停了吗</span></h1>
				<span class="slogan">后台管理系统</span>
            </div><!--logo-->
             
          <form id="formId" action="" method="post">            	
                <div class="username"  >
                	<div class="usernameinner" >
                    <input type="text"   placeholder="用户名" name="adminname"  id="username" />
                    </div>            
                </div>
               
				<div class="usermail" >
				<div class="usermailinner" >
				<input type="text"   placeholder="邮箱" name="email"  id="email" />
				</div>
                	</div>
                    
              <div class="userphone" >
                	<div class="userphoneinner">
                    	<input type="text" height="25px" name="phone" placeholder="联系电话"  id="phone" />
                    </div>  
              </div>
              <div class="password" >
                	<div class="passwordinner" >
                    	<input type="password"   placeholder="密码" name="pwd" id="pwd" />
                    </div>  
              </div>
                <button>注册</button>          
            </form>
               <div class="regist" align="center"style="margin-top:10px;" ><a href="../index.php"><font color="blank">已有账号，点击登录</font></a></div>
       
        </div><!--loginboxinner-->
    </div><!--loginbox-->
    
<?php
include_once '../mysql_db/mysqliBySql.php';
include_once '../user/link1.php';
if(!empty($_POST["adminname"]) && !empty($_POST["phone"]) && !empty($_POST["email"]) && !empty($_POST["pwd"])){
    $admin_name=$_POST["adminname"];
    $mobile=$_POST["phone"];
    $email=$_POST["email"];
    $admin_pwd=md5($_POST["pwd"]);
    //先判断是否已经有过相同的号码注册过
    $sql1="select * from administrator where mobile='$mobile'";
    $comeout=selectSql($sql1);
    if($comeout){
        echo "<script>
            alert('手机号'+$mobile+'已存在');
            window.location.href = 'admin_register.php';</script>";
        }else{
           //没有则进行注册            
           $registDate=date("Y-m-d"); //格式化日期
           $sql2="insert into administrator (admin_name,mobile,email,admin_pwd,date)
                 values ('$admin_name','$mobile','$email','$admin_pwd','$registDate')";
          $result=insertBySql($sql2);
           if($result==true){
                $_SESSION["name"]=$admin_name;
                echo"<script>
                     alert('注册成功');
                     window.location.href = '../index.php';</script>";
                }else {
                    echo"<script >
                         alert('注册失败');
                         window.location.href = 'admin_register.php';</script>";
                    }
           }
}?>
    
</body>
</html>

