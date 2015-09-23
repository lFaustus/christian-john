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
/*	$_POST['id']=$id;
	subcription($_POST);
	approveagency($id);
	session_regenerate_id();
	$_SESSION['islogin'] = true;
	$_SESSION['id'] = $id;
	header('location:agencypage.php');
	exit();*/
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

    <title>Subscription - ENDINMIND</title>

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

<!-- <div id="wrapper"> -->

        <div style="padding-left: 200px; padding-right: 200px; text-align: center;">
        <div class="container-fluid">
	   <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>Subscription Form</h2></h3>
    </div>
    <div style="padding:auto;" class="panel-body">



<div style="padding-left: 200px; padding-right:200px; padding-bottom: 50px;">

<?php if($plan){?>
<form method="POST" action="paynow1.php" target="_blank">
<input type="hidden" name="customer" value="<?php echo $id;?>">

 
 <label for="pl"><h4>Plan Type</h4></label> 
 
       <div class="sample">
                 <select name="pl" id="pl" class="form-control">
<?php foreach($plan as $p){?>
<option  value="<?php echo $p['planid'];?>"><?php echo $p['plandesc'];?> &nbsp;(<?php echo $p['rate'];?>)</option>
<?php }?>
</select>
 
 
 
 <label for="no"><h4> Number of Months / Year </h4></label> 
 <input class="form-control"  type="number" name="no" id="no" value="<?php if(isset($_POST['no'])){ echo htmlentities($_POST['no']);}?>" max="12" min ="1" required/> 
 
 
 <label for="pay"><h4> Paypal Account </h4></label> 
 <input class="form-control" type="email" name="pay" value="<?php if(isset($_POST['pay'])){ echo htmlentities($_POST['pay']);}?>"required /> 
 
 <br>
 &nbsp; 
 <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1"> 
 

</form>
<?php }else{$message="No PLans Yet";}?>
<div> <?php echo $message;?> </div>

</div>
</div>
</div>

</body>
</html>