 <?php
    /*
     * 根据给出的时间范围查询用户信息
     * written by 荣誉婷
     */
 include_once '../mysql_db/mysqliBySql.php';
 $date1=$_POST['date1'];
 $date2=$_POST['date2'];
 $page=$_POST['page'];
 $pageSize=$_POST['pageSize'];
 $firstLine=($page-1)*$pageSize;
 $sql="select * from user where regis_date between '$date1' AND '$date2' limit $firstLine,$pageSize ";
 //$sql="select * from user where regis_date between '2017-10-10' AND '2017-11-10'";
 $result=selectBySql($sql);
 echo $result;
 
 
 ?>
