<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>

<?php
	/*
	向数据库插入数据实例
	 */
	include "Insert.php";
	
	$a = new Insert();

	$a->insert_user('parking','3','catchy','0','2008-1-4','2013','18782003537');
	$a->insert_park('parking','1','road','200','9','roads','18263728191','2');
	$a->insert_trading_record('parking','1','2008-1-4','3','something','1','1');
	$a->insert_advalue('parking','2','洗车','akdrn','13666289539','8','1');
	$a->insert_car('parking','川A278XZ','nothing','1');
	//$a->insert_parking_record('parking','1','2010-1-2','2010-2-1','no','1','川A278XZ');
	//$a->insert_pay_rank('parking','2','2009-1-3','20','nothing','1');

	/*
	向数据库查询数据实例
	 */
	include "Select.php";

	$b = new Select();

	$b->select_user('parking','nickname','catchy');
	$b->select_trading_record('parking','id','1');
	$b->select_pay_rank('parking','id','1');
	$b->select_parking_record('parking','id','1');
	$b->select_park('parking','id','1');
	$b->select_car('parking','user_id','1');
	$b->select_advalue('parking','id','2');


	/*
	向数据库修改数据实例
	 */
	include "Alter.php";

	$c = new Alter();

	$c->alter('user','nickname','www','id','1');

?>



</body>
</html>