<?php
/*车辆归属查询
 * written by 荣誉婷
 */
include_once 'link1.php';
$result1=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '京%'"));
$result2=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '沪%'"));
$result3=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '津%'"));
$result4=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '渝%'"));
$result5=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '黑%'"));
$result6=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '吉%'"));
$result7=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '辽%'"));
$result8=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '蒙%'"));
$result9=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '冀%'"));
$result10=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '新%'"));
$result11=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '甘%'"));
$result12=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '青%'"));
$result13=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '陕%'"));
$result14=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '宁%'"));
$result15=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '豫%'"));
$result16=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '鲁%'"));
$result17=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '晋%'"));
$result18=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '皖%'"));
$result19=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '鄂%'"));
$result20=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '湘%'"));
$result21=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '苏%'"));
$result22=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '川%'"));
$result23=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '黔%'"));
$result24=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '滇%'"));
$result25=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '桂%'"));
$result26=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '藏%'"));
$result27=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '浙%'"));
$result28=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '赣%'"));
$result29=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '粤%'"));
$result30=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '闽%'"));
$result31=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '台%'"));
$result32=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '琼%'"));
$result33=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '港%'"));
$result34=mysqli_num_rows(mysqli_query($link, "select * from car where plate_number like '澳%'"));
$data1=array("name"=>'北京市',"num"=>$result1);
$data2=array("name"=>'上海市',"num"=>$result2);
$data3=array("name"=>'天津市',"num"=>$result3);
$data4=array("name"=>'重庆市',"num"=>$result4);
$data5=array("name"=>'黑龙江省',"num"=>$result5);
$data6=array("name"=>'吉林省',"num"=>$result6);
$data7=array("name"=>'辽宁省',"num"=>$result7);
$data8=array("name"=>'内蒙古',"num"=>$result8);
$data9=array("name"=>'河北省',"num"=>$result9);
$data10=array("name"=>'新疆',"num"=>$result10);
$data11=array("name"=>'甘肃省',"num"=>$result11);
$data12=array("name"=>'青海省',"num"=>$result12);
$data13=array("name"=>'陕西省',"num"=>$result13);
$data14=array("name"=>'宁夏',"num"=>$result14);
$data15=array("name"=>'河南省',"num"=>$result15);
$data16=array("name"=>'山东省',"num"=>$result16);
$data17=array("name"=>'山西省',"num"=>$result17);
$data18=array("name"=>'安徽省',"num"=>$result18);
$data19=array("name"=>'湖北省',"num"=>$result19);
$data20=array("name"=>'湖南省',"num"=>$result20);
$data21=array("name"=>'江苏省',"num"=>$result21);
$data22=array("name"=>'四川省',"num"=>$result22);
$data23=array("name"=>'贵州省',"num"=>$result23);
$data24=array("name"=>'云南省',"num"=>$result24);
$data25=array("name"=>'广西省',"num"=>$result25);
$data26=array("name"=>'西藏',"num"=>$result26);
$data27=array("name"=>'浙江省',"num"=>$result27);
$data28=array("name"=>'江西省',"num"=>$result28);
$data29=array("name"=>'广东省',"num"=>$result29);
$data30=array("name"=>'福建省',"num"=>$result30);
$data31=array("name"=>'台湾省',"num"=>$result31);
$data32=array("name"=>'海南省',"num"=>$result32);
$data33=array("name"=>'香港',"num"=>$result33);
$data34=array("name"=>'澳门',"num"=>$result34);
$js=array($data1,$data2,$data3,$data4,$data5,$data6,$data7,$data8,$data9,$data10,$data11,$data12,$data13,$data14,$data15,$data16,$data17,
    $data18,$data19,$data20,$data21,$data22,$data23,$data24,$data25,$data26,$data27,$data28,$data29,$data30,$data31,$data32,$data33,$data34);
$json=json_encode($js,JSON_UNESCAPED_UNICODE);
echo $json;





