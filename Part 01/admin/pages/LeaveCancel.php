<?php
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
	$model=$_GET['model'];
	
	$table_name01=" emp_leave_app";
	$update_field01="Status='2'";
	$identification01="LeaveAppId='$model'";
	$query->DynamicUpdate($table_name01,$update_field01,$identification01);
	
	$table_name02="  emp_leave_recom";
	$update_field02="Message='Leave cancel'";
	$identification02="LeaveAppId='$model'";
	$query->DynamicUpdate($table_name02,$update_field02,$identification02);
	
		
	header("location:emp_leave.php?ac=leave");
?>