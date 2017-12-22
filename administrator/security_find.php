<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>密码找回页面</title>
	<link rel="stylesheet" href="../css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="../css/theme.css" type="text/css" />
	<link rel="stylesheet" href="../css/style.default.css" type="text/css" />
	<script type="text/javascript" src="../js/plugins/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="../js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="../js/plugins/jquery.cookie.js"></script>
	<script type="text/javascript" src="../js/plugins/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="../js/custom/general.js"></script>	
	<script type="text/javascript" src="../js/custom/security_find.js"></script>	
	<!--[if IE 9]>
	    <link rel="stylesheet" media="screen" href="css/style.ie9.css"/>
	<![endif]-->
	<!--[if IE 8]>
	    <link rel="stylesheet" media="screen" href="css/style.ie8.css"/>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="js/plugins/css3-mediaqueries.js"></script>
	<![endif]-->
</head>

<body class="loginpage">
<div class="topheader orangeborderbottom5">
        <div class="left">
          <h1 class="logo">停了吗<span></span></h1>
            <div class="search">      
          </div><!--search-->         
            <br clear="all" />          
        </div><!--left--><!--right-->
    </div><!--topheader-->	
    <div id="textHint"></div>
   <div class="dialog">
    <div class="panel panel-default">
    <p class="panel-heading no-collapse"  align="center"><font size="3">密码找回</font></p>
        <div class="panel-body">
          <br clear="all" /><br />
          
            <div class="nomsg" >
				<div><img alt="" src="../images/thumbs/avatar1.png" /> 请输入相关信息.</div>
            </div><!--nomsg-->
            
            <form method="post" action="" id="formId">
            <div class="form-group">
                    <label>您注册的手机号是？</label>
                    <input type="text" class="form-control span12"  name="mobile" id="mobile">
                </div>
                <div class="form-group">
                    <label>您母亲的姓名是？</label>
                    <input type="text" class="form-control span12" name="mother_name" id="mother_name">
                </div>
                <div class="form-group">
                    <label>您初中班主任的姓名是？</label>
                    <input type="text" class="form-control span12" name="teacher_name" id="teacher_name">
                </div>
                <div class="form-group">
                    <label>您最喜欢的一句古诗是？</label>
                    <input type="text" class="form-control span12" name="poem" id="poem">
                </div> 
                       
                <div class="form-group" align="center" >
                <input type="submit"   value="确认提交">              
                </div>
                </form>
                <div class="form-group" align="center" >
                 <a href="index.php">返回登录</a>
                </div>             
        </div>
         
    </div>
</div>
<?php 
if(!empty($_POST['mother_name']) && !empty($_POST['teacher_name']) 
    && !empty($_POST['poem']) && !empty($_POST['mobile'])){ 
    $mother_name = $_POST['mother_name'];
    $teacher_name = $_POST['teacher_name'];
    $poem = $_POST['poem'];
    $mobile = $_POST['mobile'];
    include_once '../mysql_db/mysqliBySql.php';
    include_once '../user/link1.php';
    $sql = "select * from  security where mobile = '$mobile' and mother_name = '$mother_name'
           and teacher_name = '$teacher_name' and poem = '$poem'";
    $result = selectSql($sql);
    if($result){     
        echo "<script> window.location.href = 'security_reset.php';</script>";
        }else{
            echo "<script> alert('回答错误！');</script>";
            }
}
?>
</body>
</html>
 