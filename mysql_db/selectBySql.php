<?php
function selectBySql($sql){//查询停车场信息表，参数传入查询的sql语句
    $mysqli = new mysqli('localhost','root','','intelligentparking');
    
    //连接出错时
    if($mysqli->connect_error){
        die('连接错误('. $mysqli->connect_errno . ')'
            .$mysqli->connect_error);
    }
    
    //避免存入数据库乱码
    $mysqli->query("set character set 'UTF8'");
    $mysqli->query("set names 'UTF8'");
    
    //插入数据，成功$result为true，失败为false
    $result=$mysqli->query($sql);
    
    //声明数组
    $data=Array();
    
    while($row=$result->fetch_array()){
        array_push($data, $row);    //将查询结果数组放入一个新数组中
    }
    
    //将查询结果转换为json格式数据
    $json=json_encode($data,JSON_UNESCAPED_UNICODE|JSON_FORCE_OBJECT);
    
    # 关闭数据库
    $mysqli->close();
    
    //返回json数据
    return $json;
}
?>