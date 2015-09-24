<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{

	header('location:../intro.php');
	exit;
}

$message="";
$id=$_SESSION['id'];
$info=user($id);
$pid = $_GET['pid'];
$sid=$_GET['sid'];
$page = $_GET['page'];
if(isset($_POST['upload']))
{
$target_path = "uploads/"; 
	$target_path = $target_path . basename( $_FILES['file']['name']);	
if($_FILES['file']['name'] == "")
{
	$message ="No File";
	echo "<script>alert('".$message."');</script>";
}
else
{
	if (isset($_FILES['file']))
{
if($_FILES['file']["size"] > 50000)
{
			$message ="File is to big";
echo "<script>alert('".$message."');</script>";
}
elseif(move_uploaded_file($_FILES['file']['tmp_name'], $target_path))
{

move_uploaded_file($upl['tmp_name'], "uploads/".$upl['name'] );
	$_POST['rid'] = $sid;
	$_POST['pid'] = $pid;
	$_POST['id'] = $id;
	$_POST['file'] = $upl['name'];
	$_POST['filetype'] = $upl['type'];
	ftagreq($_POST);
			echo "<script type='text/javascript'>
			alert('The Fill Has Been Uploaded!');
			window.location='startsteps.php?page=".$page."&pid=".$pid."';
			</script>";
			exit;
}
else
{
	$message ="The File was not uploaded";
	echo "<script>alert('".$message."');</script>";	
}
}
}


}
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User - ENDINMIND</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="dist/css/material.css">
    <link rel="stylesheet" type="text/css" href="dist/css/material.min.css">

    <!-- MATERIAL CSS -->
  <!--   <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/> -->

    <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- ADMIN CSS -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>


<body>


   
    <div id="wrapper">
<!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('menu.php'); ?>

 
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>Attach File</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">




<div style="text-align: center;">
  			<h3>Add File</h3>
		<form method="POST" enctype="multipart/form-data">

				<input style="text-align: center" class="form-control" type="file" name="file" />
					<br/>			

                     <button type="submit"  class="btn btn-info btn-fab btn-raised mdi-action-done" name="upload"></button>

			<!-- <input  class="btn btn-info btn-raised mdi-action-done" type="submit" name="upload" value="UPLOAD" /> -->
		</form>


  
    </div>
</div>

                
            </div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
  



</body>

</html>
