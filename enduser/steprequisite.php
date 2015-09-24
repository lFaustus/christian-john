

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
$sid=$_GET['id'];
$pid=$_GET['pid'];
$st=liststep($pid);
if(isset($_POST['add']))
{
	if(trim($_POST['step']) == false)
	{
		$message="STEP MUST BE SELECTED";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		$_POST['sid']=$sid;
		$message="Co - Pre Steps HAS BEEN ADDED";
		addsteprequisite($_POST);
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("location:steprequisite.php?id=$sid&pid=$pid");
		exit();
	}

}


?>



<!DOC<!DOCTYPE html>
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Add Pre-requisite</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">


<br/>
<!-------->
<div class = "row">
  <div class = "col-lg-12">
  

 
<h3>ADD Requisite</h3>
<a href="listrequisite.php?id=<?php echo $sid;?>&pid=<?php echo $pid;?>">Back</a>
<?php if($st){?>
<form method="POST">
<label>STEP PREREQUISITE</label>
<select name="step">
<option value="">&nbsp;</option>
<?php foreach($st as $s){?>
<?php if($s['stepid'] == $sid)
{
	break;
}
else if(trapreq($s['stepid'],$sid))
{
}
else{?>
<option value="<?php echo $s['stepid'];?>"><?php echo $s['stepdesc'];?></option>
<?php }}?>
</select>
<input type="submit" name="add" value="ADD" />
</form>
<?php }else
{
	echo "No Steps Created";
}?>

  

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