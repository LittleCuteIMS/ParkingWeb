<html>
<body>
<table style='text-align:center;' border='1'  >
         <tr  valign="top" height="40"> 
         <td width=10%>id</td>
         <td width="20%">手机号</td>
         <td width="20%">昵称</td>
         <td width="30%">注册日期</td>
         <td width="20%">余额</td>
         </tr>
    <?php
    /*
     * 在网页上输出所有已注册用户信息
     */
    require_once 'link1.php';                        //连接数据库
    $sql= mysqli_query($link,"select * from user");
         $datarow = mysqli_num_rows($sql); //user表中有的记录数
         //循环遍历出数据表中的数据
            for($i=0;$i<$datarow;$i++)
            {
                $sql_arr = mysqli_fetch_assoc($sql);
                $id = $sql_arr['id'];
                $nickname = $sql_arr['nickname'];
                $balance= $sql_arr['balance'];
                $regis_date= $sql_arr['regis_date'];
                $mobile=$sql_arr['mobile'];
                echo  "</td><td width=10%>$id</td><td width='20%'>$mobile</td>
                      <td width='20%'>$nickname</td><td width='30%'>$regis_date</td>
                      <td width='20%'>$balance</td></tr>";
            }
    ?>
</table>
</body>
</html>