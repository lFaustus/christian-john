<?php
require 'function.php';
$message="";
$flag=0;
if(!isset($_SESSION['islogin']))
{
		header('location:logoutuser.php');
	exit;
}
{
$id=$_SESSION['id'];
$info=user($id);
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
}
$id=$_SESSION['id'];
$info=user($id);
$process=listprocess($id);
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



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>User Login - ENDINMIND</title>

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
             <?php include ('nav.php'); ?>

             <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
             <?php include ('menu.php'); ?>
		   
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List of Process</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

<button class="btn btn-info btn-fab btn-raised mdi-content-add" data-toggle="modal" data-target="#addprocess"></button>


<?php if($process){?>
  
 <div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="listprocess" class="display">




    



       
     
            <thead>  
          <tr>  
            <th><center>Actions</center></th>
            <th>Process Name</th>  
            <th>Schedule Type</th>  
            <th>Recurrence</th>  
            <th>No. of Recurrence</th>  
           <th>Created On</th>
           <th>Downloaded From</th>
           <th>Date Modified</th>
         
          </tr>  
        </thead>  
 
        <tfoot>
        <tr>  
            <th><center>Actions</center></th>
            <th>Process Name</th>  
            <th>Schedule Type</th>  
            <th>Recurrence</th>  
            <th>No. of Recurrence</th>  
           <th>Created On</th>
           <th>Downloaded From</th>
           <th>Date Modified</th>
         
          </tr>  
        </tfoot>
 

        

        <tbody>
<?php foreach($process as $p){?>
             <tr>  
           



            <td> <a type="button" href="updateprocess.php?id=<?php echo $p['euprocessid']; ?> " style="color: skyblue;" class="mdi-content-create " style="background-color:white;"></a>

           <a type="button" href="deleteprocess.php?id=<?php echo $p['euprocessid']; ?>" onclick = "return confirm('Confirm Deletion')" style="color: pink;" class="mdi-action-delete" style="background-color:white;"></a>
            
            </td>  



</td>
<td><a href="rspage.php?id=<?php echo $p['euprocessid'];?>"><?php echo htmlentities($p['processname']);?></a></td>
<td><?php echo htmlentities($p['schedtype']);?></td>
<td><?php echo htmlentities($p['recurrence']);?></td>
<td><?php echo htmlentities($p['numrec']);?></td>
<td><?php echo htmlentities($p['createdon']);?></td>
<td><?php echo htmlentities($p['agencycopiedfrom']);?></td>
<td><?php echo htmlentities($p['datemodified']);?></td> 
          </tr>  
          <?php }?>
        </tbody>
    </table>

    <?php }
else {
$message = "No Data";
}?>

 <div style="background-color: #fff; color:black; padding: 20px; text-align:center; font-size:200%; margin-top: 20px; color: #555;"><h3> 
<?php echo $message; ?></h3></div>  
        

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


<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>


<script src="../js/jquery.min.js"></script> 
<script type="text/javascript">


$(document).ready(function (){
    $("#fnivel").change(function () {
  var selected_option = $('#fnivel').val();

  if (selected_option != 'Null') {
    $('#fnivel2').attr('pk','1').show();
  }
  if (selected_option == 'Null') {
    $("#fnivel2").removeAttr('pk').hide();
  }
})
  }); 


$(document).ready( function () {
    $('#listprocess').DataTable();
} );
</script>


<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>             

<script type="text/javascript">
$(document).ready( function () {
    $('#nameoftable').DataTable();
} );



</body>

</html>