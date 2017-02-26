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
    $basictotal=$_POST['basictotal'];
    $houseallowance=$_POST['houseallowance'];
    $medicalallowance=$_POST['medicalallowance'];
    $convenience=$_POST['convenience'];
    $designation=$_POST['designation'];
    $department=$_POST['department'];
    $activedate=$_POST['activedate'];
	//$mktime=mktime()+6*3600;
    //$submit_date= gmdate("Y-m-d",$mktime);
	
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
		exit(header("Location:increment_form.php?$mess"));
	 }
     else if($field0[8]==2)
	 {
		$mess="message1=This employee is already terminated";
		exit(header("Location:increment_form.php?$mess"));
	 }
	 else if($field0[8]==0 or $field0[8]==1)
	 {
	
			$result01=mysql_query("SELECT * FROM emp_salary WHERE EmpId='$employeeid'");
			$rows01=mysql_num_rows($result01);
			
			if($rows01>=1)
			{ 
					$table01="emp_salary";
					
					$array01=array("$table_id","$employeeid","$basictotal","$houseallowance","$medicalallowance","$convenience","$designation","$department","$activedate");
					
					$query->normal_insert($table01,$array01);
					
					
					$table_name01=" add_employee";
					$update_field01="emp_designation='designation',emp_department='department'";
					$identification01="emp_id='$employeeid'";
					$query->DynamicUpdate($table_name01,$update_field01,$identification01);
					
					
					
					$mess="message=Congratulation! You successfully done the job.";
					exit(header("Location:add_salary_form.php?$mess"));
			}
			else
			{
				$mess="message1=Sorry! Initial salary doesn't exist!";
				exit(header("Location:increment_form.php?$mess"));
			}
	 }
?>
</body>
</html>
<? ob_flush(); ?> 
