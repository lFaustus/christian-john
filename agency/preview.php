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
$info=agency($id);
$pid=$_GET['pid'];
$req = listrequirement($pid);
$steps = liststep($pid);
$c = 1;
$sub = '';
$sreq = '';
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>Preview</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">




   


          <div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="image">
          <div style="height: 500px; padding: auto;"class = "table-responsive">
            <div>
              <h3>Requirements</h3>
              <?php if($req){?>
              <ul>
              <?php foreach($req as $r){?>
              <li>(<?php echo $r['copyno'];?>) <?php echo $r['reqname'];?>  </li>
              <?php }?>
            </ul>
              <?php }else{?>
              <h3>No Reqirement</h3>
              <?php }?>
            </div>


            <div>
            <h3>STEPS</h3>
            <?php if($steps){?>

            <?php foreach($steps as $s){ $sub =listsubsteps($s['stepid']);$sreq=steprequirement($s['stepid']); ?>
            <p>STEP <?php echo $c;?> :</p>
            <p>Step Description : <?php echo $s['stepdesc'];?></p>


            <div>

            <?php if($sub){$cc =1;?>
                          <strong>Subs Steps</strong>
            <?php foreach($sub as $subs){?>
            <p>Step No. <?php echo $c;?>.<?php echo $cc;?></p>
            <p>Step Description: </p>

            <?php $cc++;?>
            <?php }?>
            <?php }?>


          </div>
 
            <?php if($sreq){$cc =1;?>
                         
            <ul><strong>Step Requirements</strong>
            <?php foreach($sreq as $ssreq){?>

            <li><?php echo $ssreq['reqname'];?></li>
            <?php }?>
          </ul>
            <?php }?>
            

          <div>

          </div>

            <?php $c++;?>
            <?php }?>
            <?php }else{?>
            <h3>No Step</h3>
            <?php }?>
            </div>

          </div>
        <div>
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