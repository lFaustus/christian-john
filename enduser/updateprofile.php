<?php
require 'function.php';
$message="";
$flag=0;
$login=$_SESSION['islogin'];
if($login)
{
$id=$_SESSION['id'];
$info=user($id);
if(isset($_POST['update']))
{
	
if(trim($_POST['firstname']) == false)
	{
		$message="ENTER A FIRST NAME";
	}
	else if(trim($_POST['lastname']) == false)
	{
		$message="ENTER A LAST NAME";
	}
		else if(trim($_POST['bdate']) == false)
	{
		$message="ENTER A Birthdate";
	}
	else if(trim($_POST['address']) == false)
	{
		$message="ENTER A ADDRESS";
	}
	else if(trim($_POST['contactno']) == false)
	{
		$message="ENTER A CONTACT NUMBER";
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
			if($_FILES['file']['name'] == "") 
			{	
			$newimagename = $info['image'];
			$_POST['image'] = $newimagename;
			$_POST['id']=$id;			
			updateuser($_POST);

			header('location:userpage.php');
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
			$_POST['image'] = $newimagename;
			$_POST['id']=$id;			
			updateuser($_POST);

			header('location:enduserprofile.php');
			exit;
			
			}


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

    <title>User Login - ENDINMIND</title>

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
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">
 

</head>


<body>
 <div id="wrapper">

              <?php include('nav.php');?>
       
              <?php include('menu.php');?>

        <div id="page-wrapper">
      



        
        <div style="width:auto; text-align:center; ;" class="panel panel-info">

                 
    <div class="panel-heading"> 




<form action="" method="POST" enctype="multipart/form-data"  name="changer">
   

 
  <img  id="blah" class="img-circle" width="200" height="200" src="files/<?php echo $info['image'];?>" /></br>
   <span class="btn btn-info btn-raised btn-file"> BROWSE  
  <input class="btn-info" id="imgInp" type="file" name="file"  accept="image/*"  />
</span>

       <h3>Update Profile </h3>
   </div>
    <br>
   

     <center>

        <div style="padding-left: 300px; padding-right: 300px;">
     
       <label for="firstname"><h4> First Name </h4></label> 
       <input  style="text-align:center;" class="form-control" type="text" name="firstname" id="firstname" value="<?php if(isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}else{echo htmlentities($info['firstname']); }?>" required /> 
     
     
       <label for="lastname"><h4> Last Name </h4></label>  
       <input style="text-align:center;" class="form-control" type="text" name="lastname" id="lastname" value="<?php if(isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}else{echo htmlentities($info['lastname']); }?>" required /> 
     
     
       <label for="miname"><h4> Middle Name </h4></label> 
       <input style="text-align:center;" class="form-control" type="text" name="miname" id="miname"  maxlength="1" value="<?php if(isset($_POST['miname'])){ echo htmlentities($_POST['miname']);}else{echo htmlentities($info['mi']); }?>" /> 
     
     
       <label for="bdate"><h4>Birthdate </h4></label> 
       <input style="text-align:center;" class="form-control" ype="date" name="bdate" id="bdate"   value="<?php if(isset($_POST['bdate'])){ echo htmlentities($_POST['bdate']);}else{echo htmlentities($info['bdate']); }?>"  required /> 
     
     
       <label for="address"><h4>Address </h4></label> 
       <input style="text-align:center;" class="form-control" type="text" name="address" id="address" value="<?php if(isset($_POST['address'])){ echo htmlentities($_POST['address']);}else{echo htmlentities($info['address']); }?>" required/> 
     
     
       <label for="contactno" ><h4>Contact No. </h4></label> 
       <input style="text-align:center;" class="form-control" type="text" name="contactno" id="contactno" value="<?php if(isset($_POST['contactno'])){ echo htmlentities($_POST['contactno']);}else{echo htmlentities($info['contactno']); }?>" required /> 
     
     
       <label for="emailadd"><h4>Email Address </h4></label> 
       <input style="text-align:center;" class="form-control" type="email" name="emailadd" id="emailadd" value="<?php if(isset($_POST['emailadd'])){ echo htmlentities($_POST['emailadd']);}else{echo htmlentities($info['email']); }?>" required /> 
     
        </div>
       &nbsp; 
       <br>
      
       <input  class="btn btn-info btn-file"type="submit" name="update" value="UPDATE"> 
       
  </table>
</form>
<div> <?php echo $message;?> </div>
  </div>
</div>
</div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
  
    <!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>   
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

</body>

</html>