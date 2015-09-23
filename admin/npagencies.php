<?php
require 'function.php';
$message='';
if(isset($_SESSION['islogin']))
{
$id=$_SESSION['id'];
$info=admin($id);
$ag=npaidagencies();
}
else
{
    header('location:../intro.php');
    exit;
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

    <!-- Morris Charts CSS -->
    <link href="css/admin.css" rel="stylesheet">


    <!-- Custom Fonts -->
     <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.8/css/jquery.dataTables.css">

</head>
<body>

    <div id="wrapper">
<!-- TOP NAV BAR -->

   <?php include ('nav.php'); ?>

   <!-- //END OF TOP NAV BAR -->
    
           
            <!-- Sidebar inclusion -->
  <?php include ('sidebar-admin.php'); ?>

      <div style="margin-left:30px; margin-right:30px;">

                <div  class="panel panel-info">
    <div style="padding-bottom: 80px; text-align: center;" class="panel-heading">
  <h3 style="padding-top: 30px; "class="panel-title mdi-communication-contacts mdi-4x"><h2> Not Yet Subscribed Agencies</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; " class="panel-body">

            <?php if($ag){?>
             <div class = "table-responsive">
                  <table class="table table-striped table-hover ">
                <table id="table_id" class="display">
       

     
            <thead>  
          <tr>  
    
            <th>Agency Name</th>  
            <th>Branch</th>  
            <th>Address</th>  
            <th>Office No.</th>  
           <th>Contact Person</th>
           <th>Contact Person No.</th>
           <th>Contact Email</th>
           <th>Username</th>
          </tr>  
        </thead>  
        

        <tbody>  
            <?php foreach($ag as $a){?>
          <tr>  

            </td>  
            
            <td><?php echo $a['agencyname'];?></td>  
            <td><?php echo $a['branch'];?></td>  
            <td><?php echo $a['address'];?></td>
            <td><?php echo $a['officeno'];?></td>
            <td><?php echo $a['contactperson'];?></td>
            <td><?php echo $a['contactpersonno'];?></td>
            <td><?php echo $a['contactemail'];?></td>
            <td><?php echo $a['username'];?></td> 
          </tr>  
          <?php }?>
            </tbody>  
      </table> 

<?php }
else {
$message = "No Unsubscribe Agencies";
}?>


 <div style="background-color: #fff; color:black; padding: 20px; text-align:center; font-size:200%; margin-top: 20px; color: #555;"><h3> 
<?php echo $message; ?></h3></div>  



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
    $('#table_id').DataTable();
} );
</script>


</body>

</html>
