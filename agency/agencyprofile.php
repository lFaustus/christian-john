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


               <?php include ('nav.php'); ?>
		         <?php include ('sidebar-agency.php'); ?>

        <div id="page-wrapper">




            <div class="container-fluid">

                    <div class="col-md-12" style="text-align: center; padding-top:30px; ">

<form action="" method="POST" enctype="multipart/form-data"  name="changer">
    <center>
  <img  id="blah" class="img-circle" width="200" height="200" src="files/<?php echo $info['logo'];?>" />
  <br>


          <span class="btn btn-default btn-raised btn-file"> BROWSE
                <input id="imgInp" type="file" name="file"  accept="image/*"  /> 
                    </span>
 
  
  <br>
<h4 style="color: #999;"> Agency Name </h4>
 <input style="text-align: center;" class="form-control" type="text" name="agencyname" id="agencyname" value="<?php if(isset($_POST['agencyname'])){ echo htmlentities($_POST['agencyname']);}else{echo htmlentities($info['agencyname']);}?>" required />

 <label for="branch"><h4 style="color: #999;"> BRANCH </h4><br/>
 <input style="text-align: center;" class="form-control" type="text" name="branch" id="branch" value="<?php if(isset($_POST['branch'])){ echo htmlentities($_POST['branch']);}else{echo htmlentities($info['branch']);}?>" required />

 
 
 <label for="address"><h4 style="color: #999;">Address </h4></label></td>
 <input style="text-align: center;" class="form-control" type="text" name="address" id="address" value="<?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}else{echo htmlentities($info['address']);}?>" required/>

 
 <label for="officeno"><h4 style="color: #999;"> Office No. </h4></label></td>
 <input style="text-align: center;" class="form-control" type="text" name="officeno" id="officeno" value="<?php if(isset($_POST['officeno'])){ echo htmlentities($_POST['officeno']);}else{echo htmlentities($info['officeno']);}?>" required />

 
 <label for="contactperson"><h4 style="color: #999;">Contact Person </h4></label>
 <input style="text-align: center;" class="form-control" type="text" name="contactperson" id="contactperson" value="<?php if(isset($_POST['contactperson'])){ echo htmlentities($_POST['contactperson']);}else{echo htmlentities($info['contactperson']);}?>" required />

 
 <label for="contactpersonno"><h4 style="color: #999;">Contact Person No. </h4> </label>
 <input style="text-align: center;" class="form-control" type="text" name="contactpersonno" id="contactpersonno" value="<?php if(isset($_POST['contactpersonno'])){ echo htmlentities($_POST['contactpersonno']);}else{echo htmlentities($info['contactpersonno']);}?>" required />

 
 <label for="emailadd"><h4 style="color: #999;"> Contact Email Address </h4></label>
 <input style="text-align: center;" class="form-control" type="email" name="emailadd" id="emailadd" value="<?php if(isset($_POST['emailadd'])){ echo htmlentities($_POST['emailadd']);}else{echo htmlentities($info['contactemail']);}?>" required />

     
       &nbsp;
       <input class="btn btn-info btn-raised btn-file" type="submit" name="update" value="UPDATE">
  
 
</form>


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