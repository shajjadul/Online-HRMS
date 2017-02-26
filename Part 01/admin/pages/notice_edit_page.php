<style type="text/css">
#contactus fieldset
{
   width:945px;
   padding:20px;
   border:1px solid #ccc;
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
-khtml-border-radius: 10px;
border-radius: 10px;   
}

#contactus legend, h2
{
   font-family : Arial, sans-serif;
   font-size: 1.3em;
   font-weight:bold;
   color:#333;
}

#contactus label
{
   font-family : Arial, sans-serif;
   font-size:0.8em;
   font-weight: bold;
}

#contactus input[type="text"],textarea
{
  font-family : Arial, Verdana, sans-serif;
  font-size: 0.8em;
  line-height:140%;
  color : #000; 
  padding : 3px; 
  border : 1px solid #999;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    -khtml-border-radius: 5px;
    border-radius: 5px;

}

#contactus #noticeno, #submittedby, #designation
{
  height:30px;
  width:300px;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
  
}

#contactus #noticeheadline
{
  height:30px;
  width:900px;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   

}

#contactus input[type="date"]
{
  height:30px;
  width:300px;
  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
  
}

#contactus select
{
  height:35px;
  width:310px;
  border : 1px solid #ccc;
  padding-top:5px;
  padding-right:5px;

  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
  
}



#contactus textarea
{
  height:120px;
  width:900px;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
   border-radius: 8px;  
}

#contactus input[type="text"]:focus,input[type="date"]:focus,textarea:focus,select:focus
{
  color : #009;
  border : 1px solid #990000;
  font-weight:bold;
}

#contactus .container
{
   margin-top:8px;
   margin-bottom: 10px;
}

#contactus .error
{
   font-family: Verdana, Arial, sans-serif; 
   font-size: 0.7em;
   color: #900;
   background-color : #ffff00;
}

#contactus fieldset#antispam
{
   padding:2px;
   border-top:1px solid #EEE;
   border-left:0;
   border-right:0;
   border-bottom:0;
   width:350px;
}

#contactus fieldset#antispam legend
{
   font-family : Arial, sans-serif;
   font-size: 0.8em;
   font-weight:bold;
   color:#333;   
}

#contactus .short_explanation
{
   font-family : Arial, sans-serif;
   font-size: 0.6em;
   color:#333;   
}

/* spam_trap: This input is hidden. This is here to trick the spam bots*/
#contactus .spmhidip
{
   display:none;
   width:10px;
   height:3px;
}
#fg_crdiv
{
   font-family : Arial, sans-serif;
   font-size: 0.3em;
   opacity: .2;
   -moz-opacity: .2;
   filter: alpha(opacity=20);   
}
#fg_crdiv p
{
    display:none;
}
.buttonarea
{
	margin-top:40px;
}
#contactus input[type="submit"],input[type="reset"]
{
   width:100px;
   height:30px;
   padding-left:0px;
   cursor:pointer;   
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}

</style>
<script type='text/javascript' src='../js/gen_validatorv31.js'></script>
<?php
	//$notice_id=$_POST['notice_id'];
	$result01=mysql_query("SELECT * FROM notice ORDER BY NoticeTime DESC LIMIT 1");
    $rows01=mysql_fetch_array($result01);
    $department_array=array("1"=>"Evolution Group Ltd.",
						   "2"=>"Evolution Migration Ltd.",
						   "3"=>"Evolution Overseas Studies Ltd.",
						   "4"=>"Evolution IT Ltd.",
						   "5"=>"Evolution Tours &amp; Travels Ltd.",
						   "6"=>"Evolution Trading &amp; Consultency Ltd.");
	
?>

<div style="width:1000px; min-height:500px; background-color:#CEE7FF;">

  <div style="width:990px; padding:10px 5px 10px 5px;">
  
<form id='contactus' action='notice_edit_insert.php' method='post' accept-charset='UTF-8'>
<fieldset >
<legend>Notice Form</legend>

<div align="center" style="color:#008000; font-family:Tahoma, Geneva, sans-serif; font-size:12px;"><?php echo @$_GET['message'];?></div>
        
<div class='container'>
    <label for='noticeno' >Notice no.: </label><br/>
    <input type='text' name='noticeno' id='noticeno' value='<?php echo $rows01[1];?>' maxlength="100" /><br/>
    <span id='contactus_noticeno_errorloc' class='error'></span>
</div>


<div class='container'>
    <label for='department' >Notice for:</label><br/>
    <select name="department" id="department"> 
       <option value="<?php echo $rows01[2];?>" selected="selected"><?php echo $department_array[$rows01[2]];?></option>
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
    <label for='noticeheadline'>Notice Headline: </label><br/>
    <input type='text' name='noticeheadline' id='noticeheadline' value='<?php echo $rows01[3];?>'/><br/>
    <span id='contactus_noticeheadline_errorloc' class='error'></span>
</div>


<div class='container'>
    <label for='message' >Details:</label><br/>
    <textarea rows="10" cols="50" name='message' id='message'><?php echo $rows01[4];?></textarea>
    <span id='contactus_message_errorloc' class='error'></span>
</div>


<div class='container'>
    <label for='submittedby'>Submitted by: </label><br/>
    <input type='text' name='submittedby' id='submittedby' placeholder="name" value='<?php echo $rows01[5];?>' maxlength="100" /><br/>
    <span id='contactus_submittedby_errorloc' class='error'></span>
</div>


<div class='container'>
    <input type='text' name='designation' id='designation' placeholder="designation" value='<?php echo $rows01[6];?>' maxlength="100" /><br/>
    <span id='contactus_designation_errorloc' class='error'></span>
</div>

<div class='buttonarea'>
    <input type="hidden" value="<?php echo $rows01[0];?>" name="notice_id"/>
    <input type='submit' name='Submit' value='Edit'/> 
    <input type="reset" value='Reset' />
</div>
</fieldset>
</form>

  </div>

</div>
<script type='text/javascript'>
// <![CDATA[

    var frmvalidator  = new Validator("contactus");
    frmvalidator.EnableOnPageErrorDisplay();
    frmvalidator.EnableMsgsTogether();
    frmvalidator.addValidation("noticeno","req","Please provide notice no.");
	
    frmvalidator.addValidation("department","dontselect=0","Please provide department");
	
    frmvalidator.addValidation("noticeheadline","req","Please provide notice headline");
	
    frmvalidator.addValidation("message","req","Please provide notice message");

    frmvalidator.addValidation("submittedby","req","Please provide name of responsible officer");

    frmvalidator.addValidation("designation","req","Please provide designation of responsible officer");
	

   // frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");

// ]]>
</script>
