<?php
require 'function.php';
$message="";
$id=$_GET['id'];
$plan = plan();
if(isset($_POST['add']))
{	
	if(trim($_POST['no'])== false)
	{
		$message="Enter a Number of Subscription";
	}
	else if(trim($_POST['pay'])== false)
	{
		$message="Enter a Paypal Account";
	}
		else if(!filter_var(trim($_POST['pay']), FILTER_VALIDATE_EMAIL))
	{
		$message="INVALID FORMAT OF PAYPAL ACCOUNT EXAMPLE: example@yahoo.com";
	}
	else
	{
	$_POST['id']=$id;
	subcription($_POST);
	approveeu($id);
				session_regenerate_id();
			$_SESSION['islogin'] = true;
			$_SESSION['id'] = $id;
	header('location:userpage.php');
	exit();
	}
}

?>

<h1>Subscription</h1>
<?php if($plan){?>
<form method="POST">
<table>
<tr>
<td><label for="pl">Plan</label></td>
<td><select name="pl" id="pl">
<?php foreach($plan as $p){?>
<option value="<?php echo $p['planid'];?>"><?php echo $p['plandesc'];?></option>
<?php }?>
</select>
</td>
</tr>
<tr>
<td><label for="no">Number Of Subscription:</label></td>
<td><input type="number" name="no" id="no" value="<?php if(isset($_POST['no'])){ echo htmlentities($_POST['no']);}?>" max="12" min ="1" required/></td>
</tr>
<tr>
<td><label for="pay">Paypal Account</label></td>
<td><input type="email" name="pay" value="<?php if(isset($_POST['pay'])){ echo htmlentities($_POST['pay']);}?>"required /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" name="add" name="Subscribed"></td>
</tr>
</table>
</form>
<?php }else{$message="No PLans Yet";}?>
<div> <?php echo $message;?> </div>
