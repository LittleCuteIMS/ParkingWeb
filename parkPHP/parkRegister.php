<?php

include '../mysql_db/mysqliBySql.php';
if(empty($_POST['name'])||empty($_POST['carportSum'])||empty($_POST['carportFreeNum'])
    ||empty($_POST['address'])||empty($_POST['phone'])||empty($_POST['charge'])){
    die('有值为空或为0，请重新输入');
}

$info=array(
    'name'=>$_POST['name'],
    'carportSum'=>(int)$_POST['carportSum'],
    'carportFreeNum'=>(int)$_POST['carportFreeNum'],
    'address'=>$_POST['address'],
    'phone'=>$_POST['phone'],
    'charge'=>(float)$_POST['charge']
);

$sql="INSERT INTO park(name,carport_sum,carport_free_num,address,phone,charge) 
    VALUES ('".$info['name']."','".$info['carportSum']."','".$info['carportFreeNum']
    ."','".$info['address']."','".$info['phone']."','".$info['charge']."')";

$result=insertBySql($sql);

if($result){
    echo '注册成功';
}else{
    echo '注册失败';
}
?>
