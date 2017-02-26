
<?php
     $value=$_GET['q'];
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	 $result = mysql_query("SELECT * FROM add_employee WHERE emp_id='$value'");
	 $row=mysql_num_rows($result);
	 $field=mysql_fetch_array($result);
	 if($row==1)
	 { 
		$empname=strtoupper($field[1]);
		$department_array=array("1"=>"Evolution Group Ltd.",
							   "2"=>"Evolution Migration Ltd.",
							   "3"=>"Evolution Overseas Studies Ltd.",
							   "4"=>"Evolution IT Ltd.",
							   "5"=>"Evolution Tours &amp; Travels Ltd.",
							   "6"=>"Evolution Trading &amp; Consultency Ltd.");
		$departmentconvert=$department_array[$field[6]];
		echo "<span style='color:#F00;'>$empname</br>$field[5]</br><b>$departmentconvert</b></span>"; 
?>
       <input type="hidden" value="<?php echo $field[5];?>" name="EmpDesignation" /><input type="hidden" value="<?php echo $field[6];?>" name="EmpDepartment" />
       <input type="hidden" value="<?php echo $field[4];?>" name="submit_date" />
<?php
	
	 }
	 else
	 {
		echo "<span style='color:#F00;'>This ID doesn't exist!</span>"; 
	 }
?>
	            