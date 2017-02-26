<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Add Employee Form</title>
      <link rel="STYLESHEET" type="text/css" href="../css/add_emp_popup.css" />
      <script type='text/javascript' src='../js/gen_validatorv31.js'></script>
      <script type="text/javascript" src="../js/identification_id.js"></script>
<style>
#contactus #HoliDayDate
{
  height:30px;
  width:300px;
  border : 1px solid #999;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
  
}

#contactus #HoliDayDate:focus
{
  color : #009;
  border : 1px solid #990000;
  font-weight:bold;
}

</style>
</head>
<body>
<?php
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
	$HoliDayId=$_GET['g'];
	$result01=mysql_query("SELECT * FROM holiday WHERE HoliDayId='$HoliDayId'");
    $field01=mysql_fetch_array($result01);
?>

<!-- Form Code Start -->
<form id='contactus' action='edit_holiday_insert.php?h=<?php echo $HoliDayId;?>' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Edit Holiday Form</legend>

<div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
<div align="center" style="color: #F00;  font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message1'];?></div>
        
<div class='container'>
    <label for='HolyDayDescription' >Holiday Description: </label><br/>
    <input type='text' name='HoliDayDescription' id='HoliDayDescription' value='<?php echo $field01[1];?>' maxlength="100" /><br/>
    <span id='contactus_HoliDayDescription_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='HoliDayDate' >Holiday Date: </label><br/>
    <input type='date' name='HoliDayDate' placeholder="yyyy-mm-dd" id='HoliDayDate' value='<?php echo $field01[2];?>' maxlength="50" /><br/>
    <span id='contactus_HoliDayDate_errorloc' class='error'></span>
</div>


<div class='container'>
    <input type='submit' name='Submit' value='Update' /> 
    <input type="reset" value='Reset' />
    <a style="text-decoration:none" href="javascript:window.close();"><input type="button" value="Close"></a></div>
</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("HoliDayDescription","req","Please provide Holiday Description");
    frmvalidator.addValidation("HoliDayDate","req","Please provide Holiday Date");

// ]]>
</script>

</body>
</html>