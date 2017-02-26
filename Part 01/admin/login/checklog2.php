<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<? ob_start(); ?>
<center>
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
		
		
		$NumberOfSequrityDigit=strlen($row[0])-1;
				
		//Create Random Security Code
		$SecurityCode1=mt_rand(1,$NumberOfSequrityDigit);
		$SecurityCode2=mt_rand(1,$NumberOfSequrityDigit);
		$SecurityCode3=mt_rand(1,$NumberOfSequrityDigit);
		
		//Position of Security Code
		
		$PositionName=array("","First:","Second:","Third:","Fourth:","Fifth:","Sixth:","Seventh:",
		"Eighth:","Nineth:","Ten:");
		
		$value1=$PositionName[$SecurityCode1];
		$value2=$PositionName[$SecurityCode2];
		$value3=$PositionName[$SecurityCode3];
		
		//Security Code input field
		
		print"
		<fieldset style='width:400px; height:80px;'>
		<legend>Enter Your Security Code:</legend>
		
		<form action='compare.php' method='post'>
		<fieldset style='background-color:#99CC66'>
		<table width=100%>
			<tr>
				<td>$value1. <input type='text' size='1' name='firstshow'><input type='hidden' size=
				'3'name='firsthidden' value='$SecurityCode1'></td>
				<td>$value2. <input type='text' size='1' name='secondshow'><input type='hidden' size=
				'3' name='secondhidden'value='$SecurityCode2'></td>
				<td>$value3. <input type='text' size='1' name='thirdtshow'><input type='hidden' size=
				'3' name='thirdhidden'value='$SecurityCode3'></td>
			</tr>
		</table>
		</fieldset>
		<table>
			<tr>
				<td align='center'><input type='submit' value='GO'/></td>
			</tr>
		</table>
		</form>
		</fieldset>
		
		";
}
?>
</center>
<? ob_flush(); ?> 