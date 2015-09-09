<?php
require 'function.php';
$error = '';

	//check if user has clicked login button

	if(isset($_POST['login']))
	{

		$user = loginuser($_POST);
		

		if($user)
		{
			if($user['status'] == 'Deactivated')
			{
				$error = "Please Contact na Administator Youre Account has been Deactivated";
			}
			else if($user['status'] == 'NPaid')
			{
				$i=$user['euid'];
				header("location: subscription.php?id=$i");
				exit();
			}
			else
			{
			session_regenerate_id();
			$_SESSION['islogin'] = true;
			$_SESSION['id'] = $user['euid'];
			header('location: userpage.php');
			exit;
			}
		}
		else
		{
			$error = "INVALID USERNAME AND PASSWORD";

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
<h2>Login Page</h2>
<form method="POST">
	<input type="text" pattern=".{8,15}" required title="8 to 15 characters" name="user" placeholder="username"  required/>
	<br>
	<input type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass" placeholder="password"  required/>
	<br>
	<button type="submit" name="login">login</button>
	<div style="color:red;">
		<?php echo $error; ?>
	</div>
</form>
</body>
</html>