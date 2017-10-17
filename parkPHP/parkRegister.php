<?php
ob_start();//开启输出缓冲
//将表单提交的数据保存在$info数组中

include '../mysql_db/Insert.php';
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
    $insertpark=new Insert();
    
    $result=$insertpark->insert_park($info['name'], $info['carportSum'], 
        $info['carportFreeNum'], $info['address'], $info['phone'], $info['charge']);

    if($result){
        echo '注册成功</a>';
    }else{
        echo '注册失败';
    }
}else{
    echo '输入数据有误，请重新输入'.'<br />';
}

ob_end_flush();//将缓冲内容发送到浏览器并关闭输出缓冲
?>
