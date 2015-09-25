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
$rec=steprequirement($sid);
$recs=listrequirement($pid);
if(isset($_POST['add']))
{   
    if(empty($_POST['requirement']))
    {       
    $message="SELECT ATLEAST 1 of the requirements";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else
    {
    $message="REQUIREMENTS BEEN ADDED";
    $_POST['sid']=$sid;
        addsteprequirement($_POST);
    echo "<script type='text/javascript'>alert('$message');
     window.location='liststeprequired.php?id=".$sid."&pid=".$pid."';
    </script>";
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
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> List Step Requirement</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">



       
                <!-- /.row -->



    <button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#add"></button>
  






<?php if($recs){?>


 <div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="addRequirement" class="display">
       
     
            <thead>  
          <tr>  
            <th><center>Action</center></th>
            <th>Process Name</th>  
        
          </tr>  
        </thead>  
 
        <tfoot>
              <tr>  
            <th><center>Action</center></th>
            <th>Requirement</th>  
            
        </tfoot>
 

        

        <tbody>
<?php foreach($rec as $r){?>
             <tr>  
           
                <td style="background-color: white;"><!-- 
           <a type="button" href="updateprocess.php?id=<?php echo $p['aprocessid']; ?> " style="color: skyblue;" class="mdi-content-create" style="background-color:white;"></a> -->

          <a class="mdi-action-delete" href="deletesteprequired.php?rid=<?php echo $r['steprequiredid'];?>&id=<?php echo $sid;?>&pid=<?php echo $pid;?>"> </a></td>


              


            <td>
           <?php echo $r['reqname'];?>
             </td>
            
          </tr>  
          <?php }?>
        </tbody>
    </table>

    <?php }
else {
$message = "No Data";
}?>

  
<div style="text-align: center; padding-bottom: 20px;">
<a href="liststeps.php?id=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>  
</div>
  </div>
</div>
</div>
            
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>



<!-- MODAL CREATE PROCESS -->


<div id="add" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title">Step Requirements</h4>
      </div>
      <div class="modal-body">
        
<div style"text-align: center;">
  

<form method="POST">
<?php if($recs){?>
<?php foreach($recs as $r){
    if(reqcompare($r['reqid'],$sid)){}
    else {?>

<input type="checkbox" name="requirement[]" value="<?php echo $r['reqid'];?>" /><?php echo $r['reqname'];?>
<br/>
<?php }}?>


<?php echo "<input type='submit' name='add' value='ADD' />";}else{ echo "No requirements Puted";}?>
</form>


<center>

<a href="liststeprequired.php?id=<?php echo $sid;?>&pid=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>  

  </div>
</div>
</div>

      </div>
      <div class="modal-footer">




<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>             

<script type="text/javascript">
$(document).ready( function () {
    $('#addRequirement').DataTable();
} );
</script>

</body>

</html>