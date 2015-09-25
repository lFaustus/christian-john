<?php
require 'function.php';
$pass1="";
$pass2="";
$message="";
$pass="";
$login=$_SESSION['islogin'];
if($login)
{
	$id=$_SESSION['id'];
	$info=user($id);
	if(isset($_POST['update']))
	{
	if(trim($_POST['pass']) == false)
	{
		$message="ENTER A Old Password";
	}
	else if(trim($_POST['pass1']) == false)
	{
		$message="ENTER A PASSWORD";
	}
	else if(trim($_POST['pass2']) == false)
	{
		$message="ENTER A RETYPE PASSWORD";
	}
	else if($_POST['pass'] != $info['password'])
	{
		$message="Old PASSWORD DID NOT MATCH";
	}
	else if(trim($_POST['pass1']) != trim($_POST['pass2']) )
	{
		$message="PASSWORD NOT MATCH";
	}
	else
	{
		$_POST['id'] = $id;
		changepassuser($_POST);
		header('location:enduserprofile.php');
	}
	}
}
else
{
	header('location:intro.php');
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




                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-lock-outline mdi-4x"><h2> Change Password</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">





<center>
<form method="POST">
<table>
 <input class="form-control"  value="<?php echo htmlentities($info['username']);?>" disabled>  </input>
  <label><h4> UserName </h4></label> 

 

 <input class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass" id="pass" value="<?php if(isset($_POST['pass'])){ echo htmlentities($_POST['pass']);}?>" required /> 
  <label for="pass1"><h4> Old Password </h4></label> 
 

 <input class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass1" id="pass1" value="<?php if(isset($_POST['pass1'])){ echo htmlentities($_POST['pass1']);}?>" required /> 
  <label for="pass1"><h4> Password </h4></label> 
 

 <input class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass2" id="pass2" value="<?php if(isset($_POST['pass2'])){ echo htmlentities($_POST['pass2']);}?>" required /> 
  <label for="pass2"><h4> Retype Password </h4></label> 
     
       &nbsp; <br> <br>
       <input class="btn btn-info btn-raised" type="submit" name="update" value="UPDATE"> 
     
</table>
</form>
<div><?php echo $message; ?></div>
</body>
</html>