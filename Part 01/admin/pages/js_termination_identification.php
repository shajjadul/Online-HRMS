
<?php
     $value=$_GET['q'];
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	$department_array=array("1"=>"Evolution Group Ltd.",
					   "2"=>"Evolution Migration Ltd.",
					   "3"=>"Evolution Overseas Studies Ltd.",
					   "4"=>"Evolution IT Ltd.",
					   "5"=>"Evolution Tours &amp; Travels Ltd.",
					   "6"=>"Evolution Trading &amp; Consultency Ltd.");

	 $result0= mysql_query("SELECT * FROM add_employee WHERE emp_id='$value'");
	 //$row0=mysql_num_rows($result0);
	 $field0=mysql_fetch_array($result0);
	 if($field0[8]=='')
	 {
	    echo "<span style='color:#F00;'>This ID doesn't exist!</span>"; 
	 }
     else if($field0[8]==2)
	 {
		echo "<span style='color:#F00;'>This employee is terminated</span>"; 
	 }
	 else if($field0[8]==0 or $field0[8]==1)
	 {
			$result = mysql_query("SELECT * FROM emp_salary WHERE EmpId='$value' ORDER BY submit_date DESC limit 1");
			$row=mysql_num_rows($result);
			$field=mysql_fetch_array($result);
			if($row>=1)
			{ 
			$empname=strtoupper($field0[1]);
			$departmentconvert=$department_array[$field[7]];
			echo "<span style='color:#F00;'>$empname</br>$field[6]</br><b>$departmentconvert</b></span>"; 
			}
			else if($row==0)
			{
			$empname=strtoupper($field0[1]);
			$departmentconvert=$department_array[$field0[6]];
			echo "<span style='color:#F00;'>$empname</br>$field0[5]</br><b>$departmentconvert</b></span>"; 
			}
	   }
	 
	 
?>
	            