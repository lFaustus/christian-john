<?php
require 'function.php';
$id=$_GET['id'];
deletesubsprocess($id);
header('location:listprocesstemplate.php');
exit;
?>