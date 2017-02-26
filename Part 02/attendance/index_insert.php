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
	//$milliseconds = round(microtime(true) * 1000);
	if($emp_atten_time>"10:30:00" and $status==1 and $message=="")
	{
				exit(header("location:index.php?mess=Please, Write down the cause of delay"));
	}
	else
	{
		if($status==1)
		{
			$query01=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='1'");
			if(mysql_num_rows($query01)==1)
			{
					exit(header("location:index.php?mess=Hello! You already enterd"));
			}
			else
			{
			    $query00=mysql_query("select * from emp_login where emp_id='$user' and emp_password='$pass'");
				if(mysql_num_rows($query00)==0)
					{
						exit(header("location:index.php?mess=Sorry! User Id and Password does't match."));
					}
				else
				{
				$table01="emp_attendance";
				$array01=array("$table_id","$user","$today_date","$emp_atten_time","$emp_atten_moment","$message","$status");
				$query->normal_insert($table01,$array01);
				exit(header("location:index.php?user=$user"));
				}
		     }
		}
		else
		{
			$query02=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='1'");
			$query03=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='2'");
			if(mysql_num_rows($query02)==0 and @mysql_num_rows($query03)==0)
			{
			   exit(header("location:index.php?mess=Stop! You don't entry"));
			}
			else if(mysql_num_rows($query02)==1 and mysql_num_rows($query03)==1)
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
	}
	
?>
<? ob_flush(); ?> 