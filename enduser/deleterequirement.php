<?php
require 'function.php';
$id=$_GET['id'];
$pid=$_GET['pid'];
deleterequirement($id);
echo "<script type='text/javascript'>alert('REQUIREMENT Has Been DELETED');</script>";
			header("location:rspage.php?pid=$pid");
			exit();
?>