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
document.getElementById('CurMonth').onchange = disablefield;
document.getElementById('PreMonth').onchange = disablefield;
document.getElementById('Individual').onchange = disablefield;
}

function disablefield()
{
if ( document.getElementById('CurMonth').checked == true ){
document.getElementById('EmpId').value = '';
document.getElementById('EmpId').disabled = true}
else if ( document.getElementById('PreMonth').checked == true ){
document.getElementById('EmpId').value = '';
document.getElementById('EmpId').disabled = true}
else if (document.getElementById('Individual').checked == true ){
document.getElementById('EmpId').disabled = false}
}
</script>


      <script type='text/javascript'>
      function AttenFilter()
      {
		  
        if(!document.getElementsByName("filter")[0].checked && !document.getElementsByName("filter")[1].checked && !document.getElementsByName("filter")[2].checked)
        {
        alert("Select a filter option");
        return false;
        }		  
		  
		  
        if(document.getElementsByName("filter")[2].checked && document.forms['AttendenceFilter']['EmpId'].value=='')
        {
        alert("Write Employee ID");
       document.forms['AttendenceFilter']['EmpId'].style.background = 'Yellow';
        return false;
        }		  
		  
		
      }
      </script>
              

<?php
	
	$mktime=mktime()+6*3600;
	$today_date=gmdate("Y-m-d",$mktime);
	$current_time=gmdate("H:i:s",$mktime);
	$result01=mysql_query("select * from emp_attendance where emp_atten_date='$today_date' and status='1' ORDER BY emp_atten_moment DESC");
?>
<form name="AttendenceFilter" action="AttendenceFilterTemp.php?ac=attendance" method="post" onsubmit="return AttenFilter()">
<div style="padding:3px 0 5px 100px; margin-top:10px; background-color:#D1D1D1; font-size:18px;">
   <div style="float:left; font-weight:700;">Filter By:</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="1" id="CurMonth"/> Current Month</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="2" id="PreMonth"/> Previous Month</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="3" id="Individual"/> Individual <input type="text" name="EmpId" id="EmpId" maxlength="30" placeholder="Employee ID" disabled/></div>
   <div style="float:left; padding-left:10px;"><input type="submit" value=" Filter "/></div>
   <div style="clear:both;"></div>
</div>
</form>
<div align="center" style="font-size:24px; margin-top:5px;"><a href="../../pdf/today.php" target="_blank"><img src="../icon/pdf2.png" height="20" border="0"/></a> Todays employee attendence</div>


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
	   $result02=mysql_query("select * from emp_attendance where emp_atten_date='$today_date' and emp_id='$row01[1]' and status='2'");
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

