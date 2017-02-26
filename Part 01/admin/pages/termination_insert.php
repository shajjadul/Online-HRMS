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
    $employeeid=$_POST['employeeid'];
    $terminationdate=$_POST['terminationdate'];
    $textmessage=$_POST['message'];
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
	
	
	 $result0= mysql_query("SELECT * FROM add_employee WHERE emp_id='$employeeid'");
	 //$row0=mysql_num_rows($result0);
	 $field0=mysql_fetch_array($result0);
	 if($field0[8]=='')
	 {
		$mess="message1=Sorry! This ID doesn't exist!";
		exit(header("Location:termination_form.php?$mess"));
	 }
     else if($field0[8]==2)
	 {
		$mess="message1=This employee is already terminated";
		exit(header("Location:termination_form.php?$mess"));
	 }
	 else if($field0[8]==0 or $field0[8]==1)
	 {
		 
		$table_name01="add_employee";
		$update_field01="status='2'";
		$identification01="emp_id='$employeeid'";
		$query->DynamicUpdate($table_name01,$update_field01,$identification01);
		 
		$table02="emp_termination";
		$array02=array("$table_id","$employeeid","$textmessage","$terminationdate");
		$query->normal_insert($table02,$array02);
		
		$mess="message=Congratulation! You successfully done the job.";
		exit(header("Location:termination_form.php?$mess"));
	   }
	
?>
</body>
</html>
<? ob_flush(); ?> 
