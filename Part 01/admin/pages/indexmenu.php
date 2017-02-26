<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Evolution Group</title>
<link rel="stylesheet" type="text/css" href="../css/menu.css" />

</head>

<body>
<?php
	@$active=$_GET['ac'];
	
	switch($active)
	{
		case "index":
		$index="class='active'";
		break;
		
		case "attendance":
		$attendance="class='active'";
		break;
		
		case "employee":
		$employee="class='active'";
		break;
		
		case "leave":
		$leave="class='active'";
		break;
				
		case "notice":
		$notice="class='active'";
		break;
		
		case "holyday":
		$holyday="class='active'";
		break;
		
		case "salary":
		$salary="class='active'";
		break;
		
		case "recruitment":
		$recruitment="class='active'";
		break;
				
		case "logout":
		$logout="class='active'";
		break;
		
		default:
		$index="class='active'";
	}
?>

<div id="navcontainer">
	<ul id="navlist">
		<li <?php print @$index ?>><a href="index.php?ac=index">Home</a></li>
		<li <?php print @$attendance ?>><a href="emp_attendance_temp.php?ac=attendance">Attendance</a></li>
		<li <?php print @$employee ?>><a href="emp_employee.php?ac=employee">Employee</a></li>
		<li <?php print @$leave ?>><a href="emp_leave.php?ac=leave">Leave</a></li>
		<li <?php print @$notice ?>><a href="notice.php?ac=notice">Notice</a></li>
		<li <?php print @$holyday ?>><a href="holiday.php?ac=holyday">Holiday</a></li>
		<li <?php print @$salary ?>><a href="salary.php?ac=salary">Salary</a></li>
		<li <?php print @$recruitment ?>><a href="recruitment.php?ac=recruitment">Recruitment</a></li>
		<li <?php print @$logout ?>><a href="../logout.php?ac=logout">Logout</a></li>
	</ul>
	
</div>
</body>
</html>
