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
    $name=$_POST['name'];
    $employeeid=$_POST['employeeid'];
    $email=$_POST['email'];
    $joiningdate=$_POST['joiningdate'];
    $designation=$_POST['designation'];
    $department=$_POST['department'];
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
	
	
	$result=mysql_query("SELECT * FROM add_employee WHERE emp_id='$employeeid'");
    $rows=mysql_num_rows($result);
	
	
	if($rows==0)
	{
	$table01="add_employee";
	
	$array01=array("$table_id","$name","$employeeid","$email","$joiningdate","$designation","$department","$textmessage","0");
	
	$query->normal_insert($table01,$array01);
	
	
	
	
	$table02="emp_login";
	
	$array02=array("$table_id","$employeeid","$table_id");
	
	$query->normal_insert($table02,$array02);
	
	
	
$department_array=array("1"=>"Evolution Group Ltd.",
                       "2"=>"Evolution Migration Ltd.",
                       "3"=>"Evolution Overseas Studies Ltd.",
                       "4"=>"Evolution IT Ltd.",
                       "5"=>"Evolution Tours &amp; Travels Ltd.",
                       "6"=>"Evolution Trading &amp; Consultency Ltd.");
$departmentconvert=$department_array[$department];
	
	//list($table_id1,$name,$employeeid,$email,$joiningdate,$designation,$department,$message)=mysql_fetch_row($result);
	
	
	/*************Send message to emplyee***********************/
		$to=$email.","."shoriful.hasan@gmail.com";
		$subject = "Confirmation mail";
		$message = "Congratulation!,".$name."."."<br>\r\n This is a confirmation message."."<br>\r\n";
		$message.="Your joining date: ".$joiningdate."."."<br>\r\n"; 
		$message.="Designation: ".$designation."."."<br>\r\n"; 
		$message.="Department: ".$departmentconvert."."."<br>\r\n";
		$message.="\r\n";
		$message.="Please click the following link to submit your profile immediately:"."<br>\r\n";
		//$message.="http://www.evolutiongroup.com.bd/hrm/employee/validation.php?g=".$table_id."\r\n";
        $message.="<a href='http://www.evolutiongroup.com.bd/gghrm/employee/validation.php?g=".$table_id ."'>http://www.evolutiongroup.com.bd/gghrm/employee/validation.php?g=".$table_id."</a><br>";
		$message.="(If clicking on the link doesn't work, try copying and pasting it into your browser.)"."<br>\r\n";
		$message.="Below is your log-in information:"."<br>\r\n";
		$message.="<b>User ID:</b> ".$employeeid."<br>\r\n"; 
		$message.="<b>Password:</b> ".$table_id."<br>\r\n"; 
        $message.="".$textmessage."<br><br><br>\r\n";		
		$message.="Thanks"."<br>\r\n";
		$message.="HR &amp; Admin Manager"."<br>\r\n";
		$message.="A. K. M. Shajjadul Islam"."<br>\r\n";
		$message.="Mobile:0192789870"."<br>\r\n";
		$message.="<br>\r\n"; 
		//$from ="hr@evolutiongroup.com.bd";
		$header = "Content-type: text/html;charset=utf-8\n";
		//$header .= "From:" .$from. "\r\n";
        $header.="From: \"Evolution Group\"<hr@evolutiongroup.com.bd>\n";
		mail($to,$subject,$message,$header);
	/*************Send message to emplyee***********************/
	
	
    $mess="message=Congratulation! You successfully done the job.";
	exit(header("Location:add_emp_popup_form.php?$mess"));
	}
	else
	{
    $mess="message1=Sorry! This employee ID already exist.";
	exit(header("Location:add_emp_popup_form.php?$mess"));
	}
?>
</body>
</html>
<? ob_flush(); ?> 
