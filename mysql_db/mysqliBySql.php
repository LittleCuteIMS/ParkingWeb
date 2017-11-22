<?php
/*
 * 编写者：蔡创
 * 功能：数据库连接函数，有插入，查询，更新三个函数
 * 查询表中信息返回的是json格式的字符串，需解析后再使用
 * eg. 在php中，json_decode($json,true)将json格式字符串解析为多维数组
 */
function selectBySql($sql){//查询表中的信息
    //判断sql语句是否以select或者SELECT开头
    if(substr_compare($sql, "select", 0, 6, true)){//相等返回0，大于返回整数，小于返回负数
        die('请使用以select或者SELECT开头的sql语句');
    }
    
    $mysqli = new mysqli('localhost','root','','intelligentparking');
    
    //连接出错时
    if($mysqli->connect_error){
        die('连接错误('. $mysqli->connect_errno . ')'
            .$mysqli->connect_error);
    }
    
    //避免存入数据库乱码
    $mysqli->query("set character set 'UTF8'");
    $mysqli->query("set names 'UTF8'");
    
    //插入数据，成功返回查询对象，失败返回false
    $result=$mysqli->query($sql);
    if($result->num_rows > 0){
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
    }else{
        $mysqli->close();
        return false;
    }
    
    
}

function updateBySql($sql){//更新表中的信息
    //判断sql语句是否以update或者UPDATE开头
    if(substr_compare($sql, "update", 0, 6, true)){//相等返回0，大于返回整数，小于返回负数
        die('请使用以update或者UPDATE开头的sql语句');
    }
    $mysqli = new mysqli('localhost','root','','intelligentparking');
    
    //连接出错时
    if($mysqli->connect_error){
        die('连接错误('. $mysqli->connect_errno . ')'
            .$mysqli->connect_error);
    }
    
    //避免存入数据库乱码
    $mysqli->query("set character set 'UTF8'");
    $mysqli->query("set names 'UTF8'");
    
    //插入数据，成功返回true，失败返回false
    $result=$mysqli->query($sql);
    
    # 关闭数据库
    $mysqli->close();
    
    //返回查询状态
    return $result;
}

function insertBySql($sql){//向表中插入信息
    //判断sql语句是否以insert或者INSERT开头
    if(substr_compare($sql, "insert", 0, 6, true)){//相等返回0，大于返回整数，小于返回负数
        die('请使用以insert或者INSERT开头的sql语句');
    }
    $mysqli = new mysqli('localhost','root','','intelligentparking');
    
    //连接出错时
    if($mysqli->connect_error){
        die('连接错误('. $mysqli->connect_errno . ')'
            .$mysqli->connect_error);
    }
    
    //避免存入数据库乱码
    $mysqli->query("set character set 'UTF8'");
    $mysqli->query("set names 'UTF8'");
    
    //插入数据，成功返回true，失败返回false
    $result=$mysqli->query($sql);
    
    # 关闭数据库
    $mysqli->close();
    
    //返回查询状态
    return $result;
}
?>