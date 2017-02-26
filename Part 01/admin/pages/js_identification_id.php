
<?php
     $value=$_GET['q'];
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	 $result = mysql_query("SELECT * FROM add_employee WHERE emp_id='$value'") or die('No Table');
	 @$gg=mysql_fetch_array($result);
     if(!$gg)
	 {
		print "<img src='../icon/CheckMark.png'>";
	 }
	 else
	 {
	    print "<img src='../icon/Cross_mark.png'>";
	 }
	?>
	               