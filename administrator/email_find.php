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
 
  <div class="dialog">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse"  align="center"><font size="3">输入您注册的电子邮箱，找回密码</font></p>
        <div class="panel-body">
         
    <form method="post" id="mailform" action="">
  
               <div class="form-group">
                   <font size="2">您注册的电子邮箱是:</font>
                    <p><input type="text" class="form-control span12" name="email" id="email"></p>  
                </div>
                
                <p align="center"><input type="submit" value="提 交" id="sub_btn"></p> 
   </form> 
   <span id="backdata"></span>
  <div class="form-group" align="center" style="margin-top: 10px" >
                 <a href="../index.php">返回登录</a>
  </div>  
</div>
</div>
</div>
<?php
    //发送邮件
    function sendmail($time,$email,$url){
        include_once("../adminPHP/smtp.class.php");
        $smtpserver = "smtp.163.com"; //SMTP服务器，如smtp.163.com
        $smtpserverport = 25; //SMTP服务器端口
        $smtpusermail = "m18780073534@163.com"; //SMTP服务器的用户邮箱
        $smtpuser = "m18780073534"; //SMTP服务器的用户帐号
        $smtppass = "cvfgt666"; //SMTP服务器的用户密码
        $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass);
        //这里面的一个true是表示使用身份验证,否则不使用身份验证.
        $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
        $smtpemailto = $email;
        $smtpemailfrom = $smtpusermail;
        $emailsubject = "ParkingWeb - 找回密码";
        $emailbody = "亲爱的".$email."：<br/>您在".$time."提交了找回密码请求。请点击下面的链接重置密码
（按钮24小时内有效）。<br/><a href='".$url."'target='_blank'>".$url."</a>";
        $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
        return $rs;
    }
    if(!empty($_POST['email'])){
        $email = stripslashes(trim($_POST['email']));//stripslashes删除反斜杠，trim() 函数移除字符串两侧的空白字符或其他预定义符
        $preg = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/'; //匹配Email
        if(preg_match($preg, $email)){
            include_once '../user/link1.php';//连接数据库
            $sql = "select * from administrator where email ='$email'";
            $query = mysqli_query($link, $sql);
            $num = mysqli_num_rows($query);
            if($num==0){//该邮箱尚未注册！
                echo "<script> alert('该邮箱尚未注册');</script>";
                exit;
            }else{
                $row = mysqli_fetch_array($query);
                //$getpasstime = time();
                $uid = $row['id'];
                $token = md5($uid.$row['admin_name'].$row['admin_pwd']);//组合验证码
                $url = "http://localhost/ParkingWeb/administrator/reset.php?email=".$email."&token=".$token;//构造URL
                $time = date('Y-m-d H:i');
                $result = sendmail($time,$email,$url);
                if($result==1){//邮件发送成功
                    echo "<script> alert('系统已向您的邮箱发送了一封邮件，请登录到您的邮箱及时重置您的密码');</script>";
                    //echo "系统已向您的邮箱发送了一封邮件<br/>请登录到您的邮箱及时重置您的密码！";
                    //更新数据发送时间
                    //mysql_query("update administrator set `getpasstime`='$getpasstime' where id='$uid '");
                }else{
                    echo "<script> alert('发送失败');</script>";
                }
            }     
        }else{
            echo "<script> alert('请填写正确的邮箱');</script>";
        }   
    }
    

?>
</body>
</html>
 