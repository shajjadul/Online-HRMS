<?php
session_start();
//print $kk=$_SESSION['user'];
if(empty($_SESSION['actual'])){header("location:../logout.php");} 
?>

