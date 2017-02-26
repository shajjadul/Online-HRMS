<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Add Employee Form</title>
      <link rel="STYLESHEET" type="text/css" href="../css/add_emp_popup.css" />
      <script type='text/javascript' src='../js/gen_validatorv31.js'></script>
      <script type="text/javascript" src="../js/increment_identification.js"></script>
</head>
<body>
<!-- Form Code Start -->
<form id='contactus' action='increment_insert.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Increment Form</legend>

<div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
<div align="center" style="color: #F00;  font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message1'];?></div>
        
<div class='container'>
    <label for='employeeid' >Employee ID: </label><br/>
    <input type='text' name='employeeid' id='employeeid' value='' maxlength="50" onBlur="show(this.value)"/><br/>
    <span id='contactus_employeeid_errorloc' class='error'></span>
</div>

<span id="3nd"></span>

<div class='container'>
    <label for='basictotal' >Basic Total:</label><br/>
    <input type='text' name='basictotal' id='basictotal' value='' maxlength="50" /><br/>
    <span id='contactus_basictotal_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='houseallowance' >House allowance(%):</label><br/>
    <input type='text' name='houseallowance'  id='houseallowance' value='60' maxlength="10" /><br/>
    <span id='contactus_houseallowance_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='medicalallowance' >Medical allowance(%):</label><br/>
    <input type='text' name='medicalallowance'  id='medicalallowance' value='20' maxlength="10" /><br/>
    <span id='contactus_joiningdate_errorloc' class='error'></span>
</div>


<div class='container'>
    <label for='convenience' >Convenience(%):</label><br/>
    <input type='text' name='convenience' id='convenience' value='20' maxlength="20" /><br/>
    <span id='contactus_convenience_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='activedate' >Active Date*:</label><br/>
    <input type='date' name='activedate' placeholder="yyyy-mm-dd" id='activedate' value='' maxlength="50" /><br/>
    <span id='contactus_activedate_errorloc' class='error'></span>
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
	
    frmvalidator.addValidation("basictotal","req","Please provide basic total");

    frmvalidator.addValidation("medicalallowance","req","Please provide medical allowance");
	
    frmvalidator.addValidation("convenience","req","Please provide convenience");
	
    frmvalidator.addValidation("activedate","req","Please provide active date");
	
    frmvalidator.addValidation("designation","req","Please provide designation");
	
    frmvalidator.addValidation("department","dontselect=0","Please provide department");
	
// ]]>
</script>

</body>
</html>