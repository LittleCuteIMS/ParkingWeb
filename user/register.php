<?php
/*
 * 此文件用于获取由Android端传过来的json数据，并对json数据进行转化，转换成为php识别的数组
 * 转换成功后定义变量对数组中的数据进行取值，连接数据库，将对应变量存入数据库
 * 注册时间为服务器端根据date()进行取值，再对获取的时间戳进行格式化，转化为便于认知的时间
 * 数据录入后，检查数据是否录入成功，将检查结果进行json转化，反馈给客户端
 * 
 */
include_once '../mysql_db/Insert.php';
include_once 'link1.php';
$json = file_get_contents('php://input');  //接收json数据
$arr = json_decode($json,true);
//$json ='{"nick_name":"王笑笑","password":"676drf","mobile":13272521765}'; 
//$arr=(array)json_decode($json);
$insert=new Insert();
$nickName=$arr['nick_name'];
$passWord=$arr['password'];
$regisDate=date("Y-m-d"); //格式化日期
if(strlen($arr['mobile'])==11)  //判断号码是否为11位
{  
    $sql= mysqli_query($link,"select * from user where mobile=$arr[mobile]");    
    if (mysqli_num_rows($sql)==0)
        {
            $userTelephone=$arr['mobile'];
            $insert->insert_user("intelligentparking", "$nickName", "$regisDate", "$passWord", "$userTelephone");
            $new=mysqli_query($link, "select * from user where mobile='$userTelephone'");    //检查数据是否录入成功，若成功反馈信息给客户端
            $datarow = mysqli_num_rows($new);
            if($datarow==1){
                echo '注册成功！';
            }
            else {
                echo '注册失败!';
            }
            mysqli_close($link);
        }else {
            echo"该号码已被注册!"; 
        }
}
else{  
    echo "号码不正确！"; 
}
?>

