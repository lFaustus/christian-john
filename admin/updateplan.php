<?php
require 'function.php';
$login=$_SESSION['islogin'];
$message="";
if($login)
{
	$id=$_SESSION['id'];
	$info=admin($id);
	$idno = trim($_GET['id']);
	$plan = selectplan($idno);


if(isset($_POST['update']))
{
		if(trim($_POST['desc']) == false)
	{
		$message="Input Plan Description";
	}
	else if(trim($_POST['rate']) == false)
	{
		$message="Input Rate";
	}
	else
	{
		$_POST['idno'] = $idno;
	updateplan($_POST);
	header('location:listplan.php');
	exit();
	}
}
}
else
{
	header('location:landing.php');
	exit();
}

   $noti = notify_adminToagency();
    $noti1 = notify_NYS();

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

    <!-- Morris Charts CSS -->
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
  <?php include ('sidebar-admin.php'); ?>

 
<!-- 
        <div id="page-wrapper">
 -->
      <!--       <div class="container-fluid"> -->
    

            <div style="margin-left:30px; margin-right:30px;">




                <div  class="panel panel-info">
    <div style="padding-bottom: 100px; text-align: center;" class="panel-heading">
        <h3 class="panel-title"><h2> <B>Update Plan </b></h2></h3>
    </div>
    <div style="padding:50px; padding-left: 100px; padding-right: 100px; " class="panel-body">
    


        <form method="POST">
        <div class="col-xs-13">
            <center>
           <!--  <div style="background-color: #fff; color:red; padding: 50px; text-align:center; font-size:100%;"> <?php echo $message; ?></div> -->



              <label for="desc"><h4> Plan Description <span>*</span></h4></label>  

            <div class="sample">
            <select name="desc"class="form-control">
            <option value="Monthly " <?php if($plan['plandesc'] == "Monthly"){echo "SELECTED";}?> >Monthly</option>
            <option value="Yearly" <?php if($plan['plandesc'] == "Yearly"){echo "SELECTED";}?> >Yearly</option>
              </select>


              
             
             <label for="rate"><h4>Rate <span>*</span></h4></label>
            <input class="form-control" type="number" name="rate" id="rate" value="<?php if(isset($_POST['rate'])){ echo htmlentities($_POST['rate']);}else {echo htmlentities($plan['rate']);}?>" /></td>
</tr>
           
            <label for=""><h4>User Type <span>*</span></h4></label>
           
         

         <div class="sample">
  <select name="usertype"class="form-control">
<option value="Agency" <?php if($plan['usertype'] == "Agency"){echo "SELECTED";}?> >Agency</option>
<option value="Enduser" <?php if($plan['usertype'] == "Enduser"){echo "SELECTED";}?> >EndUser</option>
  </select>



       
        <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="update"  /> &nbsp;
  &nbsp;
    &nbsp;
  
            <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button>
          </div>
        </center>
        
        </div>



</form>

    </div>
</div>








</body>

</html>