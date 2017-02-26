<?php
	ob_start();
?>
    <?php include("../config/config.php");?>
    <?php
    $HoliDayDescription=$_POST['HoliDayDescription'];
    $HoliDayDate=$_POST['HoliDayDate'];
	$HoliDayId=$_GET['h'];
	
	
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
	//########### EDIT HOLIDAY INFORMATION ###############
	
	$result01=mysql_query("SELECT * FROM holiday WHERE HoliDayId='$HoliDayId' and HoliDayDate='$HoliDayDate'");
    $rows01=mysql_num_rows($result01);
	
	$result02=mysql_query("SELECT * FROM holiday WHERE HoliDayDate='$HoliDayDate'");
    $rows02=mysql_num_rows($result02);
	
	$add_rows=$rows01+$rows02;
	
	if($add_rows!=1)
	{
	$table_name01="holiday";
	$update_field01="HoliDayDescription='$HoliDayDescription', HoliDayDate='$HoliDayDate'";
	$identification01="HoliDayId='$HoliDayId'";
	$query->DynamicUpdate($table_name01,$update_field01,$identification01);
	
	
    /*$mess="message=Congratulation! You successfully done the job.";
	header("Location:emp_resume_show.php?$mess");*/
    $mess="message=Congratulation! All of your informations updated successfully.";
	exit(header("Location:edit_holiday_form.php?g=$HoliDayId&&ac=notice&&$mess"));
	}
	else
	{
    $mess="message1=Sorry! This date already exist";
	exit(header("Location:edit_holiday_form.php?g=$HoliDayId&&ac=notice&&$mess"));
	}

?>


<? ob_flush(); ?> 