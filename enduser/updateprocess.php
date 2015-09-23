<?php
require 'function.php';
$message="";
$flag=0;
$pid=$_GET['id'];
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=user($id);
$process=process($pid);
if(isset($_POST['update']))
{	
	if(trim($_POST['processname'])== false)
	{
		$message="Enter a Process Name";
	}
	else
	{
	$_POST['id']=$id;
	$_POST['pid']=$pid;
	updateprocess($_POST);
	header('location:listprocess.php');
	exit();
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

    <title>Agency - ENDINMIND</title>

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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>Create Process </h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">
                <!-- /.row -->



<div style="text-align: center; padding-left: 300px; padding-right: 300px; padding-top: 30px;"> 
<form method="POST">
<table>
 
 <label for="processname"><h4> Process Name </h4> </label> 
 <input class="form-control" type="text" name="processname" id="processname" value="<?php if(isset($_POST['processname'])){ echo htmlentities($_POST['processname']);}else{ echo htmlentities($process['processname']);}?>" required/> 
 
 
 <label><h4> Recurrence </h4></label> 
 <select name="recurrence" class="form-control">
<option value="Null">None</option>
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
</select> 
 
 
 <label for="numrecurrence"><h4> Number of Recurrence </h4> </label> 
 <input class="form-control" type="number" name="numrecurrence" id="numrecurrence" value="<?php if(isset($_POST['numrecurrence'])){ echo htmlentities($_POST['numrecurrence']);} else{ echo htmlentities($process['numrec']);}?>" /> 
 
 
 <label for="agency"><h4> Agency </h4></label> 
 <input class="form-control" type="text" name="agency" id="agency" value="<?php if(isset($_POST['agency'])){ echo htmlentities($_POST['agency']);}else{echo htmlentities($process['agencycopiedfrom']);}?>" /> 

<div style="padding-top: 30px;">
  &nbsp;   <button  class="btn btn-fab btn-info mdi-navigation-check" type="submit"  name="update"/> </button>
</div>
<!--  &nbsp; 
 <input class="" type="submit" name="update" value="UPDATE" />  -->
 
</table>
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