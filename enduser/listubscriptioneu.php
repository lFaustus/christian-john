<?php
require 'function.php';
if(!isset($_SESSION['islogin']))
{

	header('location:../intro.php');
	exit;
}
$id=$_SESSION['id'];
$info=user($id);
$subeu = listsubscription($id);
$total = 0;
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

     
 <div style="margin-left:30px; margin-right:30px;">


                <div  class="panel panel-info">
    <div style="padding-bottom: 50px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-action-assignment mdi-4x"><h2>Subscription</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; padding-bottom: 50px;" class="panel-body">





        <div class = "table-responsive">
      <table class="table table-striped table-hover ">
    <table id="Subscription" class="display">


         <thead>
  <th>Plan Description</th>
  <th>Number of Month/Year</th>
  <th>Rate</th>
  <th>Total</th>
  <th>Paypal Account</th>
    <th>Start Date</th>
      <th>End Date</th>
  </thead>

  <tfoot>

  <th>Plan Description</th>
  <th>Number of Month/Year</th>
  <th>Rate</th>
  <th>Total</th>
  <th>Paypal Account</th>
    <th>Start Date</th>
      <th>End Date</th>
 
  </tfoot>



  <?php foreach($subeu as $s){$total = $total + $s['totalamount'];?>
	<tr>
    <td><?php echo $s['plandesc'];?></td>
    <td><?php echo $s['numsubscription'];?></td>
    <td><?php echo $s['rate'];?></td>
    <td><?php echo $s['totalamount'];?></td>
    <td><?php echo $s['paypalactno'];?></td>
    <td><?php echo $s['startdate'];?></td>
    <td><?php echo $s['enddate'];?></td>
    </tr>
  <?php }?>
  </table>
  <div>Total Amount Paid : <?php echo $total;?></div>
    </div>
</div>

                
            </div>
			
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

  
    <!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

<!-- Bootstrap Core JavaScript -->
 <script src="../js/bootstrap.min.js"></script>             

<script type="text/javascript">
$(document).ready( function () {
    $('#Subscription').DataTable();
} );
</script>

</body>

</html>
