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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form method="POST">
<table>
<tr>
<td><label for="firstname">First Name <span>*</span></label></td>
<td><input type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}?>" required /></td>
</tr>
<tr>
<td><label for="lastname">Last Name <span>*</span></label></td>
<td><input type="text" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}?>" required /></td>
</tr>
<tr>
<td><label for="miname">Middle Initial <span>*</span></label></td>
<td><input type="text" name="miname" id="miname"  maxlength="1" value="<?php if(isset($_POST['miname'])){ echo htmlentities($_POST['miname']);}?>" /></td>
</tr>
<tr>
<td><label for="bdate">Birthdate <span>*</span></label></td>
<td><input type="date" name="bdate" id="bdate"   value="<?php if(isset($_POST['bdate'])){ echo htmlentities($_POST['bdate']);}?>"  required /></td>
</tr>
<tr>
<td><label for="address">Address <span>*</span></label></td>
<td><input type="text" name="address" id="address" value="<?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}?>" required/></td>
</tr>
<tr>
<td><label for="contactno" >Contact No <span>*</span></label></td>
<td><input type="text" name="contactno" id="contactno" value="<?php if(isset($_POST['contactno'])){ echo htmlentities($_POST['contactno']);}?>" required /></td>
</tr>
<tr>
<td><label for="emailadd">Email Address <span>*</span></label></td>
<td><input type="email" name="emailadd" id="emailadd" value="<?php if(isset($_POST['emailadd'])){ echo htmlentities($_POST['emailadd']);}?>" required /></td>
</tr>
<tr>
<td><label for="user">UserName <span>*</span></label></td>
<td><input type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" id="user" value="<?php if(isset($_POST['user'])){ echo htmlentities($_POST['user']);}?>" required /></td>
</tr>
<tr>
<td><label for="pass1">Password <span>*</span></label></td>
<td><input type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass1" id="pass1" value="<?php if(isset($_POST['pass1'])){ echo htmlentities($_POST['pass1']);}?>" required /></td>
</tr>
<tr>
<td><label for="pass2">Retype Password <span>*</span></label></td>
<td><input type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass2" id="pass2" value="<?php if(isset($_POST['pass2'])){ echo htmlentities($_POST['pass2']);}?>" required /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="register" value="REGISTER"></td>
</tr>
</table>
</form>
<div>
<?php echo $message;?>
</div>
</body>
</html>