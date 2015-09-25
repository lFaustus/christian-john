<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=user($id);
$sid=$_GET['id'];
$pid=$_GET['pid'];
$substep=listsubsteps($sid);
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

    <title>List Substeps - ENDINMIND</title>

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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List Substeps</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">



 <!-- Navigation Buttons -->

 
 &nbsp; <a href="liststeps.php?id=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>

 <button class="btn btn-info btn-fab btn-raised mdi-content-add" data-toggle="modal" data-target="#simple-dialog"></button>
<br><br>


  

<a href="addsubsteps.php?id=<?php echo $sid; ?>&pid=<?php echo $pid; ?>">ADD</a>
<?php if($substep){?>
<table border="1"; cellspacing="1px"; cellpadding="5px";>
<thead>
<th>&nbsp;</th>
<th>Steps</th>
<th>createdon</th>
</thead>
<?php foreach($substep as $s){?>
<tr>
<td><a href="deletesubsteps.php?i=<?php echo $s['stepid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>">DELETE</a>
<a href="updatesubstep.php?i=<?php echo $s['stepid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>">UPDATE</a>
</td>
<td><?php echo $s['stepdesc'];?></td>
<td><?php echo $s['createon'];?></td>
</tr>
<?php }?>
</table>
<?php }
else
{
	echo "<div><center><h3>No Data</div>";
}?>
  

  </div>
</div>
</div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<div id="simple-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
       <center>
        <h3>Add Requirements </h3>
        <form method="POST">
  <br>

  <a href="steprequirements.php?id=<?php echo $sid; ?>&pid=<?php echo $pid; ?>">ADD</a>
<?php echo $sid; ?>&pid=<?php echo $pid; ?>
    &nbsp;
  <button class="btn btn-info btn-fab btn-raised mdi-action-done" type="submit" name="add"> </button>
  
  </table>
  </form>

      </div>
    </div>
  </div>
</div>

<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>


<script src="../js/jquery.min.js"></script> 
<script type="text/javascript">


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"> </script>

</body>
</html>