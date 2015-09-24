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

    if(isset($_POST['add']))
  {
    if(trim($_POST['steps'])==false)
    {
      $message="Enter a Step";
    }
    else
    {
      addstep($_POST);
      echo "<script type='text/javascript'>alert('Step HAS BEEN Added');</script>";
      header("location:rspage.php?id=$pid");
      exit();
      
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

 <button class="btn btn-info btn-fab btn-raised mdi-content-add" data-toggle="modal" data-target="#add"></button>

 
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
<a class="mdi-content-create" href="updatestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?>"></a>&nbsp; &nbsp;
<a class="mdi-action-delete" href="deletestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Confirm to delete?')"></a>
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






<!-- MODAL -->
<div id="addprocess" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div style="padding: 30px;"  class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Add Process</h3>
      </div>
     


        <form method="POST">
        <div class="col-xs-13">
            <center>
           <!--  <div style="background-color: #fff; color:red; padding: 50px; text-align:center; font-size:100%;"> <?php echo $message; ?></div> -->
              <label for="desc"><h4> Process Name</h4></label>
           
      <input class="form-control" type="text" name="processname" id="processname" value="<?php if(isset($_POST['processname'])){ echo htmlentities($_POST['processname']);}?>" required/></td>
      


<label><h4>Recurrence</h4></label>
<div class="sample">
<select id="fnivel"  name="recurrence" class="form-control">
<option value="Null">Null</option>
<option value="Monthly">Monthly</option>
<option value="Yearly">Yearly</option>
</select>

<div id="fnivel2" hidden="hidden" pk="1">
<label for="numrecurrence"><h4>Number of Recurrence</h4></label>
<input class="form-control" type="number" name="numrecurrence" id="numrecurrence" value="<?php if(isset($_POST['numrecurrence'])){ echo htmlentities($_POST['numrecurrence']);}?>" min="1" max="10" />
</div>

<label for="agency"><h4>Agency</h4></label></td>
<td><input class="form-control" type="text"  name="agency" id="agency" value="<?php if(isset($_POST['agency'])){ echo htmlentities($_POST['agency']);}?>"/></td>





       
        <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;
  &nbsp;
  
            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
          </div>
        </center>
        
        </div>



</form>



      <div class="modal-footer">
      <!--   <button class="btn btn-danger" data-dismiss="modal">Dismiss</button> -->
      </div>
    </div>
  </div>
</div>
