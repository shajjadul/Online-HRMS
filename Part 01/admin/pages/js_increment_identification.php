
<?php
     $value=$_GET['q'];
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	 $result0= mysql_query("SELECT * FROM add_employee WHERE emp_id='$value'");
	 $field0=mysql_fetch_array($result0);
	 $row0=mysql_num_rows($result0);
	 
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
			$department_array=array("1"=>"Evolution Group Ltd.",
								   "2"=>"Evolution Migration Ltd.",
								   "3"=>"Evolution Overseas Studies Ltd.",
								   "4"=>"Evolution IT Ltd.",
								   "5"=>"Evolution Tours &amp; Travels Ltd.",
								   "6"=>"Evolution Trading &amp; Consultency Ltd.");
			$departmentconvert=$department_array[$field[7]];
			echo "<span style='color:#F00;'>$empname</br></b></span>"; 
?>
	
			 <div class='container'>
				<label for='designation' >Designation*:</label><br/>
				<input type='text' name='designation' id='designation' value='<?php echo $field[6];?>' maxlength="100" /><br/>
				<span id='contactus_designation_errorloc' class='error'></span>
			 </div>
			 
			<div class='container'>
				<label for='department' >Department*:</label><br/>
				<select name="department" id="department"> 
				   <option value="<?php echo $field[7];?>"><?php echo $departmentconvert;?></option>
				   <option value="1">Evolution Group Ltd.</option>
				   <option value="2">Evolution Migration Ltd.</option>
				   <option value="3">Evolution Overseas Studies Ltd.</option>
				   <option value="4">Evolution IT Ltd.</option>
				   <option value="5">Evolution Tours &amp; Travels Ltd.</option>
				   <option value="6">Evolution Trading &amp; Consultency Ltd.</option>
				</select>
				<br/>
				<span id='contactus_department_errorloc' class='error'></span>
			 </div>
					
		   
	<?php
		
		 }
		 else
		 {
			echo "<span style='color:#F00;'>Initial salary doesn't exist!</span>"; 
		 }
      }
	?>
