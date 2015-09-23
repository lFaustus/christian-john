<?php
require 'function.php';
$error = '';
if(isset($_POST['login']))
{
	$user = loginadmin($_POST);
	if($user)
	{
	session_regenerate_id();
	$_SESSION['islogin'] = true;
	$_SESSION['id'] = $user['id'];
	header('location:landing.php');
	exit();
	}
	else
	{
		$error="Invalid Username or Password!";
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

    <title>Admin Profile</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="dist/css/material.css">
    <link rel="stylesheet" type="text/css" href="dist/css/material.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ripples.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ripples.css">

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
	


   


	<div class="sample shadow-z-2" style="background-color:white;padding:50px;margin-left:400px; margin-right:400px; margin-top:40px;">
<form method="POST">

<center>
 <i class="mdi-action-account-circle mdi-5x"> </i>
</center>
		<center> <h2> Admin Login </h3></center>
 <div class="form-group">
   <!--  <label class="control-label" for="inputLarge"><h4>Username</h4></label> -->
   <i> <input placeholder="Username" class="form-control input-lg" type="text" id="inputLarge"  pattern=".{8,15}" required title="8 to 15 characters" name="username" id="username" autocomplete="off"/>
</div></i>

 <div class="form-group">
<!--     <label for="password" class="control-label" for="inputLarge" autocomplete="off"><h4>Password</h4></label> -->
   <i> <input  placeholder="Password" class="form-control input-lg" type="password" id="inputLarge" pattern=".{6,13}" required title="6 to 13 characters" name="password" id="password"/>
</div></i>

<div style="color: red; "><center><h4><?php echo $error; ?></h4></center></div>


<div style="padding-left: 350px; padding-top: 10px;">
 <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">SIGN IN</button>


    <button type="reset" class="btn btn-default btn-raised btn-lg btn-block" value="Reset">Reset</button>
</div>

<div style="text-align: center;">
<a href="../index.php" class="btn btn-default btn-fab btn-raised mdi-action-home"></a>
</div>


</div>
</div>
</div>


</form>


</div>
</div>
</div>




</body>
</html>


<link rel="stylesheet" type="javascript" href="dist/js/ripples.js">

<link rel="stylesheet" type="javascript" href="dist/js/ripples.min.js">
    
<!-- Omit this part : Just a footer -->
<div style="position:fixed;bottom:10px;left:10px;background:#4679BC;padding:4px;border-radius:2px;border:1px solid #4679AA"><a href="" title="more ..." style="padding:6px;text-decoration:none;font-size:12px;color:#fff;letter-spacing: 1.5px;">&copy ENDINMIND</a></div>