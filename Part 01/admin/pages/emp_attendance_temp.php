<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; utf-8">
<title>Evolution HRM</title>
<?php include("../config/config.php");?>
<link rel="stylesheet" type="text/css" href="../css/home_page.css">

</head>

<body>
<?php
	include("../../dbase/class.dbase.php");
	$conn=new dbase;
	$conn->connection();
	include '../../dbase/class.query.php';
	$query=new insert;
?>
<div class="heading_area">
  <div id="heading_content">
		   <?php
		    include("header.php");
		   ?>
  </div>
</div>


<div class="home_page_main_body">
	<div id="home_page_main_body_content">
		 <div class="menu_area">
		   <?php
		    include("indexmenu.php");
		   ?>
		</div>
         
		 <div class="body_area">
		   <?php
		   include("emp_attendance_sheet.php");
		   ?>
		</div>
         
    </div>
    
</div> 


<div class="fornt_footer">
  <div class="footer_content">
		   <?php
		    include("footer.php");
		   ?>
  </div>
</div>


</body>
</html>
