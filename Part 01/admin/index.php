<style>
h1{
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	color:#0053A6;
	text-shadow:0 5px 5px #1C7ABB;
}
#login_area{
	    width:350px;
		border:1px solid #693;
		margin:20px auto;
		border-radius:5px;
}
.image_area{
	margin-left:40px;
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
<h1>Welcome To Evolution Group Admin Panel</h1>
<div id="login_area">
<div class="image_area">
<img src="icon/animated_lock.gif" />
</div>
<div class="content_area">
<form action="login/checklog.php" method="post">
	<table>
    <div align="left"><?php echo "<font color='red'>".@$_GET["message"]."</font>";?></div>
		<tr>
			<td>User ID</td>
			<td>:</td>
			<td><input type="text" name="user_id" id="input_type"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td>:</td>
			<td><input type="password" name="password" id="input_type"></td>
		</tr>
        <tr>
			<td colspan="3">&nbsp;</td>
		</tr>

		<tr>
			<td colspan="3" align="right"><input type="submit" value="LOGIN" name="login" id="button_type"><input type="reset" value="RESET" id="button_type"></td>
		</tr>
	</table>
</form>
</div>
</div>