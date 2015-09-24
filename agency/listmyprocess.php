<?php
require 'function.php';
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=agency($id);
$message="";
$process=listprocess($id);

if(isset($_POST['add']))
{   
    if(trim($_POST['processname'])== false)
    {
        $message="Enter a Process Name";
    }
    else
    {
    $_POST['id']=$id;
    addprocess($_POST);
    header('location:listprocess.php');
    exit();
    }
}
if(isset($_POST['search']))
{   
    if(trim($_POST['val']) == false)
    {
        $message="Enter a Value For Search";
    }
    else
    {
        $_POST['id']=$id;
        $process=searchprocess($_POST);
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

    <title>Agency - ENDINMIND</title>

    <!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Process List</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

      
			<button class="btn btn-info" data-toggle="modal" data-target="#complete-dialog"> Add Process</button>
      


<?php if($process){?>
 <div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="process" class="display">
       
     
            <thead>  
          <tr>  
            <th><center>Action</center></th>
            <th>Process Name</th>  
        
          </tr>  
        </thead>  
 
        <tfoot>
              <tr>  
            <th><center>Action</center></th>
            <th>Process Name</th>  
            
        </tfoot>
 

        

        <tbody>
<?php foreach($process as $p){?>
             <tr>  
           
                <td>
                <a href="preview.php?pid=<?php echo $p['aprocessid']?>">preview</a>

                </td>


            <td>
            <a style="color: #FF69B4" href="rspage.php?id=<?php echo $p['aprocessid'];?>"><?php echo htmlentities($p['processname']);?></a>
             </td>
            
          </tr>  
          <?php }?>
        </tbody>
    </table>

    <?php }
else {
$message = "No Data";
}?>


 
 <div style="background-color: #fff;  color:black; padding: 20px; text-align:center; font-size:200%; margin-top: 20px; color: #555;"><h3> 
<?php echo $message; ?></h3></div>  

<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>             

<script type="text/javascript">
$(document).ready( function () {
    $('#process').DataTable();
} );
</script>



<!-- MODAL CREATE PROCESS -->


<div id="complete-dialog" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title">Create Process</h4>
      </div>
      <div class="modal-body">
        

        <form method="POST">
        <div class="col-xs-13">
            <center>
           <!--  <div style="background-color: #fff; color:red; padding: 50px; text-align:center; font-size:100%;"> <?php echo $message; ?></div> -->
              <label for="desc"><h4> Process Name</h4></label>
           
        <input class="form-control" type="text" name="processname" id="processname" value="<?php if(isset($_POST['processname'])){ echo htmlentities($_POST['processname']);}?>" required/>
             
             <label for="recurrence"><h4>Recurrence </h4></label>
            <div class="sample">
                 <select name="recurrence" class="form-control">
            <option value="Null">None</option>
            <option value="Monthly">Monthly</option>
            <option value="Yearly">Yearly</option>
            </select>
         
            <label for="rate"><h4>Number of Recurrence</h4></label>
        <input class="form-control" type="number" name="numrecurrence" id="numrecurrence" value="<?php if(isset($_POST['numrecurrence'])){ echo htmlentities($_POST['numrecurrence']);}?>" min="1" max="10" />



       
        <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;
  &nbsp;
  
            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
          </div>
        </center>
        
        </div>



</form>


      </div>
      <div class="modal-footer">




</body>

</html>
