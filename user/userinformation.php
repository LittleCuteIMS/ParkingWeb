<!DOCTYPE html>
<html>

<body>
    <table style='text-align:center;' border='1'  >
             <tr  valign="top" height="40"> 
             <td width=12%>id</td>
             <td width="20%">昵称</td>
             <td width="20%">余额</td>
             <td width="28%">注册日期</td>
             <td width="20%">手机号</td>
             </tr>
        <?php
        /*
         * 在网页上输出所有已注册用户信息
         */
        include_once "../mysql_db/Select.php";

        $select = new Select();
        
        if ($_POST['sltUser'] == "所有用户") {
            $select->select_user_all('intelligentparking');
            
        }
        else{
            echo "暂不支持查找！<p>";
        }
        ?>
        
    </table>
</body>

</html>