<?php
require 'function.php';
$message='';
if(isset($_SESSION['islogin']))
{
$id=$_SESSION['id'];
$info=admin($id);




    
}
else
{
    header('location:landing.php');
    exit;
}



$a=plnAG(1);
$b=plnAG(2);

$c=plnEU(3);
$d=plnEU(4);

$agm=reportsmonthlyAG();
$agy=reportsyearlyAG();

$eu=reportsmonthlyEU();
$eu1=reportsyearlyEU();



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

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/admin.css" rel="stylesheet">


    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">




    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

</head>
<body>
   <!--  <?php print_r($a); ?> -->
    <div id="wrapper">

       <!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('sidebar-admin.php'); ?>



 

        <div id="page-wrapper">



                
            <div class="container-fluid">
    
            <!-- Page Heading -->
                <div class="row">
                    <div class="col-md-6">

                        <h1 class="breadcrumb">
                            <small>             <i class="fa fa-line-chart"></i> &nbsp;Plan Reports Summary</small>
                        </h1>
                    </div>
                </div>
                Monthly Subscription -  Agencies: (<?php echo count($agm);?>) <br>
                Yearly Subscription -  Agencies: (<?php echo count($agy);?>) <br>
                Monthly Subscription -  End User: (<?php echo count($eu);?>) <br>
                Yearly Subscription -  End User: (<?php echo count($eu1);?>)


            </div>


   <div class="container-fluid" style="padding-top:;">
                    <div class="col-lg-12">
                        <h1 class="breadcrumb">
                            <small>             <i class="fa fa-sort-alpha-asc"></i> &nbsp;Plan Reports Overview</small>
                        </h1>
                    </div>
                </div>


 

        <div class="row">

            <div class="col-md-6">
            <div class="panel panel-default">
            <div class="panel-heading">
       <h4 class="breadcrumb" style="background-color: #3F51B5; padding:20px; color:white; text-align:center;">
                Monthly Subscription <span class="badge" style="font-size:15px;"> <?php echo count($agm);?> Agency Subscribers
            </h3>

        <div class="breadcrumb" style="margin-right:;">            
                           
             <?php if($a){?>
                <div class = "table-responsive">
      <!--             <table class="table table-striped table-hover "> -->
                <table id="table_1" class="display">
                    <thead>  
                        <tr>  
                            <th>Agency name</th>  
                            <th>Paypal Account</th>  
                            <th>Subscription Started</th>  
                            <th>Expiry Date</th>  
                  
                   
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php foreach($a as $a){?>
                      
                        <tr>  
                            <td><?php echo $a['agencyname'];?></td>
                            <td><?php echo $a['paypalactno'];?></td>  
                            <td><?php echo $a['dateapplied'];?></td>  
                            <td><?php echo $a['enddate'];?></td>
                        </tr>  
                     
                        <?php }?>
                    </tbody>  
                </table> 
     <!--        <?php }
        else {
        $message = "";
        }?>
 -->
                </div>
        </div>
    </div>
</div>
</div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
       <h4 class="breadcrumb" style="background-color: #3F51B5; padding:20px; color:white; text-align:center;">

    
            Yearly Subscription <span class="badge" style="font-size:15px;"> <?php echo count($agy);?> Agency Subscribers
        </h3>    
        <div class="breadcrumb">            
            <?php if($b){?>
             <div class = "table-responsive">
      <!--             <table class="table table-striped table-hover "> -->
                <table id="table_2" class="display">
                    <thead>  
                        <tr>  
                            <th>Agency Name</th>  
                            <th>Paypal Account</th>  
                            <th>Subscription Started</th>  
                            <th>Expiry Date</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php foreach($b as $b){?>
                        <tr> 
                            <td><?php echo $b['agencyname'];?></td>
                            <td><?php echo $b['paypalactno'];?></td>  
                            <td><?php echo $b['dateapplied'];?></td>  
                            <td><?php echo $b['enddate'];?></td>
                        </tr>  
                        <?php }?>
                    </tbody>  
                </table> 
            <?php }
        else {
        $message = "";
        }?>

            </div>
        </div>
    </div>
</div>
</div>
</div>


<!-- END USER DIV -->


 <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
            <div class="panel-heading">
         <h4 class="breadcrumb" style="background-color: #3F51B5; padding:20px; color:white; text-align:center;">

                Monthly Subscription <span class="badge" style="font-size:15px;"> <?php echo count($eu);?> End User Subscribers
            </h4>

        <div class="breadcrumb" style="">            
                           
            <?php if($c){?>
                <div class = "table-responsive">
      <!--             <table class="table table-striped table-hover "> -->
                <table id="table_3" class="display" style="color:black;">
                    <thead>  
                        <tr>  
                            <th>Agency Name</th>  
                            <th>Paypal Account</th>  
                            <th>Subscription Started</th>  
                            <th>Expiry Date</th>  
                  
                   
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php foreach($c as $b){?>
                        <tr>  
                            <td><?php echo $b['firstname'];?></td>
                            <td><?php echo $b['paypalactno'];?></td>  
                            <td><?php echo $b['dateapplied'];?></td>  
                            <td><?php echo $b['enddate'];?></td>
                        </tr>  
                        <?php }?>
                    </tbody>  
                </table> 
            <?php }
        else {
        $message = "";
        }?>
    </div>
</div>


                </div>
        </div>
    </div>

    <div class="col-md-6">
         <div class="panel panel-default">
            <div class="panel-heading">
       <h4 class="breadcrumb" style="background-color: #3F51B5; padding:20px; color:white; text-align:center;">
            Yearly Subscription <span class="badge" style="font-size:15px;"> <?php echo count($eu1);?> End User Subscribers
        </h4>    
        <div class="breadcrumb">            
            <?php if($d){?>
             <div class = "table-responsive">
      <!--             <table class="table table-striped table-hover "> -->
                <table id="table_4" class="display" style="color:black;">
                    <thead>  
                        <tr>  
                            <th>Agency Name</th>  
                            <th>Paypal Account</th>  
                            <th>Subscription Started</th>  
                            <th>Expiry Date</th>  
                        </tr>  
                    </thead>  
                    <tbody>  
                        <?php foreach($d as $b){?>
                        <tr> 
                            <td><?php echo $b['firstname'];?></td>
                            <td><?php echo $b['paypalactno'];?></td>  
                            <td><?php echo $b['dateapplied'];?></td>  
                            <td><?php echo $b['enddate'];?></td>
                        </tr>  
                        <?php }?>
                    </tbody>  
                </table> 
            <?php }
        else {
        $message = "";
        }?>
    </div>
</div>

            </div>
        </div>
    </div>
</div>




        <script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<!-- DataTables CSS -->

<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.8/js/jquery.dataTables.js"></script>

  

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>



<script type="text/javascript">
$(document).ready( function () {
    $('#table_1').DataTable();
} );
</script>

<script type="text/javascript">
$(document).ready( function () {
    $('#table_2').DataTable();
} );
</script>


<script type="text/javascript">
$(document).ready( function () {
    $('#table_3').DataTable();
} );
</script>


<script type="text/javascript">
$(document).ready( function () {
    $('#table_4').DataTable();
} );
</script>


</body>

</html>
