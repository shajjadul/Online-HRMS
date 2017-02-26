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
    $EmpDesignation=$_POST['EmpDesignation'];
    $EmpDepartment=$_POST['EmpDepartment'];
    $submit_date=$_POST['submit_date'];
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
	
	
	$result01=mysql_query("SELECT * FROM add_employee WHERE emp_id='$employeeid'");
    $rows01=mysql_num_rows($result01);
	
	if($rows01==1)
	{ 
		$result02=mysql_query("SELECT * FROM emp_salary WHERE EmpId='$employeeid'");
		$rows02=mysql_num_rows($result02);
	    if($rows02==0)
	      {
			$table01="emp_salary";
			
			$array01=array("$table_id","$employeeid","$basictotal","$houseallowance","$medicalallowance","$convenience","$EmpDesignation","$EmpDepartment","$submit_date");
			
			$query->normal_insert($table01,$array01);
			
			$mess="message=Congratulation! You successfully done the job.";
			exit(header("Location:add_salary_form.php?$mess"));
		  }
		  else
		  {
			$mess="message1=Already submitted salary information.";
			exit(header("Location:add_salary_form.php?$mess"));
		  }
	}
	else
	{
		$mess="message1=Sorry! Add employee information, first.";
		exit(header("Location:add_salary_form.php?$mess"));
	}
?>
</body>
</html>
<? ob_flush(); ?> 
