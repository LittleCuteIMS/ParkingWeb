<?php
include_once '../user/link1.php';
$mother_name = $_POST['mother_name'];
$teacher_name = $_POST['teacher_name'];
$poem = $_POST['poem'];
$mobile = $_POST['mobile'];
if(isset($_POST['mother_name'],$_POST['teacher_name'],$_POST['poem'],$_POST['mobile'])){
 $sql = "select * from  security where mobile = '$mobile' and mother_name = '$mother_name'
 and teacher_name = '$teacher_name' and poem = '$poem'";
 $result1 = mysqli_query($link, $sql);
 $num = mysqli_num_rows($result1);
 if($num==1){
 $result = "成功";
 }else{
     $result = "失败";
 }
 }else{
     $result = "请回答密保问题";
 }
 echo $result;
?>
