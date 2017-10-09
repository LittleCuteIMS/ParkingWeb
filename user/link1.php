<?php
/*
 * 数据库连接（需要用到的地方很多），写成一个php便于其他地方用require_once进行调用
 * 下面的class类是定义了转化为json输出，方便使用对象调用函数
 */
$db='intelligentparking';
$servername='localhost';
$username='root';
$mima='';                                           //这里的mima是数据库的登录密码，区别于用户注册的password
$link=mysqli_connect($servername,$username,$mima,$db);
if(!$link){
    die("Can't connect $db:".mysqli_errno());
}
mysqli_query($link,'SET NAMES UTF8');
$db_select=mysqli_select_db($link,$db);   //连接数据库
if(!$db_select) {
    die ("Can't use database:".mysql_errno());
}
class Response{
    public  static  function json($code,$message="",$data=array()){
        $feedback=array(
            'code'=>$code,
            'message'=>$message,
            'data'=>$data
        );
        
        echo  json_encode($feedback,JSON_UNESCAPED_UNICODE);
        exit;
    }
}
    ?>