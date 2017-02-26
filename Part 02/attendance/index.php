<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
h1{
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	color:#0053A6;
	text-shadow:0 5px 5px #1C7ABB;
}
#login_area{
	    min-height:100px;
	    width:350px;
		border:1px solid #693;
		margin:20px auto;
		border-radius:5px;
		background-color: #E8E8FF;
   }
		
		
#image_area{
	    height:40px;
		width:350px;
		text-align:center;
		/*color: #008000;*/
		font-size:20px;
		font-weight:800;
		padding-top:80px;
	    background-image:url(icon/logo.png);
		background-size: contain;
		background-repeat:no-repeat;

}
.content_area{
	margin:10px 0 0 30px;	
}
td{
	font-family:Tahoma, Geneva, sans-serif;
	color:#004600;
}
#input_type{
	width:200px;
	height:30px;
	font-size:18px;
	color:#FF0000;
}
#button_type{
	width:100px;
	background-color:#008A45;
	border-radius:5px;
	color:#FFF;
}
#button_type:hover{
	background-color: #F00;
	color: #000;
	cursor:pointer;
}
</style>
<script>
var myVar=setInterval(function(){myTimer()},1000);

function myTimer()
{
var d=new Date();
var t=d.toLocaleTimeString();
var ltime="10:15:00 AM";
if(t<=ltime)
{
	var result = t.fontcolor("green");
}
else
{
    var result = t.fontcolor("red");

}
document.getElementById("demo").innerHTML=result;
document.getElementById("demo1").innerHTML=t;
}
</script>
<h1>Welcome To Evolution IT <br />
Employee Attendance</h1>
<div id="login_area">
<div id="image_area">
<p id="demo"></p>
</div>
<?php
   @$user=$_GET["user"];
	
	include("../dbase/class.dbase.php");
	$conn=new dbase;
	$conn->connection();
	include '../dbase/class.query.php';
	$query=new insert;
	
	$mktime=mktime()+6*3600;
	$today_date=gmdate("Y-m-d",$mktime);
	$current_time=gmdate("H:i:s",$mktime);
	$result01=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='1'");
    $rows01=mysql_fetch_array($result01);
	//print mysql_num_rows($result01);
	$result0201=mysql_query("select * from emp_attendance where emp_id='$user' and emp_atten_date='$today_date' and status ='2'");
	//print mysql_num_rows($result02);
	$result02=mysql_query("SELECT * FROM emp_photo WHERE emp_id='$user'");
    $rows02=mysql_fetch_array($result02);
	
	$result03=mysql_query("SELECT * FROM add_employee WHERE emp_id='$user'");
    $rows03=mysql_fetch_array($result03);
	
?>
<div class="content_area">
<form action="index_insert.php" method="post">
	<table>
        <tr>
         <td colspan="3">
            <div style="width:320px;">
            <div style="float:left; width:50px;">
            <?php 
			if($user!="" and mysql_num_rows($result01)==1)
			{
				if(mysql_num_rows($result02)==1)
				{
			 ?>
                  <img src="../image/<?php echo $rows02[2];?>" height="50" width="50"  border="0"/>
             <?php 
			     }
                 else
                 {
			 ?>
                   <img src="../image/<?php echo "common.jpg";?>" height="50" width="50"  border="0"/>
              <?php
				 }
			 }
			  ?>
            </div>
            <div style="float:left; width:270px;">
            
            <div>
            <?php
			if($user!="" and mysql_num_rows($result01)==1)
			{
				echo strtoupper($rows03[1]);
			}
            ?>
            </div>
            
            <div>
            <?php
			if(mysql_num_rows($result01)==1 and mysql_num_rows($result0201)==0  and $user!="")
			{
				if($rows01[3]<="10:15:00")
				{
					echo "<span style='color:green; font-size:14px;'>Your attendance counted with due time</span>";
				}
				else
				{
					echo "<span style='color:red;font-size:14px;'>Your attendance counted with delay time</span>";
				}
			}
			else if(mysql_num_rows($result01)==1 and mysql_num_rows($result0201)==1  and $user!="")
			{
					echo "<span style='color:green'>Your exit counted</span>";
			}
            ?>
            </div>
            
            </div>
            <div style="clear:both;"></div>
            </div>
            <div align="center"><?php echo "<font color='red'>".@$_GET["mess"]."</font>";?></div>
          </td>
        </tr>
		<tr>
			<td>Status</td>
			<td>:</td>
			<td>
				<?php 
				$exit_time="15:00:00";
                if($current_time<=$exit_time)
                {
				?>
            <input type="radio" name="status" checked="checked" value="1">Enter &nbsp; <input type="radio" name="status" value="2">Exit
                <?php
				} 
				else
				{
				?>
            <input type="radio" name="status" value="1">Enter &nbsp; <input type="radio" name="status"  checked="checked" value="2">Exit
                <?php
				} 
				?>
            </td>
		</tr>
		<tr>
			<td>User ID</td>
			<td>:</td>
			<td><input type="text" name="user_id" id="input_type"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" id="input_type" maxlength="12"></td>
		</tr>
        
		<tr>
			<td>Message</td>
			<td>:</td>
			<td><input type="text" name="message" id="input_type" maxlength="100"></td>
		</tr>
        
        <tr>
			<td colspan="3">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="3" align="center"><input type="submit" value="SUBMIT" name="login" id="button_type"> <input type="reset" value="RESET" id="button_type"></td>
		</tr>
	</table>
</form>
</div>
</div>
<div align="center" style=" font-size:50px; color:#CCC;">
<p id="demo1"></p>
</div>