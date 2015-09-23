<?php
require 'function.php';
$message='';
if(isset($_SESSION['islogin']))
{
$id=$_SESSION['id'];
$info=admin($id);
$ag=activeuserlist();
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

          <?php include ('nav.php'); ?>
           
            <!-- Sidebar inclusion -->
  <?php include ('sidebar-admin.php'); ?>
       
                <div  class="panel panel-info">
    <div style="padding-bottom: 60px; text-align: center;" class="panel-heading">
        <h3 style="padding-top: 30px; "class="panel-title mdi-social-people mdi-4x"><h2> End Users All List</h2></h3>
    </div>
    <div style="padding:10px; padding-left: 60px; padding-right: 60px; " class="panel-body">

            <div style="margin:30px;">
                  <h1> <b>Total:  <?php echo count($ag);?></b></h1>

            <?php if($ag){?>
             <div class = "table-responsive">
                  <table class="table table-striped table-hover ">
                <table id="table_id" class="display">
       

     
            <thead>  
          <tr>  
    
            <th>Full Name</th>  
            <th>Address</th>  
            <th>Contact No.</th>  
            <th>Email</th>  
           <th>Birthdate</th>
           <th>Username</th>
           <th>STATUS</th>
 
          
              </tr>  
            </thead>  
        

        <tbody>  
            <?php foreach($ag as $a){?>
          <tr>  

            </td>  
            
             <td><?php echo $a['firstname']." ".$a['mi']." ".$a['lastname'];?> </td>   
            <td><?php echo $a['address'];?></td>  
            <td><?php echo $a['contactno'];?></td>
            <td><?php echo $a['email'];?></td>
            <td><?php echo $a['bdate'];?></td>
            <td><?php echo $a['username'];?></td>
            <td><?php echo $a['status'];?></td>
    
          </tr>  
          <?php }?>
            </tbody>  
      </table> 

<?php }
else {
$message = "Showing Statistics";
}?>

 <div style="background-color: #fff; color:black; padding: 20px; text-align:center; font-size:200%; margin-top: 20px;"> 
<?php echo $message; ?></div>       
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
