<?php
require 'function.php';
$error = '';
if(isset($_SESSION['islogin']))
{
	header('location:logoutagency.php');
	exit();
}
	//check if user has clicked login button

	if(isset($_POST['login']))
	{

		$user = loginagency($_POST);

		
		if($user)
		//if($user=='admin' AND $pass = 'pas123')
		{
			//put some data to session so that
			//we can check that user has login already
			if($user['status'] == 'Pending')
			{
				$error="PLEASE CONTACT THE ADMINISTRATOR";
			}
			else if($user['status'] == 'Deactive')
			{
				$error="YOURE ACCOUNT HAS BEEN DEACTIVATED PLEASE CONTACT THE ADMINISTRATOR!";
			}
			else if($user['status'] == 'NPaid')
			{
				$i = $user['agencyid'];
			header("location: subscription.php?id=$i");
			exit;
			}
			else
			{
				$i = $user['agencyid'];
				$date1=date('Y-m-d');
				$c = findsubs($i);
				if(strtotime($date1) >= strtotime($c['enddate']))
				{
					$i = $user['agencyid'];
					header("location:renewsubscription.php?id=$i");
					exit;
				}
				else
				{
			session_regenerate_id();
			$_SESSION['islogin'] = true;
			$_SESSION['id'] = $user['agencyid'];
			header('location: agencypage.php');
			exit;

					
				}
			}
		}
		else
		{
			$error = 'ERROR!';
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

    <title>Agency Login - ENDINMIND</title>

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
	


   


	<div class="sample shadow-z-2" style="background-color:white;padding:50px;margin-left:400px; margin-right:400px; margin-top:40px;">
<form method="POST">

<center>
 <i class="mdi-action-account-circle mdi-5x"> </i>
</center>
		<center> <h2> Agency Login </h3></center>
 <div class="form-group">
   <!--  <label class="control-label" for="inputLarge"><h4>Username</h4></label> -->
   <!-- <input type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" placeholder="username"  required/> -->

   <i> <input placeholder="Username" class="form-control input-lg" type="text" id="inputLarge"  pattern=".{8,15}" required title="8 to 15 characters" name="user" autocomplete="off"/>
</div></i>

 <div class="form-group">
<!--     <label for="password" class="control-label" for="inputLarge" autocomplete="off"><h4>Password</h4></label> -->
   <i> <input  placeholder="Password" class="form-control input-lg" type="password" id="inputLarge" pattern=".{6,13}" required title="6 to 13 characters" name="pass" />
</div></i>

<div style="color: red; "><center><h4><?php echo $error; ?></h4></center></div>


<div style="padding: auto; padding-top: 30px; padding-bottom: 30px;">
 <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">SIGN IN</button>


    <a href="addagency.php" class="btn btn-default btn-raised btn-lg btn-block" value="Reset">Register</a>

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

    
<!-- Omit this part : Just a footer -->
<div style="position:fixed;bottom:10px;left:10px;background:#4679BC;padding:4px;border-radius:2px;border:1px solid #4679AA"><a href="" title="more ..." style="padding:6px;text-decoration:none;font-size:12px;color:#fff;letter-spacing: 1.5px;">&copy ENDINMIND</a></div>



