<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Add Employee Form</title>
      <link rel="STYLESHEET" type="text/css" href="../css/add_emp_popup.css" />
      <script type='text/javascript' src='../js/gen_validatorv31.js'></script>
      <script type="text/javascript" src="../js/retrive_identification.js"></script>
<style>
#contactus select
{
  height:30px;
  width:300px;
  padding:3px 0 0 5px;
  border : 1px solid #ccc;
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
  
}
#contactus select:focus
{
  color : #009;
  border : 1px solid #990000;
  font-weight:bold;
}

</style>
</head>
<body>
<!-- Form Code Start -->
<form id='contactus' action='recommendation_insert.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Leave recommendation Form</legend>

<div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
<div align="center" style="color: #F00;  font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message1'];?></div>
        
<div class='container'>
    <label for='recommendation' >Status:</label><br/>
    <select name="recommendation" id="recommendation"> 
       <option value="0">--Select one--</option>
       <option value="1">Approve</option>
       <option value="2">Ignore</option>
    </select>
    <br/>
    <span id='contactus_recommendation_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='message' >Message:</label><br/>
    <textarea rows="5" cols="50" name='message' id='message'></textarea><br/>
    <span id='contactus_message_errorloc' class='error'></span>
</div>


<div class='container'>
    <input type="hidden" name="leaveappid" value="<?php echo $_GET['lid'];?>">
    <input type='submit' name='Submit' value='Submit' /> 
    <input type="reset" value='Reset'/>
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
    frmvalidator.addValidation("recommendation","dontselect=0","Please provide status");

    frmvalidator.addValidation("message","maxlen=500","The message is too long!");
	
// ]]>
</script>

</body>
</html>