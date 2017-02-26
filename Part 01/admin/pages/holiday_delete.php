<?php
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	$model=$_GET['model'];
	
    mysql_query("DELETE FROM holiday WHERE HoliDayId = '$model'");
	
	header("location:holiday.php?ac=holyday&&message=Succesfully Deleted!");
?>