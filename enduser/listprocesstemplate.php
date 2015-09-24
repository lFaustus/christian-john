<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{

	header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$info=user($id);
$ptemplate = listprocesstemplate($id);
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List of Subscribed Process</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

<div style="text-align: center;">

  <?php if($ptemplate){?>
  <?php foreach($ptemplate as $pt){
	  $waiting =waitingproductivity($pt['aprocessid']);
	  $done =doneproductivity($pt['aprocessid']);
	  $undone = undoneproductivity($pt['aprocessid']);
	  $total = productcount($pt['aprocessid']);
	  $rtotal =productreqcount($pt['aprocessid']);
	  $uncheck=productrequncheck($pt['aprocessid']);
	  $check=productreqcheck($pt['aprocessid']);
	  ?>
  <div>

    <div class="well well-lg">
  
  <a href="startrequirements.php?pid=<?php echo $pt['aprocessid'];?>">
  <h4> <?php echo $pt['processname'];?> </h4> <br/>
  FROM AGENCY : <br><?php echo $pt['agencyname'];?><br/>
  BRANCH : <?php echo $pt['branch'];?><br/>
  ADDRESS : <?php echo $pt['address'];?>
  </a> <br>
   <a class="btn btn-danger btn-raised" onclick="return confirm('Are You Sure?')" href="deletesubsprocess.php?id=<?php echo $pt['spid'];?>">DELETE</a>
  <hr/>
  <h3>Status</h3>

  <p>WAITING: <?php echo $waiting['ide'];?>/<?php echo $total['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; DONE : <?php echo $done['ide'];?>/<?php echo $total['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; UNDONE : <?php echo $undone['ide'];?>/<?php echo $total['ide'];?></p>
  <h4>REQUIREMENTS</h4>
  <p>UNCHECK : <?php echo $uncheck['ide'];?>/<?php echo $rtotal['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; CHECK : <?php echo $check['ide'];?>/<?php echo $rtotal['ide'];?></p>
  <p></p>
 
  </div> </div>
  <?php }?>
  <?php }?>
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
