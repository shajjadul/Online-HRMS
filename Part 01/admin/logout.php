<?php session_start();
session_destroy();

$return_page="index.php";


header("Location:$return_page");
?>
