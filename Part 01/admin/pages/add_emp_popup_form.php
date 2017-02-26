<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Increment Form</title>
      <link rel="STYLESHEET" type="text/css" href="../css/add_emp_popup.css" />
      <script type='text/javascript' src='../js/gen_validatorv31.js'></script>
      <script type="text/javascript" src="../js/identification_id.js"></script>
<style>
#contactus select
{
  height:30px;
  width:300px;
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
<form id='contactus' action='add_emp_popup_insert.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Add Employee Form</legend>

<div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
<div align="center" style="color: #F00;  font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message1'];?></div>
        
<div class='container'>
    <label for='name' >Employee Name*: </label><br/>
    <input type='text' name='name' id='name' value='' maxlength="50" /><br/>
    <span id='contactus_name_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='employeeid' >Employee ID*: </label><br/>
    <input type='text' name='employeeid' id='employeeid' value='' maxlength="50" onBlur="show(this.value)"/> <span id="3nd"></span><br/>
    <span id='contactus_employeeid_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='email' >Email Address*:</label><br/>
    <input type='text' name='email' id='email' value='' maxlength="50" /><br/>
    <span id='contactus_email_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='joiningdate' >Joining Date*:</label><br/>
    <input type='date' name='joiningdate' placeholder="yyyy-mm-dd" id='joiningdate' value='' maxlength="50" /><br/>
    <span id='contactus_joiningdate_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='designation' >Designation*:</label><br/>
    <input type='text' name='designation' id='designation' value='' maxlength="100" /><br/>
    <span id='contactus_designation_errorloc' class='error'></span>
</div>

<div class='container'>
    <label for='department' >Department*:</label><br/>
    <select name="department" id="department"> 
       <option value="0">--Select one--</option>
       <option value="1">Evolution Group Ltd.</option>
       <option value="2">Evolution Migration Ltd.</option>
       <option value="3">Evolution Overseas Studies Ltd.</option>
       <option value="4">Evolution IT Ltd.</option>
       <option value="5">Evolution Tours &amp; Travels Ltd.</option>
       <option value="6">Evolution Trading &amp; Consultency Ltd.</option>
    </select>
    <br/>
    <span id='contactus_department_errorloc' class='error'></span>
</div>


<div class='container'>
    <label for='message' >Message:</label><br/>
    <textarea rows="10" cols="50" name='message' id='message'></textarea><br/>
    <span id='contactus_message_errorloc' class='error'></span>
</div>


<div class='container'>
    <input type='submit' name='Submit' value='Submit' /> 
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
    frmvalidator.addValidation("name","req","Please provide your name");
	
    frmvalidator.addValidation("employeeid","req","Please provide your ID");

    frmvalidator.addValidation("email","req","Please provide your email address");

    frmvalidator.addValidation("email","email","Please provide a valid email address");
	
    frmvalidator.addValidation("joiningdate","req","Please provide joining date");
	
    frmvalidator.addValidation("designation","req","Please provide designation");
	
    frmvalidator.addValidation("department","dontselect=0","Please provide department");

    frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

// ]]>
</script>

</body>
</html>