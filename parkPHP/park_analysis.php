<?php
include_once '../mysql_db/mysqliBySql.php';
$sql = "select * from park";
$result = selectBySql($sql);
echo $result;
?>