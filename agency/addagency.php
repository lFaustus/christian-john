<?php
require 'function.php';
$pass1="";
$pass2="";
$message="";
if(isset($_POST['register']))
{
	$ss=findagency($_POST);
	if(trim($_POST['agencyname']) == false)
	{
		$message="ENTER A FIRST NAME";
	}
	else if(trim($_POST['address']) == false)
	{
		$message="ENTER A ADDRESS";
	}
	else if(trim($_POST['officeno']) == false)
	{
		$message="ENTER A CONTACT NUMBER";
	}
	else if(trim($_POST['contactperson']) == false)
	{
		$message="ENTER A FIRST NAME";
	}
	else if(trim($_POST['contactpersonno']) == false)
	{
		$message="ENTER A FIRST NAME";
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
		
		addagency($_POST);
		echo var_dump($_POST);
		header('location:loginagency.php');
		exit();

		
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

    <title>Agency Registration - ENDINMIND</title>

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
		<center> <h2> Agency Registration </h3></center><br>
 <div class="form-group">
   <!--  <label class="control-label" for="inputLarge"><h4>Username</h4></label> -->
   <!-- <input type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" placeholder="username"  required/> -->
   <center>

   
<input style="text-align:center;" class="form-control" type="text" name="agencyname" id="agencyname" value="<?php if(isset($_POST['agencyname'])){ echo htmlentities($_POST['agencyname']);}?>" required />
<label for="agencyname"><h4> Agency Name   </h4></label>


	
 <input style="text-align:center;" class="form-control" type="text" name="branch" id="branch" value="<?php if(isset($_POST['branch'])){ echo htmlentities($_POST['branch']);}?>" required /> 
  <label for="branch"><h4> Branch  </h4></label> 


   
 <input style="text-align:center;" class="form-control" type="text" name="address" id="address" value="<?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}?>" required/> 
 <label for="address"><h4> Address  </h4></label> 


 
 <input style="text-align:center;" class="form-control" type="text" name="officeno" id="officeno" value="<?php if(isset($_POST['officeno'])){ echo htmlentities($_POST['officeno']);}?>" required /> 
<label for="officeno" ><h4> Office No  </h4></label> 



 <input style="text-align:center;" class="form-control" type="text" name="contactperson" id="contactperson" value="<?php if(isset($_POST['contactperson'])){ echo htmlentities($_POST['contactperson']);}?>" required /> 
  <label for="contactperson"><h4> Contact Person  <h4></label> 



  
 <input style="text-align:center;" class="form-control" type="text" name="contactpersonno" id="contactpersonno" value="<?php if(isset($_POST['contactpersonno'])){ echo htmlentities($_POST['contactpersonno']);}?>" required /> 
 <label for="contactpersonno" ><h4> Contact Person No.  </h4></label>




<input style="text-align:center;" class="form-control" type="email" name="emailadd" id="emailadd" value="<?php if(isset($_POST['emailadd'])){ echo htmlentities($_POST['emailadd']);}?>" required />
<label for="emailadd"><h4> Contact Email Address  </h4></label></td>


 
<input style="text-align:center;" class="form-control" type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" id="user" value="<?php if(isset($_POST['user'])){ echo htmlentities($_POST['user']);}?>" required />
<label for="user"><h4> UserName  </h4></label>
 


<input style="text-align:center;" class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass1" id="pass1" value="<?php if(isset($_POST['pass1'])){ echo htmlentities($_POST['pass1']);}?>" required />
<label for="pass1"><h4> Password  </h4></label>




<input style="text-align:center;" class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass2" id="pass2" value="<?php if(isset($_POST['pass2'])){ echo htmlentities($_POST['pass2']);}?>" required />
<label for="pass2"><h4> Retype Password  </h4></label>


<input class="btn btn-primary btn-lg btn-block" type="submit" name="register" value="REGISTER">

</form>

<a href="loginagency.php" class="btn btn-default btn-fab btn-raised mdi-hardware-keyboard-backspace"></a>
 <div class="form-group">
<!--     <label for="password" class="control-label" for="inputLarge" autocomplete="off"><h4>Password</h4></label> -->
  <!--  <i> <input  placeholder="Password" class="form-control input-lg" type="password" id="inputLarge" pattern=".{6,13}" required title="6 to 13 characters" name="pass" />
</div></i> -->

<div style="color: red; "><center><h4><?php echo $message; ?></h4></center></div>

<!-- 

<div style="padding-left:30px; padding-right: 30px; padding-top: 10px; padding-bottom: 30px;">
 <button type="submit" class="btn btn-primary btn-lg btn-block" name="login">SIGN IN</button>


    <a href="adduser.php" class="btn btn-default btn-raised btn-lg btn-block" >Register</a>

</div>

<div style="text-align: center;">
<a href="../index.php" class="btn btn-default btn-fab btn-raised mdi-action-home"></a>
</div>
 -->


</div>




</div>
</div>
</div>




</body>
</html>

    
<!-- Omit this part : Just a footer -->
<div style="position:fixed;bottom:10px;left:10px;background:#4679BC;padding:4px;border-radius:2px;border:1px solid #4679AA"><a href="" title="more ..." style="padding:6px;text-decoration:none;font-size:12px;color:#fff;letter-spacing: 1.5px;">&copy ENDINMIND</a></div>





