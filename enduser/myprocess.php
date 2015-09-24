<?php
require 'function.php';
$message="";
$flag=0;
if(!isset($_SESSION['islogin']))
{
		header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$info=user($id);
$process=listprocess($id);
if(isset($_POST['search']))
{	
	if(trim($_POST['val']) == false)
	{
		$message="Enter a Value For Search";
	}
	else
	{
		$_POST['id']=$id;
		$process=searchprocess($_POST);
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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>List of Personal Process</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">


      
<div style="text-align: center;">
          <form method="POST">
          
            
                <label for="val"><h4> Search: </h4></label>
                <input  class="form-control" type="text" name="val" id="val" value="<?php if(isset($_POST['val'])){ echo htmlentities($_POST['val']);}?>"  required/>
              
           
                <td>&nbsp;</td>
               

                <td><input  class="btn btn-info btn-raised" type="submit" name="search" value="Search"></td>
              </tr>
            </table>
          </form>
          <br/>
          <br/>
          <?php if($process){?>
          <?php foreach($process as $p){
		  $waiting =waitingproductivity($p['euprocessid']);
	  $done =doneproductivity($p['euprocessid']);
	  $undone = undoneproductivity($p['euprocessid']);
	  $total = productcount($p['euprocessid']);
	  $rtotal =productreqcount($p['euprocessid']);
	  $uncheck=productrequncheck($p['euprocessid']);
	  $check=productreqcheck($p['euprocessid']);?>
          <div> <a href="startrequirements.php?pid=<?php echo $p['euprocessid']; ?>">

    <div class="well well-lg">
  
           Process Name: <?php echo htmlentities($p['processname']);?><br/>
            Copied From : <?php echo htmlentities($p['agencycopiedfrom']);?> </a>
            <hr/>
        
            <h4>STEPS</h4>
            <p>WAITING: <?php echo $waiting['ide'];?>/<?php echo $total['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; DONE : <?php echo $done['ide'];?>/<?php echo $total['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; UNDONE : <?php echo $undone['ide'];?>/<?php echo $total['ide'];?></p>
            <h4>REQUIREMENTS</h4>
            <p>UNCHECK : <?php echo $uncheck['ide'];?>/<?php echo $rtotal['ide'];?> &nbsp;&nbsp;&nbsp;&nbsp; CHECK : <?php echo $check['ide'];?>/<?php echo $rtotal['ide'];?></p>
            <p></p>
            <a class="btn btn-info btn-danger" onclick="return confirm('Are You Sure?')" href="deleteprocess.php?id=<?php echo $p['euprocessid']; ?>">DELETE</a> </div>
          <br/>
          <br/>
          <br/> </div>
          <?php }?>
          <?php }
else {
$message="No Process";
}?>
          <!-- <div> <?php echo $message;?> </div> -->
        </div>
      </div>
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