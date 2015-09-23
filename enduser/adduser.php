<?php
require 'function.php';
$pass1="";
$pass2="";
$message="";
if(isset($_POST['register']))
{
	$ss=finduser($_POST);
	if(trim($_POST['firstname']) == false)
	{
		$message="ENTER A FIRST NAME";
	}
	else if(trim($_POST['lastname']) == false)
	{
		$message="ENTER A LAST NAME";
	}
		else if(trim($_POST['bdate']) == false)
	{
		$message="ENTER A Birthdate";
	}
	else if(trim($_POST['address']) == false)
	{
		$message="ENTER A ADDRESS";
	}
	else if(trim($_POST['contactno']) == false)
	{
		$message="ENTER A CONTACT NUMBER";
	}
	else if(trim($_POST['emailadd']) == false)
	{
		$message="ENTER A EMAIL ADDRESS";
	}
	else if(!filter_var(trim($_POST['emailadd']), FILTER_VALIDATE_EMAIL))
	{
		$message="INVALID FORMAT OF EMAIL ADDRESS EXAMPLE: example@yahoo.com";
	}
	else if(trim($_POST['user']) == false)
	{
		$message="ENTER A USERNAME";
	}
	else if($ss)
	{
		$message="User already Exist";
	}
	else if(trim($_POST['pass1']) == false)
	{
		$message="ENTER A PASSWORD";
	}
	else if(trim($_POST['pass2']) == false)
	{
		$message="ENTER A RETYPE PASSWORD";
	}
	else if(trim($_POST['pass1']) != trim($_POST['pass2']) )
	{
		$message="PASSWORD NOT MATCH";
	}
	else
	{
		
		adduser($_POST);
		header('location:loginuser.php');

		
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

    <title>User Registration - ENDINMIND</title>

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
		<center> <h2> User Registration </h3></center><br>
 <div class="form-group">
   <!--  <label class="control-label" for="input class="form-control"Large"><h4>Username</h4></label> -->
   <!-- <input style="text-align:center;" class="form-control" type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" placeholder="username"  required/> -->
   <center>


<form method="POST">
 
 
 
 <input style="text-align:center;" class="form-control" type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}?>" required /> 
 <label for="firstname"><h4>First Name  </h4></label> 
 
 
 <input style="text-align:center;" class="form-control" type="text" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}?>" required /> 
 <label for="lastname"><h4>Last Name  </h4></label> 
 

 <input style="text-align:center;" class="form-control" type="text" name="miname" id="miname"  maxlength="1" value="<?php if(isset($_POST['miname'])){ echo htmlentities($_POST['miname']);}?>" /> 
  <label for="miname"><h4>Middle Initial  </h4></label> 
 
 
 <input style="text-align:center;" class="form-control" type="date" name="bdate" id="bdate"   value="<?php if(isset($_POST['bdate'])){ echo htmlentities($_POST['bdate']);}?>"  required /> 
 <label for="bdate"><h4>Birthdate  </h4></label> 
 

 <input style="text-align:center;" class="form-control" type="text" name="address" id="address" value="<?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}?>" required/> 
  <label for="address"><h4>Address  </h4></label> 
 

 <input style="text-align:center;" class="form-control" type="text" name="contactno" id="contactno" value="<?php if(isset($_POST['contactno'])){ echo htmlentities($_POST['contactno']);}?>" required /> 
  <label for="contactno" ><h4>Contact No  </h4></label> 
 
 
 <input style="text-align:center;" class="form-control" type="email" name="emailadd" id="emailadd" value="<?php if(isset($_POST['emailadd'])){ echo htmlentities($_POST['emailadd']);}?>" required /> 
 <label for="emailadd"><h4>Email Address  </h4></label> 
 
 
 <input style="text-align:center;" class="form-control" type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" id="user" value="<?php if(isset($_POST['user'])){ echo htmlentities($_POST['user']);}?>" required /> 
  <label for="user"><h4>UserName  </h4></label>
 
 
 <input style="text-align:center;" class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass1" id="pass1" value="<?php if(isset($_POST['pass1'])){ echo htmlentities($_POST['pass1']);}?>" required /> 
  <label for="pass1"><h4>Password  </h4></label>
 

 <input class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass2" id="pass2" value="<?php if(isset($_POST['pass2'])){ echo htmlentities($_POST['pass2']);}?>" required /> 
  <label for="pass2"><h4>Retype Password  </h4></label> 
 
 &nbsp; <br><br>
 <input style="text-align:center;" type="submit" class="btn btn-primary" name="register" value="REGISTER"> <br><br>
<a href="loginuser.php" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>	
 
</table>
</form>
<div>
<?php echo $message;?>
</div>
</body>
</html>