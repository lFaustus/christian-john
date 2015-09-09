<?php
require 'function.php';
$id=$_GET['id'];
activateeu($id);
header('location:deactivatedenduser.php');
exit();
?>