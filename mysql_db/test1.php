<?php
include 'mysqliBySql.php';

$sql="Select * from park where id=150";

$result=selectBySql($sql);

if($result!=false) {
    echo "在数据库中";
}else{
    echo "不在";
}