<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{

	header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$info=user($id);
$aid = $_GET['aid'];
$aprocess = listagenprocess($aid);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Process - ENDINMIND</title>

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



 
 <div style="">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 5px; "class="panel-title mdi-action-assignment mdi-4x"><h2> List of Agency Process</h2></h3>
    </div>
    <div style="padding:5px;  padding-bottom: 5px;" class="panel-body">

<div style="text-align: center;">

<br/>

<div class = "row">
  <div class = "col-lg-12">
  <?php if($aprocess){?>
  <?php foreach($aprocess as $apro){?>
  <?php $val = checksubs($apro['aprocessid'],$id);?>
  <?php if($val){}else{?>
  <div>

    <div style="text-align: center" class="alert alert-dismissable alert-success">
      <h3> <?php echo $apro['processname'];?> </h4> <br> <a class="mdi-action-get-app mdi-3x" href="addprocesstemplate.php?pid=<?php echo $apro['aprocessid'];?>&aid=<?php echo $aid?>"></a></div> </div>
  <?php }}?>
  <?php }else


  { 

    echo "<div style='text-align: center; color: red; '><h4>This agency has not yet created a process!";}?>
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
