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
	$info=agency($id);
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
		changepassagency($_POST);
		header('location:agencyprofile.php');
	}
	}
}
else
{
	header('location:../intro.php');
	exit;
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

    <title>Agency - ENDINMIND</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">

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
<!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('sidebar-agency.php'); ?>

 
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-communication-vpn-key mdi-4x"><h2> Change Password</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

  



<br/>
<!-------->
<div  class = "row">
  <div style="padding-left: 50px; padding-right: 50px;" class = "col-lg-12">
   	<center>
	
     <div id="my-tab-content" class="tab-content">
<form method="POST">

 <label><h4> UserName: </h4></label></td>
  <input style="text-align: center;" class="form-control" type="text" placeholder="<?php echo htmlentities($info['username']);?> " disabled></input></td>
</tr>
 
 <label for="pass1"><h4> Old Password </h4></label></td>
 <input style="text-align: center;" class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass" id="pass" value="<?php if(isset($_POST['pass'])){ echo htmlentities($_POST['pass']);}?>" required /></td>
</tr>
 
 <label for="pass1"><h4> Password </h4></label></td>
 <input style="text-align: center;" class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass1" id="pass1" value="<?php if(isset($_POST['pass1'])){ echo htmlentities($_POST['pass1']);}?>" required /></td>
</tr>
 
 <label for="pass2"> <h4> Retype Password </h4></label></td>
 <input style="text-align: center;" class="form-control" type="password" pattern=".{6,13}" required title="6 to 13 characters" name="pass2" id="pass2" value="<?php if(isset($_POST['pass2'])){ echo htmlentities($_POST['pass2']);}?>" required /></td>
</tr>
     <br/>
       &nbsp;</td>
       <input class="btn btn-info btn-raised btn-file" type="submit" name="update" value="UPDATE"></td>
    </tr>

</form>
<div><?php echo $message; ?></div>
 </div>
  </div>
</div>
 </div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script> 
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
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>