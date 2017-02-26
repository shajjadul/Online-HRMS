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
    $leaveappid=$_POST['leaveappid'];
    $recommendation=$_POST['recommendation'];
    $message=$_POST['message'];
	//$mktime=mktime()+6*3600;
   // $submit_moment= gmdate("YmdHis",$mktime);
	
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
    include "../../library/class.SecurityCode.php";
    $code=new SecurityCode();
    $table_id=$code->Generator("10");
    //$table_id02=$code->Generator("10");	
	
	
			$table01="emp_leave_recom";
			
			$array01=array("$table_id","$leaveappid","$message");
			
			$query->normal_insert($table01,$array01);
			
			
		//###########EDIT PASSWORD ###############
			$table_name="emp_leave_app";
			$update_field="Status='$recommendation'";
			$identification="LeaveAppId='$leaveappid'";
			$query->DynamicUpdate($table_name,$update_field,$identification);
			
			
			//$mess="message=Congratulation! You successfully done the job.";
			exit(header("Location:recom_confirm.php?mess=$recommendation"));
?>
</body>
</html>
<? ob_flush(); ?> 
