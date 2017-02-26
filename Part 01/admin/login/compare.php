<? ob_start(); ?>
<?php 
session_start(); 

	if($_SESSION['sessionid']==session_id())
	{
		
		include '../../dbase/class.dbase.php';
	    $conn=new dbase;
	    $conn->connection();
	
			$myusername=$_SESSION['actual'];
			$sql="SELECT securitycode FROM login_control where user_id='$myusername'";
			$result=mysql_query($sql);
			$row=mysql_fetch_array($result);
	
	//Hidden value comes from checklog2.php. All hidden fields declare checklog2.php Page
			$SecurityPositionOne=$_POST['firsthidden'];
			$SecurityPositionTwo=$_POST['secondhidden'];
			$SecurityPositionThree=$_POST['thirdhidden'];
	
	
	//Retrrive security from database table login_control
			$SecurityCode=($row[0]);
			
			
	//Find the position value from security code
			$SecurityRandomOne=$SecurityCode[$SecurityPositionOne-1];		
			$SecurityRandomTwo=$SecurityCode[$SecurityPositionTwo-1];
			$SecurityRandomThree=$SecurityCode[$SecurityPositionThree-1];
	
			
	//Inputed value from Checklog2.php file
			 $InputFirstShow=$_POST['firstshow'];
			 $InputSecondShow=$_POST['secondshow'];
			 $InputThirdtShow=$_POST['thirdtshow'];
			
						
	//Checking Inputed value and real security code.	
			if($SecurityRandomOne==$InputFirstShow && $SecurityRandomTwo==$InputSecondShow && 		
			$SecurityRandomThree==$InputThirdtShow)
			{
			
				$myusername=$_SESSION['actual'];
				$sql="SELECT link_access FROM login_control where user_id='$myusername'";
				$result=mysql_query($sql);
				$row=mysql_fetch_array($result);
			?>
				<script type="text/javascript">
					window.location="../pages/index.php";
				</script>
			<?php
				//header("location:$row[0]");
			}
			else
			
			{
				$message="Please insert Right Security Code !";
				exit(header("location:../index.php?message=$message"));
			}
	}
?>

<? ob_flush(); ?> 