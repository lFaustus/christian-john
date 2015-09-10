<?php
require 'function.php';
$login=$_SESSION['islogin'];
$message="";
if($login)
{
    $id=$_SESSION['id'];
    $info=admin($id);
    $idno = trim($_GET['id']);
    $plan = selectplan($idno);


if(isset($_POST['update']))
{
        if(trim($_POST['desc']) == false)
    {
        $message="Input Plan Description";
    }
    else if(trim($_POST['rate']) == false)
    {
        $message="Input Rate";
    }
    else
    {
        $_POST['idno'] = $idno;
    updateplan($_POST);
    header('location:listplan.php');
    exit();
    }
}
}
else
{
    header('location:landing.php');
    exit();
}


$info=admin($id);
$ag=activeagency();


    $noti = notify_adminToagency();
    $noti1 = notify_NYS();
?>


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

       <!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    


           
                     <?php include ('sidebar-admin.php'); ?>

                    <!--     <div id="page-wrapper"> -->
                            <div class="container-fluid">
                                <h3>Update Plan </h3>

           <div id="addadmin">
 
         
            <form method="POST">
        <div class="col-xs-10">
            <center>
                  <?php if($plan) {?>

           <!--  <div style="background-color: #fff; color:red; padding: 50px; text-align:center; font-size:100%;"> <?php echo $message; ?></div> -->
                <label for="name"><h4>Name:</h4></label>
      
                <input type="text" name="desc" id="desc" value="<?php if(isset($_POST['desc'])){ echo htmlentities($_POST['desc']);}else{echo htmlentities($plan['plandesc']);}?>"/>

             
          <label for="username"><h4>Username:</h4></label>
            <input type="text" class="form-control" pattern=".{8,15}" required title="8 to 15 characters" name="username" id="username" value="<?php if(isset($_POST['username'])){ echo htmlentities($_POST['username']);}?>" required />

           
            <label for="password"><h4>Password:</h4></label>
            <input type="password" class="form-control" pattern=".{6,13}" required title="6 to 13 characters" name="password" id="password" value="<?php if(isset($_POST['password'])){ echo htmlentities($_POST['password']);}?>" />


           
          <label for="password1"><h4>Re-type Password:</h4></label>
           <input type="password" class="form-control" pattern=".{6,13}" required title="6 to 13 characters" name="password1" id="password1" value="<?php if(isset($_POST['password'])){ echo htmlentities($_POST['password1']);}?>" /><br>
  
            <input type="submit" class="btn btn-info" name="register" value="Register"></button>
            <button type="reset" class="btn btn-default btn-raised" value="Reset">Clear Fields</button>
        </center>

        </div>
<?php }?>

</table>
</form>


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


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>  -->
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