<!DOCTYPE html>
<html>
<head>  
<?php
include_once '../user/link1.php';//连接数据库
$token = stripslashes(trim($_GET['token']));
$email = stripslashes(trim($_GET['email']));
$sql = "select * from administrator where email='$email'";
$query =mysqli_query($link, $sql);
$row = mysqli_fetch_array($query);
if($row){
    $mt = md5($row['id'].$row['admin_name'].$row['admin_pwd']);
   //如果验证成功则显示密码修改页面
    if($mt==$token){  ?>   
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
        <p class="panel-heading no-collapse"  align="center"><font size="3">请重置您的密码</font></p>
        <div class="panel-body">        
        <form method="post" id="mailform" action="">        
        <div class="form-group">
        <font size="2">您的新密码是：</font>
        <p><input type="password" class="form-control span12" name="pwd1" ></p>
        </div>
        <div class="form-group">
        <label>再次确认密码</label>
        <input type="password" class="form-control span12" name="pwd2" >
        </div>
        <p align="center"><input type="submit" value="提 交" id="sub_btn"></p>
        </form>
        </div>
        </div>
        </div>
        <?php
        if(!empty($_POST['pwd1']) && !empty($_POST['pwd2'])){
            $pwd1 = md5($_POST['pwd1']);
            $pwd2 = md5($_POST['pwd2']);
            if($pwd1==$pwd2){
                include_once '../mysql_db/mysqliBySql.php';
                include_once '../user/link1.php';
                $sql = "UPDATE administrator SET admin_pwd='$pwd1' where email = '$email'";
                $result = updateBySql($sql);
                if($result){
                    echo "<script> alert('密码修改成功，请前往登录页面');</script>";
                    echo "<script> window.location.href ='index.php';</script>";
                }else{
                    echo "<script> alert('密码修改失败');</script>";      
                }       
            }else{
                echo "<script> alert('两次输入的密码不一致');</script>";
            }     
        }
         ?>
 
        
   <?php  }else{
echo "<script> alert('无效的链接);</script>" ;
    }
}else{
    echo "<script> alert('错误的链接');</script>" ;
}
?>
</head>
</html>