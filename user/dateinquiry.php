<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
</head>

<body>

		<div>
    <?php
    /*
     * 根据给出的时间范围查询用户信息
     * 
     */
    include_once "link1.php";
       $date1=$_GET['date1'];
       $date2=$_GET['date2'];  
        $sql="SELECT * FROM user where regis_date between '$date1' AND '$date2'";
         $result = mysqli_query($link,$sql);    
         $datarow = mysqli_num_rows($result); //长度
         if ($datarow>0)
         {
            //循环遍历出数据表中的数据
            for ($i=0;$i<$datarow;$i++)
            {
                $result_arr = mysqli_fetch_assoc($result);
                $userId = $result_arr['id'];
                $nickName = $result_arr['nickname'];    
                $regisDate= $result_arr['regis_date'];
                $mobile=$result_arr['mobile'];           
                echo  "<tr  valign='middle' height='40'>
                       <td width=30%>$regisDate</td>
                       <td width='10%'>$userId</td>
                       <td width='30%'>$nickName</td>
                       <td width='30%'>$mobile</td>
                       </tr>";
            }
         }else{
             echo "请输入正确的查询时间范围！";
         }
            mysqli_close($link);
     ?>


		</div>
		
</body>

</html>