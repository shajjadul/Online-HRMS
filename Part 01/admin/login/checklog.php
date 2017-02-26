<? ob_start(); ?>
<?php
session_start();
if($_POST["login"]=="LOGIN")
{
	$_SESSION['sessionid']=session_id();
	 
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	$myusername=$_POST['user_id'];
	$mypassword=md5($_POST['password']);
	
	$sql="SELECT * FROM login_control WHERE user_id='$myusername' and password='$mypassword'";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	
		if($count==1)
		{
		
			$row=mysql_fetch_array($result);
			
			$_SESSION['actual']= $row[0];
		//Rediret location	
			exit(header("location:checklog2.php"));
		}
		else 
		{
			$message="Please insert right User Id and Password !";
		//Rediret location	
			exit(header("location:../index.php?message=$message"));
		}
}
?>
<? ob_flush(); ?> 