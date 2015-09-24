<?php
require 'function.php';
$message="";
$flag=0;

if(!isset($_SESSION['islogin']))
{
		header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$info=user($id);
$pid=$_GET['pid'];
	if(isset($_POST['add']))
	{
		$req=trim($_POST['requirement']);
		$trap=reqname($pid,$req);
		if(trim($_POST['requirement'])==false)
		{
			$message="Enter a Requirement";
		}
		else if($trap)
		{
			$message="The Requirement is already in Added";
		}
		else if(trim($_POST['copy'])==false)
		{
			$message="Enter a Copy";
		}
		else
		{
			$_POST['pid'] = $pid;
			addrequirements($_POST);
			echo "<script type='text/javascript'>alert('Requirement HAS BEEN Added');

            window.location='rspage.php?id=$pid';
            </script>";
			
			exit();
			
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Add Requirement</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">


<div style="padding-left: 300px; padding-right: 300px;">
<div style="text-align: center;">
<form method="POST">
 
 
 <label for="requirement">Requirement</label> 
 <input class="form-control" type="text" name="requirement" id="requirement" value="<?php if(isset($_POST['requirement'])){ echo htmlentities($_POST['requirement']);}?>" required /> 
 
 
 <label for="copy">Number of Copy</label> 
 <input class="form-control" type="number" name="copy" id="copy" value="<?php if(isset($_POST['copy'])){ echo htmlentities($_POST['copy']);}?>" min="1" required /> 
 
 <br>
         <button type="submit"  class="btn btn-info btn-fab btn-raised mdi-action-done" name="add"></button>
 <!-- <input type="submit" name="add" value="ADD">  -->
 <a href="listrequirement.php?id=<?php echo $pid; ?>">Return to List</a> 
 

</form>
<a href="listrequirement.php?id=<?php echo $pid; ?>">Return to List</a>
<div> <?php echo $message;?> </div>
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
<script src="../js/jquery.min.js"></script> 
<script>
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

</body>

</html>