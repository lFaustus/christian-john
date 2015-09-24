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
$requirement=listrequirement($pid);
if(isset($_POST['search']))
{	
	if(trim($_POST['val']) == false)
	{
		$message="Enter a Value For Search";
	}
	else
	{

		$_POST['pid']=$pid;
		$requirement=searchrequirement($_POST);
	}
}
if(isset($_POST['add']))
    {
        $req=trim($_POST['requirement']);
        $trap=reqname($pid,$req);
        if(trim($_POST['requirement'])==false)
        {
            $message="Enter a Requirement";
        }
        else if($trap)
        {
            $message="The Requirement is already in Added";
        }
        else if(trim($_POST['copy'])==false)
        {
            $message="Enter a Copy";
        }
        else
        {
            $_POST['pid'] = $pid;
            addrequirements($_POST);
            echo "<script type='text/javascript'>alert('Requirements Added');</script>";
            header("location:listrequirement.php?id=$pid");
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
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

</head>
<body>

    <div id="wrapper">

        <?php include ('nav.php'); ?>
        <?php include ('sidebar-agency.php'); ?>

       
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> List of Requirements</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">



<a href="agencypage.php?id=<?php echo $pid;?>" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>
 <button class="btn btn-fab btn-info mdi-content-add" data-toggle="modal" data-target="#add"></button>


<?php if($requirement){?>
 <div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="list" class="display">
       
     
           <thead>
<th>&nbsp;</th>
<th>Requirement Name</th>
<th>Copy No.</th>
<th>Created On</th>
</thead>
 
        <tfoot>
          
<th>&nbsp;</th>
<th>Requirement Name</th>
<th>Copy No.</th>
<th>Created On</th>

        </tfoot>
 

        

        <tbody>
<?php foreach($requirement as $r){?>
             <tr>  
           
          

                <td>
           <a type="button" href="updaterequirement.php?id=<?php echo $r['reqid']; ?>&pid=<?php echo $pid; ?>" style="color: skyblue;" class="mdi-content-create" style="background-color:white;"></a>

           <a href="deleterequirement.php?id=<?php echo $r['reqid']; ?>&pid=<?php echo $pid; ?> " onclick = "return confirm('Delete?')" style="color: red;" class="mdi-content-clear" ></a>

                </td>


            <td>
            <?php echo htmlentities($r['reqname']);?>
             </td>

             <td><?php echo htmlentities($r['copyno']);?></td>
            <td><?php echo htmlentities($r['createdon']);?></td>

            
          </tr>  
          <?php }?>
        </tbody>
    </table>

    <?php }
else {
$message = "No Requirement";
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
    $('#list').DataTable();
} );
</script>




<div> <?php echo $message;?> </div>
  </div>
</div>
</div>
	





    <!-- MODAL CREATE PROCESS -->


<div id="add" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title">Add Requirement</h4>
      </div>
      <div class="modal-body">
        
 <div class = "col-lg-12">
<form method="POST">


<label for="requirement"><h4>Requirement</h4></label>
<input class="form-control" type="text" name="requirement" id="requirement" value="<?php if(isset($_POST['requirement'])){ echo htmlentities($_POST['requirement']);}?>" required />



<label for="copy"><h4>Number of Copy</h4></label>
<td><input class="form-control" type="number" name="copy" id="copy" value="<?php if(isset($_POST['copy'])){ echo htmlentities($_POST['copy']);}?>" min="1" required /></td>





       
        <div style="text-align: center; padding-top: 30px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;
  &nbsp;
  
            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
          </div>
        </center>
        
        </div>



</form>
<div> <?php echo $message;?> </div>

      </div>
      <div class="modal-footer">





</body>

</html>