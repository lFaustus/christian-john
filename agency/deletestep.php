<?php
require 'function.php';
$id=$_GET['id'];
$pid=$_GET['pid'];
deletestep($id);
header("location:liststeps.php?id=$pid");
exit();
?>