<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=agency($id);
if(isset($_POST['update']))
{
	
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
	else
	{	
			if ($_FILES['file']['name'] == "") 
			{	
				$newimagename = $info['logo'];
			$_POST['logo'] = $newimagename;
			$_POST['id']=$id;			
			updateagency($_POST);
			header('location:agencypage.php');
			exit();
			} 
			else if($_FILES['file']['type'] == "image/png" || $_FILES['file']['type'] == "image/jpeg" || $_FILES['file']['type'] == "image/jpg" || $_FILES['file']['type'] == "image/gif" )
			{
			
			$imageLocation = "files/";
			$imageTmpLoc = $_FILES["file"]["tmp_name"];
			$temp = explode(".",$_FILES["file"]["name"]);
			$newimagename = $id . '.' .end($temp);
			
			if(file_exists($imageLocation.$newimagename))
			{
			unlink($imageLocation.$newimagename);
			}
			move_uploaded_file($imageTmpLoc, $imageLocation.$newimagename);
			$flag=1;
			}
			else
			{
			$message="INVALID FILE";
			}
			if($flag==1)
			{
			$_POST['logo'] = $newimagename;
			$_POST['id']=$id;			
			updateagency($_POST);

			header('location:agencypage.php');
			exit;
			
			}


	}
}
}
else
{
	header('location:agencypage.php');
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

    <title>Admin Profile</title>

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

    

          <div id="wrapper">

       
       <?php include ('nav.php'); ?>
              
   <?php include ('sidebar-agency.php'); ?>

        <div id="page-wrapper">
            <div class="container-fluid">

                  <!--   <div id="profilebox">
 -->
      



        
        <div style="width:auto; text-align:center; ;" class="panel panel-info">

                 
    <div class="panel-heading"> 

         <img  id="blah" class="img-circle" width="200" height="200" src="files/<?php echo $info['logo'];?>" />
     <h3> <?php echo htmlentities($info['agencyname']);?> <br><br><?php echo htmlentities($info['branch']);?> </h3></div>
    <div class="panel-body">



            <div class="container-fluid">

                    <div class="col-md-12" style="text-align: center; padding-top:30px; ">



 
 
 <label for="address"><h4 style="color: #999;">Address </h4></label><br>
 <?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}else{echo htmlentities($info['address']);}?>
 <br>

 
 <label for="officeno"><h4 style="color: #999;"> Office No. </h4></label><br>
<?php if(isset($_POST['officeno'])){ echo htmlentities($_POST['officeno']);}else{echo htmlentities($info['officeno']);}?>
<br>
 
 <label for="contactperson"><h4 style="color: #999;">Contact Person </h4></label><br>
 <?php if(isset($_POST['contactperson'])){ echo htmlentities($_POST['contactperson']);}else{echo htmlentities($info['contactperson']);}?>
<br>
 
 <label for="contactpersonno"><h4 style="color: #999;">Contact Person No. </h4> </label><br>
 <?php if(isset($_POST['contactpersonno'])){ echo htmlentities($_POST['contactpersonno']);}else{echo htmlentities($info['contactpersonno']);}?>
<br>
 
 <label for="emailadd"><h4 style="color: #999;"> Contact Email Address </h4></label><br>
<?php if(isset($_POST['emailadd'])){ echo htmlentities($_POST['emailadd']);}else{echo htmlentities($info['contactemail']);}?><br>


  
 
<br>

  <a onclick="return confirm('Are you sure you want to deactivate?')" class="btn btn-danger btn-raised" href="deleteprofile.php?id=<?php echo $info['agencyid']?>">Deactivate Account</a> 
</div>
<div> <?php echo $message;?> </div>
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