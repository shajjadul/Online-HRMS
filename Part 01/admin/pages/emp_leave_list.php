<style type="text/css">
    .Table
    {
        display: table;
		width:996px;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Row0
    {
        display: table-row;
        position: relative;
    }
    .Row0:hover
	{
		background-color:#FFC4C4;
		cursor:pointer;
	}
    .cell
    {
	float:left; border:1px solid #ccc; padding:5px; min-height:25px;
    }
    .cell0
    {
	float:left; border:1px solid #ccc; padding:5px; min-height:25px;
    }
	p
	{
		color:#C00;
	}
.content {
padding: 5px 0 5px 0;
background-color:#fafafa;
}
#vatued td,th
{
color:#F00;
border:1px solid #F00;
height:28px;
text-align:center;
font-family:Verdana, Geneva, sans-serif;
}
#vatued
{
width:60%;
border-collapse:collapse;
}
#sub_td
{
	border:0px;
	text-align:left;
}

input[type="button"]
{
   width:150px;
   height:30px;
   padding-left:6px;
   color:#800000;
   cursor:pointer;
   font-family: Verdana, Geneva, sans-serif;
   font-weight:700;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

input[type="button"]:hover
{
   width:150px;
   height:30px;
   padding-left:6px;
   color:#fff;
   background-color:#000000;
   cursor:pointer;
   font-family: Verdana, Geneva, sans-serif;
   font-weight:700;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}


</style>
<script src="../js/jquery-1.10.2.js"></script>
<script>
jQuery(document).ready(function() {
    jQuery(".content").hide();
    jQuery(".Row0").click(function() {
        jQuery(this)
            .nextAll(".content:first").slideToggle(500)
            .siblings(".content").slideUp(500);
    });
});
</script>
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
	$department_array=array("1"=>"Evolution Group Ltd.",
						   "2"=>"Evolution Migration Ltd.",
						   "3"=>"Evolution Overseas Studies Ltd.",
						   "4"=>"Evolution IT Ltd.",
						   "5"=>"Evolution Tours &amp; Travels Ltd.",
						   "6"=>"Evolution Trading &amp; Consultency Ltd.");
						   
	$typeofleave_array=array("1"=>"Casual",
						   "2"=>"Earned",
						   "3"=>"Maternity",
						   "4"=>"Sick",
						   "5"=>"Unpaid");
						   
	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
		
	$result=mysql_query("select * from emp_leave_app where Status='0' ORDER BY SubmitTime ASC");
	
?>
<form name="AttendenceFilter" action="LeaveFilterTemp.php?ac=leave" method="post" onsubmit="return AttenFilter()">
<div style="padding:3px 0 5px 100px; margin-top:10px; background-color:#D1D1D1; font-size:18px;">
   <div style="float:left; font-weight:700;">Filter By:</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="1" id="CurMonth"/> Approved</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="2" id="PreMonth"/> Rejected</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="3" id="Individual"/> Individual <input type="text" name="EmpId" id="EmpId" maxlength="30" placeholder="Employee ID" disabled/></div>
   <div style="float:left; padding-left:10px;"><input type="submit" value=" Filter "/></div>
   <div style="clear:both;"></div>
</div>
</form>
<div align="center" style="font-size:24px; margin-top:5px;">Pending leave application</div>
<div align="center" style="width:1000px; min-height:600px;">
    <div class="Table">
        <div class="Title">
            <b></b>
        </div>
    <div class="Heading">
       <div>    
            <div class="cell" style="width:84px;">
      			<p>Serial No.</p>
            </div>    
            <div class="cell" style="width:118px;">
      			<p>Employee ID</p>
            </div>    
            <div class="cell" style="width:228px;">
      			<p>Employee Name</p>
            </div>    
            <div class="cell" style="width:178px;">
      			<p>Department</p>
            </div>    
            <div class="cell" style="width:178px;">
      			<p>Designation</p>
            </div>    
            <div class="cell" style="width:138px;">
      			<p>Working Days</p>
            </div><div style="clear:both;"></div>  
       </div> 
    </div>
        
<?php
        $sl=0;
		while($row=mysql_fetch_array($result))
		{
	   $emp_id=$row[1];
	   $sl=$sl+1;
	   $result01=mysql_query("select * from emp_personal_info where emp_id='$emp_id'");
	   $row01=mysql_num_rows($result01);
	   $rows01=mysql_fetch_array($result01);
	   
	   $result02=mysql_query("select * from add_employee where emp_id='$emp_id'");
	   $rows02=mysql_fetch_array($result02);
	   
	   $result03=mysql_query("select * from add_employee where emp_id='$row[9]'");
	   $rows03=mysql_fetch_array($result03);
?>
        <div class="Row0">
            <div class="cell0" style="width:84px;">
                <span id="rowcontent"><?php echo $sl;?></span>
            </div>
            <div class="cell0" style="width:118px;">
                <span id="rowcontent"><?php echo $row[1];?></span>
            </div>
            <div class="cell0" style="width:228px;">
                <span id="rowcontent"><?php echo $rows02[1];?></span>
            </div>
            <div class="cell0" style="width:178px;">
                <span id="rowcontent"><?php echo $department_array[$rows02[6]];?></span>
            </div>
            <div class="cell0" style="width:178px;">
                <span id="rowcontent"><?php echo $rows02[5];?></span>
            </div>
            <div class="cell0" style="width:138px;">
                <span id="rowcontent"><?php echo $row[5];?></span>
            </div>
            <div style="clear:both;"></div>
        </div>
 <?php
 
     list($apply_y,$apply_m,$apply_d)=explode("-",$row[10]);
	 $apply_month=$month_array[$apply_m];
	 $applydate=$apply_d." ".$apply_month." ".$apply_y;
 
     list($from_y,$from_m,$from_d)=explode("-",$row[3]);
	 $from_month=$month_array[$from_m];
	 $from=$from_d." ".$from_month." ".$from_y;
	 
     list($to_y,$to_m,$to_d)=explode("-",$row[4]);
	 $to_month=$month_array[$to_m];
	 $to=$to_d." ".$to_month." ".$to_y;
	 
     list($rej_y,$rej_m,$rej_d)=explode("-",$row[6]);
	 $rej_month=$month_array[$rej_m];
	 $re_joining=$rej_d." ".$rej_month." ".$rej_y;
	 
	 
	   $timestamp_start = strtotime($row[3]);
	
	   $timestamp_end = strtotime($row[4]);
	
	   $difference = abs($timestamp_end - $timestamp_start);
	   
	   $days = floor($difference/(60*60*24))+1;
	   if($days>1)
	   {
	   $total_day="<span style='color:#F00;'>".$days." days</span>";
	   }
	   else
	   {
	   $total_day="<span style='color:#F00;'>".$days." day</span>";
	   }
	   
	$result04=mysql_query("select sum(TotalWorkingDays) from emp_leave_app where EmpId='$emp_id' and TypeOfLeave=1 and YEAR(SubmitDate) = YEAR(CURDATE()) and Status='1'");
	list($Casual)=mysql_fetch_row($result04);
	
	$result05=mysql_query("select sum(TotalWorkingDays) from emp_leave_app where EmpId='$emp_id' and TypeOfLeave=2 and YEAR(SubmitDate) = YEAR(CURDATE()) and Status='1'");
	list($Earned)=mysql_fetch_row($result05);
	
	$result06=mysql_query("select sum(TotalWorkingDays) from emp_leave_app where EmpId='$emp_id' and TypeOfLeave=3 and YEAR(SubmitDate) = YEAR(CURDATE()) and Status='1'");
	list($Maternity)=mysql_fetch_row($result06);
	
	$result07=mysql_query("select sum(TotalWorkingDays) from emp_leave_app where EmpId='$emp_id' and TypeOfLeave=4 and YEAR(SubmitDate) = YEAR(CURDATE()) and Status='1'");
	list($Sick)=mysql_fetch_row($result07);
	
	$result08=mysql_query("select sum(TotalWorkingDays) from emp_leave_app where EmpId='$emp_id' and TypeOfLeave=5 and YEAR(SubmitDate) = YEAR(CURDATE()) and Status='1'");
	list($Unpaid)=mysql_fetch_row($result08);
?>   
   <div class="content">
   <div style="width:980px; min-height:300px; margin:2px 8px 5px 8px; background-color: #CEE7FF;"><!--Page Area -->
   <div style="padding:10px 15px 10px 15px;">
    <table width="100%"><tbody>
     <tr>
      <td width="15%">
      Apply Date
      </td>
      <td>:</td>
      <td>
         <?php echo $applydate;?>
      </td>
    </tr>

    
    <tr>
      <td>
      Type of leave
      </td>
      <td>:</td>
      <td>
         <?php echo $typeofleave_array[$row[2]];?>
      </td>
    </tr>
    
    <tr>
      <td>
      Period of Leave
      </td>
      <td>:</td>
      
      <td>
        <table>
            <tr>
              <td>&nbsp;&nbsp;From</td><td>:</td><td style="color:#00F;"><?php echo $from;?></td>
              <td>&nbsp;To</td><td>:</td><td style="color:#00F;"><?php echo $to;?></td>
            </tr>
        </table>
      </td>
    </tr>
    
    <tr>
      <td>
      Total Days
      </td>
      
      <td>:</td>
      
      <td>
       <?php echo $total_day;?>
      </td>
    </tr>
    
    <tr>
      <td>
      Total working days
      </td>
      
      <td>:</td>
      
      <td>
       <?php echo $row[5];?>
      </td>
    </tr>
    
    
    <tr>
      <td>
      Re-joining date
      </td>
      
      <td>:</td>
      
      <td>
        <?php echo $re_joining;?>
       </td>
    </tr>
    
    
    <tr>
      <td>
      Purpose of leave
      </td>
      
      <td>:</td>
      
      <td align="justify">
         <?php echo $row[7];?>
      </td>
    </tr>
    
    <tr>
      <td align="justify">
      Address during leave
      </td>
      
      <td>:</td>
      
      <td>
         <?php echo $row[8];?>
      </td>
    </tr>
    
    
    <tr>
      <td colspan="3" height="50" style="color:#A60000;">
      During the leave job responsibility will be performed by (if applicable)
      </td>
    </tr>
    
    <tr>
      <td>
      Name
      </td>
      
      <td>:</td>
      
      <td>
        <?php echo $rows03[1];?>
      </td>
    </tr>
    
    <tr>
      <td>
      Designation
      </td>
      
      <td>:</td>
      
      <td>
         <?php echo $rows03[5];?>
      </td>
    </tr>
    
    <tr>
      <td>
      Department
      </td>
      
      <td>:</td>
      
      <td>
         <?php echo $department_array[$rows03[6]];?>
      </td>
    </tr>
    
    
    <tr>
      <td align="center" colspan="3" style="font:700 18px Verdana, Geneva, sans-serif; color:#FF0000; padding-top:20px; padding-bottom:3px;">
         Employee leave history in <?php echo gmdate("Y",$mktime);?>
      </td>
    </tr>

    <tr>
      <td align="center" colspan="3">
           <table id="vatued">
              <tr>
                 <th>Tppe of leave</th><th>Total</th>   
              </tr>
              <tr>
                 <td>Casual leave</td><td><?php echo $Casual+0;?></td>  
              </tr>
              <tr>
                 <td>Earned leave</td><td><?php echo $Earned+0;?></td>    
              </tr>
              <tr>
                 <td>Maternity leave</td><td><?php echo $Maternity+0;?></td> 
              </tr>
              <tr>
                 <td>Sick leave</td><td><?php echo $Sick+0;?></td>  
              </tr>
              <tr>
                 <td>Unpaid leave</td><td><?php echo $Unpaid+0;?></td>  
              </tr>
           </table>
      </td>
    </tr>
    
    <tr>
      <td align="center" colspan="3" style="font:700 16px Verdana, Geneva, sans-serif; color: #005300; padding-top:10px; padding-bottom:10px;">
         Total paid leave: <?php echo $Casual+$Earned+$Maternity+$Sick+0;?> Days.
      </td>
    </tr>
    
    <tr>
      <td colspan="3" align="center" height="50">
        <input type="button" value="Recommendation"  onClick="window.open('recommendation.php?lid=<?php echo $row[0];?>', 'popuppage','width=400,toolbar=1,resizable=1,scrollbars=yes,height=400,top=100,left=350');">
      </td>
    </tr>
    
    </tbody></table>
     </div>
     </div>
    </div>
<?php
		}
?>
    </div>
</div>