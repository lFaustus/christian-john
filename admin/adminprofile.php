<?php
require 'function.php';
$message="";
$flag=0;
$id=$_SESSION['id'];
$log=$_SESSION['islogin'];
$info=admin($id);


if($log)
{
if(isset($_POST['update']))
{

	if(trim($_POST['name'])==false)
	{
		$message="ENTER NAME";
	}
	else
	{
		if ($_FILES['file']['name'] == "")
			{
				$newimagename = $info['image'];
				$_POST['image'] = $newimagename;
				$_POST['id']=$id;
			updateadmin($_POST);
			header('location:adminpage.php');
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
			$flag =1;
			}
			else
			{
			$message="INVALID FILE";
			}
			if($flag==1)
			{
			$_POST['image'] = $newimagename;
			$_POST['id']=$id;
			updateadmin($_POST);
			header('location:adminpage.php');
			exit();
			}


		}




	}

}
else
{
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

        <div id="page-wrapper">
            <div class="container-fluid">

				<div id="profile">
					<div id="profilebox">

                     <div style="background-color:transparent; width:400px; text-align:center; padding-top: 100px;">
            <div class="container-fluid">
								<form action="" method="POST" enctype="multipart/form-data"  name="changer">
    							<br>

  							<img  id="blah" class="img-circle" width="200" height="200" src="files/<?php echo $info['image'];?>" />
  						<br>
  					<br>

                  


                              <span class="btn btn-info btn-file"> BROWSE
  				<input id="imgInp" type="file" name="file"  accept="image/*"  /> 
                    </span>


	  <table>
    <br>



		<div style="background-color:transparent; width:400px; text-align:center;" class="col-xs-10">
			<br>
            <label>Name</label>
            <center>
			<input class="form-control" id="ex3" type="text"  name="name" id="name" style="width:200px;" value="<?php if(isset($_POST['name'])){ echo 	htmlentities($_POST['name']);}else{ echo 	$info['name'];}?>" required />

        </center>


     
  			<br>
  			<input type="submit" class="btn btn-primary" value="Save" name="update"></button>
				<div style="padding-bottom:20px;"> </div></table>
			</form>
			<div> <?php echo $message;?> </div>
 		
            </div>  
            <!-- /.container-fluid -->

        	</div>
        	<!-- /#page-wrapper -->
    	</div>
    	<!-- /#wrapper -->

			    	<!-- jQuery -->
    		<script src="../js/jquery.js"></script>

    	<!-- Bootstrap Core JavaScript -->
    	<script src="../js/bootstrap.min.js"></script>


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


 <!--Import jQuery before materialize.js-->
<!--       // <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      // <script type="text/javascript" src="materialize/js/materialize.min.js"></script> -->
</body>

</html>
