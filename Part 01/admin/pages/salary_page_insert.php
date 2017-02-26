<?php
	ob_start();
?>
    <?php
    $empid=$_POST['empid'];
    $Designation=$_POST['Designation'];
    $Department=$_POST['Department'];
    $SalaryMonth=$_POST['SalaryMonth'];
	$mktime=mktime()+6*3600;
    $submit_date= gmdate("Y-m-d",$mktime);
	
	
    $TotalDays=$_POST['TotalDays'];
    $WorkingDays=$_POST['WorkingDays'];
    $Holidays=$_POST['Holidays'];
    $Leaves=$_POST['Leaves'];
    $UnpaidLeave=$_POST['UnpaidLeave'];
    $Presents=$_POST['Presents'];
    $Absences=$_POST['Absences'];
    $Delays=$_POST['Delays'];
	
	
    $basicsalary=$_POST['basicsalary'];
    $houseallowance=$_POST['houseallowance'];
    $medicalallowance=$_POST['medicalallowance'];
    $conveyance=$_POST['conveyance'];
    $remuneration=$_POST['remuneration'];
    $festivalbonus=$_POST['festivalbonus'];
    $earningothers=$_POST['earningothers'];
	
	
    $absencecal=$_POST['absencecal'];
    $delaycal=$_POST['delaycal'];
    $providentfund=$_POST['providentfund'];
    $professiontax=$_POST['professiontax'];
    $deductionothers=$_POST['deductionothers'];
	
	
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
    include "../../library/class.SecurityCode.php";
    $code=new SecurityCode();
    $table_id=$code->Generator("10");
    $empsalidentification=$code->Generator("10");	
	
	
	$result=mysql_query("SELECT * FROM emp_salary_slip01 WHERE EmpId='$empid' and EmpSalMonth='$SalaryMonth'");
    $rows=mysql_num_rows($result);
	
	if($rows==0)
	{
	$table01="emp_salary_slip01";
	
	$array01=array("$empsalidentification","$empid","$Designation","$Department","$SalaryMonth","$submit_date");
	
	$query->normal_insert($table01,$array01);
	
	
	
	$table02="emp_salary_slip02";
	
	$array02=array("$table_id","$empsalidentification","$TotalDays","$WorkingDays","$Holidays","$Leaves","$UnpaidLeave","$Presents","$Absences","$Delays");
	
	$query->normal_insert($table02,$array02);
	
	

	$table03="emp_salary_slip03";
	
	$array03=array("$table_id","$empsalidentification","$basicsalary","$houseallowance","$medicalallowance","$conveyance","$remuneration","$festivalbonus","$earningothers");
	
	$query->normal_insert($table03,$array03);



	$table04="emp_salary_slip04";
	
	$array04=array("$table_id","$empsalidentification","$absencecal","$delaycal","$providentfund","$professiontax","$deductionothers");
	
	$query->normal_insert($table04,$array04);

	
    $mess="message=Congratulation! You successfully done the job.";
	exit(header("Location:salary.php?ac=salary&&$mess"));
	
	}
	else
	{
    $mess="message1=Lesson! This salary statement already created.";
	exit(header("Location:salary.php?ac=salary&&$mess"));
	}
?>
<? ob_flush(); ?> 
