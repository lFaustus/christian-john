<?php
require 'function.php';
$id=$_GET['id'];
deleteuser($id);
header('location:logoutagency.php');
exit;
?>