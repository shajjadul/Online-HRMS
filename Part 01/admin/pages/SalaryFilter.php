<style type="text/css">
    .Table
    {
        display: table;
		width:996px;
		margin-left:2px;
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
	color:#000000;
	border:1px solid black;
	height:23px;
	text-align:center;
	}
	#vatued
	{
	width:100%;
	border-collapse:collapse;
	}
	#sub_td
	{
		border:0px;
		text-align:left;
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

<form name="AttendenceFilter" action="SalaryFilterTemp.php?ac=salary" method="post" onsubmit="return AttenFilter()">
<div style="padding:3px 0 5px 100px; margin-top:10px; background-color:#D1D1D1; font-size:18px;">
   <div style="float:left; font-weight:700;">Filter By:</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="1" id="CurMonth"/> Current Month</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="2" id="PreMonth"/> Previous Month</div>
   <div style="float:left; padding-left:10px;"><input type="radio" name="filter" value="3" id="Individual"/> Individual <input type="text" name="EmpId" id="EmpId" maxlength="30" placeholder="Employee ID" disabled/></div>
   <div style="float:left; padding-left:10px;"><input type="submit" value=" Filter "/></div>
   <div style="clear:both;"></div>
</div>
</form>



<div style="width:1000px; min-height:600px;">
  <div style=" text-align:center; width:996px; height:30px; margin:11px 2px 3px 2px; font-family: Tahoma, Geneva, sans-serif; font-weight:800; font-size:18px;">
  
<?php

	$filter=$_POST["filter"];
	@$EmpId=$_POST["EmpId"];
		
	if($filter==1)
	{
		echo "Salary list of ".date('F Y', strtotime(date('Y-m')." -1 month"));
	}
	else if($filter==2)
	{
		echo "Salary list of ".date('F Y', strtotime(date('Y-m')." -2 month"));
	}
	else if($filter==3)
	{
		echo "Salary list of ".$EmpId;
	}
?>
     
  </div>
  <div class="Table">
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
      			<p>Month</p>
            </div><div style="clear:both;"></div>  
       </div> 
    </div>

<?php

		if($filter==1)
		{
		$per=date('Y-m', strtotime(date('Y-m')." -1 month"));
		
		$result01=mysql_query("select * from emp_salary_slip01 where EmpSalMonth='$per' ORDER BY EmpSalMonth DESC");
		}
		else if($filter==2)
		{
		$perpre=date('Y-m', strtotime(date('Y-m')." -2 month"));
		
		$result01=mysql_query("select * from emp_salary_slip01 where EmpSalMonth='$perpre' ORDER BY EmpSalMonth DESC");
		}
		else if($filter==3)
		{
		$result01=mysql_query("select * from emp_salary_slip01 where EmpId='$EmpId' ORDER BY EmpSalMonth DESC");
		}

	    //$result01=mysql_query("select * from emp_salary_slip01 ORDER BY EmpSalMonth DESC");
	   
        $sl=0;
		while($field01=mysql_fetch_array($result01))
		{
	    $sl=$sl+1;
	   
	   $result02=mysql_query("select * from add_employee where emp_id='$field01[1]'");
	   //$row01=mysql_num_rows($result01);
	   $field02=mysql_fetch_array($result02);
	   
		$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");	
		list($emp_y,$emp_m)=explode("-",$field01[4]);
		$emp_month=$month_array[$emp_m];
		$month= $emp_month." ".$emp_y;
		
		
	   $result=mysql_query("select * from emp_salary_slip02 where EmpSalIdenti='$field01[0]'");
	   //$row01=mysql_num_rows($result01);
	   $field=mysql_fetch_array($result);
		
	   $result03=mysql_query("select * from emp_salary_slip03 where EmpSalIdenti='$field01[0]'");
	   //$row01=mysql_num_rows($result01);
	   $field03=mysql_fetch_array($result03);
	   $totaladdition=$field03[2]+$field03[3]+$field03[4]+$field03[5]+$field03[6]+$field03[7]+$field03[8];
	   
	   
	   $result04=mysql_query("select * from emp_salary_slip04 where EmpSalIdenti='$field01[0]'");
	   //$row01=mysql_num_rows($result01);
	   $field04=mysql_fetch_array($result04);
	   $totaldeduction=$field04[2]+$field04[3]+$field04[4]+$field04[5]+$field04[6];
	   
	   $netsalary=$totaladdition-$totaldeduction;
		
		
?>
        <div class="Row0">
            <div class="cell0" style="width:84px;">
                <span id="rowcontent"><?php echo $sl;?></span>
            </div>
            <div class="cell0" style="width:118px;">
                <span id="rowcontent"><?php echo $field01[1];?></span>
            </div>
            <div class="cell0" style="width:228px;">
                <span id="rowcontent"><?php echo $field02[1];?></span>
            </div>
            <div class="cell0" style="width:178px;">
                <span id="rowcontent"><?php echo $field01[3];?></span>
            </div>
            <div class="cell0" style="width:178px;">
                <span id="rowcontent"><?php echo $field01[2];?></span>
            </div>
            <div class="cell0" style="width:138px;">
                <span id="rowcontent"><?php echo $month;?></span>
            </div>
            <div style="clear:both;"></div>
        </div>
<?php
		

?>
  
   <div class="content">
      <div style="width:986px; min-height:300px; margin:2px 5px 5px 5px; background-color: #CEE7FF;"><!--Page Area -->
      <div align="right"><a href="../../pdf/salaryslippdf.php?slip=<?php echo $field01[0]; ?>" target="_blank"><img src="../icon/pdf2.png" border="0" /></a></div>
           <div style="margin-left:300px; margin-bottom:5px;">
           <b>Employee Name:</b> <?php echo $field02[1]; ?><br />
           <b>Designation:</b> <?php echo $field01[2]; ?><br />
           <b>Department:</b> <?php echo $field01[3]; ?><br />
           <b>Month:</b> <?php echo $emp_month; ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Year:</b>  <?php echo $emp_y; ?>
           </div>
           <div style=" width:980px; margin-left:3px; padding-bottom:3px;">
           <table id="vatued"><tbody>
             <tr>
               <td>Total days: <b><?php echo $field[2]; ?></b></td>
               <td>Working days: <b><?php echo $field[3]; ?></b></td>
               <td>Holidays: <b><?php echo $field[4]; ?></b></td>
               <td>Leaves: <b><?php echo $field[5]; ?></b></td>
               <td>Unpaid Leaves: <b><?php echo $field[6]; ?></b></td>
               <td>Presents: <b><?php echo $field[7]; ?></b></td>
               <td>Absences: <b><?php echo $field[8]; ?></b></td>
               <td>Delays: <b><?php echo $field[9]; ?></b></td>
             </tr>
           </tbody></table>
           </div>
           <div style=" width:980px; margin-left:3px; padding-bottom:10px;">
           <table id="vatued"><tbody>
           
                <tr>
                 <th colspan="2" width="50%">Earnings</th>
                 <th colspan="2" width="50%">Deductions</th>
                </tr>
                
                <tr>
                   <td width="25%">Basic Salary </td> <td width="25%"><?php echo $field03[2]; ?></td> <td width="25%">Absence </td> <td width="25%"><?php echo $field04[2]; ?></td>
                </tr>
                
                <tr>
                   <td width="25%">House allowance </td> <td width="25%"><?php echo $field03[3]; ?></td> <td width="25%">Delay</td> <td width="25%"><?php echo $field04[3]; ?></td>
                </tr>
                
                <tr>
                   <td width="25%">Medical allowance</td> <td width="25%"><?php echo $field03[4]; ?></td> <td width="25%">Provident Fund</td> <td width="25%"><?php echo $field04[4]; ?></td>
                </tr>
                
                <tr>
                   <td width="25%">Conveyance</td> <td width="25%"><?php echo $field03[5]; ?></td> <td width="25%">Profession Tax</td> <td width="25%"><?php echo $field04[5]; ?></td>
                </tr>
                
                <tr>
                   <td width="25%">Remuneration</td> <td width="25%"><?php echo $field03[6]; ?></td> <td width="25%">Others</td> <td width="25%"><?php echo $field04[6]; ?></td>
                </tr>
                
                <tr>
                   <td width="25%">Festival bonus</td> <td width="25%"><?php echo $field03[7]; ?></td> <td width="25%"><b>Total Deduction</b></td> <td width="25%"><b><?php echo $totaldeduction; ?></b></td>
                </tr>
                
                <tr>
                   <td width="25%">Others</td> <td width="25%"><?php echo $field03[8]; ?></td> <td colspan="2" width="50%"></td>
                </tr>
                
                <tr>
                   <td width="25%"><b>Total Addition</b></td> <td width="25%"><b><?php echo $totaladdition; ?></b></td> <td width="25%" style="font-family:Verdana, Geneva, sans-serif;"><b>Net Salary</b></td> <td width="25%" style="font-family:Verdana, Geneva, sans-serif;"><b><?php echo $netsalary; ?></b></td>
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