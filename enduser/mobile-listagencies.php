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
$agen = listagency();
$edate = findsubs($id);
$no=0;

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>List Agencies - ENDINMIND</title>

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
  <!--    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css"> -->
 

</head>
<body>
   

  
            
 <div style="">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 5px; "class="panel-title mdi-action-assignment mdi-4x"><h2> List Agencies</h2></h3>
    </div>
    <div style="padding:5px;  padding-bottom: 5px;" class="panel-body">

<div style="text-align: center;">
  
  
  <?php if($agen){?>
  <?php foreach($agen as $a){
	  $d = date('Y-m-d');
	  $sss = findsubs($a['agencyid'])?>
      <?php if(strtotime($d) >= strtotime($sss['enddate'])){?>
  
  <?php }else {?>
 
  
  

 
 
  <div style="padding: auto;">
  <div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="mobile-agenlistprocess.php?aid=<?php echo $a['agencyid'];?>">
        <img class="img-circle" width="100px" height="100px" src="../agency/files/<?php echo $a['logo'];?>" /></h3>
    </div>
    <div class="panel-body">
          <h3>Agency Name:<?php echo $a['agencyname'];?> <br/></h3>
  Branch: <?php echo $a['branch'];?> <br/>
  Address: <?php echo $a['address'];?>
  </a>
    </div>
</div>
</div>
 <?php }?>
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

   

</body>

</html>
