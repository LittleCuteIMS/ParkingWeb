<html>
<body>
 <table border="1"  align="center" width="80%" height="60%">
         <tr  valign="middle" height="40" align="center" > 
         <td width=30%>注册日期</td>
         <td width="10%">id</td>
         <td width="30%">昵称</td>
         <td width="30%">手机号码</td>
         </tr>
    <?php
    /*
     * 根据给出的时间范围查询用户信息
     * 
     */
    require_once 'link1.php';
       $date1=$_POST['date1'];
       $date2=$_POST['date2'];  
        $sql="SELECT * FROM user where regis_date between '$date1' AND '$date2'";
         $result = mysqli_query($link,$sql);
         $datarow = mysqli_num_rows($result);          //长度
            //循环遍历出数据表中的数据
            for($i=0;$i<$datarow;$i++)
            {
                $result_arr = mysqli_fetch_assoc($result);
                $userId = $result_arr['id'];
                $nickName = $result_arr['nickname'];    
                $regisDate= $result_arr['regis_date'];
                $mobile=$result_arr['mobile'];
                echo  "<tr  valign='middle' height='40' align='center'>
                       <td width=30%>$regisDate</td>
                       <td width='10%'>$userId</td>
                       <td width='30%'>$nickName</td>
                       <td width='30%'>$mobile</td>
                       </tr>";
            }
            mysqli_close($link);
     ?>
</table>
</body>
</html>