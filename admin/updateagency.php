<?php
require 'function.php';
$id=$_GET['id'];
updateagency($id);
header('location:agency.php');
exit();
?>