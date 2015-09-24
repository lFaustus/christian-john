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


$image = listimage($id);
$doc = listdoc($id);
$video = listvideo($id);
$audio = listaudio($id);

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


   
<!--     <div id="wrapper"> -->

<div class="container-fluid">
 
 <div style="padding: auto;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List of Files</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">




      <ul class="nav nav-tabs" style="padding-bottom: 15px;">
    <li ><a href="#image" data-toggle="tab">Image</a></li>
    <li><a href="#documents" data-toggle="tab">Documents</a></li>
        <li><a href="#video" data-toggle="tab">Video</a></li>
            <li><a href="#audio" data-toggle="tab">Audio</a></li>
          </ul>


          <div  id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="image">

        <p> <?php include('listimage.php');?></p>
    </div>

    <div class="tab-pane fade" id="documents">
        <p>  <?php include('listdoc.php');  ?></p>
    </div>

    <div class="tab-pane fade" id="video">
        <p>   <?php include('listvideo.php');  ?></p>
    </div>
	
   <div class="tab-pane fade" id="audio">
        <p>   <?php include('listaudio.php');  ?></p>
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


</body>

</html>