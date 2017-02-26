<style>
#area
{
	width:380px;
	height:380px;
	text-align:center;
	border:1px solid #ccc;
	  -webkit-border-radius: 5px;
	  -moz-border-radius: 5px;
	   border-radius: 5px;   
}
input[type="button"]
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
<div id="area">
	<?php
     $status=$_GET['mess'];
     if($status==1)
     {
     ?>
     <div style="color:#007900; font-family:Verdana, Geneva, sans-serif; font-size:24px; padding-top:125px;">
      Application Approved
     </div>
     <?php
      }
     else
     {
     ?>
     <div style="color:#F00; font-family:Verdana, Geneva, sans-serif; font-size:24px; padding-top:125px;">
      Application Ignored.
     </div>
     <?php
      }
     ?>
     <div style="padding-top:30px;">
     <a style="text-decoration:none" href="javascript:window.close();"><input type="button" value="Close page"></a>
     </div>
</div>