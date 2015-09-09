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
	$info=admin($id);
	if(isset($_POST['update']))
	{
	if(trim($_POST['pass']) == false)
	{
		$message="ENTER OLD PASSWORD";
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
		$message="OLD PASSWORD DID NOT MATCH";
	}
	else if(trim($_POST['pass1']) != trim($_POST['pass2']) )
	{
		$message="PASSWORD NOT MATCH";
	}
	else
	{
		$_POST['id'] = $id;
		changepassadmin($_POST);
		header('location:adminprofile.php');
	}
	}
}
else
{
	header('location:intro.php');
	exit;
}



    $noti = notify_adminToagency();
    $noti1 = notify_NYS();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- MATERIAL CSS -->
    <link rel="stylesheet" type="text/css" href="dist/css/material.css">
    <link rel="stylesheet" type="text/css" href="dist/css/material.min">

   <!-- Admin custom css -->
    <link href="css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- Data Tables -->
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div id="wrapper">

         <?php include ('nav.php'); ?>
  <?php include ('sidebar-admin.php'); ?>

        <div id="changepw">
        <form method="POST">
				
        <div class="col-xs-10">
            <center>
                <label for="ex3"><h4>Username: </h4></label><br>
                <input class="form-control" id="ex3" type="text" style="text-align:center; font-weight:bold;" placeholder="<?php echo htmlentities($info['username']);?>"disabled>

          <label for="pass1"><h4>Old Password:</h4></label>
            <input class="form-control" id="ex3" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass" id="pass" value="<?php if(isset($_POST['pass'])){ echo htmlentities($_POST['pass']);}?>" required />

            
            <label for="pass1"><h4>Password:</h4></label>
            <input class="form-control" id="ex3" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass1" id="pass1" value="<?php if(isset($_POST['pass1'])){ echo htmlentities($_POST['pass1']);}?>" required />


        
          <label for="pass2"><h4>Re-type Password:</h4></label>
            <input class="form-control" id="ex3" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass2" id="pass2" value="<?php if(isset($_POST['pass2'])){ echo htmlentities($_POST['pass2']);}?>" required />
          
            <div style="background-color: #fff; color:red; padding: 20px; text-align:center; font-size:100%;"> <?php echo $message; ?></div>
     		<input type="submit" class="btn btn-info" value="Update" name="update"></button>


                    <button type="reset" class="btn btn-default btn-raised" value="Reset">Clear Fields</button>
        </center>

        </div>
<!-- <div><?php echo $message; ?></div> -->
</div>
    </div>
</form>

<!--
        <div id="page-wrapper">

            <div class="container-fluid">

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
</div> -->

            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });
</script>

</body>

</html>
