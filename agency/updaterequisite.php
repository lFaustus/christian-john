<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=agency($id);
$sid=$_GET['id'];
$pid=$_GET['pid'];
$i = $_GET['i'];
$step=liststep($pid);
$rq=forrequisite($i);
if(isset($_POST['update']))
{
	if(trim($_POST['step']) == false)
	{
	}
	else
	{

		$_POST['i']=$i;
		updaterequisite($_POST);
			echo "<script type='text/javascript'>
			alert('Pre-requisite Steps has been updated.');
			window.location='listrequisite.php?id=".$sid."&pid=".$pid."';
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
  <?php include ('sidebar-agency.php'); ?>

 
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Update Requisite</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">


<br/>
<!-------->
<div class = "row">
  <div style="padding-left: 200px; padding-right: 200px; padding-bottom: 30px;" class = "col-lg-12">
  

<!--  <?php var_dump($rq);?> -->


<center>
<?php if($step){?>
<form method="POST">
<select name="requisite" class="form-control">

<option value="Prerequisite" <?php if($rq['type'] === 'Corequisite' ){echo 'selected'; }?> >Pre-requisite</option>
</select>

<select name="step" class="form-control">
<?php foreach($step as $s){?>
<?php if($s['stepid'] == $sid)
{
}
else{?>
<option value="<?php echo $s['stepid'];?>" <?php if($rq['coprestepid'] === $s['stepid'] ){echo 'selected'; }?> ><?php echo $s['stepdesc'];?></option>
<?php 
}
}?>
</select>

<button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="update"  /> </button> <br>

</form>
<?php 
}
else
{
	echo "No Steps Created";
}?>

    <div style="text-align: center; padding-bottom: 30px; padding-top: 30px;">
  <a href="listrequisite.php?id=<?php echo $sid;?>&pid=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>
</div>

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