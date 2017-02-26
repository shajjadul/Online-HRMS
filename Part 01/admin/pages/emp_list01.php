<style type="text/css">
    .Table
    {
        display: table;
		width:996px;
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
    .Cell
    {
        display: table-cell;
        border:solid #999;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
		padding-top:5px;
		height:25px;
    }
    .Cell0
    {
        display: table-cell;
        border: 1px solid #999;
        border-width: thin;
        padding-left: 5px;
        padding-right: 5px;
		padding-top:5px;
		padding-bottom:5px;
		height:auto;
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
	
	$mktime=mktime()+6*3600;
	$today_date=gmdate("Y-m-d",$mktime);
	$current_time=gmdate("H:i:s",$mktime);
	$department_array=array("1"=>"Evolution Group Ltd.",
						   "2"=>"Evolution Migration Ltd.",
						   "3"=>"Evolution Overseas Studies Ltd.",
						   "4"=>"Evolution IT Ltd.",
						   "5"=>"Evolution Tours &amp; Travels Ltd.",
						   "6"=>"Evolution Trading &amp; Consultency Ltd.");
	$result01=mysql_query("select * from add_employee where status='0' or status='1' ORDER BY emp_joiningdate ASC");
	
?>
<div align="center" style="width:1000px; min-height:400px;">
    <div class="Table">
        <div class="Title">
            <b>Employee List</b>
        </div>
        <div class="Heading">
            <div class="Cell" style="width:76px;">
                <p>Serial No.</p>
            </div>
            <div class="Cell" style="width:130px;">
                <p>Employee ID</p>
            </div>
            <div class="Cell" style="width:240px;">
                <p>Employee Name</p>
            </div>
            <div class="Cell" style="width:200px;">
                <p>Department</p>
            </div>
            <div class="Cell" style="width:200px;">
                <p>Designation</p>
            </div>
            <div class="Cell" style="width:150px;">
                <p>Cell No.</p>
            </div>
            <div style="clear:both;"></div>
        </div>
        
<?php
        $sl=0;
		while($row01=mysql_fetch_array($result01))
		{
	   $sl=$sl+1;
	   $result02=mysql_query("select * from emp_personal_info where emp_id='$row01[2]'");
	   $row02=mysql_fetch_array($result02);
?>
        <div class="Row0">
            <div class="Cell0">
                <span id="rowcontent"><?php echo $sl;?></span>
            </div>
            <div class="Cell0">
                <span id="rowcontent"><?php echo $row01[2];?></span>
            </div>
            <div class="Cell0">
                <span id="rowcontent"><?php echo $row01[1];?></span>
            </div>
            <div class="Cell0">
                <span id="rowcontent"><?php echo $department_array[$row01[6]];?></span>
            </div>
            <div class="Cell0">
                <span id="rowcontent"><?php echo $row01[5];?></span>
            </div>
            <div class="Cell0">
                <span id="rowcontent"><?php echo $row02[7];?></span>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="content">
       <span> Lorem ipsum dolor sit amet consectetuer adipiscing elit orem ipsum dolor sit amet consectetuer adipiscing elit<span>
        </div>
<?php
		}
?>
    </div>
</div>