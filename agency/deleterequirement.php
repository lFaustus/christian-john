<?php
require 'function.php';
$id=$_GET['id'];
$pid=$_GET['pid'];
deleterequirement($id);
header("location:listrequirement.php?id=$pid");
exit();
?>