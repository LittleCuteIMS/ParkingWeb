<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>密码找回页面</title>
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="css/theme.css" type="text/css" />
	<link rel="stylesheet" href="css/style.default.css" type="text/css" />
	<script type="text/javascript" src="js/plugins/jquery-1.7.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.cookie.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="js/custom/general.js"></script>
	<script type="text/javascript" src="js/custom/pwd_find.js"></script>
	
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
  
    <form method="post" id="mailform">
  
<div class="form-group">
                   <font size="2">输入您注册的电子邮箱，找回密码:</font>
                    <p><input type="text" class="input" name="email" id="email"><span id="chkmsg"></span></p>
                </div>
<p align="center"><input type="submit" class="stdbtn" id="sub_btn"  onclick="find()"value="提 交"></p> 
 </form> 


</body>
</html>
 