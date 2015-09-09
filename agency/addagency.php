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
<td><label for="agencyname">Agency Name <span>*</span></label></td>
<td><input type="text" name="agencyname" id="agencyname" value="<?php if(isset($_POST['agencyname'])){ echo htmlentities($_POST['agencyname']);}?>" required /></td>
</tr>
<tr>
<td><label for="branch">BRANCH <span>*</span></label></td>
<td><input type="text" name="branch" id="branch" value="<?php if(isset($_POST['branch'])){ echo htmlentities($_POST['branch']);}?>" required /></td>
</tr>
<tr>
<tr>
<td><label for="address">Address <span>*</span></label></td>
<td><input type="text" name="address" id="address" value="<?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}?>" required/></td>
</tr>
<tr>
<td><label for="officeno" >Office No <span>*</span></label></td>
<td><input type="text" name="officeno" id="officeno" value="<?php if(isset($_POST['officeno'])){ echo htmlentities($_POST['officeno']);}?>" required /></td>
</tr>
<tr>
<td><label for="contactperson">Contact Person <span>*</span></label></td>
<td><input type="text" name="contactperson" id="contactperson" value="<?php if(isset($_POST['contactperson'])){ echo htmlentities($_POST['contactperson']);}?>" required /></td>
</tr>
<tr>
<td><label for="contactpersonno" >Contact Person No <span>*</span></label></td>
<td><input type="text" name="contactpersonno" id="contactpersonno" value="<?php if(isset($_POST['contactpersonno'])){ echo htmlentities($_POST['contactpersonno']);}?>" required /></td>
</tr>
<tr>
<td><label for="emailadd">Contact Email Address <span>*</span></label></td>
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