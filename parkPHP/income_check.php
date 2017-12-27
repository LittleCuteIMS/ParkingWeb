<?php
include_once '../mysql_db/mysqliBySql.php';
$sql = "select name,income from park";
$result = selectBySql($sql);
echo $result;
?>