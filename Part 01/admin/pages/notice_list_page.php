<style type="text/css">
    .Table
    {
        display: table;
		width:996px;
		clear:both;
    }
    .Title
    {
        display: table-caption;
        text-align: center;
        font-weight: bold;
        font-size: larger;
    }
    .Heading
    {
        display: table-row;
        font-weight: bold;
        text-align: center;
    }
    .Row
    {
        display: table-row;
    }
    .Row0
    {
        display: table-row;
        position: relative;
    }
    .Row0:hover
	{
		background-color:#FFC4C4;
		cursor:pointer;
	}
    .cell
    {
	float:left; border:1px solid #ccc; padding:5px; min-height:25px;
    }
    .cell0
    {
	float:left; border:1px solid #ccc; padding:5px; min-height:25px;
    }
	p
	{
		color:#C00;
	}
	
	
.content {
padding: 5px 0 5px 0;
background-color:#fafafa;
}
</style>
<script src="../js/jquery-1.10.2.js"></script>
<script>
jQuery(document).ready(function() {
    jQuery(".content").hide();
    jQuery(".Row0").click(function() {
        jQuery(this)
            .nextAll(".content:first").slideToggle(500)
            .siblings(".content").slideUp(500);
    });
});
</script>

<?php
	
	/*$mktime=mktime()+6*3600;
	$today_date=gmdate("Y-m-d",$mktime);
	$current_time=gmdate("H:i:s",$mktime);*/
	$department_array=array("1"=>"Evolution Group Ltd.",
						   "2"=>"Evolution Migration Ltd.",
						   "3"=>"Evolution Overseas Studies Ltd.",
						   "4"=>"Evolution IT Ltd.",
						   "5"=>"Evolution Tours &amp; Travels Ltd.",
						   "6"=>"Evolution Trading &amp; Consultency Ltd.");
						   						   
	$month_array=array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
	
	$result=mysql_query("select * from notice ORDER BY NoticeTime DESC");
		
	
?>
<div align="center" style="width:1000px; min-height:400px;">
    <div class="Table">
        <div class="Title">
            <b>Notice List</b>
        </div>
    <div class="Heading">
       <div>    
            <div class="cell" style="width:118px;">
      			<p>Notice No.</p>
            </div>    
            <div class="cell" style="width:200px;">
      			<p>Notice For</p>
            </div>    
            <div class="cell" style="width:500px;">
      			<p>Headline</p>
            </div>    
            <div class="cell" style="width:130px;">
      			<p>Date</p>
            </div>  
            <div style="clear:both;"></div>
       </div> 
    </div>
    
<?php
        //$sl=0;
		while($rows01=mysql_fetch_array($result))
		{
	   //$emp_id=$row[1];
	   //$sl=$sl+1;
     list($noticedate_y,$noticedate_m,$noticedate_d)=explode("-",$rows01[7]);
	 $noticedate_month=$month_array[$noticedate_m];
	 $noticedate=$noticedate_d." ".$noticedate_month." ".$noticedate_y;
	   
?>
        <div class="Row0">
            <div class="cell0" style="width:118px;">
                <span id="rowcontent"><?php echo $rows01[1];?></span>
            </div>
            <div class="cell0" style="width:200px;">
                <span id="rowcontent"><?php echo $department_array[$rows01[2]];?></span>
            </div>
            <div class="cell0" style="width:500px;">
                <span id="rowcontent"><?php echo $rows01[3];?></span>
            </div>
            <div class="cell0" style="width:130px;">
                <span id="rowcontent"><?php echo $rows01[7];?></span>
            </div>
            <div style="clear:both;"></div>
        </div>
       <div class="content">
       
            <div style="width:996px; min-height:400px; background-color:#CEE7FF; padding: 0 0 5px 0;"><br />
                  <div style="width:800px; min-height:390px; margin:0 98px 20px 98px; background-color:#FFF;">
                  
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
                    <?php echo $rows01[5];?><br/>
                    <?php echo $rows01[6];?>
                    <br />
                    </div>
                      
                  </div>  
            </div>       
       
        </div><!-- End of Content Div -->

		<?php
         }
        ?>
    
    
        
    </div>
</div>