<?php
require 'function.php';
$id=$_GET['id'];
activategencies($id);
header('location:deactivatedagencies.php');
exit();
?>