<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{
    header('location:../intro.php');
    exit;
}
$id=$_SESSION['id'];
$info=user($id);
$pid=$_GET['pid'];
$req = listrequirement($pid);
if($req)
{
}
else
{
    header("location:startsteps.php?page=1&pid=$pid");exit;
}
if(isset($_POST['next']))
{
    if(empty($_POST['requirements']))
    {
            $message="YOU MUST SELECT ALL THE REQUIREMENTS";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else if(count($req) != count($_POST['requirements']))
    {
        $message="YOU MUST SELECT ALL THE REQUIREMENTS";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else
    {
        foreach($_POST['requirements'] as $re)
        {
            startrequirement($re);
        }

            echo "<script type='text/javascript'>
            alert('SUCCESS');
            window.location='startsteps.php?page=1&pid=".$pid."';
            </script>";
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

    <title>Agency - ENDINMIND</title>

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
<!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('menu.php'); ?>

 
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Requirements</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">

<div style="text-align: center;">

<form method="POST">
<table>
<thead>
<th></th>
</thead>
<?php if($req){?>
<?php foreach($req as $r){ ?>
 

<div style="padding-left: 200px; padding-right: 200px;">


<div style="background-color: yellow;" class="panel panel-default">
    <div class="panel-body">

    
     
    <h4><input type="checkbox" name="requirements[]" value="<?php echo $r['reqid'];?>" <?php if($r['reqstatus'] == 'check'){echo 'checked';}?> /> <?php echo htmlentities($r['reqname']);?>  (<?php echo htmlentities($r['copyno']);?>) <a class="mdi-editor-attach-file" href="ftagreq.php?rid=<?php echo $r['reqid'];?>&pid=<?php echo $pid;?>"> </a></h4> 
<!--   <a href="javascript:void(0)" class="btn btn-default btn-fab btn-raised mdi-editor-attach-file"></a> -->
    </div>

</div>
</div>  
 

 
<?php }?>
 
 <input class="btn btn-info btn-raised" type="submit" name="next" value="next" /> 
 
<?php }else{ echo "No REQUIREMENTS";}?>
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

    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>

</body>

</html>
