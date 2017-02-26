<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Termination Form</title>
      <link rel="STYLESHEET" type="text/css" href="../css/add_emp_popup.css" />
      <script type='text/javascript' src='../js/gen_validatorv31.js'></script>
      <script type="text/javascript" src="../js/termination_identification.js"></script>
</head>
<body>
<!-- Form Code Start -->
<form id='contactus' action='termination_insert.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Termination Form</legend>

<div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
<div align="center" style="color: #F00;  font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message1'];?></div>
        
<div class='container'>
    <label for='employeeid' >Employee ID: </label><br/>
    <input type='text' name='employeeid' id='employeeid' value='' maxlength="50" onBlur="show(this.value)"/> <span id="3nd"></span><br/>
    <span id='contactus_employeeid_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='terminationdate' >Termination Date*:</label><br/>
    <input type='date' name='terminationdate' placeholder="yyyy-mm-dd" id='terminationdate' value='' maxlength="50" /><br/>
    <span id='contactus_terminationdate_errorloc' class='error'></span>
</div>


<div class='container'>
    <label for='message' >Termination Reason:</label><br/>
    <textarea rows="10" cols="50" name='message' id='message'></textarea><br/>
    <span id='contactus_message_errorloc' class='error'></span>
</div>

<div class='container'>
    <input type='submit' name='Submit' value='Submit' /> 
    <input type="reset" value='Reset' />
    <a style="text-decoration:none" href="javascript:window.close();"><input type="button" value="Close"></a>
</div>
</fieldset>
</form>
<!-- client-side Form Validations:
Uses the excellent form validation script from JavaScript-coder.com-->

<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("employeeid","req","Please provide Employee ID");

    frmvalidator.addValidation("terminationdate","req","Please provide termination date");
	
    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");
	
// ]]>
</script>

</body>
</html>