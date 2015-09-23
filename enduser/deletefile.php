<?php
require 'function.php';
$id=$_GET['id'];
deletefile($id);
			echo "<script type='text/javascript'>
			alert('The File Has Been Deleted!');
			window.location='listfile.php';
			</script>";
exit;
?>