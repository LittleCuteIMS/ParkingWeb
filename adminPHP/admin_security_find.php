<?php 
$mother_name = $_POST['mother_name'];
$teacher_name = $_POST['teacher_name'];
$poem = $_POST['poem'];
$mobile = $_POST['mobile'];
if(isset($_POST['mother_name'],$_POST['teacher_name'],$_POST['poem'],$_POST['mobile'])){
    include_once '../user/link1.php';
$sql = "select * from  security where mobile = '$mobile' and mother_name = '$mother_name'
        and teacher_name = '$teacher_name' and poem = '$poem'";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);
if($num==1){
    $sql1 =  "select administrator.admin_pwd from  administrator where mobile = '$mobile'";
    $result1 = mysqli_query($link, $sql1);
    $row = mysqli_fetch_array($result1);
    $comeout = $row['admin_pwd'];
    echo "<script> alert('您的密码是：$comeout');</script>";
}else{
    echo "找回密码失败";
 }
}
?>
