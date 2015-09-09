<?php
require 'function.php';
$idno=$_GET['id'];
deleteplan($idno);
header('location:listplan.php');
exit();
?>