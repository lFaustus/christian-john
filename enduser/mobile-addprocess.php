<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=user($id);
if(isset($_POST['add']))
{	
	if(trim($_POST['processname'])== false)
	{
		$message="Enter a Process Name";
	}
	else
	{
	$_POST['id']=$id;
	addprocess($_POST);
	header('location:listprocess.php');
	exit();
	}
}
}
else
{
	header('location:logoutuser.php');
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

    <title>Add Process - ENDINMIND</title>

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


  


 



                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Add Process</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">





<center>
<form method="POST">
 
 
 <label for="processname"><h4> Process Name</label> 
 <input class="form-control" type="text" name="processname" id="processname" value="<?php if(isset($_POST['processname'])){ echo htmlentities($_POST['processname']);}?>" required/> 
 
 
 <label><h4>Recurrence</label> 
 <select id="fnivel" name="recurrence" class="form-control">
<option value="Null">None</option>
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
</select> 
 
 <br>
 <label for="numrecurrence"><h4>Number of Recurrence</label> <br>
 <input class="form-control" id="fnivel2" hidden="hidden" pk="1" type="number" name="numrecurrence" id="numrecurrence" value="<?php if(isset($_POST['numrecurrence'])){ echo htmlentities($_POST['numrecurrence']);}?>" min="1" max="10" /> 
 
 
 <label for="agency"><h4>Agency</label> 
 <input class="form-control"  type="text"  name="agency" id="agency" value="<?php if(isset($_POST['agency'])){ echo htmlentities($_POST['agency']);}?>"/> 
 
 
 &nbsp; 
 <input class="btn btn-info btn-raised" type="submit" name="add" value="CREATE" /> 
 
 
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
$(document).ready(function (){
    $("#fnivel").change(function () {
  var selected_option = $('#fnivel').val();

  if (selected_option != 'Null') {
    $('#fnivel2').attr('pk','1').show();
  }
  if (selected_option == 'Null') {
    $("#fnivel2").removeAttr('pk').hide();
  }
})
  });	
</script>

</body>

</html>