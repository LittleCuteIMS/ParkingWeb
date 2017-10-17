<!DOCTYPE html>
<html>

<body>

        <?php
        /*
         * 在网页上输出所有已注册用户信息
         */
        $userTelephone=$_GET['userTelephone'];
        if ( isset($userTelephone) )
        {
           include_once 'link1.php';
            $sql="SELECT * FROM user WHERE mobile='$userTelephone' ";
            $result=mysqli_query($link, $sql);
            if(mysqli_num_rows($result))
            {
                while($row = mysqli_fetch_array($result))
                {
                    echo"<table border='1'  align='center' width='80%'height='10%'>
                        <tr  valign='middle' height='40' align='center' >
                        <td width='20%'>手机号</td>
                        <td width='12%'>id</td>
                        <td width='20%'>昵称</td>
                        <td width='20%'>余额</td>
                        <td width='28%'>注册日期</td>
                       
                        </tr>";
                    echo "<tr  valign='middle' height='40' align='center'>";
                    echo "<td width='20%'>".$row['mobile']."</td>";
                    echo "<td width='12%'>".$row['id']."</td>";
                    echo "<td width='20%'>".$row['nickname']."</td>";
                    echo "<td width='20%'>".$row['balance']."</td>";
                    echo "<td width='28%'>".$row['regis_date']."</td>";
                    
                    echo "</tr>";
                }
            }
            else{
                echo '用户不存在！';
            }
           
        }
        
        ?>
        
</body>

</html>