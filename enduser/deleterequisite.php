<?php
require 'function.php';
$sid=$_GET['id'];
$pid=$_GET['pid'];
$i = $_GET['i'];
deleterequisite($i);
$message="THE DATA HAS BEEN DELETED!";
echo "<script type='text/javascript'>alert('$message');</script>";
header("location:listrequisite.php?id=$sid&pid=$pid");
exit(); 
?>