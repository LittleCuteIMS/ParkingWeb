<?php
include_once "../user/link1.php";
$date1=$_GET['date1'];
$date2=$_GET['date2'];
//$date1="2017-12-03";
//$date2="2017-12-04";
$sql="SELECT * FROM admin_log where log_date between '$date1' AND '$date2'";
$result = mysqli_query($link,$sql);
$datarow = mysqli_num_rows($result); //长度
if ($datarow>0)
{
    //循环遍历出数据表中的数据
    for ($i=0;$i<$datarow;$i++)
    {
        $result_arr = mysqli_fetch_assoc($result);
        $log_date = $result_arr['log_date'];
        $recorder = $result_arr['recorder'];
        $log = $result_arr['log'];
        echo  "<tr  valign='middle' height='40'>
                       <td width=15%>$log_date</td>
                       <td width='10%'>$recorder</td>
                       <td width='75%'>$log</td>  
                       </tr>";
    }
}else{
    echo "请输入正确的查询时间！";
}
mysqli_close($link);
?>
