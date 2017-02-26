<?php
	ob_start();
?>
    <?php include("../config/config.php");?>
    <?php
    $noticeno=$_POST['noticeno'];
    $department=$_POST['department'];
    $noticeheadline=$_POST['noticeheadline'];
    $message=$_POST['message'];
    $submittedby=$_POST['submittedby'];
    $designation=$_POST['designation'];
	$notice_id=$_POST['notice_id'];
    //$resdesignation=$_POST['resdesignation'];
    //$resdepartment=$_POST['resdepartment'];
	
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
	
	//########### EDIT NOTICE INFORMATION ###############
	
	$table_name01="notice";
	$update_field01="NoticeNo='$noticeno', NoticeFor='$department', Headline='$noticeheadline00', Details='$message00', Name='$submittedby', Designation='$designation'";
	$identification01="NoticeId='$notice_id'";
	$query->DynamicUpdate($table_name01,$update_field01,$identification01);
	
	
    /*$mess="message=Congratulation! You successfully done the job.";
	header("Location:emp_resume_show.php?$mess");*/
    $mess="message=Congratulation! All of your informations updated successfully.";
	exit(header("Location:notice_view.php?ac=notice&&$mess"));
	
?>


<? ob_flush(); ?> 