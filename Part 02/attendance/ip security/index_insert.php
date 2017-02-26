<? ob_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	include("../dbase/class.dbase.php");
	$conn=new dbase;
	$conn->connection();
	include '../dbase/class.query.php';
	$query=new insert;
	
    include "../library/class.SecurityCode.php";
    $code=new SecurityCode();
    $table_id=$code->Generator("10");
	
		
	$status=$_POST['status'];
	$user=$_POST['user_id'];
	$pass=$_POST['password'];
	$message=$_POST['message'];
	$mktime=mktime()+6*3600;
    //$submit_moment= gmdate("YmdHis",$mktime);
	$today_date=gmdate("Y-m-d",$mktime);
	$emp_atten_time=gmdate("H:i:s",$mktime);
	$emp_atten_moment=gmdate("YmdHis",$mktime);
	
	
	$result1=mysql_query("SELECT * FROM add_employee WHERE emp_id='$user'");
    $row1=mysql_num_rows($result1);
	$field1=mysql_fetch_array($result1);
	
	$result2=mysql_query("SELECT * FROM emp_personal_info WHERE emp_id='$user'");
    $row2=mysql_num_rows($result2);
	
	$result3=mysql_query("select * from emp_login where emp_id='$user' and emp_password='$pass'");
    $row3=mysql_num_rows($result3);
	
	$result4=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='1'");
    $row4=mysql_num_rows($result4);
	
	//$result5=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='1'");
    //$row5=mysql_num_rows($result5);
	
	$result6=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='2'");
    $row6=mysql_num_rows($result6);
if($_SERVER['REMOTE_ADDR']=="203.188.188.11")	
{
		if($status==1)
		{
			if($row4==0)
			{
					if($field1[8]==1)
					{
						
						 if($row3==1)
						 {
								if($emp_atten_time>"10:30:00" and $status==1 and $message=="")
								{
									exit(header("location:index.php?mess=Please, Write down the cause of delay"));
								}
								else
								{
									$table01="emp_attendance";
									$array01=array("$table_id","$user","$today_date","$emp_atten_time","$emp_atten_moment","$message","$status");
									$query->normal_insert($table01,$array01);
									exit(header("location:index.php?user=$user"));
								}
							
						 }
						 else
						 {
						   exit(header("location:index.php?mess=Sorry! User Id and Password does't match."));
						 }
						
					}
					else if($row1[8]==0)
						{
						   exit(header("location:index.php?mess=Sorry! Your email varification is not completed."));
						}
					else if($row1[8]==3)
						{
							exit(header("location:index.php?mess=Sorry! Your account is disabled by admin"));
						}
					else
						{
						   exit(header("location:index.php?mess=Sorry! This User ID is not exist"));
						}
		
			}
			else
			{
			  exit(header("location:index.php?mess=Hello! You already enterd"));
			}
		}
		
		
		
		
		
		else
		{
			 if($row3==1)
			 {
					if($row4==0 and $row6==0)
					{
						exit(header("location:index.php?mess=Stop! You don't entry"));
					}
					else if($row4==1 and $row6==1)
					{
						exit(header("location:index.php?mess=Hello! You already exited"));
					}
					else
					{
						$table01="emp_attendance";
						$array01=array("$table_id","$user","$today_date","$emp_atten_time","$emp_atten_moment","$message","$status");
						$query->normal_insert($table01,$array01);
						exit(header("location:index.php?user=$user"));
					}
			 }
			 else
			 {
			   exit(header("location:index.php?mess=Sorry! User Id and Password does't match."));
			 }
		}
}
else
{
			   exit(header("location:index.php?mess=Sorry! You are not in office."));
}
?>
<? ob_flush(); ?> 