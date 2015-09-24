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
$pid=$_GET['id'];

$step=liststep($pid);
$requirement=listrequirement($pid);

    if(isset($_POST['add']))
    {
        if(trim($_POST['steps'])==false)
        {
            $message="Enter a Step";
        }
        else
        {
          $_POST['pid'] = $pid;
            addstep($_POST);
      echo "<script type='text/javascript'>
      alert('The Step Has Been Added!');
      window.location='rspage.php?id=".$pid."';
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

    <title>User - ENDINMIND</title>

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
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2> Steps and Requirements</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">






<ul class="nav nav-tabs" style="margin-bottom: 15px;">

    <li class="active"><a href="#home" data-toggle="tab">Steps</a></li>

    <li><a href="#profile" data-toggle="tab">Requirements</a></li>
  
        <ul class="dropdown-menu">
            <li><a href="#dropdown1" data-toggle="tab">Action</a></li>
            <li class="divider"></li>
            <li><a href="#dropdown2" data-toggle="tab">Another action</a></li>
        </ul>
    </li>
</ul>




<div id="myTabContent" class="tab-content">
    <div class="tab-pane fade active in" id="home">
        <p>
             <?php include('liststeps.php');  ?>
        </p>
    </div>
    <div class="tab-pane fade" id="profile">
        <p>
                <?php include('listrequirement.php');  ?>
        </p>
    </div>
    <div class="tab-pane fade" id="dropdown1">
        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
    </div>
    <div class="tab-pane fade" id="dropdown2">
        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
    </div>
</div>

<!-- 
<div class = "row">
  <div class = "col-lg-12">
<ul id="tabs" class="nav nav-tabs" style = "box-shadow:1px 3px 5px #999;" data-tabs="tabs">
		<li class="active"><a href="#red" data-toggle="tab"><b style = "color:#eb477d">STEPS</b></a></li>
        <li><a href="#orange" data-toggle="tab"><b style = "color:#eb477d">REQUIREMENTS</b></a></li>
        
        
    </ul>
   
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="red">
                    <h3>Documents</h3>
            
             <?php include('liststeps.php');  ?>

			
        </div>
        <div class="tab-pane" id="orange">

			            <h3>Requirements</h3>
            
            <?php include('listrequirement.php');  ?>
        </div>



  </div>
</div>
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


<script src="../js/jquery.min.js"></script> 



<!-- MODAL CREATE PROCESS -->


<div id="modal" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title">Add Step</h4>
      </div>
      <div class="modal-body">
        

         <form method="POST">
  <table>
    <div style="text-align: center;">
   <label><h4> Steps: </h4></label> 
   <textarea  class="form-control" name="steps" value="<?php if(isset($_POST['steps'])){ echo htmlentities($_POST['steps']);}?>" required></textarea> 
   
     
   &nbsp; 
   <div style="margin-top: 20px;">
    <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;

   
  </table>
  </form>
<!--   <a href="liststeps.php?id=<?php echo $pid;?>">Return to the List of Steps</a> -->

<!-- <div> <?php echo $message;?> </div> -->


       
<!--         <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;
  &nbsp; -->
  
            <!-- <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button> -->
          </div>
        </center>
        
        </div>



</form>


      </div>
      <div class="modal-footer">







        


<!-- MODAL CREATE PROCESS -->


<div id="modal1" class="modal fade" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title">Add Step</h4>
      </div>
      <div class="modal-body">
        

         <form method="POST">
  <table>
    <div style="text-align: center;">
   <label><h4> Steps: </h4></label> 
   <textarea  class="form-control" name="steps" value="<?php if(isset($_POST['steps'])){ echo htmlentities($_POST['steps']);}?>" required></textarea> 
   
     
   &nbsp; 
   <div style="margin-top: 20px;">
    <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;

   
  </table>
  </form>
<!--   <a href="liststeps.php?id=<?php echo $pid;?>">Return to the List of Steps</a> -->

<!-- <div> <?php echo $message;?> </div> -->


       
<!--         <div style="margin-top: 20px;">
        <button type="submit" class="btn btn-fab btn-info mdi-navigation-check" name="add"  /> &nbsp;
  &nbsp; -->
  
            <!-- <button class="btn btn-fab btn-danger mdi-navigation-close" data-dismiss="modal"></button> -->
          </div>
        </center>
        
        </div>



</form>


      </div>
      <div class="modal-footer">



</body>

</html>