<?php
require 'function.php';
$login=$_SESSION['islogin'];
if($login)
{
    $id=$_SESSION['id'];
    $info=admin($id);
    $plan=listplan();
if(isset($_POST['search']))
{
    $plan = searchplan($_POST);
}
}
else
{
    header('location:lading.php');
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

 

        <div id="page-wrapper">

            <div class="container-fluid">
    

            <div style="margin:30px;">

            <?php if($plan){?>
             <div class = "table-responsive">
                  <table class="table table-striped table-hover ">
                <table id="table_id" class="display">
       

     
            <thead>  
          <tr>  
    
            <th>Actions</th>  
            <th>Plan ID</th>  
            <th>Description</th>  
            <th>Rate</th>  
           <th>User Type</th>
           <th>Status</th>
          </tr>  
        </thead>  
        
        <tfoot>
             <tr>  
    
            <th>Actions</th>  
            <th>Plan ID</th>  
            <th>Description</th>  
            <th>Rate</th>  
           <th>User Type</th>
           <th>Status</th>
          </tr>  
        </tfoot>
        <tbody>  
            <?php foreach($plan as $a){?>
          <tr>  

            </td>  
            <td>
            <a href="updateplan.php?id=<?php echo $p['planid'];?>" style="color: yellowgreen;" class="mdi-editor-mode-edit" ></a> &nbsp; &nbsp;
             <a onclick="return confirm('Delete?');" href="deleteplan.php?id=<?php echo $a['planid'];?>" style="color: tomato;"class="mdi-action-delete" ></a>

            </td>  
            <td><?php echo $a['planid'];?></td>  
            <td><?php echo $a['plandesc'];?></td>  
            <td><?php echo $a['rate'];?></td>
            <td><?php echo $a['usertype'];?></td>
            <td><?php echo $a['status'];?></td>
          </tr>  
          <?php }?>
            </tbody>  
      </table> 

<?php }
else {
$message = "No Unsubscribe Agencies";
}?>


<!--  <div style="background-color: #fff; border-bottom: 2px solid #eee; color:black; padding: 20px; text-align:center; font-size:200%; margin-top: 20px; color: #555;"><h3> 
<?php echo $message; ?></h3></div>   -->



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
