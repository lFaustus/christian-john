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
$copre=listrequisite($sid);
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
        $message="Pre Steps HAS BEEN ADDED";
        addsteprequisite($_POST);
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("location:listrequisite.php?id=$sid&pid=$pid");
        exit();
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

    <title>Agency Registration - ENDINMIND</title>

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
     <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">

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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List of Requisite</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

         <button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#add"></button>




<?php if($copre){?>
 <div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="nameoftable" class="display">
  
<thead>
<th>&nbsp;</th>
<th>Steps</th>
<th>Type</th>
</thead>


<?php foreach($copre as $cp){?>
<tr>
<td>
<a class="mdi-editor-border-color" href="updaterequisite.php?i=<?php echo $cp['copreid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>"></a>
<a class="mdi-navigation-close" href="deleterequisite.php?i=<?php echo $cp['copreid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>"></a>
</td>
<td><?php echo $cp['stepdesc'];?></td>
<td><?php echo $cp['type'];?></td>
</tr>
<?php }?>
</table>
<?php }
else
{
	echo "<div> <br> No Requirements</div>";
}?>


<div style="text-align: center; padding-bottom: 30px;">
<a href="liststeps.php?id=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>
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


    <!-- MODAL CREATE PROCESS -->

<div id="add" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title">Create Process</h4>
      </div>
      <div class="modal-body">

<h3>ADD Requisite</h3>
<a href="listrequisite.php?id=<?php echo $sid;?>&pid=<?php echo $pid;?>">Back</a>
<?php if($st){?>
<form method="POST">
<select name="requisite">

<option value="Prerequisite">Prerequisite</option>
</select>
<select name="step">

<?php foreach($st as $s){?>
<?php if($s['stepid'] == $sid)
{
}
else if(trapreq($s['stepid']))
{
}
else{?>
<option value="<?php echo $s['stepid'];?>"><?php echo $s['stepdesc'];?></option>
<?php }}?>
</select>
<input type="submit" name="add" value="ADD" />
</form>
<?php }?>
  
            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
          </div>
        </center>
        
        </div>



</form>
<div> <?php echo $message;?> </div>

      </div>
      <div class="modal-footer">




<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="css/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>             

<script type="text/javascript">
$(document).ready( function () {
    $('#nameoftable').DataTable();
} );
</script>


</body>

</html>