<!DOCTYPE html>
<html>
<head>
<?php 
if(!empty($_POST['email'])){
    $email = stripslashes(trim($_POST['email']));//stripslashes删除反斜杠，trim() 函数移除字符串两侧的空白字符或其他预定义符
    $preg = '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/'; //匹配Email
    if(!preg_match($preg, $email)){
        echo "<script> alert('请填写正确的邮箱..');</script>";
        echo "<script> window.location.href = '../administrator/email_find.php';</script>";
    }else{
        include_once '../user/link1.php';//连接数据库
        $sql = "select * from administrator where email ='$email'";
        $query = mysqli_query($link, $sql);
        $num = mysqli_num_rows($query);
        if($num==0){//该邮箱尚未注册！
            $msg="该邮箱尚未注册!";
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
                $msg="系统已向您的邮箱发送了一封邮件，请登录到您的邮箱及时重置您的密码！";
                //echo "系统已向您的邮箱发送了一封邮件<br/>请登录到您的邮箱及时重置您的密码！";
                //更新数据发送时间
                //mysql_query("update administrator set `getpasstime`='$getpasstime' where id='$uid '");
            }else{
                $msg="发送失败";
            }
        }
        echo "<script> alert('$msg');</script>";
        echo "<script> window.location.href = '../administrator/email_find.php';</script>";
        
        //发送邮件
        function sendmail($time,$email,$url){
            include_once("smtp.class.php");
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
    }
    
}

?>
</body>
</html>