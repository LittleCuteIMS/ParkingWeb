<?php
/*
 * 在网页上输出已注册用户信息
*/
if(isset($_POST['mobile'])){
    include_once '../mysql_db/mysqliBySql.php';
    $page=$_POST['page'];
    $pageSize=$_POST['pageSize'];
    $mobile=$_POST['mobile'];
    $firstLine=($page-1)*$pageSize;
    $sql="select * from user where mobile like '%$mobile%' limit $firstLine,$pageSize";
    $result=selectBySql($sql);
    echo $result;
}

?>
