<?php
include 'mysqliBySql.php';

$sql="select nickname,mobile from user where id=20";

$jsonData=selectBySql($sql);

echo $jsonData;
?>