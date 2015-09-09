<?php
require 'function.php';
unset($_SESSION['islogin']);
unset($_SESSION['id']);
session_destroy();
header('location:loginagency.php');
exit();
?>