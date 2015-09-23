<?php
require 'function.php';
$id=$_GET['id'];
deleteuser($id);
header('location:logoutuser.php');
exit;
?>