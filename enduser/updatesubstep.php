<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=user($id);
$sid=$_GET['id'];
$pid=$_GET['pid'];
$i = $_GET['i'];
$step=forsubsteps($i);
	if(isset($_POST['update']))
	{
		if(trim($_POST['steps'])==false)
		{
			$message="Enter a Steps";
		}
		else
		{
			$_POST['sid'] = $i;
			updatesubsteps($_POST);
			echo "<script type='text/javascript'>
			alert('The Sub-Step Has been Updated');
			window.location='listsubsteps.php?id=".$sid."&pid=".$pid."';
			</script>";
		}
	}
}
else
{
	header('location:../intro.php');
	exit;
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>Update Substep</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">


 <!-- Navigation Buttons -->

 
 &nbsp; <a href="liststeps.php?id=<?php echo $pid; ?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>


<center>
 
<form method="POST">
 
 
 <label for="steps"><h3> Step </h3></label> 
 <textarea class="form-control" name="steps" id="requirement" value="<?php if(isset($_POST['steps'])){ echo htmlentities($_POST['steps']);}?>" required ><?php echo htmlentities($step['stepdesc']); ?></textarea> 
 <br>
 <button class="btn btn-info btn-fab btn-raised mdi-action-done" type="submit" name="update"> </button>
<!--  <input type="submit" name="update" value="UPDATE">  -->
<!--  <a >Return to List</a>  -->
 
 
</form>
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