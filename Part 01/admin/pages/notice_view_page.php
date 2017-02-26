<style type="text/css">
input[type="submit"],input[type="button"],#submit
{
   font-weight:700;
   width:100px;
   height:30px;
   padding-left:0px;
   cursor:pointer;  
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
   border-radius: 5px;   
}
</style>
 <?php
	$result01=mysql_query("SELECT * FROM notice ORDER BY NoticeTime DESC LIMIT 1");
    $rows01=mysql_fetch_array($result01);
	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");	
     list($noticedate_y,$noticedate_m,$noticedate_d)=explode("-",$rows01[7]);
	 $noticedate_month=$month_array[$noticedate_m];
	 $noticedate=$noticedate_d." ".$noticedate_month." ".$noticedate_y;
	 
	   $department_array=array("1"=>"Evolution Group Ltd.",
							   "2"=>"Evolution Migration Ltd.",
							   "3"=>"Evolution Overseas Studies Ltd.",
							   "4"=>"Evolution IT Ltd.",
							   "5"=>"Evolution Tours &amp; Travels Ltd.",
							   "6"=>"Evolution Trading &amp; Consultency Ltd.");
	 
	 
 ?>     
<div style="width:1000px; min-height:500px; background-color:#CEE7FF; padding: 0 0 15px 0;"><br />
      <div style="width:800px; min-height:450px; margin:0 100px 50px 100px; background-color:#FFF;">
      
        <div style="width:740px; padding:20px 30px 10px 30px; font-weight:700;">
          <div style="float:left;">Notice no.: <?php echo $rows01[1];?></div>
          <div style="float:right;">Date: <?php echo $noticedate;?></div>
          <div style="clear:both;"></div>
        </div>
      
        <div style="text-align:center; margin:0 30px 20px 30px; font-size:22px; font-weight:700; text-decoration:underline;">
        <?php echo $rows01[3];?>
        </div>

        <div style="text-align:justify; padding:0 30px 20px 30px;">
        <?php echo $rows01[4];?>
         </div>
         
        <div style="text-align:left; margin:0 30px 0 30px;">
        <span style="color:#F00;">Note: </span>Notice for <?php echo $department_array[$rows01[2]];?>
        </div>
        
        <div style="text-align:right; margin:0 30px 0 30px; font-weight:700;">
        <?php echo $rows01[5];?><br />
        <?php echo $rows01[6];?>
        </div>
        
        
        
        <div style="margin:10px 10px 10px 10px; width:780px; color:#F00;">
        NB: <?php echo @$_GET['message'];?> If you need any correction, please click on Edit button. Otherwise click on Confirm button.
        </div>
        <div align="center">
        <form method="post" action="notice_edit.php?ac=notice">
        <!--<input type="hidden" value="<?php echo $rows01[0];?>" name="notice_id"/>-->
         <a style=" text-decoration:none;" href="notice.php?ac=notice"><input type="button" name="confirm" value="Confirm"></a>
         <input type="submit" name="edit" value="Edit" />
        </form> 
        </div>
        <br />
        
        
      </div>  
</div>