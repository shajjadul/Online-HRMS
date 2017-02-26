<?php
	ob_start();
?>
    <?php
    $noticeno=$_POST['noticeno'];
    $department=$_POST['department'];
    $noticeheadline=$_POST['noticeheadline'];
    $message=$_POST['message'];
    $submittedby=$_POST['submittedby'];
    $designation=$_POST['designation'];
	$mktime=mktime()+6*3600;
    //$submit_moment= gmdate("YmdHis",$mktime);
	$todaydate=gmdate("Y-m-d",$mktime);
	//$emp_atten_time=gmdate("H:i:s",$mktime);
	$noticemoment=gmdate("YmdHis",$mktime);
	
	
			$order   = array("'", '"', ":",";");
			//replace by
			$replace = array("&#39", '&#34', "&#58","&#59");
			//Call replace function
			$noticeheadline00 = str_replace($order, $replace, $noticeheadline);
			$message00=str_replace($order, $replace, $message);
	
	
	include '../../dbase/class.dbase.php';
	$conn=new dbase;
	$conn->connection();
	
	include '../../dbase/class.query.php';
	$query=new insert;
	
    include "../../library/class.SecurityCode.php";
    $code=new SecurityCode();
    $table_id=$code->Generator("10");
    //$table_id02=$code->Generator("10");	
	
	$table01="notice";
	
	$array01=array("$table_id","$noticeno","$department","$noticeheadline00","$message00","$submittedby","$designation","$todaydate","$noticemoment");
	
	$query->normal_insert($table01,$array01);
	
    //$mess="message=Congratulation! You successfully done the job.";
	exit(header("Location:notice_view.php?ac=notice"));
?>
<? ob_flush(); ?> 
