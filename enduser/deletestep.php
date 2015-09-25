<?php
require 'function.php';
$id=$_GET['id'];
$pid=$_GET['pid'];
deletestep($id);
			echo "<script type='text/javascript'>alert('Deleted Successfully');</script>";
			header("location:liststeps.php?id=$pid");
			exit();
?>