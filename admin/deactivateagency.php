<?php
require 'function.php';
$id=$_GET['id'];
deactiveagency($id);
header('location:activeagency.php');
exit();
?>