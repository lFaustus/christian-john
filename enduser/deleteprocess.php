<?php
require 'function.php';
$id=$_GET['id'];
deleteprocess($id);
header('location:listprocess.php');
exit();
?>