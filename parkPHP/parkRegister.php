<?php
ob_start();//开启输出缓冲
//将表单提交的数据保存在$info数组中
$info=array(
    'name'=>$_POST['name'],
    'carportSum'=>(int)$_POST['carportSum'],
    'carportFreeNum'=>(int)$_POST['carportFreeNum'],
    'address'=>$_POST['address'],
    'phone'=>$_POST['phone'],
    'charge'=>(float)$_POST['charge']
);
//简单的输入检测
$strName=(string)$info['name'];
if($strName!=null){
    //建立与数据库的连接
    $mysqli = new mysqli('localhost','root','','intelligentparking');
    
    //连接出错时
    if($mysqli->connect_error){
        die('连接错误('. $mysqli->connect_errno . ')'
            .$mysqli->connect_error);
    }
    
    //将注册数据插入park表的sql语句
    $sql="insert into park(name,carport_sum,carport_free_num,address,phone,charge) values ('"
        .$info['name']."','".$info['carportSum']."','".$info['carportFreeNum']."','"
            .$info['address']."','".$info['phone']."','".$info['charge']."')";
    
    //避免存入数据库乱码
    $mysqli->query("set character set 'UTF8'");
    $mysqli->query("set names 'UTF8'");
    
    //检测插入是否成功
    $result=$mysqli->query($sql);
    if($result){
        echo '注册成功</a>';
    }else{
        echo '注册失败';
    }
    
    //关闭连接
    $mysqli->close();
}else{
    echo '输入数据有误，请重新输入'.'<br />';
}

ob_end_flush();//将缓冲内容发送到浏览器并关闭输出缓冲
?>
