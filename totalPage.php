<?php
include_once "user/link1.php";
//$userTelephone = $_POST['userTelephone'];
$sql = "select * from user where mobile like '%$userTelephone%'";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
echo $num;