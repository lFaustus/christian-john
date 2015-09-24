<?php
require 'function.php';
$message="";
if(!isset($_SESSION['islogin']))
{
	header('location:../intro.php');
	exit;
}

$id=$_SESSION['id'];
$info=user($id);

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

  

</head>


<body>

    

          <div id="wrapper">

       
       <?php include ('nav.php'); ?>
              
   <?php include ('menu.php'); ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                  <!--   <div id="profilebox">
 -->
      



        
        <div style="width:auto; text-align:center; ;" class="panel panel-info">

                 
    <div class="panel-heading"> 

         <img  id="blah" class="img-circle" width="200" height="200" src="files/<?php echo $info['image'];?>" />
     <h3> <?php echo htmlentities($info['firstname']);?> <?php echo htmlentities($info['mi']);?>  <?php echo htmlentities($info['lastname']); ?></h3></div>
    <div class="panel-body">
    

       <div style="color: grey; padding-bottom: 20px;">
       <h4>Birthdate</h4>
       <?php echo htmlentities($info['bdate']); ?>

     
       <h4>Address</h4>
       <?php echo htmlentities($info['address']);?> 
     
     
        <h4>Contact No. </h4>
       <?php echo htmlentities($info['contactno']);?> 
     
     
        <h4>Email Address </h4>
       <?php echo htmlentities($info['email']); ?> 
   </div>
    </div>
    
    <a onclick="return confirm('Are you sure you want to deactivate?')" class="btn btn-danger btn-raised" href="deleteprofile.php?id=<?php echo $info['euid']?>">Deactivate Account</a> 

</div>



   
 
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

  

</body>

</html>