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
$pid=$_GET['id'];

$step=liststep($pid);
$requirement=listrequirement($pid);

    if(isset($_POST['add']))
    {
        if(trim($_POST['steps'])==false)
        {
            $message="Enter a Step";
        }
        else
        {
          $_POST['pid'] = $pid;
            addstep($_POST);
      echo "<script type='text/javascript'>
      alert('The Step Has Been Added!');
      window.location='rspage.php?id=".$pid."';
      </script>";
            
            
            
        }
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List Steps</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">





 <div class = "table-responsive">
 &nbsp; <a href="listprocess.php" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>
 <button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#modal"></button>
 
     <?php if($step){$ctr=1;?>
	<table id="myTable" class = "table table-striped table-hover">  
			<thead>  
          <tr>  
<th>&nbsp;</th>
<th>Step No</th>
<th>Step Description</th>
<th>Created On</th>
<th>Manage</th>
		  </tr>  
        </thead>  
        <tbody>  
        <?php foreach($step as $s){?>
<tr>
<td>
<a href="updatestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?>">UPDATE</a>
<a href="deletestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Are You Sure!')">DELETE</a>
</td>
<td><?php echo $ctr;?></td>
<td><?php echo htmlentities($s['stepdesc']);?></td>
<td><?php echo htmlentities($s['createon']);?></td>
<td><a href="liststeprequired.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Requirement</a>&nbsp;&nbsp;<a href="listrequisite.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Pre-requisite</a>&nbsp;&nbsp;<a href="listsubsteps.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Substeps</a></td>
</tr><?php $ctr++;}?>  
        </tbody>  
      </table>  
     <?php }
else {
$message="No STEPS";
}?> 

<div> <?php echo $message;?> </div>
 </div>
<script>
$(document).ready(function(){
    $('#myTable').dataTable();
});
</script>