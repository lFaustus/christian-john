<?php
require 'function.php';
$id=$_GET['rid'];
$sid=$_GET['id'];
$pid=$_GET['pid'];
deletesteprequired($id);
header("location:liststeprequired.php?id=$sid&pid=$pid");
exit();
?>