<style type="text/css">
#vatued td,th
{
border:1px solid black;
height:28px;
text-align:center;
}
#vatued
{
width:98%;
border-collapse:collapse; margin-top:15px;
}
</style>

<script>
window.onload = function() {
document.getElementById('IndDate').onchange = disablefield;
document.getElementById('CurMonth').onchange = disablefield;
document.getElementById('PreMonth').onchange = disablefield;
document.getElementById('Individual').onchange = disablefield;
}

function disablefield()
{
if ( document.getElementById('Individual').checked == true )
{
document.getElementById('atten_date').value = '';
document.getElementById('atten_date').disabled = true
}	
else if ( document.getElementById('CurMonth').checked == true ){
document.getElementById('atten_date').value = '';
document.getElementById('atten_date').disabled = true}
else if ( document.getElementById('PreMonth').checked == true ){
document.getElementById('atten_date').value = '';
document.getElementById('atten_date').disabled = true}
else if (document.getElementById('IndDate').checked == true ){
document.getElementById('atten_date').disabled = false}
	
	
if ( document.getElementById('IndDate').checked == true ){
document.getElementById('EmpId').value = '';
document.getElementById('EmpId').disabled = true
document.getElementById('year').value = '';
document.getElementById('year').disabled = true
document.getElementById('month').value = '';
document.getElementById('month').disabled = true
}	
else if ( document.getElementById('CurMonth').checked == true ){
document.getElementById('EmpId').value = '';
document.getElementById('EmpId').disabled = true
document.getElementById('year').value = '';
document.getElementById('year').disabled = true
document.getElementById('month').value = '';
document.getElementById('month').disabled = true
}
else if ( document.getElementById('PreMonth').checked == true ){
document.getElementById('EmpId').value = '';
document.getElementById('EmpId').disabled = true
document.getElementById('year').value = '';
document.getElementById('year').disabled = true
document.getElementById('month').value = '';
document.getElementById('month').disabled = true
}
else if (document.getElementById('Individual').checked == true ){
document.getElementById('EmpId').disabled = false
document.getElementById('year').disabled = false
document.getElementById('month').disabled = false
}
}
</script>


      <script type='text/javascript'>
      function AttenFilter()
      {
		  
        if(!document.getElementsByName("filter")[0].checked && !document.getElementsByName("filter")[1].checked && !document.getElementsByName("filter")[2].checked && !document.getElementsByName("filter")[3].checked)
        {
        alert("Select a filter option");
        return false;
        }		  
		  
		  
        if(document.getElementsByName("filter")[0].checked && document.forms['AttendenceFilter']['atten_date'].value=='')
        {
        alert("Select date.");
       document.forms['AttendenceFilter']['atten_date'].style.background = 'Yellow';
        return false;
        }		  
		  
		  
        if(document.getElementsByName("filter")[3].checked && document.forms['AttendenceFilter']['EmpId'].value=='')
        {
        alert("Write Employee ID");
       document.forms['AttendenceFilter']['EmpId'].style.background = 'Yellow';
        return false;
        }		  
		  
        if(document.getElementsByName("filter")[3].checked && document.forms['AttendenceFilter']['EmpId'].value!='' && document.forms['AttendenceFilter']['year'].value=='')
        {
        alert("Select a year.");
       document.forms['AttendenceFilter']['year'].style.background = 'Yellow';
        return false;
        }		  
		  
		
      }
      </script>
              
              

<?php
	
	$mktime=mktime()+6*3600;
	$today_date=gmdate("Y-m-d",$mktime);
	$current_time=gmdate("H:i:s",$mktime);
	$filter=$_POST["filter"];
	@$select_date=$_POST["atten_date"];
	@$EmpId=$_POST["EmpId"];
	@$year=$_POST["year"];
	@$month=$_POST["month"];
	//$result01=mysql_query("select * from emp_attendance where emp_atten_date='$today_date' and status='1' ORDER BY emp_atten_moment DESC");
	if($filter==0)
	{
	$result01=mysql_query("select * from emp_attendance where emp_atten_date='$select_date' and status='1' ORDER BY emp_atten_moment DESC");
		
	}
	else if($filter==1)
	{
    $result01=mysql_query("SELECT * FROM emp_attendance WHERE YEAR(emp_atten_date) = YEAR(CURDATE()) AND MONTH(emp_atten_date) = MONTH(CURDATE()) and status='1' ORDER BY emp_atten_moment ASC");
	}
	else if($filter==2)
	{
    $result01 = mysql_query("SELECT * FROM emp_attendance WHERE (month(emp_atten_date) = (month(now())-1)) and status='1' ORDER BY emp_atten_moment ASC");
	}
	else if($filter==3)
	{
	  if($month!='')
	  {
	  $result01=mysql_query("select * from emp_attendance where  month(emp_atten_date)='$month' and year(emp_atten_date)='$year' and emp_id='$EmpId' and status='1' ORDER BY emp_atten_moment ASC");
	  }
	  else
	  {
	  $result01=mysql_query("select * from emp_attendance where  year(emp_atten_date)='$year' and emp_id='$EmpId' and status='1' ORDER BY emp_atten_moment ASC");
	  }
	}
?>
<form name="AttendenceFilter" action="AttendenceFilterTemp.php?ac=attendance" method="post" onsubmit="return AttenFilter()">
<div style="padding:3px 0 5px 10px; margin-top:10px; background-color:#D1D1D1; font-size:18px;">
   <div style="float:left; font-weight:700;">Filter By:</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="0" id="IndDate"/> Date <input type="text" name="atten_date" id="atten_date" maxlength="30" placeholder="yyyy-mm-dd" disabled/></div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="1" id="CurMonth"/> Current Month</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="2" id="PreMonth"/> Previous Month</div>
   <div style="float:left; padding-left:10px;">
   <input type="radio" name="filter" value="3" id="Individual"/> 
   <input type="text" name="EmpId" id="EmpId" maxlength="30" placeholder="Employee ID" disabled/>
   
   <select name="year" id="year"  disabled="disabled">
   <option value="" selected="selected">Year</option>
      <?php
	    $y=gmdate("Y",$mktime);
	    for($i=2014; $i<=$y;$i++)
		{
	  ?>
      <option value="<?php echo $i;?>"><?php echo $i;?></option>
      <?php
		}	  
		?>
   </select>
   
<select name="month" id="month" disabled="disabled">
  <option value="" selected="selected">Month</option>
  <option value="01">Jan</option>
  <option value="02">Feb</option>
  <option value="03">Mar</option>
  <option value="04">Apr</option>
  <option value="05">May</option>
  <option value="06">Jun</option>
  <option value="07">Jul</option>
  <option value="08">Aug</option>
  <option value="09">Sep</option>
  <option value="10">Oct</option>
  <option value="11">Nov</option>
  <option value="12">Dec</option>
</select>
   
   </div>
   <div style="float:left; padding-left:10px;"><input type="submit" value=" Filter "/></div>
   <div style="clear:both;"></div>
</div>
</form>
<div align="center" style="font-size:24px; margin-top:5px;">
<?php
	if($filter==0)
	{
	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");	
	
     list($emp_y,$emp_m,$emp_d)=explode("-",$select_date);
	 $emp_month=$month_array[$emp_m];
	 $SelectedDate=$emp_d." ".$emp_month." ".$emp_y;
	 
		echo "<a href='../../pdf/attendencepdf.php?cd=$select_date' target='_blank'><img src='../icon/pdf2.png' height='20' border='0'/></a>"." Employee attendence list on ".$SelectedDate;
	}
	else if($filter==1)
	{
		echo "Employee attendence list on".date("\of F Y");
	}
	else if($filter==2)
	{
		echo "Employee attendence list on ".date('F Y', strtotime(date('Y-F')." -1 month"));
	}
	else if($filter==3)
	{
		echo "Employee attendence list of ".$EmpId;
	}
?>
</div>

<div align="center" style="width:1000px; min-height:600px;">
<table id="vatued">
    <tr>
        <th width="10%">Employee ID</th>
        <th width="30%">Employee Name</th>
        <th width="10%">Enter Time</th>
        <th width="15%">Cause of Delay</th>
        <th width="10%">Exit Time</th>
        <th width="15%">Cause of Early Exit</th>
        <th width="10%">Date</th>
     </tr>
<?php
		while($row01=mysql_fetch_array($result01))
		{
	  // $result02=mysql_query("select * from emp_attendance where emp_atten_date='$today_date' and emp_id='$row01[1]' and status='2'");
	  
	if($filter==0)
	{
       $result02=mysql_query("select * from emp_attendance where emp_id='$row01[1]' and emp_atten_date='$select_date' and status='2'");
	}
	  
	  
	else if($filter==1)
	{
       $result02=mysql_query("SELECT * FROM emp_attendance WHERE YEAR(emp_atten_date) = YEAR(CURDATE()) AND MONTH(emp_atten_date) = MONTH(CURDATE()) and emp_id='$row01[1]' and emp_atten_date='$row01[2]' and status='2'");
	}
	else if($filter==2)
	{
      $result02 = mysql_query("SELECT * FROM emp_attendance WHERE (month(emp_atten_date) = (month(now())-1)) and emp_id='$row01[1]' and emp_atten_date='$row01[2]' and status='2'");
	}
	else if($filter==3)
	{
	   $result02=mysql_query("select * from emp_attendance where emp_id='$EmpId' and emp_atten_date='$row01[2]' and status='2'");
	}
	   $row02=mysql_fetch_array($result02);
	   $result03=mysql_query("SELECT * FROM add_employee WHERE emp_id='$row01[1]'");
       $row03=mysql_fetch_array($result03);
?>
   <tr>
        <td><?php echo $row01[1];?></td>
        <td><?php echo $row03[1];?></td>
        <td>
		<?php
		if($row01[3]<="10:15:00")
		{
		 echo $row01[3]." "."AM";
		}
		else
		{
		  if($row01[3]<'12:00:00')
		  {
		   echo "<span style='color:red;'>$row01[3] AM</span>";
		  }
		  else
		  {
			  list($h,$m,$s)=explode(":",$row01[3]);
			  $pm_h=$h-12;
			  if(strlen($pm_h)==1)
			  {
			  $pm_time="0".$pm_h.":".$m.":".$s." "."PM";
		      echo "<span style='color:red;'>$pm_time</span>";
			  }
			  else
			  {
			  $pm_time=$pm_h.":".$m.":".$s." "."PM";
		      echo "<span style='color:red;'>$pm_time</span>";
			  }
		  }
		}
		 ?>
        </td>
        <td><?php echo $row01[5];?></td>
        
        <td>
		<?php
		if($row02[3]!="")
		{
		  if($row02[3]<'12:00:00')
		  {
		   echo $row02[3]." AM";
		  }
		  else
		  {
			  list($h,$m,$s)=explode(":",$row02[3]);
			  $pm_h=$h-12;
			  if(strlen($pm_h)==1)
			  {
			  $pm_time="0".$pm_h.":".$m.":".$s." "."PM";
		      echo $pm_time;
			  }
			  else
			  {
			  $pm_time=$pm_h.":".$m.":".$s." "."PM";
		      echo $pm_time;
			  }
		  }
		}
		else
		{
		   echo $row02[3];
		}
		 ?>
        
        </td>
        
        <td><?php echo $row02[5];?></td>
        <td><?php echo $row01[2];?></td>
   </tr>
<?php
		}
?>
</table>
</div>

<br />
