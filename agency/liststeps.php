<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=agency($id);
$pid=$_GET['id'];
$step=liststep($pid);
$ctr =1;
if(isset($_POST['search']))
{	
	if(trim($_POST['val']) == false)
	{
		$message="Enter a Value For Search";
	}
	else
	{

		$_POST['pid']=$pid;
		$step=searchstep($_POST);
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
            $_POST['pid']=$pid;
            addstep($_POST);

            echo "<script type='text/javascript'>alert('Step Added Added');
            window.location='liststeps.php?id=".$pid."';
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

    <title>Admin Profile</title>

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Data Tables -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    

</head>

<body>

    <div id="wrapper">

        <?php include ('nav.php'); ?>
        <?php include ('sidebar-agency.php'); ?>

       
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> List of Steps</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

   

<a href="agencypage.php?id=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>


	<button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#add"></button>


<br/>
<!-------->
<div class = "row">
  <div class = "col-lg-12">
  



 

<?php if($step){?>
<div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="list" class="display">


<thead>
<th>Actions</th>
<th>Step No</th>
<th>Step Description</th>
<th>Created On</th>
<th>More</th>

</thead>



</tfoot>

<?php foreach($step as $s){?>
<tr>
<td>
<a class="mdi-content-create" href="updatestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?>"></a>&nbsp; &nbsp;
<a class="mdi-action-delete" href="deletestep.php?id=<?php echo $s['stepid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Confirm to delete')"></a>
</td>
<td><?php echo $ctr;?></td>
<td><?php echo htmlentities($s['stepdesc']);?></td>
<td><?php echo htmlentities($s['createon']);?></td>
<td><a href="liststeprequired.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Requirement</a><br/><?php if($ctr > 1){?><a href="listrequisite.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Pre-requisite</a><br/><?php }?><a href="listsubsteps.php?id=<?php echo $s['stepid'];?>&pid=<?php echo $pid;?>">Substeps</a></td>
</tr
><?php $ctr++;}?>
</table>
<?php }
else {
$message="No Process";
}?>
<a href="rspage.php?id=<?php echo $pid;?>">Back</a>
<div> <?php echo $message;?> </div>
  </div>
</div>
</div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

<div id="add" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title">Add Step</h4>
      </div>
      <div style="text-align: center;" class="modal-body">
      
        <div class = "row">
 
  <form method="POST">

  
  <label><h4>Steps:</h4></label>
  <textarea class="form-control" name="steps" value="<?php if(isset($_POST['steps'])){ echo htmlentities($_POST['steps']);}?>" required></textarea>

  &nbsp;

  <td><button class="btn btn-info btn-fab btn-raised mdi-action-done" type="submit" name="add"></td>
  </tr>

  </form>
 <!--  <a href="liststeps.php?id=<?php echo $pid;?>">Return to the List of Steps</a> -->
  </div>
</div>


</div>


      </div>
    
      </div>

    </div>

  </div>

</div>
<div> <?php echo $message;?> </div>


    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
<script src="../js/jquery.min.js"></script> 
 

    <!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>             

<script type="text/javascript">
$(document).ready( function () {
    $('#list').DataTable();
} );
</script>




<script>
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

</body>

</html>