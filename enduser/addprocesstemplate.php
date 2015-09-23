<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{

	header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$aid=$_GET['aid'];
$pid=$_GET['pid'];
$_POST['aid'] = $aid;
$_POST['id'] = $id;
$_POST['pid'] = $pid;
addprocesstemplate($_POST); 
			echo "<script type='text/javascript'>
			alert('The Process Has Been Downloaded!');
			window.location='agenlistprocess.php?aid=".$aid."';
			</script>";
			exit;
?>