<?php
require 'function.php';
$id=$_GET['id'];
deleteprocess($id);
header('location:agencypage.php');
exit();
?>