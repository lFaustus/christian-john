<?php
require 'function.php';
$id=$_GET['id'];
deactivatedeu($id);
header('location:euactive.php');
exit();
?>

