<?php
	ob_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evolution Group</title>
</head>
<body>
    <?php
    $HoliDayDescription=$_POST['HoliDayDescription'];
    $HoliDayDate=$_POST['HoliDayDate'];
	//$mktime=mktime()+6*3600;
    //$submit_moment= gmdate("YmdHis",$mktime);
	
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
    include "../../library/class.SecurityCode.php";
    $code=new SecurityCode();
    $table_id=$code->Generator("10");
    //$table_id02=$code->Generator("10");	
	
	
	$result=mysql_query("SELECT * FROM holiday WHERE HoliDayDate='$HoliDayDate'");
    $rows=mysql_num_rows($result);
	
	
	if($rows==0)
	{
	$table01="holiday";
	
	$array01=array("$table_id","$HoliDayDescription","$HoliDayDate");
	
	$query->normal_insert($table01,$array01);
	
	
	
    $mess="message=Congratulation! You successfully done the job.";
	exit(header("Location:add_holiday_form.php?$mess"));
	}
	else
	{
    $mess="message1=Sorry! This date already exist.";
	exit(header("Location:add_holiday_form.php?$mess"));
	}
?>
</body>
</html>
<? ob_flush(); ?> 
