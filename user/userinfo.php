<!DOCTYPE html>
<html>
<body>
        <?php
        /*
         * 在网页上输出已注册用户信息
         */
        $userTelephone=$_GET['userTelephone'];
        if (isset($userTelephone))
        {
            $page=isset($_GET['page'])?intval($_GET['page']):1; 
            $num=10;  
           // $userTelephone="18";
           include_once 'link1.php';
            $sql="SELECT * FROM user WHERE mobile like '%$userTelephone%'";
            $result=mysqli_query($link, $sql);
            $total=mysqli_num_rows($result);
            $pagenum=ceil($total/$num); 
            $offset=($page-1)*$num;  
            $sql1=mysqli_query($link,"select * from user WHERE mobile like '%$userTelephone%' limit $offset,$num ");
            $result1 = mysqli_num_rows($sql1);
            if($result1)
            {
                while($row = mysqli_fetch_array($sql1))
                {
                    echo "<tr  valign='middle' height='40' >";
                    echo "<td width='20%'>".$row['mobile']."</td>";
                    echo "<td width='12%'>".$row['id']."</td>";
                    echo "<td width='20%'>".$row['nickname']."</td>";
                    echo "<td width='20%'>".$row['balance']."</td>";
                    echo "<td width='28%'>".$row['regis_date']."</td>";
                    echo "</tr>";
                    echo "<a>";
                }
                For($i=1;$i<=$pagenum;$i++){
                    
                    $show=($i!=$page)?"<a href='user/userinfo.php?page=".$i."&userTelephone=$userTelephone'>$i</a>":"<b>$i</b>";
                    echo $show." ";
                }
            }else{ echo "用户不存在！";}
        }
        
        ?>
        
</body>
</html>