<style type="text/css">
fieldset
{
	   width:370px;
	   padding:5px 0 0 0;
	   border:2px solid #ccc;;
	   overflow-x:hidden; overflow-y:auto;


}

legend
{
   font-family: Verdana, Geneva, sans-serif; 
   font-size: 1.0 em;
   font-weight:bold;
   color: #804040;
}

#PenLeaReq0
{
	width:99%;
	height:25px;
	padding-left:3px;
	background-color:#D6D6EB;
}
#PenLeaReq1
{
	width:99%;
	height:25px;
	padding-left:3px;
	background-color:#CCE6FF;
}
#scorllarea
{
	height:250px;
	overflow-x:hidden; overflow-y:auto;
}
a
{
	text-decoration:none;
}
a:hover
{
	text-decoration:none;
	color:#FF0000;
}

</style>



<div>

 <div style="float:left; width:400px; height:250px;">
   <div style="margin-left:5px;">
     <fieldset >
     <legend style="color:#0033CC;">Pending Leave Requests</legend>
     <div id="scorllarea">
     <?php
	   $result01=mysql_query("select * from emp_leave_app where Status='0' ORDER BY SubmitTime ASC");
        $sl=0;
		while($field01=mysql_fetch_array($result01))
		{
	   $emp_id=$field01[1];
	   $sl=$sl+1;
	   $slcss=$sl%2;
	   $result02=mysql_query("select * from add_employee where emp_id='$emp_id'");
	   $field02=mysql_fetch_array($result02);
	 ?>
     
      <div id="PenLeaReq<?php echo $slcss; ?>"><a href="emp_leave.php?ac=leave"><?php echo $sl.". ".$field02[1]." &nbsp;&nbsp; ". $field01[10]; ?></a></div>
      
     <?php
		}
	 ?>
     </div>
     </fieldset >
   </div>
 </div>
 
 <div style="float:left; width:400px; height:250px;">
   <div style="margin-left:5px;">
     <fieldset >
     <legend style="color:#0033CC;">Notice</legend>
     <div id="scorllarea">
     <?php
	   $result03=mysql_query("select * from notice ORDER BY NoticeTime DESC LIMIT 15");
        $sl=0;
		while($field03=mysql_fetch_array($result03))
		{
	   $sl=$sl+1;
	   $slcss=$sl%2;
	   $short_heading= substr($field03[3],0,35);
	 ?>
     
      <div id="PenLeaReq<?php echo $slcss; ?>"><a href="notice_list.php?ac=notice"><?php echo $sl.". ".$short_heading."..."." &nbsp;&nbsp; ". $field03[7]; ?></a></div>
      
     <?php
		}
	 ?>
     </div>
     </fieldset >
   </div>
 </div>
 
 <div style="clear:both;"></div>

</div>