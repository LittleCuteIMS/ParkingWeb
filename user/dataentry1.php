<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php
/*
 * 此文件用于获取由Android端传过来的json数据，并对json数据进行转化，转换成为php识别的数组
 * 转换成功后定义变量对数组中的数据进行取值，连接数据库，将对应变量存入数据库
 * 注册时间为服务器端根据date()进行取值，再对获取的时间戳进行格式化，转化为便于认知的时间
 * 数据录入后，检查数据是否录入成功，将检查结果进行json转化，反馈给客户端
 * 
 */
require_once 'link1.php';
$json = file_get_contents('php://input');                         //接收json数据
$arr = json_decode($json, true);

$nickName=$arr['nick_name'];
$passWord=$arr['password'];
$userTelephone=$arr['mobile'];

$regisDate=date("Y-m-d");                                 //格式化日期                               
$sql= "INSERT INTO user(nickname,regis_date,password,mobile)               
VALUES ('$nickName','$regisDate','$passWord','$userTelephone')";        //向user表录入数据
mysqli_query($link,$sql);
$new=mysqli_query($link, "select * from user where mobile='$userTelephone'");    //检查数据是否录入成功，若成功反馈信息给客户端
$datarow = mysqli_num_rows($new);
if($datarow==1){
    echo '在服务器上注册成功';
}
else {
    echo '在服务器上注册失败';
}
mysqli_close($link);
?>
</body>
</html>
