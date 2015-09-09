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

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="POST">
<table>
<td><label>UserName:</label></td>
<td><?php echo htmlentities($info['username']);?></td>
</tr>
<tr>
<td><label for="pass1">Old Password <span>*</span></label></td>
<td><input type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass" id="pass" value="<?php if(isset($_POST['pass'])){ echo htmlentities($_POST['pass']);}?>" required /></td>
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
      <td><input type="submit" name="update" value="UPDATE"></td>
    </tr>
</table>
</form>
<div><?php echo $message; ?></div>
</body>
</html>